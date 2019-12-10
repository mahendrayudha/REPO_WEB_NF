<?php

  $conn = new mysqli ("localhost","root","","naura_farm");
  if($conn === false) {
    die("ERROR: " . mysqli_connect_error());
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Naura Farm</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="?page=dashboard">Admin Naura Farm</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Pencarian..." aria-label="Cari" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Akun</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="?page=dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="?page=pesanan-masuk">Pesanan Masuk</a>
          <a class="dropdown-item" href="?page=pesanan-verifikasi">Verifikasi Pembayaran</a>
          <a class="dropdown-item" href="?page=pesanan-lunas">Pesanan Lunas</a>
          <a class="dropdown-item" href="?page=pesanan-batal">Pesanan Dibatalkan</a>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="?page=grafik-penjualan">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Grafik Penjualan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=tabel-pesanan">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel Pesanan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=tabel-produk">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel Produk</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=tabel-user">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel User</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>
          <span>Keluar</span></a>
      </li>
    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">

      <?php

      if(isset($_GET['page'])) {
        $page = $_GET['page'];

        if($page == "dashboard") {
          include "dashboard.php";
        } elseif ($page == "grafik-penjualan") {
          include "grafik-penjualan.php";
        } elseif ($page == "tabel-pesanan") {
          include "tabel-pesanan.php";
        } elseif ($page == "tabel-user") {
          include "tabel-user.php";
        } elseif ($page == "tabel-produk") {
          include "tabel-produk.php";
        }
      }

      if(isset($_GET['aksi'])) {
        $aksi = $_GET['aksi'];
        
        if($aksi == "tambah-user") {
          include "tambah-user.php";
        } elseif ($aksi == "edit-user") {
          include "edit-user.php";
        } elseif ($aksi == "hapus-user") {
          include "hapus-user.php";
        } elseif ($aksi == "tambah-produk") {
          include "tambah-produk.php";
        } elseif ($aksi == "edit-produk") {
          include "edit-produk.php";
        } elseif ($aksi == "hapus-produk") {
          include "hapus-produk.php";
        } elseif ($aksi == "edit-transaksi") {
          include "edit-transaksi.php";
        } elseif ($aksi == "lunas-transaksi") {
          include "lunas-transaksi.php";
        } elseif ($aksi == "hapus-transaksi") {
          include "hapus-transaksi.php";
        }
      }
      ?>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Teknik Informatika POLIJE 2019 | Naura Farm Jember</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" jika Anda ingin keluar, pilih "Batal" jika ingin kembali ke Panel Admin.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-danger" href="login.php">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
