<?php
session_start();
include('aheader.php');
include('db.php');
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="position:absolute;top:70px;left:230px;height:50px;width:100%;color:grey;padding-top:20px;
		font-size:150%;padding-left:20px;">
		Attendance
		</div>
		
		<div style="position:absolute;top:150px;left:250px;height:50px;width:1040px;background-color:white;border-bottom:3px solid red;"><br>
		<a href="select_dept.php" style="text-decoration:none;color:black;padding-left:20px;">Mark attendance</a>
		<a href="view_att.php" style="text-decoration:none;color:black;padding-left:50px;">View attendance</a>
		<a href="view_stat.php" style="text-decoration:none;color:black;padding-left:50px;">View statistics</a>
		</div>
		<div style="position:absolute;top:203px;left:250px;height:auto;width:1000px;background-color:white;padding:20px;">
		<?php
		$query="select * from departments";
		$result=mysql_query($query);
		while($row=mysql_fetch_assoc($result))
		{
		$n=$row['name'];
		$icon=$row['icon'];
		//$n1=preg_replace('/\s+/', '', $n);
		echo "<img src='images/$icon' height='150' width='120' style='padding-left:100px;'>"; 
		echo "<a href='attendance.php?dept=".$n."' style='vertical-align:340%;padding-left:20px; text-decoration:none; color:black;'>".$n."</a><br><br>";
		}
		?>
		</div>
</div>