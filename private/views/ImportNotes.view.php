<?php 
    include "includes/header.view.php";
    include "includes/nav.prof.view.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    .container {
        padding-top: 50px;
    }
    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    }
    .form-container {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: 10px;
        padding: 30px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        font-weight: bold;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }
</style>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
        <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4 shadow">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Envoyer Notification...</li>
                </ol>
            </nav>
        </div>
    </div>
            <div class="card mb-4">
                <div class="card-body shadow rounded-3">
                    <div class="form-container">
                        <form action="importNotes/importNotes" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label" for="excel">Importer les notes :</label>
                                <input type="file" id="excel" name="excel" class="form-control" required>
                            </div>
                            <div class="form-group row">
                                    <label class="col-form-label col-sm-3" for="filiere">Choisir la filière :</label>
                                    <div class="col-sm-4">
                                        <select id="filiere" name="filiere" class="form-control" required style="cursor: pointer;">
                                            <option value="tdia">TDIA</option>
                                            <option value="info">INFO</option>
                                            <option value="id">ID</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary" name="import_notes">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>