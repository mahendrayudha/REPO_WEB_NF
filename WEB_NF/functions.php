<?php

$conn = mysqli_connect("localhost","root","","naura_farm");

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
        $id_user = htmlspecialchars($krj["id_user"]);
        $jumlah = htmlspecialchars($krj["jumlah"]);
        $tanggal = htmlspecialchars($krj["tanggal"]);
        $alamat = htmlspecialchars($krj["alamat"]);
        $opsi = htmlspecialchars($krj["opsi"]);
        $total = htmlspecialchars($krj["total"]);

        $trs = mysqli_query($conn, "INSERT INTO keranjang VALUES ('$id_transaksi', '$id_produk', '$id_user', '$jumlah', '$tanggal', '$alamat', '$opsi', '$total')");


        return $trs;
}
?>