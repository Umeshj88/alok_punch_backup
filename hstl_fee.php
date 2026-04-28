<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
$schlr_no_id=$_GET['schlr_no_id'];
$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'");
$arr_stdnt=mysql_fetch_array($sel_stdnt);
			$hostel_reg=$arr_stdnt['hostel_reg'];
			$gender=$arr_stdnt['gndr'];
			$schlr_no=$arr_stdnt['id'];
			
$session=$_SESSION['session'];
?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
css();
ajax();
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
$s1=mysql_query("select * from `hstl_rcpt_no`");
		$rec=mysql_fetch_array($s1);
		$re=$rec['hstl_rcpt_no']+1;
		?>
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
            <div align="center" style="width:100%; height:20%">
                <div id="toast-container" class="toast-top-right" >
                    <div class="toast toast-info">
                     <button class="toast-close-button">×</button>
                    	<div class="toast-message">
                      <h4> Receipt No. &nbsp;&nbsp;<?php echo $re; ?></h4>
                        </div>
                    </div>
            </div>
	<form class="form-signin" name="frm" id="frm1" method="POST" action="hstl_fee_cnn.php"> 
<?php
		$s=mysql_query("select * from `hstl_admsn`");
		$r=mysql_num_rows($s);
		$r=($r+1);
		
		$sel_hstl=mysql_query("select * from `hstl_admsn` where schlr_no_id='$schlr_no_id'");
		$arr_hstl=mysql_fetch_array($sel_hstl);
		$schl_nm=$arr_hstl['schl_nm'];
		$room_no=$arr_hstl['room_no'];
		
		$sel=mysql_query("select * from stdnt_reg where id='$schlr_no_id'");
		$arr=mysql_fetch_array($sel);
		$schlr_no=$arr['schlr_no'];
		$cls=$arr['cls'];
		$reg_no=$arr['reg_no'];
		$fname=$arr['fname'];
		$mname=$arr['mname'];
		$f_name=$arr['f_name'];
		$m_name=$arr['m_name'];
		//$rg_dt=$arr['rg_dt'];
		$document=$arr['document'];
		$adm=@$arr['adm'];
		$adm_class_id = $arr['adm_class_id'];
		
		$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
		$num_tc=mysql_num_rows($sel_tc);
		
		
			if( empty($hostel_reg) )
			{
				
				$status=1;
				$k=1;
			}
			elseif( !empty($hostel_reg) && $hostel_reg == $session)
			{
				$status=1;
				$k=1;
			}
			
			elseif ($hostel_reg != $session)
			{
				$status=2;
			}
		
		
		$sel1=mysql_query("select * from class where sno='$cls'");
		$arr1=mysql_fetch_array($sel1);
		$class=$arr1['cls'];
		
		
		$d=date("d-m-Y");
		 ?>	 
         <div align="center" style="width:100%; height:20%">
         
			<?php
			if(!empty($_GET['done']))
			{
				?>
                <div class="note note-success">
						<p>
							 Recept Deleted Successfuly.
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
         <table class="table table-bordered">
<tr>
<td> <label>Registration No.</label> </td>
<td> <input class="form-control" type="text" name="reg_no" value="<?php echo $r; ?>" readonly/> </td>

<td><label> Receipt No.</label> </td>
<td> <input class="form-control" type="text" name="rcpt_no" value="<?php echo $re; ?>" readonly/> </td> 

<td> <label>Scholar No.</label> </td>
<td> <input class="form-control" type="text" name="schlr_no" value="<?php echo $schlr_no; ?>" readonly/><input class="form-control" type="hidden" name="schlr_no_id" value="<?php echo $schlr_no_id; ?>" /></td>

<td><label>Date</label> </td>
<td> <input class="form-control date-picker" type="text" name="dt" id="dp1" value="<?php echo $d;?>"/></td>
</tr>

<tr>
<td> <label>Name</label> </td>
<td> <input class="form-control" type="text" name="name" value="<?php echo $fname." ".$mname; ?>" readonly/> </td>

<td><label>Father's Name</label> </td>
<td> <input class="form-control" type="text" name="f_name" value="<?php echo $f_name; ?>" readonly/> </td>

<td><label> Class</label> </td>
<td> <input class="form-control" type="text" name="cls" value="<?php echo $class; ?>" readonly/> </td>

<td><label> School Name</label> </td>
<td> <input class="form-control" type="text" name="schl" value="<?php echo $schl_nm; ?>" readonly/> </td>
</tr>
</table></div>

<div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div>
			<b> Fee Deposition</b>
		</div></div>
<table class="table table-bordered" align="center" style="width:100%">
<?php

for($j=1;$j<=12;$j++)
{
	
$sel5=mysql_query("select * from hstl_fee_setup where  class='".$cls."' && `status`='".$status."' && `session`='".$session."' ORDER BY id desc");
$arr5=mysql_fetch_array($sel5);
// print_r($session);

if($arr5['inst_'.$j] !=0)
{
	if($j==1 || $j==5  || $j==9)
	{
		echo '<tr>';
	}
?>

<td><div class="col-md-6">Installment <?php echo $j;?></div><div class="col-md-4"><?php echo $arr5['inst_'.$j] ?></div></td>

<?php
if($j==4 || $j==8  || $j==12)
	{
		echo '<tr>';
	}
}
}
//echo '<pre>';print_r($arr5);
$tot=$arr5['total'];
$sel2=mysql_query("select amount from hstl_fee where schlr_no_id='$schlr_no_id'");
while($arr2=mysql_fetch_array($sel2))
{
$amt=$arr2['amount'];
@$amtdue=$amt+$amtdue;
}
?>
</table>
<table class="table table-bordered table-hover" align="center" style="width:100%">
<tr>
<td> <label> This Insallment </label></td>
<td> <input class="form-control" type="text" name="inst" id="inst" onKeyUp="install();"/></td>

<td> <label>Amount due excluding</label> <label>caution money </label></td>
<td> <input class="form-control" type="text" name="due" value="<?php echo @$tot-@$amtdue; ?>" readonly></td>
</tr>
</table>

 <table class="table table-bordered table-hover" border="0" align="center" style="width:100%">
    <thead>
        <tr>
        		<th> <b>Gross Total </b><input class="form-control" name="gt" id="gt" type="text" readonly/></th>
        		<th> <b>Concession </b><input class="form-control" type="text" name="cncsn" id="cncsn" onKeyUp="concession();"/></th>        
        		<th> <b>Remarks </b><input class="form-control" type="text" name="cn_rm" id="cn_rm"/></th>
        		<th><b>Fine</b> <input class="form-control" type="text" name="fine" id="fine" onKeyUp="fin();"/></th>
                <th> <b>Fee to be deposited </b><input class="form-control" type="text" name="dep" id="dep" readonly/></th>
        </tr>
    </thead>
</table>
</div>

<div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div>
			<b> Cheque Details</b>
		</div></div>
        <table class="table table-bordered table-hover" align="center">
    <thead>
        <tr>
                <th align="center"><b>Chq. No.</b><input class="form-control" type="text" name="chq"/></th>
                <th><b>Chq. Date </b> <input class="form-control date-picker" type="text" id="dp2" name="dt1"/></th>
                <th><b>Bank</b> <input class="form-control" type="text" name="bnk"/></th>
                <th><b>Remarks</b><input class="form-control" type="text" name="rmks"/></th>
        </tr>
    </thead>
</table>
</div>
<div style=" padding-top:5%; text-align:center">
<button class="btn btn-default" name="back" type="submit"><i class="fa fa-arrow-circle-left"></i> Back</button>
<button class="btn btn-success" name="save" type="submit"><i class="fa fa-save"></i> Save</button> 
<button class="btn btn-success" name="save_print" type="submit"><i class="fa fa-print"></i> Save And Print</button>  
<a class="btn btn-info" href="#wide" data-toggle="modal"><i class="fa fa-paperclip"></i> Show Previous Detail</a> 
</div>
</form>

  <form  method="POST" name="form_print" action="recept_print.php">
    <div style="display: none;" class="modal fade" id="wide" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Hostel Fee Receipt</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                    <th>Sr. No.</th>
                    <th>Recept No.</th>
                    <th>Date Of Payment</th>
                    <th>Amount Paid</th>
                    <th>Concession</th>
                    <th>Fine</th>
                   
                    <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                     <input class="form-control" type="hidden" name="schlr_no_recept" value="<?php echo @$schlr_no_id; ?>"/>
                    <?PHP
                    $ii=0;
                    $sel_hstl_fee_1=mysql_query("select * from `hstl_fee` where `schlr_no_id`='".$schlr_no_id."'");
                    while($arr_hstl_fee_1=mysql_fetch_array($sel_hstl_fee_1))
                    {
                        $ii++;
                        ?>
                        <tr>
                        <td><label style="width:100%;"><input type="radio" name="recept_no" value="<?php echo $arr_hstl_fee_1['rcpt_no'];?>"></label></td>
                        <td><?php echo $arr_hstl_fee_1['rcpt_no'];?></td>
                         <td><?php echo $arr_hstl_fee_1['dat'];?></td>
                          <td><?php echo $arr_hstl_fee_1['deposit'];?></td>
                           <td><?php echo $arr_hstl_fee_1['cncsn'];?></td>
                           <td><?php echo $arr_hstl_fee_1['fine'];?></td>
                            <td><?php echo $arr_hstl_fee_1['cnrm'];?></td>
                        </tr>
                        <?php
                    
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="hstl_print" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
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
                    <h4 class="modal-title">Monthly Fee Delete Receipt</h4>
                </div>
                <div class="modal-body">
                 <b>Remarks </b> <input class="form-control " style="width:250px" name="reason"  type="text" value="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                    <button type="submit" name="hstl_delete" class="btn btn-info">Confirm</button>
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
if(!empty($num_tc) || $arr['continoue_discontinoue_status']==1)
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