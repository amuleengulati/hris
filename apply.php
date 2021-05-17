<?php
session_start();
include('db.php');
$date=$_POST['date'];
$type=$_POST['type'];
$reason=$_POST['reason'];
$email=$_SESSION['email'];
$query='select * from employee_details where email="'.$email.'"';
$result=mysql_query($query) or die(mysql_error());
while($row=mysql_fetch_assoc($result))
{
$id=$row['id'];
$fname=$row['fname'];
$lname=$row['lname'];
$dept=$row['dept'];
$des=$row['designation'];
}

$datenow = date("Y-m-d");
$diff = (strtotime($date) - strtotime($datenow))/(86400);
$days = sprintf("%02d", $diff);
if($days>=7)
{
$query="insert into single_leave(user_id,email,fname,lname,dept,designation,leave_date, type, reason) values ($id,'$email','$fname','$lname','$dept','$des','$date','$type','$reason')";
$result=mysql_query($query);
if($result)
{
echo "<script>";
echo "alert('Leave applied successfully')
window.location.href='flogin.php';";
echo "</script>";
}
else
{
echo "<script>";
echo "alert('Leave. Please try again.')
window.location.href='single_leave.php';";
echo "</script>";
}
}
else
{
echo "<script>";
echo "alert('Leave application unsuccessful. Please try again.')
window.location.href='single_leave.php';";
echo "</script>";
}
?>