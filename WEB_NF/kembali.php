<?php 
session_start();
session_destroy();
header('location:transaksi.php');

?>