
<?php
header("Content-Type:application/json");
// Connexion à la base MySQL
$pdo=new PDO("mysql:host=localhost;dbname=database_apsgvas;charset=utf8","root","");
//include("../dataconect/config.inc.php");
//recuperation des donnee formulaire
if($_SERVER["REQUEST_METHODE"]=="POST"){

    $codeArticle=trim($_POST["codearticle"]?? '');
    $libelleArticle=trim($_POST["libellearticle"]?? '');
    
//je verifie si l'article existe deja pour eviter les doublons

$stmt=$pdo->prepare("SELECT COUNT(*) FROM article WHERE Code_Article=:codearticle AND Libelle_Article=:libelleArticle");

    $stmt->bindParam(":libellearticle",$libelleArticle);
    $stmt=execute();
    $existe=$stmt->fetchColumn() > 0 ;
    if($existe){
        echo json_encode(["Success"=>false,"message"=>"Cet article existe déjà!"]);
                }else{
                $prixVente=trim($_POST["prixvente"]?? '');
                $datejrs=trim($_POST["datejrs"]?? '');

                if(!empty($codeArticle) && !empty($libelleArticle) && is_numeric($prixVente) && new date($datejrs)){
                    $stmt=$pdo->prepare("INSERT INTO article (Code_Article,Libelle_Article,Prix_Vente,Date_Ajout) 
                    VALUES (:codeArticle,:libelleArticle,:prixVente,:datejrs)");

                    $stmt->bindParam(":codeArticle",$codeArticle);
                    $stmt->bindParam(":libelleArticle",$libelleArticle);
                    $stmt->bindParam(":prixVente",$prixVente);
                    $stmt->bindParam(":datejrs",$datejrs);
                    $success=$stmt->execute();
                    echo json_encode(["Success"=>$success,"message"=>$success?"Article ajouté avec succès":"Error d'enregistrement"]);
                else{
                     echo json_encode(["Success"=>false,"message"=>"Données invalides"]);
             }
         }
    }
}
?>
    
