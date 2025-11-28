<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/config.php';
require_once '../config/database.php';

// Load core manually
require_once '../core/Session.php';
require_once '../core/Database.php'; // <--- PASTIKAN BARIS INI ADA!
require_once '../core/Controller.php';
require_once '../core/Model.php';
require_once '../core/Middleware.php';
require_once '../core/Helper.php';
require_once '../core/Router.php';

// Autoload controllers & models
spl_autoload_register(function($class) {
    $paths = [
        '../app/controllers/' . $class . '.php',
        '../app/models/' . $class . '.php'
    ];
    
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

// Start routing
$router = new Router();