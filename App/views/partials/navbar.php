<?php

use Framework\Session;
?>

<!-- Nav -->
<header class="header">
    <div class="container">
        <h1 class="logo">
            <a href="/">Список задач</a>
        </h1>
        <nav class="nav">
            <?php if (Session::has('user')) : ?>
                <div>
                    Добро пожаловать, <?= Session::get('user')['login'] ?>
                </div>
                <a href="/tasks/create" class="create-task-btn">
                    <i class="fa fa-edit"></i> Создать задачу
                </a>
                <form method="POST" action='/auth/logout'>
                    <button type="submit" class="logout-button">Выйти</button>
                </form>
            <?php else: ?>
                <a href="/auth/login" class="nav-link">Вход</a>
                <a href="/auth/register" class="nav-link">Регистрация</a>
            <?php endif; ?>
        </nav>
    </div>
</header>