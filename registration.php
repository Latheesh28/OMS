<?php
include("configASL.php");
$name=$_POST['name'];
$empid=$_POST['empid'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$p1=$_POST['p1'];
$p2=$_POST['p2'];
$date=date('d-M-Y');

$c=mysqli_query($al, "SELECT * FROM employee WHERE empid='$empid'");
if($name==NULL || $empid==NULL || $email==NULL || $contact==NULL || $p1==NULL || $p2==NULL)
{
		// Do Nothing
}
elseif(mysqli_num_rows($c)==1)
		{
			$info="Employee Already Registered ";
		}
		elseif($p1==$p2)
		{	
			$p3=sha1($p1);
			$sql=mysqli_query($al, "INSERT INTO employee VALUES('$empid','$name','$email','$contact','$p3','$date')");
			$info="Successfully Registered User $name";
		}
		else
		{
			$info="Password Didn't Matched";
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="banner"><span class="heading">Registration Panel</span><span style="float:right"><a href="logout.php">Logout</a></span>

</div><br />
<br />
<div align="center">
<form method="post" action="">
<table class="formTable" cellpadding="4" cellspacing="4">
<tr><td colspan="2" align="center" class="formHead">All Fields are Mandatory</td></tr>
<tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Full Name :</td><td><input type="text" name="name" class="fields" placeholder="Enter Full Name" size="40" /></td></tr>
<tr><td class="labels">Employee ID :</td><td><input type="text" name="empid" class="fields" placeholder="Enter Employee ID" size="40" /></td></tr>
<tr><td class="labels">E-Mail ID :</td><td><input type="email" name="email" class="fields" placeholder="Enter E-Mail ID" size="40" /></td></tr>
<tr><td class="labels">Contact No.:</td><td><input type="text" name="contact" class="fields" placeholder="Enter 10 Digit Contact No." maxlength="10" size="40" /></td></tr>
<tr><td class="labels">Password :</td><td><input type="password" name="p1" class="fields" placeholder="Enter Password" size="40" /></td></tr>
<tr><td class="labels">Re-Type Password :</td><td><input type="password" name="p2" class="fields" placeholder="Re-Type Password" size="40" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Register" class="button" onclick="return confirm('Please Check All Information Before Registration');" /></td></tr>
</table>
</form>
<br />
<a href="index.php">Go Back</a>
</div>
</body>
</html>