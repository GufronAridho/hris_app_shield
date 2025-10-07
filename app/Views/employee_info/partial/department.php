<div class="p-1">
    <div class="row g-3">
        <?php if (!empty($department) && count($department) > 0): ?>
            <?php foreach ($department as $dept): ?>
                <div class="col-md-3">
                    <div class="card border-light shadow-sm h-100 department-card"
                        onclick="openEmployee('<?= $dept['department']; ?>')" style="cursor:pointer">
                        <div class="card-header text-center bg-light border 0 department-header">
                            <span class="badge department-badge">
                                <?= $dept['code']; ?>
                            </span>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                            <h5 class="fw-bold mb-2"> <?= $dept['department']; ?></h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fas fa-user me-1 text-secondary fs-5"></i>
                                <span class="fs-6"> <?= $dept['employee']; ?> Employees</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <div class="text-center text-muted p-4">
                <i class="fas fa-info-circle me-2"></i>No department data found.
            </div>
        <?php endif; ?>
    </div>
</div>