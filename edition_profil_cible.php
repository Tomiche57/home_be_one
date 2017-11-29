    <?php 
    session_start()
    ?>

<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=base_de_donnes_home_be_one;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    

    if ($_SESSION['pseudo'])
    {
   
         $requser=$bdd->prepare('SELECT * FROM utilisateur WHERE id=? ');
         $requser->execute(array($_SESSION['id']));
         $user=$requser->fetch();

         if (!empty($_POST['new_pseudo']) AND $_POST['new_pseudo']!=$_SESSION['pseudo'])
            {
             $new_pseudo=htmlspecialchars($_POST['new_pseudo']);  
             $insert_pseudo=$bdd->prepare('UPDATE utilisateur SET pseudo= ? WHERE id=?');
             $insert_pseudo->execute(array($new_pseudo, $_SESSION['id']));
             echo "Votre pseudo a bien été modifié";

            }

              else
                {
                  $msg='Entrez pseudo/ C\'est votre pseudo actuel';
                }
          if (isset($_POST['new_mail']) AND $_POST['new_mail']!=$_SESSION['mail'])
          {
             $new_mail=htmlspecialchars($_POST(['mail']));
             $insert_mail=$bdd->prepare('UPDATE utilisateur SET mail= ? WHERE id=?');
             $insert_mail->execute(array($_POST['mail'], $_SESSION['id']));
             echo "Votre mail a bien été modifié";
            }
             else
              {
              } 
          }     
          if(isset($_POST['new_mdp']) AND isset($_POST['new_mdp2'])  AND $_POST['new_mdp'] !=$_SESSION['mdp'])
          {
                if ($_POST['new_mdp'] == $_POST['new_mdp2'])
                 {
                    $new_mdp=$_POST['new_mdp'];
                    $insert_mdp=$bdd->prepare('UPDATE utilisateur SET mail= ? WHERE id=?');
                    $insert_mdp->execute(array($new_mdp, $_SESSION['id']));
                    echo "Mot de passe modifié !";
                 }
                else {
                        $msg='Vos mdp ne correspondent pas !';
                     } 
          }  
          else{
                 $msg='Entrez votre nouveau mot de passe/ C\'est votre mdp actuel !';
              }     
    
  
?>