<!DOCTYPE html>
<html lang="en">
<?php session_start();
require 'functions.php'; ?>

<head>

  <meta charset="utf-8">
  <title>Naura Farm</title>

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

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <div class="logo">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"> <img src="img/logo_nf.png" style="width: 60px;">
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
            <a class="nav-link js-scroll-trigger" href="#profil">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#produk">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#fasilitas">Fasilitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#kontak_kami">Kontak Kami</a>
          </li>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
            <a href="#"><img src="img/user.png" style="width: 30px; "></a></button>
            <ul class="dropdown-menu">
              <li><a href="index.php">Logout</a></li>
            </ul>
          </div>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Selamat Datang di Naura Farm</h1>
        <h2 class="">Agrowisata Buah Naga Jember</h2>

        <!-- /*/////////////////////////////////// FORM LOGIN //////////////////////////////////*/ -->


      </div>
    </div>
  </header>



  <!-- /*/////////////////////////////////// CONNECTION DATABASE //////////////////////////////////*/ -->
  <!-- ////////////////////////////////////////DATABASE LOGIN///////////////////////////////////////// -->
  <?php
  if (isset($_POST["masuk"])) {

    $username = $_POST['nama'];
    $password = $_POST['psw'];


    $result = mysqli_query($conn, "SELECT * FROM user WHERE USERNAME = '$username' AND PASSWORD = '$password'");



    if (mysqli_num_rows($result) === 1) {
      //cek password
      $row = mysqli_fetch_assoc($result);
      $_SESSION["login"] = true;
      $_SESSION['user'] = $row["NAMA"];
      header("location: index.php");
      echo "<script>alert ('Login Berhasil')</script>";
    } else {
      echo "<script>alert ('Login Gagal')</script>";
      // header("location: login.php?gagal");
    }
  }
  ?>

  <!-- ////////////////////////////////////////DATABASE REGISTER////////////////////////////////////////// -->
  <?php

  //cek tombol sudah ditekan atau belum
  if (isset($_POST["daftar"])) {

    //cek data berhasil ditambah?
    if (tambah($_POST) > 0) {
      echo "<script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
                </script>";
    } else {
      echo "<script>alert('Gagal Menambahkan Data')</script>";
    }
  }
  if (isset($_POST["batal"])) {
    header("Location: index.php");
    exit;
  }
  ?>



  <!-- ////////////////////////////Profil Section/////////////////////////// -->
  <section id="profil" class="profil-section text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <img src="img/logo_nf.png" class="img-fluid" alt="Logo Naura Farm" style="width: 466px;">
          <h2 class="text-white mb-4">Apa itu Naura Farm?</h2>
          <p class="text-white-50">Naura Farm adalah perusahaan buah naga yang berada di kabupaten Jember
            tepatnya di desa Karangrejo, Sumbersari. Perusahaan ini menghasilkan buah naga organik. Tanaman
            buah naga merupakan salah satu produk holtikultura yang termasuk komoditas Internasional. Tentu
            saja menjadi pertimbangan untuk agribisnis, mengingat harga jualnya yang tinggi dan bisa juga
            dipadukan dengan agrowisata.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ////////////////////////////Produk Section/////////////////////////// -->
  <section id="produk" class="produk-section bg-light">
    <div class="container">

      <!-- /////////////////////Produk Buah Naga Merah//////////////////////// -->
      <div id="produk" class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-lg-6">

          <img class="img-fluid" src="img/buah_merah.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-white">Buah Naga Merah</h4>
                <h4 class="text-white">Jus Buah Naga</h4>
                <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else,
                  along with a description.</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ///////////////////////Produk Buah Naga Putih///////////////////// -->
      <div class="row justify-content-center no-gutters">
        <div class="col-lg-6">
          <img class="img-fluid" src="img/buah_putih.jpg" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-right">
                <h4 class="text-white">Buah Naga Putih</h4>
                <h4 class="text-white">Keripik Buah Naga</h4>
                <p class="mb-0 text-white-50">Another example of a project with its respective description. These
                  sections work well responsively as well, try this theme on a small screen!</p>
                <hr class="d-none d-lg-block mb-0 mr-0">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- //////////////////////////Fasilitas Section////////////////////////// -->
  <section id="fasilitas" class="produk-section bg-light">
    <div class="container">

      <!-- ////////////////////////Fasilitas Agrowisata/////////////////////// -->
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
          <img class="img-fluid mb-3 mb-lg-0" src="img/agrowisata.png" alt="">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4>Agrowisata</h4>
            <p class="text-black-50 mb-0">Grayscale is open source and MIT licensed. This means you can use it for any
              project - even commercial projects! Download it, customize it, and publish your website!</p>
          </div>
        </div>

        <!-- ////////////////////////Fasilitas Petik Buah/////////////////////// -->
        <div class="row align-items-center no-gutters mb-4 mb-lg-5">
          <div class="col-xl-8 col-lg-7">
            <img class="img-fluid mb-3 mb-lg-0" src="img/petik_buah.png" alt="">
          </div>
          <div class="col-xl-4 col-lg-5">
            <div class="featured-text text-center text-lg-left">
              <h4>Petik Buah</h4>
              <p class="text-black-50 mb-0">Grayscale is open source and MIT licensed. This means you can use it for any
                project - even commercial projects! Download it, customize it, and publish your website!</p>
            </div>
          </div>

          <!-- ////////////////////////Fasilitas Penjualan Produk/////////////////////// -->
          <div class="row align-items-center no-gutters mb-4 mb-lg-5">
            <div class="col-xl-8 col-lg-7">
              <img class="img-fluid mb-3 mb-lg-0" src="img/penjualan_produk.png" alt="">
            </div>
            <div class="col-xl-4 col-lg-5">
              <div class="featured-text text-center text-lg-left">
                <h4>Penjualan Produk</h4>
                <p class="text-black-50 mb-0">Grayscale is open source and MIT licensed. This means you can use it for any
                  project - even commercial projects! Download it, customize it, and publish your website!</p>
              </div>
            </div>

          </div>
        </div>
  </section>

  <!-- Contact Section -->
  <section id="kontak_kami" class="kontak_kami_section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">

          <table class="kontak_kami_content" ; style="padding-left: 100px; padding-right: 100px">
            <tr>
              <td>Alamat</td>
              <td>: Jl. Tidar No.27, Kloncing Sumbersari, Kab. Jember, Jawa Timur 68124</td>
            </tr>

            <tr>
              <td>Telepon</td>
              <td>: 085229728848</td>
            </tr>

            <tr>
              <td>Whatsapp</td>
              <td>: 085229728848</td>
            </tr>

            <tr>
              <td>Instagram</td>
              <td>: @naurafarm_jember</td>
            </tr>
          </table>

        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; Naura Farm | Politeknik Negeri Jember
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>

</body>

</html>