<?php
session_start();
include("conn.php");
extract($_POST);
$cls=$_SESSION['clss'];
if(isset($_POST['sav']))
{
	$amt=$_POST['amt'];
	mysql_query("update caution_fee_setup set amt='$amt' where class='$cls'");
	ob_start();
	header("location: caution_fee.php");
	ob_flush();
}
if(isset($_POST['sav'])==NULL)
{
	$amt=$_POST['amt'];
	mysql_query("update caution_fee_setup set amt='$amt' where class='$cls'");
	ob_start();
	header("location: caution_fee.php");
	ob_flush();
}