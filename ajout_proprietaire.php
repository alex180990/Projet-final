<?php
    require_once 'controlleurs/proprietaires.php';
    
    if (isset($_POST['boutonAjouter'])) {        
        $controllerProprietaires=new ControlleurProprietaire;
        $controllerProprietaires->ajouter();
    }
?>

<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/styles.css">
    <title>Mon super site - Ajout d'un produit</title>
  </head>
  <body>
    <div class="">

      <h1>Ajouter un produit</h1>

      <form method="POST">
        <div>
          <div>
            <label for="code">Nom du propriétaire *</label>
            <input type="text" id="nom" name="nom" required maxlength="50">
          </div>
          <div>
            <label for="nom">Prénom du propriétaire *</label>
            <input type="text" id="prenom" name="prenom" required minlength="2" maxlength="50">
          </div>
          <div>
            <label for="nom">Téléphone du propriétaire *</label>
            <input type="text" id="telephone" name="telephone" required minlength="2" maxlength="50">
          </div>
          <div>
            <label for="nom">Ville du propriétaire *</label>
            <input type="text" id="ville" name="ville" required minlength="2" maxlength="50">
          </div>
        </div>
        <button name="boutonAjouter" type="submit">Ajouter le propriétaire</button><br>
      </form>

      <a href="administration_module_personnel.php">Retour à la liste des propriétaires</a>
    </div>
    
  </body>
</html>