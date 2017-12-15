    <?php
    session_start()

    ?>

<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_hbo;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }



         $requser=$bdd->prepare('SELECT * FROM utilisateur WHERE pseudo=? ');
         $requser->execute(array($_SESSION['pseudo']));
         $_SESSION=$requser->fetch();

         if (!empty($_POST['new_pseudo']) AND $_POST['new_pseudo']!=$_SESSION['pseudo']) // modife pseudo
          {
             $new_pseudo=htmlspecialchars($_POST['new_pseudo']);
             $insert_pseudo=$bdd->prepare('UPDATE utilisateur SET pseudo= ? WHERE mdp=?');
             $insert_pseudo->execute(array($new_pseudo, $_SESSION['mdp']));
             $url='http://localhost/home_be_one/tests/edition_profil.php';
             $delai=2;
          echo "Votre pseudo a bien été modifié";
          header("Refresh: $delai;url=$url");

          }
           else
              {
                $url='http://localhost/home_be_one/tests/edition_profil.php';
                       $delai=2;
                      echo "erreur";
                      header("Refresh: $delai;url=$url");
              }

          if (!empty($_POST['new_mail']) AND $_POST['new_mail']!=$_SESSION['mail']) //modifie mail
          {
             $new_mail=htmlspecialchars($_POST['new_mail']);
             $insert_mail=$bdd->prepare('UPDATE utilisateur SET mail= ? WHERE pseudo=?');
             $insert_mail->execute(array($new_mail, $_SESSION['pseudo']));
             $url='http://localhost/home_be_one/tests/edition_profil.php';
             $delai=2;
          echo "Votre mail a bien été modifié";
          header("Refresh: $delai;url=$url");
            }
             else
              {
                 $url='http://localhost/home_be_one/tests/edition_profil.php';
             $delai=2;
              echo "erreur";
              header("Refresh: $delai;url=$url");
              }

       if(!empty($_POST['new_mdp']) AND !empty($_POST['new_mdp2'])  AND $_POST['new_mdp'] !=$_SESSION['mdp']) // modifie mdp
          {
                if ($_POST['new_mdp'] == $_POST['new_mdp2'])
                 {
                    $new_mdp=htmlspecialchars($_POST['new_mdp']);
                    $insert_mdp=$bdd->prepare('UPDATE utilisateur SET mdp= ? WHERE mdp=?');
                    $insert_mdp->execute(array($new_mdp, $_SESSION['mdp']));
                    $url='http://localhost/home_be_one/tests/edition_profil.php';
             $delai=2;
          echo "Votre mdp a bien été modifié";
          header("Refresh: $delai;url=$url");

                 }
                else {
                        $url='http://localhost/home_be_one/tests/edition_profil.php';
                       $delai=2;
                      echo "Vos mdp ne correspondent pas";
                      header("Refresh: $delai;url=$url");

                     }
          }

          else{
                  $url='http://localhost/home_be_one/tests/edition_profil.php';
                       $delai=2;
                      echo "erreur";
                      header("Refresh: $delai;url=$url");
              }


    ?>
