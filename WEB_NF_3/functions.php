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

//tambah data
function tambah($data)
{
    global $conn;
        // $id_user = htmlspecialchars($data["ID_ANGGOTA"]);
        $nama = htmlspecialchars($data["name"]);
        $notelp = htmlspecialchars($data["notelp"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $email = htmlspecialchars($data["email"]);
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["psw"]);
        //upload foto
        // $foto = upload();
        // if( !$foto )
        // {
        //     return false;
        // }

        $qu = mysqli_query($conn, "INSERT INTO user VALUES 
        ('$nama','$notelp','$alamat','$email','$username','$password')");

        return $qu;


}
?>