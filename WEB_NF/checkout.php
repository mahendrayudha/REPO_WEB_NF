<?php
  session_start();
  require 'functions.php';

  //mengambil id
  $idu = $_SESSION['id_user'];
  //menampilkan data user 
  $sql = $conn->query("SELECT * FROM user WHERE ID_USER = '$idu'");
  $tampil = mysqli_fetch_array($sql);
  $id = $_GET['id'];

  //cek session
  if (!isset($_SESSION["login"])) {
      header("location: homepage.php");
      exit;
  }

  //menampilkan produk berdasarkan id
  $ambil = $conn->query("SELECT produk.HARGA_JUAL FROM produk INNER JOIN keranjang ON keranjang.ID_PRODUK = produk.ID_PRODUK");
  $produk = mysqli_fetch_array($ambil);

  //menampilkan user berdasarkan id
  $ambil = $conn->query("SELECT keranjang.TGL_TRANSAKSI, user.NAMA, user.NOMOR_TELEPON, user.ALAMAT FROM user INNER JOIN keranjang ON keranjang.ID_USER = user.ID_USER");
  $peruser = mysqli_fetch_array($ambil);

  //menampilkan keranjang berdasarkan id
  $ambil = $conn->query("SELECT * FROM keranjang WHERE ID_TRANSAKSI = '$id'");
  $perproduk = mysqli_fetch_array($ambil);

  //cek session
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
        height: 100%;
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
  <header class="masthead">
      <div class="container d-flex h-100">
        <div class="mx-auto">
          <div class="card-container"
               style="margin-top:10%;">
            <div class="card-header">Invoice
            <!-- <a onclick="window.print();" id="print" class="btn btn-primary" style="color: white;"><i class="fa fa-book"></i> Cetak Nota</a> -->
            </div>
              <div class="transaksi-content" style="width: 50rem">
                <form method="POST" style="padding: 1rem 3rem">

                  <div class="table-responsive">
                    <div class="card-text">
                      <span>ID Transaksi : </span>
                      <?php echo $perproduk['ID_TRANSAKSI']; ?>
                    </div>

                    <div class="card-text">
                      <span>Nama Pembeli : </span>
                      <?php echo $tampil['NAMA']; ?>
                    </div>

                    <div class="card-text">
                      <span>Nomor Telepon : </span>
                      <?php echo $tampil['NOMOR_TELEPON']; ?>
                    </div>

                    <div class="card-text">
                      <span>Alamat : </span>
                      <?php echo $tampil['ALAMAT']; ?>
                    </div>

                    <div class="card-text">
                      <span>Tanggal Transaksi : </span>
                      <?php echo $peruser['TGL_TRANSAKSI']; ?></td>
                    </div>

                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white; margin-top: 1rem;">
                        <thead>
                          <tr>
                            <th style="display: none;">ID Produk</th>
                            <th>Nama Produk</th>
                            <th style="display: none;">ID User</th>
                            <th>Jumlah Beli</th>
                            <th>Harga Satuan</th>
                            <th>Total Harga</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $sql = $conn->query("SELECT * FROM keranjang WHERE ID_USER ='$idu' AND STATUS_ACC = 1 AND OPSI_PEMBAYARAN =1");
                            while ($data = $sql->fetch_assoc()) {
                              $transfer = ($data['OPSI_PEMBAYARAN']==1);
                              $transfer = 'Transfer';
                              $bayartunai = ($data['OPSI_PEMBAYARAN']==2);
                              $bayartunai = 'Bayar Tunai';
                          ?>
                            <tr>
                              <td style="display: none;"><?php echo $data['ID_PRODUK']; ?></td>
                              <td><?php echo $data['NAMA_PRODUK']; ?></td>
                              <td style="display: none;"><?php echo $data['ID_USER']; ?></td>
                              <td><?php echo $data['JUMLAH_BELI']; ?>
                                <span>
                                  <?php if($data ['ID_PRODUK']=='P001') {
                                      echo 'kg';
                                    } elseif($data ['ID_PRODUK']=='P002') {
                                      echo 'kg';
                                    } elseif($data['ID_PRODUK']=='P003') {
                                      echo 'botol';
                                    } elseif($data['ID_PRODUK']=='P004') {
                                      echo 'bungkus';
                                    } elseif($data['ID_PRODUK']=='P005') {
                                      echo 'pcs';
                                    } ?>
                                </span>
                              </td>
                              <td>Rp <?php echo $produk['HARGA_JUAL']; ?>
                              <span>
                                  <?php if($data ['ID_PRODUK']=='P001') {
                                      echo '/kg';
                                    } elseif($data ['ID_PRODUK']=='P002') {
                                      echo '/kg';
                                    } elseif($data['ID_PRODUK']=='P003') {
                                      echo '/botol';
                                    } elseif($data['ID_PRODUK']=='P004') {
                                      echo '/bungkus';
                                    } elseif($data['ID_PRODUK']=='P005') {
                                      echo '/pcs';
                                    } ?>
                                </span>
                              </td>
                              <td>Rp <?php echo $data['GRAND_TOTAL']; ?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>

                      <div class="" style="background: #28a745; padding: 0.5rem; color: white; border-radius: 3px; margin: 1rem 0rem;">
                        <a>Silahkan melakukan pembayaran ke <strong>Bank BNI 0801950724 A/N Naura Farm</strong></a>
                      </div>

                    <?php
                      if($perproduk["OPSI_PEMBAYARAN"]==1){
                        echo '<a href="https://api.whatsapp.com/send?phone=6282336055228"
                        class="btn btn-info"
                        name="send">
                        Kirim Bukti Pembayaran
                     </a>';
                      } else if($perproduk["OPSI_PEMBAYARAN"]==2){
                        echo '<a class="btn btn-info"
                        name="OK"
                        href="keranjang.php">
                        OK
                     </a>';
                      } else {
                        echo 'error';
                      }
                    ?>
                  <a class="btn btn-danger"
                     name="batal"
                     href="keranjang.php">
                     Batal
                  </a>
                </div>

    <script>
		  function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
		  }
	</script>

  </body>

</html>