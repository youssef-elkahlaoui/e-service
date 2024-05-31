<?php 
    include "includes/nav.view.php";
    include "includes/header.view.php";
?>
    <section style="background-color: #eee; ">
    <div class="container py-5" >
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accuile</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Notes</li>
                </ol>
                </nav>
            </div>
        </div>

        <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5 class="my-3"><?=Auth::getFirstname().' '.Auth::getLastname();?></h5>
                    <p class="text-muted mb-1"><?=$_SESSION['NIVEAU']->NomClasse?></p>
                    <p class="text-muted mb-1"><?=Auth::getCne();?></p>
                    <p class="text-muted mb-4"><?=Auth::getCin();?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Modules</h6>
                    </div>
                    <div class="col-sm-4">
                        <h6 class="text-muted mb-0">Notes</h6>
                    </div>
                    <div class="col-sm-4">
                        <h6 class="text-muted mb-0">voir plus</h6>
                    </div>
                    </div>
                    <hr>
                    <?php foreach ($data as $moduleGrade): ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"><?php echo htmlspecialchars($moduleGrade['courseTitle']); ?></p>
                            </div>
                            <div class="col-sm-4">
                                <p class="text-muted mb-0"><?php echo $moduleGrade['averageGrade'] !== false ? number_format($moduleGrade['averageGrade'], 2) : 'Aucune note valide'; ?></p>
                            </div>
                            <div class="col-sm-4">
                                <p class="text-muted mb-0"><a href="<?= ROOT ?>/students/seulnote/<?= $moduleGrade['courseId']; ?>">voir plus</a></p>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                </div>
            </div>
            
        </div>
        
    </div>
    </section>
</body>
</html>