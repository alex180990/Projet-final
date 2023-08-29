<?php 
  include_once(__DIR__ . '/include/header.php'); 
  include_once 'controlleurs/chalets.php';
?>

  <main>
  
    <h1>Promotions (chalets actifs en promotion)</h1>

    <?php 
        	if(isset($_SESSION['utilisateur'])){?>
            <p>Vous êtes connecté en tant que <?= $_SESSION["utilisateur"]?></p>
          <?php
          }
          ?>

    <?php
    $ControlleurChalet = new ControlleurChalet;
    $ControlleurChalet->afficherPromotions();
    ?>
    <!-- Afficher la liste de tous les chalets ACTIFS et EN PROMOTION en ordre alphabétique -->
    <!-- L'affichage doit être le même que celui utilisé pour l'affichage des chalets par région -->
	
  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>

