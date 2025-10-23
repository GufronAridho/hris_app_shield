<?php foreach ($item as $i): ?>
    <tr>
        <td class="text-center">
            <span class="badge bg-secondary" style="font-size: 1rem;">
                <?= $i['job_id']; ?>
            </span>
        </td>
        <td class=""><?= $i['position']; ?> </td>
        <td class="text-center"><?= $i['applicant']; ?> </td>
        <td class="text-center" style="font-size: 18px;">
            <?php if ($i['status'] == 'Open'): ?>
                <span class="badge bg-success"><?= $i['status']; ?></span>
            <?php elseif ($i['status'] == 'Closed'): ?>
                <span class="badge bg-danger"><?= $i['status']; ?></span>
            <?php else: ?>
                <span class="badge bg-secondary"><?= $i['status']; ?></span>
            <?php endif; ?>
        </td>
        <td class="text-center"><?= $i['hired']; ?> </td>

    </tr>
<?php endforeach ?>