<?php
session_start();
include('db.php');
$title=$_POST['title'];
$des=$_POST['des'];
$salary=$_POST['salary'];
$qual=$_POST['qual'];
$qual1=$_POST['qual1'];
$qual2=$_POST['qual2'];
$info=$_POST['info'];

$query="insert into vacancies(title,des,salary,qual,info) values('$title','$des','$salary','$qual $qual1 $qual2','$info')";
$result=mysql_query($query) or die(mysql_error());

 echo "<script>alert('Vacancy saved.');window.location.href='recruit.php';";
		echo "</script>";

?>