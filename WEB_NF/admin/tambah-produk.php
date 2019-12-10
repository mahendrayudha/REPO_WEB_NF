<?php
// $carikode = mysqli_query($conn, "SELECT max(ID_PRODUK) FROM produk") or die(mysqli_error($conn));
// $datakode = mysqli_fetch_array($carikode);
// if($datakode)
// {
//         $nilaikode = substr($datakode[0], 2);
//         $kode = (int) $nilaikode;
//         $kode = $kode + 1;
//         $hasilkode = "P" .str_pad($kode, 1, "0", STR_PAD_LEFT);
// }
// else
// {
//         $hasilkode = "P01";
// }
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
          <input type="number" id="stokproduk" class="form-control" placeholder="Stok produk" name="stokproduk" required="required">
          <label for="stokproduk">Stok Produk</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="number" id="hargabeli" class="form-control" placeholder="Harga beli" name="hargabeli" required="required">
          <label for="hargabeli">Harga Beli</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="number" id="hargajual" class="form-control" placeholder="Harga jual" name="hargajual" required="required">
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
  $stokproduk = isset($_POST['stokproduk']) ? $_POST['stokproduk'] : null;
  $hargabeli = isset($_POST['hargabeli']) ? $_POST['hargabeli'] : null;
  $hargajual = isset($_POST['hargajual']) ? $_POST['hargajual'] : null;
  $tambahproduk = isset($_POST['tambahproduk']) ? $_POST['tambahproduk'] : null;

  if (isset($_POST['tambahproduk'])) {
    $sql = $conn->query("INSERT INTO produk (ID_PRODUK, NAMA_PRODUK, STOK_PRODUK, HARGA_BELI, HARGA_JUAL)
    values('', '$namaproduk', '$stokproduk', '$hargabeli', '$hargajual')");
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>