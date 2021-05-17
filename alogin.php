<?php

include('aheader.php');

?>
<!doctype html>
<html>
	<head>
	<script src='jquery.js'></script>
	<script src='script.js'></script>
	</head>
	<body>
		</div>
		<div style="position:absolute;top:70px;left:230px;height:50px;width:100%;color:grey;padding-top:20px;font-size:150%;padding-left:20px;">
		Dashboard
		</div>
		<div style="position:absolute;top:250px;left:300px;height:130px;width:250px;
		background-image:url(images/employee.jpg);color:white;cursor:pointer" id="emp">
		<?php
		include('db.php');
		$q='select * from employee_details';
		$result=mysql_query($q);
		$n=mysql_num_rows($result);
		echo "<br><h style='font-size:300%;margin-left:200px'>".$n."</h><br><h style='font-size:120%;margin-left:100px'> Total Employees</h>";
		?>
		</div>
		<div style="position:absolute;top:250px;left:600px;height:130px;width:250px;
		background-image:url(images/employee.jpg);color:white;cursor:pointer;background-color:green" id="dep">
		<?php
		include('db.php');
		$q='select * from departments';
		$result=mysql_query($q);
		$n=mysql_num_rows($result);
		echo "<br><h style='font-size:300%;margin-left:200px'>".$n."</h><br><h style='font-size:120%;margin-left:100px'> Total Departments</h>";
		?>
		</div>
		<div style="position:absolute;top:250px;left:900px;height:130px;width:250px;
		background-image:url(images/employee.jpg);color:white;cursor:pointer;">
		<?php
		include('db.php');
		$q='select * from student_details';
		$result=mysql_query($q);
		$n=mysql_num_rows($result);
		echo "<br><h style='font-size:300%;margin-left:150px'>".$n."</h><br><h style='font-size:120%;margin-left:120px'> Total Students</h>";
		?>
		</div>

	</body>
</html>