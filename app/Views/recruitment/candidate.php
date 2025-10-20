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
                            <li class="breadcrumb-item"><a href="<?= base_url("home/index"); ?>">Recruitment</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card h-100 custom-card-purple custom-card-slim card-button">
                        <div class="h-100 d-flex justify-content-end align-items-center gap-2 flex-wrap">

                            <button class="btn btn-split btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#add_modal">
                                <span class="btn-icon"><i class="fa fa-plus"></i></span>
                                <span class="btn-text">
                                    <strong>
                                        Add Data
                                    </strong>
                                </span>
                            </button>

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
                                <th class="text-center">Job ID</th>
                                <th class="text-center">Candidate Name</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Age</th>
                                <th class="text-center">Education</th>
                                <th class="text-center">Address</th>
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

<!-- Modal -->
<div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="add_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="add_modalLabel">
                    <i class="fas fa-user-plus me-2"></i> Add Candidate
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_add">
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label for="add_job_id" class="form-label">Job ID</label>
                                            <select class="form-select" id="add_job_id" name="job_id" required>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_candidate_name" class="form-label">Candidate Name</label>
                                            <input type="text" class="form-control" id="add_candidate_name" name="candidate_name" placeholder="Enter full name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_gender" class="form-label">Gender</label>
                                            <select class="form-select" id="add_gender" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_age" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="add_age" name="age" placeholder="Enter age (min 18)" min="18">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label for="add_education" class="form-label">Education</label>
                                            <input type="text" class="form-control" id="add_education" name="education" placeholder="Enter education background">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_address" class="form-label">Address</label>
                                            <textarea class="form-control" id="add_address" name="address" placeholder="Enter full address"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="add_phone" name="phone" placeholder="Enter phone number">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="add_email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="add_email" name="email" placeholder="Enter valid email address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i> Add Candidate
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="edit_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="edit_modalLabel">
                    <i class="fas fa-user-edit me-2"></i> Edit Candidate
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_edit">
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label for="edit_job_id" class="form-label">Job ID</label>
                                            <select class="form-select" id="edit_job_id" name="job_id" required>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_candidate_name" class="form-label">Candidate Name</label>
                                            <input type="text" class="form-control" id="edit_candidate_name" name="candidate_name" placeholder="Enter full name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_gender" class="form-label">Gender</label>
                                            <select class="form-select" id="edit_gender" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_age" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="edit_age" name="age" placeholder="Enter age (min 18)" min="18">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label for="edit_education" class="form-label">Education</label>
                                            <input type="text" class="form-control" id="edit_education" name="education" placeholder="Enter education background">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_address" class="form-label">Address</label>
                                            <textarea class="form-control" id="edit_address" name="address" placeholder="Enter full address"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="edit_phone" name="phone" placeholder="Enter phone number">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="edit_email" name="email" placeholder="Enter valid email address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-1"></i> Save Changes
                        </button>
                    </div>
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
    $('#add_modal').on('shown.bs.modal', function() {
        initSelect2Ajax('#add_job_id', 'Select Job Opening', "<?= base_url('select_form/jobOpeningSelect') ?>", '#add_modal .modal-body');
    });

    $('#edit_modal').on('shown.bs.modal', function() {
        initSelect2Ajax('#edit_job_id', 'Select Job Opening', "<?= base_url('select_form/jobOpeningSelect') ?>", '#edit_modal .modal-body');
    });

    $('#add_modal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
        $(this).find('select').val(null).trigger('change');
        $(this).find('.error, .invalid-feedback').remove();
        $(this).find('.is-invalid').removeClass('is-invalid');
    });

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
        get_table();

        $(document).on('click', '.edit-btn', function() {
            $('#edit_id').val($(this).data('id'));

            var job_id = $(this).data('job_id');
            var job_name = $(this).data('job_name');
            var jobOption = new Option(job_name, job_id, true, true);
            $('#edit_job_id').append(jobOption).trigger('change');

            $('#edit_candidate_name').val($(this).data('candidate_name'));
            $('#edit_gender').val($(this).data('gender'));
            $('#edit_age').val($(this).data('age'));
            $('#edit_education').val($(this).data('education'));
            $('#edit_address').val($(this).data('address'));
            $('#edit_phone').val($(this).data('phone'));
            $('#edit_email').val($(this).data('email'));
            $('#edit_modal').modal('show');
        });

        $(document).on('click', '.delete-btn', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "Delete this Candidate!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Confirm!",
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
                preConfirm: () => {
                    return $.ajax({
                        url: "<?= base_url('recruitment/delete_candidate') ?>",
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
        if ($.fn.DataTable.isDataTable('#table_detail')) {
            $('#table_detail').DataTable().destroy();
            $('#table_detail tbody').empty();
        }

        $.ajax({
            url: "<?= base_url('recruitment/candidate_table'); ?>",
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
                filename: 'Candidate' + new Date().toISOString().slice(0, 10),
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

    $("#form_add").on("submit", function(e) {
        e.preventDefault();

        let dataForm = new FormData(this);

        Swal.fire({
            title: "Are you sure?",
            text: "Add this Candidate!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm!",
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: () => {
                return $.ajax({
                    url: "<?= base_url('recruitment/create_candidate') ?>",
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
                    $('#add_modal').modal('hide');
                    get_table();
                });
            }
        });
    });

    $("#form_edit").on("submit", function(e) {
        e.preventDefault();

        let dataForm = new FormData(this);

        Swal.fire({
            title: "Are you sure?",
            text: "Edit this Candidate!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm!",
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: () => {
                return $.ajax({
                    url: "<?= base_url('recruitment/update_candidate') ?>",
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