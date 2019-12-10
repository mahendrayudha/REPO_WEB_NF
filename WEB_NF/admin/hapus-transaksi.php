<?php
  $id = $_GET['id'];
  $conn->query("DELETE FROM transaksi WHERE ID_TRANSAKSI = '$id'");
?>

<script type="text/javascript">
  window.location.href="?page=tabel-pesanan";
</script>