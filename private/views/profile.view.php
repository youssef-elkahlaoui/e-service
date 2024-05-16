<?php 
    $row = $data['rows'][0];
    print_r($row);
    foreach ($row as $key => $value) {
        ${$key}= $value; 
            
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-service</title>
    <!-- MDB icon -->
    <link rel="icon" href="/final/public/mdb/img/logo-ensah.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="/final/public/mdb/css/mdb.min.css" />
    <style>
        .navbar-nav .nav-item .dropdown-toggle {
            color: #555; /* Change this to your preferred font color */
            padding: 8px 12px;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .navbar-nav .nav-item .dropdown-toggle:hover,
        .navbar-nav .nav-item .dropdown-toggle:focus {
            color: #fff; /* Color when hovered or focused */
            background-color: #0062cc; /* Background color when hovered or focused */
        }

        .dropdown-menu {
            border-radius: 4px; /* Rounded corners for dropdown */
        }

        .dropdown-item {
            color: #333; /* Dropdown item font color */
        }

        .dropdown-item:hover {
            background-color: #f8f9fa; /* Background color of dropdown items when hovered */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button
              data-mdb-collapse-init
              class="navbar-toggler"
              type="button"
              data-mdb-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="<?= ROOT?>/students">
                    <img
                      src="/final/public/mdb/img/logo-ensah.png"
                      height="30"
                      alt="ENSAH Logo"
                      loading="lazy"
                    />
                </a>
                
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOT ?>/students">Accuille</a>
                </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a
                                data-mdb-dropdown-init
                                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                                href="#"
                                id="0"
                                role="button"
                                aria-expanded="false"
                            >Mes etudes</a>
                            <ul
                                class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="0"
                            >
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/students/modules">Modules</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/students/absence">Mes absence</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/students/note">Affichage des notes</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a
                                data-mdb-dropdown-init
                                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                                href="#"
                                id="1"
                                role="button"
                                aria-expanded="false"
                            >Scolaritee</a>
                            <ul
                                class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="1"
                            >
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/students/classe">Ma classe</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/students/listeProf">Mes professeurs</a>
                                </li>
                        </div>
                        
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a
                                data-mdb-dropdown-init
                                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                                href="#"
                                id="3"
                                role="button"
                                aria-expanded="false"
                            >Demandes</a>
                            <ul
                                class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="3"
                            >
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/students/demande">Nouveau Demande</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/students/etatDemande">Mes Demandes</a>
                                </li>
                        </div>
                        
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT ?>/students/devoir">Rendre les devoirs</a>
                    </li>
                </li>
                    
                </ul>
                <!-- Left links -->

                <!-- Right elements -->
                <div class="dropdown">
                    <a
                      data-mdb-dropdown-init
                      class="dropdown-toggle d-flex align-items-center hidden-arrow"
                      href="#"
                      id="navbarDropdownMenuAvatar"
                      role="button"
                      aria-expanded="false"
                    >
                      <img
                        src="../public/<?= $image;?>"
                        class="rounded-circle"
                        height="40"
                        alt="Black and White Portrait of a Man"
                        loading="lazy"
                      />
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end"
                      aria-labelledby="navbarDropdownMenuAvatar"
                    >
                        <li><?php echo $firstname .' '. $lastname;?></li>
                      <li>
                        <a class="dropdown-item" href="profile">Profile</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="<?= ROOT ?>/logout">logout</a>
                      </li>

                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="../public/mdb/js/mdb.umd.min.js"></script>
    <!-- Custom scripts -->


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
                    <img src="../public/mdb/img/profile.png" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">Nom</h5>
                    <p class="text-muted mb-1"></p>
                    <p class="text-muted mb-4">CNE</p>
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
                        <p class="text-muted mb-0"><?= $firstname."  ".$lastname ?></p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $email?></p>
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