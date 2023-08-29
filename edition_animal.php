<?php
    require_once 'controlleurs/animaux.php';
    
    $ControlleurAnimaux=new ControlleurAnimal;

    if (isset($_POST['boutonEditer'])) {      
        $ControlleurAnimaux->editer();
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

    <h1>Formulaire d'édition pour animaux</h1>

    <?php
         $ControlleurAnimaux->afficherFormulaireEdition();
    ?>

    <a href="administration_module_personnel.php">Retour à la liste des animaux</a>

  </body>
</html>