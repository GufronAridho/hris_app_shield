<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <div class="app-content">
        <div class="container py-4">
            <div class="row g-4 justify-content-center">

                <div class="col-md-4">
                    <a href="<?= base_url("recruitment/summary"); ?>" class="card-link">
                        <div class="card gradient-card card-recruitment">
                            <div class="card-body icon-container">
                                <i class="fas fa-user-plus icon-large"></i>
                            </div>
                            <div class="card-footer card-label">RECRUITMENT</div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="<?= base_url("onboarding/summary"); ?>" class="card-link">
                        <div class="card gradient-card card-onboarding">
                            <div class="card-body icon-container">
                                <i class="fas fa-handshake icon-large"></i>
                            </div>
                            <div class="card-footer card-label">ONBOARDING</div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="<?= base_url("recruitment/summary"); ?>" class="card-link">
                        <div class="card gradient-card card-employee">
                            <div class="card-body icon-container">
                                <i class="fas fa-id-badge icon-large"></i>
                            </div>
                            <div class="card-footer card-label">EMPLOYEE INFO</div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="<?= base_url("recruitment/summary"); ?>" class="card-link">
                        <div class="card gradient-card card-payroll">
                            <div class="card-body icon-container">
                                <i class="fas fa-money-bill-wave icon-large"></i>
                            </div>
                            <div class="card-footer card-label">PAYROLL</div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="<?= base_url("recruitment/summary"); ?>" class="card-link">
                        <div class="card gradient-card card-timesheet">
                            <div class="card-body icon-container">
                                <i class="fas fa-clock icon-large"></i>
                            </div>
                            <div class="card-footer card-label">TIME SHEET ATTENDANCE</div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="<?= base_url("recruitment/summary"); ?>" class="card-link">
                        <div class="card gradient-card card-performance">
                            <div class="card-body icon-container">
                                <i class="fas fa-chart-line icon-large"></i>
                            </div>
                            <div class="card-footer card-label">PERFORMANCE</div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</main>

<style>
    /* General Card Styles */
    .gradient-card {
        border-radius: 16px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
        color: #fff;
        padding: 1rem;
    }

    .gradient-card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
    }

    .icon-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 120px;
    }

    .icon-large {
        font-size: 65px;
        transition: transform 0.3s ease;
    }

    .gradient-card:hover .icon-large {
        transform: scale(1.2) rotate(10deg);
    }

    .card-footer.card-label {
        font-size: 25px;
        background: rgba(0, 0, 0, 0.25);
        border-radius: 50px;
        width: fit-content;
        margin: 5px auto;
        padding: 5px 15px;
        font-weight: bold;
        color: #ffc107;
    }

    .card-recruitment {
        background: linear-gradient(135deg, #800080, #7030a0);
    }

    .card-onboarding {
        background: linear-gradient(135deg, #45083a, #880fb3);
    }

    .card-employee {
        background: linear-gradient(135deg, #7030a0, #800080);
    }

    .card-payroll {
        background: linear-gradient(135deg, #880fb3, #7030a0);
    }

    .card-timesheet {
        background: linear-gradient(135deg, #7030a0, #45083a);
    }

    .card-performance {
        background: linear-gradient(135deg, #45083a, #880fb3);
    }

    .card-link {
        text-decoration: none;
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