<?php
session_start();
require_once("conn.php");
require_once("function.php");
extract($_POST); 
$sccs="";
$ndt = date("Y-m-d", strtotime($date));
$dt1=$_POST['chq_dt'];
if($dt1 !=NULL)
{
	$cdt = date("Y-m-d", strtotime($dt1));
}
else
{
	$cdt=0;
}

/////////////////////////////////////// **** Save And print **** ////////////////////////////////////////////////////////////////////////

if(isset($_POST['save_print']) || isset($_POST['save']))
{		
	$sel=mysql_query("select amt from cautn_fee where schlr_no_id='$schlr_no_id'");
	$arr=mysql_fetch_array($sel);
	$amt_ctn=$arr['amt'];
	if($amt_ctn>0)
	{
		echo "<meta http-equiv='Refresh' content='0 ;URL=srch_ctn.php?exist=exist'>";
		exit;
	}
		
	if(!empty($amt))
	{
		
	
		$rcpt_no=$_POST['rcpt_no'];
		if($rcpt_no==1)
		{
			mysql_query("insert into ctn_rcpt_no (`ctn_rcpt_no`) values('1')");
		}
		else
		{
			$rn=$rcpt_no-1;
			mysql_query("update ctn_rcpt_no set ctn_rcpt_no='".$rcpt_no."' where ctn_rcpt_no='$rn'");
		}
		$sql="insert into cautn_fee (rcpt_no,date,schlr_no_id,amt,chq_no,chq_dt,bank) values ('".$rcpt_no."','".$ndt."','".$schlr_no_id."','".$amt."','".$chq_no."','".$cdt."','".$bank."')";
		$r=mysql_query($sql);
		if(mysql_affected_rows()==1)
		{
			if(isset($_POST['save_print']))
			{
				$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'");
				$arr_stdnt=mysql_fetch_array($sel_stdnt);
				$cls_id=$arr_stdnt['cls'];
				
				$sel_cls=mysql_query("select * from `class` where `sno`='$cls_id'");
				$arr_cls=mysql_fetch_array($sel_cls);
				$class=$arr_cls['cls'];
				
				$sel_md=mysql_query("select * from medium where sno='".$arr_stdnt['md']."'");
				$arr_md=mysql_fetch_array($sel_md);
				$medium=$arr_md['medium'];
				
				$sel_strm=mysql_query("select * from `stream` where sno='".$arr_stdnt['strm']."'");
				$arr_strm=mysql_fetch_array($sel_strm);
				$strm=$arr_strm['strm'];
				
				$tmpdir = sys_get_temp_dir();
				$file =  tempnam($tmpdir, 'ctk');
				$handle = fopen($file, 'w');
				
				$data.="\n";
				$data.="              ".$rcpt_no."           ".$session."\n";
				$data.="     ".date('d-M-Y', strtotime($ndt))."               ".$schlr_no."\n";
				$data.="           ".$arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']."\n";
				$data.="           ".$arr_stdnt['f_name']."\n";
				$data.="       ".$class." ".$medium." ".$strm." (".$section.")\n";
				$data.="\n\n";
				
				$i=0;		
				$tot_fee=0;
				$total=0;
				
					
				$sel_cautn_fee=mysql_query("select * from `cautn_fee` where `schlr_no_id`='".$schlr_no_id."'");
				while($ftc_cautn_fee=mysql_fetch_array($sel_cautn_fee))
				{
					$i++;
					$fee=$ftc_cautn_fee['amt'];
					$total+=$fee;
					$fee_type="Caution Fee";
					$len=strlen($fee_type);
					$data.="   ".$i." ".$fee_type;
					for($j=$len; $j<=28; $j++)
					{
						$data.=" ";
					}
					$data.=$fee."\n";
					$num_row++;
				}
				for($k=$num_row; $k<7; $k++)
				{
					$data.="\n";
				}
				$data.="                                  ".$total."\n\n       ".convert_number_to_words($total)." Only";
				if(!empty($chq_no))
				{
					$data.="\n Cheque NO.- ".$chq_no.", Bank Name- ".$bank;
				}
				fwrite($handle, $data);
				fclose($handle);
				system('print '.$file.'');
				unlink($file);
			}
			
			
			echo "<meta http-equiv='Refresh' content='0 ;URL=srch_ctn.php?done=done'>";
			exit;
		}
		else
		{ 
			 echo "<meta http-equiv='Refresh' content='0 ;URL=ctn_fee.php?notdone=notdone'>";
		 	 exit;
		}
	}
	else
	{ 
		 echo "<meta http-equiv='Refresh' content='0 ;URL=ctn_fee.php?notdone=notdone'>";
		 exit;
	}
}

/////////////////////////////////// ***** Back ***** ////////////////////////////////////////////////////////////////////////////

else if(isset($_POST['back']))
{
	echo "<meta http-equiv='Refresh' content='0 ;URL=srch_ctn.php'>";
	exit;
}

?>