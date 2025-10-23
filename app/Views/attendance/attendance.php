<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <div class="app-content">
        <div class="container py-4">
            <div class="row g-4 justify-content-center">

                <div class="col-md-4">
                    <a href="<?= base_url("attendance/check_in"); ?>" class="card-link">
                        <div class="card gradient-card card-recruitment">
                            <div class="card-body icon-container">
                                <i class="fas fa-sign-in-alt icon-large"></i>
                            </div>
                            <div class="card-footer card-label">CHECK-IN</div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="<?= base_url("attendance/check_out"); ?>" class="card-link">
                        <div class="card gradient-card card-onboarding">
                            <div class="card-body icon-container">
                                <i class="fas fa-sign-out-alt icon-large"></i>
                            </div>
                            <div class="card-footer card-label">CHECK-OUT</div>
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
        background: linear-gradient(135deg, #5f0188, #6f1a94);
    }

    .card-onboarding {
        background: linear-gradient(135deg, #5f0188, #6f1a94);
    }

    .card-link {
        text-decoration: none;
    }

    .app-main {
        justify-content: center;
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