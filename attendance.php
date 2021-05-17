<?php
include('aheader.php');
include('db.php');
$dept=$_GET['dept'];
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
		$date=date('Y-m-d');
		echo "Date:".$date."<br>";
		$query="select * from employee_details where dept='".$dept."'";
		$result=mysql_query($query) or die(mysql_error());
		while($row1=mysql_fetch_assoc($result))
		{
		$id=$row1['id'];
				if(mysql_num_rows($result)==0)
				echo "<center>No records to display</center>";
				else
				{
					echo "<form method='post' action='att.php?id=$id'>";
					echo "<center><table border='1'>";
					echo "<th>Employee ID</th>";
					echo "<th>Name</th>";
					echo "<th>Designation</th>";
					echo "<th>Status</th>";
					$query="select * from employee_details where dept='".$dept."'";
		$result=mysql_query($query) or die(mysql_error());
						while($row=mysql_fetch_assoc($result))
						{
						echo "<tr>";
						echo "<td><center>".$row['id']."</center></td>";
						echo "<td><center>".$row['fname']." ".$row['lname']."</center></td>";
						echo "<td><center>".$row['designation']."</center></td>";
						echo "<td><input type='radio' id='a1' name='a' value='p' required>Present";
						echo "<input type='radio' id='a2' name='a' value='a' required>Absent</td>";
						echo "</tr>";
						}
					echo "</table></center>";
					echo "<br><br><br><center><input type='submit' value='submit' style='background-color:red;color:white;border:none;height:30px;width:70px;'></center>";
					echo "</form>";
				}
				}
		?>
		</div>
</body>
</html>