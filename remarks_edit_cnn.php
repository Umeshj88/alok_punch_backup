<?php
session_start();
include("conn.php");
extract($_POST);
$nm=$_SESSION['nam'];
if(isset($_POST['sav']))
{
	$t=$_POST['t1'];
	mysql_query("update remarks set name='$t' where name='$nm'");
	ob_start();
	header("location: remarks.php");
	ob_flush();
}

if(isset($_POST['sav'])==NULL)
{
	$t=$_POST['t1'];
	mysql_query("update remarks set name='$t' where name='$nm'");
	ob_start();
	header("location: remarks.php");
	ob_flush();
}
?>