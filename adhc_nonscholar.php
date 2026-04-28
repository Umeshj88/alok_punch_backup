<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
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
$s=mysql_query("select * from `mnth_rcpt_no`");
		$t1=mysql_fetch_array($s);
		$r=$t1['mnth_rcpt_no']+1;
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
	<form class="form-signin" method="POST" id="frm1" action="adhoc_cnn1.php"> 

<div style="width:96%; margin-left:2%">
<input class="form-control" type="hidden" id="schlr_no"/>
<table align="center">
<tr>
    <td> <label>Receipt No.</label> </td>
    <td> <input class="form-control" type="text" value="<?php echo $r;?>" name="rcpt_no"/> </td>
    
    <td><label> Date</label> </td>
    <td> <input class="form-control date-picker" type="text" name="date" value="<?php echo $d;?>"/> </td> 
    
  </tr>
  <tr>
    <td><label>Detail </label></td>
    <td> <textarea class="form-control"  name="detail" style="resize:none;"></textarea> </td>
	
    <td>Fee Type </td>
	<td> <select class="form-control" name="fee_type" id="feetype" onChange="getamnt()">
	     <option value="0">Select</option>
       <?php $sql_="select * from fee_type where cat='Adhoc'";
			$sql=mysql_query($sql_);
			while($t=mysql_fetch_array($sql))
			{ 
			  echo "<option value=".$t['sno'].">".$t['type']."</option>";
			}
			
	?> </select></td>
    </tr>
    <tr>
	<td><label>Amount</label> </td>
	<td id="amnt"> <input class="form-control" type="text" name="amt" id="amt"/> </td>
    <td><label>Remarks</label> </td>
    <td> <input class="form-control" type="text" name="remark" /></td>
</tr>
</table></div>
<div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div>
			<b> Cheque Details</b>
		</div></div>

<table class="table " align="center" style="width:100%">
<tr>
    <td><label> Chq. No. </label></td>
    <td> <input class="form-control" type="text" name="chq_no"/></td>
    <td><label>Chq. Date</label> </td>
    <td> <input class="form-control date-picker" type="text" name="chq_dt"/></td>
	<td><label> Bank</label> </td>
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
                    <h4 class="modal-title">Adhoc Nonscholar Fee Receipt</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                    <th>Sr. No.</th>
                    <th>Recept No.</th>
                    <th>Date Of Payment</th>
                    <th>Amount Paid</th>
                    <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                     <input class="form-control" type="hidden" name="schlr_no_recept" value="<?php echo @$schlr_no; ?>"/>
                    <?PHP
                    $ii=0;
                    $sel_adhoc_fee_1=mysql_query("select * from `nonscholler_fee`");
                    while($arr_adhoc_fee_1=mysql_fetch_array($sel_adhoc_fee_1))
                    {
                        $ii++;
                        ?>
                        <tr>
                        <td><label style="width:100%;"><input type="radio" name="recept_no" value="<?php echo $arr_adhoc_fee_1['rcpt_no'];?>"></label></td>
                        <td><?php echo $arr_adhoc_fee_1['rcpt_no'];?></td>
                         <td><?php echo $arr_adhoc_fee_1['date'];?></td>
                          <td><?php echo $arr_adhoc_fee_1['amt'];?></td>
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
                    <button type="submit" name="nonscolar_print" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
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
                    <h4 class="modal-title">Adhoc Fee Delete Receipt</h4>
                </div>
                <div class="modal-body">
                 <b>Remarks </b> <input class="form-control " style="width:250px" name="reason"  type="text" value="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                    <button type="submit" name="nonscholar_delete" class="btn btn-info">Confirm</button>
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
js();?>

</body>
<!-- END BODY -->


</html>