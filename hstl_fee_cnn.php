<?php
session_start();
require_once("conn.php");
require_once("function.php");
extract($_POST);
$session=$_SESSION['session'];
$dt=$_POST['dt'];
$dt=$_POST['dt'];

$schlr_no_id=$_POST['schlr_no_id'];
$ndt = date("Y-m-d", strtotime($dt));
if($dt1 !=NULL)
{
	$cdt = date("Y-m-d", strtotime($dt1));
}
else
{
	$cdt=0;
}
$tot=0;
/////////////////////////////////////// **** Save And print **** ////////////////////////////////////////////////////////////////////////

if(isset($_POST['save_print']) || isset($_POST['save']))
{
	
	$sql1="update `stdnt_reg` SET `hostel_reg`='$session' where `id`='$schlr_no_id' ";
			mysql_query($sql1);
	if($gt<=0)
	{
		echo "<meta http-equiv='Refresh' content='0 ;URL=hstl_fee.php?schlr_no=$schlr_no_id&selectmnth=selectmnth'>";
		exit;
	}
	else
	{
	$rcpt_no=$_POST['rcpt_no'];
		if($rcpt_no==1)
		{
			mysql_query("insert into hstl_rcpt_no (`hstl_rcpt_no`) values('1')");
		}
		else
		{
			$rn=$rcpt_no-1;
			mysql_query("update hstl_rcpt_no set hstl_rcpt_no='".$rcpt_no."' where hstl_rcpt_no='$rn'");
		}
	
		$sql="insert into hstl_fee (reg_no,rcpt_no,schlr_no_id,dat,amount,due,gt,cncsn,cnrm,fine,deposit,chq_no,c_date,bank,rmks) values ('".$reg_no."','".$rcpt_no."','".$schlr_no_id."','".$ndt."','".$inst."','".$due."','".$gt."','".$cncsn."','".$cn_rm."','".$fine."','".$dep."','".$chq."','".$cdt."','".$bnk."','".$rmks."')";
		mysql_query($sql);
		
		
		
		if(mysql_affected_rows()==1)
		{
			if(isset($_POST['save_print']))
			{
				$sel_stdnt=mysql_query("select * from `stdnt_reg` where `schlr_no`='$schlr_no_id'");
				$arr_stdnt=mysql_fetch_array($sel_stdnt);
				$cls_id=$arr_stdnt['cls'];
				$schlr_no_id=$arr_stdnt['id'];
				
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
		
				$sel_hstl_fee=mysql_query("select * from `hstl_fee` where `schlr_no_id`='".$schlr_no_id."' && `rcpt_no`='".$rcpt_no."'");
				$arr_hstl_fee=mysql_fetch_array($sel_hstl_fee);
				$dat=$arr_hstl_fee['dat'];
				$cncssn=$arr_hstl_fee['cncsn'];
				$fyn=$arr_hstl_fee['fine'];
				$chq_no=$arr_hstl_fee['chq_no'];
				$bnk=$arr_hstl_fee['bank'];
				$remark=$arr_hstl_fee['rmks'];
				
				$data.="\n";
				$data.="              ".$rcpt_no."           ".$session."\n";
				$data.="     ".date('d-M-Y', strtotime($dat))."               ".$schlr_no."\n";
				$data.="           ".$arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']."\n";
				  
				$data.="           ".$arr_stdnt['f_name']."\n";
				$data.="       ".$class." ".$medium." ".$strm." (".$section.")\n";
				
				$data.="\n\n";
		
				$i=0;		
				$tot_fee=0;
				
					$i++;
					$fee=$arr_hstl_fee['gt'];
					$total+=$fee;
					$fee_type="Hostel Fee";
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
				for($k=$num_row; $k<7; $k++)
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
				echo "<pre style='font-family: monospace; font-size: 12px; white-space: pre-wrap;'>".htmlspecialchars($data)."</pre>";
			}
			
			if(isset($_POST['save_print']))
			{
				echo "<script>window.print(); window.location.href='srch_hstl_fee.php?done=done';</script>";
			}
			else
			{
				echo "<meta http-equiv='Refresh' content='0 ;URL=srch_hstl_fee.php?done=done'>";
			}
			exit;
		}
		else
		{ 
			echo "<meta http-equiv='Refresh' content='0 ;URL=hstl_fee.php?schlr_no=$schlr_no_id&notdone=notdone'>";
			exit;	
		}
	}
}
else if(isset($_POST['delete']))
{
	$rad=$_POST['rad'];	
	{
		mysql_query("delete from hstl_fee where rcpt_no='$rad'");
		echo "<meta http-equiv='Refresh' content='0 ;URL=hstl_fee.php?schlr_no=$schlr_no_id&dlt_done=dlt_done'>";
		exit;
	}	
}
else if(isset($_POST['back']))
{
	echo "<meta http-equiv='Refresh' content='0 ;URL=srch_hstl_fee.php'>";
	exit;
}


?>