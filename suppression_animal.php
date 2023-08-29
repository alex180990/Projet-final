<?php
    require_once 'controlleurs/animaux.php';
    
    $controlleurAnimaux=new ControlleurAnimal;

    if (isset($_POST['boutonSupprimer'])) {        
        $controlleurAnimaux->supprimer();
    } 
?>

<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <title>Mon super site - Suppression d'un produit</title>
 </head>
 <body>
    <h1>Formulaire de suppression d'un animal</h1>

    <?php
         $controlleurAnimaux->afficherFormulaireSuppression();
    ?>

    <a href="administration_module_personnel.php">Retour à la liste des animaux</a>
 </body>
</html>