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
		Employees
		</div>
		
		<div style="position:absolute;top:150px;left:250px;height:120px;width:1000px;background-color:white;">
		
			<div style="position:absolute;top:20px;left:20px;height:20px;width:120px;background-color:blue;
			color:white;padding:10px;cursor:pointer;" id="add">Add Employee +
			</div>
			
			<div style="position:absolute;top:20px;left:900px;height:20px;width:50px;background-color:blue;padding:10px;padding-left:20px;cursor:pointer;"><input type="button"value="Print" onclick="printPage();" style="position:absolute;top:0px;left:0px;height:30px;width:50px;background-color:blue;color:white;cursor:pointer;border:none;margin-left:10px;padding:10px;"></input>
<script>			
	function printPage() {
    var prtContent = document.getElementById("p");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
			</div>
		</div>
		<div style="position:absolute;top:250px;left:250px;height:50px;width:1000px;background-color:white;border-bottom:3px solid red;border-top:3px solid red;"><br>
		<a href="aemployee.php" style="text-decoration:none;color:black;padding-left:20px;">All Employees</a>
		<a href="gdept.php" style="text-decoration:none;color:red;padding-left:50px;">Group By Department</a>
		<a href="gdes.php" style="text-decoration:none;color:black;padding-left:50px;">Group By Designation</a>
		</div>
		<div style="position:absolute;top:310px;left:250px;height:auto;width:1000px;background-color:white;" id="p">
			<?php
			include('db.php');
			$query="select DISTINCT dept from employee_details";
			$result=mysql_query($query) or die(mysql_error());
				if(mysql_num_rows($result)==0)
				echo "No records to display";
				else
				{
				while($row1=mysql_fetch_assoc($result))
				{
					echo "<center><table border='1'><br><caption>".$row1['dept']."</caption>";
					echo "<th>Employee ID</th>";
					echo "<th>Image</th>";
					echo "<th>Name</th>";
					echo "<th>Designation</th>";
					echo "<th>At Work</th>";
					echo "<th>Department</th>";
					echo "<th>Edit</th>";
					echo "<th>Delete</th>";
					$q1="select * from employee_details where dept='".$row1['dept']."'";
					$r1=mysql_query($q1);
					while($row=mysql_fetch_assoc($r1))
					{
						$dp=$row['dp'];
						$doj=$row['doj'];
						$id=$row['id'];
						echo "<tr>";
						echo "<td><center>".$row['id']."</center></td>";
						echo "<td>"."<center><img src='profilepics/$dp' height='100' width='100'></center>"."</td>";
						echo "<td><center>".$row['fname']." ".$row['lname']."</center></td>";
						echo "<td><center>".$row['designation']."</center></td>";
						echo "<td><center>".$doj."</center></td>";
						echo "<td><center>".$row['dept']."</center></td>";
						echo "<td><center><a href='edit_employee.php?id=$id'>Edit</a></center></td>";
						echo "<td><center><a href='delete_employee.php?id=$id'>Delete</a></center></td>";
						echo "</tr>";
						}
						}
					echo "</table></center>";
				}
			?>
		</div>
		
		<div class="c">
		</div>
		
		<div class="popup">
			<input type="button" value="X" style="float:right" id="close">
			<center><p id="p2">Enter the following employee details</p>
			<form method="post" action="employee_details.php" enctype="multipart/form-data">
			<table><tr><td>
			First Name:</td><td><input type="text" name="fname" required style="padding:5px"></td></tr>
			<tr><td>Last Name:</td><td><input type="text" name="lname" required style="padding:5px"></td></tr>
			<tr><td>Email:</td><td><input type="email" name="email" required style="padding:5px"></td></tr>
			<tr><td>Birthdate:</td>
			<td><input type="date" name="dob" required style="padding:5px"></td></tr>
			<tr><td>Address</td>
			<td><input type="text" name="address" required style="padding:5px"></td></tr>
			<tr><td>Department</td>
			<td><select name="dept">
				<option name="cs" value="computer science engineering">Computer Science Engineering</option>
				<option name="m" value="mechanical engineering">Mechanical Engineering</option>
				<option name="e" value="electrical engineering">Electrical Engineering</option>
				<option name="ec" value="electronics and communication engineering">Electronics and Communication Engineering</option>
				<option name="p" value="production engineering">Production Engineering</option>
				<option name="c" value="civil engineering">Civil Engineering</option>
				<option name="it" value="information technology">Information Technology</option>
			</select>
			</td></tr>
			<tr><td>Education</td>
			<td><input type="text" name="education" required style="padding:5px"></td></tr>
			<tr><td>Designation</td>
			<td><select name="des">
				<option name="hod" value="head of department">Head of department</option>
				<option name="pr" value="professor">Professor</option>
				<option name="ap" value="assistant professor">Assistant professor</option>
				<option name="la" value="lab attendant">Lab attendant</option>
				<option name="o" value="others">Others</option>
			</select>
			</td></tr>
			<tr><td>Subject Specialization</td>
			<td><select name="ss">
				<option name="cs" value="computer science">Computer Science</option>
				<option name="m" value="mechanical">Mechanical</option>
				<option name="e" value="electrical">Electrical</option>
				<option name="ec" value="electronics and communication">Electronics and Communication</option>
				<option name="p" value="production">Production</option>
				<option name="c" value="civil">Civil</option>
				<option name="it" value="information technology">Information Technology</option>
			</select></td></tr>
			<tr><td>Base salary</td>
			<td><input type="number" name="salary" min="10000" required style="padding:5px"></td></tr>
			<tr><td>Date of Joining</td>
			<td><input type="date" name="doj" required style="padding:5px"></td></tr>
			<tr><td>Upload your pic:</td><td><input type="file" name="dp" required></td></tr></table><br><br>
			<input type="submit" value="Add" style="background-color:white;color:blue;border:1px solid blue;width:100px;height:30px;"><br><br>
			</form>
		</div>
	</body>
</html>