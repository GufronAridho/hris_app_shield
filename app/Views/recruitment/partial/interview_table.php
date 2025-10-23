<?php foreach ($item as $i):
    $interview_date = strtotime($i['interview_date']);
    $schedule = date("l, F j, Y h:i A", $interview_date);

    $badge_status = $i['status'];
    $action_status = $i['candidate_status'];
?>
    <tr>
        <td class="text-center">
            <span class="badge bg-secondary" style="font-size: 1rem;">
                <?= $i['job_id']; ?>
            </span>
        </td>

        <td><?= $i['candidate_name']; ?></td>
        <td><?= $schedule; ?></td>
        <td><?= $i['interviewer']; ?></td>

        <td class="text-center" style="font-size: 18px;">
            <?php if ($badge_status == 'Passed'): ?>
                <span class="badge bg-success d-inline-flex align-items-center justify-content-center" style="height:28px; width:90px;">
                    <?= $i['status']; ?>
                </span>
            <?php elseif ($badge_status == 'Failed'): ?>
                <span class="badge bg-danger d-inline-flex align-items-center justify-content-center" style="height:28px; width:90px;">
                    <?= $i['status']; ?>
                </span>
            <?php else: ?>
                <span class="badge bg-secondary d-inline-flex align-items-center justify-content-center" style="height:28px; width:90px;">
                    <?= $i['status']; ?>
                </span>
            <?php endif; ?>
        </td>

        <td><?= $i['remarks']; ?></td>

        <td class="text-center">
            <div class="d-flex justify-content-center gap-1">
                <?php if ($action_status == 'Scheduled'): ?>
                    <button class="btn btn-sm btn-info edit-btn"
                        data-id="<?= $i['id']; ?>"
                        data-candidate_id="<?= $i['candidate_id']; ?>"
                        data-candidate_name="<?= $i['candidate_name']; ?>"
                        data-interviewer="<?= $i['interviewer']; ?>"
                        data-interview_date="<?= $i['interview_date']; ?>"
                        data-rating="<?= $i['rating']; ?>"
                        data-status="<?= $i['status']; ?>"
                        data-job_id="<?= $i['job_id']; ?>"
                        data-position="<?= $i['position']; ?>"
                        data-department="<?= $i['department']; ?>"
                        data-remarks="<?= $i['remarks']; ?>">
                        <i class="fa fa-edit"></i>
                    </button>

                    <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $i['id']; ?>">
                        <i class="fa fa-trash"></i>
                    </button>

                <?php elseif ($action_status == 'Hired'): ?>
                    <button class="btn btn-sm btn-secondary view-btn"
                        data-id="<?= $i['id']; ?>"
                        data-candidate_id="<?= $i['candidate_id']; ?>"
                        data-candidate_name="<?= $i['candidate_name']; ?>"
                        data-interviewer="<?= $i['interviewer']; ?>"
                        data-interview_date="<?= $i['interview_date']; ?>"
                        data-rating="<?= $i['rating']; ?>"
                        data-status="<?= $i['status']; ?>"
                        data-job_id="<?= $i['job_id']; ?>"
                        data-position="<?= $i['position']; ?>"
                        data-department="<?= $i['department']; ?>"
                        data-remarks="<?= $i['remarks']; ?>">
                        <i class="fa fa-eye"></i>
                    </button>

                    <button class="btn btn-sm btn-success onboarding-btn"
                        data-candidate_id="<?= $i['candidate_id']; ?>"
                        data-candidate_name="<?= $i['candidate_name']; ?>"
                        data-emp_id="<?= $i['emp_id']; ?>">
                        <i class="fa fa-list"></i>
                    </button>

                <?php elseif ($action_status == 'Onboarding'): ?>
                    <button class="btn btn-sm btn-secondary view-btn"
                        data-id="<?= $i['id']; ?>"
                        data-candidate_id="<?= $i['candidate_id']; ?>"
                        data-candidate_name="<?= $i['candidate_name']; ?>"
                        data-interviewer="<?= $i['interviewer']; ?>"
                        data-interview_date="<?= $i['interview_date']; ?>"
                        data-rating="<?= $i['rating']; ?>"
                        data-status="<?= $i['status']; ?>"
                        data-job_id="<?= $i['job_id']; ?>"
                        data-position="<?= $i['position']; ?>"
                        data-department="<?= $i['department']; ?>"
                        data-remarks="<?= $i['remarks']; ?>">
                        <i class="fa fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $i['id']; ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                <?php else: ?>
                    <button class="btn btn-sm btn-secondary view-btn" data-id="<?= $i['id']; ?>">
                        <i class="fa fa-eye"></i>
                    </button>
                <?php endif; ?>
            </div>
        </td>
    </tr>
<?php endforeach; ?>