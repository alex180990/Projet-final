
<?php
    include_once(__DIR__ . '/include/header.php'); 
    include_once 'controlleurs/chalets.php';
?>
    
<?php
    if(isset($_SESSION['utilisateur'])){?>
        <p>Vous êtes connecté en tant que <?= $_SESSION["utilisateur"]?></p>
    <?php
    }?>
          
<?php
    $ControlleurChalet = new ControlleurChalet;
    $ControlleurChalet->afficherFiche();
?>

<?php include_once(__DIR__ . '/include/footer.php'); ?>