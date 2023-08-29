<?php
    require_once 'controlleurs/proprietaires.php';
    
    $controlleurProprietaires=new ControlleurProprietaire;

    if (isset($_POST['boutonSupprimer'])) {        
        $controlleurProprietaires->supprimer();
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
    <h1>Formulaire de suppression d'un propriétaire</h1>

    <?php
         $controlleurProprietaires->afficherFormulaireSuppression();
    ?>

    <a href="administration_module_personnel.php">Retour à la liste des propriétaires</a>
 </body>
</html>


