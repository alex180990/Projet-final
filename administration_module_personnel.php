<?php 
	include_once(__DIR__ . '/include/header.php');
	require_once 'controlleurs/proprietaires.php';
	require_once 'controlleurs/animaux.php';
?>

  <main>
  
	<h1>Administration - Module personnel</h1>

	<?php 
    if(isset($_SESSION['utilisateur'])){?>
      <p>Vous êtes connecté en tant que <?= $_SESSION["utilisateur"]?></p>
    <?php
      }
    ?>
	
	<!-- Cette section doit permettre de gérer (lister, ajouter, modifier et supprimer) des enregistrement d'une table que vous avez ajoutée à la base de données. -->
	<!-- Vous pouvez réaliser cette demande en utilisant plusieurs pages php (une pour l'ajout, une pour l'édition et une pour la suppression) ou utiliser des composants dialog ou Modals -->
	<!-- Il doit être impossible d'accéder à cette page sans être préalablement connecté. Si un utilisateur non connecté essaie d'accéder à la page, un message d'erreur doit s'afficher -->
	<a href="ajout_proprietaire.php">Ajouter un propriétaire</a>

	<?php
		$controllerProprietaires=new ControlleurProprietaire;
		$controllerProprietaires->afficherTableauAvecBoutonsAction();
	?>
<hr>
	<a href="ajout_animal.php">Ajouter un animal</a>
	<?php
		$controllerAnimaux=new ControlleurAnimal;
		$controllerAnimaux->afficherTableauAvecBoutonsAction();
	?>

  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>