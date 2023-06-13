<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['adminid']))
{
	header("location:adminLogin.php");
}
$sql=mysqli_query($al, "SELECT * FROM employee ORDER BY empid DESC");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Employees</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="heading">Manage Employees<span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />

<div align="center">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr class="labels" style="text-decoration:underline;"><th id=h1>Employee ID</th><th id=h1>Name</th><th id=h1>Email ID</th><th id=h1>Contact No.</th><th id=h1>Date of Registration</th><th id=h1>Action</th></tr>
<?php
while($b=mysqli_fetch_array($sql))
{
	?>
<tr class="labels"><td><?php echo $b['empid'];?></td><td><?php echo $b['name'];?></td><td><?php echo $b['email'];?></td>
<td><?php echo $b['contact'];?></td><td><?php echo $b['date'];?></td>
<td>
<a href="deleteEmployee.php?del=<?php echo $b['empid'];?>" onclick="return confirm('Are You Sure..?');">Delete</a></td>

</tr>
<?php } ?>

</table>
<br />
<a href="adminHome.php">Go Back</a>
</div>

</body>
</html>