<?php
include('db.php');
$dept=$_POST['dept'];
$msg=$_POST['info'];
$d=implode(' ', $dept);
$query="insert into notice(dept,msg) values ('$d','$msg')";
$result=mysql_query($query);
if($result)
{
echo "<script>alert('Notice generated successfully.');window.location.href='notice.php';";
echo "</script>";
}
else
{
echo "<script>alert('Some problem occurred. Please try again.');window.location.href='notice.php';";
echo "</script>";
}
?>