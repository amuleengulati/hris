<?php
include('db.php');
include('aheader.php');
$id=$_GET['id'];
$query="select * from employee_details where id='$id'";
$result=mysql_query($query) or die(mysql_error());
while($row=mysql_fetch_assoc($result))
{
$fname=$row['fname'];
$lname=$row['lname'];
$des=$row['designation'];
$dept=$row['dept'];
}
?>
<!doctype html>
<html>
	<head>
	</head>
	<body>
		<div style="position:absolute;top:70px;left:230px;height:50px;width:100%;color:grey;padding-top:20px;
		font-size:150%;padding-left:20px;">
		Employees
		</div>
		
		<div style="position:absolute;top:150px;left:250px;height:50px;width:1000px;background-color:white;">
			<div style="position:absolute;top:0px;left:0px;height:50px;width:1000px;background-color:blue;color:white;
			text-transform:uppercase;"><br>
			 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEdit Employee Details
			</div>
		</div>
		<div style="position:absolute;top:200px;left:250px;height:500px;width:980px;background-color:white;padding-left:20px;">
		<form method="post" action="update_details.php?id=<?php echo $id?>" enctype="multipart/form-data"><br><br>
			<table cellspacing='30'><tr><td>
			First Name:</td><td><input type="text" name="fname" required style="padding:5px"></td></tr>
			<tr><td>Last Name:</td><td><input type="text" name="lname" required style="padding:5px"></td></tr>
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
			<tr><td>Designation</td>
			<td><select name="des">
				<option name="hod" value="head of department">Head of department</option>
				<option name="pr" value="professor">Professor</option>
				<option name="ap" value="assistant professor">Assistant professor</option>
				<option name="la" value="lab attendant">Lab attendant</option>
				<option name="o" value="others">Others</option>
			</select>
			</td></tr>
			</table><br><br>
			<input type="submit" value="Update" style="background-color:white;color:blue;border:1px solid blue;width:100px;height:30px;margin-left:80px;"><br><br>
			</form>
		</div>
	</body>
</html>