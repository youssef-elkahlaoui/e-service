<?php 
    include "includes/header.view.php";
    include "includes/nav.prof.view.php";
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
        .table-container {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 30px;
        }
        .table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 12px;
            border: 1px solid #ced4da;
        }
        .btn-archive {
            color: #ffffff;
            background-color: #dc3545;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        .btn-archive:hover {
            background-color: #c82333;
        }
        .btn-desarchive:hover {
            background-color: #c82333;
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
                            <li class="breadcrumb-item active" aria-current="page">Archive Courses/Exercises</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body shadow rounded-3">
                    <div class="table-container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Class</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if($courses):?>
                                <?php foreach ($courses as $course): ?>
                                    <tr>
                                        <td><?= $course['IdCours'] ?></td>
                                        <td><?= $course['Titre'] ?></td>
                                        <td><?= $course['Description'] ?></td>
                                        <td><?= $course['IdClasse'] ?></td>
                                        <td>
                                            <a href="<?= ROOT ?>/teachers/archive/<?= $course['IdCours'] ?>" class="btn btn-danger">Archive</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                            <tbody>
                                <?php if($dcourses):?>
                                <?php foreach ($dcourses as $course): ?>
                                    <tr>
                                        <td><?= $course['IdCours'] ?></td>
                                        <td><?= $course['Titre'] ?></td>
                                        <td><?= $course['Description'] ?></td>
                                        <td><?= $course['IdClasse'] ?></td>
                                        <td>
                                            <a href="<?= ROOT ?>/teachers/desarchive/<?= $course['IdCours'] ?>" class="btn btn-primary">Desarchive</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>