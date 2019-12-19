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
        $nama_produk = htmlspecialchars($krj["nama_produk"]);
        $id_user = htmlspecialchars($krj["id_user"]);
        $jumlah = htmlspecialchars($krj["jumlah"]);
        $tanggal = htmlspecialchars($krj["tanggal"]);
        $alamat = htmlspecialchars($krj["alamat"]);
        $opsi = htmlspecialchars($krj["opsi"]);
        $total = htmlspecialchars($krj["total"]);

        $trs = mysqli_query($conn, "INSERT INTO keranjang VALUES ('$id_transaksi', '$id_produk','$nama_produk', '$id_user', '$jumlah', '$tanggal', '$alamat', '$opsi', '$total')");


        return $trs;
}


//setujui
function huhu($huhu){
    global $conn;
        $id_transaksi = htmlspecialchars($huhu["id_transaksi"]);                
        $id_user = htmlspecialchars($huhu["id_user"]);
        $status_bayar = htmlspecialchars($huhu["status_bayar"]);     
        $total = htmlspecialchars($huhu["total"]);   
        $alamat = htmlspecialchars($huhu["alamat"]);
        $opsi = htmlspecialchars($huhu["opsi"]);
        
        $trs = mysqli_query($conn, "INSERT INTO transaksi VALUES ('$id_transaksi','$id_user', now(), '$status_bayar', '$total', '$alamat', $opsi)");


        return $trs;
}

//setujui
function hihi($hihi){
    global $conn;
        $id_transaksi = htmlspecialchars($hihi["id_transaksi"]);                
        $id_produk = htmlspecialchars($hihi["id_produk"]);
        $jumlah = htmlspecialchars($hihi["jumlah"]);  

        $trs = mysqli_query($conn, "INSERT INTO detail_jual VALUES ('$id_transaksi','$id_produk','$jumlah')");
        return $trs;
}
?>