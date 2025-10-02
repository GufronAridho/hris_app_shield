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
                            <li class="breadcrumb-item">Onboarding</li>
                            <li class="breadcrumb-item active">Profile</li>
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
    .custom-card-breadcrumb {
        background: linear-gradient(135deg, #7030a0, #800080);
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
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

    .custom-card-slim {
        padding: 0.4rem 0.8rem !important;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {

    });
</script>
<?= $this->endSection() ?>