<?php session_start();
$_SESSION['pseudo']=$_POST['pseudo'];
?>

<!DOCTYPE html>


    <?php

    // Vérification des identifiants
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_hbo;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

     $delai=2;
     $url='http://localhost//home_be_one/tests/connexion_gustave.php';
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
        $req_session=$bdd->prepare('SELECT ID from utilisateur WHERE pseudo= ?');
        $req_session->execute(array($_SESSION['pseudo']));
        $_SESSION = $req_session->fetch();
        $delai=1;
        $url='http://localhost/home_be_one/tests/accueil_connecte_okok.php';
        echo 'Veuillez patienter';
        header("Refresh: $delai;url=$url");
        $req_session=$bdd->prepare('SELECT ID from utilisateur WHERE pseudo= ?');
        $req_session->execute(array($_SESSION['pseudo']));
        $_SESSION = $req_session->fetch();
        exit();
    }  ?>


</html>
