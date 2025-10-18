<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--achatpopup-->
			<div class="popup" id="popup-overlayachat">
				<h3 class="popup-achat">ACHATS</h3>
				<a href="javascript:void(0)" id="close-popupachat" class="popup-exitachat">&times;</a>
				<div class="popup-contentachat">
					<h1 class="popup-achat">DONNEES DES ACHATS EFFECTUEES</h1>
					<div class="popup-tableauachat">
					<?php
			include("../dataconect/config.inc.php");

			// Récupérer les articles
				$sql = "SELECT * FROM approvisionnement";
				$result = $conn->query($sql);
				echo " <table class='tableauachat'> ";
							echo " <thead class='enteteachat'>";
							echo " <tr><th>Code Article</th><th>Libelle Article</th><th>Prix Achat</th><th>Quantité Achat</th><th>Montant Achat</th><th>Date Achat</th><th>Actions</th></tr> ";
							echo "</thead> ";
							while ($row = $result->fetch_assoc()) {
						echo "<tr>
						<td>{$row['Code_Article']}</td>
						<td>{$row['Libelle_Article']}</td>
						<td>{$row['Prix_Achat']}</td>
						<td>{$row['Quantite_Achat']}</td>
						<td>{$row['Montant_Achat']}</td>
						<td>{$row['Date']}</td>
						<td>
							<button onclick='modifierArticle({$row['ID_APPROV']})'>Modifier</button>
							<button onclick='supprimerArticle({$row['ID_APPROV']})'>Supprimer</button>
						</td>
					  </tr>";
			}
			
			echo "</table>";
			
			$conn->close();
			?>
					</div>	
						<p class="popup-btnachat">
							<button id="open-Popup-ajouter-achat" style="background-color: blue; border: 2PX solid #FFFFFF; font-size:2.5em;color: #FFFFFF; border-radius: 5px 5px 5px 5px;">AJOUTER</button></br></br>
							<button style="background-color: green;border: 2PX solid #FFFFFF; font-size:2.3em;color: #FFFFFF; border-radius: 5px 5px 2px 5px;">MODIFIER</button></br></br>
							<button style="background-color:red;border: 2PX solid #FFFFFF; font-size:2em;color: #FFFFFF; border-radius: 5px 5px 5px 5px;">SUPPRIMER</button><br><br>
							<button style="background-color:aqua;border: 2PX solid #FFFFFF; font-size:2em;color: #000; border-radius: 5px 5px 5px 5px; width:90%;">IMPRIMER</button>

						</p>
						
				</div>
			</div>
			<!--sous popup pour formulaire achat-->
			
<div id="popup-Ajoutachat" class="popup-formachat">
	<h3 class="popup-achata">ACHAT</h3>
	<a href="javascript:void(0)" id="close-popupformachat" class="popup-exitsachat">&times;</a>
	<div class="popup-formachat">
		<div class="formachat">
		<form method="post" action="javascript:void(0)">
			<fieldset class="popup-cadre1-achat" id="achat">
				<legend class="info-achat">Information sur l'article!</legend>
				<button style="width: 90%; padding: 0%;" onclick="choixArticle">Choix de l'article</button><br>
			<label>Code Article:</label><br><input class="champlonga" type="text" id="" disabled ><br>
			<label>Libellé Article :</label><br><input class="champlonga" type="text" id="" disabled><br>
			</fieldset>
			<fieldset class="popup-cadre2-achat">
				<legend class="info-achat">Information sur l'achat</legend>
			<label>Prix d'achat:</label><br><input class="champlongb" type="text" id=""><br>
			<label>Quantité acheté:</label><br><input class="champcourtb" type="number" min="1" id=""><br>
			<label>Montant achat:</label><br><input class="champlongb" type="text" required id="" disabled><br>
			<label>Date achat:</label><br><input class="champlongb" type="date" id=""><br>
			</fieldset>
		</form>
	</div>
	<p class="popup-btnachat-form">
		<button onclick="validerDonnees('valider')" class="valider">VALIDER</button>
	</p>
	</div>
	</div>
</body>
</html>