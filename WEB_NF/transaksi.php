<?php
require 'functions.php';


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
    <link href="vendor/bootstrap/css/bootstrap1.css" rel="stylesheet">

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
<!-- Navigation -->

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container-fluid" style="padding-left: 100px!important; padding-right: 100px!important;">
                <div class="logo">
                    <a class="navbar-brand js-scroll-trigger" href="#page-top"> <img src="img/logo_nf.png" style="width: 60px;">
                        Naura Farm
                    </a>
                </div>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <section>
        <?php $ambil = $conn->query("SELECT * FROM produk"); ?>
        <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
            <div class="card tambah" style="width: 18rem;">
                <img style="height: 190px; width: 265px;" class="card-img-top img" src="img/<?php echo $perproduk["FOTO_PRODUK"] ?>" alt="">
                <div class="card-body">
                    <h5 class="card-title">Rp. <?php echo $perproduk["HARGA_JUAL"]; ?></h5>
                    <p class="card-text"><?php echo $perproduk["NAMA_PRODUK"]; ?></p>
                    <div style="display: flex; justify-content: center;">
                        <a href="transaksiproduk.php?id=<?php echo $perproduk["ID_PRODUK"]; ?>" class="btn btn-primary">Beli</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div style=" padding: 100px; display: flex; justify-content: center;">
            <a class="btn btn-warning" href="keranjang.php">Lihat Keranjang</a>
        </div>
    </section>
</body>
</html>