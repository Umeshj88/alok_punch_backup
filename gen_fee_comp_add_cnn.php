<?php
include("conn.php");
extract($_POST);

if(isset($_POST['sv']))
{
	
	@$cd=$_POST['cd'];
	@$lcd=$_POST['lcd'];
	@$r2=$_POST['r2'];
	@$amt=$_POST['amt'];
	@$r3=$_POST['r3'];
	@$mnth=$_POST['mnth'];
	mysql_query("insert into fee_type (type,ledger_component_type,cat,amt,opt,mnth) values('$cd','$lcd','$r2','$amt','$r3','$mnth')");
	ob_start();
	header("location: gen_fee_comp_save.php");
	ob_flush();
}
if(isset($_POST['cncl']))
{
	ob_start();
	header("location: gen_fee_comp.php");
	ob_flush();
}



?>