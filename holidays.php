<?php
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
		Holidays
		</div>

		<div style="position:absolute;top:150px;left:250px;height:350px;width:500px;background-color:white; border-top:3px solid red;border-right:1px solid #d3d3d3">
		<table>
		<caption>Holidays</caption>
<?php
$q1="select * from holidays where type='general' ORDER BY date ASC";
$r=mysql_query($q1);
$sno=1;
while($row=mysql_fetch_assoc($r))
{
echo "<tr><td>".$sno."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['date']."</td></tr>";
$sno++;
}
?>
		</table><br>
		<center><input type='button' value='Add more' id='addh'></center>		
		</div>
		
		<div style="position:absolute;top:150px;left:751px;height:350px;width:500px;background-color:white; border-top:3px solid red;">
		<table>
		<caption> Restricted Holidays </caption>
<?php
$q1="select * from holidays where type='restricted' ORDER BY('date') ASC";
$r=mysql_query($q1);
$sno=1;
while($row=mysql_fetch_assoc($r))
{
echo "<tr><td>".$sno."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['date']."</td></tr>";
$sno++;
}
?>
		</table><br>
		<center><input type='button' value='Add more' id='addrh'></center>
</div>

<div class='c'>
</div>

<div class='addh'>
<input type="button" value="X" style="float:right" id="close2">
			<center><p id="p2">Enter the following details</p></center>
			<form method="post" action="addh.php" enctype="multipart/form-data">
			<table><tr><td>
			Name of Holiday:</td><td><input type="text" name="name" required style="padding:5px"></td></tr>
			<tr><td>Date:</td>
			<td><input type="date" name="date" required style="padding:5px"></td></tr>
			</table>
			<input type='submit' value='Add'>
			</form>
</div></div>

<div class='addrh'>
<input type="button" value="X" style="float:right" id="close3">
			<center><p id="p2">Enter the following details</p>
			<form method="post" action="addrh.php" enctype="multipart/form-data">
			<table><tr><td>
			Name of Holiday:</td><td><input type="text" name="name" required style="padding:5px"></td></tr>
			<tr><td>Date:</td>
			<td><input type="date" name="date" required style="padding:5px"></td></tr>
			</table>
			<input type='submit' value='Add'>
			</form>
</div>
		</body>
	</html>