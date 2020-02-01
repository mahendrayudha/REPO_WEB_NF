<?php
include "koneksi.php";

//cek session
if (!isset($_SESSION["login"])) {
    header("location: homepage.php");
    exit;
}
$ambilkan = $conn->query("SELECT user.NAMA FROM user INNER JOIN keranjang ON keranjang.ID_USER = user.ID_USER");
$perusers = mysqli_fetch_array($ambilkan);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Tabel Transaksi</title>

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
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="text-align: center;">
                  <tr>
                    <th>ID Transaksi</th>
                    <th style="display:none;">ID User</th>
                    <th>Pemesan</th>
                    <th>Tanggal</th>
                    <th>Status Bayar</th>
                    <th>Grand Total</th>
                    <th>Alamat</th>
                    <th>Opsi Pembayaran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody style="text-align: center;">
                  <?php
                  $sql = $conn->query("SELECT * FROM transaksi");
                  // $sql = $conn->query("SELECT * FROM transaksi INNER JOIN user ON transaksi.ID_USER = user.ID_USER");
                  //$sql = $conn->query("SELECT * FROM transaksi");
                  $sql = $conn->query("SELECT * FROM `transaksi` t INNER JOIN user u ON t.ID_USER =u.ID_USER");

                  while ($data = $sql->fetch_assoc()) {
                    $transfer = ($data['OPSI_PEMBAYARAN'] == 1);
                    $transfer = 'Transfer';
                    $bayartunai = ($data['OPSI_PEMBAYARAN'] == 2);
                    $bayartunai = 'Bayar Tunai';
                    $lunas = ($data['STATUS_BAYAR'] == 1);
                    $lunas = 'Lunas';
                    $belumlunas = ($data['STATUS_BAYAR'] == 2);
                    $belumlunas = 'Belum Lunas';
                  ?>
                    <tr>
                      <td><?php echo $data['ID_TRANSAKSI']; ?></td>
                      <td style="display:none;"><?php echo $data['ID_USER']; ?></td>
                      <td><?php echo $data['NAMA']; ?></td>
                      <td><?php echo $data['TANGGAL_TRANSAKSI']; ?></td>
                      <td><?php if ($data['STATUS_BAYAR'] == 1) {
                            echo $lunas;
                          } elseif ($data['STATUS_BAYAR'] == 2) {
                            echo $belumlunas;
                          } ?>
                      </td>
                      <td><?php echo $data['GRAND_TOTAL']; ?></td>
                      <td><?php echo $data['ALAMAT_PENGIRIMAN']; ?></td>
                      <td><?php if ($data['OPSI_PEMBAYARAN'] == 1) {
                            echo $transfer;
                          } elseif ($data['OPSI_PEMBAYARAN'] == 2) {
                            echo $bayartunai;
                          } ?>
                      </td>
                      <td>
                        <a onclick="return confirm('Apakah Anda yakin untuk menghapus pesanan?')" href="hapus-transaksi.php?id=<?php echo $data['ID_TRANSAKSI']; ?>" class="fas fa-trash"></a>
                      </td>
                    </tr>
                  <?php   }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

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
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>