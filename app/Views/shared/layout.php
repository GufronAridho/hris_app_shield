<?php

use Config\Menu;

$module = service('uri')->getSegment(1);
$menu_items = Menu::$menus[$module] ?? [];

?>
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

    <meta name="csrf-token" content="<?= csrf_hash(); ?>">
    <meta name="csrf-header" content="<?= csrf_token(); ?>">

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

    <!-- Custom Plugins -->
    <link rel="stylesheet" href="<?= base_url('dist/plugins/DataTables/datatables.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('dist/plugins/select2-4.0.13/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/plugins/sweetalert2/dist/sweetalert2.min.css') ?>">

</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg sidebar-mini bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container-fluid flex-column px-0">

                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between w-100 py-2 px-3 layout-top">

                    <div class="d-none d-md-flex align-items-center mb-2 mb-md-0">
                        <a href="<?= base_url("home/index"); ?>" style="text-decoration: none;">
                            <img src="<?= base_url('dist/adminLte/assets/img/AdminLTELogo.png'); ?>" alt="Logo" class="me-2" style="height: 42px;">
                            <span class="fw-bold fs-5 text-warning">Your Company</span>
                        </a>
                    </div>

                    <div class="d-none d-md-flex align-items-center mb-2 mb-md-0">
                        <i class="fas fa-cubes me-2 fa-2x text-white"></i>
                        <div class="d-flex flex-column">
                            <span class="fw-semibold fs-5 text-warning">HRiS</span>
                            <small class="text-warning">Human Resource Information System</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center flex-wrap">
                        <span class="me-1 text-warning fw-semibold"><?= $username = auth()->user()->username; ?></span>
                        <i class="fas fa-user-circle fa-2x text-white me-2"></i>

                        <div class="dropdown me-2">
                            <button class="btn btn-sm btn-outline-warning rounded-pill layout-btn" data-bs-toggle="dropdown">
                                <i class="fas fa-cog"></i> Settings
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end layout-dropdown">
                                <li><a class="dropdown-item layout-dropdown-item" href="#"><i class="fas fa-key me-2"></i>Change Password</a></li>
                                <li><a class="dropdown-item layout-dropdown-item" href="#"><i class="fas fa-user-cog me-2"></i>Profile Settings</a></li>
                            </ul>
                        </div>

                        <a href="#" class="btn btn-sm btn-outline-warning rounded-pill me-2 layout-btn">
                            <i class="fas fa-question-circle me-1"></i> Help
                        </a>

                        <a href="<?= url_to('logout') ?>" class="btn btn-sm btn-outline-warning rounded-pill layout-btn">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </a>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between w-100 py-2 px-3 layout-bottom">
                    <button class="btn btn-sm btn-outline-light d-md-none rounded" type="button" data-bs-toggle="collapse" data-bs-target="#bottomNavMenu">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse d-md-flex flex-grow-1" id="bottomNavMenu">
                        <ul class="nav w-100 justify-content-center">
                            <?php foreach ($menu_items as $item): ?>
                                <li class="nav-item mx-1">
                                    <a class="nav-link layout-link <?= (uri_string() == $item['url']) ? 'active' : '' ?>" href="<?= base_url($item['url']) ?>">
                                        <?php if (!empty($item['icon'])): ?>
                                            <i class="<?= $item['icon'] ?> layout-icon"></i>
                                        <?php endif; ?>
                                        <?= $item['label'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!--end::Header-->
        <!--begin::Main-->
        <?= $this->renderSection('content') ?>
        <!--end::Main-->
        <!--begin::Footer-->
        <!-- <footer class="app-footer layout-footer d-flex justify-content-between align-items-center px-3 py-1">
            <div>
                <strong>Copyright &copy; 2014-2025&nbsp;</strong> All rights reserved.
            </div>
            <div class="d-none d-sm-block">
                Anything you want
            </div>
        </footer> -->
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <style>
        .app-header.navbar {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        .layout-top {
            background: #1e1e1f;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
        }

        .layout-bottom {
            background: #800080;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
        }

        .layout-link {
            color: #f8f9fa !important;
            font-weight: 500;
            border-radius: 12px;
            padding: 8px 16px;
            transition: all 0.25s ease;
            position: relative;
        }

        .layout-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffd700 !important;
            transform: translateY(-2px);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        .layout-link.active {
            background-color: #7030a0 !important;
            color: #fff !important;
            font-weight: 600;
        }

        .layout-link.active::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 10%;
            width: 80%;
            height: 4px;
            background: #efb11f;
            border-radius: 4px;
            box-shadow: 0 0 6px #efb11f;
        }

        .layout-dropdown {
            border-radius: 12px;
            background-color: #2a2a2a;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .layout-dropdown-item {
            color: #efb11f !important;
            transition: background 0.2s;
        }

        .layout-dropdown-item:hover {
            background-color: #3a3a3a;
            color: #ffd700 !important;
        }

        .layout-btn {
            border-radius: 20px;
            transition: all 0.3s;
        }

        .layout-btn:hover {
            background-color: #ffd700;
            color: #1e1e1f !important;
            box-shadow: 0 0 8px #ffd700;
        }

        .app-main {
            background-color: #f2f0f8;
            color: #2a2a2a;
        }
    </style>
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

    <!-- UI & Icons -->
    <script src="<?= base_url('dist/plugins/fontawosome7/js/all.min.js') ?>"></script>

    <!-- Plugins -->
    <script src="<?= base_url('dist/plugins/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('dist/plugins/select2-4.0.13/js/select2.full.min.js') ?>"></script>
    <script src="<?= base_url('dist/plugins/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>

    <script>
        $(function() {
            // Before sending any AJAX request, attach CSRF
            $.ajaxSetup({
                beforeSend: function(xhr, settings) {
                    let csrfToken = $('meta[name="csrf-token"]').attr('content');
                    let csrfHeader = $('meta[name="csrf-header"]').attr('content');

                    if (settings.type === 'POST' || settings.type === 'PUT' || settings.type === 'DELETE') {
                        if (typeof settings.data === 'string') {
                            settings.data += '&' + csrfHeader + '=' + csrfToken;
                        } else if (typeof settings.data === 'object') {
                            settings.data = settings.data || {};
                            settings.data[csrfHeader] = csrfToken;
                        }
                    }
                },
                complete: function(xhr) {
                    // If server sends new token in JSON, update it
                    try {
                        let response = JSON.parse(xhr.responseText);
                        if (response.csrfHash) {
                            $('meta[name="csrf-token"]').attr('content', response.csrfHash);
                        }
                    } catch (e) {
                        // ignore non-JSON responses
                    }
                }
            });
        });
    </script>

    <?= $this->renderSection('script'); ?>
    <!--end::Script-->
</body>
<!--end::Body-->

</html>