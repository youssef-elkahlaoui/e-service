<?php
include "includes/nav.prof.view.php";
include "includes/header.view.php";

if (isset($data) && isset($data['devoirs'])) {
    $devoirs = $data['devoirs'];
} else {
    $devoirs = [];
}
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Voir les Devoirs</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="p-5 text-center bg-body-tertiary">
            <h1 class="mb-3">Liste des Devoirs</h1>
        </div>
        <?php
            if (empty($devoirs)) {
                echo '<div class="alert alert-info" role="alert">Aucun devoir trouvé.</div>';
            } else {
                echo '<div class="table-responsive">';
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
</section>
</body>
</html>