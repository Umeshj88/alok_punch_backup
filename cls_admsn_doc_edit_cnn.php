<?php
session_start();
include("conn.php");
extract($_POST);
$cls_sno=$_SESSION['cls_sno'];
if(isset($_POST['sav']))
{
	//mysql_query("delete from cls_admsn_doc where class_id='$cls_sno'");
	$cbArray = $_POST['c'];
	$data=implode(',' , $cbArray);
	
  	$sel=mysql_query("select * from cls_admsn_doc where class_id='$cls_sno'");
	$num=mysql_num_rows($sel);
	if(!empty($num))
	{
		mysql_query("update cls_admsn_doc set admsn_doc_id='$data' where class_id='$cls_sno'");
	}
	else
	{
		mysql_query("insert into cls_admsn_doc (class_id,admsn_doc_id) values('$cls_sno','$data')");
	}
	echo "<meta http-equiv='Refresh' content='0 ;URL=cls_admsn_doc.php'>";
	exit;
}
?>