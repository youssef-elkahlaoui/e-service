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
<body>

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
            <a class="navbar-brand mt-2 mt-lg-0" href="<?= ROOT ?>/admins">
                <img
                    src="<?= ROOT ?>/mdb/img/logo.png"
                    height="60"
                    alt="ENSAH Logo"
                    loading="lazy"
                />
            </a>
            
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOT ?>/admins">
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
                        <i class="fa-solid fa-users"></i>&nbsp;Classes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="mesClassesDropdown">
                        <li>
                            <a class="dropdown-item" href="<?= ROOT ?>/admins/getAllstudents">Les étudiants</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOT ?>/admins/getDemandes">
                        <i class="fa-solid fa-school"></i>&nbsp;Demandes
                    </a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOT ?>/admins/notifAdminsend">
                        <i class="fa-solid fa-bell mb-1"></i>&nbsp;Envoie de Notification
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="archivageDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-box-archive mb-1"></i>&nbsp;Archivage
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="archivageDropdown">
                        <li >
                            <a class="dropdown-item" href="<?= ROOT ?>/Allnotification">Notifications</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= ROOT?>/admins/archProf">Profs</a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="contactsDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-regular fa-id-card"></i>&nbsp;Contacts
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="contactsDropdown">
                        <li>
                            <a class="dropdown-item" href="<?= ROOT ?>/admins/getAllAdmins">Admins</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= ROOT ?>/admins/getAllProfs">Professeurs</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="exportsDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-file-excel"></i>&nbsp;Importer
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="exportsDropdown">
                        <li >
                            <a class="dropdown-item" href="<?= ROOT ?>/admins/importusers">Importer Etudiants</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= ROOT ?>/admins/note">Notes</a>
                        </li>
                    </ul>
                </li>
            </ul>

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
                        <a class="dropdown-item" href="<?= ROOT ?>/admins/profile">
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
</body>
</html>
