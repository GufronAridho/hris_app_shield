<?= $this->extend('shared/layout_login') ?>
<?= $this->section('content') ?>
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center bg-image">
    <div class="login-box w-100 px-3" style="max-width: 800px;">
        <div class="card shadow-lg d-flex flex-column flex-md-row custom-card">

            <div class="col-12 col-md-5 branding-section d-flex flex-column justify-content-center align-items-center p-3">
                <img src="<?= base_url('assets/img/logo.png'); ?>"
                    alt="Company Logo"
                    class="mb-3 img-fluid branding-logo">
                <h2 class="fw-bold text-warning text-center">HRiS</h2>
                <p class="text-warning text-center">Welcome to the portal</p>
            </div>
            <div class="col-12 col-md-7 p-3 form-section d-flex flex-column justify-content-center">
                <div class="text-center">
                    <h3 class="fw-bold"><?= lang('Auth.login') ?></h3>
                    <p>Access your account</p>
                </div>

                <form action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <?php if (session('error')) : ?>
                        <div class="alert alert-danger"><?= esc(session('error')) ?></div>
                    <?php elseif (session('errors')) : ?>
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

                    <?php if (session('message')) : ?>
                        <div class="alert alert-success"><?= esc(session('message')) ?></div>
                    <?php endif ?>
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
                        <div class="input-group-text bg-light bg-opacity-75">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>

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
                    <div class="d-grid col-12 col-md-8 mx-auto mb-3">
                        <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.login') ?></button>
                    </div>

                    <?php if (setting('Auth.allowRegistration')) : ?>
                        <p class="text-center">
                            <?= lang('Auth.needAccount') ?>
                            <a href="<?= url_to('register') ?>"><?= lang('Auth.register') ?></a>
                        </p>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-image {
        background: url('<?= base_url("/assets/img/before-conference.jpg"); ?>') no-repeat center center/cover;
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

    .branding-logo {
        max-width: 80px;
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
        transition: 0.3s;
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

    @media (max-width: 767.98px) {
        .branding-section {
            padding: 2rem 1rem;
        }

        .branding-logo {
            max-width: 60px;
        }

        .form-section {
            padding: 2rem 1rem;
        }
    }
</style>
<?= $this->endSection() ?>