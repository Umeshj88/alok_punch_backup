<?php
require_once("conn.php");
include("authentication.php");
require_once("function.php");
$fee_type=$_GET['fee_type'];
$r2=$_GET['r2'];
$date_from=date('Y-m-d', strtotime($_GET['from']));
$date_to=date('Y-m-d', strtotime($_GET['to']));
?>
<html>
<head>
<title>Concession List | <?php title();?></title>
<?php
logo();
 print_css(); ?>
</head>
<body class="white-color-display">
<table style="width:100%;">
<tr><th style="font-size:16px"> 

<?php
if($fee_type==1)
{
	echo ' Concession List (General Fee)';
}
else if($fee_type==2)
{
	echo ' Concession List (monthly Fee)';
}
else if($fee_type==3)
{
	echo ' Concession List (Hostel Fee)';
}
?>

 </th></tr>
</table>
<?php
if($r2==1)
{
	
	$sel_class=mysql_query("select `sno`,`cls` from `class`");
	while($arr_class=mysql_fetch_array($sel_class))
	{
		$class=$arr_class['sno'];
		$class_name=$arr_class['cls'];
		$sel_strmm=mysql_query("select * from `stream`");
		while($arr_strmm=mysql_fetch_array($sel_strmm))
		{
			$k=0;
			$total=0;
			$i=0;
			$sel_stdnt=mysql_query("select * from stdnt_reg where cls='$class' && strm='".$arr_strmm['sno']."'");
			while($arr_stdnt=mysql_fetch_array($sel_stdnt))
			{
			
				$schlr_no=$arr_stdnt['schlr_no'];
				$schlr_no_id=$arr_stdnt['id'];
				$nm=$arr_stdnt['fname'];
				$lnm=$arr_stdnt['lname'];
				$f_nm=$arr_stdnt['f_name'];
			
				
				if($fee_type==1)
				{
					$sel_annl_fee=mysql_query("select `cncssn`,`gt`,`fee_dp`,`dat`,`recpt_no` from `annl_fee` where `schlr_no_id`='".$arr_stdnt['id']."' && `dat`>='$date_from' && `dat`<='$date_to'");
					while($arr_annl_fee=mysql_fetch_array($sel_annl_fee))
					{
						 $total+=$arr_annl_fee['cncssn'];
						
						if($k==0 && !empty($arr_annl_fee['cncssn']))
						{ $k++; ?>
							
							<div style="float:left">
							 <table  class="table" style="width:100%;">
							<tr><th align="left">Class : </th><td><?php echo $class_name; ?></td><th align="left">Stream : </th><td><?php echo $arr_strmm['strm']; ?></td></tr>
							</table>
                            </div>
                             <div style="float:right">
							 <table  class="table" style="width:100%;">
							<tr><th align="right">Date : </th><td><?php echo date('d-M-Y'); ?></td></tr>
							</table>
                            </div>
							<table  class="table table-bordered" style="width:100%;">
							<thead>
							<tr>
							<th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Date</th><th>Receipt No.</th><th>Orig. Amount</th><th>Actual Amount</th><th>Concession Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
						}
						if(!empty($arr_annl_fee['cncssn']))
						{
							?>
							 <tr>
                             <td align="center"><?php echo ++$i; ?></td>
							<td align="center"><?php echo $schlr_no; ?></td>
							<td align="left"><?php echo $nm." ".$lnm; ?></td>
							<td align="left"><?php echo $f_nm; ?></td>
                             <td align="right"><?php echo date('d-m-Y', strtotime($arr_annl_fee['dat'])); ?></td>
                            <td align="right"><?php echo $arr_annl_fee['recpt_no']; ?></td>
                             <td align="right"><?php echo $arr_annl_fee['gt']; ?></td>
                            <td align="right"><?php echo $arr_annl_fee['fee_dp']; ?></td>
							<td align="right"><?php echo $arr_annl_fee['cncssn']; ?></td>
						
							</tr>
							<?php
						}
					}
				}
				else if($fee_type==2)
				{
					$sel_mnth_fee_1=mysql_query("select `cncssn`,`gt`,`fee_dp`,`dat`,`recpt_no` from `mnth_fee_1` where `schlr_no_id`='".$arr_stdnt['id']."' && `dat`>='$date_from' && `dat`<='$date_to'");
					while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
					{
						 $total+=$arr_mnth_fee_1['cncssn'];
						
						if($k==0 && !empty($arr_mnth_fee_1['cncssn']))
						{ $k++; ?>
							
							<div style="float:left">
							 <table  class="table" style="width:100%;">
							<tr><th align="left">Class : </th><td align="left"><?php echo $class_name; ?></td><th align="left">Stream : </th><td><?php echo $arr_strmm['strm']; ?></td></tr>
							</table>
                            </div>
                            <div style="float:right">
							 <table  class="table" style="width:100%;">
							<tr><th align="right">Date : </th><td><?php echo date('d-M-Y'); ?></td></tr>
							</table>
                            </div>
							<table  class="table table-bordered" style="width:100%;">
							<thead>
							<tr>
							<th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Date</th><th>Receipt No.</th><th>Orig. Amount</th><th>Actual Amount</th><th>Concession Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
						}
						if(!empty($arr_mnth_fee_1['cncssn']))
						{
							?>
							 <tr>
							 <td align="center"><?php echo ++$i; ?></td>
							<td align="center"><?php echo $schlr_no; ?></td>
							<td align="left"><?php echo $nm." ".$lnm; ?></td>
							<td align="left"><?php echo $f_nm; ?></td>
                             <td align="right"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['dat'])); ?></td>
                            <td align="right"><?php echo $arr_mnth_fee_1['recpt_no']; ?></td>
                            <td align="right"><?php echo $arr_mnth_fee_1['gt']; ?></td>
                            <td align="right"><?php echo $arr_mnth_fee_1['fee_dp']; ?></td>
							<td align="right"><?php echo $arr_mnth_fee_1['cncssn']; ?></td>
						
							</tr>
							<?php
						}
					}
					
					$sel_old=mysql_query("select * from `old_fee_submit`  where `schlr_no_id`='".$arr_stdnt['id']."' && `date`>='$date_from' &&  `date`<='$date_to' && `fee_type`='1'");
					 while($arr_old=mysql_fetch_array($sel_old))
					 {
						  
						
						  $total+=$arr_old['cncssn'];
						  if($k==0 && !empty($arr_old['cncssn']))
						{ $k++; ?>
							
							<div style="float:left">
							 <table  class="table" style="width:100%;">
							<tr><th align="left">Class : </th><td align="left"><?php echo $class_name; ?></td><th align="left">Stream : </th><td><?php echo $arr_strmm['strm']; ?></td></tr>
							</table>
                            </div>
                            <div style="float:right">
							 <table  class="table" style="width:100%;">
							<tr><th align="right">Date : </th><td><?php echo date('d-M-Y'); ?></td></tr>
							</table>
                            </div>
							<table  class="table table-bordered" style="width:100%;">
							<thead>
							<tr>
							<th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Date</th><th>Receipt No.</th><th>Orig. Amount</th><th>Actual Amount</th><th>Concession Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
						}
						if(!empty($arr_old['cncssn']))
						{
							?>
							 <tr>
							 <td align="center"><?php echo ++$i; ?></td>
							<td align="center"><?php echo $schlr_no; ?></td>
							<td align="left"><?php echo $nm." ".$lnm; ?></td>
							<td align="left"><?php echo $f_nm; ?></td>
                             <td align="right"><?php echo date('d-m-Y', strtotime($arr_old['date'])); ?></td>
                            <td align="right"><?php echo $arr_old['rcpt_no']; ?></td>
                            <td align="right"><?php echo $arr_old['amt']; ?></td>
                            <td align="right"><?php echo $arr_old['fee_dp']; ?></td>
							<td align="right"><?php echo $arr_old['cncssn']; ?></td>
						
							</tr>
							<?php
						}
							
					 }
				}
				else if($fee_type==3)
				{
					$sel_hstl_fee=mysql_query("select `cncsn`,`amount`,`deposit`,`dat`,`rcpt_no` from `hstl_fee` where `schlr_no_id`='".$arr_stdnt['id']."' && `dat`>='$date_from' && `dat`<='$date_to'");
					while($arr_hstl_fee=mysql_fetch_array($sel_hstl_fee))
					{
						 $total+=$arr_hstl_fee['cncsn'];
						
						if($k==0 && !empty($arr_hstl_fee['cncsn']))
						{ $k++; ?>
							
							 <div style="float:left">
							 <table  class="table" style="width:100%;">
							<tr><th align="left">Class : </th><td><?php echo $class_name; ?></td><th align="left">Stream : </th><td><?php echo $arr_strmm['strm']; ?></td></tr>
							</table>
                            </div>
                             <div style="float:right">
							 <table  class="table" style="width:100%;">
							<tr><th align="right">Date : </th><td><?php echo date('d-M-Y'); ?></td></tr>
							</table>
                            </div>
							<table  class="table table-bordered" style="width:100%;">
							<thead>
							<tr>
							<th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Date</th><th>Receipt No.</th><th>Orig. Amount</th><th>Actual Amount</th><th>Concession Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
						}
						if(!empty($arr_hstl_fee['cncsn']))
						{
							?>
							 <tr>
							 <td align="center"><?php echo ++$i; ?></td>
							<td align="center"><?php echo $schlr_no; ?></td>
							<td align="left"><?php echo $nm." ".$lnm; ?></td>
							<td align="left"><?php echo $f_nm; ?></td>
                             <td align="right"><?php echo date('d-m-Y', strtotime($arr_hstl_fee['dat'])); ?></td>
                            <td align="right"><?php echo $arr_hstl_fee['rcpt_no']; ?></td>
                            <td align="right"><?php echo $arr_hstl_fee['amount']; ?></td>
                            <td align="right"><?php echo $arr_hstl_fee['deposit']; ?></td>
							<td align="right"><?php echo $arr_hstl_fee['cncsn']; ?></td>
						
							</tr>
							<?php
						}
					}
					$sel_old=mysql_query("select * from `old_fee_submit`  where `schlr_no_id`='".$arr_stdnt['id']."' && `date`>='$date_from' &&  `date`<='$date_to' && `fee_type`='2'");
					 while($arr_old=mysql_fetch_array($sel_old))
					 {
						  
						
						  $total+=$arr_old['cncssn'];
						  if($k==0 && !empty($arr_old['cncssn']))
						{ $k++; ?>
							
							<div style="float:left">
							 <table  class="table" style="width:100%;">
							<tr><th align="left">Class : </th><td align="left"><?php echo $class_name; ?></td><th align="left">Stream : </th><td><?php echo $arr_strmm['strm']; ?></td></tr>
							</table>
                            </div>
                            <div style="float:right">
							 <table  class="table" style="width:100%;">
							<tr><th align="right">Date : </th><td><?php echo date('d-M-Y'); ?></td></tr>
							</table>
                            </div>
							<table  class="table table-bordered" style="width:100%;">
							<thead>
							<tr>
							<th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Date</th><th>Receipt No.</th><th>Orig. Amount</th><th>Actual Amount</th><th>Concession Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
						}
						if(!empty($arr_old['cncssn']))
						{
							?>
							 <tr>
							 <td align="center"><?php echo ++$i; ?></td>
							<td align="center"><?php echo $schlr_no; ?></td>
							<td align="left"><?php echo $nm." ".$lnm; ?></td>
							<td align="left"><?php echo $f_nm; ?></td>
                             <td align="right"><?php echo date('d-m-Y', strtotime($arr_old['date'])); ?></td>
                            <td align="right"><?php echo $arr_old['rcpt_no']; ?></td>
                            <td align="right"><?php echo $arr_old['amt']; ?></td>
                            <td align="right"><?php echo $arr_old['fee_dp']; ?></td>
							<td align="right"><?php echo $arr_old['cncssn']; ?></td>
						
							</tr>
							<?php
						}
							
					 }
				}
		
		}
		if($k==1)
		{$k=0;
			$grand_total+=$total;
				?>
				<tr><th colspan="8" align="right"> Total Amount &nbsp;&nbsp;</th><td align="right"><strong><?php echo $total; ?></strong></td></tr>
				</tbody>
				</table>
				<br/><hr style="color:#000;" /><br/>
				<?php
				$total=0;
				$i=0;
			}
				
			
		
	}
	}
	?>
    <table   class="table table-bordered" style="width:100%;">
    <tr><th align="center" style="font-size:20px;"> <strong>Grand Total</strong></td><td align="right" style="font-size:20px;"><strong><?php echo $grand_total; ?></strong></td></tr>
	</table>
    <?php
			
}
else if($r2==2)
{
	$class=$_GET['class'];
	$k=0; $total=0;
	$i=0;
	$sel_cls=mysql_query("select * from `class` where `sno`='$class'");
	$arr_cls=mysql_fetch_array($sel_cls);
	$class_name=$arr_cls['cls'];
	
	$sel_strmm=mysql_query("select * from `stream`");
	while($arr_strmm=mysql_fetch_array($sel_strmm))
	{
	$sel_stdnt=mysql_query("select * from stdnt_reg where cls='$class' && strm='".$arr_strmm['sno']."'");
	while($arr_stdnt=mysql_fetch_array($sel_stdnt))
	{
		
		$schlr_no=$arr_stdnt['schlr_no'];
		$schlr_no_id=$arr_stdnt['id'];
		$nm=$arr_stdnt['fname'];
		$lnm=$arr_stdnt['lname'];
		$f_nm=$arr_stdnt['f_name'];
		
		if($fee_type==1)
				{
					$sel_annl_fee=mysql_query("select `cncssn`,`gt`,`fee_dp`,`dat`,`recpt_no` from `annl_fee` where `schlr_no_id`='".$arr_stdnt['id']."' && `dat`>='$date_from' && `dat`<='$date_to'");
					while($arr_annl_fee=mysql_fetch_array($sel_annl_fee))
					{
						 $sno=$arr_annl_fee['sno'];
						 $total+=$arr_annl_fee['cncssn'];
						
						if($k==0 && !empty($arr_annl_fee['cncssn']))
						{ $k++; ?>
							
							 <div style="float:left">
							 <table  class="table" style="width:100%;">
							<tr><th align="left">Class : </th><td><?php echo $class_name; ?></td><th align="left">Stream : </th><td><?php echo $arr_strmm['strm']; ?></td></tr>
							</table>
                            </div>
                             <div style="float:right">
							 <table  class="table" style="width:100%;">
							<tr><th align="right">Date : </th><td><?php echo date('d-M-Y'); ?></td></tr>
							</table>
                            </div>
							<table  class="table table-bordered" style="width:100%;">
							<thead>
							<tr>
							<th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Date</th><th>Receipt No.</th><th>Orig. Amount</th><th>Actual Amount</th><th>Concession Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
						}
						if(!empty($arr_annl_fee['cncssn']))
						{
							?>
							 <tr>
                             <td align="center"><?php echo ++$i; ?></td>
							<td align="center"><?php echo $schlr_no; ?></td>
							<td align="left"><?php echo $nm." ".$lnm; ?></td>
							<td align="left"><?php echo $f_nm; ?></td>
                            <td align="right"><?php echo date('d-m-Y', strtotime($arr_annl_fee['dat'])); ?></td>
                            <td align="right"><?php echo $arr_annl_fee['recpt_no']; ?></td>
                             <td align="right"><?php echo $arr_annl_fee['gt']; ?></td>
                            <td align="right"><?php echo $arr_annl_fee['fee_dp']; ?></td>
							<td align="right"><?php echo $arr_annl_fee['cncssn']; ?></td>
						
							</tr>
							<?php
						}
					}
				}
				else if($fee_type==2)
				{
					$sel_mnth_fee_1=mysql_query("select `cncssn`,`gt`,`fee_dp`,`dat`,`recpt_no` from `mnth_fee_1` where `schlr_no_id`='".$arr_stdnt['id']."' && `dat`>='$date_from' && `dat`<='$date_to'");
					while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
					{
						 $total+=$arr_mnth_fee_1['cncssn'];
						
						if($k==0 && !empty($arr_mnth_fee_1['cncssn']))
						{ $k++; ?>
							<div style="float:left">
							 <table  class="table" style="width:100%;">
							<tr><th align="left">Class : </th><td align="left"><?php echo $class_name; ?></td><th align="left">Stream : </th><td><?php echo $arr_strmm['strm']; ?></td></tr>
							</table>
                            </div>
                            <div style="float:right">
							 <table  class="table" style="width:100%;">
							<tr><th align="right">Date : </th><td><?php echo date('d-M-Y'); ?></td></tr>
							</table>
                            </div>
							<table  class="table table-bordered" style="width:100%;">
							<thead>
							<tr>
							<th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Date</th><th>Receipt No.</th><th>Orig. Amount</th><th>Actual Amount</th><th>Concession Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
						}
						if(!empty($arr_mnth_fee_1['cncssn']))
						{
							?>
							 <tr>
							 <td align="center"><?php echo ++$i; ?></td>
							<td align="center"><?php echo $schlr_no; ?></td>
							<td align="left"><?php echo $nm." ".$lnm; ?></td>
							<td align="left"><?php echo $f_nm; ?></td>
                           <td align="right"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['dat'])); ?></td>
                            <td align="right"><?php echo $arr_mnth_fee_1['recpt_no']; ?></td>
                            <td align="right"><?php echo $arr_mnth_fee_1['gt']; ?></td>
                            <td align="right"><?php echo $arr_mnth_fee_1['fee_dp']; ?></td>
							<td align="right"><?php echo $arr_mnth_fee_1['cncssn']; ?></td>
						
							</tr>
							<?php
						}
					}
					$sel_old=mysql_query("select * from `old_fee_submit`  where `schlr_no_id`='".$arr_stdnt['id']."' && `date`>='$date_from' &&  `date`<='$date_to' && `fee_type`='1'");
					 while($arr_old=mysql_fetch_array($sel_old))
					 {
						  
						
						  $total+=$arr_old['cncssn'];
						  if($k==0 && !empty($arr_old['cncssn']))
						{ $k++; ?>
							
							<div style="float:left">
							 <table  class="table" style="width:100%;">
							<tr><th align="left">Class : </th><td align="left"><?php echo $class_name; ?></td><th align="left">Stream : </th><td><?php echo $arr_strmm['strm']; ?></td></tr>
							</table>
                            </div>
                            <div style="float:right">
							 <table  class="table" style="width:100%;">
							<tr><th align="right">Date : </th><td><?php echo date('d-M-Y'); ?></td></tr>
							</table>
                            </div>
							<table  class="table table-bordered" style="width:100%;">
							<thead>
							<tr>
							<th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Date</th><th>Receipt No.</th><th>Orig. Amount</th><th>Actual Amount</th><th>Concession Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
						}
						if(!empty($arr_old['cncssn']))
						{
							?>
							 <tr>
							 <td align="center"><?php echo ++$i; ?></td>
							<td align="center"><?php echo $schlr_no; ?></td>
							<td align="left"><?php echo $nm." ".$lnm; ?></td>
							<td align="left"><?php echo $f_nm; ?></td>
                             <td align="right"><?php echo date('d-m-Y', strtotime($arr_old['date'])); ?></td>
                            <td align="right"><?php echo $arr_old['rcpt_no']; ?></td>
                            <td align="right"><?php echo $arr_old['amt']; ?></td>
                            <td align="right"><?php echo $arr_old['fee_dp']; ?></td>
							<td align="right"><?php echo $arr_old['cncssn']; ?></td>
						
							</tr>
							<?php
						}
							
					 }
				}
				else if($fee_type==3)
				{
					$sel_hstl_fee=mysql_query("select `cncsn`,`amount`,`deposit`,`dat`,`rcpt_no` from `hstl_fee` where `schlr_no_id`='".$arr_stdnt['id']."' && `dat`>='$date_from' && `dat`<='$date_to'");
					while($arr_hstl_fee=mysql_fetch_array($sel_hstl_fee))
					{
						 $total+=$arr_hstl_fee['cncsn'];
						
						if($k==0 && !empty($arr_hstl_fee['cncsn']))
						{ $k++; ?>
							<div style="float:left">
							 <table  class="table" style="width:100%;">
							<tr><th align="left">Class : </th><td><?php echo $class_name; ?></td><th align="left">Stream : </th><td><?php echo $arr_strmm['strm']; ?></td></tr>
							</table>
                            </div>
                             <div style="float:right">
							 <table  class="table" style="width:100%;">
							<tr><th align="right">Date : </th><td><?php echo date('d-M-Y'); ?></td></tr>
							</table>
                            </div>
							<table  class="table table-bordered" style="width:100%;">
							<thead>
							<tr>
							<th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Date</th><th>Receipt No.</th><th>Orig. Amount</th><th>Actual Amount</th><th>Concession Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
						}
						if(!empty($arr_hstl_fee['cncsn']))
						{
							?>
							 <tr>
							 <td align="center"><?php echo ++$i; ?></td>
							<td align="center"><?php echo $schlr_no; ?></td>
							<td align="left"><?php echo $nm." ".$lnm; ?></td>
							<td align="left"><?php echo $f_nm; ?></td>
                             <td align="right"><?php echo date('d-m-Y', strtotime($arr_hstl_fee['dat'])); ?></td>
                            <td align="right"><?php echo $arr_hstl_fee['rcpt_no']; ?></td>
                             <td align="right"><?php echo $arr_hstl_fee['amount']; ?></td>
                            <td align="right"><?php echo $arr_hstl_fee['deposit']; ?></td>
							<td align="right"><?php echo $arr_hstl_fee['cncsn']; ?></td>
							</tr>
							<?php
						}
					}
					$sel_old=mysql_query("select * from `old_fee_submit`  where `schlr_no_id`='".$arr_stdnt['id']."' && `date`>='$date_from' &&  `date`<='$date_to' && `fee_type`='2'");
					 while($arr_old=mysql_fetch_array($sel_old))
					 {
						  
						
						  $total+=$arr_old['cncssn'];
						  if($k==0 && !empty($arr_old['cncssn']))
						{ $k++; ?>
							
							<div style="float:left">
							 <table  class="table" style="width:100%;">
							<tr><th align="left">Class : </th><td align="left"><?php echo $class_name; ?></td><th align="left">Stream : </th><td><?php echo $arr_strmm['strm']; ?></td></tr>
							</table>
                            </div>
                            <div style="float:right">
							 <table  class="table" style="width:100%;">
							<tr><th align="right">Date : </th><td><?php echo date('d-M-Y'); ?></td></tr>
							</table>
                            </div>
							<table  class="table table-bordered" style="width:100%;">
							<thead>
							<tr>
							<th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Date</th><th>Receipt No.</th><th>Orig. Amount</th><th>Actual Amount</th><th>Concession Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
						}
						if(!empty($arr_old['cncssn']))
						{
							?>
							 <tr>
							 <td align="center"><?php echo ++$i; ?></td>
							<td align="center"><?php echo $schlr_no; ?></td>
							<td align="left"><?php echo $nm." ".$lnm; ?></td>
							<td align="left"><?php echo $f_nm; ?></td>
                             <td align="right"><?php echo date('d-m-Y', strtotime($arr_old['date'])); ?></td>
                            <td align="right"><?php echo $arr_old['rcpt_no']; ?></td>
                            <td align="right"><?php echo $arr_old['amt']; ?></td>
                            <td align="right"><?php echo $arr_old['fee_dp']; ?></td>
							<td align="right"><?php echo $arr_old['cncssn']; ?></td>
						
							</tr>
							<?php
						}
							
					 }
				}
				
		
	}
		if($k==1)
		{
			$k=0;
			$grand_total+=$total;
			
			?>
			<tr><th colspan="8" align="right"> Total Amount &nbsp;&nbsp;</td><td align="right"><strong><?php echo $total; ?></strong></td></tr>
			</tbody>
			</table>
           
			<?php
			$total=0;
			$i=0;
		}
	}
?>
    <table   class="table table-bordered" style="width:100%;">
    <tr><th align="center" style="font-size:20px;"> <strong>Grand Total</strong></td><td align="right" style="font-size:20px;"><strong><?php echo $grand_total; ?></strong></td></tr>
	</table>
    <?php
}