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
            color: #555;
        }
        .icon{

            transform: translateX(-100%);
        }
        @media (max-width:980px){
            .icon{
            transform: translateX(10%);
            }
        }
    </style>
    <link rel="stylesheet" href="../styles/stylenav.css">
</head>
<body style="background-color: #eee;">

<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
    <div class="container-fluid">
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand mt-2 mt-lg-0" href="<?= ROOT ?>/student">
                <img
                    src="<?= ROOT ?>/mdb/img/logo.png"
                    height="60"
                    alt="ENSAH Logo"
                    loading="lazy"
                />
            </a>
            
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOT ?>/student">
                        <i class="fa-solid fa-house mt-1"></i>&nbsp;Accueil
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="mesClassesDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-book"></i>&nbsp;Mes Etudes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="mesClassesDropdown">
                        <li>
                            <a class="dropdown-item" href="<?= ROOT ?>/students/modules">Modules</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= ROOT ?>/students/devoir">Rendre Devoir</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOT ?>/students/absence"><i class="fa-solid fa-circle-xmark"></i>&nbsp;Absences</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOT ?>/students/note">
                    <i class="fa-solid fa-marker fa-shake"></i>&nbsp;Notes
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="mesClassesDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-school mb-1"></i>&nbsp;Scolaritee
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="mesClassesDropdown">
                        <li>
                            <a class="dropdown-item" href="<?= ROOT ?>/students/demande">Nouveau Demande</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= ROOT ?>/students/etatDemande">Mes Demandes</a>
                        </li>
                    </ul>
                </li>
            </div>

            <div  class="dropdown">
                <a
                    class="nav-link dropdown-toggle d-flex align-items-center hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuAvatar"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img
                        src="<?= ROOT . Auth::getimage(); ?>"
                        class="rounded-circle"
                        height="40"
                        alt="Black and White Portrait of a Man"
                        loading="lazy"
                    />
                </a>
                <ul class="dropdown-menu dropdown-menu-start icon" aria-labelledby="navbarDropdownMenuAvatar">
                    <li class="dropdown-item"><?php echo Auth::getFirstname() . "  " . Auth::getLastname(); ?></li>
                    <li>
                        <a class="dropdown-item" href="<?= ROOT ?>/students/profile">
                            Profile
                            <i class="fa-solid fa-user"></i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= ROOT ?>/logout">
                            Logout
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

