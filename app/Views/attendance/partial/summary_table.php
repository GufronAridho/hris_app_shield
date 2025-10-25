<?php foreach ($item as $i):
    $attendance_date = strtotime($i->attendance_date);
    $att_date = date("l, F j, Y", $attendance_date);
    $time_in = $i->time_in ? date("h:i A", strtotime($i->time_in)) : '-';
    $time_out = $i->time_out ? date("h:i A", strtotime($i->time_out)) : '-';
    $action_status = $i->attendance_status;
    $work_status = $i->work_status;
?>
    <tr>
        <td class="text-center"><?= $i->emp_id . ' - ' . $i->name; ?></td>
        <td class="text-center"><?= $att_date; ?></td>
        <td class="text-center"><?= $time_in; ?></td>
        <td class="text-center"><?= $time_out; ?></td>

        <td class="text-center" style="font-size: 18px;">
            <?php if ($action_status == 'Present'): ?>
                <span class="badge bg-success d-inline-flex align-items-center justify-content-center" style="height:28px; width:90px;">
                    <?= $action_status; ?>
                </span>
            <?php elseif ($action_status == 'Absent'): ?>
                <span class="badge bg-danger d-inline-flex align-items-center justify-content-center" style="height:28px; width:90px;">
                    <?= $action_status; ?>
                </span>
            <?php elseif ($action_status == 'On Leave'): ?>
                <span class="badge bg-info text-black d-inline-flex align-items-center justify-content-center" style="height:28px; width:90px;">
                    <?= $action_status; ?>
                </span>
            <?php else: ?>
                <span class="badge bg-secondary d-inline-flex align-items-center justify-content-center" style="height:28px; width:90px;">
                    <?= $action_status; ?>
                </span>
            <?php endif; ?>
        </td>

        <td class="text-center" style="font-size: 18px;">
            <?php if ($work_status == 'On Time'): ?>
                <span class="badge bg-success d-inline-flex align-items-center justify-content-center">
                    <?= $work_status; ?>
                </span>
            <?php elseif ($work_status == 'Late' || $work_status == 'Left Early' || $work_status == 'Late & Left Early'): ?>
                <span class="badge bg-warning d-inline-flex align-items-center justify-content-center text-black">
                    <?= $work_status; ?>
                </span>
            <?php else: ?>
                <span class="badge bg-secondary d-inline-flex align-items-center justify-content-center">
                    <?= $work_status; ?>
                </span>
            <?php endif; ?>
        </td>

        <td class="text-center">
            <div class="d-flex justify-content-center gap-1">
                <button class="btn btn-sm btn-info edit-btn"
                    data-id="<?= $i->attendance_id; ?>"
                    data-emp_id="<?= $i->emp_id; ?>"
                    data-name="<?= $i->name; ?>"
                    data-date="<?= $i->attendance_date; ?>"
                    data-time_in="<?= $i->time_in; ?>"
                    data-time_out="<?= $i->time_out; ?>"
                    data-status="<?= $i->attendance_status; ?>"
                    data-work_status="<?= $i->work_status; ?>">
                    <i class="fa fa-edit"></i>
                </button>

                <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $i->attendance_id; ?>">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </td>
    </tr>
<?php endforeach; ?>