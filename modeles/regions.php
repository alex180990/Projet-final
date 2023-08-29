<?php

require_once "./include/config.php";

class modele_region {
    public $id;
    public $nom;

    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        // Vérifier la connexion
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;   // Pour fins de débogage
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

        $resultatRequete = $mysqli->query("SELECT id, nom FROM regions ORDER BY id");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_region($enregistrement['id'], $enregistrement['nom']);
        }

        return $liste;
    }

    public static function ObtenirUn($id) {
        $mysqli = self::connecter();
        $region = null;
        
        if ($requete = $mysqli->prepare("SELECT * FROM regions WHERE id=?")) {
            $requete->bind_param("i", $id);
            $requete->execute();
    
            $requete->bind_result($id, $nom); // Remplacer les colonnes avec leurs noms
    
            if ($requete->fetch()) {
                $region = new modele_region($id, $nom);
            } else {
                return null;
            }
    
            $requete->close();
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            return null;
        }
    
        return $region;
    }
}

?>