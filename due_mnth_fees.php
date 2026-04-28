<?php
require_once("conn.php");

 $cls=$_GET['con'];
 $sec=$_GET['sec'];
 $stream=$_GET['stream'];
$last_mnth=$_GET['con1'];
$sel_mnthcode=mysql_query("select * from `mnth_code` where `sno_deu_list`<='$last_mnth'");
while($arr_mnthcode=mysql_fetch_array($sel_mnthcode))
{
 	$last_mnth_id[]=$arr_mnthcode['id'];
}
?>
<link href="assets/css/print_page.css" rel="stylesheet" type="text/css"/>

<?php
if($cls=='All Classes')
{
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
?>
     <hr style="color:#000;"/>
	<table style=" width:100%;">
    <tr><td align="center" style="font-size:16px"><b>Class :- <?php echo $row['cls']; ?> </b></td><td align="center" style="font-size:16px"><b>Stream :- <?php echo $arr_strmm['strm']; ?> </b></td></tr>
</table>
<table  class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th>SNo.</th><th>Scholar No.</th><th>Student Name</th><th>Months for which the Fee is Due</th><th>Monthly Amount Due</th><th>Hostel Amount Due</th><th>Document Due</th><th>Old Tution Amount Due</th><th>Old Hostel Amount Due</th>
</tr>
</thead>
<?php
		
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
	$hostel_reg=$arr1['hostel_reg'];
	$adm_class_id = $arr1['adm_class_id'];
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
			$freq=$t4['freq'];
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
			$freq=$t4['freq'];
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
	
$tr='';
$tr.='<tr><td>'.++$sr_no.'</td><td>'.$schlr_no.'</td><td>'.$nm." ".$mnm." ".$lnm." S/O ".$f_nm.'</td><td>'.$due_mnth_name.'</td><td style="text-align:right">'.$amt_due.'</td>';
if($hstl=='Yes')
{
	@$amt_hstl=0;
	$sel_hstl=mysql_query("select amount from hstl_fee where schlr_no_id='$schlr_no_id'");
	while($arr_hstl=mysql_fetch_array($sel_hstl))
	{
		@$amt=$arr_hstl['amount'];
		@$amt_hstl+=@$amt;
	}
	
	if($hostel_reg==$session)
	{
		 $status=1;
	}
	else 
	{
		$status=2;
	}
	$sel_hstl1=mysql_query("select total from hstl_fee_setup where session='$session' && class='$cls' && `status`='$status'");
	$arr_hstl1=mysql_fetch_array($sel_hstl1);
	$hstl_amt=$arr_hstl1['total'];
	$amt_dues=@$hstl_amt-@$amt_hstl;
	$tr.='<td style="text-align:right">'.$amt_dues.'</td>';
	$total_hstl+=$amt_dues;
	$grand_total_hstl+=$amt_dues;

}
else
{
	$tr.='<td style="text-align:right">0</td>';
}
$docs="";

	$doc_pending='';
	$sel=mysql_query("select admsn_doc_id from cls_admsn_doc where class_id='$adm_class_id'");
	$arr=mysql_fetch_array($sel);	
	$ad_id=$arr['admsn_doc_id'];
	$data=explode(',' , $ad_id);
	$data_match=explode(',' , $document);
	$pending=array_diff($data,$data_match);
	foreach($pending as $pending_data)
	{
		$b=mysql_query("select * from admsn_doc where `id`='".$pending_data."'");
		while($row1=mysql_fetch_array($b))
		{
			$admsn_id=$row1['id'];
			$doc=$row1['doc'];
			$doc_pending[]=$doc;
		}
	}		
	if(is_array($doc_pending))
	{	
		$i=0;
		$docs="";
		for($j=0; $j<sizeof($doc_pending); $j++)
		{
			$i++;
			 $docs.=$i.". ".$doc_pending[$j].'<br/>';
		} 
	}

$tr.='<td>'.$docs.'</td>';



$amt_old_monthly=0;
$amt_old_hostel=0;
$amount_old_monthly=0;
$amount_old_hostel=0;
$sel_old=mysql_query("select `monthly_fee`,`hostel_fee` from `old_fee` where `schlr_no`='".$schlr_no."'");
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
$tr.='<td style="text-align:right">'.$amt_old_monthly.'</td>';
$tr.='<td style="text-align:right">'.$amt_old_hostel.'</td></tr>';

if(!empty($amt_due) || !empty($amt_dues) || !empty($amt_old_monthly) ||  !empty($amt_old_hostel))
{
	echo $tr;
}
else
{
	$sr_no--;
}


$amt_dues=0;
$amt_due=0;

unset($doc_pending);
			?>
            <!--
<td style="text-align:right">
<?php 
/*
$arr_old=mysql_query("select `schlr_no` from `old_fee` where `schlr_no`='".$schlr_no."'");
$num_old=mysql_num_rows($arr_old);
if(empty($num_old))
{
	mysql_query("insert into `old_fee` set `schlr_no`='".$schlr_no."', `monthly_fee`='".$amt_due."'");
}
else
{
	mysql_query("update `old_fee` set `monthly_fee`='".$amt_due."' where `schlr_no`='".$schlr_no."'");
}
*/
?>
</td>
-->

	<?php
	
}

}
?>
<tr>
<th colspan="4" style="text-align:right">Total Amount</th>
<td style="text-align:right"><strong><?php echo $total; ?></strong></td><td style="text-align:right"><strong><?php echo $total_hstl; ?></strong></td><td style="text-align:right"><strong></strong></td><td style="text-align:right"><strong><?php echo $tot_old_monthly; ?></strong></td><td style="text-align:right"><strong><?php echo $tot_old_hostel; ?></strong></td>
</tr>
<h4><b>Total no. of students whose Monthly Fee is due :-  <?php echo $count_due; ?></b></h4>
</table>

	<?php
	
	}
	}
	
	}
	?>
   <table class="table table-bordered table-hover" style="width:100%;">
   <tr>
   <th  style="text-align:right" rowspan="2">Grand Total</th>
   <td>Monthly Due</td><td>Hostel Due</td><td>Old Monthly Due</td><td>Old Hostel Due</td>
   </tr>
	<tr>

