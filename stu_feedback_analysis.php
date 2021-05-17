<?php
session_start();
if(isset($_POST['submit']))
{
$q1=$_POST['q1'];
$q2=$_POST['q2'];
$q3=$_POST['q3'];
$q4=$_POST['q4'];
$q15=$_POST['q15'];
$q5=$_POST['q5'];
$q6=$_POST['q6'];
$q7=$_POST['q7'];
$q8=$_POST['q8'];
$q9=$_POST['q9'];
$q10=$_POST['q10'];
$q11=$_POST['q11'];
$q12=$_POST['q12'];
$q13=$_POST['q13'];
$q14=$_POST['q14'];
$rating=$_POST['rating'];
$id=$_SESSION['id'];
$teacher=$_POST['teacher'];
$createdOn=date('Y-m-d H:i:s',time());
include('db.php');
$high=0;
$medi=0;
$low=0;

if($q1==1)
{
    $high=$high+1;
}
elseif ($q1==2) {
    $medi=$medi+1;
}
elseif ($q1==3) {
    $low=$low+1;
}

if($q2==1)
{
    $high=$high+1;
}
elseif ($q2==2) {
    $medi=$medi+1;
   
}
elseif ($q2==3) {
    
    $low=$low+1;
}
if($q3==1)
{
    $high=$high+1;
}
elseif ($q3==2) {
    $medi=$medi+1;
    
}
elseif ($q3==3) {
    
    $low=$low+1;
}
if($q4==1)
{
    $high=$high+1;
}
elseif ($q4==2) {
    $medi=$medi+1;
    
}
elseif ($q4==3) {
    
    $low=$low+1;
}
if($q5==1)
{
    $high=$high+1;
}
elseif ($q5==2) {
    $medi=$medi+1;
    
}
elseif ($q5==3) {
    
    $low=$low+1;
}
if($q6==1)
{
    $high=$high+1;
}
elseif ($q6==2) {
    $medi=$medi+1;
    
}
elseif ($q6==3) {
    
    $low=$low+1;
}
if($q7==1)
{
    $high=$high+1;
}
elseif ($q7==2) {
    $medi=$medi+1;
    
}
elseif ($q7==3) {
    
    $low=$low+1;
}
if($q8==1)
{
    $high=$high+1;
}
elseif ($q8==2) {
    $medi=$medi+1;
    
}
elseif ($q8==3) {
    
    $low=$low+1;
}
if($q9==1)
{
    $high=$high+1;
}
elseif ($q9==2) {
    $medi=$medi+1;
    
}
elseif ($q9==3) {
    
    $low=$low+1;
}
if($q10==1)
{
    $high=$high+1;
}
elseif ($q10==2) {
    $medi=$medi+1;
    
}
elseif ($q10==3) {
    
    $low=$low+1;
}
if($q11==1)
{
    $high=$high+1;
}
elseif ($q11==2) {
    $medi=$medi+1;
    
}
elseif ($q11==3) {
    
    $low=$low+1;
}
if($q12==1)
{
    $high=$high+1;
}
elseif ($q12==2) {
    $medi=$medi+1;
    
}
elseif ($q12==3) {
    
    $low=$low+1;
}
if($q13==1)
{
    $high=$high+1;
}
elseif ($q13==2) {
    $medi=$medi+1;
    
}
elseif ($q13==3) {
    
    $low=$low+1;
}
if($q14==1)
{
    $high=$high+1;
}
elseif ($q14==2) {
    $medi=$medi+1;
    
}
elseif ($q14==3) {
    
    $low=$low+1;
}

$Mostly=($high/14)*100;
$Sometime=($medi/14)*100;
$Hardly    =($low/14)*100;
$querry="INSERT INTO student_feedback(id,teacher,mostly,sometimes,hardly)VALUES( $id,'$teacher',$Mostly, $Sometime, $Hardly)" ;
$result=mysql_query($querry) or die(mysql_error());
echo "<script>alert('You have successfully filled your feedback. Thank You.');window.location.href='s_login.php';";
echo "</script>";
}
?>