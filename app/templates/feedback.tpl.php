<section id="feedback-container">
    <h1><?php print $data['title']; ?></h1>

    <section id="feedback-table-container">
        <?php if (isset($data['table'])) : ?>
            <?php print $data['table']; ?>
        <?php endif; ?>
    </section>

    <?php if (isset($data['form'])) : ?>
        <section id="feedback-form-container">
            <?php print $data['form']; ?>
        </section>
    <?php endif; ?>

    <?php if (isset($data['message'])) : ?>
        <p class="message">
            <?php print $data['message']; ?>
        </p>
    <?php endif; ?>

    <?php if (isset($data['link'])) : ?>
        <?php foreach ($data['link'] as $link) : ?>
            <?php print $link; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</section>