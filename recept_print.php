<?php
require_once("conn.php");
require_once("function.php");
 
 
if(!empty($_POST['recept_no']))
{
  	$current_date=date("Y-m-d");

	$rcpt_no=$_POST['recept_no'];
	$schlr_no_id=$_POST['schlr_no_recept'];
	
	$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'");
	$arr_stdnt=mysql_fetch_array($sel_stdnt);
	$cls_id=$arr_stdnt['cls'];
	$schlr_no=$arr_stdnt['schlr_no'];
	$rte=$arr_stdnt['rte'];
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
				
	$total=0; $num_row=0;
	
	if(isset($_POST['mnth_print']))
	{
		$tmpdir = sys_get_temp_dir();
		$file =  tempnam($tmpdir, 'ctk');
		$handle = fopen($file, 'w');
	
		$sel_mnth_fee_1=mysql_query("select * from `mnth_fee_1` where `schlr_no_id`='".$schlr_no_id."' && `recpt_no`='".$rcpt_no."'");
		$arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1);
		$sno=$arr_mnth_fee_1['sno'];
		$cncssn=$arr_mnth_fee_1['cncssn'];
		$fyn=$arr_mnth_fee_1['fyn'];
		$dat=$arr_mnth_fee_1['dat'];
		$cn_rm=$arr_mnth_fee_1['cnrm'];
		$chq_no=$arr_mnth_fee_1['chq_no'];
		$bnk=$arr_mnth_fee_1['bnk'];
		$data="\n\n\n";
		$data.="              ".$rcpt_no."           ".$session."\n";
		$data.="     ".date('d-M-Y', strtotime($dat))."               ".$schlr_no."\n";
		$data.="           ".$arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']."\n";
		$data.="           ".$arr_stdnt['f_name']."\n";
		$data.="       ".$class." ".$medium." ".$strm." (".$section.")\n";
		
		$data.="\n\n";
		$i=0;
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
			for($j=$len; $j<=35; $j++)
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
		for($k=$num_row; $k<10; $k++)
		{
			$data.="\n";
		}
		
		
		$data.="                                  ".$total."\n\n       ".convert_number_to_words($total)." Only";
		if(!empty($chq_no))
		{
			$data.="\n Cheque NO.- ".$chq_no.", Bank Name- ".$bnk;
		}
					
					//fwrite($handle, $data);
					//fclose($handle);
					//system('print'.$file.'');
					
					/*
					fwrite($handle, $data);
					fclose($handle);
					echo $output =system('print '.$file.'');
					unlink($file);
					*/
					echo "<html><head><title>Print Receipt</title>";
					echo "<style>
							@page { margin: 0mm; size: auto; }
							@media print { 
								.no-print { display: none !important; } 
								body { margin: 0; padding: 0; background: white; }
								pre { border: none !important; box-shadow: none !important; padding: 10px 0 0 40px !important; margin: 0 !important; font-size: 14px !important; line-height: 1.6; width: 100%; page-break-inside: avoid; }
							}
							body { font-family: 'Courier New', Courier, monospace; background: #f4f4f4; padding: 20px; }
							pre { background: white; padding: 10px 20px 20px 40px; border: 1px solid #ccc; width: fit-content; margin: 0; font-size: 14px; white-space: pre; box-shadow: 0 0 10px rgba(0,0,0,0.1); line-height: 1.6; page-break-inside: avoid; }
							.controls { text-align: center; margin-bottom: 20px; }
							button { padding: 10px 20px; font-size: 16px; cursor: pointer; background: #5cb85c; color: white; border: none; border-radius: 4px; margin: 5px; }
							.back-btn { background: #5bc0de; }
						  </style></head><body>";
					echo "<div class='controls no-print'>";
					echo "<button onclick='window.print()'>Click Here to Print</button>";
					echo "<button class='back-btn' onclick='window.history.back()'>Go Back</button>";
					echo "</div>";
					echo "<pre>".htmlspecialchars($data)."</pre>";
					echo "<script>window.print();</script>";
					echo "</body></html>";
					exit;
	}
	else if(isset($_POST['annl_print']))
	{
		$tmpdir = sys_get_temp_dir();
		$file =  tempnam($tmpdir, 'ctk');
		$handle = fopen($file, 'w');
		
		$sel_annl_fee_1=mysql_query("select * from `annl_fee` where `schlr_no_id`='".$schlr_no_id."' && `recpt_no`='".$rcpt_no."'");
		$arr_annl_fee_1=mysql_fetch_array($sel_annl_fee_1);
		$annl_fee_id=$arr_annl_fee_1['id'];
		$dat=$arr_annl_fee_1['dat'];
		$cncssn=$arr_annl_fee_1['cncssn'];
		$fyn=$arr_annl_fee_1['fyn'];
		$cn_rm=$arr_annl_fee_1['cnrm'];
		$chq_no=$arr_annl_fee_1['chq_no'];
		$bnk=$arr_annl_fee_1['bnk'];
		
		
		$data.="\n\n\n\n";
		$data.="              ".$rcpt_no."           ".$session."\n";
		$data.="     ".date('d-M-Y', strtotime($dat))."               ".$schlr_no."\n";
		$data.="           ".$arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']."\n";
		$data.="           ".$arr_stdnt['f_name']."\n";
		$data.="       ".$class." ".$medium." ".$strm." (".$section.")\n";
		
		$data.="\n\n";
			
		$i=0;		
		$tot_fee=0;
		$sel_annl_fee2=mysql_query("select * from `annl_fee1` where `annl_fee_id`='".$annl_fee_id."' && `fee`>'0'");
		while($arr_annl_fee2=mysql_fetch_array($sel_annl_fee2))
		{
			$i++;
			$fee=$arr_annl_fee2['fee'];
			$tot_fee+=$fee;
			$total+=$fee;
			
			$sel_ft=mysql_query("select * from fee_type where sno='".$arr_annl_fee2['fee_type']."'");
			$arr_ft=mysql_fetch_array($sel_ft);
			$fee_type=$arr_ft['type'];
			
			$len=strlen($fee_type);
			$data.="   ".$i." ".$fee_type;
			for($j=$len; $j<=35; $j++)
			{
				$data.=" ";
			}
			$data.=$tot_fee."\n";
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
		for($k=$num_row; $k<10; $k++)
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
					exit;
					unlink($file);
					*/
					echo "<html><head><title>Print Receipt</title>";
					echo "<style>
							@page { margin: 0mm; size: auto; }
							@media print { 
								.no-print { display: none !important; } 
								body { margin: 0; padding: 0; background: white; }
								pre { border: none !important; box-shadow: none !important; padding: 10px 0 0 40px !important; margin: 0 !important; font-size: 14px !important; line-height: 1.6; width: 100%; page-break-inside: avoid; }
							}
							body { font-family: 'Courier New', Courier, monospace; background: #f4f4f4; padding: 20px; }
							pre { background: white; padding: 10px 20px 20px 40px; border: 1px solid #ccc; width: fit-content; margin: 0; font-size: 14px; white-space: pre; box-shadow: 0 0 10px rgba(0,0,0,0.1); line-height: 1.6; page-break-inside: avoid; }
							.controls { text-align: center; margin-bottom: 20px; }
							button { padding: 10px 20px; font-size: 16px; cursor: pointer; background: #5cb85c; color: white; border: none; border-radius: 4px; margin: 5px; }
							.back-btn { background: #5bc0de; }
						  </style></head><body>";
					echo "<div class='controls no-print'>";
					echo "<button onclick='window.print()'>Click Here to Print</button>";
					echo "<button class='back-btn' onclick='window.history.back()'>Go Back</button>";
					echo "</div>";
					echo "<pre>".htmlspecialchars($data)."</pre>";
					echo "<script>window.print();</script>";
					echo "</body></html>";
					exit;
	}
	else if(isset($_POST['hstl_print']))
	{
		$tmpdir = sys_get_temp_dir();
		$file =  tempnam($tmpdir, 'ctk');
		$handle = fopen($file, 'w');
		
		$sel_hstl_fee=mysql_query("select * from `hstl_fee` where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		$arr_hstl_fee=mysql_fetch_array($sel_hstl_fee);
		$dat=$arr_hstl_fee['dat'];
		$cncssn=$arr_hstl_fee['cncsn'];
		$fyn=$arr_hstl_fee['fine'];
		$cn_rm=$arr_hstl_fee['cnrm'];
		$chq_no=$arr_hstl_fee['chq_no'];
		$bnk=$arr_hstl_fee['bank'];
	
	
		$data.="\n\n\n\n";
		$data.="              ".$rcpt_no."           ".$session."\n";
		$data.="     ".date('d-M-Y', strtotime($dat))."               ".$schlr_no."\n";
		$data.="           ".$arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']."\n";
		$data.="           ".$arr_stdnt['f_name']."\n";
		$data.="       ".$class." ".$medium." ".$strm." (".$section.")\n";
		
		$data.="\n\n";
			
		$i=0;		
		$tot_fee=0;
		
			$i++;
			$fee=$arr_hstl_fee['deposit'];
			$total+=$fee;
			$fee_type="Hostel Fee";
			$len=strlen($fee_type);
			$data.="   ".$i." ".$fee_type;
			for($j=$len; $j<=35; $j++)
			{
				$data.=" ";
			}
			$data.=$fee."\n";
			$num_row++;
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
		for($k=$num_row; $k<10; $k++)
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
								pre { border: none !important; box-shadow: none !important; padding: 10px 0 0 40px !important; margin: 0 !important; font-size: 14px !important; line-height: 1.6; width: 100%; page-break-inside: avoid; }
							}
							body { font-family: 'Courier New', Courier, monospace; background: #f4f4f4; padding: 20px; }
							pre { background: white; padding: 10px 20px 20px 40px; border: 1px solid #ccc; width: fit-content; margin: 0; font-size: 14px; white-space: pre; box-shadow: 0 0 10px rgba(0,0,0,0.1); line-height: 1.6; page-break-inside: avoid; }
							.controls { text-align: center; margin-bottom: 20px; }
							button { padding: 10px 20px; font-size: 16px; cursor: pointer; background: #5cb85c; color: white; border: none; border-radius: 4px; margin: 5px; }
							.back-btn { background: #5bc0de; }
						  </style></head><body>";
					echo "<div class='controls no-print'>";
					echo "<button onclick='window.print()'>Click Here to Print</button>";
					echo "<button class='back-btn' onclick='window.history.back()'>Go Back</button>";
					echo "</div>";
					echo "<pre>".htmlspecialchars($data)."</pre>";
					echo "<script>window.print();</script>";
					echo "</body></html>";
					exit;
	}
	
	else if(isset($_POST['cautn_print']))
	{
		$tmpdir = sys_get_temp_dir();
		$file =  tempnam($tmpdir, 'ctk');
		$handle = fopen($file, 'w');
		
		$sel_cautn_fee=mysql_query("select * from `cautn_fee` where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		$arr_cautn_fee=mysql_fetch_array($sel_cautn_fee);
		$dat=$arr_cautn_fee['date'];
		$chq_no=$arr_cautn_fee['chq_no'];
		$bnk=$arr_cautn_fee['bank'];
		
		$data.="\n\n\n\n";
		$data.="              ".$rcpt_no."           ".$session."\n";
		$data.="     ".date('d-M-Y', strtotime($dat))."               ".$schlr_no."\n";
		$data.="           ".$arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']."\n";
		$data.="           ".$arr_stdnt['f_name']."\n";
		$data.="       ".$class." ".$medium." ".$strm." (".$section.")\n";
		
		$data.="\n\n";
			
		$i=0;		
		$tot_fee=0;
		
		$i++;
		$fee=$arr_cautn_fee['amt'];
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
		for($k=$num_row; $k<10; $k++)
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
								pre { border: none !important; box-shadow: none !important; padding: 10px 0 0 40px !important; margin: 0 !important; font-size: 14px !important; line-height: 1.6; width: 100%; page-break-inside: avoid; }
							}
							body { font-family: 'Courier New', Courier, monospace; background: #f4f4f4; padding: 20px; }
							pre { background: white; padding: 10px 20px 20px 40px; border: 1px solid #ccc; width: fit-content; margin: 0; font-size: 14px; white-space: pre; box-shadow: 0 0 10px rgba(0,0,0,0.1); line-height: 1.6; page-break-inside: avoid; }
							.controls { text-align: center; margin-bottom: 20px; }
							button { padding: 10px 20px; font-size: 16px; cursor: pointer; background: #5cb85c; color: white; border: none; border-radius: 4px; margin: 5px; }
							.back-btn { background: #5bc0de; }
						  </style></head><body>";
					echo "<div class='controls no-print'>";
					echo "<button onclick='window.print()'>Click Here to Print</button>";
					echo "<button class='back-btn' onclick='window.history.back()'>Go Back</button>";
					echo "</div>";
					echo "<pre>".htmlspecialchars($data)."</pre>";
					echo "<script>window.print();</script>";
					echo "</body></html>";
					exit;
	}
	else if(isset($_POST['adhoc_print']))
	{
		$tmpdir = sys_get_temp_dir();
		$file =  tempnam($tmpdir, 'ctk');
		$handle = fopen($file, 'w');
		
		$sel_adhoc_fee=mysql_query("select * from `adhoc_fee` where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		$arr_adhoc_fee=mysql_fetch_array($sel_adhoc_fee);
		$dat=$arr_adhoc_fee['date'];
		$chq_no=$arr_adhoc_fee['chq_no'];
		$bank=$arr_adhoc_fee['bank'];
		$fee_type=$arr_adhoc_fee['fee_type'];
		$remark=$arr_adhoc_fee['remark'];
		$sel_ft=mysql_query("select * from fee_type where sno='".$fee_type."'");
		$arr_ft=mysql_fetch_array($sel_ft);
		$fee_type=$arr_ft['type'];
		
		$data.="\n\n\n\n";
		$data.="              ".$rcpt_no."           ".$session."\n";
		$data.="     ".date('d-M-Y', strtotime($dat))."               ".$schlr_no."\n";
		$data.="           ".$arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']."\n";
		$data.="           ".$arr_stdnt['f_name']."\n";
		$data.="       ".$class." ".$medium." ".$strm." (".$section.")\n";
		
		$data.="\n\n";
			
		$i=0;		
		$tot_fee=0;
		
		$i++;
		$fee=$arr_adhoc_fee['amt'];
		$total+=$fee;
		$len=strlen($fee_type);
		$data.="   ".$i." ".$fee_type;
		for($j=$len; $j<=28; $j++)
		{
			$data.=" ";
		}
		$data.=$fee."\n";
		$num_row++;
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
							@page { margin: 0mm; size: auto; }
							@media print { 
								.no-print { display: none !important; } 
								body { margin: 0; padding: 0; background: white; }
								pre { border: none !important; box-shadow: none !important; padding: 10px 0 0 40px !important; margin: 0 !important; font-size: 14px !important; line-height: 1.6; width: 100%; page-break-inside: avoid; }
							}
							body { font-family: 'Courier New', Courier, monospace; background: #f4f4f4; padding: 20px; }
							pre { background: white; padding: 10px 20px 20px 40px; border: 1px solid #ccc; width: fit-content; margin: 0; font-size: 14px; white-space: pre; box-shadow: 0 0 10px rgba(0,0,0,0.1); line-height: 1.6; page-break-inside: avoid; }
							.controls { text-align: center; margin-bottom: 20px; }
							button { padding: 10px 20px; font-size: 16px; cursor: pointer; background: #5cb85c; color: white; border: none; border-radius: 4px; margin: 5px; }
							.back-btn { background: #5bc0de; }
						  </style></head><body>";
					echo "<div class='controls no-print'>";
					echo "<button onclick='window.print()'>Click Here to Print</button>";
					echo "<button class='back-btn' onclick='window.history.back()'>Go Back</button>";
					echo "</div>";
					echo "<pre>".htmlspecialchars($data)."</pre>";
					echo "<script>window.print();</script>";
					echo "</body></html>";
					exit;
	}
	else if(isset($_POST['oldfee_print']))
	{
		$tmpdir = sys_get_temp_dir();
		$file =  tempnam($tmpdir, 'ctk');
		$handle = fopen($file, 'w');
		
		$sel_adhoc_fee=mysql_query("select * from `old_fee_submit` where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		$arr_adhoc_fee=mysql_fetch_array($sel_adhoc_fee);
		$dat=$arr_adhoc_fee['date'];
		$chq_no=$arr_adhoc_fee['chq_no'];
		$bank=$arr_adhoc_fee['bank'];
		$fee_type=$arr_adhoc_fee['fee_type'];
		$remark=$arr_adhoc_fee['remark'];
		$cncssn=$arr_adhoc_fee['cncssn'];
		
		if($fee_type==1)
		{
			$fee_type='Old Monyhly fee';
		}
		else if($fee_type==2)
		{
			$fee_type='Old Hostel fee';
		}
		
		
		$data.="\n\n\n\n";
		$data.="              ".$rcpt_no."           ".$session."\n";
		$data.="     ".date('d-M-Y', strtotime($dat))."               ".$schlr_no."\n";
		$data.="           ".$arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']."\n";
		$data.="           ".$arr_stdnt['f_name']."\n";
		$data.="       ".$class." ".$medium." ".$strm." (".$section.")\n";
		
		$data.="\n\n";
			
		$i=0;		
		$tot_fee=0;
		
		$i++;
		$fee=$arr_adhoc_fee['amt'];
		$total+=$fee;
		$len=strlen($fee_type);
		$data.="   ".$i." ".$fee_type;
		for($j=$len; $j<=28; $j++)
		{
			$data.=" ";
		}
		$data.=$fee."\n";
		$num_row++;
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
		
		
		for($k=$num_row; $k<10; $k++)
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
								pre { border: none !important; box-shadow: none !important; padding: 10px 0 0 40px !important; margin: 0 !important; font-size: 14px !important; line-height: 1.6; width: 100%; page-break-inside: avoid; }
							}
							body { font-family: 'Courier New', Courier, monospace; background: #f4f4f4; padding: 20px; }
							pre { background: white; padding: 10px 20px 20px 40px; border: 1px solid #ccc; width: fit-content; margin: 0; font-size: 14px; white-space: pre; box-shadow: 0 0 10px rgba(0,0,0,0.1); line-height: 1.6; page-break-inside: avoid; }
							.controls { text-align: center; margin-bottom: 20px; }
							button { padding: 10px 20px; font-size: 16px; cursor: pointer; background: #5cb85c; color: white; border: none; border-radius: 4px; margin: 5px; }
							.back-btn { background: #5bc0de; }
						  </style></head><body>";
					echo "<div class='controls no-print'>";
					echo "<button onclick='window.print()'>Click Here to Print</button>";
					echo "<button class='back-btn' onclick='window.history.back()'>Go Back</button>";
					echo "</div>";
					echo "<pre>".htmlspecialchars($data)."</pre>";
					echo "<script>window.print();</script>";
					echo "</body></html>";
					exit;
	}
	
	else if(isset($_POST['nonscolar_print']))
	{
		$tmpdir = sys_get_temp_dir();
		$file =  tempnam($tmpdir, 'ctk');
		$handle = fopen($file, 'w');
		
			$i=0;		
			$tot_fee=0;
			$total=0;
			
			$nonscholler_fee=mysql_query("select * from `nonscholler_fee` where `rcpt_no`='".$rcpt_no."'");
			$ftc_nonscholler_fee=mysql_fetch_array($nonscholler_fee);
			$dat=$ftc_nonscholler_fee['date'];
			$chq_no=$ftc_nonscholler_fee['chq_no'];
			$bnk=$ftc_nonscholler_fee['bank'];
			$fee_type=$ftc_nonscholler_fee['fee_type'];
			$remark=$ftc_nonscholler_fee['remark'];
			$sel_ft=mysql_query("select * from fee_type where sno='".$fee_type."'");
			$arr_ft=mysql_fetch_array($sel_ft);
			$fee_type=$arr_ft['type'];
			
				$i++;
				
				$data.="\n";
				$data.="              ".$rcpt_no."           ".$session."\n";
				$data.="     ".date('d-M-Y', strtotime($dat))."\n\n\n\n";
				
				$data.="\n\n";
			
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
				$data.="\n Cheque NO.- ".$chq_no.", Bank Name- ".$bnk;
			}
			/*
			fwrite($handle, $data);
			fclose($handle);
			system('print '.$file.'');
			unlink($file);
			*/
			echo "<html><head><style>
							@page { size: 12.7cm 10.1cm landscape; margin: 0; }
							@media print { 
								.no-print { display: none !important; } 
								html, body { margin: 0; padding: 0; background: white; width: 12.7cm; height: 10.1cm; overflow: hidden; }
								pre { border: none !important; box-shadow: none !important; padding: 0 !important; margin: 0 !important; font-size: 11px !important; line-height: 1.1 !important; width: 12.7cm; height: 9.8cm; page-break-inside: avoid; overflow: hidden; white-space: pre; }
							}
							pre { font-family: 'Courier New', Courier, monospace; font-size: 11px; white-space: pre; line-height: 1.1; margin: 0; padding: 5px; }
						  </style></head><body>";
			echo "<pre>".htmlspecialchars($data)."</pre>";
			echo "<script>window.print(); window.location.href='srch_adhc.php?done=done';</script>";
			echo "</body></html>";
			exit;
			//////////////////////////////////////// Receipt Delete Code   //////////////////////////////////////////////////////////////////////
	}
	
	else if(isset($_POST['mnth_delete']))
	{
			$reason=$_POST['reason'];
		$sel_mnth_fee_1=mysql_query("select * from `mnth_fee_1` where `schlr_no_id`='".$schlr_no_id."' && `recpt_no`='".$rcpt_no."'");
		$arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1);
		
		mysql_query("insert into delete_mnth_fee_1 (`schlr_no_id`,`recpt_no`,`dat`,`gt`,`cncssn`,`cnrm`,`fyn`,`fee_dp`,`chq_no`,`dt1`,`bnk`,`rmks`,`reason`,`del_date`) values ('".$arr_mnth_fee_1['schlr_no_id']."','".$arr_mnth_fee_1['recpt_no']."','".$arr_mnth_fee_1['dat']."','".$arr_mnth_fee_1['gt']."','".$arr_mnth_fee_1['cncssn']."','".$arr_mnth_fee_1['cnrm']."','".$arr_mnth_fee_1['fyn']."','".$arr_mnth_fee_1['fee_dp']."','".$arr_mnth_fee_1['chq_no']."','".$arr_mnth_fee_1['dt1']."','".$arr_mnth_fee_1['bnk']."','".$arr_mnth_fee_1['rmks']."','".$reason."','".$current_date."')");
		
		$last_id=mysql_insert_id();
		$sel_mnth_fee2=mysql_query("select * from `mnth_fee2` where `mnth_fee1_sno`='".$arr_mnth_fee_1['sno']."'");
		while($arr_mnth_fee2=mysql_fetch_array($sel_mnth_fee2))
		{
			
			mysql_query("insert into delete_mnth_fee2 (`mnth_fee1_sno`,`dat`,`mnth`,`fee_type`,`fee`,`left`) values('".$last_id."','".$arr_mnth_fee2['dat']."','".$arr_mnth_fee2['mnth']."','".$arr_mnth_fee2['fee_type']."','".$arr_mnth_fee2['fee']."','".$arr_mnth_fee2['left']."')");
			mysql_query("delete from `mnth_fee2` where `mnth_fee1_sno`='".$arr_mnth_fee_1['sno']."'");
		}
		
		mysql_query("delete from `mnth_fee_1`  where `schlr_no_id`='".$schlr_no_id."' && `recpt_no`='".$rcpt_no."'");
		echo "<meta http-equiv='Refresh' content='0 ;URL=mnth_fee.php?schlr_no_id=$schlr_no_id&recpt_delete=$rcpt_no'>";
		exit;
	}
	
	else if(isset($_POST['annl_delete']))
	{
		$reason=$_POST['reason'];
		
		$sel_annl_fee_1=mysql_query("select * from `annl_fee` where `schlr_no_id`='".$schlr_no_id."' && `recpt_no`='".$rcpt_no."'");
		$arr_annl_fee_1=mysql_fetch_array($sel_annl_fee_1);
		
		mysql_query("insert into delete_annl_fee(`schlr_no_id`,`recpt_no`,`dat`,`gt`,`cncssn`,`cnrm`,`fyn`,`fee_dp`,`chq_no`,`dt1`,`bnk`,`rmks`,`reason`,`del_date`) values ('".$arr_annl_fee_1['schlr_no_id']."','".$arr_annl_fee_1['recpt_no']."','".$arr_annl_fee_1['dat']."','".$arr_annl_fee_1['gt']."','".$arr_annl_fee_1['cncssn']."','".$arr_annl_fee_1['cnrm']."','".$arr_annl_fee_1['fyn']."','".$arr_annl_fee_1['fee_dp']."','".$arr_annl_fee_1['chq_no']."','".$arr_annl_fee_1['dt1']."','".$arr_annl_fee_1['bnk']."','".$arr_annl_fee_1['rmks']."','".$reason."','".$current_date."')");
		$last_id=mysql_insert_id();
		$sel_annl_fee2=mysql_query("select * from `annl_fee1` where `annl_fee_id`='".$arr_annl_fee_1['id']."'");
		while($arr_annl_fee2=mysql_fetch_array($sel_annl_fee2))
		{
			mysql_query("insert into delete_annl_fee1 (`annl_fee_id`,`fee_type`,`fee`) values('".$last_id."','".$arr_annl_fee2['fee_type']."','".$arr_annl_fee2['fee']."')");
			mysql_query("delete from `annl_fee1` where `annl_fee_id`='".$arr_annl_fee_1['id']."'");
			
		}
		mysql_query("delete from `annl_fee`  where `schlr_no_id`='".$schlr_no_id."' && `recpt_no`='".$rcpt_no."'");
		
		echo "<meta http-equiv='Refresh' content='0 ;URL=annl_fee_new.php?schlr_no_id=$schlr_no_id&recpt_delete=$rcpt_no'>";
		exit;
	}
	else if(isset($_POST['hstl_delete']))
	{
		$reason=$_POST['reason'];
		$sel_hstl_fee=mysql_query("select * from `hstl_fee` where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		$arr_hstl_fee=mysql_fetch_array($sel_hstl_fee);
		
		$sql="insert into delete_hstl_fee (reg_no,rcpt_no,schlr_no_id,dat,amount,due,gt,cncsn,cnrm,fine,deposit,chq_no,c_date,bank,rmks ,`reason`,`del_date`) values ('".$arr_hstl_fee['reg_no']."','".$arr_hstl_fee['rcpt_no']."','".$arr_hstl_fee['schlr_no_id']."','".$arr_hstl_fee['dat']."','".$arr_hstl_fee['amount']."','".$arr_hstl_fee['due']."','".$arr_hstl_fee['gt']."','".$arr_hstl_fee['cncsn']."','".$arr_hstl_fee['cnrm']."','".$arr_hstl_fee['fine']."','".$arr_hstl_fee['deposit']."','".$arr_hstl_fee['chq_no']."','".$arr_hstl_fee['c_date']."','".$arr_hstl_fee['bank']."','".$arr_hstl_fee['rmks']."','".$reason."','".$current_date."')";
		mysql_query($sql);
		mysql_query("delete from `hstl_fee`  where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		
		echo "<meta http-equiv='Refresh' content='0 ;URL=hstl_fee.php?schlr_no_id=$schlr_no_id&recpt_delete=$rcpt_no'>";
		exit;
	}
	else if(isset($_POST['cautn_delete']))
	
	{
		$reason=$_POST['reason'];
		
		$sel_cautn_fee=mysql_query("select * from `cautn_fee` where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		$arr_cautn_fee=mysql_fetch_array($sel_cautn_fee);
		
		$sql="insert into delete_cautn_fee (rcpt_no,date,schlr_no_id,amt,chq_no,chq_dt,bank ,`reason`,`del_date`) values ('".$arr_cautn_fee['rcpt_no']."','".$arr_cautn_fee['date']."','".$arr_cautn_fee['schlr_no_id']."','".$arr_cautn_fee['amt']."','".$arr_cautn_fee['chq_no']."','".$arr_cautn_fee['chq_dt']."','".$arr_cautn_fee['bank']."','".$reason."','".$current_date."')";
		mysql_query($sql);
		mysql_query("delete from `cautn_fee`  where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		
		echo "<meta http-equiv='Refresh' content='0 ;URL=ctn_fee.php?schlr_no_id=$schlr_no_id&recpt_delete=$rcpt_no'>";
		exit;
	}
	else if(isset($_POST['adhoc_delete']))
	{
		$reason=$_POST['reason'];
		$sel_adhoc_fee=mysql_query("select * from `adhoc_fee` where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		$arr_adhoc_fee=mysql_fetch_array($sel_adhoc_fee);
		
		$sql="insert into delete_adhoc_fee (rcpt_no,date,schlr_no_id,fee_type,amt,chq_no,chq_dt,bank,remark,`reason`,`del_date`) values ('".$arr_adhoc_fee['rcpt_no']."','".$arr_adhoc_fee['date']."','".$arr_adhoc_fee['schlr_no_id']."','".$arr_adhoc_fee['fee_type']."','".$arr_adhoc_fee['amt']."','".$arr_adhoc_fee['chq_no']."','".$arr_adhoc_fee['chq_dt']."','".$arr_adhoc_fee['bank']."','".$arr_adhoc_fee['remark']."','".$reason."','".$current_date."')";
		mysql_query($sql);
		mysql_query("delete from `adhoc_fee`  where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		
		echo "<meta http-equiv='Refresh' content='0 ;URL=adhc.php?schlr_no_id=$schlr_no_id&recpt_delete=$rcpt_no'>";
		exit;
	}
	else if(isset($_POST['oldfee_delete']))
	{
		$reason=$_POST['reason'];
		$sel_adhoc_fee=mysql_query("select * from `old_fee_submit` where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		$arr_adhoc_fee=mysql_fetch_array($sel_adhoc_fee);
		
		 $sql="insert into delete_old_fee_submit (rcpt_no,date,schlr_no_id,fee_type,amt,cncssn,fee_dp,chq_no,chq_dt,bank,remark,`reason`,`del_date`) values ('".$arr_adhoc_fee['rcpt_no']."','".$arr_adhoc_fee['date']."','".$arr_adhoc_fee['schlr_no_id']."','".$arr_adhoc_fee['fee_type']."','".$arr_adhoc_fee['amt']."','".$arr_adhoc_fee['cncssn']."','".$arr_adhoc_fee['fee_dp']."','".$arr_adhoc_fee['chq_no']."','".$arr_adhoc_fee['chq_dt']."','".$arr_adhoc_fee['bank']."','".$arr_adhoc_fee['remark']."','".$reason."','".$current_date."')";
		
		mysql_query($sql);
		mysql_query("delete from `old_fee_submit`  where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
		
		echo "<meta http-equiv='Refresh' content='0 ;URL=old_payment.php?schlr_no_id=$schlr_no_id&recpt_delete=$rcpt_no'>";
		exit;
	}
	else if(isset($_POST['nonscholar_delete']))
	{
		$reason=$_POST['reason'];
		$sel_adhoc_fee=mysql_query("select * from `nonscholler_fee` where `rcpt_no`='".$rcpt_no."'");
		$arr_adhoc_fee=mysql_fetch_array($sel_adhoc_fee);
		
		 $sql="insert into delete_nonscholler_fee (rcpt_no,date,detail,fee_type,amt,chq_no,chq_dt,bank,remark,`reason`,`del_date`) values ('".$arr_adhoc_fee['rcpt_no']."','".$arr_adhoc_fee['date']."','".$arr_adhoc_fee['detail']."','".$arr_adhoc_fee['fee_type']."','".$arr_adhoc_fee['amt']."','".$arr_adhoc_fee['chq_no']."','".$arr_adhoc_fee['chq_dt']."','".$arr_adhoc_fee['bank']."','".$arr_adhoc_fee['remark']."','".$reason."','".$current_date."')";
		
		mysql_query($sql);
		mysql_query("delete from `nonscholler_fee`  where `rcpt_no`='".$rcpt_no."'");
		
		echo "<meta http-equiv='Refresh' content='0 ;URL=adhc_nonscholar.php?recpt_delete=$rcpt_no'>";
		exit;
	}
}
			?>

</body>
</html>

