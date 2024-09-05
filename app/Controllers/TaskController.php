<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;

/**
 * TaskController handles CRUD operations for tasks.
 */
class TaskController extends Controller
{   
    /**
     * Displays the list of tasks.
     *
     * Fetches all tasks from the database and renders the view with the tasks.
     *
     * @return void
     */
    public function index()
    {
        $tasks = Task::getAll(); 
        $this->render('task/index', ['tasks' => $tasks]); 
    }

    /**
     * Creates a new task.
     *
     * Accepts a JSON payload from a POST request containing a 'name' key.
     * Example JSON: { "name": "New Task" }
     *
     *
     * @return void
     */
    public function createTask()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            Task::add($data['name']); 
            echo json_encode(['success' => true]); 
        }
    }

    /**
     * Deletes a task by its ID.
     *
     *
     * Accepts a JSON payload from a POST request containing an 'id' key.
     * Example JSON: { "id": 7 }
     *
     * @return void
     */
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true); 
            Task::delete($data['id']); 
            echo json_encode(['success' => true]); 
        }
    }

    /**
     * Marks a task as completed or not completed.
     *
     * Accepts a JSON payload from a POST request containing 'id' and 'completed' keys.
     * Example JSON: { "id": 7, "completed": 1 }
     *
     * @return void
     */
    public function complete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true); 
            Task::markAsCompleted($data['id'], $data['completed']); 
            echo json_encode(['success' => true]);
        }
    }
}

