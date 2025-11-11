<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="rounded-3 card-table shadow-sm p-1">
                <div class="p-3 rounded-1 position-relative overflow-hidden" style="height: 250px;">
                    <div style="position:absolute; top:0; left:0; width:100%; height:50%; background-color:#5f0188;"></div>
                    <div style="position:absolute; bottom:0; left:0; width:100%; height:50%; background-color:#fff;"></div>

                    <div class="position-relative h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <img src="<?= base_url('assets/profile/' . ($emp['photo'] ?? 'avatar5.png')); ?>"
                                    alt="Employee"
                                    class="img-fluid rounded-circle"
                                    style="width: 200px; height:200px; object-fit:cover; border:4px solid #fff;">
                            </div>

                            <div class="col-md-9 d-flex flex-column justify-content-between h-100">
                                <div class="d-flex flex-column justify-content-center text-white" style="flex: 1;">
                                    <h2 class="mb-1 fw-bold gold"><?= $emp['name'] ?? 'Name'; ?></h2>
                                    <h3 class="mb-1 fw-bold gold"><?= $emp['no_hp'] ?? 'No HP'; ?></h3>
                                    <h4 class="mb-1 fw-bold gold"><?= $emp['email'] ?? 'Email'; ?></h4>
                                </div>

                                <div class="d-flex flex-column justify-content-center text-dark" style="flex: 1;">
                                    <div><strong class="label-fixed">Job Title</strong> <?= $emp['job_title'] ?? '-'; ?></div>
                                    <div><strong class="label-fixed">Department</strong> <?= $emp['department'] ?? '-'; ?></div>
                                    <div><strong class="label-fixed">Manager</strong> <?= $emp['manager'] ?? '-'; ?></div>
                                    <div><strong class="label-fixed">Location</strong> <?= $emp['location'] ?? '-'; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex h-100 my-1">
                    <ul class="nav custom-tabs nav-fill w-100" id="tab" role="tablist">
                        <li class="nav-item border" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="pill" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">
                                <i class="fas fa-building me-1"></i> Info
                            </button>
                        </li>
                        <li class="nav-item border" role="presentation">
                            <button class="nav-link" id="orgchart-tab" data-bs-toggle="pill" data-bs-target="#orgchart" type="button" role="tab" aria-controls="orgchart" aria-selected="false">
                                <i class="fas fa-sitemap me-1"></i> Org Chart
                            </button>
                        </li>
                        <li class="nav-item border" role="presentation">
                            <button class="nav-link" id="recognition-tab" data-bs-toggle="pill" data-bs-target="#recognition" type="button" role="tab" aria-controls="recognition" aria-selected="false">
                                <i class="fas fa-award me-1"></i> Recognition
                            </button>
                        </li>
                        <li class="nav-item border" role="presentation">
                            <button class="nav-link" id="reminder-tab" data-bs-toggle="pill" data-bs-target="#reminder" type="button" role="tab" aria-controls="reminder" aria-selected="false">
                                <i class="fas fa-bell me-1"></i> Reminder
                            </button>
                        </li>
                        <li class="nav-item border" role="presentation">
                            <button class="nav-link" id="workspace-tab" data-bs-toggle="pill" data-bs-target="#workspace" type="button" role="tab" aria-controls="workspace" aria-selected="false">
                                <i class="fas fa-briefcase me-1"></i> Workspace
                            </button>
                        </li>
                        <li class="nav-item border" role="presentation">
                            <button class="nav-link" id="groups-tab" data-bs-toggle="pill" data-bs-target="#groups" type="button" role="tab" aria-controls="groups" aria-selected="false">
                                <i class="fas fa-users me-1"></i> Groups
                            </button>
                        </li>
                        <li class="nav-item dropdown border" role="presentation">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <i class="fas fa-ellipsis-h me-1"></i> More
                            </a>
                            <ul class="dropdown-menu">
                                <?php if (!empty($emp['emp_id']) && !empty($layout_emp['emp_id']) && $emp['emp_id'] == $layout_emp['emp_id']): ?>
                                    <li>
                                        <button class="dropdown-item" id="settings-tab" data-bs-toggle="pill" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">
                                            <i class="fas fa-cog me-1"></i> Update Profile
                                        </button>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <button class="dropdown-item" id="reports-tab" data-bs-toggle="pill" data-bs-target="#reports" type="button" role="tab" aria-controls="reports" aria-selected="false">
                                        <i class="fas fa-chart-line me-1"></i> Reports
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item" id="help-tab" data-bs-toggle="pill" data-bs-target="#help" type="button" role="tab" aria-controls="help" aria-selected="false">
                                        <i class="fas fa-question-circle me-1"></i> Help
                                    </button>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="tab-content" id="tabContent">
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-light fw-semibold py-2 px-3 fs-5">
                                    <i class="fa-solid fa-user me-1 fs-5"></i> About
                                </div>
                                <div class="card-body py-2">
                                    <?php if (!empty($emp['description'])): ?>
                                        <p class="mb-0" style="line-height: 1.6;">
                                            <?= nl2br($emp['description']); ?>
                                        </p>
                                    <?php else: ?>
                                        <div class="text-center py-4">
                                            <i class="fa-regular fa-circle-question mb-2 text-muted" style="font-size:1.5rem;"></i>
                                            <p class="mb-0 fw-semibold">No description provided.</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="card shadow-sm border-0 mt-2">
                                <div class="card-header bg-light fw-semibold py-2 px-3 fs-5">
                                    <i class="fa-solid fa-briefcase me-1 fs-5"></i> Experience
                                </div>
                                <div class="card-body py-2">
                                    <?php if (!empty($work_exp)): ?>
                                        <?php foreach ($work_exp as $index => $work):
                                            $start_date = date('M Y', strtotime($work['start_date']));
                                            $end_date = $work['end_date'] ? date('M Y', strtotime($work['end_date'])) : 'Now';
                                        ?>
                                            <div class="mb-3 pb-2 border-bottom">
                                                <h6 class="mb-1 text-dark fw-bold fs-6">
                                                    <i class="fa-solid fa-building text-muted me-1"></i><?= $work['company_name']; ?>
                                                </h6>
                                                <div class="fs-6">
                                                    <i class="fa-solid fa-user-tie me-1 text-muted"></i><?= $work['job_title']; ?>
                                                    <span class="mx-2">•</span>
                                                    <i class="fa-solid fa-calendar-days me-1 text-muted"></i><?= $start_date . ' - ' . $end_date; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="text-center py-4">
                                            <i class="fa-regular fa-circle-question mb-2 text-muted" style="font-size:1.5rem;"></i>
                                            <p class="mb-0 fw-semibold">No work experience provided.</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-light fw-semibold fs-5 py-2 px-3 d-flex align-items-center">
                                    <i class="fa-solid fa-trophy me-1 text-warning"></i> Reward
                                </div>
                                <div class="card-body text-center py-4">
                                    <i class="fa-solid fa-gift text-warning mb-2" style="font-size: 1.8rem;"></i>
                                    <p class="fw-semibold mb-0 text-secondary">Coming soon...</p>
                                </div>
                            </div>

                            <div class="card shadow-sm border-0 mt-2">
                                <div class="card-header bg-light fw-semibold fs-5 py-2 px-3 d-flex align-items-center">
                                    <i class="fa-solid fa-medal me-1 text-success"></i> Badge Received
                                </div>
                                <div class="card-body text-center py-4">
                                    <?php if (!empty($latest_recognition)): ?>
                                        <div class="border rounded-pill py-2 px-3 d-inline-block bg-light">
                                            <h6 class="fw-bold mb-0 text-dark">
                                                <i class="fa-solid fa-award me-1 text-success"></i>
                                                <?= $latest_recognition['title']; ?>
                                            </h6>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-center py-2">
                                            <i class="fa-regular fa-circle-question mb-2 text-secondary" style="font-size:1.5rem;"></i>
                                            <p class="mb-0 fw-semibold">No badge provided.</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-footer text-center bg-light">
                                    <small class="fw-medium text-secondary">
                                        <i class="fa-solid fa-thumbs-up me-1 text-success"></i> Keep up the great work!
                                    </small>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="tab-pane fade" id="orgchart" role="tabpanel" aria-labelledby="orgchart-tab">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-light fw-semibold py-2 px-3 fs-5">
                            <i class="fa-solid fa-sitemap me-1 fs-5"></i> Organization
                        </div>
                        <div class="card-body py-2">
                            <?php if (!empty($org_chart)): ?>
                                <div id="tree"></div>
                            <?php else: ?>
                                <div class="text-center py-4">
                                    <i class="fa-regular fa-circle-question mb-2 text-muted" style="font-size:1.5rem;"></i>
                                    <p class="mb-0 fw-semibold">No Organization provided.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="recognition" role="tabpanel" aria-labelledby="recognition-tab">
                    <div class="row h-100 g-2">
                        <?php if (!empty($recognition)): ?>
                            <?php foreach ($recognition as $reg): ?>
                                <div class="col-md-4">
                                    <div class="card example-card mb-3">
                                        <div class="card-header">
                                            <h5 class="fw-semibold mb-0"><?= $reg['title']; ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <p><?= $reg['description']; ?></p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span><?= $reg['given_by']; ?></span>
                                                <span><?= $reg['date_given']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center py-4">
                                <i class="fa-regular fa-circle-question mb-2 text-muted" style="font-size:1.5rem;"></i>
                                <p class="mb-0 fw-semibold">No recognition provided.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="reminder" role="tabpanel" aria-labelledby="reminder-tab">
                    <div id="">
                        reminder
                    </div>
                </div>

                <div class="tab-pane fade" id="workspace" role="tabpanel" aria-labelledby="workspace-tab">
                    <div class="row h-100 g-2">
                        <?php if (!empty($workspace)): ?>
                            <?php foreach ($workspace as $gr): ?>
                                <div class="col-md-3">
                                    <div class="card shadow-sm rounded-3 h-100 example-card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="badge bg-gradient bg-success"><?= $gr['workspace_type']; ?></span>
                                                <small><?= $gr['status']; ?></small>
                                            </div>
                                            <h5 class="mt-2 mb-1 card-header"><?= $gr['workspace_name']; ?></h5>
                                            <p class="small mb-0"><?= $gr['description']; ?></p>
                                        </div>
                                        <div class="card-footer border-0 bg-transparent">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small><?= $gr['role_in_workspace']; ?></small>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center py-4">
                                <i class="fa-regular fa-circle-question mb-2 text-muted" style="font-size:1.5rem;"></i>
                                <p class="mb-0 fw-semibold">No workspace provided.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="groups" role="tabpanel" aria-labelledby="groups-tab">
                    <div class="row h-100 g-2">
                        <?php if (!empty($group)): ?>
                            <?php foreach ($group as $gr): ?>
                                <div class="col-md-3">
                                    <div class="card example-card mb-3">
                                        <div class="card-header">
                                            <h5 class="fw-semibold mb-0"><?= $gr['group_name']; ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge 
                <?= $gr['group_type'] === 'Team' ? 'bg-primary' : ($gr['group_type'] === 'Project' ? 'bg-success' : 'bg-secondary'); ?>">
                                                <?= $gr['group_type']; ?>
                                            </span>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span><?= $gr['role']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center py-4">
                                <i class="fa-regular fa-circle-question mb-2 text-muted" style="font-size:1.5rem;"></i>
                                <p class="mb-0 fw-semibold">No groups provided.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                    <div class="card shadow-sm border-0" id="add_modal">
                        <div class="card-header bg-light fw-semibold fs-5 py-2 px-3">
                            <i class="fa-solid fa-user me-1 fs-5"></i> About
                        </div>

                        <div class="card-body">
                            <form id="form_update_profile" enctype="multipart/form-data">
                                <input type="hidden" id="add_id" name="id" value="<?= $emp['id'] ?? '' ?>">

                                <div class="row g-2">
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Profile Image</label>
                                        <input type="file" class="form-control" name="photo">
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?= $emp['name'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="no_hp" value="<?= $emp['no_hp'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= $emp['email'] ?? '' ?>">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Department</label>
                                        <select class="form-select" id="add_department" name="department" required>
                                            <?php if (!empty($emp['department'])): ?>
                                                <option value="<?= $emp['department'] ?>" selected>
                                                    <?= $emp['department'] ?>
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Job Title</label>
                                        <select class="form-select" id="add_job_title" name="job_title" required>
                                            <?php if (!empty($emp['job_title'])): ?>
                                                <option value="<?= $emp['job_title'] ?>" selected>
                                                    <?= $emp['job_title'] ?>
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Manager</label>
                                        <select class="form-select" id="add_manager" name="manager">
                                            <?php if (!empty($emp['manager'])): ?>
                                                <option value="<?= $emp['manager'] ?>" selected>
                                                    <?= $emp['manager'] ?>
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" name="location" value="<?= $emp['location'] ?? '' ?>">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="2"><?= $emp['description'] ?? '' ?></textarea>
                                    </div>

                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn text-white" style="background-color: #5f0188eb;">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 mt-3">
                        <div class="card-header bg-light fw-semibold fs-5 py-2 px-3 d-flex align-items-center">
                            <i class="fa-solid fa-briefcase me-1 fs-5"></i> Experience
                            <button class="btn btn-split btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#add_exp_modal">
                                <span class="btn-icon"><i class="fa fa-plus"></i></span>
                                <span class="btn-text">Add</span>
                            </button>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover table-custom" id="table_detail">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:10%;">No</th>
                                        <th class="text-center" style="width:20%;">Company Name</th>
                                        <th class="text-center" style="width:40%;">Posisition</th>
                                        <th class="text-center" style="width:20%;">Periode</th>
                                        <th class="text-center" style="width:10%; text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table_detail_body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="employee" role="tabpanel" aria-labelledby="employee-tab">
                    <div id="">

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!--end::App Content-->
</main>

<!-- Modal -->
<div class="modal fade" id="add_exp_modal" tabindex="-1" aria-labelledby="add_exp_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="add_exp_modalLabel">
                    <i class="fas fa-briefcase me-2"></i> Add Work Experience
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_exp_add">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="card w-100">
                            <div class="card-header bg-light"></div>
                            <div class="card-body">

                                <input type="hidden" id="add_emp_id" name="emp_id" value="<?= $emp['emp_id'] ?? '' ?>">

                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <label for="add_company_name" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="add_company_name" name="company_name" required>
                                    </div>
                                </div>

                                <div class="row g-2 mt-2">
                                    <div class="col-md-12">
                                        <label for="add_job_title" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" id="add_job_title" name="job_title" required>
                                    </div>
                                </div>

                                <div class="row g-2 mt-2">
                                    <div class="col-md-6">
                                        <label for="add_start_date" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="add_start_date" name="start_date" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="add_end_date" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="add_end_date" name="end_date">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-plus me-1"></i> Add Experience
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_exp_modal" tabindex="-1" aria-labelledby="edit_exp_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="edit_exp_modalLabel">
                    <i class="fas fa-pen-to-square me-2"></i> Edit Work Experience
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_exp_edit">

                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="card w-100">
                            <div class="card-header bg-light"></div>

                            <div class="card-body">

                                <input type="hidden" id="edit_experience_id" name="experience_id">

                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <label for="edit_exp_company_name" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="edit_exp_company_name" name="company_name" required>
                                    </div>
                                </div>

                                <div class="row g-2 mt-2">
                                    <div class="col-md-12">
                                        <label for="edit_exp_job_title" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" id="edit_exp_job_title" name="job_title" required>
                                    </div>
                                </div>

                                <div class="row g-2 mt-2">
                                    <div class="col-md-6">
                                        <label for="edit_exp_start_date" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="edit_exp_start_date" name="start_date" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_exp_end_date" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="edit_exp_end_date" name="end_date">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Update Experience
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    .custom-tabs .nav-link {
        color: #5f0188;
        font-weight: 500;
        text-align: center;
        transition: all 0.2s ease-in-out;
        font-size: large;
    }

    .custom-tabs .nav-link:hover {
        background-color: #fff;
        color: #5f0188;
    }

    .custom-tabs .nav-link.active {
        color: #5f0188;
        background-color: #fff;
        border-bottom: 3px solid #5f0188;
        font-weight: 600;
    }

    .label-fixed {
        display: inline-block;
        width: 120px;
    }

    .gold {
        color: #ffc107
    }

    .example-card {
        background-color: #ffffff;
        border-left: 6px solid #5f0188eb;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .example-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .example-card .card-header {
        font-weight: 600;
        color: #5f0188eb;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script src="https://balkan.app/js/orgchart.js"></script>

<script>
    let typingTimer;
    const typingDelay = 500;

    $('#add_exp_modal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
        $(this).find('select').val(null).trigger('change');
        $(this).find('.error, .invalid-feedback').remove();
        $(this).find('.is-invalid').removeClass('is-invalid');
    });

    $(document).ready(function() {
        initSelect2Ajax('#add_job_title', 'Select Job title', "<?= base_url('select_form/jobTitleSelect') ?>");
        initSelect2Ajax('#add_department', 'Select Department', "<?= base_url('select_form/deptSelect') ?>");
        initSelect2Ajax('#add_manager', 'Select Manager', "<?= base_url('select_form/managerSelect') ?>");
        get_table();

        $(document).on('click', '.edit-exp-btn', function() {
            $('#edit_experience_id').val($(this).data('id'));
            $('#edit_exp_company_name').val($(this).data('company_name'));
            $('#edit_exp_job_title').val($(this).data('job_title'));
            $('#edit_exp_start_date').val($(this).data('start_date'));
            $('#edit_exp_end_date').val($(this).data('end_date'));
            $('#edit_exp_modal').modal('show');
        });

        $(document).on('click', '.delete-exp-btn', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "Delete this Work Experience!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Confirm!",
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
                preConfirm: () => {
                    return $.ajax({
                        url: "<?= base_url('employee_info/delete_work_exp') ?>",
                        type: "POST",
                        data: {
                            id: id
                        },
                        dataType: "json"
                    }).then((res) => {
                        if (!res.status) {
                            throw new Error(res.message);
                        }
                        return res;
                    }).catch((error) => {
                        Swal.showValidationMessage(
                            `Request failed: ${error.message || error}`
                        );
                    });
                }
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: result.value.message,
                        timer: 1000,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                }
            });
        });

    });

    function initSelect2Ajax(selector, placeholder, url, modal = null) {
        $(selector).select2({
            placeholder: placeholder,
            allowClear: true,
            width: '100%',
            dropdownParent: modal ? $(modal) : null,
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    if (!data.items) return {
                        results: []
                    };

                    return {
                        results: data.items.map(item => ({
                            id: item.id,
                            text: item.name
                        }))
                    };
                },
                cache: true
            }
        });
    }

    function get_table() {
        let emp_id = <?= json_encode($emp['emp_id'] ?? ""); ?>;

        if ($.fn.DataTable.isDataTable('#table_detail')) {
            $('#table_detail').DataTable().destroy();
            $('#table_detail tbody').empty();
        }
        $('#table_detail_body').html(`
        <tr id="table_loading">
            <td colspan="5" class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="mt-2 fw-bold text-muted">Loading data...</div>
            </td>
        </tr>
        `);
        $.ajax({
            url: "<?= base_url('employee_info/work_exp_table'); ?>",
            type: "GET",
            dataType: "html",
            data: {
                emp_id: emp_id,
            },
            success: function(res) {
                $('#table_detail_body').html(res);
                initializeDataTable('table_detail');
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                $('#table_detail_body').html(`
                <tr>
                    <td colspan="5" class="text-center text-black p-3">
                        Failed to load data. Please try again.
                    </td>
                </tr>
            `);
            }
        });
    }

    function initializeDataTable(tableId) {
        let table = $('#' + tableId);
        let datatable = table.DataTable({
            pageLength: 10,
            lengthChange: true,
            searching: true,
            ordering: true,
            scrollX: true,
            orderCellsTop: true,
            fixedHeader: true,
        });
    }


    $("#form_update_profile").on("submit", function(e) {
        e.preventDefault();

        let dataForm = new FormData(this);
        // console.log("dataForm Add:", dataForm);

        Swal.fire({
            title: "Are you sure?",
            text: "Update this Profile!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm!"
        }).then((result) => {
            if (!result.isConfirmed) return;
            Swal.fire({
                title: 'Processing...',
                html: 'Please wait a moment.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            $.ajax({
                url: "<?= base_url('employee_info/update_profile') ?>",
                type: "POST",
                data: dataForm,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(res) {
                    Swal.close();
                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.close();
                    Swal.fire('Error', 'Something went wrong: ' + error, 'error');
                }
            });
        });
    });

    $("#form_exp_add").on("submit", function(e) {
        e.preventDefault();

        let dataForm = new FormData(this);

        Swal.fire({
            title: "Are you sure?",
            text: "Add this Work Experience!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm!",
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: () => {
                return $.ajax({
                    url: "<?= base_url('employee_info/create_work_exp') ?>",
                    type: "POST",
                    data: dataForm,
                    processData: false,
                    contentType: false,
                    dataType: "json"
                }).then((res) => {
                    if (!res.status) {
                        throw new Error(res.message);
                    }
                    return res;
                }).catch((error) => {
                    Swal.showValidationMessage(
                        `Request failed: ${error.message || error}`
                    );
                });
            }
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: result.value.message,
                    timer: 1000,
                    showConfirmButton: false
                }).then(() => {
                    $('#add_exp_modal').modal('hide');
                    get_table();
                });
            }
        });
    });

    $("#form_exp_edit").on("submit", function(e) {
        e.preventDefault();

        let dataForm = new FormData(this);

        Swal.fire({
            title: "Are you sure?",
            text: "Edit this Work Experience!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm!",
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: () => {
                return $.ajax({
                    url: "<?= base_url('employee_info/update_work_exp') ?>",
                    type: "POST",
                    data: dataForm,
                    processData: false,
                    contentType: false,
                    dataType: "json"
                }).then((res) => {
                    if (!res.status) {
                        throw new Error(res.message);
                    }
                    return res;
                }).catch((error) => {
                    Swal.showValidationMessage(
                        `Request failed: ${error.message || error}`
                    );
                });
            }
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: result.value.message,
                    timer: 1000,
                    showConfirmButton: false
                }).then(() => {
                    $('#edit_exp_modal').modal('hide');
                    get_table();
                });
            }
        });
    });

    const org_chart = <?= json_encode($org_chart) ?>;

    const base_url = "<?= base_url(); ?>";
    const employees = org_chart.map(emp => ({
        id: emp.id,
        pid: emp.manager_id,
        name: emp.name,
        title: emp.job_title,
        img: emp.photo ?
            `${base_url}/assets/profile/${emp.photo}` : `${base_url}/assets/profile/avatar4.png`
    }));

    OrgChart.templates.ula = Object.assign({}, OrgChart.templates.ula);

    OrgChart.templates.ula.node =
        `<rect x="0" y="0" height="{h}" width="{w}" fill="#ffffff" stroke-width="1" stroke="#aeaeae"></rect>
    <line x1="0" y1="0" x2="250" y2="0" stroke-width="2" stroke="#5f0188eb"></line>`;

    OrgChart.templates.ula.field_0 =
        `<text data-width="145" style="font-size: 18px;" fill="#5f0188eb" x="100" y="55">{val}</text>`;
    OrgChart.templates.ula.field_1 =
        `<text data-width="145" data-text-overflow="multiline" style="font-size: 14px;" fill="#000000" x="100" y="76">{val}</text>`;

    OrgChart.templates.ula.img_0 =
        `<clipPath id="{randId}"><circle cx="50" cy="60" r="40"></circle></clipPath>
    <image preserveAspectRatio="xMidYMid slice" clip-path="url(#{randId})" xlink:href="{val}" x="10" y="20" width="80" height="80"></image>`;

    let chart = new OrgChart("#tree", {
        nodes: employees,
        nodeBinding: {
            field_0: "name",
            field_1: "title",
            img_0: "img"
        },
        template: "ula",
        enableDragDrop: false,
        draggable: false,
        mouseScrool: OrgChart.action.none,
        scaleInitial: OrgChart.match.boundary,
        collapse: {
            level: 2
        },
        nodeMouseClick: OrgChart.action.none,
        pan: false,
        zoom: {
            speed: 0
        },
    });
</script>
<?= $this->endSection() ?>