<?php
session_start();
include('db.php');
include('aheader.php');
?>
<!doctype html>
<html>
	<head>
	<link  rel="stylesheet" type="text/css" href="style.css">
	<script src="jquery.js"></script>
	<script src="script.js"></script>
	</head>
	<body>
	
		<div style="position:absolute;top:70px;left:230px;height:50px;width:100%;color:grey;padding-top:20px;
		font-size:150%;padding-left:20px;">
		Payroll
		<marquee style="color:red;font-size:75%">Each employee will be provided benefits based on credit points. The credit points will be alloted based on the performance, attendance and leaves of the individual employees.Each employee having more than 95% monthly attendance will be given a credit point of 2.Each employee having more than 90% monthly attendance will be given a credit point of 1.Each employee having more than 60% excellent feedback will be given a credit point of 2.Each employee having more than 50% excellent feedback will be given a credit point of 1.Each employee taking less than 2 leaves will be given a credit point of 2.Each employee taking less than 4 leaves will be given a credit point of 1.</marquee>
		</div>
		<div style="position:absolute;top:150px;left:250px;height:50px;width:1000px;background-color:white; border-top:3px solid red;"><br>
		<a href="payroll.php" style='text-decoration:none;color:black;padding-left:10px'>College Payroll</a>
		<a href="benefits.php" style='text-decoration:none;color:red;padding-left:30px'>Benefits</a>
		</div>
		<div style="position:absolute;top:203px;left:250px;height:350px;width:1000px;background-color:white; border-top:3px solid red;">
		<?php
		$cp=0;
		$query="select DISTINCT dept from employee_details";
		$result=mysql_query($query) or die(mysql_error());
		while($row=mysql_fetch_assoc($result))
		{
		$sno=1;
		echo "<table border='1'><br><caption>".$row['dept']."</caption>";
		echo "<th>#</th>";
		echo "<th>Employee</th>";
		echo "<th>Credit Points</th>";
		$q="select fname,lname from employee_details where dept='".$row['dept']."'";
		$r=mysql_query($q);
		while($row1=mysql_fetch_assoc($r))
		{
		$f=$row1['fname'];
		$l=$row1['lname'];
		$name=$row1['fname']." ".$row1['lname'];
		$sql="select count(*) AS count from single_leave where 
		fname='".$f."' AND lname='".$l."' ";
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
		$q1="select count(*) AS att from attendance_record where name='".$f." ".$l."' AND status='p'";
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
		echo "<tr><td>".$sno."</td>";
		echo "<td>".$f." ".$l."</td>";
		echo "<td>".$cp."</td></tr>";
		$sno++;
		$cp=0;
		}
		}
		}
		echo "</table>";
		?>
		</div>
		</body>
	</html>