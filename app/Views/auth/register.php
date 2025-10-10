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

<body class="register-page bg-body-secondary">
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
                        <h3 class="fw-bold"><?= lang('Auth.register') ?></h3>
                        <p>Fill in your details to create an account</p>
                    </div>

                    <!-- Error / Success Messages -->
                    <?php if (session('error') !== null) : ?>
                        <div class="alert alert-danger"><?= esc(session('error')) ?></div>
                    <?php elseif (session('errors') !== null) : ?>
                        <div class="alert alert-danger">
                            <?php if (is_array(session('errors'))) : ?>
                                <?php foreach (session('errors') as $error) : ?>
                                    <?= esc($error) ?><br>
                                <?php endforeach ?>
                            <?php else : ?>
                                <?= esc(session('errors')) ?>
                            <?php endif ?>
                        </div>
                    <?php endif ?>

                    <?php if (session('message') !== null) : ?>
                        <div class="alert alert-success"><?= esc(session('message')) ?></div>
                    <?php endif ?>

                    <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <!-- Username -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control bg-light bg-opacity-75" id="floatingUsernameInput" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required>
                            <label for="floatingUsernameInput"><?= lang('Auth.username') ?></label>
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control bg-light bg-opacity-75" id="floatingEmailInput" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                            <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
                        </div>
                        <div class="row g-3">
                            <!-- Password -->
                            <div class="col-md-6 position-relative">
                                <div class="form-floating">
                                    <input type="password" class="form-control bg-light bg-opacity-75" id="passwordInput" name="password" placeholder="<?= lang('Auth.password') ?>" required>
                                    <label for="passwordInput"><?= lang('Auth.password') ?></label>
                                    <span class="position-absolute top-50 end-0 translate-middle-y me-3 toggle-password" style="cursor: pointer;">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Password Confirm -->
                            <div class="col-md-6 position-relative">
                                <div class="form-floating">
                                    <input type="password" class="form-control bg-light bg-opacity-75" id="passwordConfirmInput" name="password_confirm" placeholder="<?= lang('Auth.passwordConfirm') ?>" required>
                                    <label for="passwordConfirmInput"><?= lang('Auth.passwordConfirm') ?></label>
                                    <span class="position-absolute top-50 end-0 translate-middle-y me-3 toggle-password" style="cursor: pointer;">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid col-12 col-md-8 mx-auto mt-3">
                            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                        </div>

                        <p class="text-center"><?= lang('Auth.haveAccount') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.login') ?></a></p>
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
    <script>
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                const input = $(this).siblings('input');
                const icon = $(this).find('i');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
</body>

</html>