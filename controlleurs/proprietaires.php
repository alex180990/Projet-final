<?php

require_once 'modeles/proprietaires.php';

class ControlleurProprietaire {
    
    function afficherTableauAvecBoutonsAction() {
        $proprietaires = modele_proprietaire::ObtenirTous();
        require './vues/proprietaires/proprietaire-tableau-avec-bouton-actions.php';
    }

    function afficherTousAvecAnimaux() {
        $proprietaires = modele_proprietaire::ObtenirTousAvecAnimaux();
        require './vues/proprietaires/cartProprietaire.php';
    }

    function afficherFormulaireEdition(){
        if(isset($_GET["id"])) {
            $proprietaire = modele_proprietaire::ObtenirUn($_GET["id"]);
            if($proprietaire) {
                require './vues/proprietaires/formulaireEditionProprietaire.php';
            } else {
                $erreur = "Aucun proprietaire trouvé";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) du proprietaire à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

    function afficherFormulaireSuppression(){
        if(isset($_GET["id"])) {
            $proprietaire = modele_proprietaire::ObtenirUn($_GET["id"]);
            if($proprietaire) {
                require './vues/proprietaires/formulaireSuppressionProprietaire.php';
            }
        } else {
            $erreur = "L'identifiant (id) du proprietaire à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

    function ajouter() {
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['ville'])) {
            $message = modele_proprietaire::ajouter($_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['ville']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter un proprietaire. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    function editer() {
        if(isset($_GET['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['ville'])) {
            $message = modele_proprietaire::editer($_GET['id'], $_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['ville']);
            echo $message;
        } else {
            $erreur = "Impossible de modifier le proprietaire. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    function supprimer() {
        if(isset($_GET['id'])) {
            $message = modele_proprietaire::supprimer($_GET['id']);
            echo $message;
        } else {
            $erreur = "Impossible de supprimer le proprietaire. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

}

?>