<?php
session_start();
include("configASL.php");
if(!isset($_SESSION['adminid']))
{
	header("location:adminLogin.php");
}
$adminid=$_SESSION['adminid'];
$sql=mysqli_query($al, "SELECT * FROM admin WHERE adminid='$adminid'");

$b=mysqli_fetch_array($sql);
$pass=$b['password'];
$old=sha1($_POST['old']);
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['p1']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
	//Do Nothing
}
else
{
if($old!=$pass)
{
	$info="Incorrect Old Password";
}
elseif($p1!=$p2)
	{
		$info="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($al, "UPDATE admin SET password='$p2' WHERE adminid='$adminid'");
		$info="Successfully Changed your Password";
	}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="heading">Change Password<span style="float:right"><a href="logout.php">Logout</a></span>
</div><br />
<div align="center">
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
<tr><td class="labels">Enter Old Password :</td><td><input type="password" name="old" size="25" class="fields" /></td></tr>
<tr><td class="labels">Enter New Password :</td><td><input type="password" name="p1" size="25" class="fields"  /></td></tr>
<tr><td class="labels">Re-Type New Password :</td><td><input type="password" name="p2" size="25"  class="fields" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Change Password" class="button" /></td></tr>
</table>
</form>
<a href="adminHome.php">Go Back</a>
</body>
</html>