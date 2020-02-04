<?php
$conn = new mysqli("localhost","u5445042_tifa","tifa2020","u5445042_naurafarm");
session_start();
require 'functions.php';

//mengambil id
$idu = $_SESSION['id_user'];
// $id = $_GET['id'];


//cek session
if (!isset($_SESSION["login"])) {
    header("location: index.php");
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
        height: 32rem;
        padding: 0;
        display: block;
        margin: 0 auto;
        background: url(img/bg-masthead.JPG);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container-fluid" style="padding-left: 100px!important; padding-right: 100px!important;">
      <div class="logo">
        <a class="navbar-brand js-scroll-trigger" href="index.php">
          <img src="img/logo_nf.PNG" style="width: 60px">
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
            <a class="nav-link js-scroll-trigger" href="index.php">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">Fasilitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">Kontak Kami</a>
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
        <form style="padding-top: 100px" action="" method="POST">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white">
                        <thead>
                            <tr>
                                <th style="display: none;">ID Transaksi</th>
                                <th style="display: none;">ID Produk</th>
                                <th>NAMA PRODUK</th>
                                <th style="display: none;">ID User</th>
                                <th>Jumlah Beli</th>
                                <th>Tanggal Beli</th>
                                <th>Alamat</th>
                                <th>Opsi Pembayaran</th>
                                <th>Total Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $sql = $conn->query("SELECT * FROM keranjang WHERE ID_USER ='$idu' AND STATUS_ACC = 1");
                                    while ($data = $sql->fetch_assoc()) {
                                      $transfer = ($data['OPSI_PEMBAYARAN']==1);
                                      $transfer = 'Transfer';
                                      $bayartunai = ($data['OPSI_PEMBAYARAN']==2);
                                      $bayartunai = 'Bayar Tunai';
                            ?>
                                <tr>
                                    <td style="display: none;"><?php echo $data['ID_TRANSAKSI']; ?></td>
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
                                    <td><?php echo $data['TGL_TRANSAKSI']; ?></td>
                                    <td><?php echo $data['ALAMAT']; ?></td>
                                    <td><?php if($data ['OPSI_PEMBAYARAN']==1) {
                                      echo $transfer;
                                    } elseif($data ['OPSI_PEMBAYARAN']==2) {
                                      echo $bayartunai; 
                                    } ?>
                                    </td>
                                    <td><?php echo $data['GRAND_TOTAL']; ?></td>
                                    <td>
                                        <a class="btn-primary btn-sm"
                                           style="padding: 10px; margin: 5px; border-radius: 5px;"
                                           href="edit-keranjang.php?id=<?php echo $data['ID_TRANSAKSI'];?>">
                                           Edit
                                        </a>
                                        <a class="btn-danger btn-sm"
                                           style="padding: 10px; margin: 5px; border-radius: 5px;"
                                           href="hapus-keranjang.php?id=<?php echo $data['ID_TRANSAKSI']; ?>"
                                           onclick="return confirm('Apakah Anda yakin untuk menghapus pesanan?')">
                                           Hapus
                                        </a>
                                        <?php
                                          if($data['OPSI_PEMBAYARAN'] == 1) {
                                        ?>
                                        <a class="btn-info btn-sm"
                                           style="padding: 10px; margin: 5px; border-radius: 5px;"
                                           href="checkout.php?id=<?php echo $data['ID_TRANSAKSI']; ?>">
                                           Checkout
                                        </a>
                                        <?php
                                          }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <div style="margin: 0px 0px 0px 20px">
            <a class="btn btn-warning" href="transaksi.php">kembali</a>
        </div>
    </section>

    <script>
        function hitung() {
            var txtFirstNumberValue = document.getElementById('harga').value;
            var txtSecondNumberValue = document.getElementById('jumlah').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(txtSecondNumberValue)) {
                document.getElementById('total').value = result;
            }
        }
    </script>
</body>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>

</html>