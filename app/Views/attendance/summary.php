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
                            <li class="breadcrumb-item"><a href="<?= base_url("home/index"); ?>">Attendance </a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card h-100 custom-card-purple custom-card-slim card-button p-3">
                        <div class="row g-2 align-items-center">
                            <div class="d-flex flex-wrap align-items-center gap-2">

                                <div class="form-floating">
                                    <input type="date" class="form-control bg-light" id="attendance_date_filter" name="attendance_date_filter">
                                    <label for="attendance_date_filter">Attendance Date</label>
                                </div>

                                <div class="flex-grow-1" style="max-width: 150px; background-color: #f8f9fa; padding: 0.2rem; border-radius: 8px;">
                                    <small class="text-secondary">Shift</small>
                                    <select class="form-select bg-light" id="shift_filter" name="shift_filter"></select>
                                </div>

                                <button class="btn btn-split btn-primary btn-sm" onclick="get_table()">
                                    <span class="btn-icon"><i class="fa fa-search"></i></span>
                                    <span class="btn-text"><strong>Search</strong></span>
                                </button>

                                <button class="btn btn-split btn-info btn-sm" id="download_excel">
                                    <span class="btn-icon"><i class="fa fa-file-excel"></i></span>
                                    <span class="btn-text"><strong>Download</strong></span>
                                </button>
                            </div>

                            <div class="col-12 mt-2">
                                <div class="row g-2 text-center">
                                    <div class="col-6 col-md-3">
                                        <div class="p-2 rounded d-flex align-items-center justify-content-center gap-2 shadow-sm status-badge">
                                            <i class="fa fa-user"></i>
                                            <span><strong>Employees:</strong> <strong><span id="totalEmployees">0</span></strong></span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="p-2 rounded d-flex align-items-center justify-content-center gap-2 shadow-sm status-badge">
                                            <i class="fa fa-check-circle"></i>
                                            <span><strong>Present:</strong> <strong><span id="presentCount">0</span></strong></span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="p-2 rounded d-flex align-items-center justify-content-center gap-2 shadow-sm status-badge">
                                            <i class="fa fa-times-circle"></i>
                                            <span><strong>Absent:</strong> <strong><span id="absentCount">0</span></strong></span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="p-2 rounded d-flex align-items-center justify-content-center gap-2 shadow-sm status-badge">
                                            <i class="fa fa-umbrella-beach"></i>
                                            <span><strong>On Leave:</strong> <strong><span id="leaveCount">0</span></strong></span>
                                        </div>
                                    </div>
                                </div>
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
                <div class="card-body p-4">
                    <div class="row g-2 text-center">
                        <div class="col-md-3">
                            <div class="p-2 rounded d-flex align-items-center justify-content-center gap-2 shadow-sm status-badge">
                                <i class="fa fa-clock"></i>
                                <span><strong>On Time:</strong> <strong><span id="onTimeCount">0</span></strong></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-2 rounded d-flex align-items-center justify-content-center gap-2 shadow-sm status-badge">
                                <i class="fa fa-exclamation-triangle"></i>
                                <span><strong>Late:</strong> <strong><span id="lateCount">0</span></strong></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-2 rounded d-flex align-items-center justify-content-center gap-2 shadow-sm status-badge">
                                <i class="fa fa-arrow-left"></i>
                                <span><strong>Left Early:</strong> <strong><span id="leftEarlyCount">0</span></strong></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-2 rounded d-flex align-items-center justify-content-center gap-2 shadow-sm status-badge">
                                <i class="fa fa-exclamation-circle"></i>
                                <span><strong>Late & Left Early:</strong> <strong><span id="lateLeftEarlyCount">0</span></strong></span>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped table-hover table-custom-emp mt-2" id="table_detail">
                        <thead>
                            <tr>
                                <th class="text-center">Employee</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Time In</th>
                                <th class="text-center">Time Out</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Work Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="table_detail_body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>

