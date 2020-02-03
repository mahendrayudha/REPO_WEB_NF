<?php
require 'functions.php';

session_start();
$conn = mysqli_connect("localhost", "root", "", "naura_farm");
$idu = $_SESSION['id_user'];
  if (!isset($_SESSION["login"])) {
    header("location: homepage.php");
    exit;
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
  <title>Transaksi</title>

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
  <style>
  body {
    width: 100%;
    height: auto;
    padding: 0;
    display: block;
    margin: 0 auto;
    max-height: 100%;
    max-width: 100%;
    background: url(img/bg-masthead.JPG);
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;
  }
  </style>
</head>

<body>
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
                  <a class="dropdown-item" href="keranjang.php">Keranjang</a>
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
  <section>
    <?php $ambil = $conn->query("SELECT * FROM produk"); ?>
    <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
      <div class="card tambah" style="width: 18rem;">
        <img style="height: 190px; width: 265px;" class="card-img-top img" src="img/<?php echo $perproduk["FOTO_PRODUK"] ?>" alt="Foto Produk">
        <div class="card-body">
          <h5 class="card-title">Rp <?php echo $perproduk["HARGA_JUAL"]; ?>
          <?php if($perproduk ['ID_PRODUK']=='P001') {
            echo '/kg';
          } elseif($perproduk ['ID_PRODUK']=='P002') {
            echo '/kg';
          } elseif($perproduk['ID_PRODUK']=='P003') {
            echo '/botol';
          } elseif($perproduk['ID_PRODUK']=='P004') {
            echo '/bungkus';
          } elseif($perproduk['ID_PRODUK']=='P005') {
            echo '/pcs';
            } ?>
          </h5>
          <p class="card-text"><?php echo $perproduk["NAMA_PRODUK"]; ?></p>
          <div style="display: flex; justify-content: center;">
            <?php
            if($perproduk["STOK_PRODUK"] > 0){
              echo '<a href="transaksiproduk.php?id='.$perproduk["ID_PRODUK"].'" class="btn btn-primary btn-sm">Beli</a>';
            } else if($perproduk["STOK_PRODUK"] < 0) {
              echo '<a href="#" class="btn btn-secondary btn-sm disabled">Stok Habis</a>';
            } else {
              echo '<a href="#" class="btn btn-secondary btn-sm disabled">Stok Habis</a>';
            }
            ?>
          </div>
        </div>
      </div>
    <?php } ?>

    <div style="padding: 50px; display: flex; justify-content: center; ">
      <a class="btn btn-warning" href="keranjang.php">Lihat Keranjang</a>
    </div>

    <div class="notif" style="background: #28a745; padding: 0.5rem; color: white; border-radius: 3px; margin: 1rem 0rem;">
      <a>*Jika ingin membeli produk olahan (<strong>Jus Buah Naga, Keripik Buah Naga,</strong> dan <strong>Selai Buah Naga</strong>)
        silahkan memesan melalui Whatsapp kami <a style="color:white;" href="https://api.whatsapp.com/send?phone=6282336055228"><u>082336055228</u></a> (Arik)</a>
    </div>

  </section>
</body>
</html>
