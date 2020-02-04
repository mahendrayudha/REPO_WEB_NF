<?php
$conn = mysqli_connect("localhost","u5445042_tifa","tifa2020","u5445042_naurafarm");
  $id = $_GET['id'];


  $conn->query("DELETE FROM transaksi WHERE ID_TRANSAKSI = '$id'");
  echo "<script>alert('data berhasil dihapus'); window.history.back();</script>";

  $hapus = $conn->query ("DELETE FROM transaksi WHERE ID_TRANSAKSI = '$id'");

  $conn->query ("DELETE FROM transaksi WHERE ID_TRANSAKSI = '$id'");

  echo "<script>alert('data berhasil dihapus'); window.history.back();</script>";
?>