<?php foreach ($item as $i): ?>
    <tr>
        <td class="text-center">
            <span class="badge bg-secondary" style="font-size: 1rem;">
                <?= $i['check_id']; ?>
            </span>
        </td>
        <td class=""><?= $i['check_cat']; ?> </td>
        <td class=""><?= $i['check_quest']; ?> </td>
        <td class="text-center">
            <button class="btn btn-sm btn-info edit-btn me-1"
                data-id="<?= $i['id']; ?>" data-check_cat="<?= $i['check_cat']; ?>"
                data-check_quest="<?= $i['check_quest']; ?>">
                <i class="fa fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger delete-btn"
                data-id="<?= $i['id']; ?>">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
<?php endforeach ?>