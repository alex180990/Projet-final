<?php

require_once "./include/config.php";
include_once './modeles/regions.php';

class modele_chalet {
    public $id;
    public $nom;
    public $description;
    public $personnes_max;
    public $prix_haute_saison;
    public $prix_basse_saison;
    public $actif;
    public $promo;
    public $date_inscription;
    public $fk_region;
    public $id_picsum;

    public function __construct($id, $nom, $description, $personnes_max, $prix_haute_saison, $prix_basse_saison, $actif, $promo, $date_inscription, $fk_region, $id_picsum) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->personnes_max = $personnes_max;
        $this->prix_haute_saison = $prix_haute_saison;
        $this->prix_basse_saison = $prix_basse_saison;
        $this->actif = $actif;
        $this->promo = $promo;
        $this->date_inscription = $date_inscription;
        $this->fk_region = $fk_region;
        $this->id_picsum = $id_picsum;
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

        $resultatRequete = $mysqli->query("SELECT id, nom, description, personnes_max, prix_haute_saison, prix_basse_saison, actif, promo, date_inscription, fk_region, id_picsum FROM chalets ORDER BY nom");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_chalet($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['personnes_max'], $enregistrement['prix_haute_saison'], $enregistrement['prix_basse_saison'], $enregistrement['actif'], $enregistrement['promo'], $enregistrement['date_inscription'], $enregistrement['fk_region'], $enregistrement['id_picsum']);
        }

        return $liste;
    }

    public static function Obtenir6_actif_promo(){
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM chalets WHERE actif=1 AND promo=1 ORDER BY date_inscription LIMIT 6");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_chalet($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['personnes_max'], $enregistrement['prix_haute_saison'], $enregistrement['prix_basse_saison'], $enregistrement['actif'], $enregistrement['promo'], $enregistrement['date_inscription'], $enregistrement['fk_region'], $enregistrement['id_picsum']);
        }

        return $liste;
    }

    public static function Obtenir_actif_promo(){
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM chalets WHERE actif=1 AND promo=1 ORDER BY date_inscription");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_chalet($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['personnes_max'], $enregistrement['prix_haute_saison'], $enregistrement['prix_basse_saison'], $enregistrement['actif'], $enregistrement['promo'], $enregistrement['date_inscription'], $enregistrement['fk_region'], $enregistrement['id_picsum']);
        }

        return $liste;
    }

    public static function ObtenirActif(){
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM chalets WHERE actif=1 ORDER BY nom");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_chalet($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['personnes_max'], $enregistrement['prix_haute_saison'], $enregistrement['prix_basse_saison'], $enregistrement['actif'], $enregistrement['promo'], $enregistrement['date_inscription'], $enregistrement['fk_region'], $enregistrement['id_picsum']);
        }

        return $liste;
    }

    public static function Obtenir_par_region($regionId){
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM `chalets` WHERE actif=1 AND fk_region=". $regionId ." ORDER BY nom");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_chalet($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['personnes_max'], $enregistrement['prix_haute_saison'], $enregistrement['prix_basse_saison'], $enregistrement['actif'], $enregistrement['promo'], $enregistrement['date_inscription'], $enregistrement['fk_region'], $enregistrement['id_picsum']);
        }

        return $liste;
    }

    public static function ObtenirUn($id) {
        $mysqli = self::connecter();
        $chalet = null;
        
        if ($requete = $mysqli->prepare("SELECT * FROM chalets WHERE id=?")) {
            $requete->bind_param("i", $id);
            $requete->execute();
    
            // Bind variables to store the result
            $requete->bind_result($chalet_id, $nom, $description, $personnes_max, $prix_haute_saison, $prix_basse_saison, $actif, $promo, $date_inscription, $fk_region, $id_picsum);
    
            // Fetch and use the data
            if ($requete->fetch()) {
                $chalet = new modele_chalet($chalet_id, $nom, $description, $personnes_max, $prix_haute_saison, $prix_basse_saison, $actif, $promo, $date_inscription, $fk_region, $id_picsum);
            }
    
            $requete->close();
        } 
    
        return $chalet;
    }
}

?>