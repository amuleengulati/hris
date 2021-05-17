<?php
error_reporting(0);
session_start();
include('db.php');
$to=$_SESSION['email'];
$id=$_GET['id'];
$query="select * from single_leave where id=$id";
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result))
{
$date=$row['leave_date'];
}
?>
<?php
$header = "From: noreply@gndec.ac.in\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=utf-8\r\n"; 
$header.= "X-Priority: 1\r\n"; 
$body  =  "Gndec Leave Application mail
        -----------------------------------------------
        Url : gndec.ac.in;
        email Details is : $to;
		Your leave has been accepted for the date: $date;
        Sincerely,
		Faculty Head,
        Gndec";
		$from="gndec.ac.in";
		mail(''.$_SESSION['email'].'',$body,$from);
	$query="update single_leave set status='accepted' where id=$id";
	$result=mysql_query($query) or die(mysql_error());
	
        echo "<script>alert('Leave has been accepted. Mail sent.');window.location.href='leaveapp.php';";
		echo "</script>";
	
?>

