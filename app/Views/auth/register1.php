<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?? "Register" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('dist/adminLte/css/adminlte.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/plugins/fontawosome7/css/all.min.css') ?>">
</head>

<body class="login-page bg-body-secondary">
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center bg-image">
        <div class="login-box w-100 px-3" style="max-width: 1200px;">
            <div class="card shadow-lg d-flex flex-column flex-md-row custom-card">

                <!-- Left Section (Branding) -->
                <div class="col-12 col-md-5 branding-section d-flex flex-column justify-content-center align-items-center p-4">
                    <img src="<?= base_url('dist/adminLte/assets/img/AdminLTELogo.png'); ?>" alt="Company Logo" class="mb-3 img-fluid">
                    <h2 class="fw-bold text-warning text-center">Your App</h2>
                    <p class="text-warning text-center">Create a new account</p>
                </div>

                <!-- Right Section (Register Form) -->
                <div class="col-12 col-md-7 p-4 form-section d-flex flex-column justify-content-center">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Register</h3>
                        <p>Fill in your details to create an account</p>
                    </div>

                    <!-- Success/Error Flash Messages -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?php
                            $errors = session()->getFlashdata('error');
                            if (is_array($errors)) {
                                echo '<ul class="mb-0">';
                                foreach ($errors as $err) {
                                    echo '<li>' . esc($err) . '</li>';
                                }
                                echo '</ul>';
                            } else {
                                echo esc($errors);
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url("auth/register_account"); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-floating mb-3">
                            <input id="username" name="username" type="text"
                                class="form-control bg-light bg-opacity-75"
                                placeholder="Username"
                                value="<?= old('username') ?>" required>
                            <label for="username">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input id="name" name="name" type="text"
                                class="form-control bg-light bg-opacity-75"
                                placeholder="Full Name"
                                value="<?= old('name') ?>" required>
                            <label for="name">Full Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input id="email" name="email" type="email"
                                class="form-control bg-light bg-opacity-75"
                                placeholder="Email"
                                value="<?= old('email') ?>" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password" name="password" type="password"
                                class="form-control bg-light bg-opacity-75"
                                placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>
                    </form>

                    <p class="text-center mb-0">
                        <a href="<?= base_url('auth/index'); ?>" class="text-decoration-none">Already have an account? Sign In</a>
                    </p>
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
            background-color: #7030a0;
            border-color: #7030a0;
            padding: 0.75rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #800080;
            border-color: #800080;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
        }

        @media (max-width: 767.98px) {
            .branding-section {
                padding: 2rem 1rem;
            }

            .branding-section img {
                max-width: 60px;
            }

            .form-section {
                padding: 2rem 1rem;
            }
        }
    </style>

    <script src="<?= base_url('dist/plugins/jquery/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('dist/adminLte/js/adminlte.js') ?>"></script>
</body>

</html>