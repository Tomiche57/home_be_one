<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bdd_hbo;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['ajout_produit']))
{
   $nom_produit = htmlspecialchars($_POST['nom_produit']);
   $numero_produit = htmlspecialchars($_POST['numero_produit']);
   $description_produit = htmlspecialchars($_POST['description_produit']);
   $prix_produit = htmlspecialchars($_POST['prix_produit']);
   $image_produit = $_POST['image_produit'];
   $date_ajout = date('d/m/Y');

	 if(!empty($_POST['nom_produit']) AND !empty($_POST['numero_produit']) AND !empty($_POST['description_produit']) AND
	 !empty($_POST['prix_produit']) AND !empty($_POST['image_produit']))
	 {
		 $ajout = $bdd->prepare('INSERT INTO catalogue (nom, numero, description, prix, image, date_ajout) VALUES(?, ?, ?, ?, ?, ?)');
		 $ajout->execute(array($nom_produit, $numero_produit, $description_produit, $prix_produit, $image_produit, $date_ajout));
		 //header('Location: ???????')  on met ici l'adresse de la page d'accueuil de l'admin

	 }
}
	 else
	 {

		 echo 'Veuillez remplir tous les champs';
	 }
?>
