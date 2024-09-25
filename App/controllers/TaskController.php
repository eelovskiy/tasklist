<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Session;
use Exception;

class TaskController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show all tasks
     *
     * @return void
     */
    public function index()
    {
        $user_id = Session::get('user')['id'];

        $params = [
            'user_id' => $user_id
        ];

        $tasks = $this->db->query('SELECT * FROM tasks WHERE user_id = :user_id ORDER BY created_at DESC', $params)->fetchAll();

        loadView('tasks/index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Create a task
     *
     * @return void
     */
    public function create()
    {
        loadView('tasks/create');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $status = isset($_POST['status']) && $_POST['status'] == "on" ? 1 : 0;
            $user_id = Session::get('user')['id'];
            $this->db->query(
                "INSERT INTO tasks (name, description, status, user_id) VALUES (:name, :description, :status, :user_id)",
                [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'status' => $status,
                    'user_id' => $user_id
                ]
            );
            header("Location: /");
        }
    }

    /**
     * Delete a task
     * 
     * @return void
     */

    public function delete($params)
    {
        $id = $params['id'] ?? '';
        if (!$id) {
            header('Location: /tasks');
            exit;
        }
        try {
            $this->db->query("DELETE FROM tasks WHERE id = :id", ['id' => $id]);
            header('Location: /tasks');
            exit;
        } catch (Exception $e) {
            header('Location: /tasks');
            exit;
        }
    }


    /**
     * Update task
     *
     * @param array $params
     * @return void
     */
    public function update($params)
    {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $task = $this->db->query('SELECT * FROM tasks WHERE id = :id', $params)->fetch();

        //Check if task exists
        if (!$task) {
            ErrorController::notFound('task not found');
        }

        loadView('tasks/update', [
            'task' => $task
        ]);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $status = isset($_POST['status']) && $_POST['status'] == "on" ? 1 : 0;
            $this->db->query(
                "UPDATE tasks SET name=:name, description=:description, status=:status WHERE id=:id",
                [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'status' => $status,
                    'id' => $params['id']
                ]
            );
            header("Location: /");
        }
    }

    /**
     * Show a task
     *
     * @return void
     */
    public function show($params)
    {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $task = $this->db->query('SELECT * FROM tasks WHERE id = :id', $params)->fetch();

        //Check if task exists
        if (!$task) {
            ErrorController::notFound('task not found');
            exit;
        }

        loadView('tasks/update', [
            'task' => $task
        ]);
    }

    /**
     * Поиск заданий
     * 
     * @return void
     */
    public function search()
    {
        $name = isset($_GET['name']) ? trim($_GET['name']) : '';

        $query = "SELECT * FROM tasks WHERE name LIKE :name OR description LIKE :name";
        $params = [
            'name' => "%{$name}%",
        ];

        $tasks = $this->db->query($query, $params)->fetchAll();
        loadView('/tasks/index', [
            'tasks' => $tasks,
            'keywords' => $name
        ]);
    }
}
