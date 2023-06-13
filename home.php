<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['empid']))
{
	header("location:index.php");
}
$empid=$_SESSION['empid'];
$sql=mysqli_query($al, "SELECT * FROM employee WHERE empid='$empid'");
$b=mysqli_fetch_array($sql);
$name=$b['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office-Care Home</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="heading">Welcome -> <span style="color:#FFF;font-size:30px;"><?php echo $name;?></span><span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />
<div align="center">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr><td>

<span class="formHead" style="text-decoration:underline;">EMPLOYEE OPERATIONS</span><br />
<a href="inbox.php">Office Meetings</a><br />
<a href="circulars.php">Download Circulars</a><br />
<a href="addComplaints.php">Complaint Box</a><br />
<a href="viewinfo.php">View Personal Information</a><br />
<a href="changePassword.php">Change Password</a><br />
</td></tr></table></div>
</body>
</html>