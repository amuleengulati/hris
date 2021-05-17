<?php
session_start();
error_reporting(0);
if(!isset($_POST['username']))
{ 
echo "<script>window.location.href='stu_login.php';";
echo "</script>";
}
else
{
include('db.php');
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$query="select * from student_details where username='$username' AND password='$pwd'";
$result=mysql_query($query);
if(mysql_num_rows($result)==1)
{
$query1="insert into login_details(username,password,date_time) values('$username','$pwd',now())";
$result1=mysql_query($query1) or die(mysql_error());
$_SESSION['username']=$username;
header('location:s_login.php');
$query2="select * from student_details where username='$username' AND password='$pwd'";
$result=mysql_query($query2);
$row=mysql_fetch_assoc($result);
$id=$row['id'];
$_SESSION['id']=$id;
$dept=$row['dept'];
$_SESSION['dept']=$dept;

/*$dp=$row['dp'];
$_SESSION['email']=$email;
$_SESSION['dp']=$dp;
$_SESSION['pwd']=$pwd;
*/
}
else
{
echo "<script>";
echo "alert('Your Username or Password is incorrect')
window.location.href='stu_login.php';";
echo "</script>";
}
}
?>