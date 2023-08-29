<?php 
include_once(__DIR__ . '/include/header.php');
include_once 'modeles/regions.php';
include_once 'controlleurs/chalets.php';

  if(isset($_GET['id'])) {
    $regionId = $_GET['id'];
  }

  $region = modele_region::ObtenirUn($regionId);
  $titre = $region->nom;

?>

  <main>
  
    <h1><?=$titre?></h1>

    <?php 
        	if(isset($_SESSION['utilisateur'])){?>
            <p>Vous êtes connecté en tant que <?= $_SESSION["utilisateur"]?></p>
          <?php
          }
          ?>

    <?php
      $ControlleurChalet = new ControlleurChalet;
      $ControlleurChalet->afficherParRegion($regionId);
    ?>

  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>