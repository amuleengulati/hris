<?php
if(!isset($_SESSION['username']))
{ 
echo "<script>window.location.href='stu_login.php';";
echo "</script>";
}
else
{
include('sheader.php');
}
?>
