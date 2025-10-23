<?php foreach ($item as $i): ?>
    <tr>
        <td class="text-center">
            <span class="badge bg-secondary" style="font-size: 1rem;">
                <?= $i['job_id']; ?>
            </span>
        </td>
        <td><?= $i['candidate_name']; ?></td>
        <td><?= $i['gender']; ?></td>
        <td><?= $i['age']; ?></td>
        <td><?= $i['education']; ?></td>
        <td><?= $i['address']; ?></td>
        <td class="text-center">
            <div class="d-flex justify-content-center gap-1">
                <?php if ($i['status'] == 'Hired' || $i['status'] == 'Onboarding'): ?>

                    <span class="badge bg-success d-flex align-items-center justify-content-center" style="height: 30px;">
                        <?= $i['status']; ?>
                    </span>

                    <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $i['id']; ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                <?php else: ?>

                    <button
                        type="button"
                        class="btn btn-sm btn-info edit-btn"
                        data-id="<?= $i['id']; ?>"
                        data-job_id="<?= $i['job_id']; ?>"
                        data-job_name="<?= $i['job_id'] . ' - ' . $i['position']; ?>"
                        data-candidate_name="<?= $i['candidate_name']; ?>"
                        data-gender="<?= $i['gender']; ?>"
                        data-age="<?= $i['age']; ?>"
                        data-education="<?= $i['education']; ?>"
                        data-address="<?= $i['address']; ?>"
                        data-phone="<?= $i['phone']; ?>"
                        data-email="<?= $i['email']; ?>">
                        <i class="fa fa-edit"></i>
                    </button>

                    <?php if ($i['has_interview'] == 'Yes'): ?>
                        <button class="btn btn-sm btn-success view-btn"
                            data-interviewer="<?= $i['interviewer']; ?>"
                            data-interview_date="<?= $i['interview_date']; ?>"
                            data-candidate_name="<?= $i['candidate_name']; ?>">
                            <i class="fa fa-calendar-check"></i>
                        </button>
                    <?php else: ?>
                        <button class="btn btn-sm btn-warning interview-btn"
                            data-id="<?= $i['id']; ?>"
                            data-candidate_name="<?= $i['candidate_name']; ?>">
                            <i class="fa fa-calendar-plus"></i>
                        </button>
                    <?php endif; ?>

                    <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $i['id']; ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                <?php endif; ?>

            </div>
        </td>
    </tr>
<?php endforeach; ?>