<?php
session_start();
if(!isset($_SESSION['username']))
{
echo "<script>window.location.href='f_login.php';";
echo "</script>";
}
else
{
$id=$_SESSION['id'];
$name=$_SESSION['name'];
}
?>
<!doctype html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<div style="position:absolute;top:0px;left:0px;height:50px;width:100%;border-bottom:3px solid red"><br>
	<a href='flogin.php' style="text-decoration:none;color:black;margin-left:500px;">Home</a>
	<a href='vacancy.php' style="text-decoration:none;color:black;margin-left:50px;">Vacancies</a>
	<a href='single_leave.php' style="text-decoration:none;color:black;margin-left:50px;">Leaves</a>
	<a href='fperformance.php' style="text-decoration:none;color:black;margin-left:50px;">Performance</a>
	<a href='fbenefits.php' style="text-decoration:none;color:black;margin-left:50px;">Benefits</a>
	<a href='index.html' style="text-decoration:none;color:black;margin-left:50px;">Logout</a>
	</div>
	<div style="position:absolute;top:100px;left:200px;height:250px;width:250px;">
	<?php
	include('db.php');
	$query="select dp from employee_details where fname='".$name."'";
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result))
	{
	$dp=$row['dp'];
	echo "<img src='profilepics/$dp' height='250' width='250'>";
	}
	?>
	</div>
	<div style="position:absolute;top:350px;left:200px;height:60px;width:239px;background-color:white;padding:5px;color:black;font-family:goodDog;font-size:150%;text-transform:uppercase;border:1px solid;border-top:1px solid white">
	<?php
	echo "<center>".$_SESSION['name']." ".$_SESSION['lname']."<br>";
	echo $_SESSION['des']."</center>";
	?>
	</div>
	<div>
	<div style="position:absolute;top:440px;left:200px;height:65px;width:240px;background-color:blue;padding:5px;color:white;">
	<?php
	echo "<table>";
	include('db.php');
	$query="select doj from employee_details where fname='".$_SESSION['name']."' AND lname='".$_SESSION['lname']."'";
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result))
	$doj=$row['doj'];
			$datenow = date("Y-m-d");
			$diff = (strtotime($datenow)-strtotime($doj))/(86400);
			$days = sprintf("%02d", $diff);
			echo "<tr><td><center>".$days." days</center></td>";
			
			$query1="select count(DISTINCT date) AS total from attendance_record";
			$result1=mysql_query($query1);
			$row1=mysql_fetch_assoc($result1);
			$total=$row1['total'];
			
			$q="select count(*) AS present from attendance_record where name='".$_SESSION['name']." ".$_SESSION['lname']."' AND status='p'";
			$r=mysql_query($q) or die(mysql_error());
			$row1=mysql_fetch_assoc($r);
			$p=$row1['present'];
			echo "<td><center>".$p."/".$total."</center></td>";
			
			$q1="select count(*) AS leaves from single_leave where fname='".$_SESSION['name']."' AND lname='".$_SESSION['lname']."' AND status='accepted'";
			$rq1=mysql_query($q1) or die(mysql_error());
			$row2=mysql_fetch_assoc($rq1);
			$leave=$row2['leaves'];
			echo "<td><center>".$leave."/10</center></td></tr>";
			echo "<tr><td>At work</td><td>Attendance</td><td>Leaves</td></tr></table>";
	?>
	</div>
	</body>
</html>