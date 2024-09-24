<?php

namespace Framework;

class Session
{
    /**
     * Начать сессию
     * 
     * @return void
     */
    public static function start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Задать пару ключ/значение сессии
     * 
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Получить значение сессии по ключу
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    /**
     * Проверить, существует ли ключ сессии
     * 
     * @param string key
     * @return bool
     */
    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Очистить сессию по ключу
     * 
     * @param string key
     * @return void
     */
    public static function clear($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Очистить все сессии
     * 
     * @return void
     */
    public static function clearAll()
    {
        session_unset();
        session_destroy();
    }
}
