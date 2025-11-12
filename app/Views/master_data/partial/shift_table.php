<?php foreach ($item as $i): ?>
    <tr>
        <td><?= esc($i['shift_name']); ?></td>
        <td class="text-center"><?= esc($i['start_time']); ?></td>
        <td class="text-center"><?= esc($i['end_time']); ?></td>
        <td class="text-center"><?= esc($i['break_minutes']); ?></td>
        <td class="text-center"><?= esc($i['total_hours']); ?></td>
        <td class="text-center"><?= esc($i['grace_minutes']); ?></td>
        <td class="text-center">
            <div class="d-flex justify-content-center gap-1">
                <button
                    class="btn btn-sm btn-info edit-btn me-1"
                    data-id="<?= $i['shift_id']; ?>"
                    data-shift_name="<?= esc($i['shift_name']); ?>"
                    data-start_time="<?= esc($i['start_time']); ?>"
                    data-end_time="<?= esc($i['end_time']); ?>"
                    data-break_minutes="<?= esc($i['break_minutes']); ?>"
                    data-total_hours="<?= esc($i['total_hours']); ?>"
                    data-grace_minutes="<?= esc($i['grace_minutes']); ?>">
                    <i class="fa fa-edit"></i>
                </button>
                <button
                    class="btn btn-sm btn-danger delete-btn"
                    data-id="<?= $i['shift_id']; ?>">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </td>
    </tr>
<?php endforeach ?>