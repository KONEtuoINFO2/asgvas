<?php
header("Content-Type: application/json");

include("../dataconect/config.inc.php");

if ($conn->connect_error) {
    die(json_encode(["message" => "Erreur de connexion à la base de données"]));
}

$id = $_POST["id"];
$code = $_POST["codearticle"];
$libelle = $_POST["libellearticle"];
$prix = $_POST["prixvente"];
$date = $_POST["dateappro"];

$sql = $conn->prepare("UPDATE articles SET codearticle=?, libellearticle=?, prixvente=?, dateapprovisionnement=? WHERE id=?");
$sql->bind_param("ssdsi", $code, $libelle, $prix, $date, $id);

if ($sql->execute()) {
    echo json_encode(["message" => "Article modifié avec succès"]);
} else {
    echo json_encode(["message" => "Erreur lors de la modification"]);
}

$conn->close();
?>