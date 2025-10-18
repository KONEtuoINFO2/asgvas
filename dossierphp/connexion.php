
<?php
session_start();
require_once '../dataconect/config.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = htmlspecialchars(trim($_POST['login'] ?? ''));
    $mdp = htmlspecialchars(trim($_POST['mdp'] ?? ''));

    $stmt = $pdo->prepare('SELECT * FROM login WHERE USER_NAME = :USER_NAME AND MOT_DE_PASSE = :MOT_DE_PASSE');
    $stmt->bindParam(':USER_NAME', $login, PDO::PARAM_STR);
    $stmt->bindParam(':MOT_DE_PASSE', $mdp, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($mdp, $user['MOT_DE_PASSE'])) {
        $_SESSION['user_id'] = $user['ID_UTILISATEUR'];
        $_SESSION['username'] = $user['USER_NAME'];
        $_SESSION['type_compte'] = $user['TYPE_COMPTE'];

        echo "<div style='background-color:#ffebee; color:#c62828; padding:25px; margin:60px auto; width:60%; text-align:center; font-size:18px; font-family:sans-serif; border-radius:10px; border:2px solid #c62828;'>✅ Bienvenue <strong>$login</strong> !<br>Redirection dans 4 secondes…</div>";
        echo '<script>setTimeout(() => { window.location.href = "../dossierphp/menu.php"; }, 3000);</script>';
    } elseif ($user) {
        echo "<div style='background-color:#ffebee; color:#c62828; padding:25px; margin:60px auto; width:60%; text-align:center; font-size:18px; font-family:sans-serif; border-radius:10px; border:2px solid #c62828;'>❌ Mot de passe incorrect pour <strong>$login</strong> !</div>";
        echo '<script>setTimeout(() => { window.location.href = "../index.html"; }, 5000);</script>';
    } else {
        echo "<div style='background-color:#ffebee; color:#c62828; padding:25px; margin:60px auto; width:60%; text-align:center; font-size:18px; font-family:sans-serif; border-radius:10px; border:2px solid #c62828;'>👤 Aucun compte trouvé pour <strong>$login</strong>. Redirection vers l’inscription…</div>";
        echo '<script>setTimeout(() => { window.location.href = "../fichierhtml/forminscription.html"; }, 5000);</script>';
    }
}
?>