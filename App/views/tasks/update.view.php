<?php
require_once('../helpers.php');
loadPartial('head');
?>

<section class="create-task-section">
    <div class="task-form-container">
        <h2 class="form-title">Изменить задачу</h2>
        <form method="POST" action="">
            <div>
                <input
                    type="text"
                    name="name"
                    placeholder="Название задачи"
                    value="<?= $task->name ?>"
                    class="form-input" />
            </div>
            <div>
                <textarea
                    name="description"
                    placeholder="Описание задачи"
                    class="form-input"><?= $task->description ?></textarea>
            </div>
            <label>
                <input
                    type="checkbox"
                    name="status"
                    <?= isset($task->status) && $task->status == 1 ? "checked" : '' ?>
                    class="form-checkbox" />
                Выполнена
            </label>
            <h2 class="form-subtitle">
            </h2>
            <form method="POST" style="display: inline;">
                <input type="hidden" name="_method" value="PUT">
                <button class="save-button">
                    Сохранить
                </button>
            </form>

            <div class="cancel-button-container">
                <a href="/" class="cancel-button">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</section>

<?php loadPartial('footer'); ?>