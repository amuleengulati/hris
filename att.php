<?php
include('db.php');
$id=$_GET['id'];
if($_POST['a1'])
{
$att='p';
}
else
$att='a';
$date=date('Y-m-d');
$query='select * from employee_details where id='.$id.'';
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result))
{
$fname=$row['fname'];
$lname=$row['lname'];
$des=$row['designation'];
$dept=$row['dept'];
}
$query="select * from attendance_record where user_id=".$id." AND date='".$date."'";
$result=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($result)==0)
{
$query="insert into attendance_record(user_id,name,designation,dept,date,status) values($id,'$fname $lname','$des','$dept','$date','$att')";
$result=mysql_query($query) or die(mysql_error()); 
echo "<script>alert('Record saved.');window.location.href='attendance.php?dept=$dept';";
		echo "</script>";
}
else{
		echo "<script>alert('Attendance already marked once.');window.location.href='select_dept.php';";
		echo "</script>";
		}
?>