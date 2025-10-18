<?php foreach ($item as $i): ?>
    <tr>
        <td class=""><?= $i['job_title']; ?></td>
        <td class="text-center">
            <button class="btn btn-sm btn-info edit-btn me-1"
                data-id="<?= $i['id']; ?>" data-job_title="<?= $i['job_title']; ?>">
                <i class="fa fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-btn"
                data-id="<?= $i['id']; ?>">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
<?php endforeach ?>