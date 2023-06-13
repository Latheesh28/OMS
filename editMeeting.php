<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['adminid']))
{
	header("location:adminLogin.php");
}

$edit=$_GET['edit'];
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
		mysqli_query($al, "UPDATE meeting SET title='$title',descr='$desc',venue='$venue',time='$time',date='$date' WHERE id='$edit'");
		$info="Successfully Updated Meeting Information";
}
$sql=mysqli_query($al, "SELECT * FROM meeting WHERE id='$edit'");
$b=mysqli_fetch_array($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


  --> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Meeting</title>
<link href="style1.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="banner">
<span class="heading">Edit Meeting<span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />

<div align="center">
<form method="post" action="">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr><td align="center" colspan="2" class="formHead">All Fields are Mandatory</td></tr>
<tr><td align="center" colspan="2" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Title : </td><td><input type="text" value="<?php echo $b['title'];?>" size="40" class="fields" name="title" /></td></tr>
<tr><td class="labels">Description : </td><td><input type="text" value="<?php echo $b['descr'];?>" size="40" class="fields" name="desc" /></td></tr>
<tr><td class="labels">Venue : </td><td><input type="text" value="<?php echo $b['venue'];?>" size="40" class="fields" name="venue" /></td></tr>
<tr><td class="labels">Time : </td><td><input type="time" value="<?php echo $b['time'];?>" size="40" class="fields" name="time" /></td></tr>
<tr><td class="labels">Date : </td><td><input type="date" value="<?php echo $b['date'];?>" size="40" class="fields" name="date" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Update" class="button" onclick="return confirm('Are You Sure...?');" /></td></tr>
</table>
</form><br />
<a href="manageMeetings.php">Go Back</a>
</div>
</body>
</html>