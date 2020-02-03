<?php

require "koneksi.php";
  $id = $_GET['id'];
  $h = mysqli_query($conn, "DELETE FROM keranjang WHERE ID_TRANSAKSI = '$id'");

  echo "<script>alert('data berhasil dihapus'); window.history.back();</script>";
?>

