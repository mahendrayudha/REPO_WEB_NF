<?php
  $conn = new mysqli("localhost", "root", "", "naura_farm");
  session_start();
  require 'functions.php';

  //mengambil id
  $idu = $_SESSION['id_user'];
  $id = $_GET['id'];

  //cek session
  if (!isset($_SESSION["login"])) {
      header("location: homepage.php");
      exit;
  }

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
                  }
                ?>
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
    </div>
  </nav>
  <section>
    <header class="masthead">
      <div class="container d-flex h-100">
        <div class="mx-auto">
          <div class="card-container"
               style="margin-top:10%;">
            <div class="card-header">Beli Produk</div>
              <div class="transaksi-content" style="width: 50rem">
                <form method="POST" style="padding: 1rem 3rem">
                  <!-- <img src="img/<?php echo $perproduk["FOTO_PRODUK"]; ?>"
                       alt="Foto Produk"
                       style="width: 15rem; display: block; margin-left: auto; margin-right: auto;">
                  <p style="text-align:center"><?php echo $perproduk["NAMA_PRODUK"]; ?></p> -->

                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="hidden"
                             name="tanggal" id="tanggal" value="<?php
                             $tanggal = mktime(date("d"), date("m"), date("Y"));
                             echo " " . date("d/m/Y", $tanggal) . " ";
                             date_default_timezone_set('Asia/Jakarta');
                             // echo date("h:i:sa");
                             ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="hidden"
                             name="id_transaksi"
                             value="<?php echo $perproduk["ID_TRANSAKSI"]; ?>" readonly>

                      <input type="hidden"
                             name="id_produk"
                             value="<?php echo $perproduk["ID_PRODUK"]; ?>" readonly>

                      <input type="hidden"
                             name="id_user"
                             value="<?php echo $idu ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-label-group">
                      <input id="nama_produk"
                             name="nama_produk"
                             placeholder="Nama Produk"
                             type="text"
                             style="border-radius: 0"
                             value="<?php echo $perproduk["NAMA_PRODUK"]; ?>" readonly>
                      <label for="nama_produk">Nama Produk</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-label-group">
                      <input id="jumlah"
                             name="jumlah"
                             placeholder="Jumlah Beli"
                             type="text"
                             style="border-radius: 0"
                             onkeypress="return hanyaAngka(event)"
                             value="<?php echo $perproduk["JUMLAH_BELI"] ?>" readonly>
                      <label for="jumlah">Jumlah Beli</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-label-group">
                      <input id="total"
                             name="total"
                             placeholder="Grand Total"
                             type="text"
                             style="border-radius: 0"
                             onkeypress="return hanyaAngka(event)"
                             value="<?php echo $perproduk["GRAND_TOTAL"] ?>" readonly>
                      <label for="total">Total</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-label-group">
                      <input id="alamat"
                             name="alamat"
                             placeholder="Alamat"
                             type="text"
                             style="border-radius: 0"
                             value="<?php echo $perproduk["ALAMAT"] ?>" readonly></input>
                      <label for="alamat">Alamat</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-label-group">                                        
                      <input id="opsi"
                             name="opsi"
                             type="hidden"
                             value="<?php echo $perproduk["OPSI_PEMBAYARAN"] ?>" readonly></input>          
                    </div>
                  </div>

                  <a href="https://api.whatsapp.com/send?phone=6282336055228"
                     class="btn btn-info"
                     name="send">
                     Kirim Bukti Pembayaran
                  </a>
                  <a class="btn btn-danger"
                     name="batal"
                     href="keranjang.php">
                     Batal
                  </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>

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