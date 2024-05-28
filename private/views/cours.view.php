<?php 
    include "includes/header.view.php";
    include "includes/nav.prof.view.php";
    
    if (isset($data) && isset($data['modules'])) {
        $modules = $data['modules'];
    } else {
        $modules = [];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
        <div class="col-lg-12">
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
                        <form action="<?= ROOT ?>/CoursExercices/uploadCour" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label" for="titre">Titre du cours :</label>
                                <input type="text" id="titre" name="titre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">Description du cours :</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="module">Module :</label>
                                <select class="form-control" id="module" name="module" required>
                                    <option value="" disabled selected hidden>Choisir un module</option>
                                    <?php foreach ($modules as $module): ?>
                                        <option value="<?= htmlspecialchars($module->IdCours) ?>">
                                            <?= htmlspecialchars($module->Titre) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pdf">Télécharger un cours (PDF) :</label>
                                <div class="drop-zone" id="drop-zone-pdf">
                                    <p>Glissez-déposez un fichier ici ou cliquez pour sélectionner un fichier</p>
                                    <input type="file" id="pdf" name="pdf" class="form-control" accept=".pdf">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="video">Télécharger un cours (Video) :</label>
                                <div class="drop-zone" id="drop-zone-video">
                                    <p>Glissez-déposez un fichier ici ou cliquez pour sélectionner un fichier</p>
                                    <input type="file" id="video" name="video" class="form-control" accept="video/*">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary" name="upload">Importer</button>
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
    const dropZonePdf = document.getElementById('drop-zone-pdf');
    const fileInputPdf = document.getElementById('pdf');
    const dropZoneVideo = document.getElementById('drop-zone-video');
    const fileInputVideo = document.getElementById('video');

    dropZonePdf.addEventListener('click', () => fileInputPdf.click());
    dropZonePdf.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZonePdf.classList.add('dragover');
    });
    dropZonePdf.addEventListener('dragleave', () => {
        dropZonePdf.classList.remove('dragover');
    });
    dropZonePdf.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZonePdf.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length) {
            fileInputPdf.files = files;
            dropZonePdf.querySelector('p').textContent = files[0].name;
        }
    });
    fileInputPdf.addEventListener('change', () => {
        if (fileInputPdf.files.length) {
            dropZonePdf.querySelector('p').textContent = fileInputPdf.files[0].name;
        } else {
            dropZonePdf.querySelector('p').textContent = 'Glissez-déposez un fichier ici ou cliquez pour sélectionner un fichier';
        }
    });

    dropZoneVideo.addEventListener('click', () => fileInputVideo.click());
    dropZoneVideo.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZoneVideo.classList.add('dragover');
    });
    dropZoneVideo.addEventListener('dragleave', () => {
        dropZoneVideo.classList.remove('dragover');
    });
    dropZoneVideo.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZoneVideo.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length) {
            fileInputVideo.files = files;
            dropZoneVideo.querySelector('p').textContent = files[0].name;
        }
    });
    fileInputVideo.addEventListener('change', () => {
        if (fileInputVideo.files.length) {
            dropZoneVideo.querySelector('p').textContent = fileInputVideo.files[0].name;
        } else {
            dropZoneVideo.querySelector('p').textContent = 'Glissez-déposez un fichier ici ou cliquez pour sélectionner un fichier';
        }
    });
});
</script>
</body>
</html>
