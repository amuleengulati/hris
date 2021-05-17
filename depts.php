<?php
session_start();
include('aheader.php');
$dept=$_GET['dept'];
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
		Students
		</div>
		
		<div style="position:absolute;top:150px;left:250px;height:50px;width:1000px;">
		
			<div style="position:absolute;top:20px;left:20px;height:30px;width:950px;"><a href='dept.php' style='text-decoration:none;color:red;float:right;'>Back</a>
			</div>
		</div>
		<div style="position:absolute;top:200px;left:250px;height:auto;width:1000px;background-color:white;">
			<?php
			include('db.php');
			
			$query="select * from student_details where dept='".$dept."'";
			$result=mysql_query($query) or die(mysql_error());
				if(mysql_num_rows($result)==0)
				echo "No records to display";
				else
				{
					echo "<center><table border='1'>";
					echo "<th>Student ID</th>";
					echo "<th colspan='9'>Name</th>";
						while($row=mysql_fetch_assoc($result))
						{
						echo "<tr>";
						echo "<td><center>".$row['id']."</center></td>";
						echo "<td><center>".$row['NAME']."</center></td>";
						echo "<td><center>".$row['UNI_RNO']."</center></td>";
						echo "<td><center>".$row['COLLEGE_RNO']."</center></td>";
						echo "<td><center>".$row['FATHER_NAME']."</center></td>";
	                    echo "<td><center>".$row['MOTHER_NAME']."</center></td>";
						echo "<td><center>".$row['MOBILE_NUMBER']."</center></td>";echo "</tr>";
						}
					echo "</table></center>";
				}
			?>
		</div>
	</body>
</html>