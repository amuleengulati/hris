<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username']))
{ 
echo "<script>window.location.href='stu_login.php';";
echo "</script>";
}
?>
<!doctype html>
<html>
	<head>
	<script src="jquery.js"></script>
	<script src='script.js'></script>
	</head>
	<body>
	<div style="position:absolute;top:0px;left:0px;height:50px;width:100%;border-bottom:3px solid red"><br>
	<a href='s_login.php' style="text-decoration:none;color:black;margin-left:500px;">Home</a>
	<a href='student_feedback.php' style="text-decoration:none;color:black;margin-left:50px;">Give Feedback</a>
	<a href='select.php' style="text-decoration:none;color:black;margin-left:50px;">View Performance</a>
	<a href='index.html' style="text-decoration:none;color:black;margin-left:50px;" id='logout'>Logout</a>
	</div>
	</body>
</html>