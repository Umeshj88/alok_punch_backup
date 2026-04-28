<?php
include("conn.php");

$sel_mnthcode=mysql_query("select * from `mnth_code` where `sno_deu_list`<='12'");
while($arr_mnthcode=mysql_fetch_array($sel_mnthcode))
{
 	$last_mnth_id[]=$arr_mnthcode['id'];
}

	$a=mysql_query("select * from `class`");
 	while($row=mysql_fetch_array($a))
	{ 
		$cls=$row['sno'];
		//$cls=5;
		$sel_strmm=mysql_query("select * from `stream`");
		while($arr_strmm=mysql_fetch_array($sel_strmm))
		{
		$sr_no=0;
		$count_due=0;
		$mnth_count='';
		$total=0;
		
		$sel1=mysql_query("select * from stdnt_reg where cls='$cls' && strm='".$arr_strmm['sno']."' && `continoue_discontinoue_status`='0' && `rte`='No'");
		$num_stdnt=mysql_num_rows($sel1);
		
		if(!empty($num_stdnt))
		{ 
		$total_hstl=0;
		$tot_old_monthly=0;
		$tot_old_hostel=0;

		
while($arr1=mysql_fetch_array($sel1))
{
	$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr1['id']."' && `status`='1'");
	$tc=mysql_num_rows($sel_tc);
	if(empty($tc))
	{
	$amt1=0;
	$schlr_no=$arr1['schlr_no'];
	$schlr_no_id=$arr1['id'];
	$nm=$arr1['fname'];
	$mnm=$arr1['mname'];
	$lnm=$arr1['lname'];
	$f_nm=$arr1['f_name'];
	$hstl=$arr1['hstl'];
	$gndr=$arr1['gndr'];
	$bs_fc=$arr1['bs_fc'];
	$md=$arr1['md'];
	$strm=$arr1['strm'];
	$bus_facility=$arr1['bus_facility'];
	$bus_station=$arr1['bus_station'];
	$adm=$arr1['adm'];
	$document=$arr1['document'];
	$rg_dt=$arr1['rg_dt'];
	$adm_class_id = $arr1['adm_class_id'];
	$hostel_reg=$arr1['hostel_reg'];
	$mnth_name='';
	$mmm='';
	$diff_mnth_name='';
	$mnth='';
	$tot=0;
	$mnth_id='';
	$sel2=mysql_query("select * from mnth_fee_1 where schlr_no_id='$schlr_no_id'");
	while($arr2=mysql_fetch_array($sel2))
	{
		@$tot_submit=$arr2['fee_dp'];
		$sno=$arr2['sno'];
	
		$sel4=mysql_query("select mnth from mnth_fee2 where `mnth_fee1_sno`='$sno'");
		while($arr4=mysql_fetch_array($sel4))
		{
			@$mnth[]=$arr4['mnth'];	
			
			
		}
		
	}
	
	
		$tot=0;
		
		$s1=mysql_query("select id from `cls_fee_comp_setup1` where cls='$cls' && strm='$strm' && medium='$md'");
		@$t3=mysql_fetch_array($s1);
		$id=$t3['id'];			
		$xx=0;
		$k=0;
		
		$sel_invoice_edit=mysql_query("select * from `edit_invoice_fee_comp` where `schlr_no_id`='$schlr_no_id'");
		$num_edit_invoice_fee_comp=mysql_num_rows($sel_invoice_edit);
		
		$sel=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id'");
		while($t4=mysql_fetch_array($sel))
		{
			$ft=$t4['m_f_c'];
			$amt=$t4['amt'];
			//$freq=$t4['freq'];
			$month_no=$t4['month_no'];
			$data=explode(",", $month_no);
			

			$sel_type=mysql_query("select * from fee_type where sno='$ft'");
			$arr_type=mysql_fetch_array($sel_type);
			$fee_type=$arr_type['type'];
			 $station=$arr_type['station'];
			if(!empty($num_edit_invoice_fee_comp))
			{
				$sel_invoice=mysql_query("select * from `edit_invoice_fee_comp` where `fee_type`='$ft' && `schlr_no_id`='$schlr_no_id'");
				$arr_invoice=mysql_fetch_array($sel_invoice);
				$fee_type_editinvoice=$arr_invoice['fee_type'];
			}
			
			if($gndr=="Male" && $fee_type =="Bus Fee(Boys)" && $station==$bus_station && @$arr1['bs_fc']=="Yes")
			{
				$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
				$t5=mysql_fetch_array($sel5);
				$mfc=$t5['m_f_c'];
			}
			else if($gndr=="Female" && $fee_type =="Bus Fee(Girls)" && $station==$bus_station && @$arr1['bs_fc']=="Yes")
			{
				$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
				$t5=mysql_fetch_array($sel5);
				$mfc=$t5['m_f_c'];
			}
			else if($fee_type != "Bus Fee(Girls)" && $fee_type != "Bus Fee(Boys)")
			{
				$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
				$t5=mysql_fetch_array($sel5);
				$mfc=$t5['m_f_c'];
			}
						
			if($ft==$mfc)
			{
				$k++;
					
				for($i=1;$i<=12;$i++)
				{
					if($i==1){$mnn="jul";}
					else if($i==2){$mnn="aug";}
					else if($i==3){$mnn="sep";}
					else if($i==4){$mnn="oct";}
					else if($i==5){$mnn="nov";}
					else if($i==6){$mnn="dec";}
					else if($i==7){$mnn="jan";}
					else if($i==8){$mnn="feb";}
					else if($i==9){$mnn="mar";}
					else if($i==10){$mnn="apr";}
					else if($i==11){$mnn="may";}
					else if($i==12){$mnn="jun";}
					$g=$y."".$i; 
					$mn=0;
					$xx++;
					
					for($j=0; $j<sizeof($data); $j++)
					{
						 $t_data=$data[$j];
						  
						 if($i==$t_data)
						 {
							 $mn=$t_data;
							 $kk=0;
							
							 $mnth_data=explode(',', $mnth_count);
							 for($m=0; $m<=sizeof($mnth_data); $m++)
								{
									
									if($mn==$mnth_data[$m])
									{
										$kk++;
									
									}
								}
								if($kk==0)
								{
									
									 $mmm[]=$mn;
										
									$mnth_count=implode(',', $mmm);
									
								}
							 
						 }
					}
				}
			}
		}
			
		///// Submit  Month //////////

for($mn=0; $mn<=sizeof($mnth); $mn++)
{
	 $sel_mnthcode=mysql_query("select * from `mnth_code` where `mnth_name`='".$mnth[$mn]."'");
	 $arr_mnthcode=mysql_fetch_array($sel_mnthcode);
	 $mnth_id[]=$arr_mnthcode['id']; 
}
 
//////////////// common data between select month and get month/////	 
$mnth_data=explode(',', $mnth_count);
$diff_month= array_intersect($mnth_data, $last_mnth_id);
foreach ($diff_month as $valid)
{
	$sel_mnthcode=mysql_query("select * from `mnth_code` where `id`='".$valid."'");
	$arr_mnthcode=mysql_fetch_array($sel_mnthcode);
	if(is_array($mnth_id))
	{
		$diff_mnth_name[]=$arr_mnthcode['mnth_name'];
	}
	else
	{
		 $mnth_name[]=date('M' ,strtotime('2000-'.$arr_mnthcode['month_full_name']).'-01');
	}
}

	
if(is_array($mnth_id))
{
	$nonattendees = array_diff($diff_month, $mnth_id);
	foreach ($nonattendees as $valid)
	{
		$sel_mnthcode=mysql_query("select * from `mnth_code` where `id`='".$valid."'");
		 $arr_mnthcode=mysql_fetch_array($sel_mnthcode);
		 $mnth_name[]=date('M' ,strtotime('2000-'.$arr_mnthcode['month_full_name']).'-01');
		
	}
}
		/////////////// Due Amount /////////
		$sel=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id'");
		while($t4=mysql_fetch_array($sel))
		{
			$ft=$t4['m_f_c'];
			$amt=$t4['amt'];
			//$freq=$t4['freq'];
			$month_no=$t4['month_no'];
			$data=explode(",", $month_no);
			
			$sel_type=mysql_query("select * from fee_type where sno='$ft'");
			$arr_type=mysql_fetch_array($sel_type);
			$fee_type=$arr_type['type'];
			 $station=$arr_type['station'];
			if(!empty($num_edit_invoice_fee_comp))
			{
				$sel_invoice=mysql_query("select * from `edit_invoice_fee_comp` where `fee_type`='$ft' && `schlr_no_id`='$schlr_no_id'");
				$arr_invoice=mysql_fetch_array($sel_invoice);
				$fee_type_editinvoice=$arr_invoice['fee_type'];
			}
			if($gndr=="Male" && $fee_type =="Bus Fee(Boys)" && $station==$bus_station && @$arr1['bs_fc']=="Yes")
			{
				$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
				$t5=mysql_fetch_array($sel5);
				$mfc=$t5['m_f_c'];
				
			}
			else if($gndr=="Female" && $fee_type =="Bus Fee(Girls)" && $station==$bus_station && @$arr1['bs_fc']=="Yes")
			{
				$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
				$t5=mysql_fetch_array($sel5);
				$mfc=$t5['m_f_c'];
			}
			else if($fee_type != "Bus Fee(Girls)" && $fee_type != "Bus Fee(Boys)")
			{
				$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
				$t5=mysql_fetch_array($sel5);
				$mfc=$t5['m_f_c'];
			}
			if($ft==$mfc)
			{
				$k++;
					
				for($i=1;$i<=12;$i++)
				{
					if($i==1){$mnn="Jul";}
					else if($i==2){$mnn="Aug";}
					else if($i==3){$mnn="Sep";}
					else if($i==4){$mnn="Oct";}
					else if($i==5){$mnn="Nov";}
					else if($i==6){$mnn="Dec";}
					else if($i==7){$mnn="Jan";}
					else if($i==8){$mnn="Feb";}
					else if($i==9){$mnn="Mar";}
					else if($i==10){$mnn="Apr";}
					else if($i==11){$mnn="May";}
					else if($i==12){$mnn="Jun";}
					$g=$y."".$i; 
					$mn=0;
					$xx++;
					for($j=0; $j<sizeof($data); $j++)
					{
						 $t_data1=$data[$j];
						 if($i==$t_data1)
						 {
							 $mn=$t_data1;
						 }
					}
					for($j=0; $j<sizeof($mnth_name); $j++)
					{
						 $t_data=$mnth_name[$j];
						 if($mnn==$t_data)
						 {
							 
							$sel_edit_invoice=mysql_query("select * from `edit_invoice` where `schlr_no_id`='$schlr_no_id' && `fee_type`='$ft' && `mnth`='$mnn' ORDER BY id DESC LIMIT 1");
							$num_edit_invoice=mysql_num_rows($sel_edit_invoice);
							$arr_edit_invoice=mysql_fetch_array($sel_edit_invoice);
							if(!empty($num_edit_invoice))
							{
								
								if($mn == $i) {  $tot+=$arr_edit_invoice['fee'];}
								else 
								{ 
									 $tot+=0; 
								} 
								
							}
							else
							{ 
							
								if($mn == $i) {  $tot+=$amt;}
								else 
								{ 
									 $tot+=0;
								} 
							}
						 }
					}
					 
					
					
				}
			}
		}



$amt_due=$tot;
if($amt_due>0)
{
	$count_due++;
	$total+=$amt_due;
	$grand_total+=$amt_due;
}
if(is_array($mnth_name))
{
	$due_mnth_name=implode(',', $mnth_name);
}
else
{
	$due_mnth_name='';
}
	
if($hstl=='Yes')
{
	@$amt_hstl=0;
	$sel_hstl=mysql_query("select amount from hstl_fee where schlr_no_id='$schlr_no_id'");
	while($arr_hstl=mysql_fetch_array($sel_hstl))
	{
		@$amt=$arr_hstl['amount'];
		@$amt_hstl+=@$amt;
	}
	$rg_dt_year_c=date("Y", strtotime($rg_dt));
	$rg_dt_year_n=$rg_dt_year_c+1;
	$rg_dt_year=$rg_dt_year_c."-".$rg_dt_year_n;
	
	if( empty($hostel_reg) )
	{
		
		$status=1;
	}
	elseif( !empty($hostel_reg) && $hostel_reg == $session)
	{
		$status=1;
	}
	
	elseif ($hostel_reg != $session)
	{
		$status=2;
	}
	$sel_hstl1=mysql_query("select total from hstl_fee_setup where session='$session' && class='$cls' && `status`='$status' && `gender_type`='$gndr'");
	$arr_hstl1=mysql_fetch_array($sel_hstl1);
	$hstl_amt=$arr_hstl1['total'];
	$amt_dues=@$hstl_amt-@$amt_hstl;
	$total_hstl+=$amt_dues;
	$grand_total_hstl+=$amt_dues;

}



$amt_old_monthly=0;
$amt_old_hostel=0;
$amount_old_monthly=0;
$amount_old_hostel=0;
$sel_old=mysql_query("select `monthly_fee`,`hostel_fee` from `old_fee` where `schlr_no_id`='".$schlr_no_id."'");
$arr_old=mysql_fetch_array($sel_old);

$sel_submit=mysql_query("select `amt` from `old_fee_submit` where `schlr_no_id`='".$schlr_no_id."' && `fee_type`='1'");
while($arr_submit=mysql_fetch_array($sel_submit))
{
	$amount_old_monthly+=$arr_submit['amt'];
}
$amt_old_monthly+=$arr_old['monthly_fee']-$amount_old_monthly;

$sel_submit=mysql_query("select `amt` from `old_fee_submit` where `schlr_no_id`='".$schlr_no_id."' && `fee_type`='2'");
while($arr_submit=mysql_fetch_array($sel_submit))
{
	$amount_old_hostel+=$arr_submit['amt'];
}
$amt_old_hostel+=$arr_old['hostel_fee']-$amount_old_hostel;
$tot_old_monthly+=$amt_old_monthly;
$tot_old_hostel+=$amt_old_hostel;
$grand_tot_old_monthly+=$amt_old_monthly;
$grand_tot_old_hostel+=$amt_old_hostel;

if(!empty($amt_due) || !empty($amt_dues) || !empty($amt_old_monthly) ||  !empty($amt_old_hostel))
{
	$monthly_fee=$amt_due+$amt_old_monthly;
	$hostel_fee=$amt_dues+$amt_old_hostel;
	mysql_query("insert into `$newdb`.`old_fee` set `schlr_no_id`='".$schlr_no_id."', `schlr_no`='".$schlr_no."', `monthly_fee`='".$monthly_fee."', `hostel_fee`='".$hostel_fee."'");
}



$amt_dues=0;
$amt_due=0;


			?>
          

	<?php
	
}

}

	
	}
	}
	
	}
	
	?>