<?php
include('db.php');
$id=$_GET['id'];
$query="delete from employee_details where id=$id";
$result=mysql_query($query) or die(mysql_error());
echo "<script>alert('Record deleted successfully.');window.location.href='aemployee.php';";
echo "</script>";
?>