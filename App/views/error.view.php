<?php loadPartial('navbar'); ?>
<?php loadPartial('head'); ?>

<section class="error-section">
    <div class="error-container">
        <div class="error-status"><?= $status ?></div>
        <p class="error-message">
            <?= $message ?>
        </p>
        <a class="error-back-link" href="/">Вернуться к задачам</a>
    </div>
</section>

<?php loadPartial('footer'); ?>