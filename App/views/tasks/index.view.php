<?php
require_once('../helpers.php');
loadPartial('head');
loadPartial('navbar');
?>

<section>
    <div class="section-container">
        <div class="task-grid">
            <?php foreach ($tasks as $task): ?>
                <div class="task-card">
                    <h2 class="task-title"><?= $task->name ?></h2>
                    <p class="task-description">
                        <?= $task->description ?>
                    </p>
                    <div class="status-container">
                        <div class="status-indicator <?= $task->status ? 'done' : 'not-done' ?>"></div>
                        <p class="status-description"><?= $task->status ? '' : 'Not ' ?>Completed</p>
                    </div>
                    <div class="button-group">
                        <form action="/tasks/<?= $task->id ?>" method="POST" style="display: inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="button button-delete">Удалить</button>
                        </form>
                        <form action="/tasks/<?= $task->id ?>" method="GET" style="display: inline;">
                            <button type="submit" class="button button-update">Изменить</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php loadPartial('footer');
