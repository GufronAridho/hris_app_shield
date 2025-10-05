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
                            <li class="breadcrumb-item active">Document Checklist</li>
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
            <div class="card shadow w-100 custom-card-purple">
                <div class="card-body p-3">
                    <div class="row align-items-stretch g-2">
                        <div class="col-md-9">
                            <table class="table custom-table">
                                <tbody>
                                    <tr>
                                        <td class="label-cell">
                                            <span class="fw-bold">Label 1</span>
                                        </td>

                                        <td class="input-cell">
                                            <div class="d-flex">
                                                <input type="checkbox" class="form-check-input custom-checkbox" title="Checklist">
                                                <input type="file" class="form-control form-control-sm" title="Upload File">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-cell">
                                            <span class="fw-bold">Label 2</span>
                                        </td>

                                        <td class="input-cell">
                                            <div class="d-flex">
                                                <input type="checkbox" class="form-check-input custom-checkbox" title="Checklist">
                                                <input type="file" class="form-control form-control-sm" title="Upload File">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-3 d-flex justify-content-center">
                            <div class="card shadow-sm onboarding-card">
                                <div class="section-header">Employee</div>
                                <div class="section-body">XXX</div>
                                <hr class="section-divider">

                                <div class="section-header">Head of Department</div>
                                <div class="section-body">XXX</div>
                                <hr class="section-divider">

                                <div class="section-header">HR</div>
                                <div class="section-body">XXX</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>

    .onboarding-card {
        background: transparent;
        border: none;
        width: 100%;
        text-align: center;
        border-radius: 20px;
    }

    .onboarding-card .section-header {
        background: #7030a0;
        color: #f8b310;
        font-weight: 600;
        padding: 0.5rem;
        border-radius: 12px 12px 0 0;
    }

    .onboarding-card .section-body {
        background: #f2f0f8;
        color: #f8b310;
        padding: 0.75rem;
        border-radius: 0 0 12px 12px;
    }

    .onboarding-card .section-divider {
        margin: 0.25rem 0;
    }

    .custom-table {
        border-spacing: 0.5rem 0.5rem;
        border-collapse: separate;
    }

    .label-cell {
        background-color: #f2f0f8 !important;
        padding: 0.5rem;
        border-radius: 0.5rem;
        width: 70%;
    }

    .input-cell {
        background-color: #f2f0f8 !important;
        padding: 0.5rem;
        border-radius: 0.5rem;
    }

    .input-cell .d-flex {
        gap: 0.5rem;
        align-items: center;
    }

    .custom-checkbox {
        transform: scale(1.7);
        margin-left: 0.5rem;
        margin-right: 0.3rem;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {

    });
</script>
<?= $this->endSection() ?>