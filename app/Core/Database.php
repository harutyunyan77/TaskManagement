<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    public static function connect()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=task_management', 'root', 'password'); 
            /* change root to your mysql username and password to your password */
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}

