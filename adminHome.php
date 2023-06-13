<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['adminid']))
{
	header("location:adminLogin.php");
}
$adminid=$_SESSION['adminid'];
$sql=mysqli_query($al, "SELECT * FROM admin WHERE adminid='$adminid'");
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
<span class="heading">Welcome Admin -> <span style="color:#FFF;font-size:30px;"><?php echo $name;?></span><span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />
<div align="center">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr><td>

<span class="formHead" style="text-decoration:underline;">ADMIN OPERATIONS</span><br />
<a href="addMeeting.php" font-size:15px>Add Meeting</a><br />
<a href="manageMeetings.php">Manage Meetings</a><br />
<a href="manageEmployees.php">Manage Employees</a><br />
<a href="viewComplaints.php">View Complaints / Suggestions</a><br />
<a href="sharecircular.php">Share Circulars</a><br />
<a href="managecircular.php">Manage Circulars</a><br />
<a href="recentop.php">Recent Employee operations</a><br />
<a href="changePasswordAdmin.php">Change Password</a>
</td></tr></table>
</div>
</body>
</html>