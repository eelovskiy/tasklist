<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

class UserController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Показать страницу входа
     * 
     * @return void
     */
    public function login()
    {
        loadView('users/login');
    }

    /**
     * Показать страницу регистрации
     * 
     * @return void
     */
    public function register()
    {
        loadView('users/register');
    }

    /**
     * Сохранить пользователя в БД
     * 
     * @return void
     */
    public function store()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $params = [
            'login' => $login
        ];

        $user = $this->db->query('SELECT * FROM users WHERE login = :login', $params)->fetch();

        $errors = [];

        if ($user) {
            $errors['user'] = 'Данный пользователь уже зарегистрирован';
            loadView('users/register', [
                'errors' => $errors
            ]);
            exit;
        }

        $params = [
            'login' => $login,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $this->db->query('INSERT INTO users (login, password) VALUES (:login, :password)', $params);

        // Получить id нового пользователя
        $userId = $this->db->conn->lastInsertId();

        //Задать сессию
        Session::set('user', [
            'id' => $userId,
            'login' => $login
        ]);

        header("Location: /");
    }

    /**
     * Выйти из аккаунта и уничтожить сессию
     * 
     * @return void
     */
    public function logout()
    {
        Session::clearAll();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

        header("Location: /");
    }

    /**
     * Войти в аккаунт
     * 
     * @return void
     */
    public function authenticate()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        //Проверить логин
        $params = [
            'login' => $login
        ];

        $user = $this->db->query('SELECT * FROM users WHERE
        login = :login', $params)->fetch();

        if (!$user) {
            $errors['user'] = 'Пользователя с данным именем не существует';
            loadView('users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        if (!password_verify($password, $user->password)) {
            $errors['user'] = 'Неверный пароль';
            loadView('users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        //Задать сессию
        Session::set('user', [
            'id' => $user->id,
            'login' => $login
        ]);

        header("Location: /");
    }
}
