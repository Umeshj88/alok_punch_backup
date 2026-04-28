<?php
include("conn.php");
$sel_mnthcode=mysql_query("select * from `mnth_code` where `sno_deu_list`<='12'");
 while($arr_mnthcode=mysql_fetch_array($sel_mnthcode))
 {
 	 $last_mnth_id[]=$arr_mnthcode['id'];
 }
?>
<div class="row">
	<div class="col-md-6">  
     <div class="portlet">
                       <div class="portlet-title">
                       <div class="caption">Receipt Books</div>
                       </div>
                           <div class="portlet-body">
                                <div class="table-responsive">     
                        <table class="table table-bordered">
                        <tr>
                        <th>Fee Type</th><th>Receipt No. From</th><th>Receipt No. To</th>
                        </tr>
                        <td>General Fees</td>


<?php
		   $data=mysql_query("select `recpt_no` from `annl_fee` ORDER BY `recpt_no` ASC LIMIT 1");
		   $arr1=mysql_fetch_array($data);
		     $recpt = $arr1['recpt_no'];
			 ?>
           
           <td class="success">
               <?php echo $recpt;	
          ?>
            
               </td>
	<?php
		   $data1=mysql_query("select `recpt_no` from `annl_fee` ORDER BY `recpt_no` DESC LIMIT 1");
		   $arr2=mysql_fetch_array($data1);
		      $recpt = $arr2['recpt_no'];
			 ?>
           
           <td class="danger">
               <?php echo $recpt;	
          ?>
          </td>
</tr>
<tr>
<td>Monthly Fees</td>
<?php
		   $data2=mysql_query("select `recpt_no` from `mnth_fee_1` ORDER BY `recpt_no` ASC LIMIT 1");
		   $arr2=mysql_fetch_array($data2);
		   $recpt = $arr2['recpt_no'];
			 ?>
           
           <td class="success">
               <?php echo $recpt;	
          ?>
          </td>
<?php
		   $data4=mysql_query("select `recpt_no` from `mnth_fee_1` ORDER BY `recpt_no` DESC LIMIT 1");
		   $arr2=mysql_fetch_array($data4);
		      $recpt = $arr2['recpt_no'];
			 ?>
           
           <td class="danger">
               <?php echo $recpt;	
          ?>
          </td>
</tr>
<tr>
<td>Hostel Fees</td>
<?php
$data6= mysql_query("select `rcpt_no` from `hstl_fee` ORDER BY `rcpt_no` ASC lIMIT 1");
$arr2=mysql_fetch_array($data6);
$rcpt = $arr2['rcpt_no'];
?>
<td class="success">
	<?php echo $rcpt;
	?>
    </td>
<?php
$data7= mysql_query("select `rcpt_no` from `hstl_fee` ORDER BY `rcpt_no` DESC lIMIT 1");
$arr2=mysql_fetch_array($data7);
$rcpt = $arr2['rcpt_no'];
?>
<td class="danger">
	<?php echo $rcpt;
	?>

</td>
</tr>
<tr>
<td>Caution Fees</td>
<?php
$data6= mysql_query("select `rcpt_no` from `cautn_fee` ORDER BY `rcpt_no` ASC lIMIT 1");
$arr2=mysql_fetch_array($data6);
$rcpt = $arr2['rcpt_no'];
?>
<td class="success">
	<?php echo $rcpt;
	?>
    </td>
<?php
$data7= mysql_query("select `rcpt_no` from `cautn_fee` ORDER BY `rcpt_no` DESC lIMIT 1");
$arr2=mysql_fetch_array($data7);
$rcpt = $arr2['rcpt_no'];
?>
<td class="danger">
	<?php echo $rcpt;
	?>

</td>
</tr>
</table>
</div>
</div></div></div>
<div class="col-md-6">
 <div class="portlet">
                       <div class="portlet-title">
                       <div class="caption">Fee Collection</div>
                       </div>
                           <div class="portlet-body">
                                <div class="table-responsive">     
