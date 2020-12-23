<nav>
    <?php foreach ($data ?? [] as $ul) : ?>
        <ul>
            <?php foreach ($ul ?? [] as $li_path => $li_name) : ?>
                <li>
                    <a 
                    href="<?php print $li_path; ?>"
                    class="<?php $_SERVER['REQUEST_URI'] == $li_path ? print 'active' : ''; ?>" >
                        <?php print $li_name; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</nav>