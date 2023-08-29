<?php
    require_once 'include/config.php';
    require_once 'controlleurs/animaux.php';
    require_once 'modeles/proprietaires.php';
    
    if (isset($_POST['boutonAjouter'])) {        
        $controllerAnimaux=new ControlleurAnimal;
        $controllerAnimaux->ajouter();
    }

    function getProprietaires(){
      $connexion = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

      if ($connexion->connect_error) {
        die("Erreur de connexion à la base de données : " . $connexion->connect_error);
      }
      $requete = "SELECT id, prenom FROM proprietaires";
      $resultat = $connexion->query($requete);

      if (!$resultat) {
        die("Erreur lors de l'exécution de la requête : " . $connexion->error);
      }

      $proprietaires = array();

      while ($row = $resultat->fetch_assoc()) {
        $proprietaires[] = $row;
        $proprietaire->id = $fk_proprietaires;
      }

      $connexion->close();

      return $proprietaires;
    }
?>

<div class="">
    <form method="POST">
        <div>
            <div>
                <label for="animal_nom">Nom *</label>
                <input type="text" id="animal_nom" name="animal_nom" required maxlength="25" value="<?= $animal->animal_nom ?>">
            </div>
            <div>
                <label for="type">Type *</label>
                <input type="text" id="type" name="type" required minlength="2" maxlength="50" value="<?= $animal->type ?>">
            </div>
            <div>
                <label for="age">Âge *</label>
                <input type="text" id="age" name="age" required value="<?= $animal->age ?>">
            </div>
            <div>
                <label for="proprietaire">Propriétaire *</label>
                <select type="number" name="fk_proprietaires" >
                    <option value="" selected disabled>Choisissez un propriétaire</option>
                        <?php
                            $proprietaires = getProprietaires();
                            foreach ($proprietaires as $proprietaire) {
                            echo '<option value="' . $proprietaire['id'] . '">' . $proprietaire['prenom'] . '</option>';
                        }
                        ?>
                </select>
            </div>
        </div>
        <button name="boutonEditer" type="submit">Modifier l'animal</button><br>
    </form>                         
</div> 