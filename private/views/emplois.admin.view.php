<?php require("includes/header.view.php"); ?>
<?php require("includes/nav.admin.view.php"); ?>

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
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
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
                            <li class="breadcrumb-item active" aria-current="page">Emplois du Temps</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body shadow rounded-3">
                    <div class="p-5 text-center clr crd-body">
                        <h1 class="mb-3">Emplois du Temps</h1>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Classe</th>
                                <th>Date de téléchargement</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($emplois)): ?>
                                <?php foreach ($emplois as $emploi): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($emploi->Classe) ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($emploi->date)) ?></td>
                                        <td>
                                            <a href="<?= htmlspecialchars($emploi->File_path) ?>" target="_blank">Voir & Télécharger</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">Aucun emploi du temps trouvé.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
