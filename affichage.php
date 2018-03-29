<!DOCTYPE html>
<html>
<head>
  <title>Lister Les elements de la base de donnée</title>
  <META charset="utf-8"/>
</head>
<style type="text/css">
  table {
    border-collapse: collapse;
    width: 70%;
}
th, td {
    text-align: left;
    padding: 8px;
}
  tr:nth-child(even){background-color: blue}
th {
    background-color: blue;
    color: indigo;
}
</style>
<body>
  <?php
   try{
    // Inclusion du script de connexion à la base
    require('connexion.php');
    $requete = $connect->query("SELECT * from personne");
    ?>
    <table>
    <tr>
      <td colspan="4" id="entete" style="color: black"><center><b>Listes des informations de la base des donnees</b></center> </td>
    </tr>
    <p><tr>
        <th>ID</th>
      <th>NOM</th>
      <th>PRENOM</th>
      <th>ADRESSE</th>
    </tr>
    </p>

    
      <?php
      // Boucle sur le resultat de la requete pour afficher la liste
             while($resultat = $requete->fetch()){
        ?>
                <tr>
              <p> <td><?php echo $resultat['ID']; ?></td>
                  <td><?php echo $resultat['NOM']; ?></td>
                  <td><?php echo $resultat['PRENOM'];  ?></td>
                  <td><?php echo $resultat['ADRESSE'];  ?></td>
                 </p>
                </tr>

        <?php
             }
         ?>
      
    </table>
    <?php
   }catch(PDOException $e){
         die('Erreur!!!'.$e->getMessage());
   }
   ?>

</body>
</html>