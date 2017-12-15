<?php session_start(); ?>

<html>
<head>
      <title>Pièces</title>
      <meta charset="utf-8">
</head>
<body style="background-color: #0080D1;">
  <?php include('new_header.php');?>
      <div align="center">
               <h2 style ="color: red;">Ajouter des capteurs</h2>
          <br/><br />
         <form method="POST" action="redirection_capteur.php">
            <table>
               <tr>
                  <td align="right">
                     <label for="numero_de_serie">Numéro de série</label>
                  </td>
                  <td>
                     <input type="text" placeholder="numero_de_serie" id="numero_de_serie" name="numero_de_serie" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="nom">Nom</label>
                  </td>
                  <td>
                     <input type="text" placeholder="nom" id="nom" name="nom" />
                  </td>
               </tr>
               <tr>
                 <td align="right">
                   <label for="piece">Pièce</label>
                 </td>
                 <td>
                   <?php
                   echo'<select name="choix10">';

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
                     while ($piece = $req_piece->fetch())
                     {
                       ?>
                       <option value="<?php echo $piece['nom']; ?>"> <!--La valeur à envoyer à la bdd est le nom de la pièce-->
                         <?php echo $piece['nom']; ?>
                       </option>
                       <?php
                     }
                  echo '</select>';
                  ?>
                 </td>
               </tr>
               <tr>
                 <td align="right">
                   <label for="type">Type</label>
                 </td>
                 <td>
                   <select name="choix11">
                      <option value="temperature">Température</option>
                      <option value="pression">Pression</option>
                      <option value="luminosite">Luminosité</option>
                      <option value="camera">Caméra</option>
                  </select>
                 </td>
               </tr>
            </table>
            <input type = "submit" id = "send" value = "Ajouter" />
         </form>
      </div>
      <?php include('footer.php');?>
</body>
</html>
