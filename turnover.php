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
		
		<div style="position:absolute;top:150px;left:250px;height:350px;width:1000px;background-color:white; border-top:3px solid red;padding-top:80px;">
		<div style="position:absolute;top:0px;left:0px;height:30px;width:980px;color:grey;padding-top:20px;
		padding-left:20px;border-bottom:3px solid red">
		<a href='turnover.php' style="color:red;text-decoration:none;">College Turnover</a>&nbsp
		&nbsp &nbsp &nbsp &nbsp
		<a href='turnover_select.php' style="color:black;text-decoration:none;">Departmental Turnover</a>
		</div>
		<center>
		<?php
		include "libchart/libchart/classes/libchart.php";
		$chart = new VerticalBarChart(500, 250);
		$dataSet = new XYDataSet();
		
		$query="Create temporary table turnover (id INT(255) AUTO_INCREMENT PRIMARY KEY,
 year VARCHAR(255) NOT NULL,
 number INT(255) NOT NULL)";
 mysql_query($query) or die(mysql_error());
 
		$query="select DISTINCT YEAR(doj) AS year from employee_details ";
		$result=mysql_query($query);
		while($row=mysql_fetch_assoc($result))
		{
		$year=$row['year'];
		$query1="select count(*) AS no from employee_details where doj LIKE('".$year."-%-%')";
		$result1=mysql_query($query1);
		while($row=mysql_fetch_assoc($result1))
		{
		$no= $row['no'];
		}
		$q="insert into turnover(year,number) values ('$year',$no)";
		$r=mysql_query($q) or die(mysql_error());
		}
		
		$query="select * from turnover";
		$result=mysql_query($query);
		$num_results=mysql_num_rows($result);
		if($num_results>0)
		{
		 while( $row = mysql_fetch_assoc($result) ){
            extract($row);
            $dataSet->addPoint(new Point("".$row['year']."", $number));
		}
		}
	
		$chart->setDataSet($dataSet);
		$chart->setTitle("Yearly employee turnover for GNDEC");
		$chart->render("images/to.png");
	
	 echo "<img alt='Line graph'  src='images/to.png'/>";
		?>
		</center>
        </div>
		</body>
	</html>