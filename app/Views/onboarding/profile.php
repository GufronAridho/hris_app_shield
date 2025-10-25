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
                            <li class="breadcrumb-item"><a href="<?= base_url("home/index"); ?>">Onboarding</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card h-100 custom-card-purple custom-card-slim card-button">
                        <div class="h-100 d-flex justify-content-end align-items-center gap-2 flex-wrap">

                            <button class="btn btn-split btn-info btn-sm" id="download_excel">
                                <span class="btn-icon"><i class="fa fa-file-excel"></i></span>
                                <span class="btn-text">
                                    <strong>
                                        Download
                                    </strong>
                                </span>
                            </button>

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
                    <table class="table table-bordered table-striped table-hover table-custom" id="table_detail">
                        <thead>
                            <tr>
                                <th class="text-center">Employee ID</th>
                                <th class="text-center">Employee Name</th>
                                <th class="text-center">Join Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="table_detail_body">
                            <tr id="table_loading">
                                <td colspan="6" class="text-center py-4">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="mt-2 fw-bold text-muted">Loading data...</div>
                                </td>
                            </tr>
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
                    <i class="fas fa-user-edit me-2"></i> Edit Employee
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_edit">
                <div class=" modal-body">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label for="edit_emp_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="edit_emp_id" name="emp_id" placeholder="Enter employee ID" readonly>
                        </div>
                        <div class="col-md-8">
                            <label for="edit_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name" placeholder="Enter employee name" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" placeholder="Enter employee email">
                        </div>

                        <div class="col-md-6">
                            <label for="edit_manager" class="form-label">Manager</label>
                            <select class="form-select" id="edit_manager" name="manager">
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="edit_hr_partner" class="form-label">HR Partner</label>
                            <select class="form-select" id="edit_hr_partner" name="hr_partner">
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_organization" class="form-label">Organization</label>
                            <input type="text" class="form-control" id="edit_organization" name="organization" placeholder="Enter organization name">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_emp_grade" class="form-label">Employee Grade</label>
                            <input type="number" class="form-control" id="edit_emp_grade" name="emp_grade" step="0.01" min="0" placeholder="Enter grade (e.g. 1, 2, 3)">
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

<div class="modal fade" id="view_modal" tabindex="-1" aria-labelledby="view_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="view_modalLabel">
                    <i class="fas fa-user me-2"></i> View Employee
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_edit">
                <div class=" modal-body">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label for="view_emp_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="view_emp_id" name="emp_id" placeholder="Enter employee ID" readonly>
                        </div>
                        <div class="col-md-8">
                            <label for="view_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="view_name" name="name" placeholder="Enter employee name" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="view_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="view_email" name="email" placeholder="Enter employee email" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="view_manager" class="form-label">Manager</label>
                            <input type="text" class="form-control" id="view_manager" name="manager" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="view_hr_partner" class="form-label">HR Partner</label>
                            <input type="text" class="form-control" id="view_hr_partner" name="hr_partner" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="view_organization" class="form-label">Organization</label>
                            <input type="text" class="form-control" id="view_organization" name="organization" placeholder="Enter organization name">
                        </div>
                        <div class="col-md-6">
                            <label for="view_emp_grade" class="form-label">Employee Grade</label>
                            <input type="number" class="form-control" id="view_emp_grade" name="emp_grade" step="0.01" min="0" placeholder="Enter grade (e.g. 1, 2, 3)">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>

</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $('#edit_modal').on('shown.bs.modal', function() {
        initSelect2Ajax('#edit_manager', 'Select Manager', "<?= base_url('select_form/managerSelect') ?>", '#edit_modal .modal-body');
        initSelect2Ajax('#edit_hr_partner', 'Select HR Partner', "<?= base_url('select_form/hrSelect') ?>", '#edit_modal .modal-body');
    })

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

    function setSelect2Value(selector, value) {
        if (value && value !== 'null' && value.trim() !== '') {
            var opt = new Option(value, value, true, true);
            $(selector).empty().append(opt).trigger('change');
        } else {
            $(selector).val(null).trigger('change');
        }
    }

    $(document).ready(function() {
        get_table()

        $(document).on('click', '.edit-btn', function() {
            $('#edit_emp_id').val($(this).data('emp_id'));
            $('#edit_name').val($(this).data('name'));
            $('#edit_organization').val($(this).data('organization'));
            $('#edit_email').val($(this).data('email'));
            $('#edit_emp_grade').val($(this).data('emp_grade'));

            setSelect2Value('#edit_manager', $(this).data('manager'));
            setSelect2Value('#edit_hr_partner', $(this).data('hr_partner'));

            $('#edit_modal').modal('show');
        });

        $(document).on('click', '.view-btn', function() {
            $('#view_emp_id').val($(this).data('emp_id'));
            $('#view_name').val($(this).data('name'));
            $('#view_organization').val($(this).data('organization'));
            $('#view_manager').val($(this).data('manager'));
            $('#view_hr_partner').val($(this).data('hr_partner'));
            $('#view_email').val($(this).data('email'));
            $('#view_emp_grade').val($(this).data('emp_grade'));
            $('#view_modal').modal('show');
        });
    });

    function get_table() {
        if ($.fn.DataTable.isDataTable('#table_detail')) {
            $('#table_detail').DataTable().destroy();
            $('#table_detail tbody').empty();
        }
        $('#table_body').html(`
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
            url: "<?= base_url('onboarding/profile_table'); ?>",
            type: "GET",
            dataType: "html",
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
        $('#' + tableId + ' thead tr.search-row').remove();

        $('#' + tableId + ' thead tr')
            .clone(true)
            .addClass('search-row')
            .appendTo('#' + tableId + ' thead');

        $('#' + tableId + ' thead tr.search-row th').each(function(index) {
            if (index === 4) {
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
                filename: 'Recruitment Summary' + new Date().toISOString().slice(0, 10),
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
            text: "Edit this Profile!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm!",
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: () => {
                return $.ajax({
                    url: "<?= base_url('onboarding/update_profile') ?>",
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