<?php
$conn = new mysqli("localhost","u5445042_tifa","tifa2020","u5445042_naurafarm");
if ($conn === false) {
    die("ERROR: " . mysqli_connect_error());
}
?>

<?php
require 'functions.php';
include "PHPMailer/classes/class.phpmailer.php";

session_start();
if(isset($_POST['ubahpw'])){
  $email = $_POST['email'];
    $selectquery = mysqli_query($conn, "SELECT * FROM user WHERE EMAIL = '$email'");
    $count = mysqli_num_rows($selectquery);
    $row = mysqli_fetch_array($selectquery);
    if($count > 0){
      $pw = $row['PASSWORD'];
      $name = $row['NAMA'];
      $mail = new PHPMailer; 
      $mail->IsSMTP();
      $mail->SMTPSecure = 'nossl'; 
      $mail->Host = "mail.smile-joke.com"; //host masing2 provider email
      $mail->SMTPDebug = 1;
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      $mail->Username = "naura_farm@smile-joke.com"; //user email
      $mail->Password = "S4&QgUNHiS;Z"; //password email 
      $mail->SetFrom("naura_farm@smile-joke.com","Admin Naura Farm"); //set email pengirim
      $mail->Subject = "Lupa Password"; //subyek email
      $mail->AddAddress($email,$name);  //tujuan email
      $mail->MsgHTML("Ini Adalah Password Anda : ".$pw." <br> Tolong ingat dan jangan lupa di catat :)<br> Terima Kasih Telah Menjadi Pelanggan Setia Naura Farm.");
      if($mail->send()){
        $pesan = "Password anda telah di kirim ke email anda.<br> Silahkan cek amail anda, apabila tidak terdapat pada pesan utama, cek di daftar Spam";
      } else {
        $pesan = "Error";
      }
      //$pesan = "nama : ".$name." | pw ".$pw."";
    } else {
      $pesan = "Email tidak terdaftar"; 
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
    <title>Lupa Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Web Icon -->
    <link rel="shortcut icon" href="img/ic_nf.ico" />
</head>

<body id="page-top" class="bg-dark">

     <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container-fluid" style="padding-left: 100px!important; padding-right: 100px!important;">
      <div class="logo">
        <a class="navbar-brand js-scroll-trigger" href="homepage.php">
          <img src="img/logo_nf.png" style="width: 60px">
          Naura Farm
        </a>
      </div>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="homepage.php">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="homepage.php">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="homepage.php">Fasilitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="homepage.php">Kontak Kami</a>
          </li>
          <div class="dropdown">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
                <?php
                if (isset($_SESSION['login'])) {
                  echo $_SESSION["user"];
                } ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                if
                <!-- Session utk merubah nav akun login/register menjadi akun/keluar saat kondisi user sedang login -->
                <?php
                if (isset($_SESSION['login'])) {
                  ?>
                  <a class="dropdown-item" href="akun.php">Akun</a>
                  <a class="dropdown-item" href="keluar.php">Keluar</a>
                <?php
                } else {
                  ?>
                  <a class="dropdown-item" href="#" onclick="document.getElementById('id01').style.display='block'">Masuk</a>
                  <a class="dropdown-item" href="#" onclick="document.getElementById('id02').style.display='block'">Daftar</a>
                <?php } ?>
            </li>
          </div>
        </ul>
      </div>
      </ul>
    </div>
  </nav>

    <!-- Header -->
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <div class="container">
                    <div class="card card-login mx-auto mt-5">
                        <div class="card-header">Ubah Password</div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <h4>Lupa Kata Sandi?</h4>
                                <p><?php 
                                if(isset($pesan)) { echo $pesan; } else { echo 'Masukkan alamat email Anda yang telah terdaftar dan kami akan mengirimkan kata sandi Anda.';}
                                ?></p>
                            </div>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                                        <label for="inputEmail">Masukan alamat email</label> -->
                                        <input type="text" name="email" class="form-control" placeholder="Masukkan Email" required="required" autofocus="autofocus">
                                        <label for="email">Masukkan Email</label>
                                        <!-- <input type="submit"> -->
                                    </div>
                                </div>
                                <!-- <a class="btn btn-primary btn-block" href="login.php">Ubah Kata Sandi</a> -->
                                <button class="btn btn-primary btn-block" type="submit" name="ubahpw">Ingatkan Saya</button>
                            </form>
                            <div class="text-center">
                                <a class="d-block small mt-3" href="homepage.php">Kembali</a>
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