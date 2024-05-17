<?php
    include("header.view.php");

?>
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
                      src="<?= ROOT?>/mdb/img/logo-ensah.png"
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
                                class="dropdown-toggle d-flex align-items-center "
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
                                class="dropdown-toggle d-flex align-items-center "
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
                                class="dropdown-toggle d-flex align-items-center"
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
                      class="dropdown-toggle d-flex align-items-center "
                      href="#"
                      id="navbarDropdownMenuAvatar"
                      role="button"
                      aria-expanded="false"
                    >
                      <img
                        src="<?= ROOT . Auth::getImage();?>"
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
                        <li><?php echo Auth::getFirstname();?></li>
                      <li>
                        <a class="dropdown-item" href="profile">Profile</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="<?= ROOT ?>/logout">Logout</a>
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
    <script type="text/javascript" src="<?=ROOT?>/mdb/js/mdb.umd.min.js"></script>
    <!-- Custom scripts -->
