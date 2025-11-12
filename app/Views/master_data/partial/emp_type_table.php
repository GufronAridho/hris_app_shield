<?php foreach ($item as $i): ?>
    <tr>
        <td class=""><?= $i['type']; ?></td>
        <td class="text-center">
            <div class="d-flex justify-content-center gap-1">
                <button class="btn btn-sm btn-info edit-btn me-1"
                    data-id="<?= $i['id']; ?>" data-type="<?= $i['type']; ?>">
                    <i class="fa fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger delete-btn"
                    data-id="<?= $i['id']; ?>">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </td>
    </tr>
<?php endforeach ?>