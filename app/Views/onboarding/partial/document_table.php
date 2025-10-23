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
                            <?php if (!empty($i['status'])): ?>
                                <i class="fa-solid fa-circle-check text-success fa-lg"></i>
                            <?php else: ?>
                                <i class="fa-solid fa-circle-xmark text-danger fa-lg"></i>
                            <?php endif; ?>

                            <input type="file" class="form-control form-control-sm"
                                onchange="uploadFile(this, <?= $i['id']; ?>, '<?= $i['check_cat']; ?>')">

                            <?php if (!empty($i['document'])): ?>
                                <a href="<?= base_url('onboarding/document/' . $i['document']); ?>" class="btn btn-sm btn-outline-primary" target="_blank" title="Download File">
                                    <i class="fas fa-download me-1"></i>
                                </a>
                            <?php else: ?>
                                <button class="btn btn-sm btn-outline-secondary" disabled>
                                    <i class="fas fa-download me-1"></i>
                                </button>
                            <?php endif; ?>
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
        width: 60%;
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
</style>