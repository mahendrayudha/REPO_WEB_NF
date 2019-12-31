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

  <title>Admin - Tabel Produk</title>

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
          <a href="?page=produk&aksi=tambah-produk" class="btn btn-primary">Tambah Produk</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th style="display: none;">Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = $conn->query("select * from produk");
                    while($data = $sql->fetch_assoc()) {
                  ?>
                  <tr>
                    <td><?php echo $data['ID_PRODUK']; ?></td>
                    <td><?php echo $data['NAMA_PRODUK']; ?></td>
                    <td><?php echo $data['STOK_PRODUK']; ?></td>
                    <td style="display: none;"><?php echo $data['HARGA_BELI']; ?></td>
                    <td><?php echo $data['HARGA_JUAL']; ?></td>
                    <td>
                      <a href="?page=produk&aksi=edit-produk&id=<?php echo $data['ID_PRODUK'];?>" class="fas fa-edit"></a>
                      <!-- <a class="fas fa-trash nav-link"
                         href="?page=produk&aksi=hapus-produk&id=<?php echo $data['ID_PRODUK'];?>"
                         data-toggle="modal"
                         data-target="#deleteModal">
                      </a> -->
                      <a onclick="return confirm('Apakah Anda yakin untuk menghapus?')" href="?page=produk&aksi=hapus-produk&id=<?php echo $data['ID_PRODUK'];?>" class="fas fa-trash"></a>
                    </td>
                  </tr>
                  <?php } ?>
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

  <!-- Delete Modal-->
  <!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin menghapus produk?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Hapus" jika Anda ingin menghapus produk, pilih "Batal" jika batal menghapus produk.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-danger" href="?page=produk&aksi=hapus-produk&id=<?php echo $data['ID_PRODUK'];?>">Hapus</a>
        </div>
      </div>
    </div>
  </div> -->

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
