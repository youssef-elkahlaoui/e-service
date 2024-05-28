<?php 
    include "includes/header.view.php";

    include "includes/nav.admin.view.php";
?>
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

<body>
    <div class="container">
<div class="row justify-content-center">
    <div class="col-lg-12">
        
        <div class="row">
            <div class="col">

                    <ol class="breadcrumb mb-0 bg-body-tertiary rounded-3 p-3 mb-4 shadow">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Envoyer Notification...</li>
                    </ol>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body shadow rounded-3">
        <div class="form-container">
                <form action="importUsers/import" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label" for="excel">Importer les ètudiants :</label>
                        <input type="file" id="excel" name="excel" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary " name="import">Import</button>
                    </div>
                </form>
        </div>
    </div> 
</div>
</div>
</body>


</html>
