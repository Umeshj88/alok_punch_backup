<?php
session_start();
include("conn.php");
extract($_POST);
if(isset($_POST['sav']))
{
	$t=$_POST['t1'];
	mysql_query("insert into conduct_detail (name) values('$t')");
	ob_start();
	header("location: conduct.php");
	ob_flush();
}

if(isset($_POST['sav'])==NULL)
{
	$t=$_POST['t1'];
	mysql_query("insert into conduct_detail (name) values('$t')");
	ob_start();
	header("location: conduct.php");
	ob_flush();
}

?>