<td style="text-align:right"><strong><?php echo $grand_total; ?></strong></td>
<td style="text-align:right"><strong><?php echo $grand_total_hstl; ?></strong></td>
<td style="text-align:right"><strong><?php echo $grand_tot_old_monthly; ?></strong></td>
<td style="text-align:right"><strong><?php echo $grand_tot_old_hostel; ?></strong></td>
</tr>
</table>
<?php
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

else
{
	
	$a=mysql_query("select * from `class` where `sno`='$cls'");
 	$row=mysql_fetch_array($a);
	
	$total=0;
	$condition='';
	?>
    <hr style="color:#000;"/>
	<table style=" width:100%;">

<tr><td align="center" style="font-size:16px"><b>Class :- <?php echo $row['cls']; 
if(!empty($sec))
{
	$sel_sec=mysql_query("select * from `section` where `sno`='$sec'");
 	$row_sec=mysql_fetch_array($sel_sec);
	
	$condition.=" and sec='".$sec."'";
	?> &nbsp; Section :- <?php echo $row_sec['section']; 
}
if(!empty($stream))
{
	$sel=mysql_query("select * from `stream` where `sno`='$stream'");
	$arr=mysql_fetch_array($sel);
	
	$condition.=" and strm='".$stream."'";
	?>&nbsp; Stream :- <?php echo $arr['strm']; 
}
?> </b></td></tr>
</table>
<table  class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th>SNo.</th><th>Scholar No.</th><th>Student Name</th><th>Months for which the Fee is Due</th><th>Monthly Amount Due</th><th>Hostel Amount Due</th><th>Document Due</th><th>Old Tution Amount Due</th><th>Old Hostel Amount Due</th>
</tr>
</thead>
<?php
$sr_no=0;
$count_due=0;
$total_hstl=0;
$sel1=mysql_query("select * from stdnt_reg where cls='$cls'  and `continoue_discontinoue_status`='0' and `rte`='No' $condition");
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
	$bus_station=$arr1['bus_station'];
	$adm=$arr1['adm'];
	$document=$arr1['document'];
	$rg_dt=$arr1['rg_dt'];
	$hostel_reg=$arr1['hostel_reg'];
	$adm_class_id =$arr1['adm_class_id'];
	$mnth_name='';
	$mmm='';
	$diff_mnth_name='';
	$mnth='';
	$tot=0;
	$mnth_id='';
	$mnth_count='';
	$sel2=mysql_query("select * from mnth_fee_1 where schlr_no_id='$schlr_no_id'");
	while($arr2=mysql_fetch_array($sel2))
	{
		@$tot_submit=$arr2['fee_dp'];
		$sno=$arr2['sno'];
	
		$sel4=mysql_query("select distinct mnth from mnth_fee2 where `mnth_fee1_sno`='$sno'");
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
			$freq=$t4['freq'];
			$month_no=$t4['month_no'];
			$data=explode(",", $month_no);
			

			$sel_type=mysql_query("select * from `fee_type` where sno='$ft'");
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
		
								 
		///// Submit  Month in db //////////

for($mn=0; $mn<sizeof($mnth); $mn++)
{
	 $sel_mnthcode=mysql_query("select * from `mnth_code` where `mnth_name`='".$mnth[$mn]."'");
	 $arr_mnthcode=mysql_fetch_array($sel_mnthcode);
	 $mnth_id[]=$arr_mnthcode['id']; 
}
/////////////////////////////////////////////


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
			$freq=$t4['freq'];
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
	
}
if(is_array($mnth_name))
{
	$due_mnth_name=implode(',', $mnth_name);
}
else
{
	$due_mnth_name='';
}
	
$tr='';
$tr.='<tr><td>'.++$sr_no.'</td><td>'.$schlr_no.'</td><td>'.$nm." ".$mnm." ".$lnm." S/O ".$f_nm.'</td><td>'.$due_mnth_name.'</td><td style="text-align:right">'.$amt_due.'</td>';

if($hstl=='Yes')
{
	@$amt_hstl=0;
	$sel_hstl=mysql_query("select amount from hstl_fee where schlr_no_id='$schlr_no_id'");
	while($arr_hstl=mysql_fetch_array($sel_hstl))
	{
		@$amt=$arr_hstl['amount'];
		@$amt_hstl+=@$amt;
	}
	
	if($hostel_reg==$session)
	{
		 $status=1;
	}
	else 
	{
		$status=2;
	}
	$sel_hstl1=mysql_query("select total from hstl_fee_setup where session='$session' && class='$cls' && `status`='$status'");
	$arr_hstl1=mysql_fetch_array($sel_hstl1);
	$hstl_amt=$arr_hstl1['total'];
	$amt_dues=@$hstl_amt-@$amt_hstl;
	
	$tr.='<td style="text-align:right">'.$amt_dues.'</td>';
	$total_hstl+=$amt_dues;
	
}
else
{
	$tr.='<td style="text-align:right">0</td>';
}
	
$docs="";

	$doc_pending='';
	$sel=mysql_query("select `admsn_doc_id` from `cls_admsn_doc` where `class_id`='$adm_class_id'");
	$arr=mysql_fetch_array($sel);	
	$ad_id=$arr['admsn_doc_id'];
	$data=explode(',' , $ad_id);
	$data_match=explode(',' , $document);
	$pending=array_diff($data,$data_match);
	foreach($pending as $pending_data)
	{
		$b=mysql_query("select * from admsn_doc where `id`='".$pending_data."'");
		while($row1=mysql_fetch_array($b))
		{
			$admsn_id=$row1['id'];
			$doc=$row1['doc'];
			$doc_pending[]=$doc;
		}
	}
	if(is_array($doc_pending))
	{	
		$i=0;
		for($j=0; $j<sizeof($doc_pending); $j++)
		{
			$i++;
			 $docs.=$i.". ".$doc_pending[$j].'<br/>';
		} 
	}

$tr.='<td>'.$docs.'</td>';

$amt_old_monthly=0;
$amt_old_hostel=0;
$amount_old_monthly=0;
$amount_old_hostel=0;
$sel_old=mysql_query("select `monthly_fee`,`hostel_fee` from `old_fee` where `schlr_no`='".$schlr_no."'");
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
	$tr.='<td style="text-align:right">'.$amt_old_monthly.'</td>';
	$tr.='<td style="text-align:right">'.$amt_old_hostel.'</td></tr>';

if(!empty($amt_due) || !empty($amt_dues) || !empty($amt_old_monthly) ||  !empty($amt_old_hostel))
{
	echo $tr;
}
else
{
	$sr_no--;
}
$amt_dues=0;
$amt_due=0;
unset($doc_pending);

}
}
?>
<tr>
<th colspan="4" style="text-align:right">Total Amount</th>
<td style="text-align:right"><strong><?php echo $total; ?></strong></td>
<td style="text-align:right"><strong><?php echo $total_hstl; ?></strong></td>
<td></td>
<td style="text-align:right"><strong><?php echo $tot_old_monthly; ?></strong></td>
<td style="text-align:right"><strong><?php echo $tot_old_hostel; ?></strong></td>
</tr>
<h4><b>Total no. of students whose Monthly Fee is due :-  <?php echo $count_due; ?></b></h4>
</table>
<?php
}

?>
