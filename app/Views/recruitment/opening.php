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
                                <th class="text-center">Position</th>
                                <th class="text-center">Department</th>
                                <th class="text-center">Location</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Posted Date</th>
                                <th class="text-center">Closed Date</th>
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
                    <i class="fas fa-square-plus me-2"></i> Create Job Opening
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_add">
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-md-7">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-12">
                                            <label for="add_job_id" class="form-label">Job ID</label>
                                            <input type="text" class="form-control" id="add_job_id" name="job_id" placeholder="Enter Job ID" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="add_position" class="form-label">Position</label>
                                            <input type="text" class="form-control" id="add_position" name="position" placeholder="Enter job position title" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="add_description" class="form-label">Description</label>
                                            <textarea class="form-control" id="add_description" name="description" rows="2"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="add_department" class="form-label">Department</label>
                                            <select class="form-select" id="add_department" name="department" required>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-12">
                                            <label for="add_location" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="add_location" name="location" placeholder="Enter job location" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="add_status" class="form-label">Status</label>
                                            <select class="form-select" id="add_status" name="status" required>
                                                <option value="">Select status</option>
                                                <option value="Open">Open</option>
                                                <option value="Closed">Closed</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="add_posted_date" class="form-label">Posted Date</label>
                                            <input type="date" class="form-control" id="add_posted_date" name="posted_date" placeholder="Select posted date" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="add_closing_date" class="form-label">Closed Date</label>
                                            <input type="date" class="form-control" id="add_closing_date" name="closing_date" placeholder="Select closing date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus me-1"></i> Add Master Data
                            </button>
                        </div>
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
                    <i class="fas fa-pen-to-square me-2"></i> Edit Job Opening
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_edit">
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-md-7">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <input type="hidden" id="edit_id" name="id">
                                        <div class="col-md-12">
                                            <label for="edit_job_id" class="form-label">Job ID</label>
                                            <input type="text" class="form-control" id="edit_job_id" name="job_id" placeholder="Enter Job ID" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="edit_position" class="form-label">Position</label>
                                            <input type="text" class="form-control" id="edit_position" name="position" placeholder="Enter position title" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="edit_description" class="form-label">Description</label>
                                            <textarea class="form-control" id="edit_description" name="description" rows="2"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="edit_department" class="form-label">Department</label>
                                            <select class="form-select" id="edit_department" name="department" required>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-12">
                                            <label for="edit_location" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="edit_location" name="location" placeholder="Enter job location" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="edit_status" class="form-label">Status</label>
                                            <select class="form-select" id="edit_status" name="status" required>
                                                <option value="">Select status</option>
                                                <option value="Open">Open</option>
                                                <option value="Closed">Closed</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="edit_posted_date" class="form-label">Posted Date</label>
                                            <input type="date" class="form-control" id="edit_posted_date" name="posted_date" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="edit_closing_date" class="form-label">Closed Date</label>
                                            <input type="date" class="form-control" id="edit_closing_date" name="closing_date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-1"></i> Save Changes
                            </button>
                        </div>
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
        initSelect2Ajax('#add_department', 'Select Department', "<?= base_url('select_form/deptSelect') ?>", '#add_modal .modal-body');
    });

    $('#edit_modal').on('shown.bs.modal', function() {
        initSelect2Ajax('#edit_department', 'Select Department', "<?= base_url('select_form/deptSelect') ?>", '#edit_modal .modal-body');
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
            $('#edit_job_id').val($(this).data('job_id'));
            $('#edit_position').val($(this).data('position'));
            var department = $(this).data('department')
            var departmentOption = new Option(department, department, true, true);
            $('#edit_department').append(departmentOption).trigger('change');
            $('#edit_location').val($(this).data('location'));
            $('#edit_status').val($(this).data('status'));
            $('#edit_posted_date').val($(this).data('posted_date'));
            $('#edit_closing_date').val($(this).data('closing_date'));
            $('#edit_description').val($(this).data('description'));

            $('#edit_modal').modal('show');
        });

        $(document).on('click', '.delete-btn', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "Delete this Job Opening!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Confirm!",
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
                preConfirm: () => {
                    return $.ajax({
                        url: "<?= base_url('recruitment/delete_job_opening') ?>",
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
            url: "<?= base_url('recruitment/opening_table'); ?>",
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
                    <td colspan="8" class="text-center text-black p-3">
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
            if (index === 7) {
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
            initComplete: function() {
                var api = this.api();
                api.columns().every(function(colIdx) {
                    $('input', $('.search-row th').eq(colIdx)).on('keyup change clear', function() {
                        api.column(colIdx).search(this.value).draw();
                    });
                });
            }
        });
    }

    $("#form_add").on("submit", function(e) {
        e.preventDefault();

        let dataForm = new FormData(this);

        Swal.fire({
            title: "Are you sure?",
            text: "Add this Job Opening!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm!",
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: () => {
                return $.ajax({
                    url: "<?= base_url('recruitment/create_job_opening') ?>",
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
            text: "Edit this Job Opening!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm!",
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: () => {
                return $.ajax({
                    url: "<?= base_url('recruitment/update_job_opening') ?>",
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