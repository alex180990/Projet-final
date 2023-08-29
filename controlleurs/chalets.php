<?php

require_once './modeles/chalets.php';

class ControlleurChalet {
    public $nom;

    function afficherListe() {
        $chalets = modele_chalet::ObtenirTous();
        require './vues/chalets/cartChalet.php';
    }

    function afficherAccueil(){
        $chalets = modele_chalet::Obtenir6_actif_promo();
        require './vues/chalets/cartChalet.php';
    }

    function afficherPromotions(){
        $chalets = modele_chalet::Obtenir_actif_promo();
        require './vues/chalets/cartChalet.php';
    }

    function afficherParRegion($regionId) {
        $chalets = modele_chalet::Obtenir_par_region($regionId);
        require './vues/chalets/cartChalet.php';
    }

    function afficherActif(){
        $chalets = modele_chalet::ObtenirActif();
        require './vues/chalets/cartChalet.php';
    }

    function afficherFiche() {
        if(isset($_GET["id"])) {
            $chalet = modele_chalet::ObtenirUn($_GET["id"]);
            if($chalet) {
                require './vues/chalets/ficheChalet.php';
            }
        } 
    }
}

?>