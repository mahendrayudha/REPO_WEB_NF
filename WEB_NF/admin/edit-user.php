<?php
  include "koneksi.php";
  // session_start();
  $id = $_GET['id'];
  $sql = $conn->query("SELECT * FROM user WHERE ID_USER='$id'");
  $tampil = $sql->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Edit Data User</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>
  <div class="card-header">Edit Data User</div>
    <div class="card-body">
      <form method="POST" action="">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text"
                    id="iduser"
                    class="form-control"
                    placeholder="ID User"
                    required="required"
                    name="iduser"
                    value="<?php echo $tampil['ID_USER'];?>" disabled>
              <label for="iduser">ID USER</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="fullName"
                    class="form-control"
                    placeholder="Nama lengkap"
                    required="required"
                    name="namalengkap"
                    value="<?php echo $tampil['NAMA'];?>">
              <label for="fullName">Nama Lengkap</label>
            </div>
          </div>
        
        <div class="form-group">
          <div class="form-label-group">
            <input type="text"
                  id="phoneNumber"
                  class="form-control"
                  placeholder="Nomor telepon"
                  name="nomortelepon"
                  required="required"
                  onkeypress="return hanyaAngka(event)"
                  maxlength="14"
                  value="<?php echo $tampil['NOMOR_TELEPON'];?>">
            <label for="phoneNumber">Nomor Telepon</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-label-group">
            <input type="text"
                  id="address"
                  class="form-control"
                  placeholder="Alamat"
                  name="alamat"
                    required="required"
                    value="<?php echo $tampil['ALAMAT'];?>">
            <label for="address">Alamat</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-label-group">
            <input type="email"
                  id="inputEmail"
                  class="form-control"
                  placeholder="Email"
                  name="email"
                  required="required"
                  value="<?php echo $tampil['EMAIL'];?>">
            <label for="inputEmail">Email</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-label-group">
            <input type="text"
                  id="username"
                  class="form-control"
                  placeholder="Username"
                  required="required"
                  name="username"
                  value="<?php echo $tampil['USERNAME'];?>">
            <label for="username">Username</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-label-group">
            <input type="password"
                    id="inputPassword"
                    class="form-control"
                    placeholder="Kata sandi"
                    name="katasandi"
                    required="required"
                    value="<?php echo $tampil['PASSWORD'];?>">
            <label for="inputPassword">Kata Sandi</label>
          </div>
        </div>

        <div class="form-group">
        <div class="form-label-group">
          <input type="checkbox" onclick="myfunction()"> Show Password
        </div>
      </div>

      <div class="form-group">
        <label for="opsi" style="color: black">Status</label>
          <div class="form-label-group">
            <select type="text"
                  id="status"
                  class="form-control"
                  placeholder="Status"
                  required="required"
                  name="status"
                  value="<?php echo $tampil['LEVEL'];?>">
              <?php if($tampil ['LEVEL']==1) {
                echo 'Admin'; ?>
                <option value="1">Admin</option>
                <option value="2">Karyawan</option>
                <option value="3">User</option>
              <?php } elseif($tampil ['LEVEL']==2) {
                echo 'Karyawan'; ?>
                <option value="2">Karyawan</option>
                <option value="3">User</option>
                <option value="1">Admin</option>
              <?php } elseif($tampil ['LEVEL']==3) {
                echo 'User'; ?>
                <option value="3">User</option>
                <option value="1">Admin</option>
                <option value="2">Karyawan</option>
              <?php } ?>
            </select>
          </div>
        </div>

      <script>
          function myfunction() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
          }
        </script>
        
      <button type="submit"
        class="btn btn-primary"
        name="edituser"
        href="tabel-user.php"
        value="">
        Simpan
      </button>
      <a href="index.php?page=tabel-user" class="btn btn-danger">Batal</a>
      </form>
    </div>

  <?php

  if(isset($_POST["edituser"])) {
    //cek data berhasil ditambah?

    edituser("parameter");
    if(isset($_POST) > 0){
      echo "<script>
      alert('Data Berhasil Diubah');
      document.location.href =
      '?page=tabel-user';
      </script>";
    } else {
        echo "<script>alert('Gagal Mengubah Data')</script>";
      }   
  }

  //ubah data
  function edituser($data) {
    global $conn;
      $id = isset($_GET['id']) ? $_GET['id'] : $_POST['id_user'];
      $namalengkap = isset($_POST['namalengkap']) ? $_POST['namalengkap'] : null;
      $nomortelepon = isset($_POST['nomortelepon']) ? $_POST['nomortelepon'] : null;
      $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : null;
      $email = isset($_POST['email']) ? $_POST['email'] : null;
      $username = isset($_POST['username']) ? $_POST['username'] : null;
      $katasandi = isset($_POST['katasandi']) ? $_POST['katasandi'] : null;
      $status = isset($_POST['status']) ? $_POST['status'] : null;
          
  $query = "UPDATE user SET
    ID_USER='$id',
    NAMA='$namalengkap',
    NOMOR_TELEPON='$nomortelepon',
    ALAMAT='$alamat',
    EMAIL='$email',
    USERNAME='$username',
    PASSWORD='$katasandi',
    LEVEL = '$status'
    WHERE ID_USER='$id'";
  $sql= mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
  }
  ?>

  <script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
		    return false;
		  return true;
		}
	</script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
