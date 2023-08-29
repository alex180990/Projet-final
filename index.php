<?php include_once(__DIR__ . '/include/header.php');
  include_once 'controlleurs/chalets.php'
  
?>

<main>
    <h1>Projet final</h1>
    <?php 
        	if(isset($_SESSION['utilisateur'])){?>
            <p>Vous êtes connecté en tant que <?= $_SESSION["utilisateur"]?></p>
          <?php
          }
          ?>
  <?php
        $ControlleurChalet = new ControlleurChalet;
        $ControlleurChalet->afficherAccueil();
  ?>
  
</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>