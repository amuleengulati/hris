<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username']))
{
echo "<script>window.location.href='f_login.php';";
echo "</script>";
}
else
{
include('fheader.php');
}
?>
<!doctype html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<div style="position:absolute;top:100px;left:500px;height:150px;width:350px;border:1px solid">
	<?php
	include('db.php');
	$query="select * from employee_details where email='".$_SESSION['email']."'";
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result))
	{
	echo "<table>";
	echo "<th colspan='2'>Personal Details</th>";
	echo "<tr><td>Name</td><td>".$row['fname'];
	echo "<tr><td>Date of Birth</td><td>".$row['dob'];
	echo "<tr><td>Address</td><td>".$row['address'];
	echo "<tr><td>Education</td><td>".$row['education'];
	echo "</table>";
	}
	?>
	</div>
	<div style="position:absolute;top:320px;left:500px;height:200px;width:350px;border:1px solid">
	<?php
	include('db.php');
	$query="select * from employee_details where email='".$_SESSION['email']."'";
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result))
	{
	echo "<table>";
	echo "<th colspan='2'>Company Details</th>";
	echo "<tr><td>Employee ID</td><td>".$row['id'];
	echo "<tr><td>Department</td><td>".$row['dept'];
	echo "<tr><td>Designation</td><td>".$row['designation'];
	echo "<tr><td>Specialization</td><td>".$row['specialization'];
	echo "<tr><td>Salary</td><td>".$row['salary'];
	
	echo "</table>";
	}
	?>
	</div>
	<div style="position:absolute;top:100px;left:870px;height:290px;width:440px;border:1px solid;">
	<?php
	include('db.php');
	echo "<table>";
	echo "<th>Notice Board</th>";
	$sql="select dept from employee_details where fname='".$_SESSION['username']."'";
	$result=mysql_query($sql) or die(mysql_error());
	$row=mysql_fetch_assoc($result);
	$dept=$row['dept'];
	$sql1="select msg from notice where dept LIKE('%".$dept."%') ";
	$result=mysql_query($sql1);
	while($row=mysql_fetch_assoc($result))
	{
	echo "<tr><td><b>~</b>".$row['msg']."</td></tr>";
	}
	echo "</table>";
	?>
	</div>
	</body>
</html>