<?php
include "includes/nav.prof.view.php";
include "includes/header.view.php";

if (isset($data) && isset($data['devoirs'])) {
    $devoirs = $data['devoirs'];
} else {
    $devoirs = [];
}
?>
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
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4 shadow">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Voir les Devoirs</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                
        <div class="p-5 text-center bg-body-tertiary shadow">
            <h1 class="mb-3">Liste des Devoirs</h1>
        </div>
        <?php
            if (empty($devoirs)) {
                echo '<div class="alert alert-info shadow" role="alert">Aucun devoir trouvé.</div>';
            } else {
                echo '<div class="table-responsive shadow">';
                echo '<table class="table table-striped">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">#</th>';
                echo '<th scope="col">Nom de l\'étudiant</th>';
                echo '<th scope="col">Sujet</th>';
                echo '<th scope="col">Description</th>';
                echo '<th scope="col">Module</th>';
                echo '<th scope="col">Fichier</th>';
                echo '<th scope="col">Date de création</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                foreach ($devoirs as $devoir) {
                    echo '<tr>';
                    echo '<th scope="row">' . htmlspecialchars($devoir->id) . '</th>';
                    echo '<td>' . htmlspecialchars($devoir->firstname . ' ' . $devoir->lastname) . '</td>';
                    echo '<td>' . htmlspecialchars($devoir->sujet) . '</td>';
                    echo '<td>' . htmlspecialchars($devoir->description) . '</td>';
                    echo '<td>' . htmlspecialchars($devoir->id_module) . '</td>';
                    echo '<td><a href="' . ROOT . '/uploads/' . htmlspecialchars($devoir->fichier) . '" target="_blank">' . htmlspecialchars($devoir->fichier) . '</td>';
                    echo '<td>' . htmlspecialchars($devoir->date_creation) . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            }
        ?>
    </div>
    </div>
    </div>
</body>
</html>