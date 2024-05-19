

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Send Notification</title>
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

        .container {
            padding-top: 50px;
        }

        .containeer {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid">
            <!-- Toggle button -->
            <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="<?= ROOT ?>/admins">
                    <img src="/final/public/mdb/img/logo-ensah.png" height="30" alt="ENSAH Logo" loading="lazy"/>
                </a>

                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT ?>/admins">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a data-mdb-dropdown-init class="dropdown-toggle nav-link" href="#" id="mes-etudes" role="button" aria-expanded="false">Mes etudes</a>
                        <ul class="dropdown-menu" aria-labelledby="mes-etudes">
                            <li><a class="dropdown-item" href="<?= ROOT ?>/students/modules">Modules</a></li>
                            <li><a class="dropdown-item" href="<?= ROOT ?>/students/absence">Mes absences</a></li>
                            <li><a class="dropdown-item" href="<?= ROOT ?>/students/note">Affichage des notes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a data-mdb-dropdown-init class="dropdown-toggle nav-link" href="#" id="scolaritee" role="button" aria-expanded="false">Scolaritee</a>
                        <ul class="dropdown-menu" aria-labelledby="scolaritee">
                            <li><a class="dropdown-item" href="<?= ROOT ?>/students/classe">Ma classe</a></li>
                            <li><a class="dropdown-item" href="<?= ROOT ?>/students/listeProf">Les professeurs</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT ?>/Demandes">Demandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT ?>/Notification">Send Notification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT ?>/ImportUsers">Importer Etudiants</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a data-mdb-dropdown-init class="dropdown-toggle nav-link" href="#" id="notifsDropdown" role="button" aria-expanded="false"><i class="fa-solid fa-bell"></i> Notifs</a>
                        <ul class="dropdown-menu" aria-labelledby="notifsDropdown">
                            <?php foreach ($notifications as $notification): ?>
                                <li><a class="dropdown-item" href="#"><?= htmlspecialchars($notification['message']) ?> - <?= htmlspecialchars($notification['message']) ?></a></li>
                            <?php endforeach; ?>
                            <?php if (empty($notifications)): ?>
                                <li><a class="dropdown-item" href="#">No notifications</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
                <!-- Right elements -->
                <div class="dropdown">
                    <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                        <img src="../public/<?= Auth::getImage(); ?>" class="rounded-circle" height="40" alt="User Avatar" loading="lazy"/>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li class="dropdown-item"><?php echo Auth::getFirstname(); ?></li>
                        <li><a class="dropdown-item" href="<?= ROOT ?>/profile">Profile</a></li>
                        <li><a class="dropdown-item" href="<?= ROOT ?>/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

   
    

    <!--for dropdowns -->
    <script type="text/javascript" src="../public/mdb/js/mdb.umd.min.js"></script>
</body>
</html>
