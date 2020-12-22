<table id="<?php print $data['id'] ?? ''; ?>" class="<?php print $data['class'] ?? ''; ?>">
    <tr>
        <?php foreach ($data['headers'] as $header) : ?>
            <th><?php print $header; ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($data['rows'] ?? [] as $row) : ?>
        <tr>
            <?php foreach ($row as $column) : ?>
                <td><?php print $column; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
