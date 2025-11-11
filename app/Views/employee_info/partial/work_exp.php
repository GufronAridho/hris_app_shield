<?php $no = 0 ?>
<?php foreach ($item as $i):
    $no++ ?>
    <tr>
        <td class="text-center">
            <?= $no; ?>
        </td>
        <td class="text-center">
            <?= $i['company_name']; ?>
        </td>
        <td><?= $i['job_title']; ?></td>
        <td class="text-center">
            <?= $i['start_date']; ?> ~ <?= $i['end_date']; ?>
        </td>

        <td class="text-center">
            <button class="btn btn-sm btn-info edit-exp-btn me-1"
                data-id="<?= $i['experience_id']; ?>"
                data-company_name="<?= $i['company_name']; ?>"
                data-job_title="<?= $i['job_title']; ?>"
                data-start_date="<?= $i['start_date']; ?>"
                data-end_date="<?= $i['end_date']; ?>">
                <i class="fa fa-edit"></i>
            </button>

            <button class="btn btn-sm btn-danger delete-exp-btn"
                data-id="<?= $i['experience_id']; ?>">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
<?php endforeach ?>