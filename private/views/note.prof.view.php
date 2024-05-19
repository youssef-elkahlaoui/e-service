<?php 
    include "includes/nav.prof.view.php";
    include "includes/header.view.php";
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Importation des Cours et Fichiers</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="p-5 text-center bg-body-tertiary">
            <h1 class="mb-3">Importation des Cours et Fichiers</h1>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form action="import_handler.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="courseName">Nom du cours</label>
                        <input type="text" class="form-control" id="courseName" name="courseName" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="courseFile">Fichier du cours</label>
                        <input type="file" class="form-control" id="courseFile" name="courseFile" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Importer</button>
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>
