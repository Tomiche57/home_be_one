<html>
<head>
      <title>Pièces</title>
      <meta charset="utf-8">
</head>
<body style="background-color: #0080D1;">
  <?php include('new_header.php');?>
      <div align="center">
               <h2 style ="color: red;">Ajouter des pièces</h2>
          <br/><br />
         <form method="POST" action="Redirection_piece.php">
            <table>
               <tr>
                  <td align="right">
                     <label for="nom">Nom :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="nom" id="nom" name="nom" />
                  </td>
               </tr>
            </table>
              <input type = "submit" id = "send" value = "Ajouter" />
         </form>

      </div>
      <?php include('footer.php');?>
</body>

</html>
