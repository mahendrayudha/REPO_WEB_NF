<?php
$conn = mysqli_connect("localhost","root","","naura_farm");
session_start();
//$sql = $conn->query("SELECT * FROM user WHERE ID_USER='$id'");
//$tampil = $sql->fetch_assoc();

//mengambil id
$idu = $_SESSION['id_user'];
//$id = $_GET['id'];


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
  <title>Akun</title>

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
    <div class="card card-akun">
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text"
                    id="iduser"
                    class="form-control"
                    placeholder="ID User"
                    required="required"
                    name="iduser"
                    value="<?php echo $tampil['ID_USER'];?>" disabled>
              <label for="iduser">ID User</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="fullName"
                    class="form-control"
                    placeholder="Nama lengkap"
                    required="required"
                    name="namalengkap"
                    value="<?php echo $tampil['NAMA'];?>">
              <label for="fullName">Nama Lengkap</label>
            </div>
          </div>
        
          <div class="form-group">
            <div class="form-label-group">
              <input type="text"
                    id="phoneNumber"
                    class="form-control"
                    placeholder="Nomor telepon"
                    name="nomortelepon"
                    required="required"
                    onkeypress="return hanyaAngka(event)"
                    maxlength="14"
                    value="<?php echo $tampil['NOMOR_TELEPON'];?>">
              <label for="phoneNumber">Nomor Telepon</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="text"
                    id="address"
                    class="form-control"
                    placeholder="Alamat"
                    name="alamat"
                    required="required"
                    value="<?php echo $tampil['ALAMAT'];?>">
              <label for="address">Alamat</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="email"
                    id="inputEmail"
                    class="form-control"
                    placeholder="Email"
                    name="email"
                    required="required"
                    value="<?php echo $tampil['EMAIL'];?>" disabled>
              <label for="inputEmail">Email</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="text"
                    id="username"
                    class="form-control"
                    placeholder="Username"
                    required="required"
                    name="username"
                    value="<?php echo $tampil['USERNAME'];?>" disabled>
              <label for="username">Username</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="password"
                      id="inputPassword"
                      class="form-control"
                      placeholder="Kata sandi"
                      name="katasandi"
                      required="required"
                      value="<?php echo $tampil['PASSWORD'];?>">
              <label for="inputPassword">Kata Sandi</label>
            </div>
          </div>

          <button type="submit"
                  class="btn btn-primary"
                  style="width: 10rem"
                  name="edit-user"
                  href="akun.php">
                  Edit
          </button>

      <a href="akun.php">
        <button class="btn btn-danger"
                style="width: 10rem"
                name="cancel">
                Batal
        </button>
        </form>
      </div>
    </div>
  </section>
</body>

<?php

  if(isset($_POST["edituser"])) {
    //cek data berhasil ditambah?
    if('edituser'($_POST) > 0){
      echo "<script>
      alert('Data Berhasil Diubah');
      document.location.href =
      '?page=tabel-user';
      </script>";
    } else {
        echo "<script>alert('Gagal Mengubah Data')</script>";
      }   
  }

  //ubah data
  function edituser($data) {
    global $conn;
      $id = isset($_GET['id']) ? $_GET['id'] : null;
      $namalengkap = isset($_POST['namalengkap']) ? $_POST['namalengkap'] : null;
      $nomortelepon = isset($_POST['nomortelepon']) ? $_POST['nomortelepon'] : null;
      $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : null;
      $email = isset($_POST['email']) ? $_POST['email'] : null;
      $username = isset($_POST['username']) ? $_POST['username'] : null;
      $katasandi = isset($_POST['katasandi']) ? $_POST['katasandi'] : null;
          
  $query = "UPDATE user SET
    ID_USER='$id',
    NAMA='$namalengkap',
    NOMOR_TELEPON='$nomortelepon',
    ALAMAT='$alamat',
    EMAIL='$email',
    USERNAME='$username',
    PASSWORD='$katasandi'
    WHERE ID_USER='$id'";
  $sql= mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
  }
  ?>

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

</html>