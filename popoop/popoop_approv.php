<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    			<!--approvisinnement-->
			
			<div class="popup" id="popup-overlayapprov">
				<h3 class="popup-approv">ARTICLES</h3>
				<a href="javascript:void(0)" id="close-popupapprov" class="popup-exitapprov">&times;</a>
				<div class="popup-contentapprov">
					<h1 class="popup-approv-liste">LISTE DES ARTICLES</h1>
					<div class="popup-tableauapprov">
					<?php
			include("../dataconect/config.inc.php");

			// Récupérer les articles
				$sql = "SELECT * FROM article";
				$result = $conn->query($sql);
				echo " <table class='tableauapprov'> ";
							echo " <thead class='enteteapprov'>";
							echo " <tr><th>Code Article</th><th>Libelle Article</th><th>Prix de Vente</th><th>Date Ajout </th><th>Actions</th></tr> ";
							echo "</thead> ";
							while ($row = $result->fetch_assoc()) {
						echo "<tr>
						<td>{$row['Code_Article']}</td>
						<td>{$row['Libelle_Article']}</td>
						<td>{$row['Prix_Vente']}</td>
						<td>{$row['Date_Ajout']}</td>
						<td>
							<button onclick='modifierArticle({$row['ID_Article']})'>Modifier</button>
							<button onclick='supprimerArticle({$row['ID_Article']})'>Supprimer</button>
						</td>
					  </tr>";
			}
			
			echo "</table>";
			
			$conn->close();
			?>
					</div>	
					<p class="popup-btnapprov">
						<button id="open-Popup-ajouter-aprov" style="background-color: brown; border: 2PX solid #FFFFFF; font-size:2.5em;color: #FFFFFF; border-radius: 5px 5px 5px 5px;">AJOUTER</button></br></br>
						<button style="background-color: blue;border: 2PX solid #FFFFFF; font-size:2.3em;color: #FFFFFF; border-radius: 5px 5px 2px 5px;">MODIFIER</button></br></br>
						<button style="background-color:red;border: 2PX solid #FFFFFF; font-size:2em;color: #FFFFFF; border-radius: 5px 5px 5px 5px;">SUPPRIMER</button></br></br>
						<button style="background-color: #00ffff;border: 2PX solid #FFFFFF; font-size:2em;color: #000; border-radius: 5px 5px 5px 5px; width:90%">IMPRIMER</button>
					</p>
						
				</div>
			</div>
			<!--sous formulaire aprovisionnement-->
<div id="popup-Ajout-aprov" class="popup-formaprov">
	<h3 class="popup-form-aprov">APPROVISIONNEMENT</h3>
	<a href="javascript:void(0)" id="close-popupformaprov" class="popup-exitssaprov">&times;</a>
	<div class="popup-formaprov" method="post">
		<form id="articleForm">
			<fieldset class="popup-cadreaprov" id="aprov">
			<legend class="info-aprov">Information sur l'article!</legend><br>
			<label for= "codearticle" >Code de l'article</label><input type="text" id="codearticle" name="codearticle" required><br>
			<label for="libelearticle" >Libellé de l'article </label><input type="text" id="libellearticle" name="libellearticle" required><br>
			<label for="prixvente" >Prix de vente</label><input type="text" id="prixvente" name="prixvente" required><br>
			<label for="dateaprov" >Date d'approvision</label><input type="date" id="datejrs" name="datejrs" required>
			</fieldset>
		<p class="popup-btnvente-formapprov">
			<button type="reset" id="article-annnuler">ANNULER</button>
			<button type="submit" class="article-valider">VALIDER</button>
		</p>
		</form>
		<div id="message"> </div>
	</div>	
	</div>
</body>
</html>