<table class="table table-bordered">
<tr>
<th>Class</th><th>Amount</th>
</tr>
<tr>
<?php
$sel2=mysql_query("select `fee_dp` from `annl_fee`");
while($arr2=mysql_fetch_array($sel2))
{
	$amt=$arr2['fee_dp'];
	$amt1+=$amt;
}
?>
<td class="active">General Fees</td><td class="success"><?php echo $amt1; ?></td>
</tr>
<tr>
<?php
$sel1=mysql_query("select `fee_dp` from `mnth_fee_1`"); 
while($arr1=mysql_fetch_array($sel1))
{
	$amt=$arr1['fee_dp'];
	$amt2+=$amt;
}
$sel3=mysql_query("select `amt` from `adhoc_fee`");
while($arr2=mysql_fetch_array($sel3))
{
	$amt=$arr2['amt'];
	$amt2+=$amt;
}
$sel3=mysql_query("select `amt` from `nonscholler_fee`");
while($arr2=mysql_fetch_array($sel3))
{
	$amt=$arr2['amt'];
	$amt2+=$amt;
}
?>
<td class="active">Monthly Fees</td><td class="success"><?php echo $amt2;?></td>


</tr>
<tr>
<?php
$sel1=mysql_query("select `deposit` from `hstl_fee`"); 
while($arr1=mysql_fetch_array($sel1))
{
	$amt=$arr1['deposit'];
	$amt3+=$amt;
}
?>
<td class="active">Hostel Fees</td><td class="success"><?php echo $amt3;?></td>
</tr>
<tr>
<?php
$sel3=mysql_query("select `amt` from `cautn_fee`");
while($arr2=mysql_fetch_array($sel3))
{
	$amt=$arr2['amt'];
	$amt4+=$amt;
}
?>
<td class="active">Caution Fees</td><td class="success"><?php echo $amt4;?></td>
</tr>
</table>
</div>
</div>
</div></div></div>
<div class="row">
	<div class="col-md-6">
    <div class="portlet">
                       <div class="portlet-title">
                       <div class="caption">Concession Summary</div>
                       </div>
                           <div class="portlet-body">
                                <div class="table-responsive">  

<table class="table table-bordered">
<tr>
<td></td><th>No. of Students</th>
</tr>
<tr>
<td>On Lumpsum Fee Deposion</td><td></td>
</tr>
<tr>
<td>On Invoice</td><td></td>
</tr>
<tr>
<td>At the time of Fee Deposion</td><td></td>
</tr>
</table>
</div>
</div>
</div></div>
<div class="col-md-6">
 <div class="portlet">
                       <div class="portlet-title">
                       <div class="caption">Dues</div>
                       </div>
                           <div class="portlet-body">
                                <div class="table-responsive"> 
