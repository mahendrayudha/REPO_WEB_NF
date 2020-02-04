<?php 
	include 'koneksi.php';
		if($_POST){
			$ekstensi_diperbolehkan	= array('png','jpg','svg');
			$nama = $_FILES['fotoproduk']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['fotoproduk']['size'];
            $file_tmp = $_FILES['fotoproduk']['tmp_name'];

            //auto increment id produk
            $carikode = mysqli_query($conn, "SELECT max(ID_PRODUK)FROM produk") or die(mysqli_error($conn));
            $datakode = mysqli_fetch_array($carikode);
            if ($datakode) {
                $nilaikode = substr($datakode[0], 1);
                $kode = (int) $nilaikode;
                $kode = $kode + 1;
                $hasilkode = "P" . str_pad($kode, 3, "0", STR_PAD_LEFT);
            } else {
                $hasilkode = "P001";
            }

            $namaproduk = isset($_POST['namaproduk']) ? $_POST['namaproduk'] : null;
            $fotoproduk = isset($_POST['fotoproduk']) ? $_POST['fotoproduk'] : null;
            $stokproduk = isset($_POST['stokproduk']) ? $_POST['stokproduk'] : null;  
            $hargajual = isset($_POST['hargajual']) ? $_POST['hargajual'] : null;
            $tambahproduk = isset($_POST['tambahproduk']) ? $_POST['tambahproduk'] : null;

            $sqlcek = $conn->query("SELECT * FROM produk WHERE NAMA_PRODUK='$namaproduk'");
            // $cek = mysqli_query($conn, $sqlcek);
            if (mysqli_num_rows($sqlcek) > 0) {
                $row = mysqli_fetch_assoc($sqlcek);
                if ($namaproduk == $row['NAMA_PRODUK']) {
                    echo '<script type="text/javascript">
                                alert("Produk sudah ada");
                                window.history.back();
                            </script>';
                }
            }
 
            if (mysqli_num_rows($sqlcek) > 0) {
                $row = mysqli_fetch_assoc($sqlcek);
                if ($namaproduk == $row['NAMA_PRODUK']) {
                    echo '<script type="text/javascript">
                                alert("Produk sudah ada");
                                window.history.back();
                            </script>';
                }
                    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                        if($ukuran < 1044070){			
                            move_uploaded_file($file_tmp, '../img/upload/'.$nama);
                        } else {
                            echo '<script type="text/javascript">
                                alert("Ukuran file terlalu besar");
                                window.history.back();
                            </script>';
                        }
                } else {
                    echo '<script type="text/javascript">
                            alert("File yang Anda upload harus berformat JPG/PNG/SVG");
                            window.history.back();
                        </script>';
                }
            } else {
                $query = $conn->query("INSERT INTO produk (ID_PRODUK, NAMA_PRODUK, FOTO_PRODUK, STOK_PRODUK, HARGA_JUAL)
                VALUES('$hasilkode', '$namaproduk', '$nama', '$stokproduk', '$hargajual')");
            }
		}
		?>
