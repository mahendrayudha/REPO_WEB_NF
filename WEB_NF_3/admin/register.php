<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Daftar</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Daftar Akun</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text"
                     id="fullName"
                     class="form-control"
                     placeholder="Nama lengkap"
                     required="required"
                     autofocus="autofocus">
              <label for="fullName">Nama Lengkap</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text"
                     id="phoneNumber"
                     class="form-control"
                     placeholder="Nomor telepon"
                     required="required">
              <label for="phoneNumber">Nomor Telepon</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text"
                     id="address"
                     class="form-control"
                     placeholder="Alamat"
                     required="required">
              <label for="address">Alamat</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email"
              id="inputEmail"
              class="form-control"
              placeholder="Email"
              required="required">
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
                     autofocus="autofocus">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password"
                         id="inputPassword"
                         class="form-control"
                         placeholder="Kata sandi"
                         required="required">
                  <label for="inputPassword">Kata Sandi</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password"
                  id="confirmPassword"
                  class="form-control"
                  placeholder="Konfirmasi kata sandi"
                  required="required">
                  <label for="confirmPassword">Konfirmasi Kata Sandi</label>
                </div>
              </div>
            </div>
          </div>
          <a type="submit" class="btn btn-primary btn-block" href="login.php">Daftar</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Masuk</a>
          <a class="d-block small" href="forgot-password.php">Lupa Kata Sandi?</a>
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
