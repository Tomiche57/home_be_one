<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
      <title> Modifier mon profil </title>
      <meta charset="utf-8">
</head>
<body style="background-color: #0080D1;">
      <div align="center">
        <?php

        $bdd = new PDO('mysql:host=localhost;dbname=bdd_hbo;charset=utf8', 'root', '');
         $requser=$bdd->prepare('SELECT * FROM utilisateur WHERE pseudo=? ');
         $requser->execute(array($_SESSION['pseudo']));
         $_SESSION=$requser->fetch();
       ?>
               <h2 style ="color: red;">Profil de <?php echo $_SESSION['pseudo'];?></h2>
          <br />

            <h2 style="text-align: center;"> Mail= <?php echo $_SESSION['mail'];?> </h2>
            <h2 style=" text-align: center;color:">Pseudo = <?php echo $_SESSION['pseudo'];?> </h2>
            <h2 style=" text-align: center;color:">MOT DE PASSE = <?php echo $_SESSION['mdp'];?> </h2>



            <h3 style="color:red">  Modifier mes infos</h3>



            <form action="http://localhost/home_be_one/tests/edition_profil_cible.php" method="POST">

               <label for="new_pseudo">Nouveau pseudo :</label><input type="text" name="new_pseudo" id="new_pseudo"></br>
               <label for="new_mdp">Nouveau mot de passe :</label><input type="password" name="new_mdp" id="new_mdp"></br>

               <label for="new_mdp2">Confirmation nouveau mot de passe :</label><input type="password" name="new_mdp2" id="new_mdp2"></br>
               <label for="new_mail">Changer mon mail : </label><input type="text" name="new_mail" id="new_mail"></br>

              <input type="submit" name="Valider modifications">

              </form>
                  <a href="http://localhost/home_be_one/tests/accueil_connecte_okok.php">Revenir à l'acceuil</a>


            </br>
          </br>

            </br>
          </br>

            </br>
          </br>

            </br>
          </br>

            </br>
          </br>

            </br>
          </br>



            <?php include('footer.php');?>


            </form>





      </div>
</body>
</html>
