<?php
session_start();
require_once("conn.php");
extract($_POST); 
$sccs="";
$dt1=$_POST['i_date'];
	$cdt = date("Y-m-d", strtotime($dt1));
if(isset($_POST['save']))
{
	$sql="update form_issue set form_no='".$formno."',i_date='".$cdt."',class='".$class."',strm='".$strm."',medium='".$medium."',fee='".$fee."',name='".$name."',gndr='".$gndr."',fname='".$fname."',phno='".$phno."' where form_no='".$formno."'";
	mysql_query($sql);
	ob_start();
	header("location: reg.php");
	ob_flush();
}

if(isset($_POST['save'])==NULL)
{
	
	$sql="update form_issue set form_no='".$formno."',i_date='".$cdt."',class='".$class."',strm='".$strm."',medium='".$medium."',fee='".$fee."',name='".$name."',gndr='".$gndr."',fname='".$fname."',phno='".$phno."' where form_no='".$formno."'";
	mysql_query($sql);
	ob_start();
	header("location: reg.php");
	ob_flush();
}

?>