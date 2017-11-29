<?php session_start();?>


<!DOCTYPE html>

    
    <?php
    
    // Vérification des identifiants
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=base_de_donnes_home_be_one;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    
     $delai=2;
     $url='http://localhost/tests/requete_php_mysql/session_start/connexion_gustave.php';
    /* $prenom=$_POST['prenom'] ; */
    /*$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);*/  //hacher le mot de passe
    $requser = $bdd->prepare('SELECT id FROM utilisateur WHERE pseudo = :pseudo AND mdp= :mdp ');
    $requser->execute(array('pseudo' => $_POST['pseudo'],
        'mdp' => $_POST['mdp']));
    
    $resultat = $requser->fetch();  ?>
 
    <?php
    if ($resultat==0)
    {  
        header('http://localhost/tests/requete_php_mysql/session_start/connexion_gustave.php') ;
        echo 'erreur de saisie';
        header("Refresh: $delai;url=$url");

    }
    else
    {    
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] =$resultat['pseudo'];
        $_SESSION['mdp']=$resultat['mdp'];
        $_SESSION['mail']=$resultat['mail'];
        echo $_SESSION['pseudo'];
        header('Location: http://localhost/tests/requete_php_mysql/session_start/accueil_connecte_ok.php');
        exit();
    }  ?>  
    

</html>
