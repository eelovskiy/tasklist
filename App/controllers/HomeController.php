<?php

namespace App\Controllers;

use Framework\Database;

class HomeController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index()
    {
        $tasks = $this->db->query('SELECT * FROM tasks LIMIT 6')->fetchAll();

        loadView('home', [
            'tasks' => $tasks
        ]);
    }
}
