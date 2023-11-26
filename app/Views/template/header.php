<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('StarAdmin/vendors/feather/feather.css')?>">
  <link rel="stylesheet" href="<?= base_url('StarAdmin/vendors/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('StarAdmin/vendors/ti-icons/css/themify-icons.css')?>">
  <link rel="stylesheet" href="<?= base_url('StarAdmin/vendors/typicons/typicons.css')?>">
  <link rel="stylesheet" href="<?= base_url('StarAdmin/vendors/simple-line-icons/css/simple-line-icons.css')?>">
  <link rel="stylesheet" href="<?= base_url('StarAdmin/vendors/css/vendor.bundle.base.css')?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('StarAdmin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')?>">
  <link rel="stylesheet" href="<?= base_url('StarAdmin/js/select.dataTables.min.css')?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('StarAdmin/css/vertical-layout-light/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('StarAdmin/images/favicon.png')?>"/>
</head>

<body>


    <!-- <?php if(session()->getFlashdata('success')){?>

        <script>alert("<?php echo session()->getFlashdata('success')?>")</script>
        <?php } ?> -->
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="#">
            <img src="<?= base_url('StarAdmin/images/logo.svg')?>" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="#">
            <img src="<?= base_url('StarAdmin/images/logo-mini.svg')?>" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold"><?= session()->get('session') ?></span></h1>
            <h3 class="welcome-sub-text">Your performance summary this week </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('tambah')?>">
              <i class="mdi mdi-account-multiple-plus menu-icon"></i>
              <span class="menu-title">Tambah Data</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/lab">
              <i class="mdi mdi-city menu-icon"></i>
              <span class="menu-title">Lab</span>
            </a>
          </li>
          <li class="nav-item nav-category">Keluar</li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('')?>?logout=1" class="nav-link text-primary">
              <i class="mdi mdi-exit-to-app menu-icon"></i>
              <span class="menu-title">Log Out</span>
            </a>
          </li>
          
        </ul>
      </nav>