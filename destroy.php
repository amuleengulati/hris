<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username']))
{ 
echo "<script>window.location.href='index.php';";
echo "</script>";
}
}
?>
<html>
<body>
<?php
session_unset();
session_destroy();
echo "<script>";
echo "
window.location.href='stu_login.php';";
echo "</script>";
?>
</body>
</html>
