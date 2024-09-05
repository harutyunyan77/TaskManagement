<?php

// Autoloader function
spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    if (strpos($classPath, 'App') === 0) {
        $classPath = 'app' . substr($classPath, 3);
    }
    $fullPath = __DIR__ . '/../' . $classPath . '.php';
    if (file_exists($fullPath)) {
        require_once $fullPath;
    } else {
        die("The file {$fullPath} could not be found.");
    }
});

// Initialize PDO connection
try {
    \App\Core\Model::initialize(); // Initialize the PDO connection
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Initialize the router and handle the request
use App\Core\Router;

$router = new Router();
$router->handleRequest();

