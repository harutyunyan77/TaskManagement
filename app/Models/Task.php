<?php

namespace App\Models;

use App\Core\Model;

class Task extends Model
{
    public static function getAll()
    {
        $stmt = self::$pdo->query("SELECT * FROM tasks ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public static function add($name)
    {
        $stmt = self::$pdo->prepare("INSERT INTO tasks (name) VALUES (:name)");
        $stmt->execute(['name' => $name]);
    }

    public static function delete($id)
    {
        $stmt = self::$pdo->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public static function markAsCompleted($id, $completed)
    {
        $stmt = self::$pdo->prepare("UPDATE tasks SET completed = :completed WHERE id = :id");
        $stmt->execute(['completed' => $completed, 'id' => $id]);
    }
}

