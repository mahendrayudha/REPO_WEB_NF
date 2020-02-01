<?php
  require 'functions.php';

  session_start();
  $conn = mysqli_connect("localhost", "root", "", "naura_farm");
  $idu = $_SESSION['id_user'];
  $id = $_GET['id'];

  if (!isset($_SESSION["login"])) {
    header("location: homepage.php");
    exit;
  }

  $carikode = mysqli_query($conn, "SELECT max(ID_USER)FROM user") or die (mysqli_error($conn));
  $datakode = mysqli_fetch_array($carikode);
  if($datakode) {
    $nilaikode = substr($datakode[0], 1 );
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "U" .str_pad($kode, 3, "0", STR_PAD_LEFT);
  }else{
    $hasilkode = "U001";
  }

//menampilkan keranjang berdasarkan id
  $sql = $conn->query("SELECT * FROM keranjang WHERE ID_TRANSAKSI='$id'");
  $tampil = $sql->fetch_assoc();
  $idproduknya = $tampil["ID_PRODUK"];
//menampilkan produk berdasarkan id
  $ambil = $conn->query("SELECT * FROM produk WHERE ID_PRODUK = '$idproduknya'");
  $perproduk = mysqli_fetch_array($ambil);
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
    </div>
  </nav>
  <section>
    <header class="masthead">
      <div class="container d-flex h-100">
        <div class="mx-auto">
          <div class="card-container"
               style="margin-top:10%;">
            <div class="card-header">Edit Keranjang</div>
              <div class="transaksi-content" style="width: 50rem">
                <form method="POST" style="padding: 1rem 3rem">

                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="hidden"
                             name="id_transaksi"
                             value="<?php echo $hasilkode; ?>">

                      <input type="hidden"
                             name="id_produk"
                             value="<?php echo $tampil["ID_PRODUK"]; ?>">

                      <input type="hidden"
                             name="id_user"
                             value="<?php echo $tampil["ID_USER"]; ?>">
                      <input type="hidden"
                             name="opsi_pembayaran"
                             value="<?php echo $tampil["OPSI_PEMBAYARAN"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text"
                             name="tglbeli"
                             id="tglbeli"
                             style="border-radius: 0"
                             value="<?php echo $tampil['TGL_TRANSAKSI']; ?>" readonly>
                      <label for="tglbeli">Tanggal Beli</label>
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="form-label-group">
                        <input id="harga"
                              name="harga"                              
                              type="text"
                              onkeyup="hitung();"
                              style="border-radius: 0; width: 39rem;"
                              value="<?php echo $perproduk["HARGA_JUAL"]; ?>" disabled readonly>
                              <span>
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
                           </span>
                        <label for="harga">Harga</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-label-group">
                      <input id="jumlah"
                             name="jumlah"
                             type="text"
                             style="border-radius: 0; width: 39rem;"
                             onkeyup="hitung();"
                             onkeypress="return hanyaAngka(event)"
                             value="<?php echo $tampil['JUMLAH_BELI']; ?>">
                             <span>
                             <?php if($perproduk ['ID_PRODUK']=='P001') {
                               echo 'kg';
                             } elseif($perproduk ['ID_PRODUK']=='P002') {
                               echo 'kg';
                             } elseif($perproduk['ID_PRODUK']=='P003') {
                               echo 'botol';
                             } elseif($perproduk['ID_PRODUK']=='P004') {
                               echo 'bungkus';
                             } elseif($perproduk['ID_PRODUK']=='P005') {
                               echo 'pcs';
                             } ?>
                           </span>
                      <label for="jumlah">Jumlah Beli</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-label-group">
                      <input id="total"
                             name="total"
                             type="text"
                             style="border-radius: 0"
                             onkeyup="hitung();"
                             value="<?php echo $tampil["GRAND_TOTAL"]; ?>" readonly>
                      <label for="total">Grand Total</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-label-group">
                      <input id="alamat"
                             name="alamat"
                             type="text"
                             style="border-radius: 0"
                             rows="5"
                             value="<?php echo $tampil['ALAMAT']; ?>">
                      <label for="alamat">Alamat</label>
                    </div>
                  </div>

                  <div class="form-group">
                  <label for="opsi" style="color: black">Opsi Pembayaran</label>
                    <div class="form-label-group">
                      <Select type="text"
                             class="form-control"
                             id="opsi"
                             name="opsi"
                             style="color: black">
                        <?php if($tampil ['OPSI_PEMBAYARAN']==1) {
                          echo 'Transfer'; ?>
                          <option value="1">Transfer</option>
                          <option value="2">Bayar Tunai</option>
                          <?php } elseif($tampil ['OPSI_PEMBAYARAN']==2) {
                          echo 'Transfer'; ?>
                          <option value="2">Bayar Tunai</option>
                          <option value="1">Transfer</option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>

                  <button type="submit"
                          href="keranjang.php"
                          class="btn btn-info"
                          name="editkeranjang"
                          style="width: 10rem;">
                          Simpan
                  </button>

                  <a class="btn btn-danger"
                     name="batal"
                     href="keranjang.php">
                     Batal
                  </a>
                </form>
              </div>
          </div>
        </div>
      </div>
    </header>
  </section>

    <?php
    if (isset($_POST["editkeranjang"])) {
      $jumlah = $_POST['jumlah'];
      $hg = $_POST['total'];
      $alamat = $_POST['alamat'];
      $opsi = $_POST['opsi'];
      $update = "UPDATE keranjang SET ID_TRANSAKSI='$id', JUMLAH_BELI='$jumlah', GRAND_TOTAL='$hg',ALAMAT='$alamat', OPSI_PEMBAYARAN='$opsi' WHERE ID_TRANSAKSI='$id'";
      if ($conn->query($update) === TRUE) {
          echo "<script>
        alert('Data Berhasil Diubah');
        document.location.href =
        'keranjang.php';
        </script>";
      } else {
        echo "<script>alert('Gagal Mengubah Data')</script>";
      }
      $conn->close();
    }
    ?>

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