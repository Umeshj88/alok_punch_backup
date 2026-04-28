<?php
require_once("conn.php");

@$r1=$_GET['r1'];
$c1=$_GET['s_fee'];
@$cls=$_GET['cls'];
$det=$_GET['det'];
$summ=$_GET['summ'];
$dp1=$_GET['dp1'];
$dp2=$_GET['dp2'];
$d1=date("d-M-Y", strtotime($dp1));
$d2=date("d-M-Y", strtotime($dp2));
$ndt=date("Y-m-d", strtotime($dp1));
$cdt=date("Y-m-d", strtotime($dp2));

if(!empty($cls))
{
	$condition=" && stdnt_reg.cls='".$cls."'";
}
else
{
	$condition='';
}

// Convert to UNIX timestamps
$currentTime = strtotime($ndt);
$endTime = strtotime($cdt);


$year1 = date('Y', $currentTime);
$year2 = date('Y', $endTime);

$month1 = date('m', $currentTime);
$month2 = date('m', $endTime);

$count = (($year2 - $year1) * 12) + ($month2 - $month1) + 1;
$to_date= cal_days_in_month(CAL_GREGORIAN, $month, $year);
?>
<link href="assets/css/print_page.css" rel="stylesheet" type="text/css"/>
 <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>

<h3 style="text-align:center">Component Wise Collection</h3>
<?php
if(!empty($cls))
{
	$sel_cls=mysql_query("select `cls` from `class` where `sno`='".$cls."'");
	$arr_cls=mysql_fetch_array($sel_cls);
	?>
    <h3 style="text-align:center"><?php echo $arr_cls['cls']; ?></h3>
    <?php
}

?>
<b><font size="-1"><?php echo $d1 ." To ". $d2;?></font></b>


