<?php
session_start();
if(!isset($_SESSION['username']))
{ 
echo "<script>window.location.href='a_login.php';";
echo "</script>";
}
else
{
include('aheader.php');
$dept=$_SESSION['dept'];
if(isset($_POST['date']))
{
$date=$_POST['date'];
}
if(isset($_POST['month']))
{
$month=$_POST['month'];
}
if(isset($_POST['year']))
{
$year=$_POST['year'];
}
}
?>
<!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
 <div style="position:absolute;top:200px;left:400px;height:300px;width:500px;padding-left:150px;">
<?php
    //include the library
    include "libchart/libchart/classes/libchart.php";
 
    //new pie chart instance
    $chart = new PieChart( 500, 300 );
 
    //data set instance
    $dataSet = new XYDataSet();
    
    //actual data
    //get data from the database
    
    //include database connection
    include 'db.php';
	$query="Create temporary table stat (id INT(255) AUTO_INCREMENT PRIMARY KEY,
 instance VARCHAR(255) NOT NULL,
 stats int(255) NOT NULL)";
 mysql_query($query) or die(mysql_error());
if(isset($_POST['date']))
{ 
$query="select * from attendance_record where dept='".$dept."' AND date='".$date."' AND status='p'";
$result=mysql_query($query);
$present=mysql_num_rows($result);

$query="select * from attendance_record where dept='".$dept."' AND date='".$date."' AND status='a'";
$result=mysql_query($query);
$absent=mysql_num_rows($result);

$query1="insert into stat(instance, stats) values ('present',$present)";
$query2="insert into stat(instance, stats) values ('absent',$absent)";
$result=mysql_query($query1) or die(mysql_error());
$result=mysql_query($query2) or die(mysql_error());
}

else if(isset($_POST['month']))
{
$query="select * from attendance_record where dept='".$dept."' AND date LIKE('%-".$month."-%') AND status='p'";
$result=mysql_query($query);
$present=mysql_num_rows($result);

$query="select * from attendance_record where dept='".$dept."' AND  date LIKE('%-".$month."-%') AND status='a'";
$result=mysql_query($query) or die(mysql_error());
$absent=mysql_num_rows($result);

$query1="insert into stat(instance, stats) values ('present',$present)";
$query2="insert into stat(instance, stats) values ('absent',$absent)";
$result=mysql_query($query1) or die(mysql_error());
$result=mysql_query($query2) or die(mysql_error());
}

else if(isset($_POST['year']))
{
$query="select * from attendance_record where dept='".$dept."' AND date LIKE('".$year."-%-%') AND status='p'";
$result=mysql_query($query);
$present=mysql_num_rows($result);

$query="select * from attendance_record where dept='".$dept."' AND  date LIKE('".$year."-%-%') AND status='a'";
$result=mysql_query($query) or die(mysql_error());
$absent=mysql_num_rows($result);

$query1="insert into stat(instance, stats) values ('present',$present)";
$query2="insert into stat(instance, stats) values ('absent',$absent)";
$result=mysql_query($query1) or die(mysql_error());
$result=mysql_query($query2) or die(mysql_error());
}

    //query all records from the database
    $query = "select * from stat";
 
    //execute the query
    $result = mysql_query($query);
 
    //get number of rows returned
    $num_results = mysql_num_rows($result);
     if( $num_results > 0){
    
        while( $row = mysql_fetch_assoc($result) ){
            extract($row);
            $dataSet->addPoint(new Point("".$row['instance']."", $stats));
        }
    
        //finalize dataset
        $chart->setDataSet($dataSet);
 
        //set chart title
        $chart->setTitle("Attendance Analysis");
        
        //render as an image and store under "generated" folder
        $chart->render("attendance/$dept.png");
    
        //pull the generated chart where it was stored
        echo "<img alt='Pie chart'  src='attendance/$dept.png' style='border: 1px solid gray;'/>";
    
    }
	else{
        echo "No records available.";
    }
?>
 </div>
 <div style="position:absolute;top:500px;left:550px;height:30px;width:500px"><br>
 <a href='selecta.php?dept=<?php echo $dept ?>' style='text-decoration:none;color:black;float:right;'>Back</a>
 </div>
</body>
</html>