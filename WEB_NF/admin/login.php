<?php
  $conn = new mysqli ("localhost","root","","naura_farm");
  if($conn === false) {
    die("ERROR: " . mysqli_connect_error());
  }

  if (isset($_POST["masuk"])) {
    $username = $_POST['nama'];
    $password = $_POST['psw'];

    $result =  $conn->query("SELECT * FROM user WHERE USERNAME = '$username' AND PASSWORD = '$password'");

    if (mysqli_num_rows($result) === 1) {
      //cek password
      $row = mysqli_fetch_assoc($result);
      $_SESSION["login"] = true;
      $_SESSION['user'] = $row["USERNAME"];
      if ($row['LEVEL'] == 1) {
        header('location:admin/index.php');
      } else {
        header('location:homepage.php');
      }
      echo "<script>alert ('Login Berhasil');window.location.href='homepage.php'</script>";
    } else {
      echo "<script>alert ('Login Gagal')</script>";
      // header("location: login.php?gagal");
    }
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

  <title>Login Admin Naura Farm</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Masuk</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="username"
                     id="inputUsername"
                     class="form-control"
                     placeholder="Username"
                     required="required"
                     autofocus="autofocus">
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password"
                     id="inputPassword"
                     class="form-control"
                     placeholder="Kata Sandi"
                     minlength="8" maxlength="20"
                     required="required">
              <label for="inputPassword">Kata Sandi</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Ingat saya
              </label>
            </div>
          </div>
          <a class="btn btn-primary btn-block" href="index.php">Masuk</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Daftar Akun</a>
          <a class="d-block small" href="forgot-password.php">Lupa kata sandi?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
