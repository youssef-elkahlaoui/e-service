<?php

require "config.php";
require "functions.php";
require "database.php";
require "controller.php";
require "model.php";
require "app.php";

spl_autoload_register(function($class_name){
    // Check if the class name ends with "Controller" and if so, load it from the controllers directory
    if (substr($class_name, -10) === "Controller") {
        require "../private/controllers/" . $class_name . ".php";
    }
    // Otherwise, load it from the models directory
    elseif (file_exists("../private/models/" . ucfirst($class_name) . ".php")) {
        require "../private/models/" . ucfirst($class_name) . ".php";
    }
    // Check if the class name corresponds to PHPMailer classes
    elseif (file_exists("private\core\PHPMailer-master\src" . $class_name . ".php")) {
        require "private\core\PHPMailer-master\src" . $class_name . ".php";
    }
});
