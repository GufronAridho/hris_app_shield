<?php foreach ($item as $i): ?>
    <tr>
        <td class="text-center">
            <span class="badge bg-secondary" style="font-size: 1rem;">
                <?= $i['emp_id']; ?>
            </span>
        </td>
        <td class=""><?= $i['name']; ?> </td>
        <td class="text-center"><?= $i['join_date']; ?> </td>

        <td class="text-center">
            <?php if ($i['status_document'] == 'Complete'): ?>
                <a href="<?= base_url('onboarding/document_checklist/' . $i['emp_id']); ?>"
                    class="btn btn-outline-success btn-sm fw-bold">
                    <i class="fas fa-check-circle me-1"></i><?= esc($i['status_document']); ?>
                </a>
            <?php else: ?>
                <a href="<?= base_url('onboarding/document_checklist/' . $i['emp_id']); ?>"
                    class="btn btn-outline-warning btn-sm fw-bold text-black">
                    <i class="fas fa-hourglass-half me-1"></i><?= esc($i['status_document']); ?>
                </a>
            <?php endif; ?>
        </td>

        <td class="text-center">
            <?php if ($i['status_it'] == 'Complete'): ?>
                <a href="<?= base_url('onboarding/it_checklist/' . $i['emp_id']); ?>"
                    class="btn btn-outline-success btn-sm fw-bold">
                    <i class="fas fa-check-circle me-1"></i><?= esc($i['status_it']); ?>
                </a>
            <?php else: ?>
                <a href="<?= base_url('onboarding/it_checklist/' . $i['emp_id']); ?>"
                    class="btn btn-outline-warning btn-sm fw-bold text-black">
                    <i class="fas fa-hourglass-half me-1"></i><?= esc($i['status_it']); ?>
                </a>
            <?php endif; ?>
        </td>

        <td class="text-center">
            <?php if ($i['status_onboarding'] == 'Complete'): ?>
                <a href="<?= base_url('onboarding/onboarding_task/' . $i['emp_id']); ?>"
                    class="btn btn-outline-success btn-sm fw-bold">
                    <i class="fas fa-check-circle me-1"></i><?= esc($i['status_onboarding']); ?>
                </a>
            <?php else: ?>
                <a href="<?= base_url('onboarding/onboarding_task/' . $i['emp_id']); ?>"
                    class="btn btn-outline-warning btn-sm fw-bold text-black">
                    <i class="fas fa-hourglass-half me-1"></i><?= esc($i['status_onboarding']); ?>
                </a>
            <?php endif; ?>
        </td>


    </tr>
<?php endforeach ?>