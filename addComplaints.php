<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['empid']))
{
	header("location:index.php");
}
$empid=$_SESSION['empid'];
$subject=$_POST['subject'];
$complaint=$_POST['complaint'];
if($subject==NULL || $complaint==NULL)
{
	//Do Nothing
}
else
{
	mysqli_query($al, "INSERT INTO complaints VALUES(NULL,'$empid','$subject','$complaint',NOW())");
	$info="Successfully Submitted Your Complaint";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaints / Suggestion Box</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="banner">
<span class="heading">Complaints / Suggestion Box</span><span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />
<div align="center">
<form method="post" action="">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr><td align="center" class="formHead" colspan="2">All Fields are Mandatory</td></tr>
<tr><td align="center" colspan="2" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Subject : </td><td><input type="text" name="subject" class="fields" placeholder="Enter Subject" size="40" /></td></tr>
<tr><td class="labels">Complaint / Suggestion : </td>
<td><textarea name="complaint" rows="2" cols="40" placeholder="Enter Your Complaint or Suggestions Here" class="fields"></textarea></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="Submit" class="button" onclick="return confirm('After submitting complaint you will not be able to delete or modify it.. ');" /></td></tr>
</table>
</form>
<br />
<a href="home.php">Go Back</a>
</div>
</body>
</html>