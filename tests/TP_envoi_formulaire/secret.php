<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Voilà la page que tu veux</title>
  </head>
  <body>
    <?php
    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe']=="kangourou")
    {
    ?>

    <p>Voici les codes d'acces : E0EIEZ-FGPLR-RPKRP</p>

    <?php
    }
    else
    {
      echo '<p>Le mot de passe saisi est incorrect</p>';
    }
    ?>


  </body>
</html>
