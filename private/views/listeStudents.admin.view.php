<?php require("includes/header.view.php"); ?>
<?php require("includes/nav.admin.view.php"); ?>

<style>
    .container {
        padding-top: 50px;
    }
    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    }
    .card-body {
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
    .clr {
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

    @media (max-width: 767px) {
        .table-responsive {
            overflow-x: auto;
        }

        .table th, .table td {
            padding: 0.75rem 0.5rem;
        }

        .profile-icon {
            width: 20px;
            height: 20px;
        }

        .p-5 {
            padding: 1rem !important;
        }

        .clr {
            padding: 1rem !important;
        }

        .card-body {
            padding: 1rem !important;
        }
    }

    @media (max-width: 575px) {
        .breadcrumb-item a {
            font-size: 0.875rem;
        }

        .table th, .table td {
            font-size: 0.875rem;
            padding: 0.5rem 0.25rem;
        }
    }
</style>

</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
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
                    <div class="p-5 text-center clr">
                        <h1 class="mb-3">Les étudiants</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Avatar</th> 
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Filière</th>
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
</div>

<script>
    function zoomProfileIcon(element) {
        element.style.transform = "scale(7)";
        element.style.transition = "transform 1s";
        setTimeout(function(){
            element.style.transform = "scale(1)";
        }, 1000);
    }
</script>

</body>
</html>
