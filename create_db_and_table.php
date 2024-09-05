<?php

// Database credentials
$host = 'localhost';
$user = 'root'; // Replace with your database user
$pass = ''; // Replace with your database password
$db_name = 'task_management';

try {
    // Create a connection to MySQL
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    // Set error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Step 1: Create the database if it doesn't exist
    $sqlCreateDB = "CREATE DATABASE IF NOT EXISTS $db_name";
    $pdo->exec($sqlCreateDB);
    echo "Database created successfully or already exists. ";

    // Step 2: Select the database
    $pdo->exec("USE $db_name");
    echo "Database switched to $db_name. ";

    // Step 3: Create the tasks table if it doesn't exist
    $sqlCreateTable = "
        CREATE TABLE IF NOT EXISTS tasks (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            completed TINYINT(1) DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    $pdo->exec($sqlCreateTable);
    echo "Table 'tasks' created successfully or already exists. ";

} catch (PDOException $e) {
    // Handle any errors
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>

