<?php

if(file_exists('compteur_gen.txt'))
{
$compteur_f = fopen('compteur_gen.txt', 'r+');
$compte = fgets($compteur_f);
}
else
{
$compteur_f = fopen('compteur_gen.txt', 'a+');
$compte = 0;
}

$_SESSION['compteur_de_visite'] = 'visite';
$compte++;
fseek($compteur_f, 0);
fputs($compteur_f, $compte);

fclose($compteur_f);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title> Script généré </title>
</head>
<body>
<?php
// ajouter le choix selon erreur
$boucle = $_GET['boucle'];
			$e = 1;
			$erreur = 0;
			$laster = 0;
			for($ee = 1; $ee <= $boucle; $ee++)
			{
				
				// récupération des numéros d'entrées
				// $att = "attaquer_".$e."";
				// $prd = "produit_".$e."";
				$batnum = "batnum_".$e."";
				$battype = "battype_".$e."";
				$batcible = "batcible_".$e."";
				$depl = "depl_".$e."";
				$comment = "comment_".$e."";
				$action = "action_".$e."";
				$parret = "parret_".$e."";
				
				
				$final = "";
				
				$final = "".htmlspecialchars($_GET[$action])."";
				
				/*
				// Attaqué ou produit (version case cochable, retiré pour éviter des erreurs)
				if (isset($_GET[$att]))
				{
					$final = "ATT";
				}
				elseif (isset($_GET[$prd]))
				{
					$final = "PRD";
				}
				else // si rien n'a été sélectionner ou les 2, une erreur se produit
				{
								$laster = $erreur;
								$erreur++;	
				}	
				if ($erreur > $laster) // vérification de la présence d'érreur, passe l'entrée si il y en a une
				{
					$e++;
					$laster = $erreur;
					continue;
				}	
				else
				{			
				*/				
					// récupère le type ou/et ne numéro du bâtiment
					if ($_GET[$battype] != "" && $_GET[$batnum] != "" && $_GET[$battype] != "numero")
					{
						$final .= " ".htmlspecialchars($_GET[$battype])." ".htmlspecialchars($_GET[$batnum])."";
					}
					elseif ($_GET[$battype] != "" && $_GET[$batnum] == "" && $_GET[$battype] != "numero")
					{
						$final .= " ".htmlspecialchars($_GET[$battype])."";
					}
					elseif ($_GET[$battype] == "numero" && $_GET[$batnum] != "")
					{
						$final .= " ".htmlspecialchars($_GET[$batnum])."";
					}	
					elseif ($_GET[$battype] != "" && $_GET[$batnum] == "" && $_GET[$battype] == "numero") //si rien n'a été entré, une erreur
					{
						$laster = $erreur;
						$erreur++;
					}
							
						if ($erreur > $laster) // vérifie l'absence d'erreur
						{
						$e++;
						$laster = $erreur;
						continue;
						}
						else
						{
					
				$final .= " : MOV";
				if ($_GET[$batcible] != "")
				{
				$final .= " ".htmlspecialchars($_GET[$batcible])."";
				}
				else
				{
					$laster = $erreur;
					$erreur ++;
				}
					if ($erreur > $laster)
					{
					$e++;
					$laster = $erreur;
					continue;
					}
				$final .= " ".htmlspecialchars($_GET[$depl])."";
				
				if ($_GET[$parret] == "stop")
				{
					$final .= ".";
				}	
				
				if ($_GET[$comment] != "" && $_GET[$comment] != " ") // Vérification de l'existance de commentaire
				{
				$commentaire = htmlspecialchars($_GET[$comment]);
				
				echo "# ".$commentaire."<br>";
				}
				
				echo "".htmlspecialchars($final)." <br> ";
				
				$e++;
				
				}
				
			}
			echo "<br><br><br><br><br>";
			if ($erreur > 0) // Avertissement de la présence d'erreur si il y en a
			{
				echo "<p><span style=\"color : red;\"> Erreur de sélection de bâtiment : vous n'avez pas fait de choix ou pas de numéro n'a été entré. Nombre de script sautés : ".$erreur." </span></p>";
			}	
?>
</body>
</html>			
