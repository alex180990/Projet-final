<div class="">
    <form method="POST">
        <div>
            <div>
                <label for="nom">Nom *</label>
                <input type="text" id="nom" name="nom" required maxlength="25" value="<?= $proprietaire->nom ?>">
            </div>
            <div>
                <label for="prenom">Prenom *</label>
                <input type="text" id="prenom" name="prenom" required minlength="2" maxlength="50" value="<?= $proprietaire->prenom ?>">
            </div>
            <div>
                <label for="telephone">Téléphone *</label>
                <input type="text" id="telephone" name="telephone" required value="<?= $proprietaire->telephone ?>">
            </div>
            <div>
                <label for="ville">Ville *</label>
                <input type="text" id="ville" name="ville" required value="<?= $proprietaire->ville ?>">
            </div>
        </div>
        <button name="boutonEditer" type="submit">Modifier le proprietaire</button><br>
    </form>                         
</div> 