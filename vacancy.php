<?php
include('db.php');
include('fheader.php');
?>
<html>
<head>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
	<div style='position:absolute;top:100px;left:550px;height:auto;width:600px;'>
	<?php
	$query="select * from vacancies where id NOT IN(select job from applications where applicant='".$_SESSION['name']." ".$_SESSION['lname']."') ORDER BY(id) DESC";
	$result=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result)==0)
	{
	echo "<center>No vacancies available.</center>";
	}
	else
	{
	while($row=mysql_fetch_assoc($result))
		{
		$id=$row['id'];
		echo "<div id='".$id."' style='position:relative;top:0px;left:50px;height:250px;width:500px;background-color:blue'><div style='position:relative;top:10px;left:100px;height:30;width:300px;color:white;text-transform:uppercase;font-family:goodDog;font-size:200%;'><center><h3>".$row['title']."</h3></center></div><div style='position:relative;top:0px;left:70px;height:20px;width:300px;color:white;'><center>".$row['des']."</center></div><div style='position:relative;top:0px;left:70px;height:30px;width:300px;color:white;'><center><h4>Required Qualification: ".$row['qual']."</h4></center></div><div style='position:relative;top:0px;left:70px;height:20px;width:300px;color:white;'><center><h4>Salary Offered: ".$row['salary']."</h4></center></div><div style='position:relative;top:0px;left:70px;height:20px;width:300px;color:white;'><center><form method='post' action='applyjob.php?id=$id'><input type='submit' value='Apply' style='cursor:pointer;font-family:goodDog;background-color:blue;border:none;font-size:150%;color:white;'></form></center></div></div>";
		}
	}
	?>
	</div>
</body>
</html>