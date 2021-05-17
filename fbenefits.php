<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username']))
{
echo "<script>window.location.href='f_login.php';";
echo "</script>";
}
else
{
include('fheader.php');
}
?>
<!doctype html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<div style="position:absolute;top:100px;left:500px;height:250px;width:750px;color:black;">
	<marquee style="color:red;font-size:100%">Each employee will be provided benefits based on credit points. The credit points will be alloted based on the performance, attendance and leaves of the individual employees.</marquee>
	<table border='1'><th>Benefits</th>
	<ol>
	<tr><td>Each employee having more than 95% monthly attendance will be given a credit point of 2.</td></tr>
	<tr><td>Each employee having more than 90% monthly attendance will be given a credit point of 1.</td></tr>
	<tr><td>Each employee having more than 60% excellent feedback will be given a credit point of 2.</td></tr>
	<tr><td>Each employee having more than 50% excellent feedback will be given a credit point of 1.</td></tr>
	<tr><td>Each employee taking less than 2 leaves will be given a credit point of 2.</td></tr>
	<tr><td>Each employee taking less than 4 leaves will be given a credit point of 1.</td></tr>
	<tr><td>The credit points will be assessed at the end of each academic year. If the credit points are equal to or more than 10, a salary hike of 5,000 per month will be awarded to that employee.</td></tr></li>
	</ol></table>
	</div>
	<div style="position:absolute;top:400px;left:500px;height:250px;width:750px;color:black;">
	<?php
		$cp=0;
		echo "<table border='1'>";
		echo "<th>Your Curret Credit Points</th>";
		$sql="select count(*) AS count from single_leave where 
		fname='".$_SESSION['name']."' AND lname='".$_SESSION['lname']."' ";
		$rsql=mysql_query($sql);
		while($row2=mysql_fetch_assoc($rsql))
		{
		if($row2['count']<=2)
		$cp=$cp+2;
		elseif($row2['count']<=4)
		$cp=$cp+1;
		$qa="select count(DISTINCT date) AS total from attendance_record";
		$ra=mysql_query($qa);
		while($row3=mysql_fetch_assoc($ra))
		{
		$total=$row3['total'];
		$q1="select count(*) AS att from attendance_record where name='".$_SESSION['name']." ".$_SESSION['lname']."' AND status='p'";
		$rq1=mysql_query($q1);
		while($row4=mysql_fetch_assoc($rq1))
		{
		$att=$row4['att'];
		$per=($att/$total)*100;
		if($per>95)
		$cp=$cp+2;
		elseif($per>90)
		$cp=$cp+1;
		}
		}
		echo "<tr><td><center>".$cp."</center></td></tr>";
		}
		echo "</table>";
		?>
	</div>
	</body>
</html>