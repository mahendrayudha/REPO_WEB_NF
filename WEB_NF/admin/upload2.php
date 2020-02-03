<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="upload2.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
 
<?php
if(isset($_POST['submit'])){
    $error = $_FILES['file']['error']; // Menyimpan jumlah error ke variabel $error
 
    // Validasi error
    if($error == 0){
        $ukuran_file = $_FILES['file']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
 
        // Validasi ukuran file
        if($ukuran_file <= 1000000){
            $nama_file = $_FILES['file']['name']; // Menyimpan nama file ke variabel $nama_file
            $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
 
            // Validasi format
            if( ($format == "jpg") or ($format == "png") ){
                $file_asal = $_FILES['file']['tmp_name'];
                $file_tujuan = "upload/".$_FILES['file']['name'];
                $upload = move_uploaded_file($file_asal, $file_tujuan); // Proses upload. Menghasilkan nilai true jika upload berhasil
 
                // Validasi upload (hasil true jika upload berhasil)
                if($upload == true){
                    echo "Upload berhasil";
                }else{ // else upload gagal
                    echo "Upload gagal";
                }
 
            }else{ // else validasi format
                echo "Format harus jpg atau png.";
            }
 
        }else{ // else validasi ukuran file
            echo "Ukuran file kamu ".$ukuran_file.", file tidak boleh lebih dari 1000000 (1MB)";
        }
 
    }else{ // else validasi error
        echo 'Ada '.$error.' error. Gagal upload.';
    }
    
}
?>
</body>
</html>