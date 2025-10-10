<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">

    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="rounded-3 card-table shadow-sm p-1">
                <div class="custom-card-header p-3 rounded-1">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('home/index'); ?>">Employee</a>
                        </li>
                        <li class="breadcrumb-item active d-flex align-items-center gap-2">
                            People
                            <span class="badge bg-warning text-white">
                                <i class="fas fa-user"></i>
                                <span id="count">0</span>
                        </li>
                    </ol>
                </div>
                <div class="">
                    <ul class="nav custom-tabs" id="tab" role="tablist">
                        <li class="nav-item border" role="presentation">
                            <button class="nav-link active" id="department-tab" data-bs-toggle="pill" data-bs-target="#department" type="button" role="tab" aria-controls="department" aria-selected="true"
                                onclick="department_search()">
                                <i class="fas fa-building  me-1"></i> Department
                            </button>
                        </li>
                        <li class="nav-item border" role="presentation">
                            <button class="nav-link" id="employee-tab" data-bs-toggle="pill" data-bs-target="#employee" type="button" role="tab" aria-controls="employee" aria-selected="false"
                                onclick="employee_search()">
                                <i class="fas fa-user me-1"></i> Employees
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-2" id="tabContent">
                        <div class="tab-pane fade show active" id="department" role="tabpanel" aria-labelledby="department-tab">
                            <div class="mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." id="search_department">
                                    <span class="input-group-text" style="background-color: #6f1a94; color: white;">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                            </div>
                            <div id="department_profile">
                                <div class="d-flex justify-content-center align-items-center" style="min-height: 15rem;">
                                    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="employee" role="tabpanel" aria-labelledby="employee-tab">
                            <div class="mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-grow-1">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search..." id="search_employee">
                                            <span class="input-group-text" style="background-color: #6f1a94; color: white;">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <select class="form-select" id="sort_employee">
                                            <option value="">Sort By</option>
                                            <option value="name" selected>Name</option>
                                            <option value="department">Department</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-light" onclick="pick_employee_profile()">
                                        <i class="fas fa-id-card fs-4"></i>
                                    </button>
                                    <button class="btn btn-light" onclick="pick_employee_table()">
                                        <i class="fas fa-table fs-4"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="employee_profile">
                                <div class="d-flex justify-content-center align-items-center" style="min-height: 15rem;">
                                    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
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
        background: linear-gradient(135deg, #5f0188, #6f1a94);
    }

    .custom-card-header {
        background: #5f0188 !important;
        color: #ffc107 !important;

    }

    .custom-tabs .nav-link {
        color: #5f0188;
        font-weight: 500;
        text-align: center;
        transition: all 0.2s ease-in-out;
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

    .card-slide-left {
        opacity: 0;
        transform: translateX(-30px);
        animation: slideInLeft 0.5s ease forwards;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    let typingTimer;
    const typingDelay = 500;
    let sortBy = 'name';
    let typeBy = 'profile';
    let deptBy = null;

    function showSpinner(targetId) {
        $('#' + targetId).html(`
        <div class="d-flex justify-content-center align-items-center" style="min-height: 15rem;">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    `);
    }

    $(document).ready(function() {
        department_search()
        count_employee_dept()

        $('#search_department').on('keyup', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(department_search, typingDelay);
        });

        $('#search_employee').on('keyup', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(function() {
                employee_search();
            }, typingDelay);
        });

        $('#sort_employee').on('change', function() {
            sortBy = $(this).val();
            employee_search()
        });
    });

    function department_search() {
        showSpinner('department_profile');
        let text = $('#search_department').val().trim() || '';
        $.ajax({
            url: "<?= base_url('employee_info/get_department_profile') ?>",
            type: "GET",
            data: {
                text: text
            },
            success: function(res) {
                $('#department_profile').html(res)
                $('#department_profile .department-card').each(function(index) {
                    $(this).css('animation-delay', (index * 0.1) + 's');
                    $(this).addClass('card-slide-left');
                });
                count_employee_dept()
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                $('#department_profile').html('<div class="text-danger p-3">Failed to load department profile.</div>');
            }
        });
    }

    function count_employee_dept() {
        let text = $('#search_department').val().trim() || '';
        console.log(text)
        $.ajax({
            url: "<?= base_url('employee_info/count_employee_dept') ?>",
            type: "GET",
            dataType: "json",
            data: {
                text: text
            },
            success: function(res) {
                $('#count').html(res.count)
            },
            error: function(xhr, status, error) {
                console.log("Error count:", error);
            }
        })
    }

    $('#department-tab').on('click', function() {
        deptBy = null;
    });

    function openEmployee(department) {
        $('#employee-tab').tab('show');
        deptBy = department;
        employee_search();
    }

    function pick_employee_profile() {
        typeBy = 'profile';
        employee_search();
    }

    function pick_employee_table() {
        typeBy = 'table';
        employee_search();
    }

    function employee_search() {
        showSpinner('employee_profile');
        let text = $('#search_employee').val().trim() || '';
        let sort_by = sortBy
        let type = typeBy
        let dept = deptBy
        if (type === 'table') {
            $('#sort_employee').prop('disabled', true);
        } else {
            $('#sort_employee').prop('disabled', false);
        }

        $.ajax({
            url: "<?= base_url('employee_info/get_employee_card') ?>",
            type: "GET",
            data: {
                text: text,
                sort_by: sort_by,
                type: type,
                dept: dept
            },
            success: function(res) {
                $('#employee_profile').html(res);

                if (type === 'table') {
                    initializeDataTable('table_detail');
                } else if (type === 'profile') {
                    $('#employee_profile .department-card').each(function(index) {
                        $(this).css('animation-delay', (index * 0.1) + 's');
                        $(this).addClass('card-slide-left');
                    });
                }
                count_employee()
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                $('#employee_profile').html('<div class="text-danger p-3">Failed to load employee profile.</div>');
            }
        });
    }

    function count_employee() {
        let text = $('#search_employee').val().trim() || '';
        let dept = deptBy
        console.log(text)
        $.ajax({
            url: "<?= base_url('employee_info/count_employee') ?>",
            type: "GET",
            dataType: "json",
            data: {
                text: text,
                dept: dept
            },
            success: function(res) {
                $('#count').html(res.count)
            },
            error: function(xhr, status, error) {
                console.log("Error count:", error);
            }
        })
    }

    function initializeDataTable(tableId) {
        $('#' + tableId).DataTable({
            pageLength: 10,
            lengthChange: true,
            searching: true,
            ordering: true,
            scrollX: true,
        });
    }

    function goToProfile(emp_id) {
        window.location.href = "<?= base_url('employee_info/employee_profile') ?>/" + emp_id;
    }
</script>
<?= $this->endSection() ?>