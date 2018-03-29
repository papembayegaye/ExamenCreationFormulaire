<?php
try{
  
  require('connexion.php');
  
    function Securisation($donnees)
  {
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = strip_tags($donnees);
    return $donnees;
  }
  $nom = Securisation($_POST['nom']);
  $prenom = Securisation($_POST['prenom']);
  $adresse = Securisation($_POST['adresse']);
  if (isset($_POST['envoi'])) {
    
  
    $requete = $connect->prepare('INSERT INTO personne(NOM,PRENOM,ADRESSE) VALUES(?,?,?)');
    $requete->execute(array($nom,$prenom,$adresse));
  }
  if ($requete) {
  
    header('Location: affichage.php');
  }
    
  else{
    header('Location: erreur.php');
    }
         
}catch(PDOException $e){
  echo 'Erreur!!! '.$e->getMessage();
  echo 'Echec de la connexion avec la base de donnée';
}
?>