<?php

require_once "./include/config.php";
require_once './modeles/animaux.php';

class modele_proprietaire {
    public $id;
    public $nom;
    public $prenom;
    public $telephone;
    public $ville;

    public function __construct($id, $nom, $prenom, $telephone, $ville) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->ville = $ville;
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
    
        $resultatRequete = $mysqli->query("SELECT id, nom, prenom, telephone, ville FROM proprietaires ORDER BY id");
    
        if ($resultatRequete) {
            while ($enregistrement = $resultatRequete->fetch_assoc()) {
                $liste[] = new modele_proprietaire($enregistrement['id'], $enregistrement['nom'], $enregistrement['prenom'], $enregistrement['telephone'], $enregistrement['ville']);
            }
            $resultatRequete->free();
        }
    
        return $liste;
    }

    public static function ObtenirTousAvecAnimaux() {
        $liste = [];
        $mysqli = self::connecter();
    
        $resultatRequete = $mysqli->query("SELECT id, nom, prenom, telephone, ville FROM proprietaires ORDER BY id");

        if ($resultatRequete) {
            while ($enregistrement = $resultatRequete->fetch_assoc()) {
                $liste[] = new modele_proprietaire($enregistrement['id'], $enregistrement['nom'], $enregistrement['prenom'], $enregistrement['telephone'], $enregistrement['ville']);
            }
            $resultatRequete->free();
        }
    
        return $liste;
    }

    public static function ObtenirUn($id) {
        $mysqli = self::connecter();
    
        if ($requete = $mysqli->prepare("SELECT * FROM proprietaires WHERE id=?")) {
            $requete->bind_param("i", $id);
            $requete->execute();
    
            $result = $requete->get_result();
    
            if ($enregistrement = $result->fetch_assoc()) {
                $proprietaire = new modele_proprietaire($enregistrement['id'], $enregistrement['nom'], $enregistrement['prenom'], $enregistrement['telephone'], $enregistrement['ville']);
            }
    
            $requete->close();
        } 
    
        return $proprietaire;
    }

    public static function ajouter($nom, $prenom, $telephone, $ville) {
        $message = '';

        $mysqli = self::connecter();
        

        if ($requete = $mysqli->prepare("INSERT INTO proprietaires(nom, prenom, telephone, ville) VALUES(?, ?, ?, ?)")) {      

        $requete->bind_param("ssss", $nom, $prenom, $telephone, $ville);

        if($requete->execute()) {
            $message = "Propriétaire ajouté";
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

    public static function editer($id, $nom, $prenom, $telephone, $ville) {
        $message = '';

        $mysqli = self::connecter();
        
        if ($requete = $mysqli->prepare("UPDATE proprietaires SET nom=?, prenom=?, telephone=?, ville=? WHERE id=?")) {      

        $requete->bind_param("ssssi", $nom, $prenom, $telephone, $ville, $id);

        if($requete->execute()) {
            $message = "Propriétaire modifié";
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
        

        if ($requete = $mysqli->prepare("DELETE FROM proprietaires WHERE id=?")) {      

        $requete->bind_param("i", $id);

        if($requete->execute()) {
            $message = "Propriétaire supprimé";
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error; 
        }

        $requete->close(); 

        } 

        return $message;
    }
}

?>