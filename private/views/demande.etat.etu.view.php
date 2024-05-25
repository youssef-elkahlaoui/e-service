<?php 
    include "includes/nav.view.php";
    include "includes/header.view.php";
    $nbr = 1;
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mes Demandes</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="p-5 text-center bg-body-tertiary">
            <h1 class="mb-3">Mes Demandes</h1>
        </div>

        <?php if(isset($data['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($data['error'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <?php if(isset($data['demands']) && count($data['demands']) > 0): ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type de demande</th>
                        <th>Description</th>
                        <th>Date de demande</th>
                        <th>État</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['demands'] as $demand): ?>
                        <tr class="<?= ($demand->status == 'realise') ? 'table-success' : (($demand->status == 'refuse') ? 'table-danger' : 'table-warning') ?>">
                            <td><?= $nbr++ ?></td>
                            <td><?= htmlspecialchars($demand->demand_type, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($demand->demand_description, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($demand->demand_date, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($demand->status, ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                Aucune demande trouvée.
            </div>
        <?php endif; ?>
    </div>
</section>
</body>
</html>
