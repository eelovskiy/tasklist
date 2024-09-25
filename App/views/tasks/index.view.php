<?php
require_once('../helpers.php');
loadPartial('head');
loadPartial('navbar');
loadPartial('search-bar')
?>


<div class="task-header">
    <?php if (isset($keywords)) : ?>
        <h2 class="search-result">Результаты поиска для: <span class="keywords"><?= htmlspecialchars($keywords) ?></span></h2>
    <?php else : ?>
        <h2 class="all-tasks">Все задачи</h2>
    <?php endif; ?>
</div>

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
                    <form action="/tasks/<?= $task->id ?>" method="POST" style="display: inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="delete-button">Удалить</button>
                    </form>
                    <form action="/tasks/edit/<?= $task->id ?>" method="GET" style="display: inline;">
                        <button type="submit" class="update-button">Изменить</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php loadPartial('footer');
