<div class="card">
<img src="https://picsum.photos/id/<?= $chalet->id_picsum ?>/500" alt="Chalet <?= $chalet->nom ?>">
  <div class="container">
    <h3><b><?= $chalet->nom ?></b></h3>
    <h4><?= $chalet->description ?></h4>
    <h4>Prix basse saison : <?= $chalet->prix_basse_saison ?>$</h4>
    <h4>Prix haute saison : <?= $chalet->prix_haute_saison ?>$</h4>
    <h4>Nombre de personnes maximum pour ce chalet : <?= $chalet->personnes_max ?></h4>
  </div>
</div>