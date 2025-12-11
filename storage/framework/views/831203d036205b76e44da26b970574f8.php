<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Principal</title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('assets/favicon/apple-icon-57x57.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('assets/favicon/apple-icon-60x60.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('assets/favicon/apple-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('assets/favicon/apple-icon-76x76.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('assets/favicon/apple-icon-114x114.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('assets/favicon/apple-icon-120x120.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('assets/favicon/apple-icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('assets/favicon/apple-icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/favicon/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('assets/favicon/android-icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/favicon/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('assets/favicon/favicon-96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/favicon/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('assets/favicon/manifest.json')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('DataTables/datatables.min.css')); ?>" />   <!-- Datatables--->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('assets/favicon/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/simplebar/css/simplebar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendors/simplebar.css')); ?>">
    <!-- Main styles for this application-->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="<?php echo e(asset('css/examples.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/config.js')); ?>"></script>
    <script src="<?php echo e(asset('js/color-modes.js')); ?>"></script>
    <link href="<?php echo e(asset('vendors/@coreui/chartjs/css/coreui-chartjs.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <!-- Empieza el navbar izquierdo-->
    <div class="sidebar sidebar-fixed border-end" id="sidebar">
        <div class="sidebar-header border-bottom">
            <div class="sidebar-brand">
                <!-- Poner logo acá-->
            </div>
            <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                <svg class="nav-icon">
                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer')); ?>"></use>
                </svg> Dashboard</a>
            </li>
            <li class="nav-title">Inicio</li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.usuarios.index')); ?>">
                <svg class="nav-icon">
                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-user')); ?>"></use>
                </svg> Usuarios</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.sedes.index')); ?>">
                <svg class="nav-icon">
                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-bank')); ?>"></use>
                </svg> Sedes</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.trabajadores.index')); ?>">
                <svg class="nav-icon">
                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/brand.svg#cib-slideshare')); ?>"></use>
                </svg> Trabajadores</a>
            </li>
            <li class="nav-title">Patrimonio</li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.bienes.index')); ?>">
                <svg class="nav-icon">
                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle')); ?>"></use>
                </svg> Bienes</a>
            </li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-barcode')); ?>"></use>
                </svg> Inventario</a>
                <ul class="nav-group-items compact">
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(asset('buttons/buttons.html')); ?>"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Buttons</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(asset('buttons/button-group.html')); ?>"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Buttons Group</a></li>
                    <li class="nav-item"><a class="nav-link" href="buttons/dropdowns.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Dropdowns</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/components/loading-buttons/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Loading Buttons
                        <svg class="icon icon-sm ms-2">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-external-link"></use>
                        </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="widgets.html">
                <svg class="nav-icon">
                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-notes')); ?>"></use>
                </svg> Reportes<span class="badge badge-sm bg-info ms-auto">NEW</span></a>
            </li>
            <li class="nav-divider"></li>
            <li class="nav-title">Extras</li>
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/brand.svg#cib-semaphoreci')); ?>"></use>
                    </svg> Configurable
                </a>
                <ul class="nav-group-items compact">
                    <li class="nav-item"><a class="nav-link" href="login.html" target="_top">
                        <svg class="nav-icon">
                            <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout')); ?>"></use>
                        </svg> Login</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="register.html" target="_top">
                        <svg class="nav-icon">
                            <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout')); ?>"></use>
                        </svg> Register</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="404.html" target="_top">
                        <svg class="nav-icon">
                            <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-bug')); ?>"></use>
                        </svg> Error 404</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="500.html" target="_top">
                        <svg class="nav-icon">
                            <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-bug')); ?>"></use>
                            </svg> Error 500</a>
                        </li>
                </ul>
            </li>
        </ul>
        <div class="sidebar-footer border-top d-none d-md-flex">
            <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
        </div>
    </div>
    <!-- Termina el navbar izquierdo-->

    <!-- Empieza el navbar superior-->
    <div class="wrapper d-flex flex-column">
        <header class="header header-sticky p-0 mb-4">
            <div class="container-fluid border-bottom px-4">
                <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
                    <svg class="icon icon-lg">
                        <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-menu')); ?>"></use>
                    </svg>
                </button>
                <ul class="header-nav d-none d-lg-flex">
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.usuarios.index')); ?>">Usuarios</a></li>
                </ul>
                <ul class="header-nav ms-auto">
            
                </ul>
                <ul class="header-nav">
                    <li class="nav-item py-1">
                        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
                            <svg class="icon icon-lg theme-icon-active">
                                <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-contrast')); ?>"></use>
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
                                    <svg class="icon icon-lg me-3">
                                        <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-sun')); ?>"></use>
                                    </svg>Light
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
                                    <svg class="icon icon-lg me-3">
                                        <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-moon')); ?>"></use>
                                    </svg>Dark
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
                                    <svg class="icon icon-lg me-3">
                                        <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-contrast')); ?>"></use>
                                    </svg>Auto
                                </button>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item py-1">
                        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"><img class="avatar-img" src="<?php echo e(asset('assets/img/avatars/8.jpg')); ?>" alt="user@email.com"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">Account</div>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-bell')); ?>"></use>
                                </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open')); ?>"></use>
                                </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-task')); ?>"></use>
                                </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-comment-square')); ?>"></use>
                                </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
                                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                                    <div class="fw-semibold">Settings</div>
                                </div><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-user')); ?>"></use>
                                </svg> Profile</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-settings')); ?>"></use>
                                </svg> Settings</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-credit-card')); ?>"></use>
                                </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-file')); ?>"></use>
                                </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <svg class="icon me-2">
                                        <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')); ?>"></use>
                                    </svg> Lock Account
                                </a>
                                <a class="dropdown-item" href="#">
                                    <svg class="icon me-2">
                                        <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout')); ?>"></use>
                                    </svg> Logout
                                </a>
                        </div>
                    </li>
                 </ul>
            </div>
            <!-- Termina el navbar superior-->
        </header>
    </div>

    <div class="wrapper d-flex flex-column min-vh-100">
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                <?php echo $__env->yieldContent('content'); ?> 
            </div>
        </div>
    </div>


    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo e(asset('vendors/@coreui/coreui-pro/js/coreui.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/simplebar/js/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/i18next/js/i18next.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/i18next-http-backend/js/i18nextHttpBackend.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js')); ?>"></script>
    <script src="<?php echo e(asset('js/i18next.js')); ?>"></script>
    <script>
      const header = document.querySelector('header.header');

      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
    </script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?php echo e(asset('vendors/chart.js/js/chart.umd.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/@coreui/chartjs/js/coreui-chartjs.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/@coreui/utils/js/index.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net/js/dataTables.min.js')); ?>"></script>
    <script>
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\laragon\www\resources\views/layouts/admin.blade.php ENDPATH**/ ?>