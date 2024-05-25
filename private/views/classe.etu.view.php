<?php 
    include "includes/nav.view.php";
    include "includes/header.view.php";
?>


    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$_SESSION['NIVEAU']->NomClasse ?></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="p-5 text-center bg-body-tertiary">
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
    </section>
</body>
</html>
