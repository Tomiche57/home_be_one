<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="css/supprimer_capteur.css">


    <title>Supprimer piece</title>
  </head>
  <body>
      <h1>Quel pièce souhaitez vous supprimer ? </h1>



          <h2>ATTENTION SI VOUS SUPPRIME UNE PIECE ALORS LES CAPTEURS ASSOCIES SERONT SUPPRIMES !</h2>



      <form method="post" action="">

        <tr>
            <td align="right">
              <label for="capteurs">Pièces</label>
            </td>

                <td>
                      <?php
                      echo'<select name="choix_pieces">';

                        try
                        {
                         $bdd = new PDO('mysql:host=localhost;dbname=bdd_hbo;charset=utf8', 'root', '');
                        }
                        catch (Exception $e)
                        {
                                die('Erreur : ' . $e->getMessage());
                        }

                        $req_piece = $bdd->prepare('SELECT nom FROM piece WHERE pseudo=?');
                        $req_piece->execute(array($_SESSION['pseudo']));
                        while ($piece= $req_piece->fetch())
                        {
                          ?>
                          <option value="<?php echo $piece['nom']; ?>"> <!--La valeur à envoyer à la bdd est le nom de la pieces-->
                            <?php echo $piece['nom']; ?>
                          </option>
                          <?php
                        }
                     echo '</select>';
                     ?>
                </td>
        </tr>
    <input type="submit" name="envoyer" value="valider">


  </body>
</html>

<?php

if (isset($_POST['envoyer']) AND !empty($_POST['envoyer']=='valider'))
{
          try
          {
          $bdd = new PDO('mysql:host=localhost; dbname=bdd_hbo', 'root', '');
          }
          catch (Exception $e)
          {
          die('Erreur : ' . $e->getMessage());
          }
            $piece_supprimé=$_SESSION['pseudo'];
            $sup_piece=$bdd->prepare('DELETE FROM piece WHERE pseudo=? ')  or die(print_r($bdd->errorInfo()));
            $sup_piece->execute(array($piece_supprimé)) or die(print_r($bdd->errorInfo()));

              $capteur_supprimé=$_SESSION['pseudo'];
              $sup_capteurs=$bdd->prepare('DELETE FROM capteurs WHERE pseudo=? ')  or die(print_r($bdd->errorInfo()));
              $sup_capteurs->execute(array($capteur_supprimé)) or die(print_r($bdd->errorInfo()));
            $delai=2;
            $url='http://localhost/home_be_one/tests/accueil_connecte_okok.php';
            echo 'la piece a bien été supprimée ';
            header("Refresh: $delai;url=$url");






}
else {
  echo"Veuillez remplir le formulaire";
}

 ?>
