<?php

require_once "./include/config.php";
require_once 'controlleurs/proprietaires.php';

class modele_animal {
    public $id;
    public $animal_nom;
    public $type;
    public $age;
    public $fk_proprietaires;
    public $proprietaire_nom;
    public $proprietaire_prenom;

    public function __construct($id, $animal_nom, $type, $age, $fk_proprietaires, $proprietaire_prenom, $proprietaire_nom) {
        $this->id = $id;
        $this->animal_nom = $animal_nom;
        $this->type = $type;
        $this->age = $age;
        $this->fk_proprietaires = $fk_proprietaires;
        $this->proprietaire_prenom = $proprietaire_prenom;
        $this->proprietaire_nom = $proprietaire_nom;
    }

    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;
            exit();
        }
        
        if (!$mysqli->set_charset("utf8")) {
            echo "Erreur lors du chargement du jeu de caractères utf8 : " . $mysqli->error;
            exit();
        }

        return $mysqli;
    }

    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();
    
        $resultatRequete = $mysqli->query("SELECT animaux.id, animaux.animal_nom, animaux.type, animaux.age, animaux.fk_proprietaires, proprietaires.prenom AS proprietaire_prenom, proprietaires.nom AS proprietaire_nom FROM animaux INNER JOIN proprietaires ON animaux.fk_proprietaires = proprietaires.id ORDER BY animaux.id;");
    
        if ($resultatRequete) {
            while ($enregistrement = $resultatRequete->fetch_assoc()) {
                $liste[] = new modele_animal($enregistrement['id'], $enregistrement['animal_nom'], $enregistrement['type'], $enregistrement['age'], $enregistrement['fk_proprietaires'], $enregistrement['proprietaire_prenom'], $enregistrement['proprietaire_nom']);
            }
            $resultatRequete->free();
        }
    
        return $liste;
    }

    public static function ObtenirAnimauxParProprietaire($idProprietaire) {
        $liste = [];
        $mysqli = self::connecter();
    
        $requete = $mysqli->prepare("SELECT animaux.id, animaux.animal_nom, animaux.type, animaux.age, animaux.fk_proprietaires, proprietaires.prenom AS proprietaire_prenom, proprietaires.nom AS proprietaire_nom FROM animaux INNER JOIN proprietaires ON animaux.fk_proprietaires = proprietaires.id WHERE animaux.fk_proprietaires = ?");
        
        $requete->bind_param("i", $idProprietaire);
        $requete->execute();
    
        $requete->bind_result($id, $animal_nom, $type, $age, $fk_proprietaires, $proprietaire_prenom, $proprietaire_nom);
    
        while ($requete->fetch()) {
            $liste[] = new modele_animal($id, $animal_nom, $type, $age, $fk_proprietaires, $proprietaire_prenom, $proprietaire_nom);
        }
    
        $requete->close();
        return $liste;
    }

    public static function ObtenirUn($id) {
        $mysqli = self::connecter();
        $animal = '';
    
        if ($requete = $mysqli->prepare("SELECT * , proprietaires.prenom AS proprietaire_prenom, proprietaires.nom AS proprietaire_nom FROM animaux INNER JOIN proprietaires ON animaux.fk_proprietaires = proprietaires.id WHERE animaux.id=?")) {
            $requete->bind_param("i", $id);
            $requete->execute();
    
            $result = $requete->get_result();
    
            if ($enregistrement = $result->fetch_assoc()) {
                $animal = new modele_animal($enregistrement['id'], $enregistrement['animal_nom'], $enregistrement['type'], $enregistrement['age'], $enregistrement['fk_proprietaires'], $enregistrement['proprietaire_prenom'], $enregistrement['proprietaire_nom']);
            }
    
            $requete->close();
        } 
    
        return $animal;
    }

    public static function ajouter($animal_nom, $type, $age, $fk_proprietaires) {
        $message = '';

        $mysqli = self::connecter();
        

        if ($requete = $mysqli->prepare("INSERT INTO animaux(animal_nom, type, age, fk_proprietaires) VALUES(?, ?, ?, ?)")) {      

        $requete->bind_param("sssi", $animal_nom, $type, $age, $fk_proprietaires);

        if($requete->execute()) {
            $message = "Animal ajouté";
            } else {
                $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error;
            }

            $requete->close();

        }else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    public static function editer($id, $animal_nom, $type, $age, $fk_proprietaires) {
        $message = '';

        $mysqli = self::connecter();
        
        if ($requete = $mysqli->prepare("UPDATE animaux SET animal_nom=?, type=?, age=?, fk_proprietaires=? WHERE id=?")) {      

        $requete->bind_param("sssii", $animal_nom, $type, $age, $fk_proprietaires, $id);

        if($requete->execute()) {
            $message = "Animal modifié";
            } else {
                $message =  "Une erreur est survenue lors de l'édition: " . $requete->error;
            }

            $requete->close();
        }else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    public static function supprimer($id) {
        $message = '';

        $mysqli = self::connecter();
        
        if ($requete = $mysqli->prepare("DELETE FROM animaux WHERE id=?")) {      

        $requete->bind_param("i", $id);

        if($requete->execute()) {
            $message = "Propriétaire supprimé";
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error; 
        }

        $requete->close(); 

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }
}

?>