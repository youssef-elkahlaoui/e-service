<?php 
include "includes/nav.view.php";
include "includes/header.view.php";
?>

<?php

if (isset($_GET['module_title'])) {
    $moduleTitle = htmlspecialchars($_GET['module_title']);
}
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>/students/modules">Modules</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Documentation de <?= $moduleTitle ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container mt-5">
            <h1>Résultats pour les cours</h1>
            <?php if (!empty($data)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Num</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Description</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $index => $record): ?>
                            <?php if ($record->archived == 1): ?>
                                <tr>
                                    <th scope="row"><?php echo $index + 1; ?></th>
                                    <td><?php echo htmlspecialchars($record->Titre); ?></td>
                                    <td><?php echo nl2br(htmlspecialchars($record->Description)); ?></td>
                                    <td><a href="<?= ROOT ?>/CoursExercices/download/<?php echo $record->IdCours; ?>" class="btn btn-primary">Télécharger</a></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Aucun contenu trouvé.</p>
            <?php endif;?>
        </div>
    </div>
</section>

</body>
</html>
