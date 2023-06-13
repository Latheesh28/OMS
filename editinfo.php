<?php
session_start();
include("configASL.php");
if(!isset($_SESSION['empid']))
{
	header("location:index.php");
}
$empid=$_SESSION['empid'];
$sql=mysqli_query($al, "SELECT * FROM employee WHERE empid='$empid'");
$name=$_POST['name'];
$email=$_POST['email'];
$con=$_POST['contact'];

if($_POST['name']==NULL || $_POST['email']==NULL || $_POST['contact']==NULL)
{
	//Do Nothing
}
else
{
		mysqli_query($al, "UPDATE employee SET name='$name',email='$email',contact='$con' WHERE empid='$empid'");
		$info="Successfully Changed your Personal Information";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Personal Information</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="heading">Edit Personal Information<span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />
<div align="center">
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
<tr><td class="labels">Enter New name :</td><td><input type="text" name="name" size="40" class="fields" /></td></tr>
<tr><td class="labels">Enter New email :</td><td><input type="email" name="email" size="40" class="fields"  /></td></tr>
<tr><td class="labels">Enter contact Number :</td><td><input type="text" name="contact" size="40"  class="fields" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="update" class="button" /></td></tr>
</table>
</form>
<a href="home.php">Go Back</a>
</body>
</html>