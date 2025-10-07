<?php if (!empty($item) && count($item) > 0): ?>
    <table class="table custom-table">
        <tbody>
            <?php foreach ($item as $i): ?>
                <tr>
                    <td class="label-cell">
                        <span class="fw-bold"><?= $i['check_quest']; ?></span>
                    </td>

                    <td class="input-cell">
                        <div class="d-flex">
                            <input type="checkbox" class="form-check-input custom-checkbox" title="Checklist">
                            <input type="file" class="form-control form-control-sm" title="Upload File">
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="text-center text-white p-4">
        <i class="fas fa-info-circle me-2"></i>No checklist item found.
    </div>
<?php endif; ?>

<style>
    .custom-table {
        border-spacing: 0.5rem 0.5rem;
        border-collapse: separate;
    }

    .label-cell {
        background-color: #f2f0f8 !important;
        padding: 0.5rem;
        border-radius: 0.5rem;
        width: 70%;
    }

    .input-cell {
        background-color: #f2f0f8 !important;
        padding: 0.5rem;
        border-radius: 0.5rem;
    }

    .input-cell .d-flex {
        gap: 0.5rem;
        align-items: center;
    }

    .custom-checkbox {
        transform: scale(1.7);
        margin-left: 0.5rem;
        margin-right: 0.3rem;
    }
</style>