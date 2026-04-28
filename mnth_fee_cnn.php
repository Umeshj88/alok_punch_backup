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
				
				$sel_sec=mysql_query("select * from `section` where sno='".$arr_stdnt['sec']."'");
				$arr_sec=mysql_fetch_array($sel_sec);
				$section=$arr_sec['section'];
				
				$tmpdir = sys_get_temp_dir();
				$file =  tempnam($tmpdir, 'ctk');
				$handle = fopen($file, 'w');
				$total=0; $num_row=0;
				$data="\n\n";
				$data.="              ".$rcpt_no."           ".$session."\n";
				$data.="     ".date('d-M-Y', strtotime($ndt))."               ".$schlr_no."\n";
				$data.="           ".$arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']."\n";
				  
				$data.="           ".$arr_stdnt['f_name']."\n";
				$data.="       ".$class." ".$medium." ".$strm." (".$section.")\n";
				
				$data.="\n\n";
		
		
				$i=0;
				$sel_mnth_fee_1=mysql_query("select * from `mnth_fee_1` where `recpt_no`='".$rcpt_no."'");
				$arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1);
				$sno=$arr_mnth_fee_1['sno'];
				if($rte=='Yes')
				{
					$sel_mnth_fee2=mysql_query("select distinct fee_type from `mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0'");
				}
				else
				{
					$sel_mnth_fee2=mysql_query("select distinct fee_type from `mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0' && `fee`>'0'");
				}
				while($arr_mnth_fee2=mysql_fetch_array($sel_mnth_fee2))
				{
					$fee_type_id=$arr_mnth_fee2['fee_type'];
					$i++;
					$tot_fee=0;
					$mnth_id=NULL;
					if($rte=='Yes')
					{
						$sel_mnth_fee_2=mysql_query("select * from `mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0' && `fee_type`='$fee_type_id'");
					}
					else
					{
						$sel_mnth_fee_2=mysql_query("select * from `mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0' && `fee`>'0' && `fee_type`='$fee_type_id'");
					}
					while($arr_mnth_fee_2=mysql_fetch_array($sel_mnth_fee_2))
					{
						$fee=$arr_mnth_fee_2['fee'];
						$tot_fee+=$fee;
						$total+=$fee;
						$mnth_id[]=$arr_mnth_fee_2['mnth'];
					}
					$sel_ft=mysql_query("select * from fee_type where sno='".$arr_mnth_fee2['fee_type']."'");
					$arr_ft=mysql_fetch_array($sel_ft);
					$fee_type=$arr_ft['type'];
					$len=strlen($fee_type);
					$data.="   ".$i." ".$fee_type;
					for($j=$len; $j<=28; $j++)
					{
						$data.=" ";
					}
					$data.=$tot_fee."\n";
					$num_row++;
					$data.="      (".implode(",", $mnth_id).")\n";
					$num_row++;
				}
				if(!empty($cncssn))
				{
					if(!empty($cn_rm))
					{
						$len1=strlen($cn_rm);
						for($j=$len1; $j<=19; $j++)
						{
							$data1.=" ";
						}
						$data.="     Concession (".$cn_rm.")".$data1.$cncssn."\n";
					}
					else
					{
						$data.="     Concession                   ".$cncssn."\n";
					}
			
					
					$num_row++;
					$total=$total-$cncssn;
				}
				if(!empty($fyn))
				{
					if(!empty($cn_rm))
					{
						$len1=strlen($cn_rm);
						for($j=$len1; $j<=25; $j++)
						{
							$data1.=" ";
						}
						$data.="     Fine (".$cn_rm.")".$data1.$fyn."\n";
					}
					else
					{
						$data.="     Fine                         ".$fyn."\n";
					}
					$num_row++;
					$total=$total+$fyn;
				}
				for($k=$num_row; $k<8; $k++)
				{
					$data.="\n";
				}
				
				$data.="                                  ".$total."\n\n       ".convert_number_to_words($total)." Only";
				if(!empty($chq_no))
				{
					$data.="\n Cheque NO.- ".$chq_no.", Bank Name- ".$bnk;
				}
						
						/*
						fwrite($handle, $data);
						
						fclose($handle);
						system('print '.$file.'');
						unlink($file);
						*/
						echo "<html><head><title>Print Receipt</title>";
						echo "<style>
								@page { margin: 0mm; size: auto; }
								@media print { 
									.no-print { display: none !important; } 
									body { margin: 0; padding: 0; background: white; }
									pre { border: none !important; box-shadow: none !important; padding: 0 !important; margin: 0 !important; font-size: 12px !important; line-height: 1.6; width: 100%; page-break-inside: avoid; }
								}
								body { font-family: 'Courier New', Courier, monospace; background: #f4f4f4; padding: 20px; }
								pre { background: white; padding: 20px; border: 1px solid #ccc; width: fit-content; margin: 0; font-size: 12px; white-space: pre; box-shadow: 0 0 10px rgba(0,0,0,0.1); line-height: 1.6; page-break-inside: avoid; }
								.controls { text-align: center; margin-bottom: 20px; }
								button { padding: 10px 20px; font-size: 16px; cursor: pointer; background: #5cb85c; color: white; border: none; border-radius: 4px; margin: 5px; }
								.back-btn { background: #5bc0de; }
							  </style></head><body>";
						echo "<div class='controls no-print'>";
						echo "<button onclick='window.print()'>Click Here to Print</button>";
						echo "<button class='back-btn' onclick=\"window.location.href='srch_mnth_fee.php?done=done'\">Go Back</button>";
						echo "</div>";
						echo "<pre>".htmlspecialchars($data)."</pre>";
						echo "<script>window.print();</script>";
						echo "</body></html>";
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
			
			
			if(isset($_POST['save_print']))
			{
				echo "<script>window.print(); window.location.href='srch_mnth_fee.php?done=done';</script>";
			}
			else
			{
				echo "<meta http-equiv='Refresh' content='0 ;URL=srch_mnth_fee.php?done=done'>";
			}
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
