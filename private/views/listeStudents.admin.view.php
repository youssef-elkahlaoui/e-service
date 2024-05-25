<?php require("includes/header.view.php"); ?>
<?php require("includes/nav.admin.view.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Admins</title>
    <style>
        .container {
            padding-top: 50px;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
        .crd-body {
            border: 1px solid #ced4da;
            border-radius: 10px;
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
            background-color: #f8f9fa;
        }
        .clr{
            background-color: #f8f9fa;
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
        .profile-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row bg-white">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4 shadow">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Les étudiants</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body shadow rounded-3">
                    <div class="p-5 text-center clr crd-body">
                        <h1 class="mb-3">Les étudiants</h1>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Avatar</th> <!-- Column for profile icons -->
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Filiere</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student): ?>
                            <tr>
                                <td><img src="<?= ROOT. $student->image;?>" alt="Profile Icon" class="profile-icon" onclick="zoomProfileIcon(this)"></td>
                                <td><?= $student->firstname ?></td>
                                <td><?= $student->lastname ?></td>
                                <td><?= $student->email ?></td>
                                <td><?= $student->Filiere ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function zoomProfileIcon(element) {
        element.style.transform = "scale(7)";
        element.style.transition = "transform 1s";
        setTimeout(function(){
            element.style.transform = "scale(1)";
        }, 1000);
    }
</script>
</html>
