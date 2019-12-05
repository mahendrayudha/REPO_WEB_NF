<?php
session_start();
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

//Register
function tambah($data)
{
    global $conn;
        // $id_user = htmlspecialchars($data["ID_ANGGOTA"]);
        $nama = htmlspecialchars($data['nama']);
        $notelp = htmlspecialchars($data['notelp']);
        $alamat = htmlspecialchars($data['alamat']);
        $email = htmlspecialchars($data['email']);
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['psw']);
        //upload foto
        // $foto = upload();
        // if( !$foto )
        // {
        //     return false;
        // }

        // $qu = mysqli_query($conn, "INSERT INTO user(ID_USER, ID_STATUS, NAMA, NOMOR_TELEPON, ALAMAT, EMAIL,
        //  USERNAME, PASSWORD) VALUES ('', '01', '$nama','$notelp','$alamat','$email','$username','$password')");

        $qu = mysqli_query($conn, "INSERT INTO user VALUES ('','$nama','$notelp','$alamat','$email','$username','$password', '3')");

        return $qu;
}

//tambah data stok
function tambah_stok($data)
{
    global $conn;
        // $id_user = htmlspecialchars($data["ID_ANGGOTA"]);
        $nama = htmlspecialchars($data['nama']);
        $notelp = htmlspecialchars($data['notelp']);
        $alamat = htmlspecialchars($data['alamat']);
        $email = htmlspecialchars($data['email']);
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['psw']);
        //upload foto
        // $foto = upload();
        // if( !$foto )
        // {
        //     return false;
        // }

        $qu = mysqli_query($conn, "INSERT INTO user(ID_USER, ID_STATUS, NAMA, NOMOR_TELEPON, ALAMAT, EMAIL,
         USERNAME, PASSWORD) VALUES ('', '01', '$nama','$notelp','$alamat','$email','$username','$password')");

        return $qu;
}

//hapus data stok
function hapus_data($data)
{
mysql_connect("localhost","root","","naura_farm");
mysql_select_db("naura_farm");

//setting timer
$lama = 3;
$query ="DELETE FROM transaksi WHERE DATEDIFF(CURDATE(), tanggal) > $lama";
$hasil = mysql_query($query);
}
?>