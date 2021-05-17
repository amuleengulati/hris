<?php
include('aheader.php');
include('db.php');
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
		Notice Board
		</div>
		
		<div style=	"position:absolute;top:150px;left:250px;height:350px;width:1000px;background-color:white; border-top:3px solid red;">
		<form method='post' action='noticedb.php' style='color:grey;padding-left:20px'>
		<table>
		<center><h3>Fill the following details:</h3></center><br>
		<tr><td>Department: </td><td> <input type='checkbox' name='dept[]' value="computer science engineering">Computer Science Engineering</td>
				<td><input type="checkbox" name="dept[]" value="mechanical engineering">Mechanical Engineering</td>
				<td><input type="checkbox" name="dept[]" value="electrical engineering">Electrical Engineering</td></tr>
				<tr><td> </td><td><input type="checkbox" name="dept[]" value="electronics and communication engineering">Electronics and Communication Engineering</td>
				<td><input type="checkbox" name="dept[]" value="production engineering">Production Engineering</td></tr>
				<tr><td> </td><td><input type="checkbox" name="dept[]" value="civil engineering">Civil Engineering</td>
				<td><input type="checkbox" name="dept[]" value="information technology">Information Technology</td></tr>
		<tr><td>Message: </td><td> <textarea name='info' required></textarea></td></tr>
		</table><br>
		<center><input type='submit' value='Add to notice board'></center>
		</form>
		</div>
		</body>
	</html>