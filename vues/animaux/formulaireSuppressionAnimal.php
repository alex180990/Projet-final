<div class="card">
  <div class="container">
    <h3><b>Nom de l'animal: <?= $animal->animal_nom?></b></h3>
    <h3>Type de l'animal : <?= $animal->type ?></h3>
    <h3>l'âge de l'animal : <?= $animal->age ?> an(s)</h3>
    <h3>Prénom du propriétaire : <?= $animal->proprietaire_prenom ?></h3>
  </div>
</div>

<form method="POST">
    <button name="boutonSupprimer" type="submit">Supprimer l'animal</button><br>
</form>