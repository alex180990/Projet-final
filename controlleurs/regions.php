<?php

require_once './modeles/regions.php';

class ControlleurRegion {
    public $nom;

    function afficherListe() {
        $regions = modele_region::ObtenirTous();
        require './vues/regions/listeRegion.php';
    }

    function afficherNom() {
        if(isset($_GET["id"])) {
            $region = modele_region::ObtenirUn($_GET["id"]);
            if($region) {
                require './vues/regions/titreRegion.php';
            } else {
                $erreur = "Aucune région trouvé";
            }
        } else {
            $erreur = "L'identifiant (id) de la région à afficher est manquant dans l'url";
        }
    }
}

?>