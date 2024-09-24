<?php

namespace Framework\Middleware;

use Framework\Session;

class Authorize
{
    /**
     * Проверить, вошел ли пользователь
     * 
     * @return bool
     */
    public function isAuthenticated()
    {
        return Session::has('user');
    }


    /**
     * Обработка запроса пользователя
     * 
     * @param string $role
     * @return bool
     */
    public function handle($role)
    {
        if ($role === 'guest' && $this->isAuthenticated()) {
            return header("Location: /");
        } else if ($role === 'auth' && !$this->isAuthenticated()) {
            return header("Location: /auth/login");
        }
    }
}
