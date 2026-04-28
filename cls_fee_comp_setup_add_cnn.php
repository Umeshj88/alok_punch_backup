<?php
session_start();
include("conn.php");
extract($_POST);
if(isset($_POST['save']) || isset($_POST['save'])==NULL)
{
   
    @$cls=$_POST['cls'];
	@$strm=$_POST['strm'];
	@$medium=$_POST['medium'];
	mysql_query("insert into cls_fee_comp_setup1 (`cls`,`strm`,`medium`) values('$cls','$strm','$medium')");	
	$sel=mysql_query("select id from cls_fee_comp_setup1 where cls='$cls' && strm='$strm' && medium='$medium'");
	$arr=mysql_fetch_array($sel);
	$id=$arr['id'];
	
	$m=0;
	$sel1=mysql_query("select * from fee_type where cat='Regular'");
	while($ar1=mysql_fetch_array($sel1))
	{
		$m++;
		
		@$d=$_POST['c'.$m];	
		@$c=$_POST['cc'.$m];	
		
		@$amt=$_POST['amt'.$m];
		
			
		$month="";
		for($i=0;$i<count($c);$i++)
		{
			$month.=$c[$i];
			if(count($c) != $i+1)
			{
				$month.=",";
			}
		}
		
		if(!empty($d))
		{
			mysql_query("insert into cls_fee_comp_setup2 (setup1_id,m_f_c,amt,month_no) values('$id','$d','$amt','$month')");
		}
	}
	$m=0;
	$sel1=mysql_query("select * from fee_type where cat='Year'");
	while($ar1=mysql_fetch_array($sel1))
	{ $m++;
		
		$fee_type=$_POST['a'.$m];
		$amnt=$_POST['amtt'.$m];
		if(!empty($fee_type))
		{
		mysql_query("insert into cls_fee_comp_setup3 (setup1_id,fee_type,amt) values('$id','$fee_type','$amnt')");
		}
	}
	$m=0;
	$sel1=mysql_query("select * from fee_type where cat='Admission'");
	while($ar1=mysql_fetch_array($sel1))
	{ $m++;
		
		$fee_type=$_POST['once'.$m];
		$amnt=$_POST['once_amtt'.$m];
		if(!empty($fee_type))
		{
			mysql_query("insert into cls_fee_comp_setup3 (setup1_id,fee_type,amt) values('$id','$fee_type','$amnt')");
		}
	}
	ob_start();
	header("location: cls_fee_comp_setup_add.php");
	ob_flush();
}



?>