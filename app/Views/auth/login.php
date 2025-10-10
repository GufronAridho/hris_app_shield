<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $title ?? "My App" ?></title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="<?php echo isset($title) ? $title : "My App"; ?>" />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <!-- Accessibility Features -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="<?= base_url('dist/adminLte/css/adminlte.css'); ?>" as="style" />

    <!-- Fonts -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous"
        media="print"
        onload="this.media='all'" />

    <!-- Core AdminLTE -->
    <link rel="stylesheet" href="<?= base_url('dist/adminLte/css/adminlte.css') ?>">

    <!-- Third Party Plugins -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
        crossorigin="anonymous" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('dist/plugins/fontawosome7/css/all.min.css') ?>">
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center bg-image">
        <div class="login-box w-100 px-3" style="max-width: 900px;">
            <div class="card shadow-lg d-flex flex-column flex-md-row custom-card">

                <!-- Left Section (Branding) -->
                <div class="col-12 col-md-5 branding-section d-flex flex-column justify-content-center align-items-center p-4">
                    <img src="<?= base_url('dist/adminLte/assets/img/AdminLTELogo.png'); ?>"
                        alt="Company Logo"
                        style="max-width:100px;"
                        class="mb-3 img-fluid">
                    <h2 class="fw-bold text-warning text-center">Your App</h2>
                    <p class="text-warning text-center">Welcome to the portal</p>
                </div>

                <!-- Right Section (Login Form) -->
                <div class="col-12 col-md-7 p-4 form-section d-flex flex-column justify-content-center">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold"><?= lang('Auth.login') ?></h3>
                        <p class="">Access your account</p>
                    </div>

                    <form action="<?= url_to('login') ?>" method="post">
                        <?= csrf_field() ?>

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

                        <!-- Email -->
                        <div class="input-group mb-3">
                            <div class="form-floating flex-grow-1">
                                <input type="email" class="form-control bg-light bg-opacity-75"
                                    id="floatingEmailInput"
                                    name="email"
                                    inputmode="email"
                                    autocomplete="email"
                                    placeholder="<?= lang('Auth.email') ?>"
                                    value="<?= old('email') ?>" required>
                                <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
                            </div>
                            <div class="input-group-text bg-light bg-opacity-75"><i class="fa fa-envelope"></i></div>
                        </div>

                        <!-- Password -->
                        <div class="input-group mb-3 position-relative">
                            <div class="form-floating flex-grow-1">
                                <input type="password" class="form-control bg-light bg-opacity-75"
                                    id="floatingPasswordInput"
                                    name="password"
                                    inputmode="text"
                                    autocomplete="current-password"
                                    placeholder="<?= lang('Auth.password') ?>" required>
                                <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
                            </div>
                            <div class="input-group-text bg-light bg-opacity-75 toggle-password" style="cursor: pointer;">
                                <i class="fa fa-eye"></i>
                            </div>
                        </div>

                        <!-- Remember me -->
                        <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                            <div class="form-check mb-3">
                                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
                                <label class="form-check-label"><?= lang('Auth.rememberMe') ?></label>
                            </div>
                        <?php endif; ?>

                        <div class="d-grid col-12 col-md-8 mx-auto mb-3">
                            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.login') ?></button>
                        </div>

                        <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                            <p class="text-center"><?= lang('Auth.forgotPassword') ?>
                                <a href="<?= url_to('magic-link') ?>"><?= lang('Auth.useMagicLink') ?></a>
                            </p>
                        <?php endif ?>

                        <?php if (setting('Auth.allowRegistration')) : ?>
                            <p class="text-center"><?= lang('Auth.needAccount') ?>
                                <a href="<?= url_to('register') ?>"><?= lang('Auth.register') ?></a>
                            </p>
                        <?php endif ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Background */
        .bg-image {
            background: url('<?= base_url("/assets/img/before-conference.jpg"); ?>') no-repeat center center;
            background-size: cover;
        }

        /* Card */
        .custom-card {
            border-radius: 16px;
            overflow: hidden;
            background: transparent !important;
        }

        /* Branding */
        .branding-section {
            backdrop-filter: blur(12px);
            background: rgba(64, 0, 96, 0.75);
            text-align: center;
        }

        .branding-section img {
            max-width: 80px;
        }

        /* Form */
        .form-section {
            backdrop-filter: blur(12px);
            background: rgba(230, 220, 250, 0.85);
        }

        /* Button */
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

        /* Mobile tweaks */
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
    <!-- /.login-box -->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
        src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->

    <!-- Core JS -->
    <script src="<?= base_url('dist/plugins/jquery/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('dist/adminLte/js/adminlte.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                const input = $(this).closest('.input-group').find('input');
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
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
</body>
<!--end::Body-->

</html>