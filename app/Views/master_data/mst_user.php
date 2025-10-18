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
                            <li class="breadcrumb-item"><a href="<?= base_url("home/index"); ?>">Master Data</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card h-100 custom-card-purple custom-card-slim card-button">
                        <div class="h-100 d-flex justify-content-end align-items-center gap-2 flex-wrap">

                            <button class="btn btn-split btn-primary btn-sm">
                                <span class="btn-icon"><i class="fa fa-plus"></i></span>
                                <span class="btn-text">Primary</span>
                            </button>

                            <button class="btn btn-split btn-info btn-sm">
                                <span class="btn-icon"><i class="fa fa-plus"></i></span>
                                <span class="btn-text">Info</span>
                            </button>

                            <button class="btn btn-split btn-success btn-sm">
                                <span class="btn-icon"><i class="fa fa-plus"></i></span>
                                <span class="btn-text">Success</span>
                            </button>

                            <button class="btn btn-split btn-warning btn-sm">
                                <span class="btn-icon"><i class="fa fa-plus"></i></span>
                                <span class="btn-text">Warning</span>
                            </button>

                            <button class="btn btn-split btn-secondary btn-sm">
                                <span class="btn-icon"><i class="fa fa-plus"></i></span>
                                <span class="btn-text">Secondary</span>
                            </button>

                            <button class="btn btn-split btn-danger btn-sm">
                                <span class="btn-icon"><i class="fa fa-plus"></i></span>
                                <span class="btn-text">Danger</span>
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
                                <th style="width:40%;">Check Category</th>
                                <th style="width:40%;">Question</th>
                                <th style="width:20%; text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="table_body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>

<style>

</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        get_table();
    });

    function get_table() {
        if ($.fn.DataTable.isDataTable('#table_detail')) {
            $('#table_detail').DataTable().destroy();
            $('#table_detail tbody').empty();
        }
        $.ajax({
            url: "<?= base_url('master_data/checklist_table'); ?>",
            type: "GET",
            dataType: "html",
            success: function(res) {
                $('#table_body').html(res);
                initializeDataTable('table_detail');
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                $('#table_body').html(`
                <tr>
                    <td colspan="3" class="text-center text-black p-3">
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
            if (index === 2) {
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
</script>
<?= $this->endSection() ?>