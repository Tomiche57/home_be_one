<?php
//Ici on va aller chercher les infos liés aux users dans la bdd pour pouvoir définir les fonctions dans user_controller.php

//D'abord on se connecte à la bdd
function bdd_connect()
{
  try
    {
    	  $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));//Modifier avec le bon nom de la bdd
    }
  catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
}




 ?>
