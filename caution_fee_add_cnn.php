<?php
session_start();
include("conn.php");
extract($_POST);

if(isset($_POST['sav']))
{
	$sel1=$_POST['sel1'];
	$amt=$_POST['amt'];
	mysql_query("insert into caution_fee_setup (class,amt) values('$sel1','$amt')");
	ob_start();
	header("location: caution_fee_add.php");
	ob_flush();
}
if(isset($_POST['sav'])==NULL)
{
	$sel1=$_POST['sel1'];
	$amt=$_POST['amt'];
	mysql_query("insert into caution_fee_setup (class,amt) values('$sel1','$amt')");
	ob_start();
	header("location: caution_fee_add.php");
	ob_flush();
}
?>