<?php

require "koneksi.php";
  $id = $_GET['id'];
  $h = mysqli_query($conn, "DELETE FROM keranjang WHERE ID_TRANSAKSI = '$id'");
  // return $h;



  echo "<script>alert('data berhasil dihapus'); window.location.href='http://127.0.0.1/REPO_WEB_NF/WEB_NF/admin/?page=tabel-pesanan'</script>";
//   echo "<script >alert('Data berhasil di Hapus');
//   window.location.href="?page=tabel-pesanan";
// </script>";
?>

