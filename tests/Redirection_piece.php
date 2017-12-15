<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <?php
	try
    	{
   	$bdd = new PDO('mysql:host=localhost;dbname=bdd_hbo;charset=utf8', 'root', ''); //se connecter à la BDD
    	}
	catch(Exception $e)
    	{
    	die('Erreur : '.$e->getMessage());
    	}
	/*$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);*/ //hacher le mot de passe
	$req = $bdd->prepare('INSERT INTO piece(nom, pseudo) VALUES(?,?)');
	$req->execute(array($_POST['nom'], $_SESSION['pseudo']));

	header('Location: gerer_domicile.php');

	?>


</body>
</html>
