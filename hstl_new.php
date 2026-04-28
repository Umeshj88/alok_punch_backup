<?php
session_start();
require_once("conn.php");
extract($_POST); 
$sccs="";
$udt=date("Y-m-d",strtotime($rg_dt));
$sql="insert into hstl_reg (rg_dt,schlr_no,ctg,name,f_name,m_name,cls,gndr,rm_no,padd,p1,phno,mno) values ('$rg_dt','$schlr_no','$ctg','$name','$f_name','$m_name','$cls','$gndr','$rm_no','$padd','$p1','$phno','$mno')";
$r=mysql_query($sql);
if(mysql_affected_rows()==1)
{
	header("location:hstl_reg.php");
	 
	}
else
{ 
      $sccs=1; 
	$msg ="<span class='error'><i class='icon-remove-sign'></i>Registration failed. Please retry.</span>";
	header("location:index.php");}
?>