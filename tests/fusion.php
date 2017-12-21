<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="fusion.css">
		<title></title>
	</head>
	<body>

	</body>
</html>

<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bdd_hbo;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$req_piece = $bdd->prepare('SELECT nom, type FROM piece WHERE pseudo=?'); //Pour l'instant manuellement pour test mais apres : pseudo=?
$req_piece->execute(array($_SESSION['pseudo']));

//On boucle sur les pieces puis dans chaque boucle de piece on boucle sur les capteurs
while ($piece = $req_piece->fetch())
{

	echo '<div class="block_piece">';
	if ($piece['type']=="salon")
	{?>
		<img class="icone_piece" src="image/icone_salon.png" alt="" />'
		<?php
	}
	if ($piece['type']=="chambre")
	{?>
		<img class="icone_piece" src="image/icone_chambre.png" alt="" />
		<?php
	}
	if ($piece['type']=="cuisine")
	{?>
		<img class="icone_piece" src="image/icone_cuisine.png" alt="" />
		<?php
	}
	if ($piece['type']=="salle de bain")
	{?>
		<img class="icone_piece" src="image/icone_salle_de_bain.png" alt="" />
		<?php
	}
	if ($piece['type']=="garage")
	{?>
		<img class="icone_piece" src="image/icone_garage.png" alt="" />
		<?php
	}
	echo '<span id="piece">';
  echo  $piece['nom'].'</br>';
	echo '</span>';
  $req_capteur = $bdd->prepare('SELECT nom, etat, valeur, type FROM capteurs WHERE pseudo=? AND piece=?');
  $req_capteur->execute(array($_SESSION['pseudo'], $piece['nom']));
  while ($capteur = $req_capteur->fetch())
  {
		if ($capteur['type']=="temperature")
		{
			$capteur['type']="°C";
		}
		elseif ($capteur['type']=="pression")
		{
			$capteur['type']="Pascal";
		}
		elseif ($capteur['type']=="luminosite")
		{
			$capteur['type']="Lux";
		}
		elseif ($capteur['type']=="humidite")
		{
			$capteur['type']="%";
		}
		if ($capteur['etat']=="non" OR $capteur['valeur']==NULL) //Si le capteur présente un problème
	  {
			echo '<span class="probleme_capteur">';
	    echo 'Le capteur de '.$capteur['nom'].' présente un problème ! </br>';
			echo '</span>';
	  }
		if ($capteur['etat']=="ok" AND $capteur['valeur']!==NULL) //Si pas de problème
		{
		echo '<ul id="capteur">';
		echo '<li>';
    echo $capteur['nom'] .' : '. $capteur['valeur'] . ' '. $capteur['type'];
		echo '</li>';
		echo '</ul>';
		}
  }

  $req_capteur->closeCursor();
	echo '</div>';
}


$req_piece->closeCursor();

?>
