<?php 
    include "includes/header.view.php";
    include "includes/nav.admin.view.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Demandes</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
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
        .bg-body-tertiary {
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
        @media (max-width: 767px) {
            .table-responsive {
                overflow-x: auto;
            }
            .table th, .table td {
                padding: 0.75rem 0.5rem;
                font-size: 0.875rem;
                white-space: nowrap;
            }
            .breadcrumb-item a {
                font-size: 0.875rem;
            }
        }
        @media (max-width: 575px) {
            .breadcrumb-item a {
                font-size: 0.875rem;
            }
            .table th, .table td {
                font-size: 0.75rem;
                padding: 0.5rem 0.25rem;
                white-space: nowrap;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="rounded-3 p-2 mb-4 shadow">
                            <ol class="breadcrumb mb-0 bg-body-tertiary">
                                <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Envoyer Notification...</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-body shadow rounded-3">
                        <div class="form-container">
                            <?php if (!empty($demandes)): ?>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Student ID</th>
                                                <th scope="col">Type de Demande</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Date de Demande</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($demandes as $key => $demande): ?>
                                                <tr>
                                                    <th scope="row"><?php echo $key + 1; ?></th>
                                                    <td><?php echo htmlspecialchars($demande->student_id); ?></td>
                                                    <td><?php echo htmlspecialchars($demande->demand_type); ?></td>
                                                    <td><?php echo htmlspecialchars($demande->demand_description); ?></td>
                                                    <td><?php echo htmlspecialchars($demande->demand_date); ?></td>
                                                    <td><?php echo htmlspecialchars($demande->status); ?></td>
                                                    <td>
                                                        <form action="<?= ROOT ?>/modifyDemand/modify" method="post">
                                                            <input type="hidden" name="approuver" value="<?php echo htmlspecialchars($demande->id); ?>">
                                                            <button type="submit" class="btn btn-outline-success btn-sm">Approuver</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: ?>
                                <p class="text-center">Aucune demande trouvée.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
