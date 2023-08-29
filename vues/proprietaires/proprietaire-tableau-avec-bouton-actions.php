<?php
    $proprietaires = modele_proprietaire::ObtenirTous();
?>

<h2>Liste des propriétaires</h2>
<table>
    <tr>        
        <th>Nom</th>        
        <th>Prénom</th>        
        <th>Téléphone</th>
        <th>Ville</th>
        <th>Actions</th>
    </tr>

    <?php
        foreach ($proprietaires as $proprietaire) {
    ?>
        <tr>
            <td><?= $proprietaire->nom ?></td>
            <td><?= $proprietaire->prenom ?></td>
            <td><?= $proprietaire->telephone ?></td>
            <td><?= $proprietaire->ville ?></td>
            <td>
                <a href="edition_proprietaire.php?id=<?= $proprietaire->id ?>">Modifier</a> 
                | 
                <a href="suppression_proprietaire.php?id=<?= $proprietaire->id ?>">Supprimer</a>
            </td>
        </tr>
    <?php
        }
    ?>
</table>