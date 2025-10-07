<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-stretch g-2">

                <div class="col-md-3">
                    <div class="card h-100 custom-card-breadcrumb custom-card-slim d-flex align-items-left justify-content-center">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url("home/index"); ?>">Employee</a></li>
                            <li class="breadcrumb-item active">Employee Manegment</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card h-100 custom-card-purple custom-card-slim card-button p-3">
                        <div class="d-flex flex-wrap align-items-center gap-2">

                            <div class="flex-grow-1" style="max-width: 150px; background-color: #f8f9fa; padding: 0.2rem; border-radius: 8px;">
                                <small class="text-secondary">Status</small>
                                <select class="form-select bg-light" id="status_filter" name="status_filter">

                                </select>
                            </div>

                            <div class="flex-grow-1" style="max-width: 150px; background-color: #f8f9fa; padding: 0.2rem; border-radius: 8px;">
                                <small class="text-secondary">Employee type</small>
                                <select class="form-select bg-light" id="type_filter" name="type_filter">

                                </select>
                            </div>

                            <div class="input-group w-auto">
                                <div class="form-floating flex-grow-1">
                                    <input type="date" class="form-control bg-light" id="date_from_filter" name="date_from_filter">
                                    <label for="date_from_filter">Hire Date From</label>
                                </div>
                            </div>

                            <div class="input-group w-auto">
                                <div class="form-floating flex-grow-1">
                                    <input type="date" class="form-control bg-light" id="date_to_filter" name="date_to_filter">
                                    <label for="date_to_filter">Hire Date To</label>
                                </div>
                            </div>

                            <div class="ms-auto d-flex gap-1 flex-wrap">
                                <button class="btn btn-split btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#add_modal">
                                    <span class="btn-icon"><i class="fa fa-plus"></i></span>
                                    <span class="btn-text">Add</span>
                                </button>

                                <button class="btn btn-split btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#upload_modal">
                                    <span class="btn-icon"><i class="fa fa-upload"></i></span>
                                    <span class="btn-text">Upload</span>
                                </button>

                                <button class="btn btn-split btn-info btn-sm" id="download_excel">
                                    <span class="btn-icon"><i class="fa fa-file-excel"></i></span>
                                    <span class="btn-text">Download</span>
                                </button>

                                <!-- <button type="button" id="btnShowCsrf" class="btn btn-secondary btn-sm">Show CSRF Token</button> -->
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="card shadow-sm rounded-3 custom-card-purple card-table">
                <!-- Card Body with Table -->
                <div class="card-body p-4">
                    <table class="table table-bordered table-striped table-hover table-custom-emp" id="table_detail">
                        <thead>
                            <tr>
                                <th>Emp ID</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Join Date</th>
                                <th>Type</th>
                                <th>Organization</th>
                                <th>Department</th>
                                <th>Job Title</th>
                                <th>Manager</th>
                                <th>HR Partner</th>
                                <th>Location</th>
                                <th>Grade</th>
                                <th>Status</th>
                                <th>Resign Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>

