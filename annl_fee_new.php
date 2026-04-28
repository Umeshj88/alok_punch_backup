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
	$rg_dt=$t['rg_dt'];
	$reg_no=$t['reg_no'];
	$adm=$t['adm'];
	$schlr_no_id=@$t['id'];
	$schlr_no=@$t['schlr_no'];
	$document=$t['document'];
	$adm_class_id = $t['adm_class_id'];
	$dt=date('Y', strtotime($rg_dt));
	
	$cur_dt=date('Y');
	
	$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
	$num_tc=mysql_num_rows($sel_tc);
	
	$sel1=mysql_query("select * from class where sno='".$t['cls']."'");
	$arr1=mysql_fetch_array($sel1);
	$class=$arr1['cls'];
					
	$se=mysql_query("select * from stream where sno='".$t['strm']."'");
	$r=mysql_fetch_array($se);
	$strm=$r['strm'];
	
	$se=mysql_query("select * from section where sno='".$t['sec']."'");
	$r=mysql_fetch_array($se);
	$sec=$r['section'];
	
	$md=mysql_query("select * from medium where sno='".$t['md']."'");
	$arr2=mysql_fetch_array($md);
	$med=$arr2['medium'];
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
$s=mysql_query("select gen_rcpt_no from `rcpt_no`");
		$t1=mysql_fetch_array($s);
		$r=$t1['gen_rcpt_no']+1;		
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
	<form class="form-signin" id="frm1" method="POST" action="annl_fee_cnn.php"> 
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
<div style="width:94%; margin-left:2%">
	<table>
		<tr>
            <td><label> Scholar No.</label></td>
           <td><input class="form-control" type="text" name="schlr_no" value="<?php echo $t['schlr_no'] ?>" readonly /> 
           <input class="form-control" type="hidden" name="schlr_no_id" value="<?php echo $t['id'] ?>" readonly /> </td>
            <td><label>Receipt No.</label> </td>
            <td> <input class="form-control" type="text" name="rcpt_no" value="<?php echo $r;?>" readonly /> </td> 

            <td><label> Date</label> </td>
            <td> <input class="form-control" type="text" name="dt" id="dp1" value="<?php echo $d;?>" readonly /></td>
            
            <td><label>Bus Facility</label> </td>
            <td> <input class="form-control" type="text" name="bs_fclty" value="<?php echo $t['bs_fc'];?>" readonly /></td>
        </tr>
        <tr>
            <td><label> First Name </label></td>
            <td> <input class="form-control" type="text" name="name" value="<?php echo $t['fname'];?>" readonly /> </td>
            
            <td><label> Middle Name </label></td>
            <td> <input class="form-control" type="text" name="mname" value="<?php echo $t['mname'];?>" readonly /> </td>
            
            <td><label> Last Name</label> </td>
			<td> <input class="form-control" type="text" name="lname" value="<?php echo $t['lname'];?>" readonly /> </td>
            
            <td><label>father's Name</label> </td>
            <td> <input class="form-control" type="text" name="fname" value="<?php echo $t['f_name'];?>" readonly /> </td>

        </tr>
        <tr>
        	
            <td><label>Class </label></td>
            <td> <input class="form-control" type="text" name="class" value="<?php echo $class;?>" readonly /></td>
        
            <td><label>Medium</label> </td>
            <td> <input class="form-control" type="text" name="medium" value="<?php echo $med;?>" readonly /></td>

			<td><label> Stream </label></td>
			<td> <input class="form-control" type="text" name="strm" value="<?php echo $strm;?>" readonly /></td>

			<td><label>Section</label> </td>
			<td> <input class="form-control" type="text" name="section" value="<?php echo $sec;?>" readonly /></td>

        </tr>
       
	</table>
</div>
<div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div class="caption">
			Fee Component
		</div></div>
