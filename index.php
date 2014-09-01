<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title> Générateur lolscript pour Lands Of Lords v3 </title>
<style>
body {
background-color : #dbdbdb;
text-align : center;
}
input {
color : blue;
}
input#envoi {
color : black;
}
#entete {
padding-top : 0;
} 
#footer {
clear : bot;
}
</style>
</head>
<body>
<div id="entete"> <!-- auto promo, a retirer si gênant j'ai mis par habitude -->
<a href="http://s3.landsoflords.fr/index.php?id=7299" title="Lands Of Lords" target="_blank"><img src="http://s3.landsoflords.fr/img/banners/lol468x60.fr.jpg" alt="banner"/></a>
</div>
<br><br><br><br>
<div id="corps">
	<h3><u> Générateur de script "lolscript" </u></h3>
	<br><br>
	<p><u>Rappel :</u> L'ordre de lecture du script est haut en bas, donc faites attentions à l'ordre où <br> vous entrez les instructions.<br> Le numéro se trouve à coté du nom du bâtiment. </p>
	<br>
	<br><br>
<div id="formulaire1">
<form method="get" action="#">
<p>Nombre d'action que le script doit effectuer : <input type="number" name="nbentre"> <input type="submit" id="envoi" value="Envoyer"> </p> 
</form>
<br>
</div>

<div id="formulaire2">
<?php

