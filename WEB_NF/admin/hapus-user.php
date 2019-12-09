<?php
  $id = $_GET['id'];
  $conn->query("delete from user where ID_USER = '$id'");
?>

<script type="text/javascript">
  window.location.href="?page=tabel-user";
</script>