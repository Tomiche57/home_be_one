<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/gerer_domicile.css">
    <title></title>
  </head>
  <body>
    <?php include('new_header.php');?>
    <!--AJOUTER FIL ARIANE-->

    <div id="consigne">
    <!-- Je veux mettre le titre en haut à gauche de la case consigne c'est pour ca que j'ai mis un class=titre sauf que ca marche pas si quelqu'un trouve je lui taille une pipe-->
    <h4 class="titre">Choix de la consigne :</h4>

    <p>
        <input type="checkbox" name="case" id="case" />
         <label for="case">Consigne 1</label>

         <br />

        <input type="checkbox" name="case" id="case" />
         <label for="case">Consigne 2</label>

         <br />

        <input type="checkbox" name="case" id="case" />
         <label for="case">Consigne 3</label>

         <br />

        <input type="checkbox" name="case" id="case" />
         <label for="case">Consigne 4</label>

         <br />

        <input type="checkbox" name="case" id="case" />
         <label for="case">Consigne 5</label>
    </p>

    </div>
    <div id="plan_maison">
      <p>
        <img src="image/plan_maison.png" alt="plan" />
      </p>
    </div>
    <div id="capteurs">
      <a href="mes_capteurs_et_cameras.php">Mes capteurs et caméras</a>
    </div>


    <?php include('footer.php');?>

  </body>
</html>
