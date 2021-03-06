<?php
  include "koneksi.php";
  session_start();
  if (isset($_SESSION['login'])){

  } else {
    header("Location: /REPO_WEB_NF/WEB_NF/admin/login.php");
    exit();
  }
  error_reporting(0);
  $x = $_GET['aksi'];
  if($x == 'keluar'){
    session_destroy();
    header("Location: REPO_WEB_NF/WEB_NF/admin/login.php");
    exit();
  }else{}
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
      <li class="nav-item active">
        <a class="nav-link" href="?page=tabel-produk">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel Produk</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="?page=tabel-pesanan">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel Pesanan</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="?page=tabel-transaksi">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel transaksi</span></a>
      </li>
      <?php
      if($_SESSION['level'] == 0){
        echo '<li class="nav-item active">
          <a class="nav-link" href="?page=tabel-user">
            <i class="fas fa-fw fa-table"></i>
            <span>Tabel User</span></a>
        </li>';
      } else if($_SESSION['level'] == 1){
        echo '<li class="nav-item active">
          <a class="nav-link" href="?page=tabel-user">
            <i class="fas fa-fw fa-table"></i>
            <span>Tabel User</span></a>
        </li>';
      }
      ?>

      <li class="nav-item active">
        <a class="nav-link" href="?page=laporan-penjualan">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Laporan Penjualan</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>
      </li>
    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">

      <?php

      if(isset($_GET['page'])) {
        $page = $_GET['page'];

        if($page == "dashboard") {
          include "dashboard.php";
        } elseif ($page == "laporan-penjualan") {
          include "laporan-penjualan.php";
        } elseif ($page == "tabel-pesanan") {
          include "tabel-pesanan.php";
        } elseif ($page == "tabel-user") {
          include "tabel-user.php";
        } elseif ($page == "tabel-produk") {
          include "tabel-produk.php";
        } elseif ($page == "tabel-transaksi") {
          include "tabel-transaksi.php";
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
        } elseif ($aksi == "insert-transaksi") {
          include "insert-transaksi.php";
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
          <a class="btn btn-danger" href="logout.php">Keluar</a>
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
