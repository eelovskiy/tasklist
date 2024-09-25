<?php
require_once('../helpers.php');
loadPartial('head');

?>

<section class="create-task-section">
    <div class="task-form-container">
        <h2 class="form-title">Создать задачу</h2>
        <form method="POST" action="">
            <div>
                <input
                    type="text"
                    name="name"
                    required
                    placeholder="Название задачи"
                    class="form-input" />
            </div>
            <div>
                <textarea
                    name="description"
                    required
                    placeholder="Описание задачи"
                    class="form-input"></textarea>
            </div>
            <label>
                <input
                    type="checkbox"
                    name="status"
                    class="form-checkbox" />
                Выполнена
            </label>
            <h2 class="form-subtitle">
            </h2>
            <button class="save-button">
                Сохранить
            </button>
            <div class="cancel-button-container">
                <a href="/" class="cancel-button">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</section>

<?php loadPartial('footer'); ?>