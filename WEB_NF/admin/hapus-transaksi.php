<?php
$conn = mysqli_connect("localhost","root","","naura_farm");
  $id = $_GET['id'];
<<<<<<< HEAD
  $conn->query("DELETE FROM transaksi WHERE ID_TRANSAKSI = '$id'");
  echo "<script>alert('data berhasil dihapus'); window.location.href='/REPO_WEB_NF/WEB_NF/admin/?page=tabel-transaksi'</script>";
=======
  $hapus = $conn->query ("DELETE FROM transaksi WHERE ID_TRANSAKSI = '$id'");
  echo "<script>alert('data berhasil dihapus'); window.location.href='http://127.0.0.1/REPO_WEB_NF/WEB_NF/admin/?page=tabel-pesanan'</script>";
  if ($conn->query($hapus) === TRUE) {
    $h = mysqli_query($conn, "DELETE FROM detail_jual WHERE ID_TRANSAKSI = '$idtr'");
  } else {
    echo "Error: " . $simpan . "<br>" . $conn->error;
  }

>>>>>>> 9e27acc214030a49b91206a9824369081fade765
?>

<!-- <script type="text/javascript">
  window.location.href="?page=tabel-pesanan";
</script> -->