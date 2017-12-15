<html>
<head>
      <title>Page d'inscription </title>
      <meta charset="utf-8">
</head>
<body style="background-color: #0080D1;">
      <div align="center">
               <h2 style ="color: white;">Inscris toi !</h2>
          <br/><br />
         <form method="POST" action="">
            <table>
               <tr>
                  <td align="right">
                     <label for="nom">Nom :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="nom" id="nom" name="nom" value="<?php if(isset($pseudo)) { echo $nom; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="prenom">Prenom :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="prenom" id="prenom" name="prenom" value="<?php if(isset($mail)) { echo $prenom; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="cle">Cle :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="cle" id="cle" name="cle" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="pseudo" id="pseudo" name="pseudo" value="<?php if(isset($mail2)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail">Mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2"> Confirmation mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="mail2" id="mail2" name="mail2" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="mdp" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2"> Confirmation mot de passe  :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="mdp2" id="mdp2" name="mdp2" />
                  </td>
               </tr>
               <tr>
                  <td align="center">
                     <br />
                     <input  style= "text-align: center;  "type="submit" name="forminscription" value="Je m'inscris" />
                  </td>
               </tr>
            </table>
         </form>

      </div>
</body>
</html>




<?php
$bdd = new PDO('mysql:host=localhost;dbname=bdd_hbo', 'root', '');



   if(isset($_POST['forminscription'])) {
      $erreur='';
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['mail']);
      $mail2 = htmlspecialchars($_POST['mail2']);
      $cle=htmlspecialchars($_POST['cle']);
      $mdp = $_POST['mdp'];
      $mdp2 = $_POST['mdp2'];
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
                        $_SESSION['pseudo']=$_POST['pseudo'];


header('Location: http://localhost/home_be_one/tests/connexion_gustave.php');

                     }  else {
                        echo "Vos mots de passes ne correspondent pas !";
                     }
                  }  else {
                     echo "Adresse mail déjà utilisée !";
                  }
               }  else {
                  echo "Votre adresse mail n'est pas valide !";
               }
            }  else {
            echo "Vos adresses mail ne correspondent pas !";
         }
      } else {
         echo "Tous les champs doivent être complétés !";
      }
   } else  {
      echo ' ';
   }
?>
