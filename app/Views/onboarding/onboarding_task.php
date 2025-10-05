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
                            <li class="breadcrumb-item active">Onboarding Task</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">


        </div>
        <!--end::App Content-->
</main>
<style>

</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {

    });
</script>
<?= $this->endSection() ?>