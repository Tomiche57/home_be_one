<!DOCTYPE html>
<html> <!--PAGE QUI DOIT POUVOR ETRE MODIFIE PAR ADMIN DOMISEP S'IL VEUT RAJOUTER DES PROBLEMES QUI REVIENNENT SOUVENT PAR EXEMPLE-->
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/probleme.css">
    <title></title>
  </head>
  <body>
    <?php include('new_header.php');?>
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


    <?php include('footer.php');?>

  </body>
</html>
