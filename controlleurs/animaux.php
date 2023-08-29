<?php

require_once 'modeles/animaux.php';
require_once 'controlleurs/proprietaires.php';

class ControlleurAnimal {
    
    function afficherTableauAvecBoutonsAction() {
        $animaux = modele_animal::ObtenirTous();
        require './vues/animaux/animal-tableau-avec-bouton-actions.php';
    }

    function afficherToutPourProprio($idProprietaire) {
        $animaux = modele_animal::ObtenirAnimauxParProprietaire($idProprietaire);
        require './vues/animaux/cartAnimal.php';
    }

    function afficherFormulaireEdition(){
        if(isset($_GET["id"])) {
            $animal = modele_animal::ObtenirUn($_GET["id"]);
            if($animal) {
                require './vues/animaux/formulaireEditionAnimaux.php';
            } else {
                $erreur = "Aucun animal trouvé";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) du proprietaire à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

    function afficherFormulaireSuppression(){
        if(isset($_GET["id"])) {
            $animal = modele_animal::ObtenirUn($_GET["id"]);
            if($animal) {
                require './vues/animaux/formulaireSuppressionAnimal.php';
            }
        } else {
            $erreur = "L'identifiant (id) du proprietaire à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

    function ajouter() {
        if(isset($_POST['animal_nom']) && isset($_POST['type']) && isset($_POST['age']) && isset($_POST['fk_proprietaires'])) {
            $message = modele_animal::ajouter($_POST['animal_nom'], $_POST['type'], $_POST['age'], $_POST['fk_proprietaires']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter un animal. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    function editer() {
        if(isset($_GET['id']) && isset($_POST['animal_nom']) && isset($_POST['type']) && isset($_POST['age']) && isset($_POST['fk_proprietaires'])) {
            $message = modele_animal::editer($_GET['id'], $_POST['animal_nom'], $_POST['type'], $_POST['age'], $_POST['fk_proprietaires']);
            echo $message;
        } else {
            $erreur = "Impossible de modifier le proprietaire. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    function supprimer() {
        if(isset($_GET['id'])) {
            $message = modele_animal::supprimer($_GET['id']);
            echo $message;
        } else {
            $erreur = "Impossible de supprimer le proprietaire. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

}

?>