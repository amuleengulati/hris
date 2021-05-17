<?php
include('apply_leave.php');
?>
<!doctype html>
<html>
<head>
</head>
<body>
<div style="position:absolute;top:190px;left:500px;height:290px;width:700px;border:1px solid;">
<form method='post' action='applym.php' style="padding-left:20px;color:grey;"><br><br>
Start date: <input type='date' name='sdate'>&nbsp &nbsp &nbsp  End date: <input type='date' name='edate'><br><br>
Leave type: <select name='type'>
<option value='sick'>sick</option>
<option value='personal'>personal</option>
<option value='other'>other</option>
</select><br><br>
Reason: <input type='text' name='reason' required><br><br>
<input type='submit' value='submit' style='background-color:red;color:white;height:25px;width:70px;margin-left:40px;border:none;'>
</form>
<br><br><br><hr>
<p style='color:grey;margin-left:20px'>Note: You must apply for a leave atleast 10 days before the leave start date.</p>
</div>
</body>
</html>