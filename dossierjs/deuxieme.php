document.getElementById("articleForm").addEventListener("submit", function(event) {
    // Empêcher l'envoi du formulaire si validation échoue
    event.preventDefault();

    let codeArticle = document.getElementById("codearticle").value.trim();
    let libelleArticle = document.getElementById("libellearticle").value.trim();
    let prixVente = document.getElementById("prixvente").value.trim();
    let dateApprovision = document.getElementById("datejrs").value;

    if (!codeArticle || !libelleArticle || !prixVente || !dateApprovision) {
        alert("Tous les champs sont requis !");
        return;
    }

    if (isNaN(prixVente) || Number(prixVente) <= 0) {
        alert("Veuillez entrer un prix valide !");
        return;
    }

    // Si tout est valide, envoyer le formulaire
    this.submit();
});

document.getElementById("articleForm").addEventListener("submit", function() {
        let code_article = document.getElementById("codearticle").value.trim();
        let libelle_article = document.getElementById("libellearticle").value.trim();
        let prix_vente= document.getElementById("prixvente").value;
        let date_jrs = document.getElementById("datejrs").value;
    
        // Vérification que tous les champs sont remplis

        if (!code_article || !libelle_article || !prix_vente || !date_jrs) {
            alert("Tous les champs doivent être remplis !");
            return;
        }
    
        // Vérification du prix (doit être un nombre positif)
        if (isNaN(prix_vente) || prix_vente <= 0) {
            alert("Le prix doit être un nombre positif !");
            return;
        }
        // Vérification de la date (ne doit pas être vide)
        if (new Date(date_jrs) || new Date(date_jrs)!= new Date()) {
            alert("Merci de bien vouloir entrer la date du jour !");
            return;
        }
        // Si tout est valide, envoyer le formulaire
    //this.submit();
});

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codeArticle = $_POST["codearticle"];
    $libelleArticle = $_POST["libellearticle"];
    $prixVente = $_POST["prixvente"];
    $dateApprovision = $_POST["datejrs"];

    // Connexion à la base MySQL
    $conn = new mysqli("localhost", "votre_utilisateur", "votre_mot_de_passe", "votre_base_de_donnees");

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $sql = "INSERT INTO articles (code_article, libelle, prix_vente, date_approvision)
            VALUES ('$codeArticle', '$libelleArticle', '$prixVente', '$dateApprovision')";

    if ($conn->query($sql) === TRUE) {
        echo "L'article a été enregistré avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
