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
                            <li class="breadcrumb-item"><a href="<?= base_url("home/index"); ?>">Timesheet</a></li>
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
                                <th class="text-center">Position</th>
                                <th class="text-center">Applicant</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Hired</th>
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
<style>

</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        get_table();

        $(document).on('click', '.edit-btn', function() {

            const id = $(this).data('id');
            const checkCat = $(this).data('check_cat');
            const checkQuest = $(this).data('check_quest');

            $('#edit_id').val(id);
            $('#edit_check_cat').val(checkCat);
            $('#edit_check_quest').val(checkQuest);

            $('#edit_modal').modal('show');
        });
    });

    function get_table() {
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
            url: "<?= base_url('recruitment/summary_table'); ?>",
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
            if (index === 5) {
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
</script>
<?= $this->endSection() ?>