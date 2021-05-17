<?php
session_start();
include('db.php');
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];
$type=$_POST['type'];
$reason=$_POST['reason'];
$email=$_SESSION['email'];
$query='select id from employee_details where email="'.$email.'"';
$result=mysql_query($query) or die(mysql_error());
while($row=mysql_fetch_assoc($result))
{
$id=$row['id'];
}

$datenow = date("Y-m-d");
$diff = (strtotime($sdate) - strtotime($datenow))/(86400);
$days = sprintf("%02d", $diff);
if($days>=10)
{
$query="insert into multiple_leave(user_id,email,start_date,end_date, type, reason) values ($id,'$email','$sdate','$edate','$type','$reason')";
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
echo "alert('Leave application unsuccessful. Please try again.')
window.location.href='multiple_leave.php';";
echo "</script>";
}
}
else
{
echo "<script>";
echo "alert('Leave application unsuccessful. Please try again.')
window.location.href='multiple_leave.php';";
echo "</script>";
}
?>