<?php
session_start();
error_reporting(0);
if(!isset($_POST['username']))
{ 
echo "<script>window.location.href='f_login.php';";
echo "</script>";
}
else
{
include('db.php');
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$query="select * from employee_login where username='$username' AND password='$pwd'";
$result=mysql_query($query);
if(mysql_num_rows($result)==1)
{
$query1="insert into login_details(username,password,date_time) values('$username','$pwd',now())";
$result1=mysql_query($query1) or die(mysql_error());
$_SESSION['username']=$username;
header('location:flogin.php');
$query2="select * from employee_login where username='$username' AND password='$pwd'";
$result=mysql_query($query2);
$row=mysql_fetch_assoc($result);
$id=$row['id'];
$_SESSION['id']=$id;
$name=$row['name'];
$_SESSION['name']=$name;
$query3="select * from employee_details where fname='".$name."'";
$result=mysql_query($query3);
$row=mysql_fetch_assoc($result);
$email=$row['email'];
$_SESSION['email']=$email;
$lname=$row['lname'];
$_SESSION['lname']=$lname;
$id1=$row['id'];
$_SESSION['id1']=$id1;
$des=$row['designation'];
$_SESSION['des']=$des;
}
else
{
echo "<script>";
echo "alert('Your Username or Password is incorrect')
window.location.href='f_login.php';";
echo "</script>";
}
}
?>