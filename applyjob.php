<?php
session_start();
include('db.php');
$id=$_GET['id'];
$query="insert into applications(job,applicant,email) values($id,'".$_SESSION['name']." ".$_SESSION['lname']."','".$_SESSION['email']."')";
$result=mysql_query($query);
if($result)
{
echo "<script>alert('Application successful.');window.location.href='vacancy.php';";
echo "</script>";
}
else
die(mysql_error());
?>