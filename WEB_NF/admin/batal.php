<?php  
session_start();
session_destroy();
header('location:?page=tabel-user.php');

?>