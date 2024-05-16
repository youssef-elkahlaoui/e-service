<?php 
    require("includes/header.view.php")
?>
<body>
    <?php
        require("includes/nav.etu.view.php")
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
                    <img src="../public/mdb/img/profile.png" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">Nom</h5>
                    <p class="text-muted mb-1">Niveau</p>
                    <p class="text-muted mb-4">CNE</p>
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
                    <div class="col-sm-9">
                        <h6 class="text-muted mb-0">Notes</h6>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">example@example.com</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">(097) 234-5678</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Mobile</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">(098) 765-4321</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    </section>
</body>
</html>