<?php
require_once('../helpers.php');
loadPartial('head');
loadPartial('navbar');
?>

<section class="create-task-section">
    <div class="task-form-container">
        <?php if (isset($errors)) : ?>
            <?php foreach ($errors as $error) : ?>
                <?= $error ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <h2 class="form-title">Регистрация</h2>
        <form method="POST" action="/auth/register">
            <div>
                <input
                    type="text"
                    name="login"
                    required
                    placeholder="Логин"
                    class="form-input" />
            </div>
            <div>
                <input
                    type="password"
                    name="password"
                    required
                    placeholder="Пароль"
                    class="form-input" />
            </div>
            <h2 class="form-subtitle">
            </h2>
            <button class="save-button">
                Зарегистрироваться
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
