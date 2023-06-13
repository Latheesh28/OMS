<?php
include("configASL.php");
session_start();
if(isset($_SESSION['adminid']))
{
	header("location:adminHome.php");
}
$adminid=$_POST['adminid'];
$password=$_POST['password'];
if($adminid==NULL || $password==NULL)
{
	//ASLDo Nothing
}
else
{
$sql=mysqli_query($al, "SELECT * FROM admin WHERE adminid='".mysqli_real_escape_string($al, $adminid)."' AND password='".mysqli_real_escape_string($al,sha1($password))."'");
if(mysqli_num_rows($sql)==1)
{
	$_SESSION['adminid']=$_POST['adminid'];
	header("location:adminHome.php");
}
else
{
	$info="Incorrect Admin ID or Password";
}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome To Office-Care Admin Panel</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner"><span class="heading">Welcome To Office-Care</span><br />
</div><br />
<br />

<div align="center">
<form method="post" action="">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr><td colspan="2" align="center" class="formHead">Admin Login</td></tr>
<tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Admin ID :</td><td><input type="text" name="adminid" size="30" placeholder="Enter Employee ID" class="fields" /></td></tr>
<tr><td class="labels">Password :</td><td><input type="password" name="password" size="30" placeholder="Enter Password" class="fields" /></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="Login" class="button" /></td></tr>
<tr><td colspan="2" align="center"><span class="labels" style="font-size:16px;">Employee Login</span><a href="index.php"> Click Here</a><br />
</td></tr>
</table>
</form>
<br />
<br />
</div>
</body>
</html>