<?php
include "koneksi.php";
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
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="namaproduk" class="form-control" placeholder="Nama produk" required="required" name="namaproduk" autofocus="autofocus">
          <label for="namaproduk">Nama Produk</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="file" accept="image/*" id="fotoproduk" class="form-control" required="required" name="fotoproduk" autofocus="autofocus">
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
          <input type="text" id="hargajual" class="form-control" placeholder="Harga jual" name="hargajual" required="required" onkeypress="return hanyaAngka(event)">
          <label for="hargajual">Harga Jual</label>
        </div>
      </div>

      <input type="submit" class="btn btn-primary" id="tambahproduk" name="tambahproduk" value="Tambah Produk" href="tabel-produk.php">

      <a href="index.php?page=tabel-produk">
        <button class="btn btn-danger" name="cancel">
          Batal
        </button>
      </a>

    </form>
  </div>

  

  <?php
    if (isset($_POST['tambahproduk'])) {
    $sqlcek = $conn->query("SELECT * FROM produk WHERE NAMA_PRODUK='$namaproduk'");
    $cek = mysqli_query($conn, $sqlcek);

    if (mysqli_num_rows($sqlcek) > 0) {
      $row = mysqli_fetch_assoc($sqlcek);
      if ($namaproduk == $row['NAMA_PRODUK']) {
         echo "Produk Sudah Ada";
  ?>
        <script type="text/javascript">
          alert("Produk Sudah Ada");
        </script>
      <?php
      }
    } else {
      $sql = $conn->query("INSERT INTO produk (ID_PRODUK, NAMA_PRODUK, FOTO_PRODUK, STOK_PRODUK, HARGA_JUAL)
    values('$hasilkode', '$namaproduk', '$fotoproduk', '$stokproduk', '$hargajual')");
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