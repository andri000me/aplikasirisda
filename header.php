<?php

include 'head.php';
require_once 'include/auth.php';

?>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="dashboard.php">Home</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="logout.php" onclick="return confirm('Yakin ingin keluar?')">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="dashboard.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <a class="nav-link" href="galeri.php">
              <div class="sb-nav-link-icon"><i class="fas fa-photo-video"></i></div>
              Galeri
            </a>
            <div class="sb-sidenav-menu-heading">Data</div>
            <a class="nav-link" href="data-peminjam-perbulan.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Peminjam Perbulan
            </a>
            <a class="nav-link" href="data-nasabah-menunggak.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Nasabah Menunggak
            </a>
            <a class="nav-link" href="data-nasabah-lunas.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Nasabah Lunas
            </a>
            <a class="nav-link" href="data-tanda-terima-agunan.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Tanda Terima Agunan
            </a>
            <a class="nav-link" href="data-struk.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Struk
            </a>
            <div class="sb-sidenav-menu-heading">Laporan</div>
            <a class="nav-link" href="laporan-peminjam-perbulan.php">
              <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
              Peminjam Perbulan
            </a>
            <a class="nav-link" href="laporan-nasabah-menunggak.php">
              <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
              Nasabah Menunggak
            </a>
            <a class="nav-link" href="laporan-nasabah-lunas.php">
              <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
              Nasabah Lunas
            </a>
            <a class="nav-link" href="laporan-tanda-terima-agunan.php">
              <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
              Tanda Terima Agunan
            </a>
            <a class="nav-link" href="laporan-struk.php">
              <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
              Struk
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          <?php echo $_SESSION['nama'] ?>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