<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="edit_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="edit_modalLabel">
                    <i class="fas fa-pen-to-square me-2"></i> Edit Attendance
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_edit">
                <div class="modal-body">
                    <input type="hidden" id="edit_att" name="attendance_id">
                    <input type="hidden" id="edit_emp_id" name="emp_id">

                    <div class="row g-2">
                        <div class="col-md-6">
                            <label for="edit_name" class="form-label">Employee Name</label>
                            <input type="text" id="edit_name" class="form-control" name="name" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_date" class="form-label">Date</label>
                            <input type="date" id="edit_date" class="form-control" name="attendance_date" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_time_in" class="form-label">Time In</label>
                            <input type="time" id="edit_time_in" class="form-control" name="time_in">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_time_out" class="form-label">Time Out</label>
                            <input type="time" id="edit_time_out" class="form-control" name="time_out">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_status" class="form-label">Attendance Status</label>
                            <select id="edit_status" name="attendance_status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_work_status" class="form-label">Work Status</label>
                            <input type="text" id="edit_work_status" class="form-control" name="work_status" readonly>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
    .status-badge {
        background-color: #f2f0f8;
        color: #5f0188;
        border: 1px solid #5f0188;
    }

    .table-custom-emp {
        border: 1px solid #dee2e6;
        border-collapse: separate;
        border-spacing: 0;
        overflow: hidden;
    }

    .table-custom-emp th {
        background-color: #6f1a94 !important;
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
</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $('#edit_modal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
        $(this).find('select').val(null).trigger('change');
        $(this).find('.error, .invalid-feedback').remove();
        $(this).find('.is-invalid').removeClass('is-invalid');
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

    $(document).ready(function() {
        let today = new Date().toISOString().split('T')[0];
        $('#attendance_date_filter').val(today);

        initSelect2Ajax('#shift_filter', 'Select Shift', "<?= base_url('select_form/shiftSelect') ?>");
        let shiftOption = new Option('Morning Shift', 1, true, true);
        $('#shift_filter').append(shiftOption).trigger('change');

        get_table();

        $(document).on('click', '.edit-btn', function() {
            $('#edit_att').val($(this).data('id'));
            $('#edit_emp_id').val($(this).data('emp_id'));
            $('#edit_name').val($(this).data('name'));
            $('#edit_date').val($(this).data('date'));
            const time_in = $(this).data('time_in');
            $('#edit_time_in').val(time_in ? time_in.split(' ')[1].slice(0, 5) : '');
            const time_out = $(this).data('time_out');
            $('#edit_time_out').val(time_out ? time_out.split(' ')[1].slice(0, 5) : '');
            $('#edit_status').val($(this).data('status'));
            $('#edit_work_status').val($(this).data('work_status'));

            $('#edit_modal').modal('show');
        });

        $(document).on('click', '.delete-btn', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "Delete this Attendance!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Confirm!",
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
                preConfirm: () => {
                    return $.ajax({
                        url: "<?= base_url('attendance/delete_attendance') ?>",
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
                        get_table();
                    });
                }
            });
        });
    });

    function get_table() {
        let attendance_date = $('#attendance_date_filter').val();
        let shift = $('#shift_filter').val();

        if ($.fn.DataTable.isDataTable('#table_detail')) {
            $('#table_detail').DataTable().destroy();
            $('#table_detail tbody').empty();
        }
        $('#table_detail_body').html(`
        <tr id="table_loading">
            <td colspan="7" class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="mt-2 fw-bold text-muted">Loading data...</div>
            </td>
        </tr>
        `);
        $.ajax({
            url: "<?= base_url('attendance/summary_table'); ?>",
            type: "GET",
            data: {
                attendance_date: attendance_date,
                shift: shift
            },
            dataType: "json",
            success: function(res) {
                $('#table_detail_body').html(res.table);
                $('#totalEmployees').text(res.statusCount.total_employees);
                $('#presentCount').text(res.statusCount.Present);
                $('#absentCount').text(res.statusCount.Absent);
                $('#leaveCount').text(res.statusCount['On Leave'] ?? 0);
                $('#onTimeCount').text(res.workStatusCount['On Time'] ?? 0);
                $('#lateCount').text(res.workStatusCount['Late'] ?? 0);
                $('#leftEarlyCount').text(res.workStatusCount['Left Early'] ?? 0);
                $('#lateLeftEarlyCount').text(res.workStatusCount['Late & Left Early'] ?? 0);
                initializeDataTable('table_detail');
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                $('#table_detail_body').html(`
                <tr>
                    <td colspan="7" class="text-center text-black p-3">
                        Failed to load data. Please try again.
                    </td>
                </tr>
            `);
            }
        });
    }

    function initializeDataTable(tableId) {
        let table = $('#' + tableId);
        $('#' + tableId + ' thead tr.search-row').remove();

        $('#' + tableId + ' thead tr')
            .clone(true)
            .addClass('search-row')
            .appendTo('#' + tableId + ' thead');

        $('#' + tableId + ' thead tr.search-row th').each(function(index) {
            if (index === 6) {
                $(this).html('');
            } else {
                $(this).html('<input type="text" placeholder="Search" class="form-control form-control-sm" />');
            }
        });

        let datatable = table.DataTable({
            pageLength: 10,
            lengthChange: true,
            searching: true,
            ordering: true,
            scrollX: true,
            orderCellsTop: true,
            fixedHeader: true,
            buttons: [{
                extend: 'excelHtml5',
                text: '',
                title: 'Export to Excel',
                filename: 'Attendance Summary' + new Date().toISOString().slice(0, 10),
                exportOptions: {
                    columns: ':visible:not(:last-child)'
                }
            }],
            initComplete: function() {
                var api = this.api();
                api.columns().every(function(colIdx) {
                    $('input', $('.search-row th').eq(colIdx)).on('keyup change clear', function() {
                        api.column(colIdx).search(this.value).draw();
                    });
                });
            }
        });

        $('#download_excel').off('click').on('click', function() {
            datatable.button('.buttons-excel').trigger();
        });
    }

    $("#form_edit").on("submit", function(e) {
        e.preventDefault();

        let dataForm = new FormData(this);

        Swal.fire({
            title: "Are you sure?",
            text: "Edit this Attendance!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm!",
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: () => {
                return $.ajax({
                    url: "<?= base_url('attendance/update_attendance') ?>",
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
                    $('#edit_modal').modal('hide');
                    get_table();
                });
            }
        });
    });
</script>
<?= $this->endSection() ?>