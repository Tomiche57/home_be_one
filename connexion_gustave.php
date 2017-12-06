<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/connexion.css">
</head>
<body style="background-color:  #0080D1;">
    <form method="post" action='connexion_gustave_cible.php'>
   	 <p>
   	 <fieldset>
   		 <legend>Vos identifiants</legend>
   		 <label for="pseudo">Entrez votre pseudo:</label>
   			 <input type="pseudo" name="pseudo" id="pseudo" required /><br/>
   			 <label for="mdp">Entrez votre mot de passe:</label>
   			 <input type="password" name="mdp" id="mdp" required /><br/>
   	 </fieldset>
   	 <input type="submit" id="send" value="Sousmettre" />
    </form>

</body>
</html>
