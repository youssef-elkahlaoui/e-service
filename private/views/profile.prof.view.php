<?php 
    include "includes/nav.prof.view.php";
    include "includes/header.view.php";
    
?>
    <section style="background-color: #eee; ">
    <div class="container py-5" >
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accuile</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
                </nav>
            </div>
        </div>

        <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="<?= ROOT.Auth::getImage(); ?>" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3"><?=Auth::getFirstname()."  ".Auth::getLastname();?></h5>
                    <br>
                    <p class="text-muted mb-4" >CIN: <?= Auth::getCin();?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nom et Prenom</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= Auth::getFirstname()."  ".Auth::getLastname() ?></p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= Auth::getEmail()?></p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Telephone:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= Auth::getTelephone();?></p>
                        </div>
                </div>
            </div>
            
        </div>
        
    </div>
    </section>
</body>
</html>