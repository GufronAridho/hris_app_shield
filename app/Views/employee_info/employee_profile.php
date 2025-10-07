<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="rounded-3 card-table shadow-sm p-1">
                <div class="p-3 rounded-1 position-relative overflow-hidden" style="height: 250px;">
                    <div style="position:absolute; top:0; left:0; width:100%; height:50%; background-color:#7030a0;"></div>
                    <div style="position:absolute; bottom:0; left:0; width:100%; height:50%; background-color:#fff;"></div>

                    <div class="position-relative h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <img src="<?= base_url('assets/profile/avatar5.png'); ?>"
                                    alt="Image"
                                    class="img-fluid rounded-circle"
                                    style="width: 200px; height:200px; object-fit:cover; border:4px solid #fff;">
                            </div>

                            <div class="col-md-9 d-flex flex-column justify-content-between h-100">
                                <div class="d-flex flex-column justify-content-center text-white" style="flex: 1;">
                                    <h2 class="mb-1 fw-bold gold">Name</h2>
                                    <h3 class="mb-1 fw-bold gold">No</h3>
                                    <h4 class="mb-1 fw-bold gold">Email</h4>
                                </div>

                                <div class="d-flex flex-column justify-content-center text-dark" style="flex: 1;">
                                    <div><strong class="label-fixed">Job Title</strong> Developer</div>
                                    <div><strong class="label-fixed">Department</strong> Developer</div>
                                    <div><strong class="label-fixed">Manager</strong> Developer</div>
                                    <div><strong class="label-fixed">Location</strong> Developer</div>
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
                                <h5 class="card-header fw-bold bg-light p-2">About</h5>
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-2">
                                            Description
                                        </div>
                                        <div class="col-md-10">
                                            DescriptionDescriptionDescriptionDescriptio
                                            nDescriptionDescriptionDescriptionDescriptio
                                            nDescriptionDescriptionDescriptionDescriptionDe
                                            scriptionDescriptionDescriptionDescriptionDesc
                                            riptionDescriptionDescriptionDescriptionDescriptio
                                            nDescriptionDescriptionDescriptionDescriptionDescripti
                                            onDescriptionDescription
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-sm border-0 mt-2">
                                <h5 class="card-header fw-bold bg-light p-2">Experiance</h5>
                                <div class="card-body">
                                    <div class="row g-2 align-items-center mb-2">
                                        <div class="col-md-2">
                                            Employer
                                        </div>
                                        <div class="col-md-10">
                                            Employer
                                        </div>
                                        <div class="col-md-2">
                                            Title
                                        </div>
                                        <div class="col-md-10">
                                            HR Senior Manager
                                        </div>
                                        <div class="col-md-2">
                                            Periode
                                        </div>
                                        <div class="col-md-10">
                                            Auh 2020 - Oct 2025
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card shadow-sm border-0">
                                <h5 class="card-header fw-bold bg-light p-2">Reward</h5>
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="orgchart" role="tabpanel" aria-labelledby="orgchart-tab">
                    <div id="">
                        orgchart
                    </div>
                </div>

                <div class="tab-pane fade" id="recognition" role="tabpanel" aria-labelledby="recognition-tab">
                    <div id="">
                        recognition
                    </div>
                </div>

                <div class="tab-pane fade" id="reminder" role="tabpanel" aria-labelledby="reminder-tab">
                    <div id="">
                        reminder
                    </div>
                </div>

                <div class="tab-pane fade" id="workspace" role="tabpanel" aria-labelledby="workspace-tab">
                    <div id="">
                        workspace
                    </div>
                </div>

                <div class="tab-pane fade" id="groups" role="tabpanel" aria-labelledby="groups-tab">
                    <div id="">
                        groups
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
    .department-badge {
        background-color: #d8b4f8;
        color: #4b0082;
        font-size: 1.05rem;
        font-weight: 600;
        padding: 0.6em 1.4em;
        border-radius: 2rem;
        width: 100px;
        text-align: center;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .department-header {
        background: linear-gradient(135deg, #7030a0, #800080);
    }


    .custom-card-header {
        background: #7030a0 !important;
        color: #ffc107 !important;

    }

    .custom-tabs .nav-link {
        color: #7030a0;
        font-weight: 500;
        text-align: center;
        transition: all 0.2s ease-in-out;
        font-size: large;
    }

    .custom-tabs .nav-link:hover {
        background-color: #fff;
        color: #7030a0;
    }

    .custom-tabs .nav-link.active {
        color: #7030a0;
        background-color: #fff;
        border-bottom: 3px solid #7030a0;
        font-weight: 600;
    }

    .label-fixed {
        display: inline-block;
        width: 120px;
    }

    .gold {
        color: #ffc107
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    let typingTimer;
    const typingDelay = 500;

    $(document).ready(function() {

    });
</script>
<?= $this->endSection() ?>