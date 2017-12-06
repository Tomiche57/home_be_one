<?php session_start();
$_SESSION['pseudo']=$_POST['pseudo'];
?>

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
     $url='http://localhost/tests/home_be_one/connexion_gustave.php';
    /* $prenom=$_POST['prenom'] ; */
    /*$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);*/  //hacher le mot de passe
    $requser = $bdd->prepare('SELECT id FROM utilisateur WHERE pseudo = :pseudo AND mdp= :mdp ');
    $requser->execute(array('pseudo' => $_POST['pseudo'],
        'mdp' => $_POST['mdp']));

    $resultat = $requser->fetch();  ?>

    <?php
    if ($resultat==0)
    {

        echo 'erreur de saisie';
        header("Refresh: $delai;url=$url");


    }
    else

    {
        $_SESSION['pseudo']=$_POST['pseudo'];
        $delai=1;
        $url='http://localhost/tests/home_be_one/accueil_connecte_okok.php';
        echo 'Veuillez patienter svp';
        header("Refresh: $delai;url=$url");
        exit();
    }  ?>


</html>
