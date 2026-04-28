<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
extract($_POST);
$schlr_no_id=$_GET['schlr_no_id'];


if(!empty($schlr_no_id))
{
	$sql_="select * from stdnt_reg where id='$schlr_no_id'";
	$sql=mysql_query($sql_);
	$t=mysql_fetch_array($sql);
	$schlr_no=$t['schlr_no'];
	$bus_station=$t['bus_station'];
	$cls=@$t['cls'];
	$reg_no=@$t['reg_no'];
	$adm=@$t['adm'];
	$schlr_no_id=@$t['id'];
	$strm=@$t['strm'];
	$md=@$t['md'];
	$gndr=@$t['gndr'];
	$rte=@$t['rte'];
	$document=$t['document'];
	$adm_class_id = $t['adm_class_id'];
	$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
	$num_tc=mysql_num_rows($sel_tc);
	
	$sel1=mysql_query("select * from class where sno='$cls'");
	$arr1=mysql_fetch_array($sel1);
	$class=$arr1['cls'];
				
	$se=mysql_query("select * from stream where sno='$strm'");
	$r=mysql_fetch_array($se);
	$strim=$r['strm'];
	
	$se=mysql_query("select * from section where sno='".$t['sec']."'");
	$r=mysql_fetch_array($se);
	$section=$r['section'];
	
	$sel_md=mysql_query("select * from medium where sno='".$t['md']."'");
	$arr2=mysql_fetch_array($sel_md);
	$medium=$arr2['medium'];
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
		$s=mysql_query("select mnth_rcpt_no from `mnth_rcpt_no`");
		$t1=mysql_fetch_array($s);
		$r1=$t1['mnth_rcpt_no'];
		$r=$r1+1;
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
                <div class="note note-warning">
						<p>
							 Fees Is Not Submited Successfuly.
						</p>
					</div>
                <?php
			}
			if(!empty($_GET['selectmnth']))
			{
				?>
                <div class="note note-warning">
						<p>
							 Please Select Month.
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
	<form class="form-signin" method="POST" name="frm" id="frm1" action="mnth_fee_cnn.php"> 
    
<?php
		
		$dat=date("d-m-Y");
		
		$s1=mysql_query("select id from `cls_fee_comp_setup1` where cls='$cls' && strm='$strm' && medium='$md'");
		@$t3=mysql_fetch_array($s1);
		$id=$t3['id'];			
		$xx=0;
		$k=0;
	
		$sel2=mysql_query("select * from `bus_station` where `id`='$bus_station'");
		$arr2=mysql_fetch_array($sel2);
		$station_name=$arr2['station'];
		
		
			///////////////////////////// Count row of fee type ///////////////////////////////////
			$count=0;
	$sel=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id'");
	while($t4=mysql_fetch_array($sel))
	{
		$ft=$t4['m_f_c'];
		$sel1=mysql_query("select * from fee_type where sno='$ft'");
		$ar1=mysql_fetch_array($sel1);
		$fee_type=$ar1['type'];
		 $station=$ar1['station'];
		if($gndr=="Male" && $fee_type =="Bus Fee(Boys)" && $station==$bus_station && @$t['bs_fc']=="Yes")
		{
			$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
			$t5=mysql_fetch_array($sel5);
			$mfc=$t5['m_f_c'];
		}
		else if($gndr=="Female" && $fee_type =="Bus Fee(Girls)" && $station==$bus_station && @$t['bs_fc']=="Yes")
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
			$count++;
		}
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<table align="center">
<tr><td colspan="8" align="right"><a href="stdnt_edit.php?schlr_no_id=<?php echo $schlr_no_id; ?>&open=back" class="btn btn-warning"><i class="fa fa-edit"></i> Edit Student</a></td></tr>
	<tr>
            <td> <label>Scholar No.</label> </td>
            <td> <input class="form-control" type="text" name="schlr_no" value="<?php echo @$schlr_no; ?>"/><input class="form-control" type="hidden" name="schlr_no_id" value="<?php echo @$schlr_no_id; ?>"/> </td>
            
            <td><label> Receipt No.</label> </td>
            <td> <input class="form-control" type="text" name="rcpt_no" value="<?php echo $r;?>"/> </td> 
            
            <td><label> Date</label> </td>
            <td> <input class="form-control date-picker" type="text" name="dt" id="dp1" value="<?php echo $dat;?>"/></td>
            
            <td><label>Class</label> </td>
            <td> <input class="form-control" type="text" name="class" value="<?php echo @$class;?>"/></td>

            
	</tr>    
	<tr>
            <td><label> First Name</label> </td>
            <td> <input class="form-control" type="text" name="name" value="<?php echo @$t['fname'];?>"/> </td>
            
            <td><label> Middle Name</label> </td>
            <td> <input class="form-control" type="text" name="mname" value="<?php echo @$t['mname'];?>"/> </td>
            
            <td><label> Last Name</label> </td>
            <td> <input class="form-control" type="text" name="lname" value="<?php echo @$t['lname'];?>"/> </td>
            
             <td><label>Father's Name</label> </td>
            <td> <input class="form-control" type="text" name="fname" value="<?php echo @$t['f_name'];?>"/> </td>
	</tr>
	<tr>
            
            
            <td><label> Bus Facility</label> </td>
            <td> <input class="form-control" type="text" name="bs_fclty" value="<?php echo @$t['bs_fc'];?>"/></td>
            
            <td><label>Medium </label></td>
            <td> <input class="form-control" type="text" name="medium" value="<?php echo @$medium;?>"/></td>
            
            <td> Stream </td>
            <td> <input class="form-control" type="text" name="strm" value="<?php echo @$strim;?>"/></td>
                 
            <td><label>Section</label></td>
            <td> <input class="form-control" type="text" name="section" value="<?php echo @$section;?>"/></td>
	</tr>
</table>
         <div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div class="caption">
       <label> <input type="checkbox" id="chkall" onChange="chkall_mnth_fee()">
			 Fee Deposition Details</label>
		</div></div>
        <div class="portlet-body">
<table class="table table-bordered table-hover"  id="txtHint">
<thead>
<tr>
<th style="text-align:center;"><b> Months </b></th>
<?php
$sel_month_code=mysql_query("select `mnth_name` from `mnth_code`");
while($arr_month_code=mysql_fetch_array($sel_month_code))
{
	echo '<th style="text-align:center;">'.ucfirst($arr_month_code['mnth_name']).'</th>';
}
?>

</tr>
</thead>
<?php

 $d=(int) date("m");
?>
<tr>
<td style="text-align:center;"><b> Fee Component </b></td>
<?php

$l=0;
$sel_month_code1=mysql_query("select `id` from `mnth_code` where `sno_deu_list`='".$d."'");
	$arr_month_code1=mysql_fetch_array($sel_month_code1);
	$month_fee_current_id=$arr_month_code1['id'];
	
	$sel2=mysql_query("select * from mnth_mapping where `class`='$cls' && `stream`='$strm'");
	$arr2=mysql_fetch_array($sel2);
	
	
$sel_month_code=mysql_query("select `mnth_name` from `mnth_code`");
while($arr_month_code=mysql_fetch_array($sel_month_code))
{
	$l++;
	$mnth_name=$arr_month_code['mnth_name'];
	$mnth_name_digit=$arr2[$arr_month_code['mnth_name']];
	
	?>
	<td style="text-align:center;">
	<input  type="checkbox" name="paid<?php echo $l; ?>" id="<?php echo $l; ?>" value="<?php echo $mnth_name; ?>" style="opacity:0;" onClick="p(this.id)"
    <?php
	$fee_type_count=0;
    $sel_mnth_fee1=mysql_query("select * from `mnth_fee_1` where `schlr_no_id`='$schlr_no_id'");
    while($arr_mnth_fee1=mysql_fetch_array($sel_mnth_fee1))
    {
        $sno=$arr_mnth_fee1['sno'];
      
        $sel1=mysql_query("select mnth from mnth_fee2 where mnth_fee1_sno='$sno' && mnth='".$mnth_name."'");
		
        while($arr1=mysql_fetch_array($sel1))
        {
			$fee_type_count++;
            $mnth=$arr1['mnth'];
        }
	}
	$explod=explode(",", $mnth_name_digit);
	$explod1=$explod[0];

	$sel_month_code1=mysql_query("select `id`,`sno_deu_list` from `mnth_code` where `month_fee_name`='".$mnth_name."'");
	$arr_month_code1=mysql_fetch_array($sel_month_code1);
	$month_fee_name_id=$arr_month_code1['id'];
	 if(!empty($explod1))
	 {
		if(($d==$explod1) || ($month_fee_name_id<=$month_fee_current_id) || ($mnth_name==$mnth))
		{
			?>
		 	checked
		 	<?php 
		}
		if($mnth_name==$mnth && $fee_type_count>=$count)  
		{ ?> 
			disabled
		 <?php
		}
	 }
		?>
    />
  
    <?php  
	
    if($mnth_name==$mnth && $fee_type_count>=$count)  
	{ ?>  
		<br/>Paid
	 <?php
	}
	?>
	</td>
	<?php
}
?>

</tr>

<?php
$sel_invoice_edit=mysql_query("select * from `edit_invoice_fee_comp` where `schlr_no_id`='$schlr_no_id'");
$num_edit_invoice_fee_comp=mysql_num_rows($sel_invoice_edit);

$sel=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id'");
while($t4=mysql_fetch_array($sel))
{
	$ft=$t4['m_f_c'];
	$amt=$t4['amt'];
	$month_no=$t4['month_no'];
	$data=explode(",", $month_no);
	
	$sel1=mysql_query("select * from fee_type where sno='$ft'");
	$ar1=mysql_fetch_array($sel1);
	$fee_type=$ar1['type'];
	$station=$ar1['station'];
	if(!empty($num_edit_invoice_fee_comp))
	{
		$sel_invoice=mysql_query("select * from `edit_invoice_fee_comp` where `fee_type`='$ft' && `schlr_no_id`='$schlr_no_id'");
		$arr_invoice=mysql_fetch_array($sel_invoice);
		$fee_type_editinvoice=$arr_invoice['fee_type'];
	}
	
		if($gndr=="Male" && $fee_type =="Bus Fee(Boys)" && $station==$bus_station && @$t['bs_fc']=="Yes")
		{
			$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
			$t5=mysql_fetch_array($sel5);
			$mfc=$t5['m_f_c'];
		}
		else if($gndr=="Female" && $fee_type =="Bus Fee(Girls)" && $station==$bus_station && @$t['bs_fc']=="Yes")
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
				?>
				<tr>
					<td><label><input type="checkbox" class="hide" id="check<?php echo $k; ?>" name="check<?php echo $k; ?>" value="<?php echo $ft; ?>" checked><?php echo $fee_type;?></label>
					<br/>
					
					</td>
							<input  type="hidden" name="fee_type<?php echo $k; ?>" value="<?php echo $ft; ?>">
							
							<?php  
							
							
							
							for($i=1;$i<=12;$i++)
							{								
								$sel_month_code2=mysql_query("select `mnth_name` from `mnth_code` where `id`='$i'");
								$arr_month_code2=mysql_fetch_array($sel_month_code2);
								$mnn=$arr_month_code2['mnth_name'];
								$g=$y."".$i; 
								$mn=0;
								$xx++;
								for($j=0; $j<sizeof($data); $j++)
								{
									 $t_data=$data[$j];
									 if($i==$t_data)
									 {
										 $mn=$t_data;
									 }
								}
								$submit_data=0;
								$sel_mnth_fee_11=mysql_query("select * from `mnth_fee_1` where `schlr_no_id`='".$schlr_no_id."'");
								while($arr_mnth_fee_11=mysql_fetch_array($sel_mnth_fee_11))
								{
									$mnth_fee1_sno=$arr_mnth_fee_11['sno'];
									
									 $sel_mnth_fee_22=mysql_query("select mnth from `mnth_fee2` where `mnth_fee1_sno`='".$mnth_fee1_sno."' && `fee_type`='".$ft."' && `mnth`='".$mnn."'");
									 while($arr_mnth_fee_22=mysql_fetch_array($sel_mnth_fee_22))
									{
										$submit_data=mysql_num_rows($sel_mnth_fee_22);
									}
									 
									
								}
								$sel_edit_invoice=mysql_query("select * from `edit_invoice` where `schlr_no_id`='$schlr_no_id' && `fee_type`='$ft' && `mnth`='$mnn' ORDER BY id DESC LIMIT 1");
							 $num_edit_invoice=mysql_num_rows($sel_edit_invoice);
							$arr_edit_invoice=mysql_fetch_array($sel_edit_invoice);
							if(!empty($num_edit_invoice))
							{
								?>
							<td><input class="form-control"  type="text" id="b_<?php echo $xx; ?>" name="b_<?php echo $xx; ?>" value="<?php if($t['bs_fc']=="Yes" && ($fee_type == "Bus Fee(Girls)" || $fee_type == "Bus Fee(Boys)" )){ echo $arr_edit_invoice['fee']; } else if($rte=='Yes'){ echo 0; } else { echo $arr_edit_invoice['fee']; } ?>" <?php if(!empty($submit_data)) { ?> disabled <?php } else { ?> readonly <?php } ?> style="width:90%;"/></td>
                            <?php if(empty($submit_data)) { ?> <input type="hidden" name="fee_<?php echo $xx; ?>" value="<?php  if($t['bs_fc']=="Yes" && ($fee_type == "Bus Fee(Girls)" || $fee_type == "Bus Fee(Boys)" )){ echo $arr_edit_invoice['fee'];; } else if($rte=='Yes'){ echo 0; } else { echo $arr_edit_invoice['fee']; } ?>" > <?php } ?>
			
							<?php
							}
							else
							{ ?>
							<td><input class="form-control"  type="text" id="b_<?php echo $xx; ?>" name="b_<?php echo $xx; ?>" value="<?php if($mn == $i) { if($t['bs_fc']=="Yes" && ($fee_type == "Bus Fee(Girls)" || $fee_type == "Bus Fee(Boys)" )){ echo $amt; } else if($rte=='Yes'){ echo 0; } else { echo $amt; } } else { echo 0; } ?>" <?php if(!empty($submit_data)) { ?> disabled <?php } else { ?> readonly <?php } ?>  style="width:90%;"/></td>
                            <?php if(empty($submit_data)) { ?>  <input type="hidden" name="fee_<?php echo $xx; ?>" value="<?php if($mn == $i) { if($t['bs_fc']=="Yes" && ($fee_type == "Bus Fee(Girls)" || $fee_type == "Bus Fee(Boys)" )){ echo $amt; } else if($rte=='Yes'){ echo 0; } else { echo $amt; } } else { echo 0; } ?>"> <?php } ?>
							 
							<?php }
							}
										
							?>
							</tr>
								<?php }  }?>  
								<input type="hidden" value="<?php echo $k;?>" name="num_row" id="num_row">
                                      
