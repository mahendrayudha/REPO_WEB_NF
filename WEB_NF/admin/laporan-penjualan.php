<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Laporan Penjualan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
    <div id="content-wrapper">
      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="cetak-laporan.php" target="_blank" id="print" class="btn btn-primary" style="color: white;"><i class="fa fa-book"></i> Cetak Laporan</a>
          </div>
          <form action="?page=laporan-penjualan" method="get">
            <div class="row">
              <div class="form-group col-md-6">
                <span>Mulai Tanggal :</span>
                <input type="hidden" class="form-control" name="page" value="laporan-penjualan">
                <input type="date" class="form-control" name="start_date">
              </div>
              <div class="form-group col-md-6">
                <span>Sampai Tanggal :</span>
                <input type="date" class="form-control" name="end_date">
              </div>
            </div>            
              <button type="submit" class="btn btn-primary" name="cari">
                Cari
              </button>
          </form>
          <div class="card-body">
            <div class="table-responsive">
              <?php
              include "laporan.php";
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>