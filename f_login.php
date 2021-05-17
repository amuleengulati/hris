<!doctype html>
<html>
<head>
<script src="jquery.js"></script>
<script src="script.js"></script>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div style="position:absolute;top:0px;left:0px;height:50px;width:100%;border-bottom:3px solid red">
</div>
<div>
<form method="post" action="check_flogin.php"><br><br><br><br>
<center><p style="color:red" id="p2">Log in to your account</p></center><br>
<center><input type="text" name="username" placeholder="Username" required size="40" style="padding:10px"><br><br><br>
<input type="password" name="pwd" placeholder="Password" required size="40" style="padding:10px"><br><br><br>
<input type="submit" value="Sign In" id="submit1"><br><br>
<a href="#" id="fp">Forgot Password?</a><br><br>
<p id="p1">By logging in, you agree to our <a href="tos.html">Terms of service</a> and <a href="pp.html">Privacy Policy</a></p></center>
</form>
</div>
<div class="c"></div>
<div class="pass">
<form method="post" action="forgotpass.php">
<input type="button" value="X" style="float:right" id="close1">
<center><p id="p2">Please enter your username and email address below.</p>
<table><tr><td>
Username:</td><td><input type="text" name="username" placeholder="Username" required style="padding:5px"></td></tr>
<tr><td>Email:</td><td><input type="email" name="email" placeholder="Email" required style="padding:5px"></td></tr></table>
<input type="submit" value="Recover Password" id="submit"><br><br>
</form>
</div>
</body>
</html>