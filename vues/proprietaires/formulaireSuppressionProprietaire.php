<div class="card">
  <div class="container">
    <h3><b>Nom du propriétaire : <?= $proprietaire->nom ?></b></h3>
    <h3>Prénom du propriétaire : <?= $proprietaire->prenom ?></h3>
    <h3>Prénom du propriétaire : <?= $proprietaire->telephone ?></h3>
    <h3>Prénom du propriétaire : <?= $proprietaire->ville ?></h3>
  </div>
</div>

<form method="POST">
    <button name="boutonSupprimer" type="submit">Supprimer le propriétaire</button><br>
</form>