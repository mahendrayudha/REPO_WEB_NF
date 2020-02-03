<?php
$conn = mysqli_connect("localhost","u5445042_tifa","tifa2020","u5445042_naurafarm");

function query($query)
{
    global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) )
        {
            $rows[] = $row;
        }
        return $rows;
}

//memasukkan keranjang

function keranjang($krj){
    global $conn;
        $id_transaksi = htmlspecialchars($krj["id_transaksi"]);
        $id_produk = htmlspecialchars($krj["id_produk"]);
        $nama_produk = htmlspecialchars($krj["nama_produk"]);
        $id_user = htmlspecialchars($krj["id_user"]);
        $user = htmlspecialchars($krj["user"]);
        $jumlah = htmlspecialchars($krj["jumlah"]);
        $tanggal = htmlspecialchars($krj["tanggal"]);
        $alamat = htmlspecialchars($krj["alamat"]);
        $opsi = htmlspecialchars($krj["opsi"]);
        $total = htmlspecialchars($krj["total"]);

        $trs = mysqli_query($conn, "INSERT INTO keranjang VALUES ('$id_transaksi', '$id_produk','$nama_produk', '$id_user', '$user', '$jumlah', now(), '$alamat', '$opsi', '$total','1')");


        return $trs;
}

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

      //$h = mysqli_query($conn, "DELETE FROM keranjang WHERE ID_TRANSAKSI = '$idtrx'");
      $h = "UPDATE keranjang SET STATUS_ACC = 2 WHERE ID_TRANSAKSI ='$idtrx'";  

      $h = mysqli_query($conn, "DELETE FROM keranjang WHERE ID_TRANSAKSI = '$idtrx'");
      $h = "UPDATE keranjang SET STATUS_ACC = 2 WHERE ID_TRANSAKSI ='$idtrx'";

      if($conn->query($h) === TRUE){
        $trx = "INSERT INTO detail_jual (ID_TRANSAKSI, ID_PRODUK, JUMLAH_BELI) VALUES ('$idtrx','$id_produk','$jumlah')";
        if($conn->query($trx) === TRUE){
          //update stok produk akan dikurangi dari jumlah produk yg di beli
          $updatestk = "UPDATE produk SET STOK_PRODUK = STOK_PRODUK-$jumlah WHERE ID_PRODUK='$id_produk'";
          if($conn->query($updatestk) === TRUE){
            echo "<script>alert('Sukses !');window.location.href='/REPO_WEB_NF/WEB_NF/admin/index.php?page=tabel-pesanan'</script>";
          } else {
            echo "Error: " . $updatestk . "<br>" . $conn->error;
          }
        } else {
          echo "Error: " . $trx . "<br>" . $conn->error;
        }
      } else {
        echo "Error: " . $h . "<br>" . $conn->error;
      }
  
    } else {
      echo "Error: " . $simpan . "<br>" . $conn->error;
    }
  }
?>