<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <div class="app-content">
        <div class="container-fluid">
            <section class="intro-section fade-in py-2 my-3">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center text-md-start intro-img-container">
                        <img src="<?= base_url('assets/img/4565.jpg'); ?>" alt="HRiS" class="img-fluid rounded-4 shadow-lg intro-img">
                    </div>
                    <div class="col-md-8 mt-3 mt-md-0 text-center text-md-start">
                        <h1 class="fw-bold text-gradient mb-2 intro-title">Human Resource Information System (HRiS)</h1>
                        <p class="text-muted fs-4" style="max-width: 900px; margin: 0 auto;">
                            Simplifying Work, Amplifying Potential
                        </p>
                    </div>
                </div>
            </section>

            <section class="feature-section fade-in py-2">
                <div class="row g-3 justify-content-center align-items-stretch">
                    <?php
                    $card = [
                        ['title' => 'Recruitment', 'desc' => 'Manage candidate sourcing and hiring process efficiently.', 'icon' => 'fa-user-plus', 'link' => 'recruitment/summary'],
                        ['title' => 'Onboarding', 'desc' => 'Streamline employee orientation and setup.', 'icon' => 'fa-handshake', 'link' => 'onboarding/summary'],
                        ['title' => 'Employee Info', 'desc' => 'Centralize employee data and personal records.', 'icon' => 'fa-id-badge', 'link' => 'employee_info/employee_managment'],
                        ['title' => 'Payroll', 'desc' => 'Automate salary, tax, and deduction processing.', 'icon' => 'fa-money-bill-wave', 'link' => 'recruitment/summary'],
                        ['title' => 'Time Sheet', 'desc' => 'Track employee attendance and working hours.', 'icon' => 'fa-clock', 'link' => 'attendance/attendance'],
                        ['title' => 'Performance', 'desc' => 'Evaluate employee growth and performance metrics.', 'icon' => 'fa-chart-line', 'link' => 'recruitment/summary'],
                    ];
                    ?>

                    <?php foreach ($card as $c): ?>
                        <div class="col-md-6 col-lg-4">
                            <a href="<?= base_url($c['link']); ?>" class="card-link">
                                <div class="card gradient-card split-card h-100">
                                    <div class="card-left d-flex justify-content-center align-items-center">
                                        <i class="fas <?= $c['icon']; ?> left-icon"></i>
                                    </div>
                                    <div class="card-right">
                                        <h5><?= $c['title']; ?></h5>
                                        <p><?= $c['desc']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

        </div>
    </div>
</main>

<style>
    /* Gradient Text */
    .text-gradient {
        background: linear-gradient(135deg, #5f0188, #6f1a94);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .fade-in {
        animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .intro-section {
        background: #f8f9fa;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        padding: 2rem 1rem;
        border: 2px solid #4d056bff;

    }

    .intro-img {
        max-height: 150px;
        transition: transform 0.4s ease;
    }

    .intro-img-container {
        display: flex;
        justify-content: flex-end;
    }

    .intro-title {
        font-size: 2.4rem;
        display: inline-block;
        border-bottom: 3px solid #5f0188;
        padding-bottom: 4px;
    }

    .intro-section p {
        font-size: 1.25rem;
    }

    .split-card {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        position: relative;
        border: 2px solid #4d056bff;
    }

    .split-card:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 12px 25px rgba(111, 26, 148, 0.35);
    }

    .card-left {
        flex: 0 0 100px;
        min-width: 100px;
        background: linear-gradient(135deg, #e7d6f7, #d3b8f0);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: inset -4px 0 6px rgba(0, 0, 0, 0.05);
        border-top-right-radius: 11px;
        border-bottom-right-radius: 11px;
        z-index: 2;
    }

    .left-icon {
        font-size: 40px;
        color: #5f0188;
    }

    .card-right {
        flex: 1 1 auto;
        background: linear-gradient(135deg, #5f0188, #6f1a94);
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 1rem;
        margin-left: -9px;
        z-index: 1;
    }

    .card-right h5 {
        color: #ffd700;
        font-weight: 600;
        font-size: 1.25rem;
        margin-bottom: 0.25rem;
    }

    .card-right p {
        font-size: 0.95rem;
        color: #f5f5f5;
        margin: 0;
    }

    .card-link {
        text-decoration: none;
    }

    @media (max-width:768px) {
        .split-card {
            flex-direction: row;
            flex-wrap: nowrap;
        }

        .card-left {
            flex: 0 0 80px;
            min-width: 80px;
        }

        .left-icon {
            font-size: 36px;
        }

        .card-right h5 {
            font-size: 1.1rem;
        }

        .card-right p {
            font-size: 0.85rem;
        }

        .intro-title {
            font-size: 1.3rem;
        }

        .intro-desc {
            font-size: 0.8rem;
        }

        .intro-img {
            max-height: 100px;
        }
    }
</style>
<?= $this->endSection() ?>