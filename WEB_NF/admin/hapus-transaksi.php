<?php
$conn = mysqli_connect("localhost","root","","naura_farm");
  $id = $_GET['id'];


  $conn->query("DELETE FROM transaksi WHERE ID_TRANSAKSI = '$id'");
  echo "<script>alert('data berhasil dihapus'); window.location.href='/REPO_WEB_NF/WEB_NF/admin/?page=tabel-transaksi'</script>";

  $hapus = $conn->query ("DELETE FROM transaksi WHERE ID_TRANSAKSI = '$id'");

  $conn->query ("DELETE FROM transaksi WHERE ID_TRANSAKSI = '$id'");

  echo "<script>alert('data berhasil dihapus'); window.location.href='http://127.0.0.1/REPO_WEB_NF/WEB_NF/admin/?page=tabel-pesanan'</script>";
?>