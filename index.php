<?php
include("configASL.php");
session_start();
if(isset($_SESSION['empid']))
{
	header("location:home.php");
}
$empid=$_POST['empid'];
$password=$_POST['password'];
if($empid==NULL || $password==NULL)
{
	//Do Nothing
}
else
{
$sql=mysqli_query($al, "SELECT * FROM employee WHERE empid='".mysqli_real_escape_string($al, $empid)."' AND password='".mysqli_real_escape_string($al, sha1($password))."'");
if(mysqli_num_rows($sql)==1)
{
	$_SESSION['empid']=$_POST['empid'];
	header("location:home.php");
}
else
{
	$info="Incorrect Employee ID or Password";
}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome To Office-Care</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner"><span class="heading">Welcome To Office-Care</span><br />
</div><br />
<br />

<div align="center">
<form method="post" action="">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr><td colspan="2" align="center" class="formHead">Employee Login</td></tr>
<tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Employee ID :</td><td><input type="text" name="empid" size="30" placeholder="Enter Employee ID" class="fields" /></td></tr>
<tr><td class="labels">Password :</td><td><input type="password" name="password" size="30" placeholder="Enter Password" class="fields" /></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="Login" class="button" /></td></tr>
<tr><td colspan="2" align="center"><span class="labels" style="font-size:16px;">New Employee..? </span><a href="registration.php">Register Here</a><br />
<span class="labels" style="font-size:16px;">Admin Login</span><a href="adminLogin.php"> Click Here</a>
</td></tr>
</table>
</form>
<br />
<br />
</div>
</body>
</html>