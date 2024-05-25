<?php 
    include "includes/nav.view.php";
    include "includes/header.view.php";
?>
<?php
// Access the module title from the URL parameter
if (isset($_GET['module_title'])) {
    $moduleTitle = htmlspecialchars($_GET['module_title']);}
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accuile</a></li>
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>/students/modules">Modules</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Documentation de <?= $moduleTitle?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container mt-5">
            <h1>Pas de Documentation pour <?= $moduleTitle?></h1>
        </div>
