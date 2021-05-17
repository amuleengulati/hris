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
		</div>
		<div style="position:absolute;top:150px;left:250px;height:50px;width:1000px;background-color:white; border-top:3px solid red;"><br>
		<a href="cpay.php" style='text-decoration:none;color:red;padding-left:10px'>College Payroll</a>
		<a href="benefits.php" style='text-decoration:none;color:black;padding-left:30px'>Benefits</a>
		</div>
		<div style="position:absolute;top:203px;left:250px;height:350px;width:1000px;background-color:white; border-top:3px solid red;">
		
		<?php
		//include the library
    include "libchart/libchart/classes/libchart.php";
    $chart = new PieChart( 500, 300 );
    $dataSet = new XYDataSet();
	$query="Create temporary table salary(id INT(255) AUTO_INCREMENT PRIMARY KEY,
 dept VARCHAR(255) NOT NULL,
 salary int NOT NULL)";
 mysql_query($query) or die(mysql_error());
 
		$query="select DISTINCT dept from employee_details";
		$result=mysql_query($query) or die(mysql_error());
		while($row=mysql_fetch_assoc($result))
		{
		$q="select sum(salary) AS sal,dept from employee_details where dept='".$row['dept']."'";
		$r=mysql_query($q) or die(mysql_error());
		while($s=mysql_fetch_assoc($r))
		{
		$y=$s['sal']*12;
		$d=$s['dept'];
		$sql="insert into salary(dept,salary) values('$d',$y)";
		$res=mysql_query($sql) or die(mysql_error());
		}
		}
		//query all records from the database
    $query = "select * from salary";
 
    //execute the query
    $result = mysql_query($query) or die(mysql_error());
 
    //get number of rows returned
    $num_results = mysql_num_rows($result);
 
    if( $num_results > 0){
    
        while( $row = mysql_fetch_assoc($result) ){
            extract($row);
            $dataSet->addPoint(new Point("".$row['dept']."", $salary));
        }
    
        //finalize dataset
        $chart->setDataSet($dataSet);
 
        //set chart title
        $chart->setTitle("Payroll Anaysis");
        
        //render as an image and store under "generated" folder
        $chart->render("images/salary.png");
    
        //pull the generated chart where it was stored
        echo "<center><img alt='Pie chart'  src='images/salary.png'/></center>";
    
    }
		?>
		<br>
		<center><a href='payroll.php' style='text-decoration:none;color:red;'>Switch view</a></center>
		</div>
		</body>
	</html>