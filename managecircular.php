<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['adminid']))
{
	header("location:adminLogin.php");
}
$sql=mysqli_query($al, "SELECT * FROM circular ORDER BY id ASC");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Circulars</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="heading">Manage Circulars<span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />

<div align="center">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr class="labels" style="text-decoration:underline;"><th id=h1>No</th><th id=h1>Title</th><th id=h1>Date And Time</th><th id=h1>Circular</th><th id=h1>Action</th></tr>
<?php
while($b=mysqli_fetch_array($sql))
{
	?>
<tr class="labels"><td><?php echo $b['id'];?></td><td><?php echo $b['title'];?></td><td><?php echo $b['date'];?></td>
<td><a href="asl_uploads/<?php echo $b['file'];?>" style="font-size:14px;">Download</a></td>
<td>
<a href="deletecircular.php?del=<?php echo $b['id'];?>" onclick="return confirm('Are You Sure..?');">Delete</a></td>

</tr>
<?php } ?>

</table>
<br />
<a href="adminHome.php">Go Back</a>
</div>

</body>
</html>