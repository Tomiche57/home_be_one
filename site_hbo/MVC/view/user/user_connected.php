<?php

session_start();

$_SESSION['id']=
$_SESSION['statut']= //Soit admin soit user (on prendra de la bdd mais on peut taper manuellement pour l'instant pour faire des tests)

if ($_SESSION['statut']=='user')
  {
    require('controller/user/user_controller.php');//On appelle la page qui contient les fonction définie pour le user

    if (isset($_GET['action']))
      {
        if ($_GET['action']=='gotodomicile')
          {
            gotodomicile();
          }
        elseif ($_GET['action']=='gotoconsommation')
          {
            gotoconsommation();
          }
        elseif ($_GET['action']=='gotoprofile')
          {
            gotoprofile();
          }

        //etc...
      }
  }

 ?>
