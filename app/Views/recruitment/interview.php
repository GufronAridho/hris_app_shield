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
                                <th class="text-center">Schedule</th>
                                <th class="text-center">Interviewer</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Remark</th>
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
<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="edit_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="edit_modalLabel">
                    <i class="fas fa-pen-to-square me-2"></i> Edit Interview
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_edit">
                <div class="modal-body">
                    <input type="hidden" id="edit_interview_id" name="id">
                    <input type="hidden" id="edit_candidate_id" name="candidate_id">
                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label for="edit_job_id" class="form-label">Job ID</label>
                                            <input type="text" class="form-control" id="edit_job_id" name="job_id" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_candidate_name" class="form-label">Candidate</label>
                                            <input type="text" class="form-control" id="edit_candidate_name" name="candidate_name" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_position" class="form-label">Position</label>
                                            <input type="text" class="form-control" id="edit_position" name="position" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_department" class="form-label">Departmment</label>
                                            <input type="text" class="form-control" id="edit_department" name="department" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_interviewer" class="form-label">Interviewer</label>
                                            <select class="form-select" id="edit_interviewer" name="interviewer" required>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_interview_date" class="form-label">Interview Date & Time</label>
                                            <input type="datetime-local" class="form-control" id="edit_interview_date" name="interview_date" required>
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
                                            <label for="edit_rating" class="form-label">Rating (0–10)</label>
                                            <input type="number" class="form-control" id="edit_rating" name="rating" placeholder="Enter rating score" min="0" max="10" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit_status" class="form-label">Status</label>
                                            <select id="edit_status" name="status" class="form-select" required>
                                                <option value="">Select Status</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Passed">Passed</option>
                                                <option value="Failed">Failed</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="edit_remarks" class="form-label">Remarks</label>
                                            <textarea id="edit_remarks" name="remarks" class="form-control" placeholder="Enter remarks or feedback"></textarea>
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

<div class="modal fade" id="view_modal" tabindex="-1" aria-labelledby="view_modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-custom-purple">
                <h5 class="modal-title" id="view_modalLabel">
                    <i class="fas fa-eye me-2"></i> View Interview Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-md-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label for="view_job_id" class="form-label">Job ID</label>
                                        <input type="text" class="form-control" id="view_job_id" name="job_id" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="view_candidate_name" class="form-label">Candidate</label>
                                        <input type="text" class="form-control" id="view_candidate_name" name="candidate_name" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="view_position" class="form-label">Position</label>
                                        <input type="text" class="form-control" id="view_position" name="position" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="view_department" class="form-label">Department</label>
                                        <input type="text" class="form-control" id="view_department" name="department" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="view_interviewer" class="form-label">Interviewer</label>
                                        <input type="text" class="form-control" id="view_interviewer" name="interviewer" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="view_interview_date" class="form-label">Interview Date & Time</label>
                                        <input type="text" class="form-control" id="view_interview_date" name="interview_date" readonly>
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
                                        <label for="view_rating" class="form-label">Rating (0–10)</label>
                                        <input type="text" class="form-control" id="view_rating" name="rating" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="view_status" class="form-label">Status</label>
                                        <input type="text" class="form-control" id="view_status" name="status" readonly>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="view_remarks" class="form-label">Remarks</label>
                                        <textarea id="view_remarks" name="remarks" class="form-control" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>


<style>

</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $('#edit_modal').on('shown.bs.modal', function() {
        initSelect2Ajax('#edit_interviewer', 'Select Interviewer', "<?= base_url('select_form/employeeSelect') ?>", '#edit_modal .modal-body');
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
            // var candidate_id = $(this).data('candidate_id');
            // var candidate_name = $(this).data('candidate_name');
            // var jobOption = new Option(candidate_name, candidate_id, true, true);
            // $('#edit_candidate_id').append(jobOption).trigger('change');
            $('#edit_interview_id').val($(this).data('id'));
            $('#edit_candidate_id').val($(this).data('candidate_id'));
            $('#edit_candidate_name').val($(this).data('candidate_name'));
            // $('#edit_interviewer').val($(this).data('interviewer'));
            var interviewer = $(this).data('interviewer');
            var interviewerOption = new Option(interviewer, interviewer, true, true);
            $('#edit_interviewer').append(interviewerOption).trigger('change');
            $('#edit_interview_date').val($(this).data('interview_date'));
            $('#edit_rating').val($(this).data('rating'));
            $('#edit_status').val($(this).data('status'));
            $('#edit_remarks').val($(this).data('remarks'));
            $('#edit_job_id').val($(this).data('job_id'));
            $('#edit_position').val($(this).data('position'));
            $('#edit_department').val($(this).data('department'));
            $('#edit_modal').modal('show');
        });

        $(document).on('click', '.view-btn', function() {
            $('#view_candidate_name').val($(this).data('candidate_name'));
            $('#view_interviewer').val($(this).data('interviewer'));
            $('#view_interview_date').val($(this).data('interview_date'));
            $('#view_rating').val($(this).data('rating'));
            $('#view_status').val($(this).data('status'));
            $('#view_remarks').val($(this).data('remarks'));
            $('#view_job_id').val($(this).data('job_id'));
            $('#view_position').val($(this).data('position'));
            $('#view_department').val($(this).data('department'));
            $('#view_modal').modal('show');
        });


        $(document).on('click', '.delete-btn', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "Delete this Interview!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Confirm!",
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
                preConfirm: () => {
                    return $.ajax({
                        url: "<?= base_url('recruitment/delete_interview') ?>",
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

        $(document).on('click', '.onboarding-btn', function() {
            var candidate_id = $(this).data('candidate_id');
            var candidate_name = $(this).data('candidate_name');
            var emp_id = $(this).data('emp_id');

            Swal.fire({
                title: "Are you sure?",
                text: `Create onboarding task for '${candidate_name}'!`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Confirm!",
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
                preConfirm: () => {
                    return $.ajax({
                        url: "<?= base_url('recruitment/create_onboarding') ?>",
                        type: "POST",
                        data: {
                            candidate_id: candidate_id,
                            emp_id: emp_id
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
            url: "<?= base_url('recruitment/interview_table'); ?>",
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
                filename: 'Interview' + new Date().toISOString().slice(0, 10),
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
            text: "Edit this Interview!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Confirm!",
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: () => {
                return $.ajax({
                    url: "<?= base_url('recruitment/update_interview') ?>",
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