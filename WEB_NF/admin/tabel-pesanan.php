<?php

  $conn = new mysqli ("localhost","root","","naura_farm");

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
                    <th>Nama Pemesan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Produk Pesanan</th>
                    <th>Sub Total</th>
                    <th>Jumlah Pesanan</th>
                    <th>Grand Total</th>
                    <th>Opsi Pembayaran</th>
                    <th>Status Bayar</th>
                    <th>Opsi Pengiriman</th>
                    <th>Alamat Pengiriman</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = $conn->query("SELECT transaksi.ID_TRANSAKSI, user.NAMA
                                         FROM transaksi, user
                                         WHERE transaksi.ID_TRANSAKSI=user.ID_USER");
//                     SELECT pelanggan.id_pelanggan, pelanggan.nm_pelanggan, pesan.id_pesan, pesan.tgl_pesan
// FROM pelanggan, pesan
// WHERE pelanggan.id_pelanggan=pesan.id_pelanggan; 
//                    while($data = $sql->fetch_assoc()) {
                  ?>
                  <tr>
                    <td><?php echo $data['ID_TRANSAKSI']; ?></td>
                    <td><?php echo $data['NAMA']; ?></td>
                    <td><?php echo $data['TANGGAL_TRANSAKSI']; ?></td>
                    <td><?php echo $data['NAMA_PRODUK']; ?></td>
                    <td><?php echo $data['SUB_TOTAL']; ?></td>
                    <td><?php echo $data['JUMLAH_BELI']; ?></td>
                    <td><?php echo $data['GRAND_TOTAL']; ?></td>
                    <td><?php echo $data['OPSI_PEMBAYARAN']; ?></td>
                    <td>
                      <?php echo $data['STATUS_BAYAR']; ?>
                      <a href="?page=transaksi&aksi=lunas-transaksi&id=<?php echo $data['ID_TRANSAKSI'];?>" class="btn btn-success" >Lunas</a>
                   </td>
                    <td><?php echo $data['OPSI_PENGIRIMAN']; ?></td>
                    <td><?php echo $data['ALAMAT_PENGIRIMAN']; ?></td>
                    <td>
                      <a href="?page=transaksi&aksi=edit-transaksi&id=<?php echo $data['ID_TRANSAKSI'];?>" class="fas fa-edit"></a>
                      <a onclick="return confirm('Apakah Anda yakin untuk menghapus pesanan?')" href="?page=transaksi&aksi=hapus-transaksi&id=<?php echo $data['ID_TRANSAKSI'];?>" class="fas fa-trash"></a>
                    </td>
                  </tr>
                  <!-- <?php //} ?> -->
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
