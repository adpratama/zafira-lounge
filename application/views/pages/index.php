<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?> - Zafira Garden Lounge</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/front/images/logo/logo-bg-light-crop.png" rel="icon">
    <link href="<?= base_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>

    <!-- =======================================================
  * Template Name: Zafira Garden Lounge
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <?php
    $user = $this->M_Auth->cek_user($this->session->userdata('username'));
    $role = $this->M_Auth->cek_role($user['role_id']);
    ?>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
                <img src="<?= base_url() ?>assets/front/images/logo/logo-bg-light-crop.png" alt="">
                <!-- <span class="d-none d-lg-block">Zafira Garden Lounge</span> -->
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?= base_url() ?>assets/img/profile/<?= $user['image'] ?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user['name'] ?></span>
                    </a>
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $user['name'] ?></h6>
                            <span><?= $role['role'] ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center btn-logout" href="<?= base_url('auth/logout') ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link  <?php if ($this->uri->segment(1) != 'dashboard') echo 'collapsed' ?>" href="<?= base_url('dashboard') ?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  <?php if ($this->uri->segment(2) != 'booking') echo 'collapsed' ?>" href="<?= base_url('dash/booking') ?>">
                    <i class="bi bi-journal-text"></i>
                    <span>Reservation</span>
                </a>
            </li>

            <li class="nav-heading">Invoice kegiatan</li>
            <li class="nav-item">
                <a class="nav-link  <?php if ($this->uri->segment(2) != 'invoice') echo 'collapsed' ?>" href="<?= base_url('dash/invoice') ?>">
                    <i class="bi bi-file-earmark-check"></i>
                    <span>Invoice</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?php if ($this->uri->segment(2) != 'customer') echo 'collapsed' ?>" href="<?= base_url('dash/customer') ?>">
                    <i class="bi bi-people"></i>
                    <span>Customer</span>
                </a>
            </li>

            <li class="nav-heading">Artikel</li>
            <li class="nav-item">
                <a class="nav-link  <?= (($this->uri->segment(2) == 'article') && !$this->uri->segment(3)) ? '' : 'collapsed' ?>" href="<?= base_url('dash/article') ?>">
                    <i class="bi bi-book"></i>
                    <span>Article</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) != 'category') ? 'collapsed' : '' ?>" href="<?= base_url('dash/category') ?>">
                    <i class="bi bi-list-ul"></i>
                    <span>Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(3) != 'tag') ? 'collapsed' : '' ?>" href="<?= base_url('dash/article/tag') ?>">
                    <i class="bi bi-tag"></i>
                    <span>Tag</span>
                </a>
            </li>

            <li class="nav-heading">Misc.</li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) != 'user') ? 'collapsed' : '' ?>" href="<?= base_url('dash/user') ?>">
                    <i class="bi bi-person-badge"></i>
                    <span>User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed btn-logout" href="<?= base_url('auth/logout') ?>">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign out</span>
                </a>
            </li>
            <!-- End Blank Page Nav -->

        </ul>

    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_name') ?>"></div>
        <div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('message_error') ?>"></div>

        <?php if (isset($pages)) $this->load->view($pages) ?>

    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Zafira Garden Lounge</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/'); ?>vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/'); ?>js/main.js"></script>


    <!-- Scripts -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <script src="<?= base_url('assets/'); ?>js/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?= base_url('assets/'); ?>js/script.js"></script>

</body>

</html>