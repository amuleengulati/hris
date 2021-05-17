<?php
$header = "From: noreply@gndec.ac.in\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=utf-8\r\n"; 
$header.= "X-Priority: 1\r\n"; 
mail('amuleengulati13@gmail.com','jahs','hi');

/*include "connect.php"; 
    $username = $_POST['username'];
	$email=$_POST['email'];
	$to=$email;
    //$query="select * from user_details where username='$username'";
    //$result   = mysql_query($query) or die(mysql_error());
    //$count=mysql_num_rows($result);
    //if($count==1)
    //{
      //  $row=mysql_fetch_array($result);
        //$pass  =  $row['password'];
        //$to = $row['email'];
        $from = "GencoGeeks";
        $url = "http://www.gencogeeks.com/";
        $body  =  "GencoGeeks password recovery Script
        -----------------------------------------------
        Url : $url;
        email Details is : $to;
        Here is your password  : $pass;
        Sincerely,
        GencoGeeks";
        $from = "gencogeeks@gmail.com";
        $subject = "GencoGeeks Password recovered";
        $headers1 = "From: $from\n";
        $headers1= "MIME-Version: 1.0\r\n"; 
$headers1= "Content-Type: text/html; charset=utf-8\r\n"; 
$headers1= "X-Priority: 1\r\n"; 
		//if($email==$to)
		//{
        $sentmail = (mail ( $to, $subject, $body, $headers1 ));
		//}
		/*else
		{
		echo "<script>alert('Entered email doesnot match registered email.');window.location.href='login.php';";
echo "</script>";
		}
    } else {
    if ($count==0) {
    echo "<script>alert('Username doesnot exist.');window.location.href='login.php';";
echo "</script>";
        }
        }
    
    if($sentmail==1)
    {
         echo "<script>alert('Your password has been sent to your email address.');window.location.href='login.php';";
echo "</script>";
    }
        else
        {
         echo "<script>alert('Error sending email.Try again later.');window.location.href='login.php';";
echo "</script>";
    }
*/
echo "<script>alert('Your password has been sent to your email address.');window.location.href='login.php';";
echo "</script>";
?>

