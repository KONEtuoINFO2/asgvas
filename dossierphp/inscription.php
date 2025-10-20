<?php
require_once '../dataconect/config.inc.php';

// 🛡️ Fonctions de validation personnalisées
function estNumeroIvoirien($num) {
    return preg_match('/^(?:\+225)?(01|05|07|25|27)\d{8}$/', $num);
}


function estMotDePasseValide($mdp) {
    return preg_match('/^(?=.*[a-zA-Z])(?=.*\d).{8,}$/', $mdp);
}

function estNomUtilisateurValide($username) {
    return filter_var($username, FILTER_VALIDATE_EMAIL);
}
function estEmailValide($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 🔐 Sécurisation des entrées
    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $prenom = htmlspecialchars(trim($_POST['prenom'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $contact = htmlspecialchars(trim($_POST['telephone'] ?? ''));
    $usernom = htmlspecialchars(trim($_POST['username'] ?? ''));
    $fonction = htmlspecialchars($_POST['type_fonction'] ?? '');
    $mdp = $_POST['motdepasse'] ?? '';
    $mdpconf = $_POST['confirmation'] ?? '';
    $mdphache = password_hash($mdp, PASSWORD_DEFAULT);
    $date_inscrit = date('Y-m-d');
    $erreurs = [];

    // ✅ Validations
    if (strlen($nom) < 2) $erreurs[] = "🧾 Nom trop court.";
    if (strlen($prenom) < 2) $erreurs[] = "👤 Prénom trop court.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $erreurs[] = "📧 Adresse e-mail invalide.";
    if (!estNumeroIvoirien($contact)) $erreurs[] = "📱 Numéro ivoirien invalide (01, 05, 07, 25, 27 + 8 chiffres).";
    if (strlen($usernom) < 5 || !estNomUtilisateurValide($usernom)) $erreurs[] = "👥 Nom utilisateur invalide : minuscules, chiffre, '@'.";
    if (!estMotDePasseValide($mdp)) $erreurs[] = "🔐 Mot de passe invalide : 8 caractères minimum, lettre + chiffre.";
    if ($mdp !== $mdpconf) $erreurs[] = "⚠️ Les deux mots de passe ne correspondent pas.";
    if (!in_array($fonction, ['userv','userstock','usersecretaire','usercomptable','useradminAP','useradminAG','userinfos']))
        $erreurs[] = "🎭 Fonction non reconnue.";

    if (!empty($erreurs)) {
        // ❌ Affichage des erreurs
        foreach ($erreurs as $erreur) {
            echo "<p style='color:red;'>$erreur</p>";
        }
        echo '<script>setTimeout(() => { window.location.href = "../index.html"; }, 8000);</script>';
    } else {
        try {
            // 🔍 Vérification de l'existence de l'utilisateur
            $requete = $pdo->prepare('SELECT * FROM utilisateur WHERE NOM = :NOM AND PRENOM = :PRENOM AND CONTACT_TEL = :CONTACT_TEL AND MAIL = :MAIL');
            $requete->execute([
                ':NOM' => $nom,
                ':PRENOM' => $prenom,
                ':CONTACT_TEL' => $contact,
                ':MAIL' => $email
            ]);
            $utilisateur_existe = $requete->fetch();

            if (!$utilisateur_existe) {
                // 🔍 Vérification du statut membre
                $requete = $pdo->prepare('SELECT * FROM membres WHERE NOM = :NOM AND PRENOM = :PRENOM AND CONTACT = :CONTACT AND MAIL = :MAIL');
                $requete->execute([
                    ':NOM' => $nom,
                    ':PRENOM' => $prenom,
                    ':CONTACT' => $contact,
                    ':MAIL' => $email
                ]);
                $membre = $requete->fetch();

                if ($membre) {
                    // 📥 Insertion utilisateur
                    $stmt = $pdo->prepare("INSERT INTO utilisateur (NOM, PRENOM, CONTACT_TEL, MAIL, FONCTION, NOM_UTILISATEUR, DATE_AJOUT) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$nom, $prenom, $contact, $email, $fonction, $usernom, $date_inscrit]);
                    $userId = $pdo->lastInsertId();

                    // 🔑 Insertion login
                    $stmtLogin = $pdo->prepare("INSERT INTO login (ID_UTILISATEUR, USER_NAME, MOT_DE_PASSE, TYPE_COMPTE, DATE_CREATION) VALUES (?, ?, ?, ?, ?)");
                    $stmtLogin->execute([$userId, $usernom, $mdphache, $fonction, $date_inscrit]);

                    // 🎉 Confirmation
                    echo "<div style='color:green;text-align:center;'><strong>✅ Inscription réussie pour M. " . htmlspecialchars($prenom) . " Vous serez invité à vous connecter dans 5 secondes.</strong></div>";
                    echo '<script>setTimeout(() => { window.location.href = "../index.html"; }, 5000);</script>';
                } else {
                    // ❌ Non autorisé
                    echo "<div style='color:red;text-align:center;'><strong>❌ Vous n'êtes pas autorisé à créer un compte. Veuillez contacter un administrateur.</strong></div>";
                    echo '<script>setTimeout(() => { window.location.href = "../index.html"; }, 5000);</script>';
                }
            } else {
                // ❌ Déjà existant
                echo "<div style='color:red;text-align:center;'><strong>⚠️ Cet utilisateur existe déjà. Veuillez vous connecter.</strong></div>";
                echo '<script>setTimeout(() => { window.location.href = "../index.html"; }, 5000);</script>';
            }
            } catch (PDOException $e) {
    echo "<p style='color:red;'>Erreur PDO : " . $e->getMessage() . "</p>";
    error_log("Erreur PDO : " . $e->getMessage());
    // ...
} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo "<div style='color:red;text-align:center;'><strong>🚨 Erreur serveur. Veuillez contacter un administrateur.</strong></div>";
    echo '<script>setTimeout(() => { window.location.href = "../index.html"; }, 5000);</script>';
}
    }
} else {
    // ❌ Méthode non autorisée
    echo "<div style='color:red;text-align:center;'><strong>⛔ Méthode non autorisée.</strong></div>";
    echo '<script>setTimeout(() => { window.location.href = "../index.html"; }, 5000);</script>';
}
?>

