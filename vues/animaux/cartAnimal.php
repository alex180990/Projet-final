
<div class="flex">

    <?php 
        foreach ($animaux as $animal) {  
    ?> 
    <div class="card">
        <div class="container">
            <h4><?= $animal->animal_nom ?>, <?=$animal->type ?>, <?=$animal->age?> an(s)</h4>
        </div>
    </div>

    <?php 
        } 
    ?>
</div>