<?php
ini_set('max_execution_time', 10000);
$dbHost='127.0.0.1';
$dbUser='alok_panch';
$dbPass='x2026P#p%uOP';
$dbName='fee_session';
$s=mysql_connect($dbHost,$dbUser,$dbPass) or die('Error connecting to MySQL server: ' . mysql_error());
mysql_select_db($dbName,$s);
$sel_session=mysql_query("select * from `user_session`");
$arr_session=mysql_fetch_array($sel_session);
$_SESSION['session']=$arr_session['session'];

$dbName=$arr_session['session'];
mysql_select_db($dbName,$s);

$login_id = $_POST['username']; 
$password = $_POST['password'];

$sql1="SELECT * FROM `login` WHERE `login_id`='$login_id' AND `password`='$password'";
$result=mysql_query($sql1);
$count=mysql_num_rows($result);
$arr=mysql_fetch_array($result);

if($count==1)
{ 
	session_start();
	$_SESSION['login_id']=$login_id;
	$_SESSION['designation_id']=$arr['designation_id'];
	if($arr['designation_id']==1)
	{
		echo "<script>
				location='authorised.php';
				</script>";
				exit;
	}
	else
	{
		echo "<script>
				location='index.php';
				</script>";
					exit;
	}
	
}
else
{
	session_start();
	$_SESSION['wrong']='wrong';
	echo "<script>
			location='login.php';
			</script>";
				exit;
}
			

?>
