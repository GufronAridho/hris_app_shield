<?php foreach ($item as $i):
    $interview_date = strtotime($i['interview_date']);
    $schdule = date("l, F j, Y h:i A", $interview_date);
?>
    <tr>
        <td class="text-center">
            <span class="badge bg-secondary" style="font-size: 1rem;">
                <?= $i['job_id']; ?>
            </span>
        </td>
        <td class=""><?= $i['candidate_name']; ?> </td>
        <td class=""><?= $schdule; ?> </td>
        <td class=""><?= $i['interviewer']; ?> </td>
        <td class=""><?= $i['status']; ?> </td>
        <td class=""><?= $i['remarks']; ?> </td>
        <td class="text-center">
            <div class="d-flex justify-content-center gap-1">
                <button class="btn btn-sm btn-info edit-btn"
                    data-id="<?= $i['id']; ?>"
                    data-candidate_id="<?= $i['candidate_id']; ?>"
                    data-candidate_name="<?= $i['candidate_name']; ?>"
                    data-interviewer="<?= $i['interviewer']; ?>"
                    data-interview_date="<?= $i['interview_date']; ?>"
                    data-rating="<?= $i['rating']; ?>"
                    data-status="<?= $i['status']; ?>"
                    data-remarks="<?= $i['remarks']; ?>">
                    <i class="fa fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $i['id']; ?>">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </td>
    </tr>
<?php endforeach ?>