<?php

require_once "./include/config.php";

class modele_authentification {
    public $id; 
    public $code_utilisateur; 
    public $mot_de_passe;
    public $courriel;

    public function __construct($id, $code_utilisateur, $mot_de_passe, $courriel) {
        $this->id = $id;
        $this->code_utilisateur = $code_utilisateur;
        $this->mot_de_passe = $mot_de_passe;        
        $this->courriel = $courriel;
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

    /***
     * Fonction permettant de récupérer un utilisateur en fonction de son code d'utilisateur et mot de passe
     */
    public static function ObtenirUn($code_utilisateur) {
        $mysqli = self::connecter();
        $utilisateur = null;
    
        if ($requete = $mysqli->prepare("SELECT * FROM utilisateurs WHERE code_utilisateur=?")) { 
            $requete->bind_param("s", $code_utilisateur);
            $requete->execute();
    
            $requete->bind_result($id, $code_utilisateur, $mot_de_passe, $courriel);
    
            if ($requete->fetch()) {
                $utilisateur = new modele_authentification($id, $code_utilisateur, $mot_de_passe, $courriel);
            } else {
                return null;
            }
    
            $requete->close();
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            return null;
        }
    
        return $utilisateur;
    }

    /***
     * Fonction permettant d'ajouter un produit
     */
    public static function ajouter($code_utilisateur, $mot_de_passe, $courriel) {
        $message = '';

        $mysqli = self::connecter();
        
        if ($requete = $mysqli->prepare("INSERT INTO utilisateurs(code_utilisateur, mot_de_passe,  courriel) VALUES(?, ?, ?)")) {      

        $mot_de_passe_crypte = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        $requete->bind_param("sss", $code_utilisateur, $mot_de_passe_crypte, $courriel);

        if($requete->execute()) {
            $message = "Utilisateur ajouté";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }
}

?>