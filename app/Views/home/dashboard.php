<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard v2</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <!-- Example Card 1 -->
            <div class="card example-card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Example Card</h5>
                </div>
                <div class="card-body">
                    <p>This is an example card. You can use your brand colors for highlights, buttons, or borders.</p>
                    <button class="btn btn-primary">Action</button>
                </div>
            </div>

            <!-- Example Card 2 -->
            <div class="card example-card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Another Card</h5>
                </div>
                <div class="card-body">
                    <p>Another example with same styling. Gold accents can be used for icons or badges.</p>
                    <span class="badge bg-warning text-dark">New</span>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>

<style>
    /* Example card */
    .example-card {
        background-color: #ffffff;
        /* white card */
        border-left: 6px solid #7030a0;
        /* medium purple accent */
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .example-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .example-card .card-header {
        font-weight: 600;
        color: #800080;
        /* deep purple header */
    }

    .example-card .btn-primary {
        background-color: #880fb3;
        /* bright purple */
        border-color: #880fb3;
        color: #fff;
        border-radius: 8px;
        transition: background-color 0.2s, box-shadow 0.2s;
    }

    .example-card .btn-primary:hover {
        background-color: #7030a0;
        border-color: #7030a0;
        box-shadow: 0 4px 12px rgba(136, 15, 179, 0.3);
    }

    .breadcrumb a {
        color: #880fb3;
        text-decoration: none;
    }

    .breadcrumb .active {
        color: #800080;
        font-weight: 500;
    }

    .badge.bg-warning {
        background-color: #f8b310;
        color: #2a2a2a;
        font-weight: 600;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        // Optional JS for cards
    });
</script>
<?= $this->endSection() ?>