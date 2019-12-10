<?php
  $id = $_GET['id'];
  $conn->query("DELETE FROM user WHERE ID_USER = '$id'");
?>

<script type="text/javascript">
  window.location.href="?page=tabel-user";
</script>