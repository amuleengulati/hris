<?php
session_start();
include('db.php');
include('aheader.php');
?>
<!doctype html>
<html>
	<head>
	<link  rel="stylesheet" type="text/css" href="style.css">
	<script src="jquery.js"></script>
	<script src="script.js"></script>
	</head>
	<body>
	
		<div style="position:absolute;top:70px;left:230px;height:50px;width:100%;color:grey;padding-top:20px;
		font-size:150%;padding-left:20px;">
		Payroll
		</div>
		<div style="position:absolute;top:150px;left:250px;height:50px;width:1000px;background-color:white; border-top:3px solid red;"><br>
		<a href="payroll.php" style='text-decoration:none;color:red;padding-left:10px'>College Payroll</a>
		<a href="benefits.php" style='text-decoration:none;color:black;padding-left:30px'>Benefits</a>
		</div>
		<div style="position:absolute;top:203px;left:250px;height:350px;width:1000px;background-color:white; border-top:3px solid red;">
		
		<?php
		echo "<table border='1'>";
		echo "<th>#</th>";
		echo "<th>Department</th>";
		echo "<th>Total Monthly Salaries</th>";
		echo "<th>Total Yearly Salaries</th>";
		$query="select DISTINCT dept from employee_details";
		$result=mysql_query($query) or die(mysql_error());
		$sno=1;
		while($row=mysql_fetch_assoc($result))
		{
		$q="select sum(salary) AS sal,dept from employee_details where dept='".$row['dept']."'";
		$r=mysql_query($q) or die(mysql_error());
		while($s=mysql_fetch_assoc($r))
		{
		$y=$s['sal']*12;
		echo "<tr><td>".$sno."</td>";
			echo "<td>".$s['dept']."</td>";
			echo "<td>".$s['sal']."</td>";
			echo "<td>".$y."</td></tr>";
		$sno++;
		}
		}
		echo "</table>";
		?>
		<br>
		<center><a href='cpay.php' style='text-decoration:none;color:red;'>Switch view</a></center>
		</div>
		</body>
	</html>