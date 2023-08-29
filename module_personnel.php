<?php include_once(__DIR__ . '/include/header.php'); 
  require_once 'controlleurs/proprietaires.php';

?>
  
  <main>
  
	<h1>Module personnel</h1>
  <?php 
    if(isset($_SESSION['utilisateur'])){?>
      <p>Vous êtes connecté en tant que <?= $_SESSION["utilisateur"]?></p>
    <?php
      }
    ?>
  
    <p>Liste de personnes avec leurs animaux associés !</p>
    
    <?php
      $ControlleurProprietaire = new ControlleurProprietaire;
      $ControlleurProprietaire->afficherTousAvecAnimaux();
    ?>
	
  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>
