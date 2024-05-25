<?php 
    include "includes/header.view.php";

    include "includes/nav.admin.view.php";

    echo Auth::getFirstname();
    echo Auth::getLastname();
    ?>