<?php

//auto increment id transaksi

$carikode = mysqli_query($conn, "select max(ID_PRODUK)from produk") or die(mysqli_error($conn));
$datakode = mysqli_fetch_array($carikode);
if ($datakode) {
  $nilaikode = substr($datakode[0], 1);
  $kode = (int) $nilaikode;
  $kode = $kode + 1;
  $hasilkode = "P" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
  $hasilkode = "P001";
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

  <title>Admin - Tambah Produk</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>
  <div class="card-header">Tambah Produk</div>
  <div class="card-body">
    <form method="POST">
      <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="namaproduk" class="form-control" placeholder="Nama produk" required="required" name="namaproduk" autofocus="autofocus">
          <label for="namaproduk">Nama Produk</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="file" id="fotoproduk" class="form-control" required="required" name="fotoproduk" autofocus="autofocus">
          <label for="fotoproduk">Foto Produk</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="stokproduk" class="form-control" placeholder="Stok produk" name="stokproduk" required="required" onkeypress="return hanyaAngka(event)">
          <label for="stokproduk">Stok Produk</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="hargabeli" class="form-control" placeholder="Harga beli" name="hargabeli" required="required" onkeypress="return hanyaAngka(event)">
          <label for="hargabeli">Harga Beli</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="hargajual" class="form-control" placeholder="Harga jual" name="hargajual" required="required" onkeypress="return hanyaAngka(event)">
          <label for="hargajual">Harga Jual</label>
        </div>
      </div>

      <!-- <div class="form-group">
      <div class="form-label-group">
        <select id="status"
                class="form-control"
                required="required"
                name="status"
                autofocus="autofocus">
        <label for="status">Status</label>
        <option value="admin">1 Admin</option>
        <option value="karyawan">2 Karyawan</option>
        <option value="user">3 User</option>
      </div>
    </div> -->

      <button type="submit" class="btn btn-primary" name="tambahproduk" href="tabel-produk.php">
        Tambah Produk
      </button>

    </form>
  </div>

  <?php
  $conn = mysqli_connect("localhost", "root", "", "naura_farm");
  if ($conn === false) {
    die("ERROR: " . mysqli_connect_error());
  }

  $namaproduk = isset($_POST['namaproduk']) ? $_POST['namaproduk'] : null;
  $fotoproduk = isset($_POST['fotoproduk']) ? $_POST['fotoproduk'] : null;
  $stokproduk = isset($_POST['stokproduk']) ? $_POST['stokproduk'] : null;
  $hargabeli = isset($_POST['hargabeli']) ? $_POST['hargabeli'] : null;
  $hargajual = isset($_POST['hargajual']) ? $_POST['hargajual'] : null;
  $tambahproduk = isset($_POST['tambahproduk']) ? $_POST['tambahproduk'] : null;

  if (isset($_POST['tambahproduk'])) {
    $sql = $conn->query("INSERT INTO produk (ID_PRODUK, NAMA_PRODUK, FOTO_PRODUK, STOK_PRODUK, HARGA_BELI, HARGA_JUAL)
    values('$hasilkode', '$namaproduk', '$fotoproduk', '$stokproduk', '$hargabeli', '$hargajual')");
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Data Berhasil Disimpan");
        window.location.href = "?page=tabel-produk";
      </script>
  <?php
    }
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>