<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<title> Script généré </title>
</head>
<body>
<?php

$boucle = $_GET['boucle'];
			$e = 1;
			$erreur = 0;
			$laster = 0;
			$suiv = 0;
			$prec = 0;
			for($ee = 1; $ee <= $boucle; $ee++)
			{
				
				// récupération des numéros d'entrées

				$batnum = 'batnum_'.$e.'';
				$battype = 'battype_'.$e.'';
				$batcible = 'batcible_'.$e.'';
				$depl = 'depl_'.$e.'';
				$comment = 'comment_'.$e.'';
				$action = 'action_'.$e.'';
				$parret = 'parret_'.$e.'';
				
				$n = $e + 1;
				$nextbatnum = 'batnum_'.$n.'';
				$nextbattype = 'battype_'.$n.'';
				$nextaction = 'action_'.$n.'';
				$nextbatcible = 'batcible_'.$n.'';
				$nextdepl = 'depl_'.$n.'';
				$nextparret = 'parret_'.$n.'';
				$prec = $e - 1;
				
									
						

						
				if (isset($_GET[$action]))
				{
				
				$final = '';
				
				$final = ''.htmlspecialchars($_GET[$action]).'';
				
				 	
						
					// récupère le type ou/et ne numéro du bâtiment
					if ($_GET[$battype] != '' && $_GET[$batnum] != '' && $_GET[$battype] != 'numero')
					{
						$final .= ' '.htmlspecialchars($_GET[$battype]).' '.htmlspecialchars($_GET[$batnum]).'';
					}
					elseif ($_GET[$battype] != '' && $_GET[$batnum] == '' && $_GET[$battype] != 'numero')
					{
						$final .= ' '.htmlspecialchars($_GET[$battype]).'';
					}
					elseif ($_GET[$battype] == 'numero' && $_GET[$batnum] != '')
					{
						$final .= ' '.htmlspecialchars($_GET[$batnum]).'';
					}	
					elseif ($_GET[$battype] != '' && $_GET[$batnum] == '' && $_GET[$battype] == 'numero') //si rien n'a été entré, une erreur
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
					
				$final .= ' : MOV';
				if ($_GET[$batcible] != '')
				{
				$final .= ' '.htmlspecialchars($_GET[$batcible]).'';
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
				$final .= ' '.htmlspecialchars($_GET[$depl]).'';
				
				if (isset($_GET[$parret]) && $_GET[$parret] == 'stop')
				{
					$final .= '.';
				}	
				if ($n > 0 && $suiv == 0) { echo '<br>'; }
				if ($_GET[$comment] != '' && $_GET[$comment] != ' ') // Vérification de l'existance de commentaire
				{
				$commentaire = htmlspecialchars($_GET[$comment]);
				
				echo '# '.$commentaire.'<br>';
				}
				if ($suiv == 0) {
				echo ''.htmlspecialchars($final).''; }
				
										// vérficication de l'action suivante par rapport a la précédente
							if (isset($_GET[$nextaction]))
							{	
							if ($n > 0 && $_GET[$nextbatnum] == $_GET[$batnum] && $_GET[$nextbattype] == $_GET[$battype] && $_GET[$nextaction] == $_GET[$action])
							{
								if ($_GET[$nextbattype] != '' && $_GET[$nextbatnum] == '' && $_GET[$nextbattype] == 'numero')
									{ 
										$laster = $erreur;
										$erreur++;
										
									}
									else
									{	
								$nextfinal = ', MOV '.htmlspecialchars($_GET[$nextbatcible]).' '.htmlspecialchars($_GET[$nextdepl]).'';
								
								
									if (isset($_GET[$nextparret]) && $_GET[$nextparret] == 'stop')
									{
										$nextfinal .= '.';
									}	
									echo $nextfinal;
									$suiv = 1;
								$e++;	
								}
								if ($erreur > $laster)
								{
								$e++;
								$laster = $erreur;
								continue;
								}
								
								
							}
							else {
								$suiv = 0;
								}
							}
				
				$e++;
				}
				

				
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
