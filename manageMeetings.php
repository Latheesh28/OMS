<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['adminid']))
{
	header("location:adminLogin.php");
}
$sql=mysqli_query($al, "SELECT * FROM meeting ORDER BY id ASC");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Meetings</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="heading">Manage Meetings<span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />

<div align="center">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr class="labels" style="text-decoration:underline;"><th id=h1>ID</th><th id=h1>Title</th><th id=h1>Description</th><th id=h1>Venue</th><th id=h1>Time</th><th id=h1>Date</th><th id=h1>Action 1</th><th id=h1>Action 2</th></tr>
<?php
while($b=mysqli_fetch_array($sql))
{
	?>
<tr class="labels"><td><?php echo $b['id'];?></td><td><?php echo $b['title'];?></td><td><?php echo $b['descr'];?></td>
<td><?php echo $b['venue'];?></td><td><?php echo $b['time'];?></td><td><?php echo $b['date'];?></td>
<td>
<a href="editMeeting.php?edit=<?php echo $b['id'];?>">Edit</a></td>
<td><a href="deleteMeeting.php?del=<?php echo $b['id'];?>" onclick="return confirm('Are You Sure..?');">Delete</a></td>

</tr>
<?php } ?>

</table>
<br />
<a href="adminHome.php">Go Back</a>
</div>

</body>
</html>