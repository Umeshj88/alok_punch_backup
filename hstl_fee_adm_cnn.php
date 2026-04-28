<?php
session_start();
require_once("conn.php");
extract($_POST);
$reg_date=$_POST['reg_date'];
  $ndt = date("Y-m-d", strtotime($reg_date));
if(isset($_POST['save']))
{ 
	$sel_stdnt=mysql_query("select * from `stdnt_reg` where `schlr_no`='$schlr_no'");
	$arr_stdnt=mysql_fetch_array($sel_stdnt);
	mysql_query("update `stdnt_reg` set  `hstl`='Yes' , `hostel_reg`='".$session."' where `id`='".$arr_stdnt['id']."'");
	mysql_query("insert into `hstl_admsn` (reg_no,reg_date,category,schlr_no_id,room_no,schl_nm,admsn_next_session) values ('".$reg_no."','".$ndt."','".$category."','".$arr_stdnt['id']."','".$room_no."','".$schl_nm."','".$admsn_next_session."')");
	 echo "<meta http-equiv='Refresh' content='0 ;URL=srch_hstl_fee.php?done=done'>";
		exit;
}
else if(isset($_POST['back']))
{
	echo "<meta http-equiv='Refresh' content='0 ;URL=srch_hstl_fee.php'>";
	exit;
}
?>