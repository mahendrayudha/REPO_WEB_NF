<?php
$conn = mysqli_connect("localhost", "root", "", "naura_farm");
if ($conn === false) {
    die("ERROR: " . mysqli_connect_error());
}

$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM keranjang WHERE ID_TRANSAKSI='$id'");
$tampil = mysqli_fetch_assoc($sql);

//menampilkan produk berdasarkan id
// $ambil = $conn->query("SELECT * FROM produk WHERE ID_PRODUK = '$id'");
// $perproduk = mysqli_fetch_array($ambil);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Keranjang</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>
    <div class="card-header">Edit Keranjang</div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <input type="hidden" name="id_transaksi" value="<?php echo $hasilkode ?>">
                    <input type="hidden" name="id_produk" value="<?php echo $tampil["ID_PRODUK"]; ?>">
                    <input type="hidden" name="id_user" value="<?php echo $idu ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                    <input id="harga" type="text" name="harga" onkeyup="hitung();" value="<?php echo $tampil["HARGA_JUAL"]; ?>" readonly disabled>
                    <label for="harga">Harga</label>
                </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                    <input type="text" id="jumlah" class="form-control" placeholder="Jumlah Beli" required="required" name="jumlah" value="<?php echo $tampil['JUMLAH_BELI']; ?>">
                    <label for="jumlah">Jumlah Beli</label>
                </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                    <input type="text" id="tglbeli" class="form-control" placeholder="Tanggal Beli" name="tglbeli" required="required" value="<?php echo $tampil['TGL_TRANSAKSI']; ?>" readonly disabled>
                    <label for="tglbeli">Tanggal Beli</label>
                </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                    <textarea type="text" id="alamat" class="form-control" placeholder="Alamat" name="alamat" required="required" rows="5" value="<?php echo $tampil['ALAMAT']; ?>"></textarea>
                    <label for="alamat">Alamat</label>
                </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                    <select name="opsi" id="opsi" style="color: black">
                        <option value="1" style="color: black">Transfer</option>
                        <option value="2" style="color: black">Cash</option>
                    </select>
                    <label for="opsi">Opsi Pembayaran</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="editkeranjang" href="keranjang.php" value="">
                Simpan
            </button>
        </form>
    </div>

    <?php

    //cek data berhasil ditambah?
    if (isset($_POST["editkeranjang"])) {
        if ('editkeranjang'($_POST) > 0) {
            echo "<script>
      alert('Data Berhasil Diubah');
      document.location.href =
      'keranjang.php';
      </script>";
        } else {
            echo "<script>alert('Gagal Mengubah Data')</script>";
        }
    }

    //ubah data
    function editkeranjang($data)
    {
        global $conn;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : null;
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : null;
        $opsi = isset($_POST['opsi']) ? $_POST['opsi'] : null;

        $query = "UPDATE user SET
    ID_TRANSAKI='$id',
    JUMLAH_BELI='$jumlah',
    ALAMAT='$alamat',
    OPSI_PEMBAYARAN='$opsi',
    WHERE ID_TRANSAKSI='$id'";
        $sql = mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    ?>

    <script>
        function hitung() {
            var txtFirstNumberValue = document.getElementById('harga').value;
            var txtSecondNumberValue = document.getElementById('jumlah').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(txtSecondNumberValue)) {
                document.getElementById('total').value = result;
            }
        }
    </script>

    <!-- <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script> -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>