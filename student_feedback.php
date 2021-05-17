<?php
session_start();
include('sheader.php');
include('db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
</head>
<body>
			<div style="position:absolute;top:100px;left:200px;height:1750px;width:900px;border:1px solid">
            <center>
            <form method="post" action="stu_feedback_analysis.php">
			<h3>Select one option from the given choices</h3>
			Name of teacher <select name='teacher'>
			<?php
			include('db.php');
			$query="select fname,lname from employee_details where dept='".$_SESSION['dept']."' AND fname NOT IN(select teacher from student_feedback)";
			$result=mysql_query($query) or die(mysql_error());
			while($row=mysql_fetch_assoc($result))
			{
			echo "<option value='".$row['fname']."'>".$row['fname']." ".$row['lname'];
			}
			?>
			</select>
    <table cellpadding="4" cellspacing="50" align="left">
	<tr><td>Qus1.how many % percentage this teacher do you like?</td>
    <td><input type="radio" id="a1" name="rating" value="1" required/> Mostly</td>
    <td><input type="radio" id="a2" name="rating" value="2" required/>Sometime</td> 
    <td><input type="radio" id="a3" name="rating" value="3" required/>Hardly</td>   
    </tr>
    <tr><td>Qus1. How well you learn to apply knowledge and skills through this course?</td>
    <td><input type="radio" id="a1" name="q1" value="1" required/> Mostly</td>
    <td><input type="radio" id="a2" name="q1" value="2" required/>Sometime</td> 
    <td><input type="radio" id="a3" name="q1" value="3" required/>Hardly</td>   
    </tr>
    <tr><td>Qus2. How you rate the opportunities provided to you to practice and apply important conceptss for analyzing and interpreting data?</td>
    <td><input type="radio" id="b1" name="q2" value="1" required/> Mostly</td>
    <td><input type="radio" id="b2" name="q2" value="2" required/>Sometime</td> 
    <td><input type="radio" id="b3" name="q2" value="3" required/>Hardly</td>
    </tr>
     <tr><td>Qus3. Were the practicals correlated to theory lectures?</td>
    <td><input type="radio" id="c1" name="q3" value="1" required/> Mostly</td>
    <td><input type="radio" id="c2" name="q3" value="2" required/>Sometime</td> 
    <td><input type="radio" id="c3" name="q3" value="3" required/>Hardly</td>   
    </tr>
     <tr><td>Qus4. How much the courses prepared younin providing technical solutions within the realistic constraints?</td>
    <td><input type="radio" id="d1" name="q4" value="1" required/> Mostly</td>
    <td><input type="radio" id="d2" name="q4" value="2" required/>Sometime</td> 
    <td><input type="radio" id="d3" name="q4" value="3" required/>Hardly</td>   
    </tr>
     <tr><td>Qus5. How does the course find its role in multidisciplinary work?</td>
    <td><input type="radio" id="e1" name="q5" value="1" required/> Mostly</td>
    <td><input type="radio" id="e2" name="q5" value="2" required/>Sometime</td> 
    <td><input type="radio" id="e3" name="q5" value="3" required/>Hardly</td>   
    </tr>
    <tr><td>Qus6. Are you able to work through a process to solve problem through the course learnt?</td>
    <td><input type="radio" id="f1" name="q6" value="1" required/> Mostly</td>
    <td><input type="radio" id="f2" name="q6" value="2" required/>Sometime</td> 
    <td><input type="radio" id="f3" name="q6" value="3" required/>Hardly</td>   
    </tr>
    <tr><td>Qus7. How much competent you consider yourself for professional and ethical responsibility with this course?</td>
    <td><input type="radio" id="g1" name="q7" value="1" required/> Mostly</td>
    <td><input type="radio" id="g2" name="q7" value="2" required/>Sometime</td> 
    <td><input type="radio" id="g3" name="q7" value="3" required/>Hardly</td>   
    </tr>
     <tr><td>Qus8. How good are the opportunities provided by the instructor for questions and discussions during class time?</td>
    <td><input type="radio" id="h1" name="q8" value="1" required/> Mostly</td>
    <td><input type="radio" id="h2" name="q8" value="2" required/>Sometime</td> 
    <td><input type="radio" id="h3" name="q8" value="3" required/>Hardly</td>   
    </tr>
    <tr><td>Qus9. How you rate your participation in some event related to societal issues by using your knowledge and skills?</td>
    <td><input type="radio" id="i1" name="q9" value="1" required/> Mostly</td>
    <td><input type="radio" id="i2" name="q9" value="2" required/>Sometime</td> 
    <td><input type="radio" id="i3" name="q9" value="3" required/>Hardly</td>   
    </tr>
    <tr><td>Qus10. Are you simulated to further investigate the subject matter?</td>
    <td><input type="radio" id="j1" name="q10" value="1" required/> Mostly</td>
    <td><input type="radio" id="j2"name="q10" value="2" required/>Sometime</td> 
    <td><input type="radio" id="j3" name="q10" value="3" required/>Hardly</td>   
    </tr>
    <tr><td>Qus11. How do you rate the course in addressing the latest trends in technology?</td>
    <td><input type="radio" id="k1" name="q11"value="1" required/> Mostly</td>
    <td><input type="radio" id="k2" name="q11"value="2" required/>Sometime</td> 
    <td><input type="radio" id="k3" name="q11"value="3" required/>Hardly</td>   
    </tr>
    <tr><td>Qus12. How well the course enhances your ability to use new techniques and modern engineering tools for engineering practice?</td>
    <td><input type="radio" id="l1" name="q12" value="1" required/> Mostly</td>
    <td><input type="radio" id="l2" name="q12" value="2" required/>Sometime</td> 
    <td><input type="radio" id="l3" name="q12" value="3" required/>Hardly</td>   
    </tr>
    <tr><td>Qus13. Does the course meet your expectations to help you learn to write a computing solution for a given problem using various techniques and engineering tools?</td>
    <td><input type="radio" id="m1" name="q13"value="1" required/> Mostly</td>
    <td><input type="radio" id="m2" name="q13"value="2" required/>Sometime</td> 
    <td><input type="radio" id="m3" name="q13"value="3" required/>Hardly</td>   
    </tr>
    <tr><td>Qus14. Does the course meet your expectations in effectively integrating IT based solutions?</td>
    <td><input type="radio" id="n1" name="q14" value="1" required/> Mostly</td>
    <td><input type="radio" id="n2" name="q14" value="2" required/>Sometime</td> 
    <td><input type="radio" id="n3"name="q14" value="3" required/>Hardly</td>   
    </tr>
    <tr><td>Qus15. Any suggestions for the improvement of the program? </td>
    <td><input type="radio" id="o1" name="q15" value="1" required/> Mostly</td>
    <td><input type="radio" id="o2" name="q15" value="2" required/>Sometime</td> 
    <td><input type="radio" id="o3" name="q15" value="3" required/>Hardly</td>   
    </tr>
   <tr><td><input type="submit" name="submit" /></td></tr>
    </table>
      
</form>
</center>
</div>
</body>
</html>
