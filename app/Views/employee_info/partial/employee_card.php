<div class="p-1">
    <div class="row g-3">
        <?php if (!empty($employee) && count($employee) > 0): ?>
            <?php foreach ($employee as $emp): ?>
                <div class="col-md-3">
                    <div class="card border-light shadow-sm h-100 department-card"
                        onclick="goToProfile('<?= $emp['emp_id']; ?>')" style="cursor:pointer">
                        <div class="card-header text-center bg-light border department-header">
                            <img src="<?= base_url('assets/profile/' . $emp['photo']); ?>" alt="Employee"
                                class="rounded-circle"
                                style="width: 200px; height:200px; object-fit:cover; border:4px solid #fff;">
                        </div>

                        <div class="card-body position-relative d-flex flex-column align-items-center justify-content-center text-center">
                            <h5 class="fw-bold mb-2 position-relative w-100">
                                <?= $emp['name']; ?>
                                <i class="fas fa-bars position-absolute" style="right: 0; top: 50%; transform: translateY(-50%);"></i>
                            </h5>
                            <div class="row text-center w-100">
                                <div class="col-12">
                                    <span class="fs-5"><?= $emp['job_title']; ?></span>
                                </div>
                                <div class="col-12">
                                    <span class="fs-6"><?= $emp['department']; ?></span>
                                </div>
                                <div class="col-12">
                                    <span class="fs-7"><?= $emp['email']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        <?php else: ?>
            <div class="text-center text-muted p-4">
                <i class="fas fa-info-circle me-2"></i>No employee data found.
            </div>
        <?php endif; ?>
    </div>
</div>