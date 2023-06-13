<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['adminid']))
{
	header("location:adminLogin.php");
}
$title=$_POST['title'];
if($title==NULL)
{
	//Do Nothing
}
else
{	$extension = end(explode(".", $_FILES["file"]["name"]));
	$filename="$title".".$extension";
	move_uploaded_file($_FILES["file"]["tmp_name"],"asl_uploads/$filename"); 
	mysqli_query($al, "INSERT INTO circular VALUES('','$title','$filename',NOW())");
	$info="Successfully Shared Circular";
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Share Circular</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="heading">Share Circular<span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />

<div align="center">
<form method="post" action="" enctype="multipart/form-data">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr><td colspan="2" class="formHead" align="center">All Fields are Mandatory</td></tr>
<tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Title : </td><td><input type="text" name="title" placeholder="Enter Title" class="fields" size="40" /></td></tr>
<tr><td class="labels">Upload File : </td>
<td><input type="file" name="file" class="fields" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Submit" class="button" 
onclick="return confirm('Please Check Everything before Submitting');" /></td></tr>
</table></form>
<br />
<a href="adminHome.php">Go Back</a>
</div>

</body>
</html>