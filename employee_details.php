<?php
/*error_reporting(0);
if(!isset($_POST['username']))
{ 
echo "<script>window.location.href='login.php';";
echo "</script>";
}
else
{*/
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$dept=$_POST['dept'];
$edu=$_POST['education'];
$des=$_POST['des'];
$ss=$_POST['ss'];
$salary=$_POST['salary'];
$doj=$_POST['doj'];
$dp=$_FILES['dp']['name'];
$path="profilepics/".basename($_FILES["dp"]["name"]);
move_uploaded_file($_FILES['dp']['tmp_name'],$path);

$host='localhost';
$user='root';
$password='';
$database='hris';
$db=mysql_connect($host,$user,$password);
mysql_select_db($database,$db);
$query="select * from employee_details where email='$email'";
$result=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($result)==0)
{
$query1="insert into employee_details(fname,lname,email,dob,address,dept,education,designation,specialization,salary,doj,dp) values('$fname','$lname','$email','$dob','$address','$dept','$edu','$des','$ss','$salary','$doj','$dp')";
$result1=mysql_query($query1) or die(mysql_error());
echo "<script>alert('New employee record added successfully.');window.location.href='aemployee.php';";
echo "</script>";
}
else
{
echo "<script>alert('Employee with this email already exists.');window.location.href='aemloyee.php';";
echo "</script>";
}
//}
?>