<?php

namespace App\Core;

use App\Core\Database;

class Model
{
    protected static $pdo;

    // Static method to initialize PDO
    public static function initialize()
    {
        if (self::$pdo === null) {
            self::$pdo = Database::connect();
        }
    }
}

