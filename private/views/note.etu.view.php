<?php 
    include "includes/nav.view.php";
    include "includes/header.view.php";
?>
<section style="background-color: #eee; ">
        <div class="container py-5" >
            <div class="row">
                <div class="col">
                <?php foreach ($data['module'] as $module): ?>
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accuile</a></li>
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>/students/note">Affichage des Notes</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $module->Titre ?></li>
                    </ol>
                    </nav>
                </div>
            </div>
            <div class="p-5 text-center bg-body-tertiary">
                <h1 class="mb-3">
                    <?= $module->Titre ?></h1>
                <?php endforeach; ?>
            </div>
            
            <table class="table table-hover">
                <tr>
                    <th>Note</th>
                    <th>Coefficient</th>
                    <th>Type</th>
                </tr>
                <?php foreach ($data['note'] as $note): ?>
                <?php if ($note->IdCours == $module->IdCours): ?>
                        <tr>
                            <td><?= $note->Valeur ?></td>
                            <td><?= $note->Coefficient ?>%</td>
                            <td><?= $note->TypeNote ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>

            </table>

                
            </div>
            
        </div>
</section>