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

                <div class="d-flex flex-row align-items-center w-100 py-2 px-3 layout-top">

                    <div class="d-md-flex align-items-center mb-2 mb-md-0 flex-fill">
                        <a href="<?= base_url("home/index"); ?>" class="layout-logo d-flex align-items-center text-decoration-none">
                            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo Icon" class="logo-icon me-2">
                            <img src="<?= base_url('assets/img/logo-text.png'); ?>" alt="Logo Text" class="logo-text">
                        </a>
                    </div>

                    <div class="d-none d-md-flex align-items-center mb-2 mb-md-0 flex-fill">
                        <i class="fas fa-cubes me-2 fa-2x text-white"></i>
                        <div class="d-flex flex-column">
                            <span class="fw-semibold fs-5 text-warning">HRiS</span>
                            <small class="text-warning">Human Resource Information System</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center flex-wrap mb-2 mb-md-0 flex-fill justify-content-end">
                        <div class="dropdown me-2">
                            <a class="d-flex align-items-center text-white fw-semibold text-decoration-none" href="#" role="button" data-bs-toggle="dropdown">
                                <div class="me-2 text-end">
                                    <div><?= $layout_emp['name'] ?? auth()->user()->username; ?></div>
                                    <small class="text-light"><?= $layout_emp['emp_id'] ?? 'Employee ID'; ?></small>
                                </div>
                                <img src="<?= base_url('assets/profile/' . ($layout_emp['photo'] ?? 'avatar5.png')); ?>"
                                    alt="User Image"
                                    class="rounded-circle layout-profile-img">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end layout-dropdown">
                                <li><a class="dropdown-item layout-dropdown-item" href="#"><i class="fas fa-key me-2"></i>Change Password</a></li>
                                <li><a class="dropdown-item layout-dropdown-item" href="<?= base_url('master_data/mst_user') ?>"><i class="fas fa-user-cog me-2"></i>Master Data</a></li>
                                <li><a class="dropdown-item layout-dropdown-item" href="<?= url_to('logout') ?>"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </div>
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
                                    <a class="nav-link layout-link <?= (strpos(uri_string(), $item['url']) === 0) ? 'active' : '' ?>" href="<?= base_url($item['url']) ?>">
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
            background: #5f0188;
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
            background: #ffd700;
            border-radius: 4px;
            box-shadow: 0 0 6px #ffd700;
        }

        .layout-dropdown {
            border-radius: 12px;
            background-color: #2a2a2a;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .layout-dropdown-item {
            color: #ffd700 !important;
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

        .layout-logo img {
            height: auto;
            max-height: 32px;
            width: auto;
            transition: all 0.3s ease;
        }

        .app-main {
            background-color: #f2f0f8;
            color: #2a2a2a;
        }

        .layout-profile-img {
            width: 3rem;
            height: 3rem;
            object-fit: cover;
        }

        .custom-card-purple {
            background: #5f0188;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            color: #f2f0f8;
        }

        .modal-custom-purple {
            background: #5f0188eb;
            color: #ffd700;
        }

        .custom-card-breadcrumb {
            background: #5f0188eb;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }


        /* .custom-card-purple,
    .custom-card-breadcrumb,
    .card-button,
    .card-table {
        background: rgba(128, 0, 128, 0.8);
        backdrop-filter: blur(8px);
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        color: #fff;
    } */

        .custom-card-slim {
            padding: 0.4rem 0.8rem !important;
        }

        .breadcrumb {
            background: transparent;
            margin-bottom: 0;
            font-size: 1.2rem;
            color: #ffd700;
        }

        .breadcrumb a {
            color: #ffd700;
            text-decoration: none;
        }

        .breadcrumb .active {
            color: #ffd700;
            font-weight: 600;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            content: "›";
            color: #ffd700;
        }

        .btn-split {
            display: flex;
            padding: 0;
            overflow: hidden;
            border-radius: 8px;
            border: 2px solid transparent;
            font-size: 14px;
        }

        .btn-split .btn-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px 8px;
            color: #f2f0f8;
        }

        .btn-split .btn-text {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px 8px;
            background-color: #f2f0f8;
            /* font-weight: bold; */
        }

        .btn:hover {
            transform: translateY(-1px) scale(1.00);
        }

        .btn-primary .btn-text {
            color: #5f0188eb;
            border-left: 1px solid #5f0188eb;
        }

        .btn-info .btn-text {
            color: #5f0188eb;
            border-left: 1px solid #0dcaf0;
        }

        .btn-success .btn-text {
            color: #5f0188eb;
            border-left: 1px solid #198754;
        }

        .btn-warning .btn-text {
            color: #5f0188eb;
            border-left: 1px solid #ffd700;
        }

        .btn-secondary .btn-text {
            color: #5f0188eb;
            border-left: 1px solid #6c757d;
        }

        .btn-danger .btn-text {
            color: #5f0188eb;
            border-left: 1px solid #dc3545;
        }

        .btn-primary .btn-icon {
            background-color: #5f0188eb;
        }

        .btn-info .btn-icon {
            background-color: #0dcaf0;
        }

        .btn-success .btn-icon {
            background-color: #198754;
        }

        .btn-warning .btn-icon {
            background-color: #ffd700;
        }

        .btn-secondary .btn-icon {
            background-color: #6c757d;
        }

        .btn-danger .btn-icon {
            background-color: #dc3545;
        }

        .table-custom {
            border: 1px solid #dee2e6;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
        }

        .table-custom th {
            background-color: #ffd700 !important;
            color: #1e1e1f;
            text-align: center;
            border: 1px solid #dee2e6;
            border-radius: 0;
        }

        .table-custom td {
            border: 1px solid #dee2e6;
            border-radius: 0;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f5ff;
        }

        .table-hover tbody tr:hover {
            background-color: #efe6ff;
        }

        @media (max-width: 768px) {
            .layout-logo .logo-icon {
                max-height: 32px;
            }

            .layout-logo .logo-text {
                max-height: 32px;
            }
        }

        @media (max-width: 480px) {
            .layout-logo {
                justify-content: center;
            }

            .layout-logo .logo-text {
                display: none;
            }

            .layout-logo .logo-icon {
                max-height: 28px;
            }
        }

        #add_modal .select2-container--default .select2-selection--single,
        #edit_modal .select2-container--default .select2-selection--single {
            height: calc(1.5em + 0.75rem + 2px);
        }

        #add_modal .select2-container--default .select2-selection--single .select2-selection__rendered,
        #edit_modal .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: calc(1.5em + 0.75rem);
        }

        #add_modal .select2-container--default .select2-selection--single .select2-selection__arrow,
        #edit_modal .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: calc(1.5em + 0.75rem + 2px);
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
            $.ajaxSetup({
                beforeSend: function(xhr, settings) {
                    if (settings.type.toUpperCase() === "POST") {
                        let token = $('meta[name="csrf-token"]').attr("content");
                        let header = $('meta[name="csrf-header"]').attr("content");
                        xhr.setRequestHeader(header, token);
                        if (settings.data instanceof FormData) {
                            settings.data.append("csrf_test_name", token);
                        } else if (typeof settings.data === "string") {
                            if (settings.data.length > 0) {
                                settings.data += "&csrf_test_name=" + encodeURIComponent(token);
                            } else {
                                settings.data = "csrf_test_name=" + encodeURIComponent(token);
                            }
                        } else if (typeof settings.data === "object" && settings.data !== null) {
                            // Add CSRF token to data object
                            settings.data.csrf_test_name = token;
                        }
                    }
                },
                complete: function(xhr) {
                    try {
                        let res = JSON.parse(xhr.responseText);
                        if (res.csrfHash) {
                            $('meta[name="csrf-token"]').attr("content", res.csrfHash);
                        }
                        sessionTimer = 0;
                    } catch (e) {}
                }
            });
        });

        const SESSION_EXPIRATION = 900;
        const WARNING_BEFORE = 60;
        let sessionTimer = 0;
        setInterval(() => {
            sessionTimer++;
            if (sessionTimer >= (SESSION_EXPIRATION - WARNING_BEFORE)) {
                check_session();
                sessionTimer = 0;
            }

        }, 1000);

        function check_session() {
            Swal.fire({
                title: "Session Expiration Notice",
                text: "Your session is about to expire. Do you want to stay logged in or log out?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Stay Logged In",
                cancelButtonText: "Logout",
                showLoaderOnConfirm: true,
                allowOutsideClick: () => false,
                preConfirm: () => {
                    return $.ajax({
                        url: "<?= base_url('home/refresh_session') ?>",
                        type: "GET",
                        dataType: "json"
                    }).then((res) => {
                        if (!res.status) {
                            throw new Error(res.message);
                        }
                        return res;
                    }).catch((error) => {
                        Swal.showValidationMessage(
                            "Session has expired, please Logout"
                        );
                    });
                }
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: result.value.message,
                        timer: 1000,
                        showConfirmButton: false
                    }).then(() => {

                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    window.location.href = "<?= url_to('logout') ?>";
                }
            });
        }
    </script>

    <?= $this->renderSection('script'); ?>
    <!--end::Script-->
</body>
<!--end::Body-->

</html>