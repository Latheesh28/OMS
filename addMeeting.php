<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['adminid']))
{
	header("location:adminLogin.php");
}
$title=$_POST['title'];
$desc=$_POST['desc'];
$venue=$_POST['venue'];
$time=$_POST['time'];
$date=$_POST['date'];
if($title==NULL || $desc==NULL || $venue==NULL || $time==NULL || $date==NULL)
{
	//Do Nothing
}
else
{
	mysqli_query($al, "INSERT INTO meeting VALUES('','$title','$desc','$venue','$time','$date')");
	$info="Successfully Added New Meeting";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Meeting</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="heading">Add Meeting<span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />

<div align="center">
<form method="post" action="">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr><td colspan="2" class="formHead" align="center">All Fields are Mandatory</td></tr>
<tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Title : </td><td><input type="text" name="title" placeholder="Enter Title" class="fields" size="40" /></td></tr>
<tr><td class="labels">Meeting Description: </td><td><textarea name="desc" placeholder="Enter Meeting Description" class="fields" rows="2" cols="30"></textarea></td></tr>
<tr><td class="labels">Venue : </td><td><input type="text" name="venue" placeholder="Enter Venue" class="fields" size="40" /></td></tr>
<tr><td class="labels">Time : </td><td><input type="time" name="time" placeholder="HH:MM:AM" class="fields" size="20" /><span class="labels"> E.g. 03:30:PM</span></td></tr>

<tr><td class="labels">Date : </td><td><input type="date" name="date" placeholder="DD/MM/YYYY" class="fields" size="20" /><span class="labels"> E.g. 31/01/2015</span></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Submit" class="button" 
onclick="return confirm('Please Check Everything before Submitting');" /></td></tr>
</table></form>
<br />
<a href="adminHome.php">Go Back</a>
</div>
</body>
</html>