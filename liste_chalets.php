<?php include_once(__DIR__ . '/include/header.php'); 
  require_once 'controlleurs/chalets.php';

?>

  <main>

    <h1 class="my-4">Tous les chalets actifs</h1>

    <?php 
        	if(isset($_SESSION['utilisateur'])){?>
            <p>Vous êtes connecté en tant que <?= $_SESSION["utilisateur"]?></p>
          <?php
          }
          ?>
    <!-- Afficher la liste de tous les chalets actifs en ordre alphabétique -->
    <!-- L'affichage doit être le même que celui utilisé pour l'affichage des chalets par région -->

    <?php
        $ControlleurChalet = new ControlleurChalet;
        $ControlleurChalet->afficherActif();
    ?>
  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>

 