<table class="table table-bordered table-hover" align="center">
<tr>
	<?php
    $md=$t['md'];
    $cls=$t['cls'];
    $strm=$t['strm'];
	$m=0;
	
	
	$sel_an_fee=mysql_query("select * from annl_fee where schlr_no_id='$schlr_no_id'");
    $arr_an_fee=mysql_fetch_array($sel_an_fee);
    $anl_fee_id=$arr_an_fee['id'];
	
	
	
    $sel2=mysql_query("select id from cls_fee_comp_setup1 where cls='$cls' && strm='$strm' && medium='$md'");
    $arr2=mysql_fetch_array($sel2);
    $id=$arr2['id'];
	
	///////////////// Find Due Fee   //////////////
	if($session==$adm)
	{
		$sel3=mysql_query("select * from cls_fee_comp_setup3 where setup1_id='$id'");
		while($arr3=mysql_fetch_array($sel3))
		{
			$count_total[]=$arr3['fee_type'];
		}
		$count_check=array();
		$sel_an_fee=mysql_query("select * from annl_fee where schlr_no_id='$schlr_no_id'");
		while($arr_an_fee=mysql_fetch_array($sel_an_fee))
		{
			$anl_fee_id=$arr_an_fee['id'];
			$sel5=mysql_query("select * from annl_fee1 where annl_fee_id='$anl_fee_id'");
			while($arr5=mysql_fetch_array($sel5))
			{
				$count_check[]=$arr5['fee_type'];
			}
		}
	}
	
	$difference = array_merge(array_diff($count_total, $count_check), array_diff($count_check, $count_total));
	
	if(!is_array($difference))
	{
		if($session!=$adm)
		{
			$count_total_year1=array();
			$sel=mysql_query("select * from fee_type where cat='Year'");
			while($arr=mysql_fetch_array($sel))
			{
				$ft=$arr['sno'];
				$count_total_year[]=$ft;
				$sel_an_fee=mysql_query("select * from annl_fee where schlr_no_id='$schlr_no_id'");
				while($arr_an_fee=mysql_fetch_array($sel_an_fee))
				{
					$anl_fee_id=$arr_an_fee['id'];
				   
					$sel5=mysql_query("select * from annl_fee1 where annl_fee_id='$anl_fee_id'");
					while($arr5=mysql_fetch_array($sel5))
					{
						$count_total_year1[]=$arr5['fee_type'];
					}
				}
			}
			$difference_year = array_merge(array_diff($count_total_year, $count_total_year1), array_diff($count_total_year1, $count_total_year));
		}
	}
	
	//////////////////////////////////////////////////
	
    $sel3=mysql_query("select * from cls_fee_comp_setup3 where setup1_id='$id'");
    while($arr3=mysql_fetch_array($sel3))
    {
		$ft=$arr3['fee_type'];
		$amt=$arr3['amt'];
		
		$sel_an_fee=mysql_query("select * from annl_fee where schlr_no_id='$schlr_no_id'");
		while($arr_an_fee=mysql_fetch_array($sel_an_fee))
		{
			$anl_fee_id=$arr_an_fee['id'];
		   
			$sel5=mysql_query("select * from annl_fee1 where annl_fee_id='$anl_fee_id' && fee_type='$ft'");
			while($arr5=mysql_fetch_array($sel5))
			{
				 $an=$arr5['fee_type'];
				
				$sel=mysql_query("select * from fee_type where sno='$ft'");
				$arr=mysql_fetch_array($sel);
				?> <?php
				if($amt !=0)
				{
					?>
					<?php
					if($an==$ft)
					{
					   
						 ?>
						<th><label><?php echo $arr['type']." [Paid]"; ?></label>
						<?php
						if($t['rte']=='Yes')
						{ ?>
						<input class="form-control" type="text" value="0" readonly /></th>
						<?php
						}
						else
						{?>
						<input class="form-control" type="text" value="<?php echo $amt;?>" readonly /></th>
						<?php
						}
					}
					else 
					{
						 $m++;
						
					?>
				
				<th><label><input type="checkbox" name="c[]" id="<?php echo $m;?>" value="<?php echo $ft;?>" checked="checked" onClick="c(this.id)"/><?php echo $arr['type']; ?> </label>
				<?php
						if($t['rte']=='Yes')
						{  $gt+=0; ?>
							<input class="form-control" type="text" name="a<?php echo $m;?>" id="a<?php echo $m;?>" value="0" readonly /></th>						<?php
						}
						else
						{  $gt+=$amt; ?>
							<input class="form-control" type="text" name="a<?php echo $m;?>" id="a<?php echo $m;?>" value="<?php echo $amt;?>" readonly /></th>						<?php
						}
				
				
					}
				}
			}
			
		}
		if(!is_array($difference) && !empty($difference_year))
		{
			$sel=mysql_query("select * from fee_type where cat='Year'");
			while($arr=mysql_fetch_array($sel))
			{
				if($arr['sno']==$ft)
				{
					$m++;
							
						?>
					
					<th><label><input type="checkbox" name="c[]" id="<?php echo $m;?>" value="<?php echo $ft;?>" checked="checked" onClick="c(this.id)"/><?php echo $arr['type']; ?> </label>
					<?php
					if($t['rte']=='Yes')
					{  $gt+=0; ?>
						<input class="form-control" type="text" name="a<?php echo $m;?>" id="a<?php echo $m;?>" value="0" readonly /></th>						<?php
					}
					else
					{  $gt+=$amt; ?>
						<input class="form-control" type="text" name="a<?php echo $m;?>" id="a<?php echo $m;?>" value="<?php echo $amt;?>" readonly /></th>						<?php
					}
				}
			}
		}
		foreach($difference as $fee_type_id)
		{ 
			if($fee_type_id==$ft)
			{
			$sel=mysql_query("select * from fee_type where sno='$ft'");
				$arr=mysql_fetch_array($sel);
			
			$m++;
						
					?>
				
				<th><label><input type="checkbox" name="c[]" id="<?php echo $m;?>" value="<?php echo $ft;?>" checked="checked" onClick="c(this.id)"/><?php echo $arr['type']; ?> </label>
				<?php
				if($t['rte']=='Yes')
				{  $gt+=0; ?>
					<input class="form-control" type="text" name="a<?php echo $m;?>" id="a<?php echo $m;?>" value="0" readonly /></th>						<?php
				}
				else
				{  $gt+=$amt; ?>
					<input class="form-control" type="text" name="a<?php echo $m;?>" id="a<?php echo $m;?>" value="<?php echo $amt;?>" readonly /></th>						<?php
				}
			}
				
		}
	}
	
	
