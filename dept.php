
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
		Departments
		</div>
		<div style="position:absolute;top:150px;left:250px;height:auto;width:1000px;background-color:white;padding:20px;">
		<?php
		$query="select * from departments";
		$result=mysql_query($query);
		echo "<table>";
		while($row=mysql_fetch_assoc($result))
		{
		$n=$row['name'];
		$icon=$row['icon'];
		$query1="select * from employee_details where dept='".$n."'";
		$result1=mysql_query($query1);
		$e=mysql_num_rows($result1);
		$query2="select * from student_details where dept='".$n."'";
		$result2=mysql_query($query2);
		$s=mysql_num_rows($result2);
		
		echo "<tr><td><a href='#' style=' text-decoration:none; color:black;padding-left:100px'><b>Department:</b> ".$n."<br></a>";
		echo "<a href='depte.php?dept=$n' style=' text-decoration:none; color:black;padding-left:100px' ><b>Total Employees:</b> ".$e."<br></a>";
		echo "<a href='depts.php?dept=$n' style=' text-decoration:none; color:black;padding-left:100px;'><b>Total students:</b> ".$s."</a></td>";
		echo "<td><img src='images/$icon' height='150' width='120' style='padding-left:100px;vertical-align:40%;'><br></td></tr>"; 
		}
		echo "</table>";
		?>
		</div>
</div>