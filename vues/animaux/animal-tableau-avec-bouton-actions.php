<?php
    $animaux = modele_animal::ObtenirTous();
?>

<h2>Liste des animaux</h2>
<table>
    <tr>        
        <th>Nom</th>        
        <th>Type</th>        
        <th>Âge</th>
        <th>Propriétaire</th>
        <th>Actions</th>
    </tr>

    <?php
        foreach ($animaux as $animal) {
    ?>
        <tr>
            <td><?= $animal->animal_nom ?></td>
            <td><?= $animal->type ?></td>
            <td><?= $animal->age ?></td>
            <td><?= $animal->proprietaire_prenom?> <?=$animal->proprietaire_nom?></td>
            <td>
                <a href="edition_animal.php?id=<?= $animal->id ?>">Modifier</a> 
                | 
                <a href="suppression_animal.php?id=<?= $animal->id ?>">Supprimer</a>
            </td>
        </tr>
    <?php
        }
    ?>
</table>