

<?php 
    include "includes/nav.view.php";
    include "includes/header.view.php";
    print_r($_SESSION['NIVEAU']);
?>

    <h2>Hi! <?=  Auth::getFirstname(); ?></h2>
    <h5>Nom Filiere : <?= $_SESSION['NIVEAU']->NomFiliere ?></h6>
    <?php print_r($_SESSION['STUDENT'])?>


</body>
</html>