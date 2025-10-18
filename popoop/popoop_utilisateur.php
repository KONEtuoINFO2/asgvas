<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--popup autilisateur-->
<div class="popup" id="popup-overlay-user">
	<h3 class="popup-user">UTILISATEUR</h3>
	<a href="javascript:void(0)" id="close-popupuser" class="popup-exituser">&times;</a>
	<div class="popup-contentuser">
		<h1 class="popup-user-liste">LISTE DES UTILISATEURS</h1>
		<div class="popup-tableau-user">
		<?php
			include("../dataconect/config.inc.php");

			// Récupérer les articles
				$sql = "SELECT * FROM utilisateur";
				$result = $conn->query($sql);
				echo " <table class='tableau-user'> ";
							echo " <thead class='entete-user'>";
							echo " <tr><th>NOM</th><th>PRENOM</th><th>SEXE</th>
							<th>DATE DE NAISSANCE</th><th>ADRESSE</th><th>CONTACTE</th><th>MAIL</th><th>FONCTIO</th><th>LOGIN</th>
							<th>DATE DE PRISE DE SERVICE</th><th>CODE SERVICE</th> <th>ACTIONS</th></tr> ";
							echo "</thead> ";
							while ($row = $result->fetch_assoc()) {
						echo "<tr>
						<td>{$row['NOM']}</td>
						<td>{$row['PRENOM']}</td>
						<td>{$row['SEXE']}</td>
						<td>{$row['DATE_NAISSE']}</td>
						<td>{$row['ADRESSE']}</td>
						<td>{$row['CONTACT_TEL']}</td>
						<td>{$row['MAIL']}</td>
						<td>{$row['FONCTION']}</td>
						<td>{$row['NOM_UTILISATEUR']}</td>
						<td>{$row['DATE_AJOUT']}</td>
						<td>{$row['CODE_SERVICE']}</td>
						
						<td>
							<button onclick='modifierArticle({$row['ID_UTILISATEUR']})'>Modifier</button>
							<button onclick='supprimerArticle({$row['ID_UTILISATEUR']})'>Supprimer</button>
						</td>
					  </tr>";
			}
			
			echo "</table>";
			
			$conn->close();
			?>
		</div>	
		<p class="popup-btn-user">
			<button id="open-Popup-ajouter-user" style="background-color: gray; border: 2PX solid #FFFFFF; font-size:2.5em;color: #FFFFFF; border-radius: 5px 5px 5px 5px;">AJOUTER</button></br></br>
			<button style="background-color: blue;border: 2PX solid #FFFFFF; font-size:2.3em;color: #FFFFFF; border-radius: 5px 5px 2px 5px;">MODIFIER</button></br></br>
			<button style="background-color:red;border: 2PX solid #FFFFFF; font-size:2em;color: #FFFFFF; border-radius: 5px 5px 5px 5px;">SUPPRIMER</button><br><br>
			<button style="background-color:aqua;border: 2PX solid #FFFFFF; font-size:2em;color: #000; border-radius: 5px 5px 5px 5px;width:90%">IMPRIMER</button>
		</p>
	</div>
</div>
<!--sous formulaire ajout utilisateur-->

<div id="popup-Ajout-user" class="popup-formuser">
<h3 class="popups-user">UTILISATEUR</h3>
<a href="javascript:void(0)" id="close-popupformuser" class="popup-exitsuser">&times;</a>
<div class="popup-formuser">

<form id="envoieformulaireuser">
<fieldset class="popup-cadreuser" id="user">
	<legend class="info-user">Information sur l'utilisateur!</legend>
<label>NOM :</label><br><input type="text" required  id=""><br>
<label>PRENOM :</label><br><input type="text" required id=""><br>
<label>Type :</label><br>
<select class="courtuser" id="">
	<option value="adminin">Categorie 1</option>
	<option value="supper">Categorie 2</option>
	<option value="autre">Categorie 3</option>
</select><br>
<label>Fonction:</label><br><select class="courtuser" id="">
	<option value="adminin">Vendeur</option>
	<option value="supper">Gestionnaire de stock</option>
	<option value="cais">Suppervisseur</option>
	<option value="cmpt">Comptable</option>
	<option value="stock">Administrateur</option>
</select><br>
<label>Service:</label><br><select class="courtuser" id="">
	<option value="adminin">Vendeur</option>
	<option value="supper">Gestionnaire de stock</option>
	<option value="cais">Suppervisseur</option>
	<option value="cmpt">Comptable</option>
	<option value="stock">Administrateur</option>
</select><br>
<label>CONTACTE:</label><br><input type="tel" required name="dateaprov" id="date_aprov" ><br>
<label>E-MAIL:</label><br><input type="mail" required name="dateaprov" id="date_aprov" ><br>
<label>VILLE:</label><br><input type="text" required name="dateaprov" id="date_aprov"><br>
<label>Adresse:</label><br><input type="text" required name="dateaprov" id="date_aprov" ><br>
</fieldset>
<p class="popup-btnuser-form">
	<button type="reset" id="validerDonneeuser" class="annuler-user">ANNULER</button>
	<button id="validerDonneeuser" class="valider-user">VALIDER</button>
</p>
</form>
</div>
</div>
</body>
</html>