<?php
    require_once 'controlleurs/animaux.php';
    require_once 'modeles/proprietaires.php';
    require_once 'modeles/animaux.php';

    $proprietaires = modele_proprietaire::ObtenirTousAvecAnimaux();
?>

<div class="flex">

    <?php 
        foreach ($proprietaires as $proprietaire) {  
    ?> 
    <div class="card">
        <div class="container">
            <h4><?= $proprietaire->prenom ?> <?= $proprietaire->nom ?></h4>
            <?php
                
                $ControlleurAnimal = new ControlleurAnimal;
                $ControlleurAnimal->afficherToutPourProprio($proprietaire->id);
            ?>
        </div>
    </div>

    <?php 
        } 
    ?>
</div>