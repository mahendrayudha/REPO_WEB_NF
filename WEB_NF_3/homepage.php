<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <title>Naura Farm</title>

  <!-- Bootstrap CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

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
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
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

        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
          Masuk
        </button>
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

      <div class="container">
        <label for="nama"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="nama" required />

        <div class="text"></div><label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" value="" id="myInput" required />
        <input type="checkbox" onclick="myFunction()">
        <div class="show">Show Password</div>

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

        <button type="submit" name="masuk">Masuk</button>
        <label>
          <input type="checkbox" checked="checked" name="remember" />
          Remember me
        </label>
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <!-- <button
          type="button"
          onclick="document.getElementById('id01').style.display='none'"
          class="cancelbtn">
          Cancel
        </button> -->
        <span class="psw"><a href="#">Lupa Password</a></span>
        <span class="rgst"><a href="#" onclick="hide()">Daftar Sekarang</a></span>
        <script>
          function hide() {
            document.getElementById('id01').style.display = 'none';
            document.getElementById('id02').style.display='block';
          }
        </script>
      </div>
    </form>
  </div>

<!-- action="/action_page.php"  -->

  <div id="id02" class="modal">
      <form class="modal-content animate" method="post">
          <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Tutup">
              &times;
          </span>
          <div class="imgcontainer">
              <img src="img/user.svg" alt="Avatar" class="avatar" />
          </div>

          <div class="container">
              <input type="hidden" name="ID_USER" value="" readonly />
              <input type="hidden" name="ID_STATUS" value="02" readonly />
              
              <label for="nama"><b>Nama</b></label>
              <input type="text" placeholder="Enter Name" name="nama" required />

              <div class="text"></div><label for="notelp"><b>Nomor Telpon</b></label>
              <input type="text" placeholder="Enter Nomor Telpon" name="notelp" required />

              <div class="text1"></div><label for="alamat"><b>Alamat</b></label>
              <input type="text" placeholder="Enter Alamat" name="alamat" required />

              <div class="text2"></div><label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="email" required />

              <div class="text3"></div><label for="username"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" required />

              <div class="text4"></div><label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" value="" id="myInput" required />
              <div class="text5"></div><input type="checkbox" onclick="myFunction()">
              <div class="show">Show Password</div>

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

              <button type="submit" name="daftar">Daftar</button>
              <label>
                  <div class="text6"></div><input type="checkbox" checked="checked" name="remember" />
                  Remember me
              </label>
          </div>
          <div class="container" style="background-color:#f1f1f1">
              <!-- <button
        type="button"
        onclick="document.getElementById('id01').style.display='none'"
        class="cancelbtn">
        Cancel
      </button> -->
              <span class="psw">Sudah Punya Akun? <a href="" onclick="back() name="daftar" ">Masuk</a></span>
              <script>
          function back() {
            document.getElementById('id02').style.display = 'none';
            document.getElementById('id01').style.display='block';
          }
        </script>
          </div>
      </form>
  </div>

  <script>

    // Get the modal
    var modal = document.getElementById("id01");

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  </script>

  <!-- /*/////////////////////////////////// CONNECTION DATABASE //////////////////////////////////*/ -->
  <!-- ////////////////////////////////////////DATABASE LOGIN///////////////////////////////////////// -->
  <?php
//   require 'functions.php';
//   session_start();
//   if(isset($_POST["masuk"])){

//   $username = $_POST['nama'];
//   $password = $_POST['psw'];


//   $result = mysqli_query($conn, "SELECT * FROM user WHERE USERNAME = '$username' AND PASSWORD = '$password'");

  

//   if( mysqli_num_rows($result) === 1 )
//   {
//     //cek password
//     $row = mysqli_fetch_assoc($result);
//     $_SESSION["login"] = true;
//     $_SESSION['user'] = $row ["NAMA_ANGGOTA"];
//     header("location: homepage.php");
    
//   }
//   else
//   {
//     header("location: login.php?gagal");
//   }
// }
?>

 <!-- ////////////////////////////////////////DATABASE REGISTER////////////////////////////////////////// -->
 <?php
// require 'functions.php';

// //cek tombol sudah ditekan atau belum
// if( isset ($_POST["daftar"]) )
// {
 
//         //cek data berhasil ditambah?
//         if( tambah($_POST) > 0 )
//         {
//                 echo "<script>
//                 alert('Data Berhasil Ditambahkan');
//                 document.location.href = 'homepage.php';
//                 </script>";
//         }
//         else
//         {
//                 echo "<script>alert('Gagal Menambahkan Data')</script>";
//         }
       
// }
// if(isset($_POST["batal"]))
// {
//         header("Location: homepage.php");
//         exit;
// }
?>



  <!-- Profil Section -->
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

  <!-- Produk Section -->
  <section id="produk" class="produk-section bg-light">
    <div class="container">

      <!-- Featured Project Row -->
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
          <img class="img-fluid mb-3 mb-lg-0" src="img/bg-masthead.jpg" alt="">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4>Shoreline</h4>
            <p class="text-black-50 mb-0">Grayscale is open source and MIT licensed. This means you can use it for any
              project - even commercial projects! Download it, customize it, and publish your website!</p>
          </div>
        </div>
      </div>

      <!-- Project One Row -->
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-lg-6">
          <img class="img-fluid" src="img/demo-image-01.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-white">Misty</h4>
                <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else,
                  along with a description.</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Project Two Row -->
      <div class="row justify-content-center no-gutters">
        <div class="col-lg-6">
          <img class="img-fluid" src="img/demo-image-02.jpg" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-right">
                <h4 class="text-white">Mountains</h4>
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

  <!-- Contact Section -->
  <section id="kontak_kami" class="kontak_kami-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">


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