<?php
session_start();
 ?>
<!DOCTYPE html>

<html>
  <head>


    <meta charset="utf-8" >
    <link rel="stylesheet" href="css/supprimer_utilisateur.css">
    <title>Supprimer utilisateur</title>
  </head>
  <body>


    <h1> Etes vous sur de vouloir supprimer votre compte ? </h1>
    <div id="form">
      <form action="" method="post">
        <br />
               <input type="checkbox" name="oui" id="oui" /> <label for="oui">OUI</label><br />
               <input type="checkbox" name="non" id="non" /> <label for="steak">NON</label><br />


        <input type="submit" name="Valider" value="envoyer">
    </div>    
      </form>
      <?php if (isset($erreur))
        echo $erreur;
       ?>
  </body>
</html>
<?php

  if (isset($_POST['Valider']) AND !empty($_POST['Valider']=='envoyer'))
  {
    if (isset($_POST['oui']) and !empty($_POST['oui']) AND empty($_POST['non']))
        {
            try
            {
            $bdd = new PDO('mysql:host=localhost; dbname=bdd_hbo', 'root', '');
            }
            catch (Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }
              $pseudo_supprimé=$_SESSION['pseudo'];
              $sup_utilisateur=$bdd->prepare('DELETE FROM utilisateur WHERE pseudo=? ')  or die(print_r($bdd->errorInfo()));
              $sup_utilisateur->execute(array($pseudo_supprimé)) or die(print_r($bdd->errorInfo()));
              $delai=2;
              $url='http://localhost/home_be_one/tests/accueil_connecte_okok.php';
              echo 'Votre mdp et pseudo ont été supprimé';
              header("Refresh: $delai;url=$url");
        }
    else
      {
      $delai=2;
      $url='http://localhost/home_be_one/tests/accueil_connecte_okok.php';
      echo 'Vous êtes redirigé(é) vers votre page d\'accueil ';
      header("Refresh: $delai;url=$url");
          }

  }
else
    {
    $erreur=" Veuillez choisir votre réponse !";
    exit;
    }

 ?>
