<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/deconnexion.css">
    <title></title>
  </head>
  <body>
  	
<?php
$_SESSION = array();
session_destroy();
header('Location: http://localhost/home_be_one/tests/PageAccueil.php') ;
?>



  </body>
</html>
