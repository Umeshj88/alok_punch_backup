<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
$schlr_no_id=$_GET['schlr_no_id'];
if(!empty($schlr_no_id))
{
	
	$sql_="select * from stdnt_reg where id='$schlr_no_id'";
	$sql=mysql_query($sql_);
	$t=mysql_fetch_array($sql);
	$cls=$t['cls'];
	$schlr_no=$t['schlr_no'];
	$document=$t['document'];
	$reg_no=$t['reg_no'];
	$adm=@$t['adm'];
	$adm_class_id = $t['adm_class_id'];
	
	$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
	$num_tc=mysql_num_rows($sel_tc);
	
	$sel1=mysql_query("select * from class where sno='$cls'");
    $arr1=mysql_fetch_array($sel1);
	$class=$arr1['cls'];
}
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
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();
$s=mysql_query("select ctn_rcpt_no from `ctn_rcpt_no`");
		$t1=mysql_fetch_array($s);
		$r=$t1['ctn_rcpt_no']+1;
		$d=date("d-m-Y");
		?>
<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
            <div align="center" style="width:100%; height:20%">
                <div id="toast-container" class="toast-top-right" >
                    <div class="toast toast-info">
                     <button class="toast-close-button">×</button>
                    	<div class="toast-message">
                      <h4> Receipt No. &nbsp;&nbsp;<?php echo $r; ?></h4>
                        </div>
                    </div>
            </div>
            <div align="center" style="width:100%; height:20%">
             <?php
			if(!empty($_GET['notdone']))
			{
				?>
                <div class="note note-success">
						<p>
							 Fees Is Not Submited Successfuly.
						</p>
					</div>
                <?php
			}
			if(!empty($_GET['recpt_delete']))
			{
				?>
                <div class="note note-success">
						<p>
							 Recept No. <?php echo $_GET['recpt_delete']; ?> Deleted Successfully.
						</p>
					</div>
                <?php
			}
			?>
            </div>
<form class="form-signin" method="POST" id="frm1" action="ctn_fee_cnn.php"> 
<div style="width:96%; margin-left:2%;">
<table width="96%">
<tr>
<td> <label> Receipt No.</label> </td>
<td> <input class="form-control" type="text" name="rcpt_no" value="<?php echo $r; ?>"> </td>

<td><label> Date</label> </td>
<td> <input class="form-control date-picker" type="text" name="date" value="<?php echo $d;?>"> </td> 

<td><label> Name</label></td>
<td> <input class="form-control" type="text" value="<?php echo $t['fname']; echo "&nbsp;"; echo $t['mname']; echo "&nbsp;"; echo $t['lname'];?>"/></td>
</tr>
<tr>
<td><label>Scholar No.</label> </td>
<td> <input class="form-control" type="text" name="schlr_no" value="<?php echo $t['schlr_no']?>"/><input class="form-control" type="hidden" name="schlr_no_id" value="<?php echo $t['id']?>"/> </td>

<td><label> Class</label> </td>
<td><input class="form-control" type="text" name="cls" value="<?php echo $class; ?>"/></td>

<td><label>Father's Name</label> </td>
<td> <input class="form-control" type="text" value="<?php echo $t['f_name'];?>"/></td>

</tr>
<?php

$sel=mysql_query("select * from caution_fee_setup where class='$cls'");
$arr=mysql_fetch_array($sel);
?>
<tr>
<td><label> Amount</label> </td>
<td> <input class="form-control" type="text" name="amt" value="<?php echo $arr['amt'];?>" readonly/> </td>
</tr>
</table></div>
<div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div>
			<b> Cheque Details</b>
		</div></div>

<table class="table " align="center" style="width:100%">
<tr>
<td><label> Chq. No.</label> </td>
<td> <input class="form-control" type="text" name="chq_no"/></td>
<td><label>Chq. Date </label></td>
<td> <input class="form-control date-picker" type="text" name="chq_dt"/></td>

