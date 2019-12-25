<?php
include "../functions.php";

//mengambil id
// $idu = $_SESSION['id_user'];
$id = $_GET['id'];

//menampilkan keranjang berdasarkan id
$ambil = $conn->query("SELECT * FROM keranjang WHERE ID_TRANSAKSI = '$id'");
$perproduk = mysqli_fetch_array($ambil);


//memasukkan transaksi
if (isset($_POST['setujui'])) {
  $idtrx = $_POST['id_transaksi'];
  $id_produk = $_POST['id_produk'];
  $id_user = $_POST['id_user'];
  $jumlah = $_POST['jumlah'];
  $total = $_POST['total'];
  $status_bayar = $_POST['status_bayar'];
  $alamat = $_POST['alamat'];
  $opsi = $_POST['opsi'];
  $simpan = "INSERT INTO transaksi (ID_TRANSAKSI, ID_USER, TANGGAL_TRANSAKSI, STATUS_BAYAR, GRAND_TOTAL, ALAMAT_PENGIRIMAN, OPSI_PEMBAYARAN)
  VALUES('$idtrx','$id_user', now(),'$status_bayar','$total','$alamat','$opsi')";
  if ($conn->query($simpan) === TRUE) {
    $h = mysqli_query($conn, "DELETE FROM keranjang WHERE ID_TRANSAKSI = '$idtrx'");
    if($h){
      echo "<script>alert('Sukses !');window.location.href='/REPO_WEB_NF/WEB_NF/admin/index.php?page=tabel-pesanan'</script>";
    } else {
      echo "<script>alert('Sesuatu yang salah')</script>";
    }

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
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

  <title>Admin - Registrasi User</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>
  <div class="card-header">Masukkan ke Transaksi</div>
  <div class="card-body">
    <form method="POST">


      <div class="form-group">
        <div class="form-label-group">
          <input type="hidden" name="id_transaksi" value="<?php echo $perproduk["ID_TRANSAKSI"]; ?>" readonly>
          <input type="hidden" name="id_produk" value="<?php echo $perproduk["ID_PRODUK"]; ?>" readonly>
          Nama Produk<input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo $perproduk["NAMA_PRODUK"]; ?>" readonly>
          <input type="hidden" name="id_user" value="<?php echo $perproduk["ID_USER"]; ?>" readonly>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="form-label-group">
        Jumlah Beli
        <input id="jumlah" name="jumlah" type="number" value="<?php echo $perproduk["JUMLAH_BELI"] ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <div class="form-label-group">
        Total<input id="total" name="total" type="number" value="<?php echo $perproduk["GRAND_TOTAL"] ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <div class="form-label-group">
        Status Bayar
        <select name="status_bayar" id="status_bayar">
          <option value="1">Lunas</option>
          <option value="2">Belum lunas</option>
        </select>
      </div>
      <div class="form-group">
        <div class="form-label-group">
          Alamat<input name="alamat" id="alamat" value="<?php echo $perproduk["ALAMAT"] ?>" readonly></input>
        </div>
      </div>
      <div class="form-group">
        <div class="form-label-group">
          <input type="text" name="opsi" id="opsi" value="<?php echo $perproduk["OPSI_PEMBAYARAN"] ?>" readonly></input>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="setujui">
        Insert Transaksi
      </button>

    </form>
    <a href="index.php?page=tabel-pesanan">
      <button class="btn btn-danger" name="cancel">
        Batal
      </button>
    </a>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
