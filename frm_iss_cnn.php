<?php
require_once("conn.php");
extract($_POST); 
if(isset($_POST['b1']))
{
$sccs="";
$udt=date("Y-m-d",strtotime($i_date));
mysql_query("update form_no set no='".$form_no."' where id='1'");
$sql="insert into form_issue (form_no,name,fname,class,medium,phno,strm,gndr,i_date,fee) values ('".$form_no."','".$name."','".$fname."','".$class."','".$medium."','".$phno."','".$strm."','".$gndr."','".$udt."','".$fee."')";
$r=mysql_query($sql);
if(mysql_affected_rows()==1)
{
	header("location: reg.php");
	}
else
{ 
    $sccs=1; 
	$msg ="<span class='error'><i class='icon-remove-sign'></i>Registration failed. Please retry.</span>";
	header("location:index.php");}
}

if(isset($_POST['b1'])==NULL)
{
$sccs="";
$udt=date("Y-m-d",strtotime($i_date));
mysql_query("update form_no set no='".$form_no."' where id='1'");
$sql="insert into form_issue (form_no,name,fname,class,medium,phno,strm,gndr,i_date,fee) values ('".$form_no."','".$name."','".$fname."','".$class."','".$medium."','".$phno."','".$strm."','".$gndr."','".$udt."','".$fee."')";
$r=mysql_query($sql);
if(mysql_affected_rows()==1)
{
	header("location: reg.php");
	}
else
{ 
    $sccs=1; 
	$msg ="<span class='error'><i class='icon-remove-sign'></i>Registration failed. Please retry.</span>";
	header("location:index.php");}
}

if(isset($_POST['cncle']))
{
	ob_start();
	header("location: reg.php");
	ob_flush();
}
?>