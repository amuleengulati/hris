<?php
session_start();
if(!isset($_SESSION['username']))
{
echo "<script>window.location.href='stu_login.php';";
echo "</script>";
}
else
{
include('sheader.php');
}
?>
<!doctype html>
<html>
	<head>
	</head>
	<body>
	<div style="position:absolute;top:100px;left:400px;height:1750px;width:900px;padding-left:30px;">
	<h1>Select teacher to view performance</h1>
	<?php
	include('db.php');
	$query="select * from employee_details";
	$result=mysql_query($query) or die(mysql_error());
	echo "<table cellspacing=20>";
	while($row=mysql_fetch_assoc($result))
	{
	echo "<tr>";
	$p=$row['dp'];
	$f=$row['fname'];
	echo "<td><a href='demo.php?id=$f'><img src='profilepics/".$p."' height='150' width='120'></a><br>";
	echo "<td>".$row['fname']." ".$row['lname']."<br>".$row['designation']."<br>".$row['dept']."</td>";
	echo "</tr>";
	}
	echo "</table>";
	?>
	</div>
	</body>
</html>