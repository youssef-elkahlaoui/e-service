<?php 
    include "includes/header.view.php";
    include "includes/nav.prof.view.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Cours</title>
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
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4 shadow">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cours...</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body shadow rounded-3">
                    <div class="form-container">
                        <form action="CoursExercices/uploadCour" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label" for="titre">Titre du cours :</label>
                                <input type="text" id="titre" name="titre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">Description du cours :</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="selectedoption">Choisir la classe :</label>
                                <select class="form-control" id="selectedoption" name="selectedoption" required>
                                    <option value="" disabled selected hidden>Choisir une option</option>
                                    <option value="TDIA1">TDIA1</option>
                                    <option value="GI1">GI1</option>
                                    <option value="ID1">ID1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pdf">Télécharger un cours (PDF) :</label>
                                <div class="drop-zone" id="drop-zone">
                                    <p>Glissez-déposez un fichier ici ou cliquez pour sélectionner un fichier</p>
                                    <input type="file" id="pdf" name="pdf" class="form-control" accept=".pdf" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary" name="upload">Eporter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('pdf');

    dropZone.addEventListener('click', () => fileInput.click());

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('dragover');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length) {
            fileInput.files = files;
            dropZone.querySelector('p').textContent = files[0].name;
        }
    });

    fileInput.addEventListener('change', () => {
        if (fileInput.files.length) {
            dropZone.querySelector('p').textContent = fileInput.files[0].name;
        } else {
            dropZone.querySelector('p').textContent = 'Glissez-déposez un fichier ici ou cliquez pour sélectionner un fichier';
        }
    });
});
</script>
</body>
</html>