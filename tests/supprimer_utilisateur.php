<?php
session_start();
 ?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" >
    <title>Supprimer utilisateur</title>
  </head>
  <body>


    <h1> Etes vous sur de vouloir supprimer votre compte ? </h1>

      <form action="" method="post">
        <br />
               <input type="checkbox" name="oui" id="oui" /> <label for="oui">OUI</label><br />
               <input type="checkbox" name="non" id="non" /> <label for="steak">NON</label><br />


        <input type="submit" name="Valider" value="envoyer">
      </form>
      <?php if (isset($erreur)):
        echo $erreur;
       ?>
  </body>
</html>



<?php

  if (isset($_POST['Valider']) AND !empty($_POST['Valider']=='envoyer')):
  {
    if (isset($_POST['oui']) and !empty($_POST['oui']))
        {
            try
            {
            $bdd = new PDO('mysql:host=localhost; dbname=hbo-bdd', 'root', '');
            }
            catch (Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }

              $sup_utilisateur=$bdd->prepare('DELETE * FROM utilisateur WHERE pseudo=? ');
              $sup_utilisateur->execute($_SESSION['pseudo']);
              echo'Votre mdp et pseudo on été supprimés';
              exit;

        }
    else {
      $delai=1;
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
