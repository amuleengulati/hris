<?php
include('db.php');
$name=$_POST['name'];
$date=$_POST['date'];
$query="insert into holidays(name,date,type) values ('$name','$date','general')";
$result=mysql_query($query);
if($result)
{
echo "<script>alert('Record saved');window.location.href='holidays.php';</script>";
}
?>