<?php
  include "koneksi.php";

  $id = $_GET['id'];
  $sql = $conn->query("SELECT * FROM produk WHERE ID_PRODUK='$id'");
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

  <title>Admin - Edit Data Produk</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>
<div class="card-header">Edit Data Produk</div>
<div class="card-body">
  <form method="POST">
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
        <input type="number"
               id="stokproduk"
               class="form-control"
               placeholder="Stok produk"
               name="stokproduk"
               required="required"
               onkeypress="return hanyaAngka(event)"
               value="<?php echo $tampil['STOK_PRODUK'];?>">
        <label for="stokproduk">Stok Produk</label>
      </div>
    </div>

    <div class="form-group">
      <div class="form-label-group">
        <input type="text"
               id="hargabeli"
               class="form-control"
               placeholder="Harga beli"
               name="hargabeli"
               required="required"
               onkeypress="return hanyaAngka(event)"
               value="<?php echo $tampil['HARGA_BELI'];?>">
        <label for="hargabeli">Harga Beli</label>
      </div>
    </div>

    <div class="form-group">
      <div class="form-label-group">
        <input type="text"
               id="hargajual"
               class="form-control"
               placeholder="Harga jual"
               name="hargajual"
               required="required"
               onkeypress="return hanyaAngka(event)"
               value="<?php echo $tampil['HARGA_JUAL'];?>">
        <label for="hargajual">Harga Jual</label>
      </div>
    </div>

  <button type="submit"
     class="btn btn-primary"
     name="editproduk"
     href="tabel-produk.php"
     value="">
     Edit Produk
  </button>

  </form>
</div>

<?php

if( isset ($_POST["editproduk"])) {
  //cek data berhasil ditambah?
  if('editproduk'($_POST) > 0){
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
