<?php
session_start();
$dept=$_GET['dept'];
include('aheader.php');
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
include('db.php');
$query="select distinct(date) from attendance_record";
$result=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($result)==0)
				echo "No records to display";
				else
				{ 	echo "<p style='text-transform:uppercase;'>".$dept."<p>";
					echo "<center><table border='1'>";
					echo "<th>Date</th>";
					echo "<th>Total Employees</th>";
					echo "<th>Present Employees</th>";
					echo "<th>Absent Employees</th>";
while($row=mysql_fetch_assoc($result))
{
$date=$row['date']; 

$total=mysql_num_rows($result);

$q="select * from employee_details where dept='".$dept."'";
$r=mysql_query($q) or die(mysql_error());
$t=mysql_num_rows($r);
$query1="select * from attendance_record where dept='".$dept."' AND status='p' AND date='".$date."' ";
$result1=mysql_query($query1) or die(mysql_error());
$p=mysql_num_rows($result1);
$a=$t-$p;
echo "<tr>";
						echo "<td><center>".$date."</center></td>";
						
						echo "<td><center>".$t."</center></td>";
						
						echo "<td><center>".$p."</center></td>";
						echo "<td><center>".$a."</center></td>";
						echo "</tr>";
}
echo "</table></center>";
}
?>
</div>