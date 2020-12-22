<section id="feedback-table-container">
    <?php foreach ($data['tables'] as $table) : ?>
        <?php print $table; ?>
    <?php endforeach; ?>
</section>

<section id="feedback-form-container">
<?php foreach ($data['forms'] as $form) : ?>
        <?php print $form; ?>
    <?php endforeach; ?>
</section>