<td><label> Bank</label> </td>
<td> <input class="form-control" type="text" name="bank"/></td>
<td><label>Remarks </label></td>
<td> <input class="form-control" type="text"/></td>
</tr>
</table></div>
<div style="width:100%; text-align:center">
<button class="btn btn-default" name="back" type="submit" ><i class="fa fa-arrow-circle-left"></i> Back</button>
<button class="btn btn-success" name="save" type="submit"><i class="fa fa-save"></i> Save</button> 
<button class="btn btn-success" name="save_print" type="submit"><i class="fa fa-print"></i> Save and Print</button>
<a class="btn btn-info" href="#wide" data-toggle="modal"><i class="fa fa-paperclip"></i> Show Previous Detail</a> 
</div>
</form>
 <form  method="POST" name="form_print" action="recept_print.php">
    <div style="display: none;" class="modal fade" id="wide" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Caution Fee Receipt</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                    <th>Sr. No.</th>
                    <th>Recept No.</th>
                    <th>Date Of Payment</th>
                    <th>Amount Paid</th>
                    </tr>
                    </thead>
                    <tbody>
                     <input class="form-control" type="hidden" name="schlr_no_recept" value="<?php echo @$schlr_no_id; ?>"/>
                    <?PHP
                    $ii=0;
                    $sel_cautn_fee_1=mysql_query("select * from `cautn_fee` where `schlr_no_id`='".$schlr_no_id."'");
                    while($arr_cautn_fee_1=mysql_fetch_array($sel_cautn_fee_1))
                    {
                        $ii++;
                        ?>
                        <tr>
                        <td><label style="width:100%;"><input type="radio" name="recept_no" value="<?php echo $arr_cautn_fee_1['rcpt_no'];?>"></label></td>
                        <td><?php echo $arr_cautn_fee_1['rcpt_no'];?></td>
                         <td><?php echo $arr_cautn_fee_1['date'];?></td>
                          <td><?php echo $arr_cautn_fee_1['amt'];?></td>
                        </tr>
                        <?php
                    
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="cautn_print" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                    <button class="btn btn-danger" data-toggle="modal" href="#stack2"><i class="fa fa-trash-o"></i> Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
     <div style="display: none;" class="modal fade" id="stack2" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-stack2">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Caution Fee Delete Receipt</h4>
                </div>
                <div class="modal-body">
                	 <b>Remarks </b> <input class="form-control " style="width:250px" name="reason"  type="text" value="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                    <button type="submit" name="cautn_delete" class="btn btn-info">Confirm</button>
                </div>
             </div>
       </div>
    </div>
                            
    </form>
			
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
footer();
js();

	$sel=mysql_query("select admsn_doc_id from cls_admsn_doc where class_id='$adm_class_id'");
	$arr=mysql_fetch_array($sel);	
	$ad_id=$arr['admsn_doc_id'];
	$data=explode(',' , $ad_id);
	$data_match=explode(',' , $document);
	
	$pending=array_diff($data,$data_match);
	
	
		foreach($pending as $pending_data)
		{
		$b=mysql_query("select * from admsn_doc where `id`='".$pending_data."'");
		while($row=mysql_fetch_array($b))
		{
			$admsn_id=$row['id'];
			$doc=$row['doc'];
			$doc_pending[]=$doc;
		}
	}
				
	if(is_array($doc_pending))
	{	
		$i=0;
		$docs.="Pending Document\\n\\n";
		for($j=0; $j<sizeof($doc_pending); $j++)
		{
			$i++;
			 $docs.=$i." ".$doc_pending[$j]."\\n";
		} 
	?>
	
	<!-- Pending Document -->
	<script>
		alert("<?php echo $docs; ?>");
	</script>
		<!--  End ----- -->
	 <?php
	}

$amt_old_monthly=0;
$amt_old_hostel=0;
$amount_old_monthly=0;
$amount_old_hostel=0;
$sel_old=mysql_query("select `monthly_fee`,`hostel_fee` from `old_fee` where `reg_no`='".$reg_no."'");
$arr_old=mysql_fetch_array($sel_old);

$sel_submit=mysql_query("select `amt` from `old_fee_submit` where `schlr_no_id`='".$arr_stdnt['id']."' && `fee_type`='1'");
while($arr_submit=mysql_fetch_array($sel_submit))
{
	$amount_old_monthly+=$arr_submit['amt'];
}
$amt_old_monthly+=$arr_old['monthly_fee']-$amount_old_monthly;

$sel_submit=mysql_query("select `amt` from `old_fee_submit` where `schlr_no_id`='".$arr_stdnt['id']."' && `fee_type`='2'");
while($arr_submit=mysql_fetch_array($sel_submit))
{
	$amount_old_hostel+=$arr_submit['amt'];
}
$amt_old_hostel+=$arr_old['hostel_fee']-$amount_old_hostel;	
$old_data='';

if(!empty($amt_old_monthly) || !empty($amt_old_hostel))
{	
 if(!empty($amt_old_monthly))
 {
	 $old_data.='Old Tution Fee is due '.$amt_old_monthly;
 }
 if(!empty($amt_old_hostel))
 {
	 $old_data.=' Old Hostel Fee is due '.$amt_old_hostel;
 }
 ?>
	
	<!-- Pending Document -->
	<script>
		alert("<?php echo $old_data; ?>");
	</script>
		<!--  End ----- -->
	 <?php
}
if(!empty($num_tc) || $t['continoue_discontinoue_status']==1)
{$data_show='';
	if(!empty($num_tc))
	{
		$data_show.='Tc issued';
	}
	if($t['continoue_discontinoue_status']==1)
	{
		if(!empty($num_tc))
		{
			$data_show.=' and ';
		}
		$data_show.='discontinoue';
	}
	$contain='Student is '.$data_show.' still you want to deposit fee. Ok/Cancel';
	echo "<script>
				
	if(confirm('".$contain."')!=true)
	{
		window.close();
	}
	
		</script>";
	
}
?>

</body>
<!-- END BODY -->

</html>