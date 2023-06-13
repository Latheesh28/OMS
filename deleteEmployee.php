<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['adminid']))
{
	header("location:adminLogin.php");
}
$del=$_GET['del'];
mysqli_query($al, "DELETE FROM employee WHERE empid='$del'");
header("location:manageEmployees.php");
?>