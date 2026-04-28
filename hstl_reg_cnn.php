<?php
session_start();
require_once("conn.php");
extract($_POST); 

$sccs=""; 
$udt=date("Y-m-d",strtotime($rg_dt));
$save = mysql_query("insert into `hstl_admsn` (reg_no,reg_date,category,schlr_no,room_no,schl_nm,admsn_next_session) values ('".$_POST['reg_no']."','".$_POST['udt']."','school','".$_POST['schlr_no']."','".$_POST['rm_no']."','".$_POST['schl_nm']."','".$_POST['admsn_next_session']."')");
//print_r($save);exit;
if(mysql_affected_rows()==1)
{
	header("location:srch_hstl.php");
	 
	}
else
{ 
      $sccs=1; 
	$msg ="<span class='error'><i class='icon-remove-sign'></i>Registration failed. Please retry.</span>";
	header("location:index.php");}
	

?>