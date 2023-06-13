<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['adminid']))
{
	header("location:adminLogin.php");
}
$sql=mysqli_query($al, "SELECT * FROM complaints ORDER BY id ASC");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaints / Suggestions</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="heading">View Complaints / Suggestions<span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />

<div align="center">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr class="labels" style="text-decoration:underline;"><th id=h1> Complaint ID</th><th id=h1>Employee ID</th><th id=h1>Subject</th><th id=h1>Complaint / Suggestion</th><th id=h1>Date Added</th><th id=h1>Action</th></tr>
<?php
while($b=mysqli_fetch_array($sql))
{
	?>
<tr class="labels"><td><?php echo $b['id'];?></td><td><?php echo $b['empid'];?></td><td><?php echo $b['subject'];?></td><td><?php echo $b['complaint'];?></td>
<td><?php echo $b['date'];?></td>
<td>
<a href="deleteComplaint.php?del=<?php echo $b['id'];?>" onclick="return confirm('Are You Sure..?');">Delete</a></td>

</tr>
<?php } ?>

</table>
<br />
<a href="adminHome.php">Go Back</a>
</div>

</body>
</html>