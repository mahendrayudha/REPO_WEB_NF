<?php
require 'functions.php';

$id = $_GET['id'];

$ambil = $conn->query("SELECT * FROM produk WHERE ID_PRODUK = '$id'");
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
    <style>
        body {
            background-image: url(img/bg-masthead.JPG);
            /* background-color: gray; */
        }
    </style>
</head>
<!-- Navigation -->


<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container-fluid" style="padding-left: 100px!important;
    padding-right: 100px!important;">
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
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle fa-fw"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <!-- Session utk merubah nav akun login/register menjadi akun/keluar saat kondisi user sedang login -->
                                    <?php
                                    if (isset($_SESSION['login'])) {
                                        ?>
                                        <a class="dropdown-item" href="#" onclick="document.getElementById('id01').style.display='block'">Akun</a>
                                        <a class="dropdown-item" href="keluar.php">Keluar</a>
                                    <?php
                                    } else {
                                        ?>
                                        <a class="dropdown-item" href="#" onclick="document.getElementById('id01').style.display='block'">Masuk</a>
                                        <a class="dropdown-item" href="#" onclick="document.getElementById('id02').style.display='block'">Daftar</a>
                                    <?php } ?>
                            </li>
                    </ul>
                </div>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <section>
        <form action="">
            <h1><?php echo $perproduk["NAMA_PRODUK"]; ?></h1>
            <div class="transaksi-content tambah">
                <img src="img/<?php echo $perproduk["FOTO_PRODUK"]; ?>" alt="">
                <table>
                    <tr>
                        <td>
                            <input id="harga" type="text" name="" onkeyup="hitung()" value="<?php echo $perproduk["HARGA_JUAL"]; ?>" readonly>
                            Harga
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" name="" id="" value="<?php echo $perproduk["STOK_PRODUK"]; ?>" readonly>
                            Stok
                        </td>
                    </tr>
                    <tr>
                        <td><input id="jumlah" type="number" placeholder="Jumlah beli" onkeyup="hitung()">Jumlah Beli</td>
                    </tr>
                    <tr>
                        <td><input id="total" type="number">Total Harga</td>
                    </tr>
                </table>
            </div>
        </form>
    </section>

    <script>
        function hitung(); {
            var txtFirstNumberValue = document.getElementById('harga').value;
            var txtSecondNumberValue = document.getElementById('jumlah').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(txtSecondNumberValue)) {
                document.getElementById('total').value = result;
            }

        }
    </script>
</body>