<?php
  $id = $_GET['id'];
  $conn->query("delete from produk where ID_PRODUK = '$id'");
?>

<script type="text/javascript">
  window.location.href="?page=tabel-produk";
</script>