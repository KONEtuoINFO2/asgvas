<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--popup client fourniseur-->
	<div class="popup" id="popup-overlay-CF">
		<h3 class="popup-CF">CLIENT/FOURNISSEUR</h3>
		<a href="javascript:void(0)" id="close-popupCF" class="popup-exitCF">&times;</a>
		<div class="popup-contentCF">
			<h1 class="popup-CF-liste">LISTE DES CLIENTS ET FOURNISSEUR</h1>
			<div class="popup-tableauCF">
			<?php
			include("../dataconect/config.inc.php");

			// Récupérer les articles
				$sql = "SELECT * FROM client_fournisseur";
				$result = $conn->query($sql);
				echo " <table class='tableauCF'> ";
							echo " <thead class='enteteCF'>";
							echo " <tr><th>NOM</th><th>PRENOM</th><th>ADRESSE</th><th>MAIL</th><th>CONTACT</th><th>DATE</th><th>STATUS</th>
							<th>Actions</th></tr> ";
							echo "</thead> ";
							while ($row = $result->fetch_assoc()) {
						echo "<tr>
						<td>{$row['NOM']}</td>
						<td>{$row['PRENOM']}</td>
						<td>{$row['ADRESSE']}</td>
						<td>{$row['MAIL']}</td>
						<td>{$row['CONTACTE']}</td>
						<td>{$row['DATE']}</td>
						<td>{$row['Statut']}</td>
						<td>
						
							<button onclick='modifierArticle({$row['Id_CF']})'>Modifier</button>
							<button onclick='supprimerArticle({$row['Id_CF']})'>Supprimer</button>
						</td>
					  </tr>";
			}
			
			echo "</table>";
			
			$conn->close();
			?>

			</div>	
			<p class="popup-btnCF">
				<button id="open-Popup-ajouter-CF" style="background-color: indigo; border: 2PX solid #FFFFFF; font-size:2.5em;color: #FFFFFF; border-radius: 5px 5px 5px 5px;">AJOUTER</button></br></br>
				<button style="background-color: blue;border: 2PX solid #FFFFFF; font-size:2.3em;color: #FFFFFF; border-radius: 5px 5px 2px 5px;">MODIFIER</button></br></br>
				<button style="background-color:red;border: 2PX solid #FFFFFF; font-size:2em;color: #FFFFFF; border-radius: 5px 5px 5px 5px;">SUPPRIMER</button><br><br>
				<button style="background-color:aqua;border: 2PX solid #FFFFFF; font-size:2em;color: #000; border-radius: 5px 5px 5px 5px;width:90%">IMPRIMER</button>
			</p>
				
		</div>
	</div>
	<!--sous formulaire ajout client fournisseur-->
	
<div id="popup-Ajout-CF" class="popup-formCF">
<h3 class="popups-CF">AJOUT CF</h3>
<a href="javascript:void(0)" id="close-popupformCF" class="popup-exitsCF">&times;</a>
<div class="popup-formCF">

<form id="envoieformulairecf">
	<fieldset class="popup-cadrecf" id="cf">
		<legend class="info-cf">Information sur le Client/fournisseur!</legend>
	<label>NOM CF:</label><br><input type="text" required id=""><br>
	<label>PRENOM:</label><br><input type="text" required id="" ><br>
	<label>Type CF:</label><br>
	<select class="chois" id="">
		<option value="selectionner un type"></option>
		<option value="C">CLIENT</option>
		<option value="F">FOURNISSEUR</option>
	</select><br>
	<label>Contacte:</label><br><input type="tel" required id="" ><br>
	<label>E-Mail CF:</label><br><input type="mail" required id="" ><br>
	<label>Ville CF:</label><br><input type="texte" required id="" ><br>
	<label>Adresse:</label><br><input type="texte" required id="" ><br>
	</fieldset>
	<p class="popup-btnCF-form">
		<button type="reset" class="cfannuler">Annuler</button>
		<button id="validerDonneescf" class="validercf">valider</button>
	</p>
</form>
</div>

</div>
</div>

</body>
</html>