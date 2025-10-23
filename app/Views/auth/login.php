<?= $this->extend('shared/layout_login') ?>
<?= $this->section('content') ?>
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
<?= $this->endSection() ?>