<!-- <a href="#" onclick="window.print();" class="btn btn-primary "><i class="fa fa-book"></i>  Laporan</a> -->
<?php
// $ambil = $conn->query("SELECT produk.NAMA_PRODUK FROM produk INNER JOIN detail_jual ON detail_jual.ID_PRODUK = produk.ID_USER");
// $perproduk = mysqli_fetch_array($ambil);

//menampilkan produk berdasarkan id
$ambil = $conn->query("SELECT produk.NAMA_PRODUK FROM produk INNER JOIN keranjang ON keranjang.ID_PRODUK = produk.ID_PRODUK");
$produk = mysqli_fetch_array($ambil);

//menampilkan produk berdasarkan id
$ambil = $conn->query("SELECT detail_jual.JUMLAH_BELI, detail_jual.ID_PRODUK FROM detail_jual INNER JOIN transaksi ON transaksi.ID_TRANSAKSI = detail_jual.ID_TRANSAKSI");
$hproduk = mysqli_fetch_array($ambil);
?>


<table class="table table-bordered" border="1" id="dataTable" width="100%" cellspacing="0">
  <thead style="text-align: center;">
    <tr>
      <th>ID Transaksi</th>
      <th>Tanggal Pembelian</th>
      <th>Nama Pembeli</th>
      <th>Nama Produk</th>
      <th>Jumlah Pembelian</th>
      <th>Status Pembayaran</th>
      <th>Grand Total</th>
      <th>Alamat</th>
      <th>Metode Pembayaran</th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
    <?php
    include "koneksi.php";
    $where = "";
    if (isset($_GET['cari'])) {
      $from = $_GET['start_date'];
      $to = $_GET['end_date'];
      $where = " WHERE t.TANGGAL_TRANSAKSI BETWEEN '$from' AND '$to' ";
    }
    $sql = $conn->query("SELECT t.ID_TRANSAKSI, u.NAMA, t.TANGGAL_TRANSAKSI, t.STATUS_BAYAR, t.GRAND_TOTAL, t.ALAMAT_PENGIRIMAN, t.OPSI_PEMBAYARAN FROM `transaksi` t JOIN user u ON t.ID_USER=u.ID_USER $where");
    while ($data = $sql->fetch_assoc()) {
      $transfer = ($data['OPSI_PEMBAYARAN'] == 1);
      $transfer = 'Transfer';
      $bayartunai = ($data['OPSI_PEMBAYARAN'] == 2);
      $bayartunai = 'Bayar Tunai';
      $lunas = ($data['STATUS_BAYAR'] == 1);
      $lunas = 'Lunas';
      $belumbayar = ($data['STATUS_BAYAR'] == 2);
      $belumbayar = 'Belum Bayar;'

    ?>
      <tr>
        <td><?php echo $data['ID_TRANSAKSI']; ?></td>
        <td><?php echo $data['TANGGAL_TRANSAKSI']; ?></td>
        <td><?php echo $data['NAMA']; ?></td>
        <td><?php echo $produk['NAMA_PRODUK']; ?></td>
        <td><?php echo $hproduk['JUMLAH_BELI']; ?>
          <span>
            <?php if ($hproduk['ID_PRODUK'] == 'P001') {
              echo 'kg';
            } elseif ($hproduk['ID_PRODUK'] == 'P002') {
              echo 'kg';
            } elseif ($hproduk['ID_PRODUK'] == 'P003') {
              echo 'botol';
            } elseif ($hproduk['ID_PRODUK'] == 'P004') {
              echo 'bungkus';
            } elseif ($hproduk['ID_PRODUK'] == 'P005') {
              echo 'pcs';
            } ?>
          </span>
        </td>
        <td><?php if ($data['STATUS_BAYAR'] == 1) {
              echo $lunas;
            } elseif ($data['OPSI_PEMBAYARAN'] == 2) {
              echo $belumbayar;
            }
            ?>
        </td>
        <td><?php echo $data['GRAND_TOTAL']; ?></td>
        <td><?php echo $data['ALAMAT_PENGIRIMAN']; ?></td>
        <td><?php if ($data['OPSI_PEMBAYARAN'] == 1) {
              echo $transfer;
            } elseif ($data['OPSI_PEMBAYARAN'] == 2) {
              echo $bayartunai;
            } ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>