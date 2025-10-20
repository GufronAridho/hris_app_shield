<?php foreach ($item as $i): ?>
    <tr>
        <td class="text-center">
            <span class="badge bg-secondary" style="font-size: 1rem;">
                <?= $i['job_id']; ?>
            </span>
        </td>
        <td class=""><?= $i['candidate_name']; ?> </td>
        <td class=""><?= $i['gender']; ?> </td>
        <td class=""><?= $i['age']; ?> </td>
        <td class=""><?= $i['education']; ?> </td>
        <td class=""><?= $i['address']; ?> </td>
        <td class="text-center">
            <div class="d-flex justify-content-center gap-1">
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

                <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $i['id']; ?>">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </td>
    </tr>
<?php endforeach ?>