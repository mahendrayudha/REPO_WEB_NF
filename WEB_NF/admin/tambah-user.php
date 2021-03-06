<?php
include "koneksi.php";

//auto increment id user

$carikode = mysqli_query($conn, "select max(ID_USER)from user") or die(mysqli_error($conn));
$datakode = mysqli_fetch_array($carikode);
if ($datakode) {
  $nilaikode = substr($datakode[0], 1);
  $kode = (int) $nilaikode;
  $kode = $kode + 1;
  $hasilkode = "U" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
  $hasilkode = "U001";
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

  <title>Admin - Registrasi User</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>
  <div class="card-header">Tambah User</div>
  <div class="card-body">
    <form method="POST">
      <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="fullName" class="form-control" placeholder="Nama lengkap" required="required" name="namalengkap" autofocus="autofocus">
          <label for="fullName">Nama Lengkap</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="phoneNumber" class="form-control" placeholder="Nomor telepon" name="nomortelepon" required="required" onkeypress="return hanyaAngka(event)">
          <label for="phoneNumber">Nomor Telepon</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="address" class="form-control" placeholder="Alamat" name="alamat" required="required">
          <label for="address">Alamat</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required="required">
          <label for="inputEmail">Email</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="username" class="form-control" placeholder="Username" required="required" name="username">
          <label for="username">Username</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-label-group">
              <input type="password" id="password" class="form-control" placeholder="Kata sandi" name="katasandi" required="required">
              <label for="inputPassword">Kata Sandi</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-label-group">
              <input type="password" id="confir-password" class="form-control" placeholder="Konfirmasi kata sandi" required="required">
              <label for="confirmPassword">Konfirmasi Kata Sandi</label>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="checkbox" onclick="myFunction()"> Show Password
        </div>
      </div>

      <script>
        function myFunction() {
          var x = document.getElementById("password");
          var y = document.getElementById("confir-password");
          if (x.type === "password" && y.type === "password") {
            x.type = "text";
            y.type = "text";
          } else {
            x.type = "password";
            y.type = "password";
          }
        }
      </script>

      <button type="submit" class="btn btn-primary" name="tambahuser" href="tabel-user.php">
        Tambah User
      </button>

      <a href="index.php?page=tabel-user">
        <button class="btn btn-danger" name="cancel">
          Batal
        </button>
      </a>
    </form>
  </div>

  <?php
  include "koneksi.php";

  $namalengkap = isset($_POST['namalengkap']) ? $_POST['namalengkap'] : null;
  $nomortelepon = isset($_POST['nomortelepon']) ? $_POST['nomortelepon'] : null;
  $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : null;
  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $username = isset($_POST['username']) ? $_POST['username'] : null;
  $katasandi = isset($_POST['katasandi']) ? $_POST['katasandi'] : null;
  $tambahuser = isset($_POST['tambahuser']) ? $_POST['tambahuser'] : null;

  if (isset($_POST['tambahuser'])) {
    $sqlcek = $conn->query("SELECT * FROM user WHERE USERNAME='$username' or EMAIL='$email'");
    //$cek = mysqli_query($conn, $sqlcek);
    
    if (mysqli_num_rows($sqlcek) > 0) {
      $row = mysqli_fetch_assoc($sqlcek);
      if ($username == $row['USERNAME']) {
         echo "Username Already Exists";
      ?>
        <script type="text/javascript">
          alert("Username Already Exists");
        </script>
      <?php
      } elseif ($email == $row['EMAIL']) {
         echo "Email Already Exists";
      ?>
        <script type="text/javascript">
          alert("Email Already Exists");
        </script>
      <?php
      }           

    }else{
      $sql = $conn->query("INSERT into user (ID_USER, NAMA, NOMOR_TELEPON, ALAMAT, EMAIL, USERNAME, PASSWORD, LEVEL)
            values('$hasilkode', '$namalengkap','$nomortelepon','$alamat','$email','$username','$password','2')");
            ?>
            <script type="text/javascript">
             alert("Data Berhasil Disimpan");
             window.location.href = "?page=tabel-user";
            </script>
            <?php 
    }
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