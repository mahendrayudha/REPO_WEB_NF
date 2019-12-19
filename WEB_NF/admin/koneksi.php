<?php

$conn = mysqli_connect("localhost","root","","naura_farm");


  //memasukkan keranjang ke transaksi
//   function huhu($huhu){
//     global $conn;
//         $id_transaksi = htmlspecialchars($huhu["id_transaksi"]);
//         $id_produk = htmlspecialchars($huhu["id_produk"]);
//         $nama_produk = htmlspecialchars($huhu["nama_produk"]);
//         $id_user = htmlspecialchars($huhu["id_user"]);
//         $jumlah = htmlspecialchars($huhu["jumlah"]);
//         $tanggal = htmlspecialchars($huhu["tanggal"]);
//         $alamat = htmlspecialchars($huhu["alamat"]);
//         $opsi = htmlspecialchars($huhu["opsi"]);
//         $total = htmlspecialchars($huhu["total"]);

//         $trs = mysqli_query($conn, "INSERT INTO keranjang VALUES ('$id_transaksi', '$id_produk','$nama_produk', '$id_user', '$jumlah', '$tanggal', '$alamat', '$opsi', '$total')");


//         return $trs;
// }
//memasukkan keranjang ke detail transaksi
// function detail($detail){
//   global $conn;
//       $id_transaksi = htmlspecialchars($detail["id_transaksi"]);
//       $id_produk = htmlspecialchars($detail["id_produk"]);
//       $nama_produk = htmlspecialchars($detail["nama_produk"]);
//       $id_user = htmlspecialchars($detail["id_user"]);
//       $jumlah = htmlspecialchars($detail["jumlah"]);
//       $tanggal = htmlspecialchars($detail["tanggal"]);
//       $alamat = htmlspecialchars($detail["alamat"]);
//       $opsi = htmlspecialchars($detail["opsi"]);
//       $total = htmlspecialchars($detail["total"]);

//       $trs = mysqli_query($conn, "INSERT INTO detail_jual VALUES ('$id_transaksi', '$id_produk','$nama_produk', '$id_user', '$jumlah', '$tanggal', '$alamat', '$opsi', '$total')");


//       return $trs;
// }
?>