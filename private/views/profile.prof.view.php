<?php 
    include "includes/nav.prof.view.php";
    include "includes/header.view.php";
    
    if (isset($data) && isset($data['modules'])) {
        $modules = $data['modules'];
    } else {
        $modules = [];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
        .drop-zone {
            border: 2px dashed #ced4da;
            border-radius: 5px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .drop-zone.dragover {
            background-color: #e9ecef;
        }
        .drop-zone input[type="file"] {
            display: none;
        }
        .bg-body-tertiary {
            background-color: #f8f9fa ;
        }
        .rounded-3 {
            border-radius: 0.3rem !important;
        }
        .p-3 {
            padding: 1rem !important;
        }
        .mb-4, .my-4 {
            margin-bottom: 1.5rem !important;
        }
        .breadcrumb-item a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4 shadow">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body shadow rounded-3">
                    <div class="row">
                        <div class="col-lg-4 text-center">
                            <img src="<?= ROOT.Auth::getImage(); ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 200px;" onclick="zoomProfileIcon(this)">
                            <h5 class="my-3"><?= Auth::getFirstname() . " " . Auth::getLastname(); ?></h5>
                            <p class="text-muted mb-4">CIN: <?= Auth::getCin(); ?></p>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-container">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nom et Prenom</label>
                                    <p class="form-control"><?= Auth::getFirstname() . " " . Auth::getLastname(); ?></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <p class="form-control"><?= Auth::getEmail(); ?></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="telephone">Telephone</label>
                                    <p class="form-control"><?= Auth::getTelephone(); ?></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="modules">Modules Enseignés</label>
                                    <ul class="list-group">
                                        <?php foreach ($modules as $module): ?>
                                            <li class="list-group-item form-control">
                                                <?= htmlspecialchars($module->Titre) ?> - Classe: <?= htmlspecialchars($module->class_name) ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function zoomProfileIcon(element) {
        element.style.transform = "scale(2)";
        element.style.transition = "transform 1s";
        setTimeout(function(){
            element.style.transform = "scale(1)";
        }, 1000);
    }
</script>
</html>