<?php
include('db.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$dept=$_POST['dept'];
$des=$_POST['des'];
$id=$_GET['id'];
$query="update employee_details set fname='$fname',lname='$lname', designation='$des', dept='$dept' where id=$id";
$result=mysql_query($query) or die(mysql_error());
echo "<script>alert('Record updated successfully.');window.location.href='aemployee.php';";
echo "</script>";
?>