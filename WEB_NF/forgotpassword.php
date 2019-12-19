<?php
$conn = new mysqli("localhost", "root", "", "naura_farm");
if ($conn === false) {
    die("ERROR: " . mysqli_connect_error());
}
?>

<?php
require 'functions.php';

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_POST) {
    $email = $_POST['email'];

    $selectquery = mysqli_query($conn, "SELECT * FROM user WHERE EMAIL = '$email'");
    $count = mysqli_num_rows($selectquery);
    $row = mysqli_fetch_array($selectquery);

    $tes = $row['PASSWORD'];

    // echo $count;

    if ($count > 0) {
        // echo $row['PASSWORD'];

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'naurafarmjember@gmail.com';
            $mail->Password   = 'farmnaura321';
            $mail->SMTPSecure =  'ssl';
            $mail->Port       =  465;


            $mail->setFrom('naurafarmjember@gmail.com', 'Admin Naura Farm');
            $mail->addAddress($row["EMAIL"]);



            $mail->isHTML(true);
            $mail->Subject = 'Here is the subject';
            $mail->Body    =  'Hai pelanggan setia NAURA FARM. Silahkan Ganti Password Anda di http://localhost/My_Clinic/web%20fix/web%20e/resetpass.php';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            // "Password anda adalah <b>$tes</b>"
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
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
                                <p>Masukkan alamat email Anda dan kami akan mengirim cara merubah kata sandi Anda.</p>
                            </div>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                                        <label for="inputEmail">Masukan alamat email</label> -->
                                        <input type="text" name="email" class="form-control" placeholder="Masukkan Email" required="required" autofocus="autofocus">
                                        <label for="email">Masukkan Email</label>
                                        <input type="submit">
                                    </div>
                                </div>
                                <a class="btn btn-primary btn-block" href="login.php">Ubah Kata Sandi</a>
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