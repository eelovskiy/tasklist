<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Session;

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
        $user_id = Session::get('user')['id'];

        $params = [
            'user_id' => $user_id
        ];

        $tasks = $this->db->query('SELECT * FROM tasks WHERE user_id = :user_id LIMIT 6', $params)->fetchAll();

        loadView('home', [
            'tasks' => $tasks
        ]);
    }
}
