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
                            <li class="breadcrumb-item active">Candidate</li>
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
                                <th class="text-center">No</th>
                                <th>Colomn1</th>
                                <th>Colomn2</th>
                                <th>Colomn3</th>
                                <th>Colomn4</th>
                                <th>Colomn5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Colomn1</td>
                                <td>Colomn2</td>
                                <td>Colomn3</td>
                                <td>Colomn4</td>
                                <td>Colomn5</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>Colomn1</td>
                                <td>Colomn2</td>
                                <td>Colomn3</td>
                                <td>Colomn4</td>
                                <td>Colomn5</td>
                            </tr>
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
        initializeDataTable('table_detail');
    });

    function initializeDataTable(tableId) {
        $('#' + tableId).DataTable({
            pageLength: 10,
            lengthChange: true,
            searching: true,
            ordering: true,
            scrollX: true,
        });
    }
</script>
<?= $this->endSection() ?>