<table class="table table-bordered">
<tr>
<th>Fee type</th><th>No. of Student</th>
</tr>
<?php
$count=0;
$a=mysql_query("select * from class");
while($row=mysql_fetch_array($a))
{ 
	$cls=$row['sno'];
	
	$sr_no=0;
	
	$total=0;
	
	
	$i=0;
$sel1=mysql_query("select `id`,`schlr_no`,`hstl`,`gndr`,`bs_fc`,`md`,`strm`,`rg_dt` from `stdnt_reg` where cls='$cls' && `continoue_discontinoue_status`='0' and `rte`='No'");
while($arr1=mysql_fetch_array($sel1))
{
	$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt['id']."' && `status`='1'");
	$tc=mysql_num_rows($sel_tc);
	if(empty($tc))
	{
	$schlr_no=$arr1['schlr_no'];
	$schlr_no_id=$arr1['id'];
	$hstl=$arr1['hstl'];
	$md=$arr1['md'];
	$strm=$arr1['strm'];
	$rg_dt=$arr1['rg_dt'];
	$dt=date('Y', strtotime($rg_dt));
	
	$cur_dt=date('Y');
	$tot=0;
	$amt=0;
	$sel2=mysql_query("select `gt` from `annl_fee` where `schlr_no_id`='$schlr_no_id'");
	while($arr2=mysql_fetch_array($sel2))
	{
		@$amt=$arr2['gt'];
		@$amt1+=$amt;			
	}
	
	$dat=date("Y");
	$dat1=$dat+1;
	$d=$dat."-".$dat1;
	$sel3=mysql_query("select `id` from `cls_fee_comp_setup1` where `cls`='$cls' && `strm`='$strm' && `medium`='$md'");
	$arr3=mysql_fetch_array($sel3);
	$id=$arr3['id'];
	$sel_ft=mysql_query("select * from `fee_type`");
	while($arr_ft=mysql_fetch_array($sel_ft))
	{
		if($session==$adm)
		{
			$sel3=mysql_query("select * from cls_fee_comp_setup3 where setup1_id='$id'  && fee_type='".$arr_ft['sno']."'");
			while($arr3=mysql_fetch_array($sel3))
			{
				$tot+=$arr3['amt'];
			}
		}
		else
		{
			if('Year'==$arr_ft['cat'])
			{
				$sel3=mysql_query("select * from cls_fee_comp_setup3 where setup1_id='$id'  && fee_type='".$arr_ft['sno']."'");
				while($arr3=mysql_fetch_array($sel3))
				{
					$tot+=$arr3['amt'];
				}
			}
		}
	}

	
	$amt_due=$tot-$amt;
	if(!empty($amt_due))
	{
		$count++;
	}
}
}

	
}
		
	
?>
<tr>
<td>General Fees</td><td><?php echo $count;?></td>
</tr>
<tr>
<?php
$count_due=0;
$a=mysql_query("select * from `class`");
while($row=mysql_fetch_array($a))
{ 
	$cls=$row['sno'];
	$mnth_count='';
	$total=0;
	
$sel1=mysql_query("select `id`,`schlr_no`,`hstl`,`gndr`,`bs_fc`,`md`,`strm`,`rg_dt` from `stdnt_reg` where cls='$cls' && `continoue_discontinoue_status`='0' and `rte`='No'");
while($arr1=mysql_fetch_array($sel1))
{
	$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr1['id']."' && `status`='1'");
	$tc=mysql_num_rows($sel_tc);
	if(empty($tc))
	{
	$amt1=0;
	$schlr_no=$arr1['schlr_no'];
	$schlr_no_id=$arr1['id'];
	$bus_station=$arr1['bus_station'];
	$hstl=$arr1['hstl'];
	$gndr=$arr1['gndr'];
	$bs_fc=$arr1['bs_fc'];
	$md=$arr1['md'];
	$strm=$arr1['strm'];
	
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
		 $mnth_name[]=date('M' ,strtotime($arr_mnthcode['month_full_name']));
	}
}

	
if(is_array($mnth_id))
{
	$nonattendees = array_diff($diff_month, $mnth_id);
	foreach ($nonattendees as $valid)
	{
		 $sel_mnthcode=mysql_query("select * from `mnth_code` where `id`='".$valid."'");
		 $arr_mnthcode=mysql_fetch_array($sel_mnthcode);
		 $mnth_name[]=date('M' ,strtotime($arr_mnthcode['month_full_name']));
		
	}
}
		/////////////// Due Amount /////////
		$sel=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id'");
		while($t4=mysql_fetch_array($sel))
		{
			$ft=$t4['m_f_c'];
			$amt=$t4['amt'];
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
								if($mn == $i) {   $tot+=$amt;}
								else 
								{ 
									 $tot+=0;
								} 
							}
						 }
					}
					 
					
					
				}
			}
			if(!empty($tot))
			{
				break;
			}
		}



	$amt_due=$tot;
	if($amt_due>0)
	{
		$count_due++;
		
	}
}
}

}

	?>

<tr>

