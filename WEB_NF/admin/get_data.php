<?php
                  include "koneksi.php";
                  $sql = $conn->query("SELECT * FROM keranjang WHERE STATUS_ACC = 1");
                  
                  while ($data = $sql->fetch_assoc()) {
                    // $transfer = ($data['OPSI_PEMBAYARAN']==1);
                    // $transfer = 'Transfer';
                    // $bayartunai = ($data['OPSI_PEMBAYARAN']==2);
                    // $bayartunai = 'Bayar Tunai';
                    $opspem = $data["OPSI_PEMBAYARAN"];
                    if($opspem == 1){
                        $atta = "Transfer";
                    } else {
                        $atta = "Bayar Tunai";
                    }
                    $asiap = $data['ID_USER'];
                    $ambil = $conn->query("SELECT * FROM user WHERE ID_USER = '$asiap'");
                    $peruser = mysqli_fetch_array($ambil);
                    $x = $data["ID_PRODUK"];
                    if($x == "P001"){
                        $xn = "Kg";
                    } else if($x =="P002"){
                        $xn = "Kg";
                    } else if($x =="P003"){
                        $xn = "Botol";
                    } else if($x =="P004"){
                        $xn = "Bungkus";
                    } else if($x =="P005"){
                        $xn = "Pcs";
                    }
                    echo '<tr>
                    <td>'.$data["ID_TRANSAKSI"].'</td>
                    <td style="display: none;">'.$data['ID_PRODUK'].'</td>
                    <td>'.$data['NAMA_PRODUK'].'</td>
                    <td style="display: none;">'.$data['ID_USER'].'</td>
                    <td>'.$peruser['NAMA'].'</td>
                    <td>'.$data['JUMLAH_BELI'].'</td>
                    <span>'.$xn.'</span>
                    <td>'.$data['TGL_TRANSAKSI'].'</td>
                    <td>'.$data['ALAMAT'].'</td>
                    <td>'.$atta.'</td>
                    <td>'.$data['GRAND_TOTAL'].'</td>
                    <td>
                        <a onclick="return confirm("Apakah Anda yakin untuk menghapus pesanan?")" href="hapus-pesanan.php?id='.$data["ID_TRANSAKSI"].'" class="fas fa-trash"></a>
                        <!-- <a onclick="return confirm("Apakah Anda yakin untuk menerima pesanan?")" href="?page=transaksi&aksi=edit-transaksi?id='.$data["ID_TRANSAKSI"].'" class="fas fa-check-circle" style="font-size:18px"></a> -->
                        <a href="?page=transaksi&aksi=insert-transaksi&id='.$data["ID_TRANSAKSI"].'" class="fas fa-check-circle"></a>
                     </td>
                    </tr>';
                }
                  ?>
                    