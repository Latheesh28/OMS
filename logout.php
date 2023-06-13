<?php 
session_start();
unset($_SESSION['empid']);
session_destroy();
header("location:index.php");
?>