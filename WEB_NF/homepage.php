<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "naura_farm");

//auto increment id user

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

?>

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
    <div class="container-fluid" style="padding-left: 100px!important; padding-right: 100px!important;">
      <div class="logo">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
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
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
                <?php
                if (isset($_SESSION['login'])) {
                  echo $_SESSION["user"];
                  // echo
                } ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <!-- Session utk merubah nav akun login/register menjadi akun/keluar saat kondisi user sedang login -->
                <?php
                if (isset($_SESSION['login'])) {
                  ?>
                  <a class="dropdown-item" href="akun.php">Akun</a>
                  <a class="dropdown-item" href="keranjang.php">Keranjang</a>
                  <a class="dropdown-item" onclick="return confirm('Apakah Anda yakin Ingin Keluar?')" href="keluar.php">Keluar</a>
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
        <h1 class="mx-auto my-0 text-uppercase">Selamat Datang di Naura Farm</h1>
        <h2 class="">Agrowisata Buah Naga Jember</h2>

        <!-- /*/////////////////////////////////// FORM LOGIN //////////////////////////////////*/ -->

        <!-- Session utk merubah button masuk menjadi keluar saat kondisi user sedang login -->
        <?php
        if (isset($_SESSION['login'])) {
          ?>
          <!-- <a href="keluar.php">
            <button class="out" style="width:auto;">
              Keluar
            </button>
          </a> -->
        <?php
        } else {
          ?>
          <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-primary" style="width:auto; margin-top:50px;">
            Masuk
          </button>
        <?php
        }
        ?>
      </div>
    </div>
  </header>

  <div id="id01" class="modal">
    <form class="modal-content animate" method="post">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Tutup">
        &times;
      </span>
      <div class="imgcontainer">
        <img src="img/user.svg" alt="Avatar" class="avatar" />
      </div>
      <div class="card-body">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text"
                     id="username"
                     class="form-control"
                     placeholder="Username"
                     required="required"
                     name="nama">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password"
                           id="myInput"
                           class="form-control"
                           placeholder="Password"
                           required="required"
                           name="psw"
                           minlength="8" maxlength="20">
              <label for="inputPassword">Kata Sandi</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="checkbox" onclick="myFunction()">
              <div class="show"> Show Password</div>
            </div>
          </div>

          <script>
            function myFunction() {
              var x = document.getElementById("myInput");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
          </script>

          <button type="submit" class="btn btn-primary" name="masuk">Masuk</button>

          <label>
            <input type="checkbox" checked="checked" name="remember">
             Remember me
          </label>
      </div>

      <div class="modal-footer" style="background-color: white">
        <span class="psw"><a href="forgotpassword.php">Lupa Password</a></span>
        <span class="rgst"><a href="#" onclick="hide()">Daftar Sekarang</a></span>
        <script>
          function hide() {
            document.getElementById('id01').style.display = 'none';
            document.getElementById('id02').style.display = 'block';
          }
        </script>
      </div>
    </form>
  </div>

  <!-- /*/////////////////////////////////// FORM REGISTER //////////////////////////////////*/ -->

  <div id="id02" class="modal">
    <form class="modal-content animate" method="post">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Tutup">
        &times;
      </span>
      <div class="imgcontainer">
        <img src="img/user.svg" alt="Avatar" class="avatar" />
      </div>

      <div class="card-body">

        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="nama" class="form-control" required="required" name="nama" placeholder="Nama Lengkap" required maxlength="100">

            <label for="nama">Nama Lengkap</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="notelp" class="form-control" required="required" name="notelp" placeholder="Nomor Telepon" onkeypress="return hanyaAngka(event)" required maxlength="13">

            <label for="notelp">Nomor Telepon</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="alamat" class="form-control" required="required" placeholder="Alamat" name="alamat">
            <label for="alamat">Alamat</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="email" class="form-control" required="required" placeholder="Email" name="email">
            <label for="email">Email</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="username" class="form-control" required="required" placeholder="Username" name="username">
            <label for="username">Username</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="my-Input" class="form-control" required="required" placeholder="Password" minlength="8" maxlength="20" name="psw">
            <label for="psw">Password</label>
          </div>
        </div>

        <input type="checkbox" onclick="myfunction()">
        <div class="show">Show Password</div>

        <script>
          function myfunction() {
            var x = document.getElementById("my-Input");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
          }
        </script>

        <button type="submit"
                class="btn btn-primary"
                name="daftar"
                href="homepage.php">
                Daftar
        </button>
      </div>
      <div class="container" style="background-color:#f1f1f1">
        <!-- <button
        type="button"
        onclick="document.getElementById('id01').style.display='none'"
        class="cancelbtn">
        Cancel
      </button> -->
        <span class="psw">Sudah Punya Akun? <a href="#" onclick="back()" name="daftar">Masuk</a></span>
        <script>
          function back() {
            document.getElementById('id02').style.display = 'none';
            document.getElementById('id01').style.display = 'block';
          }
        </script>
      </div>
    </form>
  </div>

  <script>
    // Get the modal
    var modal = document.getElementById("id01");

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  </script>

  <!-- /*/////////////////////////////////// CONNECTION DATABASE //////////////////////////////////*/ -->
  <!-- //////////////////////////////////////  DATABASE LOGIN  /////////////////////////////////////// -->
  <?php
  if (isset($_POST["masuk"])) {

    $username = $_POST['nama'];
    $password = $_POST['psw'];


    $result =  $conn->query("SELECT * FROM user WHERE USERNAME = '$username' AND PASSWORD = '$password'");

    if (mysqli_num_rows($result) === 1) {
      //cek password
      $row = mysqli_fetch_assoc($result);
      $_SESSION["login"] = true;
      $_SESSION['user'] = $row["USERNAME"];
      $_SESSION['id_user'] = $row["ID_USER"];
      $_SESSION['level'] = $row['LEVEL'];
      $lv = $row['LEVEL'];
      if($lv == 1){
        echo "<script>alert ('Login Berhasil : Admin');window.location.href='admin/index.php?page=dashboard'</script>";
      } else if($lv == 2){
        echo "<script>alert ('Login Berhasil : Karyawan');window.location.href='admin/index.php?page=dashboard'</script>";
        include "tabel-user.php";
      } else if($lv == 3){
        echo "<script>alert ('Login Berhasil');window.location.href='homepage.php'</script>";
      }
    } else {
      echo "<script>alert ('Login Gagal')</script>";
    }
  }
  ?>

  <!-- ////////////////////////////////////////DATABASE REGISTER////////////////////////////////////////// -->
  <?php
  $conn = mysqli_connect("localhost", "root", "", "naura_farm");
  if ($conn === false) {
    die("ERROR: " . mysqli_connect_error());
  }
  global $conn;
  // $id_user = htmlspecialchars($data["ID_ANGGOTA"]);
  $nama = htmlspecialchars(isset($_POST['nama'])) ? $_POST['nama'] : null;
  $notelp = htmlspecialchars(isset($_POST['notelp'])) ? $_POST['notelp'] : null;
  $alamat = htmlspecialchars(isset($_POST['alamat'])) ? $_POST['alamat'] : null;
  $email = htmlspecialchars(isset($_POST['email'])) ? $_POST['email'] : null;
  $username = htmlspecialchars(isset($_POST['username'])) ? $_POST['username'] : null;
  $password = htmlspecialchars(isset($_POST['psw'])) ? $_POST['psw'] : null;
  $daftar = isset($_POST['daftar']) ? $_POST['daftar'] : null;

  if (isset($_POST['daftar'])) {
    $sql = $conn->query("insert into user (ID_USER, NAMA, NOMOR_TELEPON, ALAMAT, EMAIL, USERNAME, PASSWORD, LEVEL)
            values('$hasilkode', '$nama','$notelp','$alamat','$email','$username','$password','3')");

    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Data Berhasil Disimpan");
        window.location.href = "homepage.php";
      </script> -->
  <?php
    }
  }
  ?>

  <!-- ////////////////////////////Profil Section/////////////////////////// -->
  <section id="profil" class="masthead text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <img src="img/logo_nf.png" class="img-fluid" alt="Logo Naura Farm" style="width: 466px;">
          <h2 class="text-white mb-4">Apa itu Naura Farm?</h2>
          <p class="text-white" style="text-align:justify">Naura Farm adalah perusahaan buah naga yang berada di kabupaten Jember
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

          <img width="555" height="453" src="img/buah_merah.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-white">Buah Naga Merah</h4>
                <p class="mb-0 text-white-50" style="text-align:justify">Disebut dengan buah naga merah, karena daging buahnya berwarna merah keunggulan. warna kulit buahnya cenderung gelap. buah ini rasanya manis sekali. Meskipun begitu, baik untuk kita konsumsi karena kadar gula alaminya tidak terlalu bnyak. Buah naga merah mengandung antioksidan, kalsium, fosfor yang tinggi. Selain itu, buah ini juga mengandung betasianin yang bisa melindungi tubuh kita dari peyakit hati.</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ///////////////////////Produk Buah Naga Putih///////////////////// -->
      <div class="row justify-content-center no-gutters">
        <div class="col-lg-6">
          <img width="465" height="480" src="img/buah_putih.jpg" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-right">
                <h4 class="text-white">Buah Naga Putih</h4>
                <p class="mb-0 text-white-50" style="text-align:justify">Buah naga putih, daging buahnya berwarna putih. kulit buahnya berwarna merah muda yang lebih cerah daripada buah naga merah. Ukurannya pun lebih kecil dibandingkan buah naga merah. Buah naga putih kaya akan vitamin C dan antioksidan. Hanya saja, antioksidan di dalam buah naga putih lebih sedikit. jadi, jika dibandingkan buah naga putih dan merah, buah naga merah kandugannya lebih banyak.</p>
                <hr class="d-none d-lg-block mb-0 mr-0">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- /////////////////////Produk Jus Buah Naga//////////////////////// -->
      <div id="produk" class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-lg-6">

          <img width="555" height="453" src="img/jus.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-white">Jus Buah Naga</h4>
                <p class="mb-0 text-white-50" style="text-align:justify">Cara mengkonsumsi buah naga sangatlah mudah, salah satu cara mengkonsumsinya adalah dengan menjadikannya jus buah naga. Dengan dijadikannya jus buah kita jadi mudah untuk membawanya kemana – mana tanpa takut buah naga tersebut terhimpit oleh barang bawaan yang lainnya. Dan nutrisi yang terkandung di dalamnya tidak akan hancur atau hilang.</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ///////////////////////Produk Selai Buah Naga///////////////////// -->
      <div class="row justify-content-center no-gutters">
        <div class="col-lg-6">
          <img width="465" height="453" src="img/selai.jpg" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-right">
                <h4 class="text-white">Selai Buah Naga</h4>
                <p class="mb-0 text-white-50" style="text-align:justify">Selai buah naga adalah salah satu jenis makanan awetan berupa sari buah yang sudah dihancurkan, ditambah gula dan dimasak hingga kental atau berbentuk setengah padat. Selai tidak dimakan begitu saja, melainkan untuk dioleskan di atas roti tawar atau sebagai isi roti manis, isian pada kue kering seperti nastar dan pemanis pada minuman seperti yogurt.</p>
                <hr class="d-none d-lg-block mb-0 mr-0">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->

      <!-- /////////////////////Produk Keripik Naga Merah//////////////////////// -->
      <div id="produk" class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-lg-6">

          <img width="465" height="602.78" src="img/Kripik.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-white">Keripik Buah Naga Merah</h4>
                <p class="mb-0 text-white-50" style="text-align:justify"> Salah satu olahan makanan yang terbuat dari buah naga adalah keripik buah naga. Olahan makanan keripik buah naga ini memiliki cita rasa yang unik. Keripik buah naga ini memang sangat cocok untuk anda jadikan camilan yang bisa anda nikmati bersama keluarga tercinta anda atau bersama rekan terdekat anda. Olahan camilan keripik buah naga memang sudah tidak asing lagi, namun keripik buah naga bisa dibilang ini masih jarang kita jumpai. Namun meskipun olahan keripik buah naga ini jarang kita temui olahan makanan ini juga menjadi salah satu olahan makanan yang difavoritkan oleh masyarakat mulai dari kalangan anak - anak hingga kalangan dewasa. </p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- ////////////////////////////Produk Section/////////////////////////// -->
  <section id="produk" class="produk-section bg-light">
    <div class="container">
  </section>

  <!-- //////////////////////////Fasilitas Section////////////////////////// -->
  <section id="fasilitas" class="produk-section bg-light">
    <div class="container">

      <!-- ////////////////////////Fasilitas Agrowisata/////////////////////// -->
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
          <img width="580" height="416" src="img/Agrowisata.png" alt="Gambar Fasilitas Agrowisata">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4>Agrowisata</h4>
            <p class="text-black-50 mb-0" style="text-align:justify">Salah suatu fasilitas kunjungan yang di tawarkan oleh Naura Farm yang di kombinasikan menjadi tempat destinasi yang menarik bagi masyarakat. Pengunjung dapat belajar tentang merawat buah naga, menanam buah naga serta, menikmati buah segar hasil petikan langsung dari pohonnya. Selain itu, pengunjung juga bisa sekedar jalan-jalan dan menghirup udara segar.</p>
          </div>
        </div>
      </div>

      <!-- ////////////////////////Fasilitas Petik Buah/////////////////////// -->
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
          <img width="580" height="416" src="img/petik_buah.png" alt="Gambar Fasilitas Petik Buah">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4>Petik Buah</h4>
            <p class="text-black-50 mb-0" style="text-align:justify">Salah satu fasilitas yang di tawarkan oleh Naura Farm adalah petik buah.Dimana pengunjung dapat melakukan pemetikan buah naga langsung dari pohonnya. Hasil yang di dapat bisa langsung dibawa pulang dengan harga yang terjangkau. Sehingga pengunjung tidak usah khawatir tentang kualitas buah yang ada di Naura Farm.</p>
          </div>
        </div>
      </div>

      <!-- ////////////////////////Fasilitas Penjualan Produk/////////////////////// -->
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
          <img width="580" height="416" src="img/penjualan_produk.png" alt="Gambar Fasilitas Penjualan Produk">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4>Penjualan Produk</h4>
            <p class="text-black-50 mb-0" style="text-align:justify">Kita juga menjual Produk Buah Naga merah dan putih yang kita produksi sendri dan beberapa produk olahan yang di buat oleh Naura Farm yaitu selai buah, keripik buah, dan jus buah naga.</p>
            <?php
            if (isset($_SESSION['login'])) {
              ?>
              <a href="transaksi.php">
                <button class="btn btn-primary"
                        style="width:auto; margin-top:50px;">
                  Beli Produk
                </button>
              </a>
            <?php
            } else {
              ?>
              <button onclick="document.getElementById('id01').style.display='block'"
                      class="btn btn-primary"
                      style="width:auto; margin-top:50px;">
                Beli Produk
              </button>
            <?php
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="kontak_kami" class="kontak_kami_section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto">
          <table class="kontak_kami_content">
            <tr>
              <td>Alamat</td>
              <td>: Jl. Tidar No.27, Kloncing Sumbersari, Kab. Jember, Jawa Timur</td>
            </tr>

            <tr>
              <td>Telepon</td>
              <td>: 085229728848</td>
            </tr>

            <tr>
              <td>Whatsapp</td>
              <td>: 082336055228</td>
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

  <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }
  </script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>

</body>

</html>
