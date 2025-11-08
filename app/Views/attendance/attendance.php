<?= $this->extend('shared/layout') ?>

<?= $this->section('content') ?>
<main class="app-main">
    <div class="app-content">
        <div class="container-fluid">
            <section class="intro-section fade-in py-4 mt-3 mb-1 text-center">
                <h1 class="fw-bold text-gradient mb-2 intro-title">Employee Attendance Portal</h1>
                <p class="text-muted fs-4" style="max-width: 900px; margin: 0 auto;">
                    Track and manage your attendance effortlessly.
                </p>
            </section>
            <section class="feature-section fade-in py-4">
                <div class="row g-3 justify-content-center">
                    <?php
                    $card = [
                        ['title' => 'Check-In', 'desc' => 'Record your arrival time accurately.', 'icon' => 'fa-sign-in-alt', 'link' => 'attendance/check_in'],
                        ['title' => 'Check-Out', 'desc' => 'Log your departure time at the end of the day.', 'icon' => 'fa-sign-out-alt', 'link' => 'attendance/check_out'],
                    ];
                    ?>

                    <?php foreach ($card as $c): ?>
                        <div class="col-md-6">
                            <a href="<?= base_url($c['link']); ?>" class="card-link">
                                <div class="card gradient-card vertical-card h-100 w-100">
                                    <div class="card-top d-flex justify-content-center align-items-center">
                                        <i class="fas <?= $c['icon']; ?> top-icon"></i>
                                    </div>
                                    <div class="card-bottom text-center">
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
        border-radius: 16px;
        padding: 2rem 2.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
        border: 2px solid #4d056bff;
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

    .vertical-card {
        display: flex;
        flex-direction: column;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid #4d056bff;
        height: 100%;
        width: 100%;
    }

    .vertical-card:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 16px 35px rgba(111, 26, 148, 0.35);
    }

    .card-top {
        flex: 0 0 50%;
        background: linear-gradient(135deg, #e7d6f7, #d3b8f0);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .top-icon {
        font-size: 80px;
        color: #5f0188;
    }

    .card-bottom {
        flex: 1 1 auto;
        background: linear-gradient(135deg, #5f0188, #6f1a94);
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 1.5rem;
    }

    .card-bottom h5 {
        color: #ffd700;
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .card-bottom p {
        font-size: 1rem;
        color: #f5f5f5;
        margin: 0;
    }

    .card-link {
        text-decoration: none;
    }

    @media (max-width:768px) {
        .top-icon {
            font-size: 60px;
        }

        .card-bottom h5 {
            font-size: 1.2rem;
        }

        .card-bottom p {
            font-size: 0.9rem;
        }

        .intro-section h1 {
            font-size: 2rem;
        }

        .intro-section p {
            font-size: 1rem;
        }
    }
</style>
<?= $this->endSection() ?>