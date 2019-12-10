<?php
  $id = $_GET['id'];
  $conn->query("DELETE FROM produk WHERE ID_PRODUK = '$id'");
?>

<script type="text/javascript">
  window.location.href="?page=tabel-produk";
</script>