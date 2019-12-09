<?php
  $id = $_GET['id'];
  $sql = $conn->query("select * from produk where ID_PRODUK='$id'");
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
               id="id"
               class="form-control"
               placeholder="ID Produk"
               required="required"
               name="idproduk"
               value="<?php echo $tampil['ID_PRODUK'];?>" disabled>
        <label for="id">ID PRODUK</label>
      </div>
    </div>

    <div class="form-group">
      <div class="form-label-group">
        <input type="text"
               id="namaproduk"
               class="form-control"
               placeholder="Nama produk"
               required="required"
               name="namaproduk"
               autofocus="autofocus"
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
               value="<?php echo $tampil['STOK_PRODUK'];?>">
        <label for="stokproduk">Stok Produk</label>
      </div>
    </div>

    <div class="form-group">
      <div class="form-label-group">
        <input type="number"
               id="address"
               class="form-control"
               placeholder="Harga beli"
               name="hargabeli"
                required="required"
                value="<?php echo $tampil['HARGA_BELI'];?>">
        <label for="hargabeli">Harga Beli</label>
      </div>
    </div>

    <div class="form-group">
      <div class="form-label-group">
        <input type="number"
               id="hargajual"
               class="form-control"
               placeholder="Harga jual"
               name="hargajual"
               required="required"
               value="<?php echo $tampil['HARGA_JUAL'];?>">
        <label for="hargajual">Harga Jual</label>
      </div>
    </div>
    
  <button type="submit"
     class="btn btn-primary"
     name="editproduk"
     href="tabel-produk.php">
     Edit Produk
  </button>

  </form>
</div>

<?php
$conn = mysqli_connect("localhost", "root", "", "naura_farm");
if($conn === false){
    die("ERROR: " . mysqli_connect_error());
}

$namaproduk = isset($_POST['namaprooduk']);
$stokproduk = isset($_POST['stokproduk']);
$hargabeli = isset($_POST['hargabeli']);
$hargajual = isset($_POST['hargajual']);
$tambahproduk = isset($_POST['tambahproduk']);

if(isset ($_POST['editproduk'])) {
    $sql = $conn ->query("update produk set NAMA_PRODUK='$namaproduk', STOK_PRODUK='$stokproduk', HARGA_BELI='$hargabeli', HARGA_JUAL='$hargajual' where ID_PRODUK='$id'");
    if($sql){
        ?>
        <script type="text/javascript">
        alert ("Edit Data Berhasil");
        window.location.href="?page=tabel-produk";
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
