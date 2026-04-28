<?php
session_start();
require_once("conn.php");
require_once("function.php");
extract($_POST); 
$sccs="";
$dt1=$_POST['chq_dt'];
if($dt1 !=NULL)
{
	$cdt = date("Y-m-d", strtotime($dt1));
}
else
{
	$cdt=0;
}
$ndt = date("Y-m-d", strtotime($date));

///////////////////////////////
$total=0;
if(isset($_POST['save_print']) || isset($_POST['save']))
{
	
	if($_POST['amt']>0)
	{
		$amt=$_POST['amt'];
		$rcpt_no=$_POST['rcpt_no'];
		$fee_type=$_POST['fee_type'];
		if($fee_type==1)
		{
			if($rcpt_no==1)
			{
				mysql_query("insert into mnth_rcpt_no (`mnth_rcpt_no`) values('1')");
			}
			else
			{
				$rn=$rcpt_no-1;
				mysql_query("update mnth_rcpt_no set mnth_rcpt_no='".$rcpt_no."' where mnth_rcpt_no='$rn'");
			}
		}
		if($fee_type==2)
		{
			if($rcpt_no==1)
			{
				mysql_query("insert into hstl_rcpt_no (`hstl_rcpt_no`) values('1')");
			}
			else
			{
				$rn=$rcpt_no-1;
				mysql_query("update hstl_rcpt_no set hstl_rcpt_no='".$rcpt_no."' where hstl_rcpt_no='$rn'");
			}
		}
		
		 $sql="insert into old_fee_submit (rcpt_no,date,schlr_no_id,fee_type,amt,cncssn,fee_dp,chq_no,chq_dt,bank,remark) values ('".$rcpt_no."','".$ndt."','".$schlr_no_id."','".$fee_type."','".$amt."','".$cncssn."','".$fee_dp."','".$chq_no."','".$cdt."','".$bank."','".$remark."')";
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
				
					
				$sel_cautn_fee=mysql_query("select * from `old_fee_submit` where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
				while($ftc_cautn_fee=mysql_fetch_array($sel_cautn_fee))
				{
					if($fee_type==1)
					{
						$fee_type='Old Monyhly fee';
					}
					else if($fee_type==2)
					{
						$fee_type='Old Hostel fee';
					}
			
					$i++;
					$fee=$ftc_cautn_fee['amt'];
					$cncssn=$ftc_cautn_fee['cncssn'];
					$total+=$fee;
					$len=strlen($fee_type);
					$data.="   ".$i." ".$fee_type;
					for($j=$len; $j<=28; $j++)
					{
						$data.=" ";
					}
					$data.=$fee."\n";
					$num_row++;
					
				}
				
				if(!empty($cncssn))
				{
					
					if(!empty($remark))
					{
						$len1=strlen($remark);
						for($j=$len1; $j<=19; $j++)
						{
							$data1.=" ";
						}
						$data.="     Concession (".$remark.")".$data1.$cncssn."\n";
					}
					else
					{
						$data.="     Concession                   ".$cncssn."\n";
					}
					$num_row++;
					$total=$total-$cncssn;
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
							pre { border: none !important; box-shadow: none !important; padding: 0 !important; margin: 0 !important; font-size: 12px !important; line-height: 1.2; width: 100%; }
						}
						body { font-family: 'Courier New', Courier, monospace; background: #f4f4f4; padding: 20px; }
						pre { background: white; padding: 20px; border: 1px solid #ccc; width: fit-content; margin: 0; font-size: 12px; white-space: pre; box-shadow: 0 0 10px rgba(0,0,0,0.1); line-height: 1.2; }
						.controls { text-align: center; margin-bottom: 20px; }
						button { padding: 10px 20px; font-size: 16px; cursor: pointer; background: #5cb85c; color: white; border: none; border-radius: 4px; margin: 5px; }
						.back-btn { background: #5bc0de; }
					  </style></head><body>";
				echo "<div class='controls no-print'>";
				echo "<button onclick='window.print()'>Click Here to Print</button>";
				echo "<button class='back-btn' onclick=\"window.location.href='srch_old_payment.php?done=done'\">Go Back</button>";
				echo "</div>";
				echo "<pre>".htmlspecialchars($data)."</pre>";
				echo "<script>window.print();</script>";
				echo "</body></html>";
				exit;
			}
			
			echo "<meta http-equiv='Refresh' content='0 ;URL=srch_old_payment.php?done=done'>";
			exit;
		}
		else
		{ 
			 echo "<meta http-equiv='Refresh' content='0 ;URL=old_payment.php?schlr_no_id=$schlr_no_id&notdone=notdone'>";
			 exit;
		}
	}
	else
	{ 
		 echo "<meta http-equiv='Refresh' content='0 ;URL=old_payment.php?schlr_no_id=$schlr_no_id&notdone=notdone'>";
		 exit;
	}
}
else if(isset($_POST['back']))
{
	echo "<meta http-equiv='Refresh' content='0 ;URL=srch_old_payment.php'>";
		exit;
}
?>
