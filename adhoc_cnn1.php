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
if(isset($_POST['save_print']) || isset($_POST['save']))
{
	if($amt>0)
	{
		$rcpt_no=$_POST['rcpt_no'];
		if($rcpt_no==1)
		{
			mysql_query("insert into adhc_rcpt_no (`adhc_rcpt_no`) values('1')");
		}
		else
		{
			$rn=$rcpt_no-1;
			mysql_query("update mnth_rcpt_no set mnth_rcpt_no='".$rcpt_no."' where mnth_rcpt_no='$rn'");
		}
		
		$sql="insert into nonscholler_fee (rcpt_no,date,detail,fee_type,amt,chq_no,chq_dt,bank,remark) values ('".$rcpt_no."','".$ndt."','".$detail."','".$fee_type."','".$amt."','".$chq_no."','".$cdt."','".$bank."','".$remark."')";
		$r=mysql_query($sql);
		if(mysql_affected_rows()==1)
		{
			if(isset($_POST['save_print']))
			{
				$tmpdir = sys_get_temp_dir();
				$file =  tempnam($tmpdir, 'ctk');
				$handle = fopen($file, 'w');
				
				$data.="\n";
				$data.="              ".$rcpt_no."           ".$session."\n";
				$data.="     ".date('d-M-Y', strtotime($ndt))."\n\n\n\n";
				
				$data.="\n\n";
				
				$i=0;		
				$tot_fee=0;
				$total=0;
				
					
				$nonscholler_fee=mysql_query("select * from `nonscholler_fee` where `date`='".$ndt."' && `rcpt_no`='".$rcpt_no."'");
				while($ftc_nonscholler_fee=mysql_fetch_array($nonscholler_fee))
				{
					$i++;
					$sel_ft=mysql_query("select * from fee_type where sno='".$fee_type."'");
					$arr_ft=mysql_fetch_array($sel_ft);
					$fee_type=$arr_ft['type'];
					$fee=$ftc_nonscholler_fee['amt'];
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
				for($k=$num_row; $k<6; $k++)
				{
					$data.="\n";
				}
				if(!empty($remark))
				{
					$data.="     (".$remark.")\n";
				}
				else
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
						@page { margin: 0; size: auto; }
						@media print { 
							.no-print { display: none !important; } 
							body { margin: 0; padding: 0; background: white; }
							pre { border: none !important; box-shadow: none !important; padding: 0 !important; margin: 0 !important; font-size: 14px !important; line-height: 1.2; }
						}
						body { font-family: 'Courier New', Courier, monospace; background: #f4f4f4; padding: 20px; }
						pre { background: white; padding: 20px; border: 1px solid #ccc; width: fit-content; margin: 0 auto; font-size: 14px; white-space: pre; box-shadow: 0 0 10px rgba(0,0,0,0.1); line-height: 1.2; }
						.controls { text-align: center; margin-bottom: 20px; }
						button { padding: 10px 20px; font-size: 16px; cursor: pointer; background: #5cb85c; color: white; border: none; border-radius: 4px; margin: 5px; }
						.back-btn { background: #5bc0de; }
					  </style></head><body>";
				echo "<div class='controls no-print'>";
				echo "<button onclick='window.print()'>Click Here to Print</button>";
				echo "<button class='back-btn' onclick=\"window.location.href='srch_adhc.php?done=done'\">Go Back</button>";
				echo "</div>";
				echo "<pre>".htmlspecialchars($data)."</pre>";
				echo "<script>window.print();</script>";
				echo "</body></html>";
			}
			if(isset($_POST['save_print']))
			{
				echo "<script>window.print(); window.location.href='srch_adhc.php?done=done';</script>";
			}
			else
			{
				echo "<meta http-equiv='Refresh' content='0 ;URL=srch_adhc.php?done=done'>";
			}
			exit;
		}
		else
		{ 
			 echo "<meta http-equiv='Refresh' content='0 ;URL=adhc_nonscholar.php?notdone=notdone'>";
			 exit;
		}
	}
	else
	{ 
		 echo "<meta http-equiv='Refresh' content='0 ;URL=adhc_nonscholar.php?notdone=notdone'>";
		 exit;
	}
}
else if(isset($_POST['back']))
{
		echo "<meta http-equiv='Refresh' content='0 ;URL=srch_adhc.php'>";
		exit;
}


?>