<?php
if($summ=="summary")
{
	if($c1 =="General Fees")
	{
		?>
	<table  class="table table-bordered table-hover" id="general" style="width:100%;">
	<thead>
	<tr>
	<th style="text-align:center">Date</th>
	<?php
		$sel_ft=mysql_query("select * from `fee_type` where `cat`='Admission' or `cat`='Year'");
		while($arr_ft=mysql_fetch_array($sel_ft))
		{
		?>
		<th><?php echo $arr_ft['type']; ?></th>
		<?php } ?>
         <th style="text-align:center">Total</th>
		</tr>
		</thead>
        <?php
		$grand_total=0;
        $start    = new DateTime($ndt);
		$start->modify('first day of this month');
		$end= new DateTime($cdt);
		$end->modify('first day of next month');
		$interval = DateInterval::createFromDateString('1 month');
		
		$period   = new DatePeriod($start, $interval, $end);
		
		foreach ($period as $dt) 
		{
			 $month=$dt->format("m");
			 $year=$dt->format("Y");
			 $month_year=$dt->format("m-Y");
			 $month_name=date("F", strtotime($year."-".$month."-01"));
			 $days= cal_days_in_month(CAL_GREGORIAN, $month, $year);
			 $end_date=$days."-".$month_year;
			 $start_date="1-".$month_year;
			 $tr_id++;
			 echo '<tr id='.$tr_id.'><td>'.$month_name.'</td>';
			$num=0;
			$total=0;
			/////////////////////////////////////////////////
			$dat_start=date("m-Y", strtotime($ndt));
			$dat_end=date("m-Y", strtotime($cdt));
			if($month_year==$dat_start && $month_year==$dat_end)
			{
				$currentTime = strtotime($ndt);
				$endTime = strtotime($cdt);
			}
			else if($month_year==$dat_start)
			{
				$currentTime = strtotime($ndt);
				$endTime = strtotime($end_date);
			}
			else if($month_year==$dat_end)
			{
				$currentTime = strtotime($start_date);
				$endTime = strtotime($cdt);
			}
			else
			{
				$currentTime = strtotime($start_date);
				$endTime = strtotime($end_date);
			}
				
			$result = array();
			while ($currentTime <= $endTime) 
			{
			  if (date('N', $currentTime) < 8) 
			  {
				$result[] = date('Y-m-d', $currentTime);
			  }
			  $currentTime = strtotime('+1 day', $currentTime);
			}	
			
			////////////////////////////////////
			$sel_ft_di=mysql_query("select * from `fee_type` where `cat`='Admission' or `cat`='Year'");
			$num_ft_di=mysql_num_rows($sel_ft_di);
			while($arr_ft_di=mysql_fetch_array($sel_ft_di))
			{
				$cncssn=0;
				$fyn=0;
				$num++;
				
				foreach ( $result as $date )
				{
					$date_day=$date;
				  
					$sel2=mysql_query("select annl_fee.cncssn,annl_fee.fyn,annl_fee.id from annl_fee,stdnt_reg where annl_fee.dat='$date_day' && annl_fee.schlr_no_id=stdnt_reg.id  $condition");
					while($arr2=mysql_fetch_array($sel2))
					{
						$cncssn+=$arr2['cncssn'];
						$fyn+=$arr2['fyn'];
						$sel1=mysql_query("select * from annl_fee1 where fee_type='".$arr_ft_di['sno']."' && `annl_fee_id`='".$arr2['id']."'");
						while($arr1=mysql_fetch_array($sel1))
						{
							$fee=$arr1['fee'];
							$tot+=$fee;
						}
					}
					
				}
				if($num==$num_ft_di)
				{
					if(!empty($tot))
					{
					$tot=($tot+$fyn)-$cncssn;
					}
					echo '<td align="right">'.$tot.'</td>';
					$total+=$tot;
					$tot=0;
				}
				else
				{
					if(!empty($tot))
					{
					$tot=($tot+$fyn)-$cncssn;
					}
					echo '<td align="right">'.$tot.'</td>';
					$total+=$tot;
					$tot=0;
				}
			}
			$grand_total+=$total;
			echo '<td align="right">'.$total.'</td>';
			echo '</tr>';
			 if(empty($total))
			{
				?>
				<script type="text/javascript">
				$( document ).ready(function() {
					$("#<?php echo $tr_id; ?>").remove();
				});
				</script>
				<?php
			}
		}
		?>
		
    
    
    <tr id="last_gen_tr">
    <th style="text-align:center"  colspan=""><font size="+1">Total</font></th>
    <?php
	$tot_td=$num_ft_di;
	for($td=1; $td<=$tot_td; $td++)
	{
		?>
        <td style="text-align:right;" id="ver_id<?php echo $td; ?>"><strong>
		<script type="text/javascript">
			$( document ).ready(function() {
				var td_data=0;
				$("#general >tbody >tr").each(function()
				{
					if(this.id != 'last_gen_tr')
					{	 
						td_data+=eval($(this).find('td:eq(<?php echo $td; ?>)').html());
					}
					
				});
				$('#ver_id<?php echo $td; ?>').text(td_data);
			});
			</script>
            
			</strong></td>
        <?php
	}
	?>
    <th style="text-align:right;"><font size="+1"><?php echo $grand_total; ?></font></th>
    </tr>
    
    
    
     </table>
    <?php
	}


			?>
		

  <?php
if($c1=="Monthly Fees")
{
	?>
    <table  class="table table-bordered table-hover" id="monthly" style="width:100%;">
    <thead>
    <tr>
    <th  style="text-align:center" rowspan="2">Date</th>
    <?php
    $sel_ft=mysql_query("select distinct ledger_component_type from `fee_type` where `cat`='Regular' && `ledger_component_type`!=''");
    while($arr_ft=mysql_fetch_array($sel_ft))
    {
    ?>
    <th  style="text-align:center" rowspan="2"><?php echo $arr_ft['ledger_component_type']; ?></th>
    <?php } 
	$sel_ft=mysql_query("select `type` from `fee_type` where `cat`='Adhoc'");
	$num_ft=mysql_num_rows($sel_ft);?>
    <th  style="text-align:center" colspan="<?php echo $num_ft; ?>">Adhoc</th>
    <th  style="text-align:center" rowspan="2">Total</th>
    </tr>
    <tr>
    <?php
     
    while($arr_ft=mysql_fetch_array($sel_ft))
    {
    ?>
    <th  style="text-align:center"><?php echo $arr_ft['type']; ?></th>
    <?php } ?>
    </tr>
    </thead>
    <?php
	

	$grand_total=0;
	$start    = new DateTime($ndt);
	$start->modify('first day of this month');
	$end= new DateTime($cdt);
	$end->modify('first day of next month');
	$interval = DateInterval::createFromDateString('1 month');
	
	$period   = new DatePeriod($start, $interval, $end);
	
	foreach ($period as $dt) 
	{
		 $month=$dt->format("m");
		 $year=$dt->format("Y");
		 $month_year=$dt->format("m-Y");
	 	 $month_name=date("F", strtotime($year."-".$month."-01"));
		 $days= cal_days_in_month(CAL_GREGORIAN, $month, $year);
		 $end_date=$days."-".$month_year;
		 $start_date="1-".$month_year;
		 $tr_id++;
		 echo '<tr id='.$tr_id.'><td>'.$month_name.'</td>';
		$num=0;
		$total=0;
		/////////////////////////////////////////////////
		$dat_start=date("m-Y", strtotime($ndt));
		$dat_end=date("m-Y", strtotime($cdt));
		if($month_year==$dat_start && $month_year==$dat_end)
		{
			$currentTime = strtotime($ndt);
			$endTime = strtotime($cdt);
		}
		else if($month_year==$dat_start)
		{
			$currentTime = strtotime($ndt);
			$endTime = strtotime($end_date);
		}
		else if($month_year==$dat_end)
		{
			$currentTime = strtotime($start_date);
			$endTime = strtotime($cdt);
		}
		else
		{
			$currentTime = strtotime($start_date);
			$endTime = strtotime($end_date);
		}
			
		$result = array();
		while ($currentTime <= $endTime) 
		{
		  if (date('N', $currentTime) < 8) 
		  {
			$result[] = date('Y-m-d', $currentTime);
		  }
		  $currentTime = strtotime('+1 day', $currentTime);
		}	
		
		////////////////////////////////////
		$sel_ft_di=mysql_query("select distinct ledger_component_type from `fee_type` where `cat`='Regular' && `ledger_component_type`!=''");
		$num_ft_di=mysql_num_rows($sel_ft_di);
		while($arr_ft_di=mysql_fetch_array($sel_ft_di))
		{
			$cncssn=0;
			$fyn=0;
			$num++;
			
			foreach ( $result as $date )
			{
			    $date_day=$date;
			  
			  	$sel_ft=mysql_query("select * from `fee_type` where `ledger_component_type`='".$arr_ft_di['ledger_component_type']."'");
				while($arr_ft=mysql_fetch_array($sel_ft))
				{
					
					$sel1=mysql_query("select mnth_fee2.fee from mnth_fee2,mnth_fee_1,stdnt_reg where mnth_fee2.dat='$date_day' && mnth_fee2.fee_type='".$arr_ft['sno']."' && mnth_fee2.left='0' && mnth_fee2.mnth_fee1_sno=mnth_fee_1.sno && mnth_fee_1.schlr_no_id=stdnt_reg.id  $condition");
					while($arr1=mysql_fetch_array($sel1))
					{ 
						$fee=$arr1['fee'];
						$tot+=$fee;
					}
				}
				if($arr_ft_di['ledger_component_type']=='Tution Fee')
				{
					$sel_submit=mysql_query("select old_fee_submit.fee_dp from old_fee_submit,stdnt_reg where  old_fee_submit.date='$date_day' && old_fee_submit.schlr_no_id=stdnt_reg.id && old_fee_submit.fee_type='1' $condition");
					while($arr_submit=mysql_fetch_array($sel_submit))
					{
						 $fee=$arr_submit['fee_dp'];
						$tot+=$fee;
					}
				}
				if($num==1)
				{
					$sel_mnth_fee_1=mysql_query("select mnth_fee_1.cncssn,mnth_fee_1.fyn from mnth_fee_1,stdnt_reg where mnth_fee_1.dat='$date_day' && mnth_fee_1.schlr_no_id=stdnt_reg.id  $condition");
					while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
					{
						$cncssn+=$arr_mnth_fee_1['cncssn'];
						$fyn+=$arr_mnth_fee_1['fyn'];
					}
				}
			}
			 if($num==1)
			{
				$tot=($tot+$fyn)-$cncssn;
				echo '<td align="right">'.$tot.'</td>';
				$total+=$tot;
				$tot=0;
			}
			else
			{ 
				
				echo '<td align="right">'.$tot.'</td>';
				$total+=$tot;
				$tot=0;
			}
		} 
		
		$sel_ft_f=mysql_query("select `sno` from `fee_type` where `cat`='Adhoc'");
   		while($arr_ft_f=mysql_fetch_array($sel_ft_f))
    	{
    	 
			foreach ( $result as $date )
			{
				$date_day=$date;
				
				$sel1=mysql_query("select adhoc_fee.amt from adhoc_fee,stdnt_reg where adhoc_fee.date='$date_day' && adhoc_fee.fee_type='".$arr_ft_f['sno']."' && adhoc_fee.schlr_no_id=stdnt_reg.id  $condition");
				while($arr1=mysql_fetch_array($sel1))
				{
					$fee=$arr1['amt'];
					$tot+=$fee;
				}
				$sel1=mysql_query("select nonscholler_fee.amt from nonscholler_fee where nonscholler_fee.date='$date_day' && nonscholler_fee.fee_type='".$arr_ft_f['sno']."'");
				while($arr1=mysql_fetch_array($sel1))
				{
					$fee=$arr1['amt'];
					$tot+=$fee;
				}
				
			}
			echo '<td align="right">'.$tot.'</td>';
			$total+=$tot;
			$tot=0;
		}
		
		
		echo '<td align="right">'.$total.'</td>';
		$grand_total+=$total;
		echo '</tr>';
		if(empty($total))
		{
			?>
			<script type="text/javascript">
			$( document ).ready(function() {
				$("#<?php echo $tr_id; ?>").remove();
			});
			</script>
			<?php
		}
	}
	
	?>
 <tr id="last_monthly_tr">
    <th style="text-align:center"  colspan=""><font size="+1">Total</font></th>
    <?php
	$tot_td=$num_ft_di+$num_ft;
	for($td=1; $td<=$tot_td; $td++)
	{
		?>
        <td style="text-align:right; font-size:15px" id="ver_id<?php echo $td; ?>">
		<script type="text/javascript">
			$( document ).ready(function() {
				var td_data=0;
				$("#monthly >tbody >tr").each(function()
				{
					if(this.id != 'last_monthly_tr')
					{	 
						td_data+=eval($(this).find('td:eq(<?php echo $td; ?>)').html());
					}
					
				});
				$('#ver_id<?php echo $td; ?>').text(td_data);
			});
			</script>
            </td>
        <?php
	}
	?>
    <th style="text-align:right;"><font size="+1"><?php echo $grand_total; ?></font></th>
    </tr>
     </table>
    <?php
} 

 ?> 

   <?php
 if($c1=="Hostel Fees"){
	 ?>
     <table  class="table table-bordered table-hover" id="hostel" style="width:100%;">
<thead>
     <tr><th style="text-align:center">Date</th><th style="text-align:center">Hostel Fees</th></tr></thead>
<?php
$grand_total=0;
for($mnth=1; $mnth<=$count; $mnth++)
{
			$cnt=0;
			$month11=date("F", strtotime($ndt));
			$tr_id++;
			echo '<tr id='.$tr_id.'><td>'.$month11.'</td>';
				$tot=0;
				$currentTime = strtotime($ndt);
				$endTime = strtotime($cdt);
				$result = array();
				while ($currentTime <= $endTime) {
				  if (date('N', $currentTime) < 8) {
					$result[] = date('Y-m-d', $currentTime);
				  }
				  $currentTime = strtotime('+1 day', $currentTime);
				}	
				foreach($result as $value)
				{
					$i=$value;
					$month=date("F", strtotime($i));
					 $dat=date("m-d-Y", strtotime($i));
				
					$sel1=mysql_query("select hstl_fee.deposit from hstl_fee,stdnt_reg where hstl_fee.dat='$i' && hstl_fee.schlr_no_id=stdnt_reg.id $condition");
					while($arr1=mysql_fetch_array($sel1))
					{
						$fee=$arr1['deposit'];
						$tot+=$fee;
					}
					
					$sel_submit=mysql_query("select old_fee_submit.fee_dp from old_fee_submit,stdnt_reg where  old_fee_submit.date='$i' && old_fee_submit.schlr_no_id=stdnt_reg.id && old_fee_submit.fee_type='2' $condition");
					while($arr_submit=mysql_fetch_array($sel_submit))
					{
						 $fee=$arr_submit['fee_dp'];
						$tot+=$fee;
					}
					$last_day_this_month  = date('m-t-Y', strtotime($i));
					if($last_day_this_month==$dat)
					{
							 $date = strtotime("+1 day", strtotime($i));
							$ndt =date("Y-m-d", $date);
							goto nex2;
					}
				}
				nex2:
				echo '<td align="right">'.$tot.'</td>';
				$grand_total+=$tot;
				$tot=0;
				
				echo '</tr>';
				if(empty($grand_total))
				{
					?>
					<script type="text/javascript">
					$( document ).ready(function() {
						$("#<?php echo $tr_id; ?>").remove();
					});
					</script>
					<?php
				}
}
?>
 <tr>
     <th style="text-align:center"  colspan=""><font size="+1">Total</font></th><th style="text-align:right;"><font size="+1"><?php echo $grand_total; ?></font></th>
    </tr></table>
    <?php
} 
	 ?> 
    
    <br/> <?php
	
}
 if($det=="detail")
 { 
 $grand_total=0;
 $ndt=date("Y-m-d", strtotime($dp1));
$cdt=date("Y-m-d", strtotime($dp2));
 // Convert to UNIX timestamps
$currentTime = strtotime($ndt);
$endTime = strtotime($cdt);

$year1 = date('Y', $currentTime);
$year2 = date('Y', $endTime);

 $month1 = date('m', $currentTime);
 $month2 = date('m', $endTime);

 $count = (($year2 - $year1) * 12) + ($month2 - $month1) + 1;

$result = array();
while ($currentTime <= $endTime) {
  if (date('N', $currentTime) < 8) {
    $result[] = date('Y-m-d', $currentTime);
  }
  $currentTime = strtotime('+1 day', $currentTime);
}


if($c1 =="General Fees")
{ ?>
<table  class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th style="text-align:center">Date</th>
<th  style="text-align:center">Receipt No.</th>
<?php
$sel_ft=mysql_query("select * from `fee_type` where `cat`='Year' or `cat`='Admission'");
while($arr_ft=mysql_fetch_array($sel_ft))
{
?>
<th style="text-align:center"><?php echo $arr_ft['type']; ?></th>
<?php } ?>
<th style="text-align:center">Total</th>
</tr>
</thead>
<?php


foreach($result as $value)
{
	$i=$value;
	$month=date("F", strtotime($i));
	$dat=date("d-F-Y", strtotime($i));
		$total=0;	
		$num=0;
		
		$o_dat=date("d-m-Y", strtotime($i));
	 $start    = new DateTime($value);
	 $month1=$start->format("m");
	 $year1=$start->format("Y");
	 $month_year=$start->format("m-Y");
	
	 $days= cal_days_in_month(CAL_GREGORIAN, $month1, $year1);
	 $end_date=$days."-".$month_year;
		
		$tr_id++;
	echo '<tr id="detail'.$tr_id.'">';
	echo '<td>'.$dat.'</td>';echo '<td style="text-align:center;"  id="receipt'.$tr_id.'"></td>';		
if($c1 =="General Fees")
{
	$sel_ft=mysql_query("select * from `fee_type` where `cat`='Year' or `cat`='Admission'");
	 $num_ft_di=mysql_num_rows($sel_ft);
	while($arr_ft=mysql_fetch_array($sel_ft))
	{
		$cncssn=0;
		$fyn=0;
		$num++;
		$sel2=mysql_query("select annl_fee.cncssn,annl_fee.fyn,annl_fee.id,annl_fee.recpt_no from annl_fee,stdnt_reg where annl_fee.dat='$i' && annl_fee.schlr_no_id=stdnt_reg.id  $condition");
		while($arr2=mysql_fetch_array($sel2))
		{
			$cncssn+=$arr2['cncssn'];
			$fyn+=$arr2['fyn'];
			$receipt[]=$arr2['recpt_no'];
			$sel=mysql_query("select * from annl_fee1 where fee_type='".$arr_ft['sno']."' && `annl_fee_id`='".$arr2['id']."'");
			while($arr=mysql_fetch_array($sel))
			{
				$fee=$arr['fee'];
				$tot+=$fee;															
			
			}
		}
		
		if($num==$num_ft_di)
		{
			if(!empty($tot))
			{
			$tot=($tot+$fyn)-$cncssn;
			}
			echo '<td align="right">'.$tot.'</td>';
			$td_coloumn[]=$tot;
			$td_coloumn_break[]=$tot;
			$total+=$tot;
			$tot=0;
		}
		else
		{
			if(!empty($tot))
			{
			$tot=($tot+$fyn)-$cncssn;
			}
			echo '<td align="right">'.$tot.'</td>';
			$td_coloumn[]=$tot;
			$td_coloumn_break[]=$tot;
			$total+=$tot;
			$tot=0;
		}
		$cncssn=0;
	}
}	

echo '<td align="right">'.$total.'</td>';
 $grand_total+=$total;
echo '</tr>';

$month_total+=$total;
$record[$tr_id]=$td_coloumn_break;
unset($td_coloumn_break);
if(($end_date==$o_dat) && !empty($month_total))
{
	echo '<tr>';
	$tot_col=$num_ft_di+2;
	
	echo '<td style="text-align:center;" colspan="2"><strong>Total</strong></td>';
	for($ii=0; $ii<$tot_col-2; $ii++)
		{
			
			for($jj=1; $jj<=$tr_id; $jj++)
			{
				$td_tot+=$record[$jj][$ii];
			}
			echo '<td style="text-align:right"><strong>'.$td_tot.'</strong></td>';
			$td_tot=0;
		}
		unset($record);
	echo '<td style="text-align:right;"><strong>'.$month_total.'</strong></td></tr>';
	$month_total=0;
}
$max=max($receipt);
$min=min($receipt);
$recpt_print='('.$min.'-'.$max.')';
?>
	<script type="text/javascript">
	$( document ).ready(function() {
		$("#receipt<?php echo $tr_id; ?>").html('<?php echo $recpt_print; ?>');
	});
	</script>
	<?php
	
if(empty($total))
	{
		?>
        <script type="text/javascript">
        $( document ).ready(function() {
			<?php
			if(!is_array($receipt))
			{ ?>
			$("#detail<?php echo $tr_id; ?>").remove();
			<?php
			} ?>
		});
		</script>
        <?php
	}
	$records1[$tr_id]=$td_coloumn;
	unset($receipt);
	 unset($td_coloumn);
}

if(!empty($month_total))
{
	echo '<tr>';
	$tot_col=$num_ft_di+2;
	echo '<td style="text-align:center;"></td><td style="text-align:right;" colspan="'.$tot_col.'"><strong>'.$month_total.'</strong></td></tr>';
}
?>
  <tr>
    <th style="text-align:center" colspan="2"><font size="+1">Grand Total</font></th>
    <?php
	for($ii=0; $ii<$tot_col-2; $ii++)
	{
		
		for($jj=1; $jj<=$tr_id; $jj++)
		{
			$td_tot+=$records1[$jj][$ii];
		}
		echo '<td style="text-align:right"><strong>'.$td_tot.'</strong></td>';
		$td_tot=0;
	}
	
    ?>
    <th style="text-align:right;"><font size="+1"><?php echo $grand_total; ?></font></th>
    </tr>
     </table>
    <?php

}
 ?> 

  <?php
if($c1=="Monthly Fees"){
	?>
 <table  class="table table-bordered table-hover" style="width:100%;" id="table1">
    <thead>
    <tr>
    <th  style="text-align:center" rowspan="2">Date</th>
    <th  style="text-align:center" rowspan="2">Receipt No.</th>
    <?php
    $sel_ft=mysql_query("select distinct ledger_component_type from `fee_type` where `cat`='Regular' && `ledger_component_type`!=''");
    while($arr_ft=mysql_fetch_array($sel_ft))
    {
    ?>
    <th  style="text-align:center" rowspan="2"><?php echo $arr_ft['ledger_component_type']; ?></th>
    <?php } 
	$sel_ft=mysql_query("select `type` from `fee_type` where `cat`='Adhoc'");
	$num_ft=mysql_num_rows($sel_ft);?>
    <th  style="text-align:center" colspan="<?php echo $num_ft; ?>">Adhoc</th>
    <th  style="text-align:center" rowspan="2">Total</th>
    </tr>
    <tr>
    <?php
     
    while($arr_ft=mysql_fetch_array($sel_ft))
    {
    ?>
    <th  style="text-align:center"><?php echo $arr_ft['type']; ?></th>
    <?php } ?>
    </tr>
    </thead>
    <?php
	$tot=0;

	
foreach($result as $value)
{
	$i=$value;
	$total=0;
	
	$cncssn=0;
	$fyn=0;
	 $month=date("F", strtotime($i));
 	 $dat=date("d-F-Y", strtotime($i));
	 $o_dat=date("d-m-Y", strtotime($i));
	 $start    = new DateTime($value);
	 $month1=$start->format("m");
	 $year1=$start->format("Y");
	 $month_year=$start->format("m-Y");
	
	 $days= cal_days_in_month(CAL_GREGORIAN, $month1, $year1);
	 $end_date=$days."-".$month_year;
			 
	
	
		 
		 
	$tr_id++;
	echo '<tr id="detail'.$tr_id.'">';
	echo '<td style="text-align:center;">'.$dat.'</td>';
	echo '<td style="text-align:center;"  id="receipt'.$tr_id.'"></td>';
	
	$sel1=mysql_query("select mnth_fee_1.cncssn,mnth_fee_1.fyn from mnth_fee_1,stdnt_reg where mnth_fee_1.dat='$i' && mnth_fee_1.schlr_no_id=stdnt_reg.id  $condition");
	while($arr1=mysql_fetch_array($sel1))
	{
		$cncssn+=$arr1['cncssn'];
		$fyn+=$arr1['fyn'];
	}
	
	$sel_ft_di=mysql_query("select distinct ledger_component_type from `fee_type` where `cat`='Regular' && `ledger_component_type`!=''");
	$num_ft_di=mysql_num_rows($sel_ft_di);
	while($arr_ft_di=mysql_fetch_array($sel_ft_di))
	{
		$sel_ft=mysql_query("select * from `fee_type` where `ledger_component_type`='".$arr_ft_di['ledger_component_type']."'");
		while($arr_ft=mysql_fetch_array($sel_ft))
		{
			$sel1=mysql_query("select mnth_fee2.fee,mnth_fee_1.recpt_no from mnth_fee2,mnth_fee_1,stdnt_reg where mnth_fee2.dat='$i' && mnth_fee2.fee_type='".$arr_ft['sno']."' && mnth_fee2.left='0' && mnth_fee2.mnth_fee1_sno=mnth_fee_1.sno && mnth_fee_1.schlr_no_id=stdnt_reg.id  $condition");
			
			while($arr1=mysql_fetch_array($sel1))
			{
				$fee=$arr1['fee'];
				$tot+=$fee;
				$receipt[]=$arr1['recpt_no'];
			}
		}
		if($arr_ft_di['ledger_component_type']=='Tution Fee')
		{
			$sel_submit=mysql_query("select old_fee_submit.fee_dp,old_fee_submit.rcpt_no from old_fee_submit,stdnt_reg where  old_fee_submit.date='$i' && old_fee_submit.schlr_no_id=stdnt_reg.id && old_fee_submit.fee_type='1' $condition");
			while($arr_submit=mysql_fetch_array($sel_submit))
			{
				$fee=$arr_submit['fee_dp'];
				$tot+=$fee;
				$receipt[]=$arr_submit['rcpt_no'];
			}
		}
		if($arr_ft_di['ledger_component_type']=='Tution Fee')
		{
			$tot=($tot+$fyn)-$cncssn;
		}
		echo '<td align="right">'.$tot.'</td>';
		$td_coloumn[]=$tot;
		$td_coloumn_break[]=$tot;
		$total+=$tot;
		$tot=0;
	}
	
    	 
			
		$sel_ft_f=mysql_query("select `sno` from `fee_type` where `cat`='Adhoc'");
   		while($arr_ft_f=mysql_fetch_array($sel_ft_f))
    	{	
			$sel4=mysql_query("select adhoc_fee.amt,adhoc_fee.rcpt_no from adhoc_fee,stdnt_reg where adhoc_fee.date='$i' && adhoc_fee.fee_type='".$arr_ft_f['sno']."'  && adhoc_fee.schlr_no_id=stdnt_reg.id  $condition");
			while($arr4=mysql_fetch_array($sel4))
			{
				$amnt2=$arr4['amt'];
				$tot+=$amnt2;
				$receipt[]=$arr4['rcpt_no'];
			}
			$sel1=mysql_query("select nonscholler_fee.amt,nonscholler_fee.rcpt_no from nonscholler_fee where nonscholler_fee.date='$i' && nonscholler_fee.fee_type='".$arr_ft_f['sno']."'");
			while($arr1=mysql_fetch_array($sel1))
			{
				$amnt2=$arr1['amt'];
				$tot+=$amnt2;
				$receipt[]=$arr1['rcpt_no'];
			}
			echo '<td align="right">'.$tot.'</td>';
			$td_coloumn[]=$tot;
			$td_coloumn_break[]=$tot;
			$total+=$tot;
			$tot=0;
		}
	
	
	echo '<td style="text-align:right;">'.$total.'</td>';
	
	$tot=0;
	$grand_total+=$total;
	$month_total+=$total;
	echo '</tr>';
	$record[$tr_id]=$td_coloumn_break;
	unset($td_coloumn_break);
	if(($end_date==$o_dat) && !empty($month_total))
	{
		echo '<tr>';
		echo '<td style="text-align:center;" colspan="2"><strong>Total</strong></td>';
		$tot_col=$num_ft+$num_ft_di+2;
	 	
		for($ii=0; $ii<$tot_col-2; $ii++)
		{
			
			for($jj=1; $jj<=$tr_id; $jj++)
			{
				$td_tot+=$record[$jj][$ii];
			}
			echo '<td style="text-align:right"><strong>'.$td_tot.'</strong></td>';
			$td_tot=0;
		}
		unset($record);
		echo '<td style="text-align:right;"><strong>'.$month_total.'</strong></td></tr>';
		$month_total=0;
	}
	$max=max($receipt);
	$min=min($receipt);
	$recpt_print='('.$min.'-'.$max.')';
	?>
        <script type="text/javascript">
        $( document ).ready(function() {
			$("#receipt<?php echo $tr_id; ?>").html('<?php echo $recpt_print; ?>');
		});
		</script>
        <?php
		
	if(empty($total))
	{
		?>
        <script type="text/javascript">
        $( document ).ready(function() {
			<?php
			if(!is_array($receipt))
			{ ?>
			$("#detail<?php echo $tr_id; ?>").remove();
			<?php
			} ?>
		});
		</script>
        <?php
	}
	unset($receipt);
	 $records1[$tr_id]=$td_coloumn;
	 unset($td_coloumn);
}
	if(!empty($month_total))
	{
		echo '<tr>';
		$tot_col=$num_ft+$num_ft_di+2;
		echo '<td style="text-align:center;" colspan="'.$tot_col.'"></td><td style="text-align:right;"><strong>'.$month_total.'</strong></td></tr>';
	}

?>
 <tr>
    <th style="text-align:center" colspan="2"><font size="+1">Grand Total</font></th>
    <?php
	for($ii=0; $ii<$tot_col-2; $ii++)
	{
		
		for($jj=1; $jj<=$tr_id; $jj++)
		{
			$td_tot+=$records1[$jj][$ii];
		}
		echo '<th style="text-align:right"><font size="+1">'.$td_tot.'</font></th>';
		$td_tot=0;
	}
	
    ?>
    <th style="text-align:right;"><font size="+1"><?php echo $grand_total; ?></font></th>
    </tr>
     </table>

    <?php

}

 if($c1=="Hostel Fees"){
	 ?>
     <table  class="table table-bordered table-hover" style="width:100%;">
<thead>
     <tr><th>Date</th><th  style="text-align:center">Receipt No.</th><th>Hostel Fees</th></tr></thead>
     <?php
	 	$tot=0;$tot12=0;$k=0;$j=0;
 
foreach($result as $value)
{
	$i=$value;
	$month=date("F", strtotime($i));
	$dat=date("d-F-Y", strtotime($i));
	
	$o_dat=date("d-m-Y", strtotime($i));
	 $start    = new DateTime($value);
	 $month1=$start->format("m");
	 $year1=$start->format("Y");
	 $month_year=$start->format("m-Y");
	
	 $days= cal_days_in_month(CAL_GREGORIAN, $month1, $year1);
	 $end_date=$days."-".$month_year;
	 
	$tot=0;
	$tr_id++;
	echo '<tr id="detail'.$tr_id.'"><td>'.$dat.'</td>';	
	echo '<td style="text-align:center;"  id="receipt'.$tr_id.'"></td>';
	$sel2=mysql_query("select hstl_fee.deposit,hstl_fee.rcpt_no from hstl_fee,stdnt_reg where hstl_fee.dat='$i' && hstl_fee.schlr_no_id=stdnt_reg.id  $condition");
	while($arr2=mysql_fetch_array($sel2))
	{
		$amnt=$arr2['deposit'];
		$tot+=$amnt;
		$receipt[]=$arr2['rcpt_no'];
	}
	$sel_submit=mysql_query("select old_fee_submit.fee_dp,old_fee_submit.rcpt_no from old_fee_submit,stdnt_reg where  old_fee_submit.date='$i' && old_fee_submit.schlr_no_id=stdnt_reg.id && old_fee_submit.fee_type='2' $condition");
	while($arr_submit=mysql_fetch_array($sel_submit))
	{
		 $amnt=$arr_submit['fee_dp'];
		 $tot+=$amnt;
		$receipt[]=$arr_submit['rcpt_no'];
	}
		echo '<td align="right">'.$tot.'</td></tr>';
		$grand_total+=$tot;
		 $month_total+=$tot;
	if(($end_date==$o_dat) && !empty($month_total))
	{
		echo '<tr>';
		
		echo '<td style="text-align:center;"  colspan="2"><strong>Total</strong></td><td style="text-align:right;"  colspan=""><strong>'.$month_total.'</strong></td></tr>';
        $month_total=0;
	}
	$max=max($receipt);
	$min=min($receipt);
	$recpt_print='('.$min.'-'.$max.')';
	?>
	<script type="text/javascript">
    $( document ).ready(function() {
        $("#receipt<?php echo $tr_id; ?>").html('<?php echo $recpt_print; ?>');
    });
    </script>
    <?php
  
	if(empty($tot))
	{
		?>
        <script type="text/javascript">
        $( document ).ready(function() {
			<?php
			if(!is_array($receipt))
			{ ?>
			$("#detail<?php echo $tr_id; ?>").remove();
			<?php
			} ?>
		});
		</script>
        <?php
	}
	unset($receipt);

}
	if(!empty($month_total))
	{
		echo '<tr>';
		$tot_col=$num_ft+$num_ft_di+1;
		echo '<td style="text-align:right;" colspan="3"><strong>'.$month_total.'</strong></td></tr>';
	}
	?>
 <tr>
    <th style="text-align:center" colspan="2"><font size="+1">Grand Total</font></th><th style="text-align:right;"><font size="+1"><?php echo $grand_total; ?></font></th>
    </tr>
     </table>
    <?php
 }
	
	
 }
?>