if (isset($_GET['nbentre']) && $_GET['nbentre'] > 0 )
{
	$boucle = $_GET['nbentre'];
	?>
	<form method="get" action="traitlol.php" target="_blank">
	<input type="hidden" value="5" name="val">
	<input type="hidden" value="<?php echo $boucle;?>" name="boucle">
	<?php
	$c = 1;
	for ($co = 1; $co <= $boucle; $co++)
	{
		?>
		Ajouter un commentaire (facultatif) : <input type="text" size="60" name="comment_<?php echo $c;?>"><br>
		<p> Lorsque le bâtiment 
		
		<select name="battype_<?php echo $c;?>">
		<option value="numero" selected="selected">Choisissez un bâtiment ou/et entrez un numéro de bâtiment</option>
		<optgroup label="action">
		<option value="CLF">Défrichage</option>
		<optgroup>
		<optgroup label="Bâtiments de production">
		<option value="WCH">Cabane de bûcherons</option>
		<option value="TRH">Cabane de trappeurs</option>
		<option value="BYD">Briqueterie</option>
		<option value="QRY">Carrière</option>
		<option value="MQR">Carrière de marbre</option>
		<option value="IMN">Mine de fer</option>
		<option value="GMN">Mine d'or</option>
		<option value="SMN">Soufrière</option>
		<option value="BWF">Fabrique d'arcs</option>
		<option value="CBF">Fabrique d'arbalètes</option>
		<option value="ARM">Armurerie</option>
		<option value="ARF">Fabrique d'armures</option>
		<option value="STB">Ecuries</option>
		</optgroup>
		<optgroup label="Alimentation">
		<option value="FLD">Champ de blé</option>
		<option value="WDM">Moulin à vent</option>
		<option value="BKY">Boulangerie</option>
		<option value="PFD">Rizière</option>
		<option value="ORC">Verger</option>
		<option value="GDN">Potager</option>
		<option value="VYD">Vignoble</option>
		<option value="FRM">Ferme</option>
		<option value="BTC">Abattoirs</option>
		<option value="DCK">Docks</option>
		</optgroup>
		<optgroup label="Habitations">
		<option value="WDW">Maisons en bois</option>
		<option value="BDW">Maisons en brique</option>
		<option value="SDW">Maisons en pierre</option>
		<option value="PDW">Maisons sur pilotis</option>
		<option value="MNR">Manoir</option>
		<option value="PAL">Palais</option>
		<option value="CMP">Camp</option>
		</optgroup>
		<optgroup label="Stockage">
		<option value="BRN">Grange</option>
		<option value="WRH">Entrepôt</option>
		<option value="GRY">Greniers</option>
		</optgroup>
		<optgroup label="Bâtiments commerciaux">
		<option value="BNK">Banque</option>
		<option value="STL">Echoppes</option>
		<option value="MKT">Marché couvert</option>
		<option value="PRT">Port</option>
		</optgroup>
		<optgroup label="Bâtiments défensifs">
		<option value="WAL">Murs</option>
		<option value="GAT">Porte</option>
		<option value="TWR">Tour</option>
		<option value="BRK">Caserne</option>
		<option value="ALC">Guilde des alchimistes</option>
		<option value="CSL">Château</option>
		</optgroup>
		<optgroup label="Bâtiment mobile">
		<option value="SHP">Navire</option>
		</optgroup>
		<optgroup label="Autres">
		<option value="SQR">Place du village</option>
		<option value="WBR">Pont de bois</option>
		<option value="SBR">Pont de pierre</option>
		<option value="TVN">Taverne</option>
		<option value="UNV">Université</option>
		<option value="SCL">Ecole</option>
		<option value="HSP">Hôpital</option>
		<option value="TPL">Temple</option>
		<option value="CPL">Chapelle</option>
		<option value="OGN">Jardin</option>
		<option value="STT">Statue</option>
		<option value="TYD">Lices</option>
		<option value="ART">Site archéologique</option>
		<option value="SRC">Source magique</option>
		<option value="TGT">Portail</option>
		</optgroup>
		<optgroup label="Les Sept Merveilles">
		<option value="WN1">Grande Pyramide</option>
		<option value="WN2">Jardins Suspendus</option>
		<option value="WN3">Grand Temple</option>
		<option value="WN4">Statue de Qallash</option>
		<option value="WN5">Mausolée de Baighôn</option>
		<option value="WN6">Colosse</option>
		<option value="WN7">Grand Phare</option>
		</optgroup>
		</select>
		<input type="text" name="batnum_<?php echo $c;?>">
		
		
		est/a 
		<select name="action_<?php echo $c;?>">
		<option value="ATT">Attaqué</option>
		<option value="PRD">Produit</option>
		<option value="">Défrichage</option>
		</select>
	
		<br> déplace la ressource :
		<select name="depl_<?php echo $c;?>">
		<option value="WOD">Bois</option>
		<option value="BRK">Briques</option>
		<option value="STN">Pierre</option>
		<option value="MRB">Marbre</option>
		<option value="IRN">Fer</option>
		<option value="GLD">Or</option>
		<option value="SUL">Soufre</option>
		<option value="BOW">Arcs</option>
		<option value="CBW">Arbalètes</option>
		<option value="SWD">Epées</option>
		<option value="ARM">Armures</option>
		<option value="WHT">Blé</option>
		<option value="FLR">Farine</option>
		<option value="BRD">Pain</option>
		<option value="RCE">Riz</option>
		<option value="BER">Bière</option>
		<option value="FRT">Fruits</option>
		<option value="VGT">Légumes</option>
		<option value="GRP">Raisin</option>
		<option value="WIN">Vin</option>
		<option value="FSH">Poisson</option>
		<option value="CTL">Bovins</option>
		<option value="HRS">Chevaux</option>
		<option value="SHP">Moutons</option>
		<option value="MLK">Lait</option>
		<option value="CHS">Fromage</option>
		<option value="MET">Viande</option>
		<option value="SMT">Salaisons</option>
		<option value="OLV">Olives</option>
		<option value="OIL">Huile</option>
		<option value="SLT">Sel</option>
		<option value="SKN">Peaux</option>
		<option value="WHL">Laine</option>
		<option value="FUR">Fourrurres</option>
		<option value="WOL">Eau de vie</option>
		<option value="EGG">Oeuf de dragon</option>
		<option value="HRN">Corne des dragons</option>
		<option value="BAX">Hâche de guerre</option>
		<option value="SHD">Bouclier magique</option>
		<option value="CBL">Boule de cristal</option>
		<option value="SXT">Sextant</option>
		<option value="GRL">Graal</option>
		</select>
		
		 dans le bâtiment numéro <input type="text" name="batcible_<?php echo $c;?>"><br>
		 Si cette action ce produit, arrêter l'exécution du script ? <input type="checkbox" name="parret_<?php echo $c;?>" value="stop"> (point d'arrêt) <br>
		 
		 <br><br>____________________________________<br></p>
		<?php
		$c++;
	}
		?>
	<input type="submit" id="envoi" value="générer">
	</form>
	</div>
		<p>
		
		
	<?php 
		}
	?>
	</p>
	</div>
	<br><br><br>
	<div id="footer">
	<p>Développé pour aider à organiser la création de script sur le jeu Lands Of Lords, et surtout éviter de chercher l'ID d'un type de bâtiment ou de ressource. <br>
	Pour plus d'information sur le lolscript : <a href="http://forum.landsoflords.fr/showthread.php?2253-Tutoriel-Lolscript" target="_blank"> voir le tutoriel du forum </a>.<br><br></p>
	<!-- auto promo, a retirer si gênant j'ai mis par habitude -->
	<a href="http://s3.landsoflords.fr/index.php?id=7299" title="Lands Of Lords" target="_blank"><img src="http://s3.landsoflords.fr/img/banners/lol468x60.fr.jpg" alt="banner"/></a>
	<br>
	</div>
	</body>
	</html>	
				
				
				
				
				
				
				
			
