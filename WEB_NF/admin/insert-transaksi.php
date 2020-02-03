<?php
include "../functions.php";

$id = $_GET['id'];

//menampilkan keranjang berdasarkan id
$ambil = $conn->query("SELECT * FROM keranjang WHERE ID_TRANSAKSI = '$id'");
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
          <input type="hidden"
                 class="form-control"
                 id="id_transaksi"
                 name="id_transaksi"
                 value="<?php echo $perproduk["ID_TRANSAKSI"]; ?>" readonly>
          <label for="id_transaksi">ID Transaksi</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="hidden"
                 class="form-control"
                 id="id_produk"
                 name="id_produk"
                 autofocus="autofocus"
                 value="<?php echo $perproduk["ID_PRODUK"]; ?>" readonly>
          <label for="id_produk">ID Produk</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text"
                 class="form-control"
                 id="nama_produk"
                 name="nama_produk"
                 value="<?php echo $perproduk["NAMA_PRODUK"]; ?>" readonly>
          <label for="nama_produk">Nama Produk</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="hidden"
                 class="form-control"
                 id="id_user"
                 name="id_user"
                 value="<?php echo $perproduk["ID_USER"]; ?>" readonly>
          <label for="id_user">ID User</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text"
                 id="jumlah"
                 name="jumlah"
                 style="width: 70rem;"
                 onkeypress="return hanyaAngka(event)"
                 value="<?php echo $perproduk["JUMLAH_BELI"] ?>" readonly>
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
          <input type="text"
                 class="form-control"
                 id="total"
                 name="total"
                 value="<?php echo $perproduk["GRAND_TOTAL"] ?>" readonly>
          <label for="total">Grand Total</label>
        </div>
      </div>

      <div class="form-group">
        <label for="status_bayar">Status Bayar:</label>
          <select class="form-control" id="status_bayar" name="status_bayar">
            <option value="1">Lunas</option>
            <option value="2">Belum lunas</option>
          </select>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text"
                 class="form-control"
                 id="alamat"
                 name="alamat"
                 value="<?php echo $perproduk["ALAMAT"] ?>" readonly>
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
                        <?php if($perproduk ['OPSI_PEMBAYARAN']==1) {
                          echo 'Transfer'; ?>
                          <option value="1">Transfer</option>
                          <option value="2">Bayar Tunai</option>
                          <?php } elseif($perproduk ['OPSI_PEMBAYARAN']==2) {
                          echo 'Transfer'; ?>
                          <option value="2">Bayar Tunai</option>
                          <option value="1">Transfer</option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>

      <button type="submit" class="btn btn-primary" name="setujui">
        Insert Transaksi
      </button>

      <a href="index.php?page=tabel-pesanan" class="btn btn-danger">Batal</a>

    </form>
  </div>

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
