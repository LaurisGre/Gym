<section id="image-section"></section>

<section id="services-container">
    <?php foreach ($data['services'] as $index => $card) : ?>
        <article>
            <div class="service-image"><?php print $card['img']; ?></div>
            <p class="service-name"><?php print $card['name']; ?></p>
            <p class="service-description"><?php print $card['description']; ?></p>
        </article>
    <?php endforeach; ?>
</section>

<section id="map-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1629.335314034574!2d25.338038171361422!3d54.723202521852706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd94055529fabf%3A0x37f51f09d8b21025!2sSaul%C4%97tekio%20sl%C4%97nio%20mokslo%20ir%20technologij%C5%B3%20parkas!5e0!3m2!1slt!2slt!4v1608668060625!5m2!1slt!2slt" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>