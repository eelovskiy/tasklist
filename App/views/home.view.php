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
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div style="text-align:center">
    <a class="all-task-button" href='/tasks'>Показать все задания</a>
</div>

<?php loadPartial('footer');
