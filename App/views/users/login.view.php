<?php
require_once('../helpers.php');
loadPartial('head');
loadPartial('navbar');
?>

<section class="create-task-section">
    <div class="task-form-container">
        <h2 class="form-title">Вход</h2>
        <?php if (isset($errors)) : ?>
            <?php foreach ($errors as $error) : ?>
                <?= $error ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <form method="POST" action="/auth/login">
            <div>
                <input
                    type="text"
                    name="login"
                    placeholder="Логин"
                    class="form-input" />
            </div>
            <div>
                <input
                    type="text"
                    name="password"
                    placeholder="Пароль"
                    class="form-input" />
            </div>
            <h2 class="form-subtitle">
            </h2>
            <button type="submit" class="save-button">
                Войти
            </button>
            <div class="cancel-button-container">
                <a href="/" class="cancel-button">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</section>

<?php loadPartial('footer');
