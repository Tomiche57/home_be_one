<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/catalogue.css">
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

    $req_produit = $bdd->query('SELECT * FROM catalogue');
    ?>
    <div class="gros_block">
    <?php

    while ($produit=$req_produit->fetch())
    {
      ?>
      <div class="block_catalogue">
        <h1 class="nom_produit"><?php echo $produit['nom']; ?> (n° de série : <?php echo $produit['numero']; ?>)</h1><br/>
        <img class="catalogue" src="<?php echo $produit['image']; ?>" alt="" />
        <p class="description_produit"><?php echo $produit['description']; ?> (ajouté le : <?php echo $produit['date']; ?>)</p>
        <span class="prix">Disponible en magasin à seulement <?php echo $produit['prix']; ?>€ !</span>
      </div>
      <?php
    }
    ?>
