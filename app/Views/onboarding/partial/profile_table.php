<?php foreach ($item as $i): ?>
    <tr>
        <td class="text-center">
            <span class="badge bg-secondary" style="font-size: 1rem;">
                <?= $i['emp_id']; ?>
            </span>
        </td>
        <td class=""><?= $i['name']; ?> </td>
        <td class="text-center"><?= $i['join_date']; ?> </td>
        <td class="text-center" style="font-size: 18px;">
            <?php if ($i['status'] == 'Complete'): ?>
                <span class="badge bg-success d-inline-flex align-items-center justify-content-center" style="height:28px; width:90px;">
                    <?= $i['status']; ?>
                </span>
            <?php else: ?>
                <span class="badge bg-danger d-inline-flex align-items-center justify-content-center" style="height:28px; width:90px;">
                    <?= $i['status']; ?>
                </span>
            <?php endif; ?>
        </td>
        <td class="text-center">
            <div class="d-flex justify-content-center gap-1">
                <?php if ($i['status'] == 'Complete'): ?>
                    <button
                        type="button"
                        class="btn btn-sm btn-success view-btn"
                        data-emp_id="<?= $i['emp_id']; ?>"
                        data-name="<?= $i['name']; ?>"
                        data-organization="<?= $i['organization']; ?>"
                        data-manager="<?= $i['manager']; ?>"
                        data-hr_partner="<?= $i['hr_partner']; ?>"
                        data-email="<?= $i['email']; ?>"
                        data-emp_grade="<?= $i['emp_grade']; ?>">
                        <i class="fa fa-check-double"></i>
                    </button>
                <?php else: ?>
                    <button
                        type="button"
                        class="btn btn-sm btn-info edit-btn"
                        data-emp_id="<?= $i['emp_id']; ?>"
                        data-name="<?= $i['name']; ?>"
                        data-organization="<?= $i['organization']; ?>"
                        data-manager="<?= $i['manager']; ?>"
                        data-hr_partner="<?= $i['hr_partner']; ?>"
                        data-email="<?= $i['email']; ?>"
                        data-emp_grade="<?= $i['emp_grade']; ?>">
                        <i class="fa fa-edit"></i>
                    </button>
                <?php endif; ?>
            </div>
        </td>

    </tr>
<?php endforeach ?>