<td>Monthly Fees</td><td><?php echo $count_due;?></td>
</tr>
<?php
$count=0;
$a=mysql_query("select * from class");
while($row=mysql_fetch_array($a))
{ 
	$cls=$row['sno'];

	$sr_no=0;
	
	$total=0;
	
	$i=0;
 $sel1=mysql_query("select `id`,`schlr_no`,`hstl`,`gndr`,`bs_fc`,`md`,`strm`,`rg_dt` from `stdnt_reg` where cls='$cls' && `hstl`='Yes' && `continoue_discontinoue_status`='0' and `rte`='No'");
 while($arr1=mysql_fetch_array($sel1))
 {
	$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt['id']."' && `status`='1'");
	$tc=mysql_num_rows($sel_tc);
	if(empty($tc))
	{
	$schlr_no=$arr1['schlr_no'];
	$schlr_no_id=$arr1['id'];
	$gender=$arr1['gndr'];
	$hstl=$arr1['hstl'];
	$md=$arr1['md'];
	$strm=$arr1['strm'];
	$rg_dt=$arr1['rg_dt'];
	if($gender == 'Male'){
		$gender_type = 'boy';
	}else{
		$gender_type = 'girls';
	}
	$sel2=mysql_query("select amount from hstl_fee where schlr_no_id='$schlr_no_id'");
	@$amt1=0;
	while($arr2=mysql_fetch_array($sel2))
	{
	@$amt=$arr2['amount'];
	@$amt1+=@$amt;
	}
	
	$rg_dt_year_c=date("Y", strtotime($rg_dt));
	$rg_dt_year_n=$rg_dt_year_c+1;
	$rg_dt_year=$rg_dt_year_c."-".$rg_dt_year_n;
	
		if($rg_dt_year==$session)
		{
			 $status=1;
		}
		else 
		{
			$status=2;
		}
	
	$sel4=mysql_query("select total from hstl_fee_setup where session='$session' && class='$cls' && `status`='$status' && `gender_type`='$gender_type'");
	$arr4=mysql_fetch_array($sel4);
	$hstl_amt=$arr4['total'];
	$amt_due=@$hstl_amt-@$amt1;
	if($amt_due>0)
	{
		$count++;
	}
	
}
}
	
}
?>
<tr>
<td>Hostel Fees</td><td><?php echo $count;?></td>
</tr>
<?php
$count=0;
$a=mysql_query("select * from class");
while($row=mysql_fetch_array($a))
{ 
	$cls=$row['sno'];
	
	$sr_no=0;

	$total=0;
		
		
	$sel1=mysql_query("select `id`,`schlr_no`,`hstl`,`gndr`,`bs_fc`,`md`,`strm`,`rg_dt` from `stdnt_reg` where cls='$cls' && `continoue_discontinoue_status`='0' and `rte`='No'");
	while($arr1=mysql_fetch_array($sel1))
	{
		$i=0;
		$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt['id']."' && `status`='1'");
		$tc=mysql_num_rows($sel_tc);
		if(empty($tc))
		{
			$amt=0;
			$schlr_no=$arr1['schlr_no'];
			$schlr_no_id=$arr1['id'];
			$hstl=$arr1['hstl'];
			$md=$arr1['md'];
			$strm=$arr1['strm'];
			$sel2=mysql_query("select amt from cautn_fee where schlr_no_id='$schlr_no_id'");
			$arr2=mysql_fetch_array($sel2);
			
			@$amt=$arr2['amt'];
		
			$sel4=mysql_query("select amt from caution_fee_setup where class='$cls'");
			$arr4=mysql_fetch_array($sel4);
			$ctn_amt=$arr4['amt'];
			$amt_due=@$ctn_amt-@$amt;
			if($amt_due>0)
			{
				$count++;
			}
		}
	}
			
}


?>
<tr>
<td>Caution Fees</td><td><?php echo $count;?></td>
</tr>
</table>
</div>
</div>
</div></div></div>
                  
								</div>
								
							</div>