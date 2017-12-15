<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/connexion.css">
</head>
<body>
<div id="block_connexion">
  <h1 class="connect">Connecte toi !</h1>
    <form method="post" action='connexion_gustave_cible.php'>
   	 <p>
   	 <fieldset class="champs">
   		 <legend>Vos identifiants</legend>
   		 <label for="pseudo">Entrez votre pseudo:</label>
   			 <input type="pseudo" name="pseudo" id="pseudo" required /><br/>
   			 <label for="mdp">Entrez votre mot de passe:</label>
   			 <input type="password" name="mdp" id="mdp" required /><br/>
   	 </fieldset>
   	 <input type="submit" id="send" value="Se connecter" />
    </form>
</div>
<img src="image/logo_home.png" alt="home_be_one" />
</body>
</html>
