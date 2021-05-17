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
$id=$_SESSION['id1'];
}
?>
<!doctype html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<div style="position:absolute;top:100px;left:500px;height:250px;width:750px;color:black;">
	<?php
    //include the library
    include "libchart/libchart/classes/libchart.php";
 
    //new pie chart instance
    $chart = new PieChart( 1000, 600 );
 
    //data set instance
    $dataSet = new XYDataSet();
    
    //actual data
    //get data from the database
    
    //include database connection
    include 'db.php';
	$query="Create temporary table ratings_".$id." (id INT(255) AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255) NOT NULL,
 instance VARCHAR(255) NOT NULL,
 ratings VARCHAR(255) NOT NULL)";
 mysql_query($query) or die(mysql_error());

 $query='select sum(mostly) as Mostly from student_feedback where id="'.$id.'"';
 $result=mysql_query($query) or die(mysql_error());
  
 while($row=mysql_fetch_assoc($result))
 {

 $m=$row['Mostly'];
 }
$query='select sum(sometimes) as Sometimes from student_feedback where id="'.$id.'"';
$result=mysql_query($query) or die(mysql_error());
while($row=mysql_fetch_assoc($result))
 {
 
 $s=$row['Sometimes'];
 }
$query='select sum(hardly) as Hardly from student_feedback where id="'.$id.'"';
 $result=mysql_query($query) or die(mysql_error());
 while($row=mysql_fetch_assoc($result))
 {
 $h=$row['Hardly'];
 }
$query="insert into ratings_".$id."(name,instance,ratings) values('$id','excellent','$m')";
$query1="insert into ratings_".$id."(name,instance,ratings) values('$id','average','$s')";
$query2="insert into ratings_".$id."(name,instance,ratings) values('$id','below average','$h')";
mysql_query($query) or die(mysql_error());
mysql_query($query1) or die(mysql_error());
mysql_query($query2) or die(mysql_error());


    //query all records from the database
    $query = "select * from ratings_".$id."";
echo $query; 
    //execute the query
    $result = mysql_query($query);
 
    //get number of rows returned
    $num_results = mysql_num_rows($result);
 
    if( $num_results > 0){
    
        while( $row = mysql_fetch_assoc($result) ){
            extract($row);
            $dataSet->addPoint(new Point("".$row['instance']."", $ratings));
        }
    
        //finalize dataset
        $chart->setDataSet($dataSet);
 
        //set chart title
        $chart->setTitle("Performance Analysis 2016");
        
        //render as an image and store under "generated" folder
        $chart->render("performance/$id.png");
    
        //pull the generated chart where it was stored
        echo "<center><img alt='Pie chart'  src='performance/$id.png'/></center>";
    
    }
	else{
        echo "No reviews yet.";
    }
?>
	</div>
	</body>
</html>