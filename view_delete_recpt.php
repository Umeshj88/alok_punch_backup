<?php
require_once("function.php");
require_once("conn.php");

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
css();
?>

</head>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
<?php
nevibar_menu();
?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
            <div align="center" style="width:100%; height:20%">
          
            </div>
<form class="form-signin" method="POST" id="frm1" > 


  <?php
   
if(!empty($_POST['view']))
{
  $current_date=date("Y-m-d");	
  $fromm=$_POST['from'];
  $too=$_POST['to'];

		
		$from=date("Y-m-d", strtotime($fromm));
		$to=date("Y-m-d", strtotime($too));

	 $chk=$_POST['check2'];
	 if (is_array($chk))
	{
		
		foreach ($chk as $value)
		{
			
		
			
		if($value==1)
		{
			$grand_total=0;
				$sel_delete_adhoc_fee=mysql_query("select * from `delete_annl_fee` where `del_date`>='$from' &&  `del_date`<='$to' " );
				$ftc_delete_adhoc_fee=mysql_num_rows($sel_delete_adhoc_fee);


if($ftc_delete_adhoc_fee>0)
{
	?>

<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-trash-o"></i>Delete Annaul Fee Recept
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								
							</div>
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
<th>
								#
								</th>
								<th>
									 Schlar No
								</th>
                                
								<th>
									Name
								</th>
								<th>
									 Delete Date
								</th>
                                <th>
									Recept no
								</th>
								
								<th>Fee Type
									 
								</th>
                           
                                  <th>Reason 
									 
								</th>
                                <th>
									 Amount
								</th>
							</tr>
							</thead>
							<tbody>
                            <?php
							$sel_delete_adhoc_fee=mysql_query("select * from `delete_annl_fee` where `del_date`>='$from' &&  `del_date`<='$to' " );
							 $ftc_delete_adhoc_fee=mysql_num_rows($sel_delete_adhoc_fee);
							 while($ftc_delete_adhoc_fee=mysql_fetch_array($sel_delete_adhoc_fee))
							 {
								 $i++;
								 	$schlr_no_id=$ftc_delete_adhoc_fee['schlr_no_id'];
									$id=$ftc_delete_adhoc_fee['id'];
									$sel_stdnt_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'  " );
									$ftc_stdnt_reg=mysql_fetch_array($sel_stdnt_reg);
									$fname=$ftc_stdnt_reg['fname'];
									$mname=$ftc_stdnt_reg['mname'];
									$lname=$ftc_stdnt_reg['lname'];
									$schlr_no=$ftc_stdnt_reg['schlr_no'];
									
									
									$amt=$ftc_delete_adhoc_fee['fee_dp'];
									$del_date=$ftc_delete_adhoc_fee['del_date'];
									//$fee_type=$ftc_delete_adhoc_fee['fee_type'];
									$date=$ftc_delete_adhoc_fee['date'];
									$rcpt_no=$ftc_delete_adhoc_fee['recpt_no'];
									$reason=$ftc_delete_adhoc_fee['reason'];
									
									$grand_total+=$amt;
							 ?>
								<tr >
								<td>
									<?php echo $i; ?>
								</td>
								<td>
									<?php echo $schlr_no; ?>
								</td>
                                <td>
									<?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?>								</td>
								<td>
									<?php echo date('d-m-Y', strtotime($del_date)); ?>
								</td>
								<td>
									 	<?php echo $rcpt_no; ?>
								</td>
								
								<td>
										<?php 
										$fee_type='';
										$sel_ann_fee=mysql_query("select * from `delete_annl_fee1` where `annl_fee_id`='".$id."' && `fee`>'0'");
									while($arr_ann_fee=mysql_fetch_array($sel_ann_fee))
									{
										$sel_ft=mysql_query("select * from fee_type where sno='".$arr_ann_fee['fee_type']."'");
										$arr_ft=mysql_fetch_array($sel_ft);
										$fee_type[]=$arr_ft['type'];
									} 
									echo implode($fee_type);
									?>
								</td>
                                <td>
										<?php echo $reason; ?>
								</td>
                                <td align="right">
								<?php echo $amt; ?>
                                </td>
							</tr>
	<?php
							 }
							?>
                            <tr>
                            <td colspan="7" align="center"><h4><strong>Grand Total</strong></h4></td><td align="right"><h4><strong><?php echo $grand_total; ?></strong></h4></td>
                            </tr>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
                
                <?php
}

		}
		
		else if($value==2)
		{
			$i=0;
			$grand_total=0;
			$sel_delete_adhoc_fee=mysql_query("select * from `delete_mnth_fee_1` where `del_date`>='$from' &&  `del_date`<='$to' " );
		 $ftc_delete_adhoc_fee=mysql_num_rows($sel_delete_adhoc_fee);
		 $sel_old_d=mysql_query("select * from `delete_old_fee_submit` where `del_date`>='$from' &&  `del_date`<='$to'  && `fee_type`='1'");
		 $ftc_delete_old_d=mysql_num_rows($sel_old_d);
if($ftc_delete_adhoc_fee>0 || $ftc_delete_old_d>0)
{
			?>

<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-trash-o"></i>Delete Monthly Fee Recept
							</div>
                            <div class="tools">
								<a href="javascript:;" class="collapse"></a>
								
							</div>
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
<th>
								#
								</th>
								<th>
									 Schlar No
								</th>
                                
								<th>
									Name
								</th>
								<th>
									 Delete Date
								</th>
                                <th>
									Recept no
								</th>
								
								<th>Fee Type
									 
								</th>
                           
                                  <th>Reason 
									 
								</th>
                                <th>
									 Amount
								</th>
							</tr>
							</thead>
							<tbody>
                            <?php
							$sel_delete_adhoc_fee=mysql_query("select * from `delete_mnth_fee_1` where `del_date`>='$from' &&  `del_date`<='$to' " );
							$ftc_delete_adhoc_fee=mysql_num_rows($sel_delete_adhoc_fee);
							while($ftc_delete_adhoc_fee=mysql_fetch_array($sel_delete_adhoc_fee))
							{
								 $i++;
								 $schlr_no_id=$ftc_delete_adhoc_fee['schlr_no_id'];
								  $sno=$ftc_delete_adhoc_fee['sno'];
								$sel_stdnt_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'  " );
								$ftc_stdnt_reg=mysql_fetch_array($sel_stdnt_reg);
								$fname=$ftc_stdnt_reg['fname'];
								$mname=$ftc_stdnt_reg['mname'];
								$lname=$ftc_stdnt_reg['lname'];
								$schlr_no=$ftc_stdnt_reg['schlr_no'];
								
								
								$amt=$ftc_delete_adhoc_fee['fee_dp'];
								$del_date=$ftc_delete_adhoc_fee['del_date'];
							//	$fee_type=$ftc_delete_adhoc_fee['fee_type'];
								$date=$ftc_delete_adhoc_fee['date'];
								$rcpt_no=$ftc_delete_adhoc_fee['recpt_no'];
								$reason=$ftc_delete_adhoc_fee['reason'];
								$grand_total+=$amt;
							 ?>
								<tr >
								<td>
									<?php echo $i; ?>
								</td>
								<td>
									<?php echo $schlr_no; ?>
								</td>
                                <td>
									<?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?>								</td>
								<td>
									<?php echo date('d-m-Y', strtotime($del_date)); ?>
								</td>
								<td>
									 	<?php echo $rcpt_no; ?>
								</td>
								
								<td>
                                
										<?php 
										$fee_type='';
										$sel_mnth_fee_2=mysql_query("select * from `delete_mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0' && `fee`>'0'");
										while($arr_mnth_fee_2=mysql_fetch_array($sel_mnth_fee_2))
										{
											$sel_ft=mysql_query("select * from fee_type where sno='".$arr_mnth_fee_2['fee_type']."'");
											$arr_ft=mysql_fetch_array($sel_ft);
											
											$fee_type[]=$arr_ft['type'];
										} 
										echo implode($fee_type);
									?>
								</td>
                                <td>
										<?php echo $reason; ?>
								</td>
                                <td align="right">
										<?php echo $amt; ?>
								</td>
							</tr>
	<?php
							 }
							 
							 $sel_old=mysql_query("select * from `delete_old_fee_submit` where `del_date`>='$from' &&  `del_date`<='$to' && `fee_type`='1'");
							 while($arr_old=mysql_fetch_array($sel_old))
							 {
								  $i++;
								 $schlr_no_id=$arr_old['schlr_no_id'];
								 
								$sel_stdnt_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'  " );
								$ftc_stdnt_reg=mysql_fetch_array($sel_stdnt_reg);
								$fname=$ftc_stdnt_reg['fname'];
								$mname=$ftc_stdnt_reg['mname'];
								$lname=$ftc_stdnt_reg['lname'];
								$schlr_no=$ftc_stdnt_reg['schlr_no'];
								
								
								$amt=$arr_old['fee_dp'];
								$del_date=$arr_old['del_date'];
								$fee_type=$arr_old['fee_type'];
								$date=$arr_old['date'];
								$rcpt_no=$arr_old['rcpt_no'];
								$reason=$arr_old['reason'];
								$grand_total+=$amt;
								?>
								<tr>
								<td>
									<?php echo $i; ?>
								</td>
								<td>
									<?php echo $schlr_no; ?>
								</td>
                                <td>
									<?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?></td>
								<td>
									<?php echo date('d-m-Y', strtotime($del_date)); ?>
								</td>
								<td>
									 	<?php echo $rcpt_no; ?>
								</td>
                                <td>
                                Monthly Fee
                                </td>
                                 <td>
										<?php echo $reason; ?>
								</td>
                                <td align="right">
										<?php echo $amt; ?>
								</td>
							</tr>
							<?php
							 }
							?>
                            <tr>
                            <td colspan="7" align="center"><h4><strong>Grand Total</strong></h4></td><td align="right"><h4><strong><?php echo $grand_total; ?></strong></h4></td>
                            </tr>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				

</div>                <?php
		
}
}
		
		else if($value==3)
		{
		 $grand_total=0;
		 $i=0;
		 $sel_delete_adhoc_fee=mysql_query("select * from `delete_hstl_fee` where `del_date`>='$from' &&  `del_date`<='$to'");
		 $ftc_delete_adhoc_fee=mysql_num_rows($sel_delete_adhoc_fee);
		 
		 $sel_old_d=mysql_query("select * from `delete_old_fee_submit` where `del_date`>='$from' &&  `del_date`<='$to' && `fee_type`='2'");
		 $ftc_delete_old_d=mysql_num_rows($sel_old_d);
		if($ftc_delete_adhoc_fee>0 || $ftc_delete_old_d>0)
		{

		?>

<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-trash-o"></i>Delete Hostel Fee Recept
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								
							</div>
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<th>
								#
								</th>
								<th>
									 Schlar No
								</th>
                                
								<th>
									Name
								</th>
								<th>
									 Delete Date
								</th>
                                <th>
									Recept no
								</th>
								
								<th>Fee Type
									 
								</th>
                           
                                  <th>Reason 
									 
								</th>
                                <th>
									 Amount
								</th>
							</tr>
							</thead>
							<tbody>
                            <?php
							$sel_delete_adhoc_fee=mysql_query("select * from `delete_hstl_fee` where `del_date`>='$from' &&  `del_date`<='$to' " );
		 					$ftc_delete_adhoc_fee=mysql_num_rows($sel_delete_adhoc_fee);
							 while($ftc_delete_adhoc_fee=mysql_fetch_array($sel_delete_adhoc_fee))
							 {
								 $i++;
								 $schlr_no_id=$ftc_delete_adhoc_fee['schlr_no_id'];
								$sel_stdnt_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'  " );
								$ftc_stdnt_reg=mysql_fetch_array($sel_stdnt_reg);
								$fname=$ftc_stdnt_reg['fname'];
								$mname=$ftc_stdnt_reg['mname'];
								$lname=$ftc_stdnt_reg['lname'];
								$schlr_no=$ftc_stdnt_reg['schlr_no'];
								
								
								$amt=$ftc_delete_adhoc_fee['deposit'];
								$del_date=$ftc_delete_adhoc_fee['del_date'];
								
								$date=$ftc_delete_adhoc_fee['date'];
								$rcpt_no=$ftc_delete_adhoc_fee['rcpt_no'];
								$reason=$ftc_delete_adhoc_fee['reason'];
								$grand_total+=$amt;
							 ?>
								<tr >
								<td>
									<?php echo $i; ?>
								</td>
								<td>
									<?php echo $schlr_no; ?>
								</td>
                                <td>
									<?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?>								</td>
								<td>
									<?php echo date('d-m-Y', strtotime($del_date)); ?>
								</td>
								<td>
									 	<?php echo $rcpt_no; ?>
								</td>
								
								<td>
										Hostel Fee
								</td>
                                <td>
										<?php echo $reason; ?>
								</td>
                                <td align="right">
								<?php echo $amt; ?>
                                </td>
							</tr>
	<?php
							 }
							  $sel_old=mysql_query("select * from `delete_old_fee_submit` where `del_date`>='$from' &&  `del_date`<='$to' && `fee_type`='2'");
							 while($arr_old=mysql_fetch_array($sel_old))
							 {
								  $i++;
								 $schlr_no_id=$arr_old['schlr_no_id'];
								 
								$sel_stdnt_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'  " );
								$ftc_stdnt_reg=mysql_fetch_array($sel_stdnt_reg);
								$fname=$ftc_stdnt_reg['fname'];
								$mname=$ftc_stdnt_reg['mname'];
								$lname=$ftc_stdnt_reg['lname'];
								$schlr_no=$ftc_stdnt_reg['schlr_no'];
								
								
								$amt=$arr_old['fee_dp'];
								$del_date=$arr_old['del_date'];
								$fee_type=$arr_old['fee_type'];
								$date=$arr_old['date'];
								$rcpt_no=$arr_old['rcpt_no'];
								$reason=$arr_old['reason'];
								$grand_total+=$amt;
								?>
								<tr>
								<td>
									<?php echo $i; ?>
								</td>
								<td>
									<?php echo $schlr_no; ?>
								</td>
                                <td>
									<?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?></td>
								<td>
									<?php echo date('d-m-Y', strtotime($del_date)); ?>
								</td>
								<td>
									 	<?php echo $rcpt_no; ?>
								</td>
                                <td>
										Hostel Fee
								</td>
                                 <td>
										<?php echo $reason; ?>
								</td>
                                <td align="right">
										<?php echo $amt; ?>
								</td>
							</tr>
							<?php
							 }
							
							?>
                            <tr>
                        <td colspan="7" align="center"><h4><strong>Grand Total</strong></h4></td><td align="right"><h4><strong><?php echo $grand_total; ?></strong></h4></td>
                        </tr>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
                <?php

}
}
		
else if($value==4)
{
$i=0;
$grand_total=0;
 $sel_delete_adhoc_fee=mysql_query("select * from `delete_cautn_fee` where `del_date`>='$from' &&  `del_date`<='$to' " );
 $ftc_delete_adhoc_fee=mysql_num_rows($sel_delete_adhoc_fee);
 if($ftc_delete_adhoc_fee>0)
 {			

 ?>

 <div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-trash-o"></i>Delete Caution Fee Recept
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								
							</div>
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
<th>
								#
								</th>
								<th>
									 Schlar No
								</th>
                                
								<th>
									Name
								</th>
								<th>
									 Delete Date
								</th>
                                <th>
									Recept no
								</th>
								
								<th>Fee Type
									 
								</th>
                           
                                  <th>Reason 
									 
								</th>
                                <th>
									 Amount
								</th>
							</tr>
							</thead>
							<tbody>
                            <?php
							$sel_delete_adhoc_fee=mysql_query("select * from `delete_cautn_fee` where `del_date`>='$from' &&  `del_date`<='$to' " );
		 					$ftc_delete_adhoc_fee=mysql_num_rows($sel_delete_adhoc_fee);
							 while($ftc_delete_adhoc_fee=mysql_fetch_array($sel_delete_adhoc_fee))
							 {
								 $i++;
								 $schlr_no_id=$ftc_delete_adhoc_fee['schlr_no_id'];
								$sel_stdnt_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'  " );
								$ftc_stdnt_reg=mysql_fetch_array($sel_stdnt_reg);
								$fname=$ftc_stdnt_reg['fname'];
								$mname=$ftc_stdnt_reg['mname'];
								$lname=$ftc_stdnt_reg['lname'];
								$schlr_no=$ftc_stdnt_reg['schlr_no'];
								
								
								$amt=$ftc_delete_adhoc_fee['amt'];
								$del_date=$ftc_delete_adhoc_fee['del_date'];
								$date=$ftc_delete_adhoc_fee['date'];
								$rcpt_no=$ftc_delete_adhoc_fee['rcpt_no'];
								$reason=$ftc_delete_adhoc_fee['reason'];
								$grand_total+=$amt;
							 ?>
								<tr >
								<td>
									<?php echo $i; ?>
								</td>
								<td>
									<?php echo $schlr_no; ?>
								</td>
                                <td>
									<?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?>								</td>
								<td>
									<?php echo date('d-m-Y', strtotime($del_date)); ?>
								</td>
								<td>
									 	<?php echo $rcpt_no; ?>
								</td>
								
								<td>
										Caution Fee
								</td>
                                <td>
										<?php echo $reason; ?>
								</td>
                                <td align="right">
								<?php echo $amt; ?>
                                </td>
							</tr>
	<?php
							 }
							?>
                            <tr>
                            <td colspan="7" align="center"><h4><strong>Grand Total</strong></h4></td><td align="right"><h4><strong><?php echo $grand_total; ?></strong></h4></td>
                            </tr>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
<?php

}
}
		
else if($value==5)
{
			
$i=0;
$grand_total=0;
		$sel_delete_adhoc_fee=mysql_query("select * from `delete_adhoc_fee` where `del_date`>='$from' &&  `del_date`<='$to' " );
		 $ftc_delete_adhoc_fee=mysql_num_rows($sel_delete_adhoc_fee);
		if($ftc_delete_adhoc_fee>0)
		{


?>

<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-trash-o"></i>Delete Adhoc Fee Recept
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								
							</div>
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
<th>
								#
								</th>
								<th>
									 Schlar No
								</th>
                                
								<th>
									Name
								</th>
								<th>
									 Delete Date
								</th>
                                <th>
									Recept no
								</th>
								
								<th>Fee Type
									 
								</th>
                           
                                  <th>Reason 
									 
								</th>
                                <th>
									 Amount
								</th>
							</tr>
							</thead>
							<tbody>
                            <?php
							$sel_delete_adhoc_fee=mysql_query("select * from `delete_adhoc_fee` where `del_date`>='$from' &&  `del_date`<='$to' " );
		 					$ftc_delete_adhoc_fee=mysql_num_rows($sel_delete_adhoc_fee);
							 while($ftc_delete_adhoc_fee=mysql_fetch_array($sel_delete_adhoc_fee))
							 {
								 $i++;
								 $schlr_no_id=$ftc_delete_adhoc_fee['schlr_no_id'];
								$sel_stdnt_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'");
								$ftc_stdnt_reg=mysql_fetch_array($sel_stdnt_reg);
								$fname=$ftc_stdnt_reg['fname'];
								$mname=$ftc_stdnt_reg['mname'];
								$lname=$ftc_stdnt_reg['lname'];
								$schlr_no=$ftc_stdnt_reg['schlr_no'];
								
								
								$amt=$ftc_delete_adhoc_fee['amt'];
								$del_date=$ftc_delete_adhoc_fee['del_date'];
								$fee_type=$ftc_delete_adhoc_fee['fee_type'];
								$date=$ftc_delete_adhoc_fee['date'];
								$rcpt_no=$ftc_delete_adhoc_fee['rcpt_no'];
								$reason=$ftc_delete_adhoc_fee['reason'];
								$grand_total+=$amt;
							 ?>
								<tr >
								<td>
									<?php echo $i; ?>
								</td>
								<td>
									<?php echo $schlr_no; ?>
								</td>
                                <td>
									<?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?>								</td>
								<td>
									<?php echo date('d-m-Y', strtotime($del_date)); ?>
								</td>
								<td>
									 	<?php echo $rcpt_no; ?>
								</td>
								
								<td>
										<?php 
										$sel_ft=mysql_query("select * from fee_type where sno='".$ftc_delete_adhoc_fee['fee_type']."'");
											$arr_ft=mysql_fetch_array($sel_ft);
											
											echo $fee_type=$arr_ft['type'];
											 ?>
								</td>
                                <td>
										<?php echo $reason; ?>
								</td>
                                <td align="right">
								<?php echo $amt; ?>
                                </td>
							</tr>
	<?php
							 }
							 
							 $sel_delete_adhoc_fee=mysql_query("select * from `delete_nonscholler_fee` where `del_date`>='$from' &&  `del_date`<='$to' " );
		 					$ftc_delete_adhoc_fee=mysql_num_rows($sel_delete_adhoc_fee);
							 while($ftc_delete_adhoc_fee=mysql_fetch_array($sel_delete_adhoc_fee))
							 {
								 $i++;
								
								
								$detail=$ftc_delete_adhoc_fee['detail'];
								
								
								$amt=$ftc_delete_adhoc_fee['amt'];
								$del_date=$ftc_delete_adhoc_fee['del_date'];
								$fee_type=$ftc_delete_adhoc_fee['fee_type'];
								$date=$ftc_delete_adhoc_fee['date'];
								$rcpt_no=$ftc_delete_adhoc_fee['rcpt_no'];
								$reason=$ftc_delete_adhoc_fee['reason'];
								$grand_total+=$amt;
							 ?>
								<tr >
								<td>
									<?php echo $i; ?>
								</td>
								<td>
									
								</td>
                                <td>
									<?php echo $detail; ?> </td>
								<td>
									<?php echo date('d-m-Y', strtotime($del_date)); ?>
								</td>
								<td>
									 	<?php echo $rcpt_no; ?>
								</td>
								
								<td>
										<?php 
										$sel_ft=mysql_query("select * from fee_type where sno='".$ftc_delete_adhoc_fee['fee_type']."'");
											$arr_ft=mysql_fetch_array($sel_ft);
											
											echo $fee_type=$arr_ft['type'];
											 ?>
								</td>
                                <td>
										<?php echo $reason; ?>
								</td>
                                <td align="right">
								<?php echo $amt; ?>
                                </td>
							</tr>
	<?php
							 }
							 
							?>
                            <tr>
                            <td colspan="7" align="center"><h4><strong>Grand Total</strong></h4></td><td align="right"><h4><strong><?php echo $grand_total; ?></strong></h4></td>
                            </tr>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
<?php
		}

		}
		}
	}

}
           
    ?>          
    </form>
			
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
footer();  js();
?>

</body>
<!-- END BODY -->
</html>