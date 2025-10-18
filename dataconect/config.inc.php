<?php
$pdo=new PDO("mysql:host=localhost;dbname=database_apsgvas;charset=utf8","root","");
$servername = "localhost";
$username = "root"; // Change si nécessaire
$password = "";
$dbname = "database_apsgvas";

$conn = new mysqli($servername, $username, $password, $dbname);
// Vérifier la connexion
if ($conn->connect_error) {

    die("Erreur de connexion : " . $conn->connect_error);
}else{
    
}
?>

