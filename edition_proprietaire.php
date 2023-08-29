<?php
    require_once 'controlleurs/proprietaires.php';
    
    $controllerProprietaires=new ControlleurProprietaire;

    if (isset($_POST['boutonEditer'])) {      
        $controllerProprietaires->editer();
    } 
?>

<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/styles.css">
    <title>Mon super site - Édition d'un produit</title>
  </head>
  <body>   

    <h1>Formulaire d'édition de Propriétaire</h1>

    <?php
         $controllerProprietaires->afficherFormulaireEdition();
    ?>

    <a href="administration_module_personnel.php">Retour à la liste des propriétaires</a>

  </body>
</html>