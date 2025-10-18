<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <!--ajout de  vente-->
			<div class="popup" id="popup-overlay">
				<h3 class="popup-espace">VENTE</h3>
				<a href="javascript:void(0)" id="close-popup" class="popup-exit">&times;</a>
				<div class="popup-content">
					<h1 class="popup-vente">DONNEES DES VENTES EFFECTUEES</h1>
					
					<div class="popup-tableauv">
					<?php
			include("../dataconect/config.inc.php");

			// Récupérer les articles
			
				$sql = "SELECT * FROM vente";
				$result = $conn->query($sql);
				echo " <table class='tableauv'> ";
							echo " <thead class='entetev'>";
							echo " <tr><th>Code Article</th><th>Libelle Article</th><th>Prix de Vente</th><th>Quantité</th>
							<th>Montant total</th><th>Date de vente</th><th>Action✏️</th><th>Action🗑️</th></tr> ";
							echo "</thead> ";
							while ($row = $result->fetch_assoc()) {
						echo "<tr>
						<td>{$row['Code_Article']}</td>
						<td>{$row['Libelle_Article']}</td>
						<td>{$row['Prix_Vente']}</td>
						<td>{$row['Quantite_Vente']}</td>
						<td>{$row['Montant_Vente']}</td>
						<td>{$row['Date']}</td>
						<td>
							<button onclick='modifierArticle({$row['ID_VENTE']})'>✏️ Modifier</button>
							</td>
							<td>
							<button onclick='supprimerArticle({$row['ID_VENTE']})'>🗑️ Supprimer</button>
						</td>
					  </tr>";
			}
			
			echo "</table>";
			
			$conn->close();
			?>
					</div>	
						<p class="popup-btnvente">
							<button id="open-Popup-ajouter" style="background-color: green; border: 2PX solid #FFFFFF; font-size:2.5em;color: #FFFFFF; border-radius: 5px 5px 5px 5px;">📄Ajouter</button></br></br>
							<button onclick="modifier()"style="background-color: blue;border: 2PX solid #FFFFFF; font-size:2.3em;color: #FFFFFF; border-radius: 5px 5px 2px 5px;">✏️Modifier</button></br></br>
							<button onclick="imprimer()"style="background-color:red;border: 2PX solid #FFFFFF; font-size:2em;color: #FFFFFF; border-radius: 5px 5px 5px 5px;">🗑️Supprimer</button></br></br>
							<button onclick="imprimer()"style="background-color:#00ffff;border: 2PX solid #FFFFFF; font-size:2em;color: #000; border-radius: 5px 5px 5px 5px; width:90%; ">🧾Imprimer</button>
						</p>
				</div>
			</div>
			<!--popup pour formulaire ajouter vente-->
<div id="popup-Ajout" class="popup-form">
	<h3 class="popup-espace">VENTE</h3>
	<a href="javascript:void(0)" id="close-popupform" class="popup-exit">&times;</a>
	<div class="popup-form">
		<div class="form">
		<form method="post" action="javascript:void(0)">
			<fieldset class="popup-cadre1-vente" id="vente">
				<legend class="info-article">Information sur l'article!</legend>
				 <!-- Sélection des articles --> 
			  <button style="width: 90%; padding: 0%;">-- Choisir un article --</button><br>
			<label>Code Article:</label><br><input type="text" required name="IdArticle" id="" disabled><br>
			<label>Libellé Article :</label><br><input type="text" required name="libelleArticle" id="" disabled>
			</fieldset>
			<fieldset class="popup-cadre2-vente">
				<legend class="info-vente">Information sur la vente</legend><br>
			<label>Prix:</label><input class="champlong" id="pu" type="number" readonly><br>
			<label>Quantité:</label><input class="champcourt" id="qte" type="number" value="1" min="1">
			stock:<input class="champcourt" type="text" id="" disabled><br>
			<label>Montant:</label><input class="champlong" id="montant" type="number" readonly><br>
			<label>Date :</label><input class="champlong" type="date" id="" disabled>
			</fieldset>
		</form>
	</div>
	</div>
	<p class="popup-facture-formv"> Code Facture:<input type="text" name="codfact" disabled placeholder="Fact16/11/2024A 346" id="code-factv"> 
	
	</p>
		<div class="popup-tableauformfactc">
			<table class="tableaufactc">
				<thead class="entetefactc">
					<tr>
					<th>Code Article</th>
					<th>Libelle Article</th>
					<th>Prix de Vente</th>
					<th>Quantité Vente</th>
					<th>Montant Vente</th>
					<th>Date Vente</th>
					<th>Facture</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>HP001PC</td>
					<td>ORDINATEUR PORTBLE HP G </td>
					<td>450000</td>
					<td>2</td>
					<td>900000</td>
					<td>16 OCTOBRE 2024</td>
					<td>Fact16/11/2024A 346</td>
				</tr>
				<tr>
					<td>HP001PC</td>
					<td>ORDINATEUR PORTBLE HP G </td>
					<td>450000</td>
					<td>2</td>
					<td>900000</td>
					<td>16 OCTOBRE 2024</td>
					<td>Fact16/11/2024A 346</td>
				</tr>
				<tr>
					<td>HP001PC</td>
					<td>ORDINATEUR PORTBLE HP G </td>
					<td>450000</td>
					<td>2</td>
					<td>900000</td>
					<td>16 OCTOBRE 2024</td>
					<td>Fact16/11/2024A 346</td>
				</tr>
				<tr>
					<td>HP001PC</td>
					<td>ORDINATEUR PORTBLE HP G </td>
					<td>450000</td>
					<td>2</td>
					<td>900000</td>
					<td>16 OCTOBRE 2024</td>
					<td>Fact16/11/2024A 346</td>
				</tr>
			</tbody>
			</table>
		</div>	
			<p class="popup-btnvente-form">
				<button onclick="ajouterLigne()" class="ajouter" >AJOUTER A LA LISTE</button>
				
				<button onclick="genererFacture()" class="validerv">PASSER A LA CAISSE</button>
			</p>
	</div>
</div>
 
</body>
</html>