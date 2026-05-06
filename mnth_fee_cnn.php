<?php
session_start();
require_once("conn.php");
require_once("function.php");
$session=$_SESSION['session'];

extract($_POST); 
$schlr_no_id=$_POST['schlr_no_id'];
$dat=date("Y");
$m=date("m");
array($_POST['tm']);
if($m>=07)
{
$dat1=$dat+1;
$d=$dat."-".$dat1;
}
else
{
	$dat1=$dat-1;
	$d=$dat1."-".$dat;

}
$dt1=$_POST['dt1'];
if($dt1 !=NULL)
{
	$cdt = date("Y-m-d", strtotime($dt1));
}
else
{
	$cdt=0;
}
$ndt = date("Y-m-d", strtotime($dt));

$num=$_POST['num_row'];

/////////////////////////////////////// **** Save And print **** ////////////////////////////////////////////////////////////////////////

if(isset($_POST['save_print']) || isset($_POST['save']))
{
	$select_month=0;
	for($i=1;$i<=12;$i++)
		{
			$paid=$_POST['paid'.$i];
			if(empty($paid))
			{
				$select_month++;
			}
				
		}
	$i=0;
	if($select_month==12)
	{
		echo "<meta http-equiv='Refresh' content='0 ;URL=mnth_fee.php?schlr_no_id=$schlr_no_id&selectmnth=selectmnth'>";
		exit;
	}
	else
	{
		$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'");
		$arr_stdnt=mysql_fetch_array($sel_stdnt);
		$rte=$arr_stdnt['rte'];
		$rcpt_no=$_POST['rcpt_no'];
		if($rcpt_no==1)
		{
			mysql_query("insert into mnth_rcpt_no (`mnth_rcpt_no`) values('1')");
		}
		else
		{
			$rn=$rcpt_no-1;
			mysql_query("update `mnth_rcpt_no` set `mnth_rcpt_no`='".$rcpt_no."' where `mnth_rcpt_no`='$rn'");
		}
		$sql="insert into mnth_fee_1 (`schlr_no_id`,`recpt_no`,`dat`,`gt`,`cncssn`,`cnrm`,`fyn`,`fee_dp`,`chq_no`,`dt1`,`bnk`,`rmks`) values ('".$arr_stdnt['id']."','".$rcpt_no."','".$ndt."','".$gt."','".$cncssn."','".$cn_rm."','".$fyn."','".$fee_dp."','".$chq_no."','".$cdt."','".$bnk."','".$rmks."')";
		$r=mysql_query($sql);
		
		$sel_mnth_fee_1=mysql_query("select * from `mnth_fee_1` where `schlr_no_id`='".$arr_stdnt['id']."' && `dat`='".$ndt."' && `recpt_no`='".$rcpt_no."'");
		$arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1);
		$sno=$arr_mnth_fee_1['sno'];
		for($i=1;$i<=12;$i++)
		{
			$paid=$_POST['paid'.$i];
			if(!empty($paid))
			{
				$k=$i;
				for($j=1; $j<=$num; $j++)
				{
					$ft=$_POST['check'.$j];
					$fee_type=$_POST['fee_type'.$j];
					if(empty($ft))
					{
						
						if(isset($_POST['fee_'.$k]))
						{
							$fee=$_POST['fee_'.$k];
							mysql_query("insert into mnth_fee2 (`mnth_fee1_sno`,`dat`,`mnth`,`fee_type`,`fee`,`left`) values('".$sno."','".$ndt."','".$paid."','".$fee_type."','".$fee."','1')");
						}
					}
					if(!empty($ft))
					{
						if(isset($_POST['fee_'.$k]))
						{
							$fee=$_POST['fee_'.$k];
							mysql_query("insert into mnth_fee2 (`mnth_fee1_sno`,`dat`,`mnth`,`fee_type`,`fee`,`left`) values('".$sno."','".$ndt."','".$paid."','".$fee_type."','".$fee."','0')");
						}
					}
					$k+=12;
				}
			}
		}
		
		if(mysql_affected_rows()==1)
		{
			if(isset($_POST['save_print']))
			{
				echo "<script>location='fee_receipt_print.php?type=monthly&recpt_no=$rcpt_no&schlr_no_id=$schlr_no_id';</script>";
				exit;
			}
			$sel_mnth_fee_count=mysql_query("select * from `mnth_fee_1` where `schlr_no_id`='".$arr_stdnt['id']."'");
			$num_mnth_fee_count=mysql_num_rows($sel_mnth_fee_count);
			if($num_mnth_fee_count<=1)
			{
			 echo "<script>
				
				if (confirm('Do you want to print Fee Card.') == true) {
		window.open('fee_structure_view.php?schlr_no_id=$schlr_no_id','_blank');
		
				}
		</script>";
			}
			
										
			if($arr_stdnt['hstl']=='Yes')
			{	
			  echo "<script>
				
				if (confirm('Do you want to deposit hostle fee.') == true) {
		window.open('hstl_fee.php?schlr_no_id=$schlr_no_id','_blank');
		
				}
		</script>";
			}
			
			
			echo "<meta http-equiv='Refresh' content='0 ;URL=srch_mnth_fee.php?done=done'>";
			exit;
		}
		else
		{ 
			echo "<meta http-equiv='Refresh' content='0 ;URL=mnth_fee.php?schlr_no_id=$schlr_no_id&notdone=notdone'>";
			exit;	
		}
	}
}

/////////////////////////////////// ***** Back ***** ////////////////////////////////////////////////////////////////////////////

else if(isset($_POST['back']))
{
	
	echo "<meta http-equiv='Refresh' content='0 ;URL=srch_mnth_fee.php'>";
	exit;
}
?>
