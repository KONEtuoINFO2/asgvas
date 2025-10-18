<?php
session_start();

if (!isset($_SESSION['type_compte'])) {
    header("Location: ../index.html");
    exit();
}

$type = $_SESSION['type_compte'];
echo $type;
if ($type === 'useradminAP') {
    echo "<a href='admin_ap.php'>📋 Panel Admin AP</a>";
} elseif ($type === 'userstock') {
    echo "<a href='stock.php'>📦 Gestion du Stock</a>";
} elseif ($type === 'usercomptable') {
    echo "<a href='compta.php'>💰 Comptabilité</a>";
} else {
    echo "<a href='dashboard.php'>👤 Tableau de bord</a>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../dossiercss/menu.css">
	<link rel="stylesheet" href="../dossiercss/csspopup.css">
	<title>ACCEUIL</title>
	<script src="../dossierjs/menu.js"></script>
	<script src="../dossierjs/modifier_article.js"></script>
	<script src="../dossierjs/supprimer_article.js"></script>
	<script src="../dossierjs/traitementformulaire.js" defert></script>
</head>
<body>
	<div class="titre">
		<p>APPLICATION SIMPLIFIER DE GESTION DES STOCK DES VENTES ET DES ACHATS</p>
	</div>
	<div class="contener">
	<div class="menu">
		<button id="open-Popup-vente" style="color: green;">GESTION DES VENTES</button>
		<button id="open-Popup-approv" style="color: brown;">GESTION DES ARTICLES</button>
		<button id="open-Popup-achat"  style="color:  blue;">APPROVISION-NEMENT</button>
		<button id="open-facture"  style="color: hwb(240 11% 56%);">FACTURATION</button>
		<button id="open-tcd"  style="color: #066388;">TABLEAU DE BORD</button>
		<button id="open-Popup-CF" style="color: blueviolet;">CLIENTS/FOURNISEURS</button>
		<button id="open-devis" style="color: #066388;">GESTION DES DEVIS</button>
		<button id="open-comptable" style="color: red;">FEUILLES COMPTABLE</button>
		<button id="open-bilan" style="color: black;">BILAN/RAPPORT</button>
		<button id="open-Popup-user"style="color: black;"><a href="adminpanel.php">⚙️ Administrateur</a></button>	
		<button id="open-Popup-user"style="color: black;"><a href="logout.php">🚪 Déconnexion</a></button>


	</div>
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
</div></div>
</body>
</html>
