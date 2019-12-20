<?php
  include "koneksi.php";

  $id = $_GET['id'];
  $sql = $conn->query("SELECT * FROM produk WHERE ID_TRANSAKSI='$id'");
  $tampil = $sql->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Edit Data Pesanan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>
<div class="card-header">Edit Data Pesanan</div>
<div class="card-body">
  <form method="POST">
      <div class="form-group">
        <div class="form-label-group">
          <input type="text"
                 id="idtransaksi"
                 class="form-control"
                 placeholder="ID Transaksi"
                 required="required"
                 name="idtransaksi"
                 value="<?php echo $tampil['ID_TRANSAKSI'];?>" disabled>
          <label for="idtransaksi">ID Transaksi</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text"
                 id="idproduk"
                 class="form-control"
                 placeholder="ID Produk"
                 required="required"
                 name="idproduk"
                 value="<?php echo $tampil['ID_PRODUK'];?>" disabled>
          <label for="idproduk">ID Produk</label>
        </div>
      </div>

      <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="namaproduk"
                 class="form-control"
                 placeholder="Nama produk"
                 required="required"
                 name="namaproduk"
                 value="<?php echo $tampil['NAMA_PRODUK'];?>">
          <label for="namaproduk">Nama Produk</label>
        </div>
      </div>
    
    <div class="form-group">
      <div class="form-label-group">
        <input type="text"
               id="iduser"
               class="form-control"
               placeholder="iduser"
               name="iduser"
               required="required"               
               value="<?php echo $tampil['ID_USER'];?>">
        <label for="iduser">ID User</label>
      </div>
    </div>

    <div class="form-group">
      <div class="form-label-group">
        <input type="text"
               id="jumlahbeli"
               class="form-control"
               placeholder="jumlah beli"
               name="jumlahbeli"
               required="required"
               onkeypress="return hanyaAngka(event)"
               value="<?php echo $tampil['JUMLAH_BELI'];?>">
        <label for="jumlahbeli">jumlah Beli</label>
      </div>
    </div>

    <div class="form-group">
      <div class="form-label-group">
        <input type="text"
               id="tgltransaksi"
               class="form-control"
               placeholder="Tanggal Transaksi"
               name="tgltransaksi"
               required="required"
               onkeypress="return hanyaAngka(event)"
               value="<?php echo $tampil['TGL_TRANSAKSI'];?>">
        <label for="tgltransaksi">Tanggal Transaksi</label>
      </div>
    </div>

    <div class="form-group">
      <div class="form-label-group">
        <input type="text"
               id="alamat"
               class="form-control"
               placeholder="Alamat"
               name="alamat"
               required="required"
               value="<?php echo $tampil['ALAMAT'];?>">
        <label for="alamat">Alamat</label>
      </div>
    </div>

  <button type="submit"
      class="btn btn-primary"
      name="editproduk"
      href="tabel-produk.php">
      Edit Produk
  </button>
  <a href="index.php?page=tabel-produk">
    <button class="btn btn-danger"
      name="cancel">
      Batal
    </button>
  </a>

  </form>
</div>

<?php

if( isset ($_POST['editproduk'])) {
  //cek data berhasil ditambah?
  if(isset($_POST) > 0){
    echo "<script>
    alert('Data Berhasil Diubah');
    document.location.href = '?page=tabel-produk';
    </script>";
  } else {
      echo "<script>alert('Gagal Mengubah Data')</script>";
    }   
}

//ubah data
function editproduk($data) {
  global $conn;
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $namaproduk = isset($_POST['namaproduk']) ? $_POST['namaproduk'] : null;
    $stokproduk = isset($_POST['stokproduk']) ? $_POST['stokproduk'] : null;
    $hargabeli = isset($_POST['hargabeli']) ? $_POST['hargabeli'] : null;
    $hargajual = isset($_POST['hargajual']) ? $_POST['hargajual'] : null;
        
$query = "UPDATE produk SET
ID_PRODUK='$id',
NAMA_PRODUK='$namaproduk',
STOK_PRODUK='$stokproduk',
HARGA_BELI='$hargabeli',
HARGA_JUAL='$hargajual'
WHERE ID_PRODUK='$id'";
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
