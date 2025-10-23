<?= $this->extend('shared/layout_login') ?>
<?= $this->section('content') ?>

<div class="container-fluid vh-100 d-flex align-items-center justify-content-center bg-image">
    <div class="login-box w-100 px-3" style="max-width: 770px;">
        <div class="card shadow-lg d-flex flex-column flex-md-row custom-card">
            <!-- Left Section (Branding) -->
            <div class="col-12 col-md-5 branding-section d-flex flex-column justify-content-center align-items-center p-4">
                <img src="<?= base_url('dist/adminLte/assets/img/AdminLTELogo.png'); ?>"
                    alt="Company Logo"
                    style="max-width:100px;"
                    class="mb-3 img-fluid">
                <h2 class="fw-bold text-warning text-center">Your App</h2>
                <p class="text-warning text-center">Attendance Portal</p>
            </div>

            <!-- Right Section (Check-In Form) -->
            <div class="col-12 col-md-7 p-4 form-section d-flex flex-column justify-content-center">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-dark">Check-In</h3>
                    <p class="">Enter your Employee ID to record attendance</p>
                </div>

                <form method="post" action="<?= base_url('attendance/emp_check_in'); ?>" autocomplete="off">
                    <?= csrf_field() ?>

                    <?php if (session('error')) : ?>
                        <div class="alert alert-danger"><?= esc(session('error')) ?></div>
                    <?php elseif (session('message')) : ?>
                        <div class="alert alert-success"><?= esc(session('message')) ?></div>
                    <?php endif ?>

                    <div class="input-group mb-4">
                        <div class="form-floating flex-grow-1">
                            <input type="text" class="form-control bg-light bg-opacity-75 text-center fs-5 fw-semibold"
                                id="emp_id"
                                name="emp_id"
                                placeholder="Employee ID"
                                value="<?= old('emp_id') ?>"
                                autofocus
                                required>
                            <label for="emp_id">Employee ID</label>
                        </div>
                        <div class="input-group-text bg-light bg-opacity-75">
                            <i class="fa fa-id-card"></i>
                        </div>
                    </div>

                    <div class="d-grid col-12 col-md-8 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-sign-in-alt me-2"></i> Check In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-image {
        background: url('<?= base_url("/assets/img/before-conference.jpg"); ?>') no-repeat center center;
        background-size: cover;
    }

    .custom-card {
        border-radius: 16px;
        overflow: hidden;
        background: transparent !important;
        min-height: 400px;
    }

    .branding-section {
        backdrop-filter: blur(12px);
        background: rgba(64, 0, 96, 0.75);
        text-align: center;
    }

    .form-section {
        backdrop-filter: blur(12px);
        background: rgba(230, 220, 250, 0.85);
    }

    .btn-primary {
        background-color: #5f0188;
        border-color: #5f0188;
        padding: 0.75rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background-color: #3d005b;
        border-color: #3d005b;
    }

    .form-control {
        border-radius: 8px;
    }

    .input-group-text {
        border-radius: 0 8px 8px 0;
    }
</style>

<?= $this->endSection() ?>