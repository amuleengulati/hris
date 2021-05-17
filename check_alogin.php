<?php
session_start();
error_reporting(0);
if(!isset($_POST['username']))
{ 
echo "<script>window.location.href='a_login.php';";
echo "</script>";
}
else
{
include('db.php');
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$query="select * from admin_details where username='$username' AND password='$pwd'";
$result=mysql_query($query);
if(mysql_num_rows($result)==1)
{
$query1="insert into login_details(username,password,date_time) values('$username','$pwd',now())";
$result1=mysql_query($query1) or die(mysql_error());
$_SESSION['username']=$username;
header('location:alogin.php');
$query2="select * from admin_details where username='$username' AND password='$pwd'";
$result=mysql_query($query2);
$row=mysql_fetch_assoc($result);
$id=$row['id'];
$_SESSION['id']=$id;
/*$email=$row['email'];
$dp=$row['dp'];
$_SESSION['email']=$email;
$_SESSION['dp']=$dp;*/
$_SESSION['pwd']=$pwd;
$_SESSION['username']=$username;
}
else
{
echo "<script>";
echo "alert('Your Username or Password is incorrect')
window.location.href='a_login.php';";
echo "</script>";
}
}
?>