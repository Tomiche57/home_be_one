<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/un_probleme.css">
    <title></title>
  </head>
  <body>
    <?php include('new_header.php');?>
    <!--AJOUTER FIL ARIANE-->

  <div id="faq">

    <p>

        <input type="checkbox" name="case" id="case" />
         <label for="case">Question 1</label>

         <br />

        <input type="checkbox" name="case" id="case" />
         <label for="case">Question 2</label>

         <br />

        <input type="checkbox" name="case" id="case" />
         <label for="case">Question 3</label>

         <br />

        <input type="checkbox" name="case" id="case" />
         <label for="case">Question 4</label>

         <br />

        <input type="checkbox" name="case" id="case" />
         <label for="case">Question 5</label>

    </p>

  </div>

  <div id="sav">
      <div id="ticket">
      <nav id="prob">

        <ul>

          <li class="probleme"><div id="probleme_1">Problème 1 </div><!--CAPTEUR-->
            <ul>
              <li class="probleme_1.1"><div id="sous_probleme">Sous problème 1</div> <!--DE TEMPERATURE-->
                <ul class="sous_sous_probleme">
                  <div id="sous_sous_probleme_1">
                  <li class="probleme_1.1.1">Sous problème 1 du sous problème 1 du problème 1 <input type="submit" value="envoyer"/></li> <!--N'AFFICHE AUCUNE DONNEE-->
                  <li class="problème_1.1.2">Sous probleme 2 du sous problème 1 du problème 1 <input type="submit" value="envoyer"/></li> <!-- BLABLA-->
                  </div>
                </ul>
              </ul>
              </li>

              <ul class="sous_probleme">
                <li class="probleme_1.2"><div id="sous_probleme">Sous problème 2</div>
                  <ul class="sous_sous_probleme">
                    <div id="sous_sous_probleme_2">
                    <li class="probleme_1.2.1">Sous probleme 1 du sous problème 2 du problème 1 <input type="submit" value="envoyer"/></li>
                    <li class="probleme_1.2.2">Sous problème 2 du sous problème 2 du problème 1 <input type="submit" value="envoyer"/></li>
                    <li class="probleme_1.2.3">Sous problème 3 du sous problème 2 du problème 1 <input type="submit" value="envoyer"/></li>
                    </div>
                  </ul>
                </li>
              </ul>
          </li>

          <li class="probleme"><div id="probleme_2">Problème 2</div>
            <ul class=sous_probleme>
              <li class="probleme_2.1">Sous probleme 1
                <ul class="sous_sous_probleme">
                  <li class="probleme_2.1.1">Sous problème 1 du sous problème 1 du problème 2 <input type="submit" value="envoyer"/></li>
                  <li class="probleme_2.1.2">Sous problème 2 du sous problème 1 du problème 2 <input type="submit" value="envoyer"/></li>
                </ul>
              </li>
            </ul>

        </ul>
      </nav>
      </div>

      <div id="zone_texte">

      <h5 class="titre">Tapez votre requête</h5>
      <textarea name="message" rows="13" cols="71" class="zone_texte">
      </textarea>

      <input type="submit" value="envoyer" class="bouton"/>

      </div>

  </div>


    <?php include('footer.php');?>

  </body>
</html>
