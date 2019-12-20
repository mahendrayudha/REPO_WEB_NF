<?php
include "koneksi.php";

//memasukkan keranjang
// if (isset($_POST['beli'])) {
//   if (keranjang($_POST) == 1) {
//       echo "<script>alert ('Berhasil Memasukkan ke Keranjang');</script>";
//   } else {
//       echo "<script>alert ('Gagal Memasukkan ke Keranjang');</script>";
//   }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Tabel Pesanan</title>

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
                <thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>ID Produk</th>
                    <th>NAMA Produk</th>
                    <th>ID User</th>
                    <th>Jumlah Beli</th>
                    <th>Tanggal</th>
                    <th>Alamat</th>
                    <th>Opsi Pembayaran</th>
                    <th>Grand Total</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = $conn->query("SELECT * FROM keranjang");
                  while ($data = $sql->fetch_assoc()) {
                  ?>
                    <tr>
                      <td><?php echo $data['ID_TRANSAKSI']; ?></td>
                      <td><?php echo $data['ID_PRODUK']; ?></td>
                      <td><?php echo $data['NAMA_PRODUK']; ?></td>
                      <td><?php echo $data['ID_USER']; ?></td>
                      <td><?php echo $data['JUMLAH_BELI']; ?></td>
                      <td><?php echo $data['TGL_TRANSAKSI']; ?></td>
                      <td><?php echo $data['ALAMAT']; ?></td>
                      <td><?php echo $data['OPSI_PEMBAYARAN']; ?></td>
                      <td><?php echo $data['GRAND_TOTAL']; ?></td>                      
                      <td>
                        <a onclick="return confirm('Apakah Anda yakin untuk menghapus pesanan?')" href="hapus-pesanan.php?id=<?php echo $data['ID_TRANSAKSI']; ?>" class="fas fa-trash"></a>
                        <!-- <a onclick="return confirm('Apakah Anda yakin untuk menerima pesanan?')" href="?page=transaksi&aksi=edit-transaksi?id=<?php echo $data['ID_TRANSAKSI']; ?>" class="fas fa-check-circle" style="font-size:18px"></a> -->
                        <a href="?page=transaksi&aksi=insert-transaksi&id=<?php echo $data['ID_TRANSAKSI']; ?>" class="fas fa-check-circle"></a>
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