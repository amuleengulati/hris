<?php
session_start();
include('db.php');
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
		Job Vacancies
		</div>
		
		<div style="position:absolute;top:150px;left:250px;height:350px;width:1000px;background-color:white; border-top:3px solid red;">
		<form method='post' action='recruitdb.php' style='color:grey;padding-left:20px'>
		<table>
		<center><h3>Fill the following job details:</h3></center><br>
		<tr><td>Job Title*</td><td> <input type='text' name='title' required></td></tr>
		<tr><td>Job Description*</td><td> <input type='text' name='des' required></td></tr>
		<tr><td>Salary Offered* </td><td><input type='number' min='0' name='salary' required></td></tr>
		<tr><td>Required Qualifications</td><td> <input type='text' name='qual' required>*</td><td> <input type='text' name='qual1'> </td><td><input type='text' name='qual2'></td></tr>
		<tr><td>Any additional information</td><td> <textarea name='info'></textarea></td></tr>
		</table><br>
		<center><input type='submit' value='Add vacancy'></center>
		</form>
		</div>
		</body>
	</html>