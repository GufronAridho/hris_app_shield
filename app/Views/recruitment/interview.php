<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-stretch g-2">

                <div class="col-md-4">
                    <div class="card h-100 custom-card-breadcrumb custom-card-slim d-flex align-items-left justify-content-center">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url("home/index"); ?>">Home</a></li>
                            <li class="breadcrumb-item">Recruitment</li>
                            <li class="breadcrumb-item active">Interview</li>
                        </ol>
                    </div>
                </div>

                <div class="col-md-8">
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
    /* main.app-main {
        background: url('<?= base_url("assets/img/silhouette-businesspeople-rushing-work.jpg"); ?>') no-repeat center center;
        background-size: cover;
        min-height: 100vh;
    } */

    .custom-card-purple {
        background: linear-gradient(135deg, #800080, #7030a0);
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        color: #fff;
    }

    .custom-card-breadcrumb {
        background: linear-gradient(135deg, #7030a0, #800080);
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    }

    /* .custom-card-purple,
    .custom-card-breadcrumb,
    .card-button,
    .card-table {
        background: rgba(128, 0, 128, 0.8);
        backdrop-filter: blur(8px);
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        color: #fff;
    } */

    .custom-card-slim {
        padding: 0.4rem 0.8rem !important;
    }

    .breadcrumb {
        background: transparent;
        margin-bottom: 0;
        font-size: 1.4rem;
        color: #ffc107;
    }

    .breadcrumb a {
        color: #ffc107;
        text-decoration: none;
    }

    .breadcrumb .active {
        color: #ffc107;
        font-weight: 600;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        content: "›";
        color: #ffc107;
    }

    .btn-split {
        display: flex;
        padding: 0;
        overflow: hidden;
        border-radius: 8px;
        border: 2px solid transparent;
        font-size: 12px;
    }

    .btn:hover {
        transform: translateY(-1px) scale(1.00);
    }

    .btn-split .btn-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4px 8px;
        color: #fff;
    }

    .btn-split .btn-text {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4px 8px;
        background-color: #fff;
        font-weight: bold;
    }

    .btn-primary .btn-text {
        color: #7030a0;
        border-left: 1px solid #7030a0;
    }

    .btn-info .btn-text {
        color: #7030a0;
        border-left: 1px solid #0dcaf0;
    }

    .btn-success .btn-text {
        color: #7030a0;
        border-left: 1px solid #198754;
    }

    .btn-warning .btn-text {
        color: #7030a0;
        border-left: 1px solid #ffc107;
    }

    .btn-secondary .btn-text {
        color: #7030a0;
        border-left: 1px solid #6c757d;
    }

    .btn-danger .btn-text {
        color: #7030a0;
        border-left: 1px solid #dc3545;
    }

    .btn-primary .btn-icon {
        background-color: #880fb3;
    }

    .btn-info .btn-icon {
        background-color: #0dcaf0;
    }

    .btn-success .btn-icon {
        background-color: #198754;
    }

    .btn-warning .btn-icon {
        background-color: #ffc107;
    }

    .btn-secondary .btn-icon {
        background-color: #6c757d;
    }

    .btn-danger .btn-icon {
        background-color: #dc3545;
    }

    .table-custom {
        border: 1px solid #dee2e6;
        border-collapse: separate;
        border-spacing: 0;
        overflow: hidden;
    }

    .table-custom th {
        background-color: #ffc107 !important;
        color: #1e1e1f;
        text-align: center;
        border: 1px solid #dee2e6;
        border-radius: 0;
    }

    .table-custom td {
        border: 1px solid #dee2e6;
        border-radius: 0;
        vertical-align: middle;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f5ff;
    }

    .table-hover tbody tr:hover {
        background-color: #efe6ff;
        cursor: pointer;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }
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