<?php 
include "includes/nav.view.php";
include "includes/header.view.php";
?>


<section style="background-color: #f8f9fa;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4 shadow">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$_SESSION['NIVEAU']->NomClasse ?></li>
                    </ol>
                </nav>
                <div class="card mb-4">
                    <div class="card-body shadow rounded-3">
                        <div class="bg-body-tertiary">
                            <h1 class="mb-3"><?=$_SESSION['NIVEAU']->NomClasse?></h1>
                        </div>
                        <h5 class="mb-3">Vos camarades :</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Etudiant</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $user): ?>
                                <?php if (Auth::getId() != $user->id): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($user->firstname . ' ' . $user->lastname); ?></td>
                                        <td><?php echo htmlspecialchars($user->email); ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
