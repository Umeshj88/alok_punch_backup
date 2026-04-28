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
	$strm=$t['strm'];
	$schlr_no=$t['schlr_no'];
	$document=$t['document'];
	$adm=@$t['adm'];
	
	$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
	$num_tc=mysql_num_rows($sel_tc);
	
	$sel1=mysql_query("select * from class where sno='$cls'");
    $arr1=mysql_fetch_array($sel1);
	$class=$arr1['cls'];
	
	$sel1=mysql_query("select * from stream where sno='$strm'");
    $arr1=mysql_fetch_array($sel1);
	$stream=$arr1['strm'];
	
}
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
		
		$d=date("d-m-Y");
		?>
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
           
                
               
            <div align="center" style="width:100%; height:20%">
           <?php
			if(!empty($_GET['notdone']))
			{
				?>
                <div class="note note-warning">
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
	<form class="form-signin" method="POST" id="frm1" action="old_payment_cnn.php"> 

<div style="width:96%; margin-left:2%">
<table>
<tr>
    <td><label> Receipt No.</label> </td>
    <td> <input class="form-control" type="text"  name="rcpt_no" id="rcpt_no"/> </td>
    
    <td><label>Date </label></td>
    <td> <input class="form-control date-picker" type="text" name="date" value="<?php echo $d;?>"/> </td> 
    
    <td><label> Name  </label></td>
    <td> <input class="form-control" type="text" value="<?php echo $t['fname']; echo "&nbsp;"; echo $t['mname']; echo "&nbsp;"; echo $t['lname']; ?>"/></td>
    
    <td><label>Scholar No.</label></td>
    <td> <input class="form-control" type="text" name="schlr_no" id="schlr_no" value="<?php echo $t['schlr_no']?>"><input class="form-control" type="hidden" name="schlr_no_id" value="<?php echo $t['id']?>"/></td>
</tr>

<tr>
    <td><label> Father</label> </td>
    <td> <input class="form-control" type="text" value="<?php echo $t['f_name']?>"/></td>
    
    <td><label>Class</label> </td>
    <td> <input class="form-control" type="text" name="cls" value="<?php echo $class;?>"/></td>
	
    <td><label> Stream </label></td>
	<td> <input class="form-control" type="text" name="strm" value="<?php echo $stream;?>"/></td>
	
    <td></td>
	<td>
            
            
            </td>
</tr>
<tr>
<td><label>Fee Type </label></td>
<td><div class="radio-list">
    <label class="radio">
    <input type="radio" name="fee_type" id="old_monthly_fee" schlr_no_id="<?php echo $schlr_no_id; ?>" value="1"  > Monthly Fee </label>
    <label class="radio">
    <input type="radio" name="fee_type" id="old_hostel_fee" schlr_no_id="<?php echo $schlr_no_id; ?>" value="2"> Hostel Fee </label>
</div>
    </td>
<td><label> Amount</label> </td>
<td id="amnt"> <input class="form-control" type="text" name="amt" id="inst"/> </td>
<td><label> Concession</label></td><td><input class="form-control" type="text" name="cncssn" id="cncsn" onKeyUp="concession();"/></td>
<td><label> Fee to be deposited</label></td><td><input class="form-control" type="text" name="fee_dp" id="dep" readonly/></td>
<td><label>Remarks </label></td>
<td> <input class="form-control" type="text" name="remark" /></td>
</tr>
</table>
</div>
<div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div>
			<b> Cheque Details</b>
		</div></div>

<table class="table " align="center" style="width:100%">
<tr>
<td><label> Chq. No.</label> </td>
<td> <input class="form-control" type="text" name="chq_no"/></td>

<td><label> Chq. Date</label> </td>
<td> <input class="form-control date-picker" type="text" name="chq_dt"/></td>

<td><label> Bank </label></td>
<td> <input class="form-control" type="text" name="bank"/></td>
</tr>
</table></div>
<div style="width:100%; text-align:center">
<button class="btn btn-default" name="back" type="submit"><i class="fa fa-arrow-circle-left"></i> Back</button> 
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
                    <h4 class="modal-title">Old Fee Receipt</h4>
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
                    <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                     <input class="form-control" type="hidden" name="schlr_no_recept" value="<?php echo @$schlr_no_id; ?>"/>
                    <?PHP
                    $ii=0;
                    $sel_adhoc_fee_1=mysql_query("select * from `old_fee_submit` where `schlr_no_id`='".$schlr_no_id."'");
                    while($arr_adhoc_fee_1=mysql_fetch_array($sel_adhoc_fee_1))
                    {
                        $ii++;
                        ?>
                        <tr>
                        <td><label style="width:100%;"><input type="radio" name="recept_no" value="<?php echo $arr_adhoc_fee_1['rcpt_no'];?>"></label></td>
                        <td><?php echo $arr_adhoc_fee_1['rcpt_no'];?></td>
                         <td><?php echo $arr_adhoc_fee_1['date'];?></td>
                          <td><?php echo $arr_adhoc_fee_1['fee_dp'];?></td>
                          <td><?php echo $arr_adhoc_fee_1['cncssn'];?></td>
                            <td><?php echo $arr_adhoc_fee_1['remark'];?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="oldfee_print" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
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
                    <h4 class="modal-title">Old Fee Delete Receipt</h4>
                </div>
                <div class="modal-body">
                 <b>Remarks </b> <input class="form-control " style="width:250px" name="reason"  type="text" value="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                    <button type="submit" name="oldfee_delete" class="btn btn-info">Confirm</button>
                </div>
             </div>
       </div>
    </div>
    </form>
			
			</div>
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
footer();
js();
?>

<?php


?>

</body>
<!-- END BODY -->

</html>