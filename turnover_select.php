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
		Turnover
		</div>
		
		<div style="position:absolute;top:150px;left:250px;height:auto;width:1000px;background-color:white; border-top:3px solid red;padding-top:80px;">
		<div style="position:absolute;top:0px;left:0px;height:30px;width:980px;color:grey;padding-top:20px;
		padding-left:20px;border-bottom:3px solid red">
		<a href='turnover.php' style="color:black;text-decoration:none;">College Turnover</a>&nbsp
		&nbsp &nbsp &nbsp &nbsp
		<a href='turnover_select.php' style="color:red;text-decoration:none;">Departmental Turnover</a>
		</div>
		<?php
		$query="select * from departments";
		$result=mysql_query($query);
		while($row=mysql_fetch_assoc($result))
		{
		$n=$row['name'];
		$icon=$row['icon'];
		//$n1=preg_replace('/\s+/', '', $n);
		echo "<img src='images/$icon' height='150' width='120' style='padding-left:100px;'>"; 
		echo "<a href='turnoverd.php?dept=".$n."' style='vertical-align:340%;padding-left:20px; text-decoration:none; color:black;'>".$n."</a><br><br>";
		}
		?>
        </div>
		</body>
	</html>