<tr align="center">
<td>Total Amount</td>
<?php
for($i=1;$i<=12;$i++)
{
?>

<td><input class="form-control" type="text" name="tm[]" id="tm<?php echo $i;?>"  disabled/></td>
<script>
if(document.getElementById(<?php echo $i; ?>).disabled==false)
{
	if(document.getElementById(<?php echo $i; ?>).checked==true)
	{
		var num_row=eval(document.getElementById("num_row").value);
		var k=0;
		var kk=<?php echo $i ?>;
		
		  for(var i=1; i<=num_row; i++)
		  {
			    var b1=0;
			 	if(document.getElementById("b_" + kk).disabled==false)
				{ 
					b1=eval(document.getElementById("b_" + kk).value);
				}
			 kk+=12;
	
			 if(b1==undefined){b1=0;}
				k+=b1;
				
		  }
		document.getElementById("tm" + <?php echo $i; ?>).value=k
	}
}



	
	
	


</script>
<?php }?>
</tr>
</table>
 <table class="table table-bordered table-hover" border="0" align="center" style="width:100%">
    <thead>
        <tr>
        		<th> <b>Gross Total </b><input class="form-control" name="gt" id="inst" type="text" readonly/></th>
        		
        		<th> <b>Concession </b><input class="form-control" type="text" name="cncssn" id="cncsn" onKeyUp="concession();"/></th>
        
        		<th> <b>Remarks </b><input class="form-control" type="text" name="cn_rm" id="cn_rm"/></th>
        		<th><b>Fine</b> <input class="form-control" type="text" name="fyn" id="fine" onKeyUp="fin();"/></th>
                <th> <b>Fee to be deposited </b><input class="form-control" type="text" name="fee_dp" id="dep" readonly/></th>
        </tr>
    </thead>


