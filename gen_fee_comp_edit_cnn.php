<?php
session_start();
include("conn.php");
extract($_POST);
if(isset($_POST['sv']))
{
	@$cd=$_POST['cd'];
	@$lcd=$_POST['lcd'];
	@$r2=$_POST['r2'];
	@$amt=$_POST['amt'];
	@$r3=$_POST['r3'];
	@$lcd_sno=$_POST['lcd_sno'];
	@$mnth=$_POST['mnth'];
	mysql_query("update fee_type set type='$cd',ledger_component_type='$lcd',cat='$r2',amt='$amt',opt='$opt',mnth='$mnth' where sno='$lcd_sno'");
	ob_start();
	header("location: gen_fee_comp.php");
	ob_flush();
}

if(isset($_POST['cncl']))
{
	
	ob_start();
	header("location: gen_fee_comp.php");
	ob_flush();
}
?>