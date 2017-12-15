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
	$req = $bdd->prepare('INSERT INTO capteurs (nom, pseudo, numero_de_serie, piece, type) VALUES(?,?,?,?,?)');
	$req->execute(array($_POST['nom'], $_SESSION['pseudo'], $_POST['numero_de_serie'], $_POST['choix10'], $_POST['choix11']));

	header('Location: gerer_domicile.php');

	?>


</body>
</html>