</table>
</div>
<script>
  var k=0;
  for(var i=1; i<=12; i++)
  {
	 var b1=eval(document.getElementById("tm" + i).value);
	 if(b1==undefined){b1=0;}
		k+=b1;
  }
  document.getElementById("inst").value=k
  document.getElementById("dep").value=k
</script>
</div>
  <div class="portlet" style="margin-top:1%">
  
         <div class="portlet-title">
        <div>
			<b> Cheque Details</b>
		</div></div>
<table class="table table-bordered table-hover" align="center">
    <thead>
        <tr>
                <th align="center"><b>Chq. No.</b><input class="form-control" type="text" name="chq_no"/></th>
                <th><b>Chq. Date </b> <input class="form-control date-picker" type="text" id="dp2" name="dt1"/></th>
                <th><b>Bank</b> <input class="form-control" type="text" name="bnk"/></th>
                <th><b>Remarks</b><input class="form-control" type="text" name="rmks"/></th>
        </tr>
    </thead>
</table>

</div>
<div style="width:100%; text-align:center">
<button class="btn btn-default button-previous" name="back" type="submit"><i class="fa fa-arrow-circle-left"></i> Back</button>
<button class="btn btn-success" name="save" type="submit"><i class="fa fa-save"></i> Save</button> 
<button class="btn btn-success" name="save_print" type="submit"><i class="fa fa-print"></i> Save and Print</button>
<button class="btn btn-warning" type="button" onClick="window.location.href='student_edit_invoice.php?schlr_no_id=<?php echo $schlr_no_id; ?>'"><i class="fa fa-pencil"></i> Edit</button>
<a class="btn btn-info" data-target="#wide" data-toggle="modal"><i class="fa fa-paperclip"></i> Show Previous Detail</a>
</div>


	</form>		
    
    <form  method="POST" name="form_print" action="recept_print.php">          
    <div style="display: none;" class="modal fade" id="wide" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Monthly Fee Receipt</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                    <th>Sr. No.</th>
                    <th>Recept No.</th>
                    <th>Date Of Payment</th>
                    <th>Amount Paid</th>
                    <th>Conncetion</th>
                    <th>Fine</th>
                    <th>For Months</th>
                    <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                     <input class="form-control" type="hidden" name="schlr_no_recept" value="<?php echo @$schlr_no_id; ?>"/>
                    <?php
                    
                    $ii=0;
                    $sel_mnth_fee_1=mysql_query("select * from `mnth_fee_1` where `schlr_no_id`='".$schlr_no_id."'");
                    while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
                    {
                        $mnth="";
                        $sel_mnth_fee_2=mysql_query("select distinct mnth from `mnth_fee2` where `mnth_fee1_sno`='".$arr_mnth_fee_1['sno']."'");
                        while($arr_mnth_fee_2=mysql_fetch_array($sel_mnth_fee_2))
                        {
                            $mnth[]=$arr_mnth_fee_2['mnth'];
                        }
                        
                        $month=implode(',', $mnth);
                        
                        $ii++;
                        $sno=$arr_mnth_fee_1['sno'];
                        ?>
                       
                        <tr>
                        <td><label style="width:100%;"><input type="radio" name="recept_no" value="<?php echo $arr_mnth_fee_1['recpt_no'];?>"></label></td>
                        <td><?php echo $arr_mnth_fee_1['recpt_no'];?></td>
                         <td><?php echo $arr_mnth_fee_1['dat'];?></td>
                          <td><?php echo $arr_mnth_fee_1['fee_dp'];?></td>
                           <td><?php echo $arr_mnth_fee_1['cncssn'];?></td>
                           <td><?php echo $arr_mnth_fee_1['fyn'];?></td>
                          <td><?php echo $month;?></td>
                           
                            <td><?php echo $arr_mnth_fee_1['cnrm'];?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="mnth_print" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
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
                    <button type="submit" name="mnth_delete" class="btn btn-info">Confirm</button>
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