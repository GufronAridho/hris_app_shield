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
                                <li>
                                    <button class="dropdown-item" id="reports-tab" data-bs-toggle="pill" data-bs-target="#reports" type="button" role="tab" aria-controls="reports" aria-selected="false">
                                        <i class="fas fa-chart-line me-1"></i> Reports
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item" id="settings-tab" data-bs-toggle="pill" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">
                                        <i class="fas fa-cog me-1"></i> Settings
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

                <div class="tab-pane fade" id="reports" role="tabpanel" aria-labelledby="reports-tab">
                    <div id="">
                        reports
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

    $(document).ready(function() {

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