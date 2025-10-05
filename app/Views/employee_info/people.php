<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="card shadow-sm rounded-3 card-table">
                <div class="card-header custom-card-header">
                    <div class="d-flex align-items-left justify-content-left">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url("home/index"); ?>">Recruitment</a></li>
                            <li class="breadcrumb-item active">Interview</li>
                        </ol>
                    </div>
                </div>
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body p-4">

                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>

<style>
    .custom-card-header {
        background: #7030a0 !important;
        color: #ffc107 !important;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        initializeDataTable('table_detail');
    });
</script>
<?= $this->endSection() ?>