?>
</tr>
<tr>
<th> <label> Gross Total</label> <input class="form-control" name="gt" id="inst" type="text" value="<?php echo $gt; ?>" readonly /></tdh>

<th><label>Concession</label><input class="form-control" type="text" name="cncssn" id="cncsn" onKeyUp="concession();"/></th>
<th><label>Remarks </label> <input class="form-control" type="text" name="cn_rm" id="cn_rm"/></th>

<th><label>Fine </label><input class="form-control" type="text" name="fyn" id="fine" onKeyUp="fin();"/></th>

<th><label>Fee to be deposited </label> <input class="form-control" type="text" name="fee_dp" id="dep"  value="<?php echo $gt; ?>" readonly /></th>
</tr>
</table>
</div>
 <div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div class="caption">
			 Cheque Details
		</div></div>
<table class="table table-bordered table-hover" align="center">
<thead>
<tr>
<th><b> Chq. No.</b> <input class="form-control" type="text" name="chq_no"/></th>

<th><b>Chq. Date</b> <input class="form-control date-picker" type="text" name="dt1"/></th>

<th> <b>Bank</b> <input class="form-control" type="text" name="bnk"/></th>

<th><b>Remarks</b> <input class="form-control" type="text" name="rmks"/></th>
</tr>
</thead>
</table>
</div>
<div style="width:100%; text-align:center">
<button class="btn btn-default button-previous" name="back" type="submit"><i class="fa fa-arrow-circle-left"></i> Back</button>
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
                    <h4 class="modal-title">Annul Fee Receipt</h4>
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
                    <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                     <input class="form-control" type="hidden" name="schlr_no_recept" value="<?php echo @$schlr_no_id; ?>"/>
                    <?PHP
                    $ii=0;
                    $sel_annl_fee_1=mysql_query("select * from `annl_fee` where `schlr_no_id`='".$schlr_no_id."'");
                    while($arr_annl_fee_1=mysql_fetch_array($sel_annl_fee_1))
                    {
                        $ii++;
                        ?>
                        <tr>
                        <td><label style="width:100%;"><input type="radio" name="recept_no" value="<?php echo $arr_annl_fee_1['recpt_no'];?>"></label></td>
                        <td><?php echo $arr_annl_fee_1['recpt_no'];?></td>
                         <td><?php echo $arr_annl_fee_1['dat'];?></td>
                          <td><?php echo $arr_annl_fee_1['fee_dp'];?></td>
                           <td><?php echo $arr_annl_fee_1['cncssn'];?></td>
                           <td><?php echo $arr_annl_fee_1['fyn'];?></td>
                            <td><?php echo $arr_annl_fee_1['cnrm'];?></td>
                        </tr>
                        <?php
                    
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="annl_print" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
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
                    <h4 class="modal-title">Annul Fee Delete Receipt</h4>
                </div>
                <div class="modal-body">
                <b>Remarks </b> <input class="form-control " style="width:250px" name="reason"  type="text" value="" />
                     
                                    </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                    <button type="submit" name="annl_delete" class="btn btn-info">Confirm</button>
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