<?php
session_start();
$d=$_GET['dept'];
$_SESSION['dept']=$d;
$dept=$d;
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
		<div style="position:absolute;top:203px;left:250px;height:50px;width:1040px;background-color:white;border-bottom:3px solid red;"><br>
		<a href="selecta.php?dept=<?php echo $dept?>" style="text-decoration:none;color:black;padding-left:20px;">Daily View</a>
		<a href="month.php?dept=<?php echo $dept?>" style="text-decoration:none;color:black;padding-left:50px;">Monthly View</a>
		<a href="view_stat.php" style="text-decoration:none;color:black;padding-left:50px;">Yearly View</a>
		</div>
		<div style="position:absolute;top:256px;left:250px;height:auto;width:1000px;background-color:white;padding:20px;">
		<form method='post' action='statistics.php?dept=<?php echo $dept ?>'>
		Select year to view statistics
		<select name="year" required>
		<option value='2016'>2016</option>
		<option value='2015'>2015</option>
		</select>
		<br><center><input type='submit' value='submit'></center>
		</form>
		</div>
</div>
</body>
</html>