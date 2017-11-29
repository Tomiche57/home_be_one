<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	 <meta charset="utf-8" />
</head>
<body>

   $bdd = new PDO('mysql:host=localhost;dbname=base_de_donnes_home_be_one;charset=utf8', 'root', '');

	<h2> Connecte toi avec tes identifiants !</h2>
  <?php
   
  $pseudo_connect=htmlspecialchars($_POST['pseudo_connect']);
  $mdp_connect=htmlspecialchars($_POST['mdp_connect']);

  if (!empty($pseudo_connect) AND !empty($mdp_connect)) 
    {
      $requser=bdd->prepare('SELECT * FROM  utilisateur WHERE pseudo=? AND mdp=?');
      $requser->execute(array($pseudo_connect, $mdp_connect)); 
      $userexist=$requser->rowCOUNT();
      if(userexist==1)
        {
          echo'bienvenue ! '
        }
      else
      {

        
      }

  else
  {
    echo' les champs ne sont pas remplis';
  }





  ?>
     
<table>
   
	<form action="connexion_cible.php"  method="POST">

  <tr>
  	<td>	
		<label for="pseudo_connect">Entre ton pseudo:
    </td>
  	<td>		
    	</label><input type="text" name="pseudo_connect" id="pseudo_connect" placeholder="Ex: Tonio">
    </td>  
  </tr>
 
  	<td>		
		  <label for="mdp_connect">Entre ton mot de passe:
    </td>
    <td>		
    	</label><input type="password" name="mdp_connect" id="mdp_connect" placeholder="Ex: zozo">
    </td>  
  </tr>
</table>
	</form>

  <input type="submit" name="Valider">
	
</body>
</html>