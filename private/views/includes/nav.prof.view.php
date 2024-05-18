<?php include('header.view.php'); ?>
<head>
    <style>
        .navbar-nav .nav-item .nav-link,
.navbar-nav .nav-item .dropdown-toggle,
.dropdown-item {
    font-family: 'Poppins', sans-serif;
    font-size: 20px; 
    border-radius: 10px; 
}
.dropdown-item {
    font-size: 20px;
}
.navbar-nav .nav-item .dropdown-toggle,
.navbar-nav .nav-item .nav-link,
.dropdown-item {
    color: #555;
    padding: 8px 12px;
    transition: background-color 0.3s, color 0.3s;
    border-radius: 10px;
}

.navbar-nav .nav-item .dropdown-toggle:hover,
.navbar-nav .nav-item .dropdown-toggle:focus,
.navbar-nav .nav-item .nav-link:hover,
.navbar-nav .nav-item .nav-link:focus,
.dropdown-item:hover,
.dropdown-item:focus {
    color: #fff; 
    background-color: #0062cc; 
}

.dropdown-menu {
    border-radius: 4px; 
}

.dropdown-item {
    color: #333;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}
    </style>
    <link rel="stylesheet" href="../styles/stylenav.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">

    <div class="container-fluid">

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

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand mt-2 mt-lg-0" href="<?= ROOT?>/teachers">
                    <img
                      src="<?= ROOT?>/mdb/img/logo.png"
                      height="60"
                      alt="ENSAH Logo"
                      loading="lazy"
                    />
                </a>
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOT ?>/teachers">
                    <i class="fa-solid fa-house mt-1"></i>
                    &nbsp;
                    Accueil</a>
                </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a
                                data-mdb-dropdown-init
                                class="dropdown-toggle d-flex align-items-center"
                                href="#"
                                id="0"
                                role="button"
                                aria-expanded="false">                         
                            <i class="fa-solid fa-school mb-1"></i>
                            &nbsp;
                            Mes Clases
                            </a>
                            <ul
                                class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="0"
                            >
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/techers/modules">Mes eleves</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/teachers/absence">Les absence</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a
                                data-mdb-dropdown-init
                                class="dropdown-toggle d-flex align-items-center"
                                href="#"
                                id="1"
                                role="button"
                                aria-expanded="false"
                            >
                            <i class="fa-solid fa-bell-concierge mb-1"></i>
                            &nbsp;
                            Demendes</a>
                            <ul
                                class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="1"
                            >
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/teachers/classe">Envoie de Demande</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/teachers/listeProf">Etat des Demandes</a>
                                </li>
                        </div>
                        
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Notification">
                        <i class="fa-solid fa-bell mb-1"></i>
                            &nbsp;
                            Envoie de Notification
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Notification">
                        <i class="fa-solid fa-box-archive mb-1"></i>
                            &nbsp;
                            Archivage</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a
                                data-mdb-dropdown-init
                                class="dropdown-toggle d-flex align-items-center"
                                href="#"
                                id="1"
                                role="button"
                                aria-expanded="false"
                            >
                            <i class="fa-solid fa-users mt-1"></i>
                            &nbsp;
                            Contacts</a>
                            <ul
                                class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="1"
                            >
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/teachers/listeAdmin">Admins</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/teachers/listeProf">Professeurs</a>
                                </li>
                        </div>
                        
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a
                                data-mdb-dropdown-init
                                class="dropdown-toggle d-flex align-items-center"
                                href="#"
                                id="1"
                                role="button"
                                aria-expanded="false"
                            >
                            <i class="fa-solid fa-file-arrow-up mt-1"></i>
                            &nbsp;
                            Exports</a>
                            <ul
                                class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="1"
                            >
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/teachers/classe">Cours & Fichier</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/teachers/classe">TDs & TPs</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= ROOT ?>/teachers/listeProf">Notes</a>
                                </li>
                        </div>
                        
                </li>

                    
                </ul>

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
                        src="<?= ROOT.Auth::getimage();?>"
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
                    <li class="dropdown-item"><?php echo Auth::getFirstname()."  ".Auth::getLastname();?></li>
                    <li>
                        <a class="dropdown-item" href="profile">
                        Profile
                        <i class="fa-solid fa-user"></i>
                    </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= ROOT ?>/logout">
                        logout
                        <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    </li>

                </div>
            </div>
        </div>
    </nav>

    <script type="text/javascript" src="../public/mdb/js/mdb.umd.min.js"></script>


</body>
</html>
