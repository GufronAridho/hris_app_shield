<?php foreach ($item as $i): ?>
    <tr>
        <td class="text-center"><?= $i->emp_id . ' - ' . $i->name; ?></td>
        <td class="text-center"><?= $i->leave_type; ?></td>
        <td class="text-center"><?= $i->start_date; ?></td>
        <td class="text-center"><?= $i->end_date; ?></td>

        <td class="text-center" style="font-size: 18px;">
            <?php if ($i->approval_status == 'Approved'): ?>
                <span class="badge bg-success d-inline-flex align-items-center justify-content-center" style="height:28px; width:100px;">
                    <?= $i->approval_status; ?>
                </span>
            <?php elseif ($i->approval_status == 'Rejected'): ?>
                <span class="badge bg-danger d-inline-flex align-items-center justify-content-center" style="height:28px; width:100px;">
                    <?= $i->approval_status; ?>
                </span>
            <?php elseif ($i->approval_status == 'Pending'): ?>
                <span class="badge bg-warning text-black d-inline-flex align-items-center justify-content-center" style="height:28px; width:100px;">
                    <?= $i->approval_status; ?>
                </span>
            <?php else: ?>
                <span class="badge bg-secondary d-inline-flex align-items-center justify-content-center" style="height:28px; width:100px;">
                    N/A
                </span>
            <?php endif; ?>
        </td>

        <td class="text-center">
            <?php if ($i->approval_status == 'Approved'): ?>
                <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $i->leave_id; ?>" data-emp_id="<?= $i->emp_id; ?>">
                    <i class="fa fa-trash"></i>
                </button>
            <?php else: ?>
                <div class="d-flex justify-content-center gap-1">
                    <button class="btn btn-sm btn-info edit-btn"
                        data-id="<?= $i->leave_id; ?>"
                        data-emp_id="<?= $i->emp_id; ?>"
                        data-name="<?= $i->name; ?>"
                        data-leave_type="<?= $i->leave_type; ?>"
                        data-start_date="<?= $i->start_date; ?>"
                        data-end_date="<?= $i->end_date; ?>"
                        data-reason="<?= $i->reason; ?>"
                        data-approval_status="<?= $i->approval_status; ?>"
                        data-approved_by="<?= $i->approved_by; ?>">
                        <i class="fa fa-edit"></i>
                    </button>

                    <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $i->leave_id; ?>" data-emp_id="<?= $i->emp_id; ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>