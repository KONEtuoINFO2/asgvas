<?php
header("Content-Type: application/json");

include("../dataconect/config.inc.php");

if ($conn->connect_error) {
    die(json_encode(["message" => "Erreur de connexion à la base de données"]));
}

$id = $_GET["ID_Article"]; // Récupère l'ID de l’article à supprimer

$sql = $conn->prepare("DELETE FROM article WHERE ID_Article = $id");
$sql->bind_param("ID_Article", $id);

if ($sql->execute()) {
    echo "Article supprimé avec succès";
} else {
    echo json_encode(["message" => "Erreur lors de la suppression"]);
}

$conn->close();
?>