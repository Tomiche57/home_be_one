<?php
$bdd = new PDO('mysql:host=localhost;dbname=base_de_donnes_home_be_one', 'root', '');

   if(isset($_POST['forminscription'])) {
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['mail']);
      $mail2 = htmlspecialchars($_POST['mail2']);
      $cle=htmlspecialchars($_POST['cle']);
      $mdp = sha1($_POST['mdp']);
      $mdp2 = sha1($_POST['mdp2']);
      if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['cle']) AND !empty($_POST['mdp']) AND !empty($_POST['nom']) AND !empty($_POST['prenom'])AND !empty($_POST['mdp2'])) {
            if($mail == $mail2) {
               if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                  $reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
                  $reqmail->execute(array($mail));
                  $mailexist = $reqmail->rowCount();
                  if($mailexist == 0) {
                     if($mdp == $mdp2) {
                        $insertmbr = $bdd->prepare("INSERT INTO utilisateur(nom, prenom, cle, pseudo, mail, mdp ) VALUES(?, ?, ?, ?, ?, ?)");
                        $insertmbr->execute(array($nom, $prenom, $cle, $pseudo, $mail, $mdp));
                        $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                     }  else {
                        $erreur = "Vos mots de passes ne correspondent pas !";
                     }
                  } else {
                     $erreur = "Adresse mail déjà utilisée !";
                  }
               } else {
                  $erreur = "Votre adresse mail n'est pas valide !";
               }
            } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
          }
   } else {
         $erreur = "Tous les champs doivent être complétés !";
         ?>
   }


<html>
   <head>
      <title>Page de connexion </title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
               <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="">
            <table>
               <tr>
                  <td align="right">
                     <label for="nom">nom :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="nom" id="nom" name="nom" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="prenom">prenom :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="prenom" id="prenom" name="prenom" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="cle">cle :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="cle" id="cle" name="cle" />
                  </td>
               </tr> 
               <tr>
                  <td align="right">
                     <label for="pseudo">pseudo :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="pseudo" id="pseudo" name="pseudo" value="<?php if(isset($mail2)) { echo $pseudo; } ?>" />
                  </td>
               </tr>   
               <tr>
                  <td align="right">
                     <label for="mail">mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2">mail2 :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="mail2" id="mail2" name="mail2" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="mdp" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">mot de passe 2 :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="mdp2" id="mdp2" name="mdp2" />
                  </td>
               </tr>
               <tr>   
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" />
                  </td>
               </tr>
            </table>
         </form>
         <?php
           if(isset($erreur))
          {
            echo '<font color="red">'.$erreur."</font>";
          }
          ?>
      </div>
   </body>
</html>
