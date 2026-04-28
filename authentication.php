<?php
error_reporting(0);
@ini_set('display_errors', 0);
session_start();
date_default_timezone_set('asia/kolkata');
$login_id=$_SESSION['login_id'];
$designation_id=$_SESSION['designation_id'];
$session=$_SESSION['session'];

if(empty($login_id) || empty($session))
{
	session_destroy();
	session_unset();
	echo "<script>
		location='login.php';
		</script>";
}
?>