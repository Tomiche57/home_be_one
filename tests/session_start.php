<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	 <meta charset="utf-8" />
</head>
<body>

	<h2>Page d'inscription de Home_be_One si tu es allé voir Domisep et c'est ta première connexion !</h2>

     <h4>Si tu n'a pas ta clé d'activation, merci de te rendre en boutique Domisep</h4>





<table>

	<form action="session_start_cible_real.php"  method="POST">

    <tr>
     <td>
      <label for="nom">Entre ton nom:
     </td>
    <td>
      </label><input type="text" name="nom" id="nom" placeholder="Delarue">
    </td>
    </tr>
     <tr>
     <td>
      <label for="prenom">Entre ton prénom:
     </td>
    <td>
      </label><input type="text" name="prenom" id="prenom" placeholder="Pierre">
    </td>
    </tr>
    <tr>
     <td>
      <label for="cle">Entre ta clé d'activation:
     </td>
    <td>
      </label><input type="text" name="cle" id="cle" placeholder="345678">
    </td>
  </tr>
  <tr>
  	<td>
		<label for="pseudo">Entre ton pseudo:
    </td>
  	<td>
    	</label><input type="text" name="pseudo" id="pseudo" placeholder="Tonio">
    </td>
  </tr>
  <tr>
  	<td>
		<label for="mail">Entre ton mail:
    </td>
    <td>
    	</label><input type="text" name="mail" id="mail" placeholder="tonio@gmail.com">
    </td>
    </tr>
  	<td>
		  <label for="mdp">Entre ton mot de passe:
    </td>
    <td>
    	</label><input type="password" name="mdp" id="mdp" placeholder="zozo">
    </td>
  </tr>
  <tr>
  	<td>
		<label for="mdp2">Confirme ton mot de passe:
    </td>
    <td>
    	</label><input type="password" name="mdp2" id="mdp2" placeholder="zozo">
    </td>
  </tr>
 </table>

  <input type="submit" name="forminscription" value="Valider">
	</form>

</body>
</html>
