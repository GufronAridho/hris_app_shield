<?php foreach ($item as $i):
    $posted_date = strtotime($i['posted_date']);
    $pos_date = date("l, F j, Y", $posted_date);
    $closing_date = strtotime($i['closing_date']);
    $close_date = date("l, F j, Y", $closing_date);
?>
    <tr>
        <td class="text-center">
            <span class="badge bg-secondary" style="font-size: 1rem;">
                <?= $i['job_id']; ?>
            </span>
        </td>
        <td class=""><?= $i['position']; ?> </td>
        <td class=""><?= $i['department']; ?> </td>
        <td class=""><?= $i['location']; ?> </td>
        <td class="text-center" style="font-size: 18px;">
            <?php if ($i['status'] == 'Open'): ?>
                <span class="badge bg-success"><?= $i['status']; ?></span>
            <?php elseif ($i['status'] == 'Closed'): ?>
                <span class="badge bg-danger"><?= $i['status']; ?></span>
            <?php else: ?>
                <span class="badge bg-secondary"><?= $i['status']; ?></span>
            <?php endif; ?>
        </td>
        <td class=""><?= $pos_date; ?> </td>
        <td class=""><?= $close_date; ?> </td>
        <td class="text-center">
            <div class="d-flex justify-content-center gap-1">
                <button class="btn btn-sm btn-info edit-btn"
                    data-id="<?= $i['id']; ?>"
                    data-job_id="<?= $i['job_id']; ?>"
                    data-position="<?= $i['position']; ?>"
                    data-department="<?= $i['department']; ?>"
                    data-location="<?= $i['location']; ?>"
                    data-status="<?= $i['status']; ?>"
                    data-posted_date="<?= $i['posted_date']; ?>"
                    data-closing_date="<?= $i['closing_date']; ?>"
                    data-description="<?= $i['description']; ?>">
                    <i class="fa fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $i['id']; ?>">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </td>
    </tr>
<?php endforeach ?>