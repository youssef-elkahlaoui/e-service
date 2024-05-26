<?php 
    include "includes/nav.view.php";
    include "includes/header.view.php";

    // Vérifiez si $data est défini et s'il contient des modules
    if(isset($data) && isset($data['module'])) {
        $modules = $data['module']; // Récupérez les modules de $data
    } else {
        // Si $data n'est pas défini ou s'il ne contient pas de modules, initialisez $modules avec un tableau vide
        $modules = array();
    }

    // Vérifiez et affichez les messages de succès ou d'erreur

?>
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rendre les Devoirs</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="p-5 text-center bg-body-tertiary">
            <h1 class="mb-3">Devoir</h1>
        </div>
        <?php
            if(isset($data['success'])) {
                echo '<div class="alert alert-success" role="alert">' . $data['success'] . '</div>';
            } elseif(isset($data['error'])) {
                echo '<div class="alert alert-danger" role="alert">' . $data['error'] . '</div>';
            }
        ?>
        <form method="POST" action="<?= ROOT ?>/sendEtu/sendDevoir" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlInput1">Sujet</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="sujet" placeholder="sujet">
            </div>
            <div class="form-group">
                <label class="form-label" for="customFile">Default file input example</label>
                <input type="file" class="form-control" id="customFile" name="fichier" />
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Module de :</label>
                <select class="form-control" id="exampleFormControlSelect1" name="module">
                <?php 
                    foreach ($modules as $module) {
                        echo '<option value="' . $module->IdCours . '">' . $module->Titre . '</option>';
                    }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea placeholder="....." class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" data-mdb-ripple-init style="margin: 10px;">Envoyer</button>
        </form>
    </div>
</section>
</body>
</html>
