<?php 
    include "includes/nav.view.php";
    include "includes/header.view.php";
    print_r($data);
?>

<div class="alert alert-success" role="alert">
  <?= $data[0]?>
</div>
