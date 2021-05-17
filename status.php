<?php
include('apply_leave.php');
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="position:absolute;top:190px;left:500px;height:290px;width:700px;"><br>
<?php
include('db.php');
$query="select * from single_leave where email='".$_SESSION['email']."' ORDER BY(id) DESC";
$result=mysql_query($query);
				   echo "<h3>Single Leaves: </h3>";
					echo "<center><table border='1'>";
					echo "<th>Employee ID</th>";
					echo "<th>Name</th>";
					echo "<th>Leave Date</th>";
					echo "<th>Leave Type</th>";
					echo "<th>Leave Reason</th>";
					echo "<th>Status</th>";
						while($row=mysql_fetch_assoc($result))
						{
						$id=$row['id'];
						echo "<tr>";
						echo "<td><center>".$row['user_id']."</center></td>";
						echo "<td><center>".$row['fname']." ".$row['lname']."</center></td>";
						echo "<td><center>".$row['leave_date']."</center></td>";
						echo "<td><center>".$row['type']."</center></td>";
						echo "<td><center>".$row['reason']."</center></td>";
						echo "<td><center>".$row['status']."</center></td>";
						echo "</tr>";
						}
					echo "</table></center>";
				
		
		$query="select * from multiple_leave where email='".$_SESSION['email']."' ORDER BY(id) DESC";
        $result=mysql_query($query);
		if(mysql_num_rows($result)==0)
		{
		echo "";
		}		
				else
				{   echo "<h3>Multiple Leaves: </h3>";
					echo "<center><table border='1'>";
					echo "<th>Employee ID</th>";
					echo "<th>Name</th>";
					echo "<th>Leave Start Date</th>";
					echo "<th>Leave End Date</th>";
					echo "<th>Leave Type</th>";
					echo "<th>Leave Reason</th>";
					echo "<th>Status</th>";
						while($row=mysql_fetch_assoc($result))
						{
						$id=$row['id'];
						echo "<tr>";
						echo "<td><center>".$row['user_id']."</center></td>";
						echo "<td><center>".$row['fname']." ".$row['lname']."</center></td>";
						echo "<td><center>".$row['start_date']."</center></td>";
						echo "<td><center>".$row['end_date']."</center></td>";
						echo "<td><center>".$row['type']."</center></td>";
						echo "<td><center>".$row['reason']."</center></td>";
						echo "<td><center>".$row['status']."</center></td>";
						echo "</tr>";
						}
					echo "</table></center>";
				
		}
?>
</div>
</body>
</html>