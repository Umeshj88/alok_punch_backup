<?php
session_start();
include("conn.php");
extract($_POST);
$nm=$_SESSION['nm'];
if(isset($_POST['sav']))
{
	$t=$_POST['t1'];
	mysql_query("update conduct_detail set name='$t' where name='$nm'");
	ob_start();
	header("location: conduct.php");
	ob_flush();
}
if(isset($_POST['sav'])==NULL)
{
	$t=$_POST['t1'];
	mysql_query("update conduct_detail set name='$t' where name='$nm'");
	ob_start();
	header("location: conduct.php");
	ob_flush();
}

?>