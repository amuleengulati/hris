
<?php
session_start();
include('aheader.php');
include('db.php');
$dept=$_GET['dept'];
$_SESSION['dept']=$dept;
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="position:absolute;top:70px;left:230px;height:50px;width:100%;color:grey;padding-top:20px;
		font-size:150%;padding-left:20px;">
		Performance
		</div>
		<div style="position:absolute;top:120px;left:20px;height:30px;width:1250px;"><a href='adper.php' style='text-decoration:none;color:red;float:right;'>Back</a>
			</div>
		<div style="position:absolute;top:150px;left:250px;height:50px;width:1040px;background-color:white;border-bottom:3px solid red;"><br>
		<a href="adper.php" style="text-decoration:none;color:black;padding-left:20px;">Select Teacher</a>
		</div>
		<div style="position:absolute;top:203px;left:250px;height:auto;width:1000px;background-color:white;padding:20px;">
		<?php
		$query="select * from employee_details where dept='".$dept."'";
		$result=mysql_query($query) or die(mysql_error());
	while($row=mysql_fetch_assoc($result))
		{
		$p=$row['dp'];
	$f=$row['fname'];
	$id=$row['id'];
		//$n1=preg_replace('/\s+/', '', $n);
		echo "<img src='profilepics/$p' height='150' width='120' style='padding-left:100px;'>"; 
		echo "<a href='per.php?id=".$id."' style='vertical-align:340%;padding-left:20px; text-decoration:none; color:black;'>".$f." ".$row['lname']."</a><br><br>";
		}
		?>
		</div>
</div>