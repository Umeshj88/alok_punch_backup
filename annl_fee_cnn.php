<?php
session_start();
require_once("conn.php");
require_once("function.php");
extract($_POST); 
$_POST['gndr'];
$_POST['hstl'];
$_POST['bs_fclty'];
$dt1=$_POST['dt1'];
$dt=$_POST['dt'];
$schlr_no_id=$_POST['schlr_no_id'];

if($dt1 !=NULL)
{
	$cdt = date("Y-m-d", strtotime($dt1));
}
else
{
	$cdt=0;
}
 $dtt = date("Y-m-d", strtotime($dt));

/////////////////////////////////////// **** Save And print **** ////////////////////////////////////////////////////////////////////////

if(isset($_POST['save_print']) || isset($_POST['save']))
{
	$count=count($_POST['c']);
	$m=0;
	
		$rcpt_no=$_POST['rcpt_no'];
		if($rcpt_no==1)
		{
			mysql_query("insert into rcpt_no (`gen_rcpt_no`) values('1')");
		}
		else
		{
			$rn=$rcpt_no-1;
			mysql_query("update rcpt_no set gen_rcpt_no='".$rcpt_no."' where gen_rcpt_no='$rn'");
		}
		$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'");
		$arr_stdnt=mysql_fetch_array($sel_stdnt);
			
		$sql="insert into annl_fee (schlr_no_id,dat,recpt_no,gt,cncssn,cnrm,fyn,fee_dp,chq_no,dt1,bnk,rmks) values ('".$arr_stdnt['id']."','".$dtt."','".$rcpt_no."','".$gt."','".$cncssn."','".$cn_rm."','".$fyn."','".$fee_dp."','".$chq_no."','".$cdt."','".$bnk."','".$rmks."')";
		$r=mysql_query($sql);
		
			$sel_annl_fee_=mysql_query("select * from `annl_fee` where `schlr_no_id`='".$arr_stdnt['id']."' && `dat`='".$dtt."' && `recpt_no`='".$rcpt_no."'");
			$arr_annl_fee_=mysql_fetch_array($sel_annl_fee_);
			$id=$arr_annl_fee_['id'];
			
		for($i=0;$i<$count;$i++)
		{
		$m++;
		$a=$_POST['a'.$m];
		$sql1="insert into annl_fee1 (annl_fee_id,fee_type,fee) values('".$id."','".$c[$i]."','".$a."')";
		mysql_query($sql1);
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
				
				$tmpdir = sys_get_temp_dir();
				$file =  tempnam($tmpdir, 'ctk');
				$handle = fopen($file, 'w');
				
				$data.="\n";
				$data.="              ".$rcpt_no."           ".$session."\n";
				$data.="     ".date('d-M-Y', strtotime($dtt))."               ".$schlr_no."\n";
				$data.="           ".$arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']."\n";
				$data.="           ".$arr_stdnt['f_name']."\n";
				$data.="       ".$class." ".$medium." ".$strm." (".$section.")\n";
				$data.="\n\n";
		
				$i=0;		
				$tot_fee=0;
				$total=0;
			
				$sel_ann_fee=mysql_query("select * from `annl_fee1` where `annl_fee_id`='".$id."' && `fee`>'0'");
				while($arr_ann_fee=mysql_fetch_array($sel_ann_fee))
				{
					$i++;
					$fee=$arr_ann_fee['fee'];
					$total+=$fee;
					
					$sel_ft=mysql_query("select * from fee_type where sno='".$arr_ann_fee['fee_type']."'");
					$arr_ft=mysql_fetch_array($sel_ft);
					$fee_type=$arr_ft['type'];
					
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
				echo "<script>window.print(); window.location.href='srch_ann_fee.php?done=done';</script>";
			}
			else
			{
				echo "<meta http-equiv='Refresh' content='0 ;URL=srch_ann_fee.php?done=done'>";
			}
			exit;
		}
		else
		{ 
			 echo "<meta http-equiv='Refresh' content='0 ;URL=ann_fee_new.php?notdone=notdone'>";
								exit;
		}
	}


/////////////////////////////////// ***** Back ***** ////////////////////////////////////////////////////////////////////////////

else if(isset($_POST['back']))
{
	 echo "<meta http-equiv='Refresh' content='0 ;URL=srch_ann_fee.php'>";
	 exit;
}
?>