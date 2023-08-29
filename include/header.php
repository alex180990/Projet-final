<?php
  session_start();
  require_once 'controlleurs/regions.php';
  require_once 'controlleurs/authentification.php';

?>

<!DOCTYPE html>
<html lang="fr-CA">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Titre de la page (défi! rendre ce titre dynamique selon la page sélectionnée)</title>
  
  <link rel="stylesheet" href="css/styles.css">
</head>

<body class="light-mode">

  <!-- Navigation -->
  <header>
    <nav>
      <img src="https://picsum.photos/id/13/80" alt="logo">
      <ul>

          <li><a href="index.php">Accueil</a></li>
          <li><a href="liste_chalets.php">Chalets à louer</a></li>
          <li>
            <a href="#">Chalets par région &nbsp;<i class="arrow down"></i></a>
            <?php
              $ControllerRegion = new ControlleurRegion;
              $ControllerRegion->afficherListe();
            ?>
          </li>
          <li><a href="liste_chalets_en_promotion.php">Chalets en promotion</a></li>
          <li><a href="module_personnel.php">Module personnel</a></li>
          <li>
            <?php
              if(isset($_SESSION['utilisateur'])){
                ?>
                <a href="administration_chalets.php">Administration &nbsp;<i class="arrow down"></i></a>
                <?php
              }
            ?>
            <ul>
              <li><a href="administration_chalets.php">Chalets</a></li>
              <li><a href="administration_module_personnel.php">Module personnel</a></li>
            </ul>
          </li>
      </ul>
      
      <? require 'vues/authentification/formulaire_authentification.php'; ?>

    </nav>
    <hr>
  </header>