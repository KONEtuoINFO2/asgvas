<?php
session_start();
session_unset(); // Supprime toutes les variables de session
session_destroy(); // Détruit la session

// Message de confirmation stylé
echo "<div style='
    background-color: #eafaf1;
    color: #2ecc71;
    padding: 20px;
    margin: 50px auto;
    width: 60%;
    text-align: center;
    font-size: 18px;
    font-family: sans-serif;
    border-radius: 10px;
    border: 2px solid #2ecc71;
'>
    ✅ Vous avez été déconnecté avec succès.<br><br>
    Redirection vers la page d’accueil dans 3 secondes…
</div>";

// Redirection automatique
echo '<script>
    setTimeout(() => {
        window.location.href = "../index.html";
    }, 3000);
</script>';
?>