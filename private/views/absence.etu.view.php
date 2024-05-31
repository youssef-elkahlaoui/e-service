<?php 
include "includes/header.view.php";
include "includes/nav.view.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            padding-top: 50px;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
        .bg-body-tertiary {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        .breadcrumb {
            background-color: transparent;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4 shadow">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Absences</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body shadow rounded-3">
            <div class="bg-body-tertiary">
                <h1 class="mb-3">Vos absences</h1>
                <h5 class="mb-3">Nombre total est: <?= count($data) ?></h5>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>Modules</th>
                    <th>Date</th>
                    <th>Justifiée</th>
                </tr>
                <?php 
                    foreach ($data as $row) {
                        echo "<tr>";
                        echo "<td>{$row->ModuleName}</td>";
                        echo "<td>{$row->DateAbsence}</td>";
                        $justification = $row->Justifiée == 0 ? "non" : "oui";
                        echo "<td>$justification</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
