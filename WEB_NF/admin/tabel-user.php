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

  <title>Admin - Tabel User</title>

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
          <a href="?page=user&aksi=tambah-user" class="btn btn-primary fas fa-user"> Tambah User</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = $conn->query("SELECT * FROM user");
                    while($data = $sql->fetch_assoc()) {
                      $admin = ($data['LEVEL']==1);
                      $admin = 'Admin';
                      $karyawan = ($data['LEVEL']==2);
                      $karyawan = 'Karyawan';
                      $user = ($data['LEVEL']==3);
                      $user = 'User';
                  ?>
                  <tr>
                    <td><?php echo $data['ID_USER']; ?></td>
                    <td><?php echo $data['NAMA']; ?></td>
                    <td><?php echo $data['EMAIL']; ?></td>
                    <td><?php echo $data['NOMOR_TELEPON']; ?></td>
                    <td><?php echo $data['ALAMAT']; ?></td>
                    <td><?php echo $data['USERNAME']; ?></td>
                    <td><?php echo $data['PASSWORD']; ?></td>
                    <td><?php if($data ['LEVEL']==2) {
                      echo $karyawan;
                    } elseif($data ['LEVEL']==1) {
                      echo $admin;
                    } elseif($data['LEVEL']==3) {
                      echo $user;
                    } ?></td>
                    <td>
                      <a href="?page=user&aksi=edit-user&id=<?php echo $data['ID_USER'];?>" class="fas fa-edit"></a>
                      <a onclick="return confirm('Apakah Anda yakin untuk menghapus?')" href="?page=user&aksi=hapus-user&id=<?php echo $data['ID_USER'];?>" class="fas fa-trash"></a>
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
