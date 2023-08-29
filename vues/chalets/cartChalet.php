<div class="flex">

    <?php 
        foreach ($chalets as $chalet) {  
    ?> 
    <div class="card">
        <img src="https://picsum.photos/id/<?= $chalet->id_picsum ?>/500" alt="Chalet <?= $chalet->nom ?>">
        <div class="container">
          <h4><?= $chalet->nom ?></h4>
          <span>à partir de <?= $chalet->prix_basse_saison ?>$ </span>
          <a href="fiche_chalet.php?id=<?= $chalet->id ?>">Pour en savoir plus</a>
        </div>
    </div>

    <?php 
        } 
    ?>
</div>