<?php
session_start();
require_once("conn.php");
extract($_POST); 
$sccs="";
$udt=date("Y-m-d",strtotime($i_date));
$sql="insert into stream (strm) values ('".$strm."')";
$r=mysql_query($sql);
if(mysql_affected_rows()==1)
{
	
	 header("location:strm_setup.php");
	}
else
{ 
      $sccs=1; 
	$msg ="<span class='error'><i class='icon-remove-sign'></i>Registration failed. Please retry.</span>";
	header("location:index.php");}
?>