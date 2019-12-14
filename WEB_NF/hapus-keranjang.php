<?php
  $id = $_GET['id'];
  $conn->query("DELETE FROM keranjang WHERE ID_TRANSAKSI = '$id'");
?>

<script type="text/javascript">
  window.location.href="keranjang.php";
</script>