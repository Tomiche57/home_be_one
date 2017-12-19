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
	 /*

	 // Varibale d'erreur par soucis de lisibilité
// Evite d'imbriquer trop de if/else, on pourrait aisément s'en passer
$error = false;

// On définis nos constantes
$newName = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
$path = "home_be_one/tests/image"
$legalExtensions = array("JPG", "PNG", "GIF");
$legalSize = "10000000" // 10000000 Octets = 10 MO

// On récupères les infos
$file = $_FILES["image_produit"];
$actualName = $file['tmp_name'];
$actualSize = $file['size'];
$extension = pathinfo($file['MY_FILE'], PATHINFO_EXTENSION);

// On s'assure que le fichier n'est pas vide
if ($actualName == 0 || $actualSize == 0) {
    $error = true;
}

// On vérifie qu'un fichier portant le même nom n'est pas présent sur le serveur
if (file_exists($path.'/'.$newName.'.'.$extension)) {
    $error = true;
}

// On effectue nos vérifications réglementaires
if (!$error) {
    if ($actualSize < $legalSize) {
        if (in_array($extension, $legalExtensions)) {
            move_uploaded_file($actualName, $path.'/'.$newName.'.'.$extension);
        }
    }
}

else {

    // On supprime le fichier du serveur
    @unlink($path.'/'.$newName.'.'.$extension);

    echo "Une erreur s'est produite";

}

	  */
   $date_ajout = date('d/m/Y');

	 if(!empty($_POST['nom_produit']) AND !empty($_POST['numero_produit']) AND !empty($_POST['description_produit']) AND
	 !empty($_POST['prix_produit']) AND !empty($_POST['image_produit']) AND !empty($_POST['date_ajout']))
	 {
		 $ajout = $bdd->prepare('INSERT INTO catalogue (nom, numero, description, prix, image, date_ajout) VALUES(?, ?, ?, ?, ?, ?)');
		 $ajout->execute(array($nom_produit, $numero_produit, $description_produit, $prix_produit, $image_produit, $date_ajout));
		 //header('Location: ???????')  on met ici l'adresse de la page d'accueuil de l'admin

	 }
	 else
	 {

		 echo 'Veuillez remplir tous les champs';
	 }
 }
?>
