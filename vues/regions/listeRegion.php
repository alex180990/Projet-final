<ul>
    <?php foreach ($regions as $region) {  ?> 
        <li><a href="liste_chalets_par_region.php?id=<?= $region->id ?>"><?= $region->nom ?></a></li>
    <?php  } ?>
</ul>