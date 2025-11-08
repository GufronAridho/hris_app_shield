    <?= $this->extend('shared/layout') ?>

    <?= $this->section('content') ?>
    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">
                <!-- Intro Section -->
                <section class="intro-section fade-in py-2 my-2">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/img/4565.jpg'); ?>" alt="HRiS" class="img-fluid rounded-3 shadow-sm intro-img">
                        </div>
                        <div class="col-md-8 text-center text-md-start mt-2 mt-md-0">
                            <h1 class="fw-bold text-gradient mb-1 intro-title">Human Resource Information System (HRiS)</h1>
                            <p class="text-muted fs-6 mb-0 intro-desc" style="max-width: 600px;">
                                Simplifying Work, Amplifying Potential
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Feature Section -->
                <section class="feature-section fade-in py-3">
                    <div class="row g-3 justify-content-center align-items-stretch text-center">
                        <?php
                        $card = [
                            ['title' => 'Check-In', 'desc' => 'Record your arrival time accurately.', 'icon' => 'fa-sign-in-alt', 'link' => 'attendance/check_in'],
                            ['title' => 'Check-Out', 'desc' => 'Log your departure time at the end of the day.', 'icon' => 'fa-sign-out-alt', 'link' => 'attendance/check_out'],
                        ];
                        ?>

                        <?php foreach ($card as $c): ?>
                            <div class="col-md-4 col-sm-6">
                                <a href="<?= base_url($c['link']); ?>" class="card-link">
                                    <div class="card d-flex align-items-center p-4 gradient-card">
                                        <div class="icon">
                                            <i class="fas <?= $c['icon']; ?>"></i>
                                        </div>
                                        <div class="card-text flex-grow-1 ps-3 text-start">
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
            background: linear-gradient(135deg, #5f0188, #9a4ef1);
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

        /* Intro */
        .intro-section {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 1rem;
            /* reduce space between intro & features */
        }

        .intro-img {
            max-height: 120px;
        }

        .intro-title {
            font-size: 1.6rem;
        }

        .intro-desc {
            font-size: 0.9rem;
        }

        /* Feature Section */
        .feature-section {
            border-top: 1px solid #eee;
            padding-top: 1.5rem;
        }

        .gradient-card {
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            color: #fff;
            background: linear-gradient(135deg, #5f0188, #6f1a94);
            height: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .gradient-card:hover {
            transform: translateY(-4px) scale(1.03);
            box-shadow: 0 12px 25px rgba(111, 26, 148, 0.35);
        }

        .gradient-card .icon {
            flex: 0 0 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 48px;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gradient-card:hover .icon {
            transform: scale(1.18);
        }

        .card-text h5 {
            color: #ffd700;
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }

        .card-text p {
            font-size: 0.95rem;
            color: #f5f5f5;
            margin: 0;
        }

        .card-link {
            text-decoration: none;
        }

        @media (max-width:768px) {
            .icon {
                font-size: 40px;
                flex: 0 0 60px;
            }

            .card-text h5 {
                font-size: 1.1rem;
            }

            .card-text p {
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