<!-- Modal -->
<div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="add_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="add_modalLabel">
                    <i class="fas fa-user-plus me-2"></i> Add Employee
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_add" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row g-2 mb-3">

                        <div class="col-md-3">
                            <div class="card w-100">
                                <div class="card-header bg-light"></div>
                                <div class="card-body">
                                    <div id="add_preview" class="mb-2 text-center w-100"></div>
                                    <label for="add_photo" class="form-label">Profile Picture</label>
                                    <input type="file" accept="image/*" class="form-control" id="add_photo" name="photo" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card w-100">
                                <div class="card-header bg-light"></div>
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-5">
                                            <label for="add_emp_id" class="form-label">Employee ID</label>
                                            <input type="text" class="form-control" id="add_emp_id" name="emp_id" required>
                                        </div>
                                        <div class="col-md-7">
                                            <label for="add_name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="add_name" name="name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="add_email" name="email" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_no_hp" class="form-label">No Hp</label>
                                            <input type="number" class="form-control" id="add_no_hp" name="no_hp" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_gender" class="form-label">Gender</label>
                                            <select class="form-select" id="add_gender" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_join_date" class="form-label">Join Date</label>
                                            <input type="date" class="form-control" id="add_join_date" name="join_date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card w-100">
                                <div class="card-header bg-light"></div>
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label for="add_emp_type" class="form-label">Employee Type</label>
                                            <select class="form-select" id="add_emp_type" name="emp_type" required></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_department" class="form-label">Department</label>
                                            <select class="form-select" id="add_department" name="department" required></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_job_title" class="form-label">Job Title</label>
                                            <select class="form-select" id="add_job_title" name="job_title" required></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_manager" class="form-label">Manager</label>
                                            <input type="text" class="form-control" id="add_manager" name="manager" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-12">
                            <div class="card w-100">
                                <div class="card-header bg-light"></div>
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-2">
                                            <label for="add_hr_partner" class="form-label">HR Partner</label>
                                            <input type="text" class="form-control" id="add_hr_partner" name="hr_partner" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="add_organization" class="form-label">Organization</label>
                                            <input type="text" class="form-control" id="add_organization" name="organization" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="add_location" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="add_location" name="location" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="add_emp_grade" class="form-label">Employee Grade</label>
                                            <input type="number" class="form-control" id="add_emp_grade" name="emp_grade" step="0.01" min="0" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="add_status" class="form-label">Status</label>
                                            <select class="form-select" id="add_status" name="status" required></select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="add_resign_date" class="form-label">Resign Date</label>
                                            <input type="date" class="form-control" id="add_resign_date" name="resign_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-plus me-1"></i> Add Employee
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="edit_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="edit_modalLabel">
                    <i class="fas fa-user-edit me-2"></i> Edit Employee
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_edit" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="row g-2 mb-3">

                        <div class="col-md-3">
                            <div class="card w-100">
                                <div class="card-header bg-light"></div>
                                <div class="card-body">
                                    <div id="edit_preview" class="mb-2 text-center w-100"></div>
                                    <label for="edit_photo" class="form-label">Profile Picture</label>
                                    <input type="file" accept="image/*" class="form-control" id="edit_photo" name="photo">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card w-100">
                                <div class="card-header bg-light"></div>
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-5">
                                            <label for="edit_emp_id" class="form-label">Employee ID</label>
                                            <input type="text" class="form-control" id="edit_emp_id" name="emp_id" disabled>
                                        </div>
                                        <div class="col-md-7">
                                            <label for="edit_name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="edit_name" name="name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="edit_email" name="email" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_no_hp" class="form-label">No Hp</label>
                                            <input type="number" class="form-control" id="edit_no_hp" name="no_hp" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_gender" class="form-label">Gender</label>
                                            <select class="form-select" id="edit_gender" name="gender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_join_date" class="form-label">Join Date</label>
                                            <input type="date" class="form-control" id="edit_join_date" name="join_date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card w-100">
                                <div class="card-header bg-light"></div>
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label for="edit_emp_type" class="form-label">Employee Type</label>
                                            <select class="form-select" id="edit_emp_type" name="emp_type" required></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_department" class="form-label">Department</label>
                                            <select class="form-select" id="edit_department" name="department" required></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_job_title" class="form-label">Job Title</label>
                                            <select class="form-select" id="edit_job_title" name="job_title" required></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_manager" class="form-label">Manager</label>
                                            <input type="text" class="form-control" id="edit_manager" name="manager" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-12">
                            <div class="card w-100">
                                <div class="card-header bg-light"></div>
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-2">
                                            <label for="edit_hr_partner" class="form-label">HR Partner</label>
                                            <input type="text" class="form-control" id="edit_hr_partner" name="hr_partner" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_organization" class="form-label">Organization</label>
                                            <input type="text" class="form-control" id="edit_organization" name="organization" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_location" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="edit_location" name="location" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_emp_grade" class="form-label">Employee Grade</label>
                                            <input type="number" class="form-control" id="edit_emp_grade" name="emp_grade" step="0.01" min="0" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_status" class="form-label">Status</label>
                                            <select class="form-select" id="edit_status" name="status" required></select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="edit_resign_date" class="form-label">Resign Date</label>
                                            <input type="date" class="form-control" id="edit_resign_date" name="resign_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-pen me-1"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="upload_modal" tabindex="-1" aria-labelledby="upload_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="upload_modalLabel"><i class="fas fa-file-upload me-2"></i>Upload Excel</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_upload" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center justify-content-center border-end">
                            <div class="text-center">
                                <p><strong>Download Template Excel</strong></p>
                                <a href="<?= base_url('assets/template/employee_template.xlsx') ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-download me-1"></i> Download
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <p><strong>Upload Excel File</strong></p>
                                <input class="form-control" type="file" name="excel_file" id="excel_file" accept=".xlsx,.xls">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-upload me-1"></i> Uplod Excel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .table-custom-emp {
        border: 1px solid #dee2e6;
        border-collapse: separate;
        border-spacing: 0;
        overflow: hidden;
    }

    .table-custom-emp th {
        background-color: #7030a0 !important;
        color: #dee2e6;
        text-align: center;
        border: 1px solid #dee2e6;
        border-radius: 0;
        white-space: nowrap;

    }

    .table-custom-emp td {
        border: 1px solid #dee2e6;
        border-radius: 0;
        vertical-align: middle;
    }

    #add_modal .select2-container--default .select2-selection--single,
    #edit_modal .select2-container--default .select2-selection--single {
        height: calc(1.5em + 0.75rem + 2px);
    }

    #add_modal .select2-container--default .select2-selection--single .select2-selection__rendered,
    #edit_modal .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: calc(1.5em + 0.75rem);
    }

    #add_modal .select2-container--default .select2-selection--single .select2-selection__arrow,
    #edit_modal .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: calc(1.5em + 0.75rem + 2px);
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    let table_detail;

    $('#add_modal').on('shown.bs.modal', function() {
        initSelect2Ajax('#add_status', 'Select Status', "<?= base_url('select_form/statusSelect') ?>", '#add_modal .modal-body');
        initSelect2Ajax('#add_job_title', 'Select Job title', "<?= base_url('select_form/jobTitleSelect') ?>", '#add_modal .modal-body');
        initSelect2Ajax('#add_emp_type', 'Select Employee type', "<?= base_url('select_form/empTypeSelect') ?>", '#add_modal .modal-body');
        initSelect2Ajax('#add_department', 'Select Department', "<?= base_url('select_form/deptSelect') ?>", '#add_modal .modal-body');
    });

    $('#edit_modal').on('shown.bs.modal', function() {
        initSelect2Ajax('#edit_status', 'Select Status', "<?= base_url('select_form/statusSelect') ?>", '#edit_modal .modal-body');
        initSelect2Ajax('#edit_job_title', 'Select Job title', "<?= base_url('select_form/jobTitleSelect') ?>", '#edit_modal .modal-body');
        initSelect2Ajax('#edit_emp_type', 'Select Employee type', "<?= base_url('select_form/empTypeSelect') ?>", '#edit_modal .modal-body');
        initSelect2Ajax('#edit_department', 'Select Department', "<?= base_url('select_form/deptSelect') ?>", '#edit_modal .modal-body');
    });

    $('#add_modal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
        $(this).find('select').val(null).trigger('change');
        $(this).find('.error, .invalid-feedback').remove();
        $(this).find('.is-invalid').removeClass('is-invalid');
        $(this).find('#add_preview').empty();
    });

    $('#edit_modal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
        $(this).find('select').val(null).trigger('change');
        $(this).find('.error, .invalid-feedback').remove();
        $(this).find('.is-invalid').removeClass('is-invalid');
        $(this).find('#edit_preview').empty();
    });

    $('#upload_modal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
        $(this).find('.error, .invalid-feedback').remove();
        $(this).find('.is-invalid').removeClass('is-invalid');
    });

    function get_table() {
        let status = $('#status_filter').val();
        let type = $('#type_filter').val();
        let date_from = $('#date_from_filter').val();
        let date_to = $('#date_to_filter').val();

        if ($.fn.DataTable.isDataTable('#table_detail')) {
            table_detail.destroy();
            $('#table_detail tbody').empty();
            $('#table_detail thead tr.search-row').remove();
        }

        $('#table_detail thead tr').clone(true).addClass('search-row').appendTo('#table_detail thead');

        $('#table_detail thead tr.search-row th').each(function(index) {
            if (index === 14) {
                $(this).html('');
            } else {
                $(this).html('<input type="text" placeholder="Search" class="form-control form-control-sm" />');
            }
        });

        table_detail = $('#table_detail').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            lengthChange: true,
            searching: true,
            ordering: true,
            orderCellsTop: true,
            scrollX: true,
            searchDelay: 500,
            buttons: [{
                extend: 'excelHtml5',
                text: '',
                title: 'Export to Excel',
                filename: 'Mst Employee' + new Date().toISOString().slice(0, 10),
                exportOptions: {
                    columns: ':visible:not(:last-child)'
                }
            }],
            ajax: {
                url: "<?= base_url('employee_info/employeeList') ?>",
                type: "POST",
                data: function(d) {
                    d.status = status;
                    d.type = type;
                    d.date_from = date_from;
                    d.date_to = date_to;
                }
            },
            columns: [{
                    data: 'emp_id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'gender'
                },
                {
                    data: 'join_date',
                    className: 'text-center align-middle',
                },
                {
                    data: 'emp_type'
                },
                {
                    data: 'organization'
                },
                {
                    data: 'department'
                },
                {
                    data: 'job_title'
                },
                {
                    data: 'manager'
                },
                {
                    data: 'hr_partner'
                },
                {
                    data: 'location'
                },
                {
                    data: 'emp_grade',
                    className: 'text-center align-middle',
                },
                {
                    data: 'status',
                    className: 'text-center align-middle',
                    render: function(data, type, row) {
                        let badgeClass = '';
                        if (data.toLowerCase() == 'active') {
                            badgeClass = 'success'
                        } else if (data.toLowerCase() == 'resign') {
                            badgeClass = 'danger'
                        } else {
                            badgeClass = 'secondary'
                        }
                        return `<span class="badge bg-${badgeClass}">${data}</span>`;
                    }
                },
                {
                    data: 'resign_date',
                    className: 'text-center align-middle',
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        return `
                    <button class="btn btn-sm btn-info edit-btn" data-emp='${JSON.stringify(row)}'>
                        <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger delete-btn"
                        data-id="${row.id}" data-emp_id="${row.emp_id}">
                        <i class="fa fa-trash"></i>
                    </button>
                `;
                    }
                }
            ],
            columnDefs: [{
                orderable: false,
                targets: -1
            }],
            initComplete: function() {
                var api = this.api();
                api.columns().every(function(colIdx) {
                    let typingTimer;
                    let doneTypingInterval = 500;

                    $('input', $('.search-row th').eq(colIdx)).on('keyup', function() {
                        clearTimeout(typingTimer);
                        let input = this;
                        typingTimer = setTimeout(function() {
                            api.column(colIdx).search(input.value).draw();
                        }, doneTypingInterval);
                    });

                    $('input', $('.search-row th').eq(colIdx)).on('keydown', function() {
                        clearTimeout(typingTimer);
                    });
                });
            }
        });
    }

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

    $(document).ready(function() {
        get_table();

        initSelect2Ajax('#status_filter', 'Select Status', "<?= base_url('employee_info/filterStatus') ?>");
        initSelect2Ajax('#type_filter', 'Select Employee type', "<?= base_url('employee_info/filterEmpType') ?>");

        $('#download_excel').on('click', function() {
            table_detail.button('.buttons-excel').trigger();
        })

        $('#status_filter, #type_filter, #date_from_filter, #date_to_filter').on('change', function() {
            get_table();
        });

        $('#add_photo').on('change', function() {
            const file = this.files[0];
            if (file) {
                if (!file.type.startsWith('image/')) {
                    alert('Only image files are allowed!');
                    $(this).val('');
                    $('#add_preview').html('');
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#add_preview').html('<img src="' + e.target.result + '" alt="Preview" style="max-width:100%; max-height:150px; object-fit:contain;">');
                }
                reader.readAsDataURL(file);
            } else {
                $('#add_preview').html('');
            }
        });

        $('#edit_photo').on('change', function() {
            const file = this.files[0];
            if (file) {
                if (!file.type.startsWith('image/')) {
                    alert('Only image files are allowed!');
                    $(this).val('');
                    $('#edit_preview').html('');
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#edit_preview').html('<img src="' + e.target.result + '" alt="Preview" style="max-width:100%; max-height:150px; object-fit:contain;">');
                }
                reader.readAsDataURL(file);
            } else {
                $('#edit_preview').html('');
            }
        });

        $(document).on('click', '.edit-btn', function() {
            var emp = $(this).data('emp');

            $('#edit_id').val(emp.id);
            $('#edit_emp_id').val(emp.emp_id);
            $('#edit_name').val(emp.name);
            $('#edit_gender').val(emp.gender);
            $('#edit_join_date').val(emp.join_date);
            // $('#edit_emp_type').val(emp.emp_type);
            var emp_typeOption = new Option(emp.emp_type, emp.emp_type, true, true);
            $('#edit_emp_type').append(emp_typeOption).trigger('change');
            $('#edit_organization').val(emp.organization);
            // $('#edit_department').val(emp.department);
            var departmentOption = new Option(emp.department, emp.department, true, true);
            $('#edit_department').append(departmentOption).trigger('change');
            // $('#edit_job_title').val(emp.job_title);
            var job_titleOption = new Option(emp.job_title, emp.job_title, true, true);
            $('#edit_job_title').append(job_titleOption).trigger('change');
            $('#edit_manager').val(emp.manager);
            $('#edit_hr_partner').val(emp.hr_partner);
            $('#edit_location').val(emp.location);
            $('#edit_emp_grade').val(emp.emp_grade);
            // $('#edit_status').val(emp.status);
            var statusOption = new Option(emp.status, emp.status, true, true);
            $('#edit_status').append(statusOption).trigger('change');
            $('#edit_resign_date').val(emp.resign_date);
            $('#edit_email').val(emp.email);
            $('#edit_no_hp').val(emp.no_hp);
            var preview = $('#edit_preview');
            if (emp.photo) {
                var baseUrl = "<?= base_url() ?>";
                var photoPath = baseUrl + 'assets/profile/' + emp.photo;
                preview.html('<img src="' + photoPath + '" alt="Preview" style="max-width:100%; max-height:150px; object-fit:contain;">');
            } else {
                preview.html('<span class="text-muted">No photo available</span>');
            }

            $('#edit_modal').modal('show');
        });

        $(document).on('click', '.delete-btn', function() {
            var emp_id = $(this).data('emp_id');
            var id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "Delete this Employee: " + emp_id,
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
                    url: "<?= base_url('employee_info/delete_employee') ?>",
                    type: "POST",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(res) {
                        Swal.close();
                        if (res.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: res.message
                            }).then(() => {
                                get_table();
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
    });

    $('#btnShowCsrf').click(() => {
        Swal.fire({
            title: 'Current CSRF Token',
            html: `<code>${$('meta[name="csrf-token"]').attr('content')}</code>`,
            icon: 'info',
            confirmButtonText: 'Close'
        });
    });

    $("#form_add").on("submit", function(e) {
        e.preventDefault();

        let dataForm = new FormData(this);
        console.log("dataForm Add:", dataForm);

        Swal.fire({
            title: "Are you sure?",
            text: "Add this Employee!",
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
                url: "<?= base_url('employee_info/create_employee') ?>",
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
                            $('#add_modal').modal('hide');
                            get_table();
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

    $("#form_edit").on("submit", function(e) {
        e.preventDefault();

        let dataForm = new FormData(this);
        console.log("dataForm Edit:", dataForm);

        Swal.fire({
            title: "Are you sure?",
            text: "Edit this Employee!",
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
                url: "<?= base_url('employee_info/update_employee') ?>",
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
                            $('#edit_modal').modal('hide');
                            get_table();
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

    $("#form_upload").on("submit", function(e) {
        e.preventDefault();

        let dataForm = new FormData(this);
        Swal.fire({
            title: "Are you sure?",
            text: "Upload this Excel!",
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
                url: "<?= base_url('employee_info/upload_employee') ?>",
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
                            $('#upload_modal').modal('hide');
                            get_table();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            html: res.message
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
</script>

<?= $this->endSection() ?>