<?php foreach ($item as $i): ?>
    <tr>
        <td class="text-center">
            <span class="badge bg-secondary" style="font-size: 1rem;">
                <?= $i['job_id']; ?>
            </span>
        </td>
        <td class=""><?= $i['position']; ?> </td>
        <td class=""><?= $i['applicant']; ?> </td>
        <td class=""><?= $i['status']; ?> </td>
        <td class=""><?= $i['hired']; ?> </td>

    </tr>
<?php endforeach ?>