<?php
session_start();
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
		Leave Applications
		</div>
		<div style="position:absolute;top:120px;left:250px;height:90px;width:1000px;border-bottom:3px solid red;background-color:white;">
		<p style='color:grey;margin-left:20px'>Apply Leave<hr>
		<a href='leaveapp.php' style="text-decoration:none;color:black;margin-left:20px;"> Single-Day Leaves</a>
		<a href='mleaveapp.php' style="text-decoration:none;color:black;margin-left:50px;"> Multiple-Day Leaves</a>
		</div>
		<div style="position:absolute;top:213px;left:250px;height:auto;width:1000px;background-color:white;"><br>
		<?php
		include('db.php');
		$query="select * from multiple_leave where status='unknown'";
		$result=mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($result)==0)
				echo "<center><br>No records to display</center>";
				else
				{
					echo "<center><table border='1'>";
					echo "<th>Employee ID</th>";
					echo "<th>Name</th>";
					echo "<th>Email</th>";
					echo "<th>Department</th>";
					echo "<th>Designation</th>";
					echo "<th>Leave Start Date</th>";
					echo "<th>Leave End Date</th>";
					echo "<th>Leave Type</th>";
					echo "<th>Leave Reason</th>";
					echo "<th>Accept</th>";
					echo "<th>Reject</th>";
						while($row=mysql_fetch_assoc($result))
						{
						$id=$row['id'];
						echo "<tr>";
						echo "<td><center>".$row['user_id']."</center></td>";
						echo "<td><center>".$row['fname']." ".$row['lname']."</center></td>";
						echo "<td><center>".$row['email']."</center></td>";
						echo "<td><center>".$row['dept']."</center></td>";
						echo "<td><center>".$row['designation']."</center></td>";
						echo "<td><center>".$row['start_date']."</center></td>";
						echo "<td><center>".$row['end_date']."</center></td>";
						echo "<td><center>".$row['type']."</center></td>";
						echo "<td><center>".$row['reason']."</center></td>";
						echo "<td><center><a href='maccept_leave.php?id=$id'>Accept</a></center></td>";
						echo "<td><center><a href='mreject_leave.php?id=$id'>Reject</a></center></td>";
						echo "</tr>";
						}
					echo "</table></center>";
				
		}
		?>
		</div>
	</body>
</html>