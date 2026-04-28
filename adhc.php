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
	$reg_no=$t['reg_no'];
	$adm=@$t['adm'];
	$adm_class_id = $t['adm_class_id'];
	
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
<script>
//window.onload=pending_document();
</script>
</head>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed" onLoad="">
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
	<form class="form-signin" method="POST" id="frm1" action="adhoc_cnn.php"> 

<div style="width:96%; margin-left:2%">
<table>
<tr>
    <td><label> Receipt No.</label> </td>
    <td> <input class="form-control" type="text" value="<?php echo $r;?>" name="rcpt_no"/> </td>
    
    <td><label>Date </label></td>
    <td> <input class="form-control date-picker" type="text" name="date" value="<?php echo $d;?>"/> </td> 
    
    <td> Name  </td>
    <td> <input class="form-control" type="text" value="<?php echo $t['fname']; echo "&nbsp;"; echo $t['mname']; echo "&nbsp;"; echo $t['lname']; ?>"/></td>
    
    <td><label>Scholar No.</label></td>
    <td> <input class="form-control" type="text" name="schlr_no" id="schlr_no" value="<?php echo $t['schlr_no']?>"/><input class="form-control" type="hidden" name="schlr_no_id" id="schlr_no" value="<?php echo $t['id']?>"/></td>
</tr>

<tr>
    <td><label> Father</label> </td>
    <td> <input class="form-control" type="text" value="<?php echo $t['f_name']?>"/></td>
    
    <td><label>Class</label> </td>
    <td> <input class="form-control" type="text" name="cls" value="<?php echo $class;?>"/></td>
	
    <td><label> Stream </label></td>
	<td> <input class="form-control" type="text" name="strm" value="<?php echo $stream;?>"/></td>
	
    <td><label>Fee Type </label></td>
	<td> <select class="form-control" name="fee_type" id="feetype" onChange="getamnt()">
		 <option value="0">Select</option>
       <?php $sql_="select * from fee_type where cat='Adhoc'";
			$sql=mysql_query($sql_);
			while($t=mysql_fetch_array($sql))
			{ ?>
            <option value="<?php echo $t['sno']; ?>"><?php echo $t['type']; ?></option>
            <?php
			 
			}
		?>
            </select></td>
</tr>
<tr>
<td><label> Amount</label> </td>
<td id="amnt"> <input class="form-control" type="text" name="amt" id="amt"/> </td>
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
                    <h4 class="modal-title">Adhoc Fee Receipt</h4>
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
                     <input class="form-control" type="hidden" name="schlr_no_recept" value="<?php echo @$schlr_no_id; ?>"/>
                    <?PHP
                    $ii=0;
                    $sel_adhoc_fee_1=mysql_query("select * from `adhoc_fee` where `schlr_no_id`='".$schlr_no_id."'");
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
                    <button type="submit" name="adhoc_print" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
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
                    <button type="submit" name="adhoc_delete" class="btn btn-info">Confirm</button>
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


	$sel1=mysql_query("select * from stdnt_reg where `id`='$schlr_no_id'");
	while($arr1=mysql_fetch_array($sel1))
	{
		
		$schlr_no=$arr1['schlr_no'];
		$schlr_no_id=$arr1['id'];
		$hstl=$arr1['hstl'];
		$md=$arr1['md'];
		$strm=$arr1['strm'];
		$cls=$arr1['cls'];
		$rg_dt=$arr1['rg_dt'];
		$adm=$arr1['adm'];
		//$dt=date('Y', strtotime($rg_dt));
		
		//$cur_dt=date('Y');
		$tot=0;
		$amt=0;
		///////////////// General Fee
		$sel2=mysql_query("select `gt` from annl_fee where schlr_no_id='$schlr_no_id'");
		while($arr2=mysql_fetch_array($sel2))
		{
			@$amt=$arr2['gt'];
			@$amt1+=$amt;			
		}
		
		//$dat=date("Y");
		//$dat1=$dat+1;
		//$d=$dat."-".$dat1;
		$sel3=mysql_query("select id from cls_fee_comp_setup1 where cls='$cls' && strm='$strm' && medium='$md'");
		$arr3=mysql_fetch_array($sel3);
		$id=$arr3['id'];
		$sel_ft=mysql_query("select * from `fee_type`");
		while($arr_ft=mysql_fetch_array($sel_ft))
		{
			if($_SESSION['session']==$adm)
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
			
			//$total+=$amt_due;
			$gen_due=$amt_due;  
		}
		////////////////////// Hostel
		if($hstl=='Yes')
		{
			$sel2=mysql_query("select amount from hstl_fee where schlr_no_id='$schlr_no_id'");
			@$amt1=0;
			while($arr2=mysql_fetch_array($sel2))
			{
			@$amt=$arr2['amount'];
			@$amt1+=@$amt;
			}
			
				if($adm==$_SESSION['session'])
				{
					 $status=1;
				}
				else 
				{
					$status=2;
				}
				
			$sel4=mysql_query("select total from hstl_fee_setup where class='$cls' && `status`='$status'");
			$arr4=mysql_fetch_array($sel4);
			$hstl_amt=$arr4['total'];
			$amt_due=@$hstl_amt-@$amt1;
			if($amt_due>0)
			{
				//$total+=$amt_due;
			
				$hstl_due=$amt_due; 
		
			}
		}
		///////// ctn fee
		$sel2=mysql_query("select amt from cautn_fee where schlr_no_id='$schlr_no_id'");
	$arr2=mysql_fetch_array($sel2);
	
	@$amt=$arr2['amt'];

	$sel4=mysql_query("select amt from caution_fee_setup where class='$cls'");
	$arr4=mysql_fetch_array($sel4);
	$ctn_amt=$arr4['amt'];
	$amt_due=@$ctn_amt-@$amt;
	if($amt_due>0)
	{
		
		//$total+=$amt_due;
		$ctn_due=$amt_due;
	}
		////////////////////// Month Fee
		$sel_mnthcode=mysql_query("select * from `mnth_code` where `sno_deu_list`<='12'");
 while($arr_mnthcode=mysql_fetch_array($sel_mnthcode))
 {
 	 $last_mnth_id[]=$arr_mnthcode['id'];
 }
		$count_due=0;
		$mnth_count='';
		
			
			$amt1=0;
		
			$gndr=$arr1['gndr'];
			$bs_fc=$arr1['bs_fc'];
			
			
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
					$month_no=$t4['month_no'];
					$data=explode(",", $month_no);
					
		
					$sel_type=mysql_query("select * from fee_type where sno='$ft'");
					$arr_type=mysql_fetch_array($sel_type);
					$fee_type=$arr_type['type'];
					if(!empty($num_edit_invoice_fee_comp))
					{
						$sel_invoice=mysql_query("select * from `edit_invoice_fee_comp` where `fee_type`='$ft' && `schlr_no_id`='$schlr_no_id'");
						$arr_invoice=mysql_fetch_array($sel_invoice);
						$fee_type_editinvoice=$arr_invoice['fee_type'];
					}
					
					
								if($gndr=="Male")
										{
											
											if($fee_type !="Bus Fee(Girls)")
											{
												if($fee_type =="Bus Fee(Boys)")
												{
													if(@$arr1['bs_fc']=="Yes")
													{
														$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
														$t5=mysql_fetch_array($sel5);
														$mfc=$t5['m_f_c'];
													}
												}
												else
												{
														$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
														$t5=mysql_fetch_array($sel5);
														$mfc=$t5['m_f_c'];
												}
											}
							
										}
										if($gndr=="Female")
										{
											
											if($fee_type !="Bus Fee(Boys)")
											{
												if($fee_type =="Bus Fee(Girls)")
												{
													if(@$arr1['bs_fc']=="Yes")
													{
														$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
														$t5=mysql_fetch_array($sel5);
														$mfc=$t5['m_f_c'];
													}
												}
												else
												{
														$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
														$t5=mysql_fetch_array($sel5);
														$mfc=$t5['m_f_c'];
												}
											}
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
					if(!empty($num_edit_invoice_fee_comp))
					{
						$sel_invoice=mysql_query("select * from `edit_invoice_fee_comp` where `fee_type`='$ft' && `schlr_no_id`='$schlr_no_id'");
						$arr_invoice=mysql_fetch_array($sel_invoice);
						$fee_type_editinvoice=$arr_invoice['fee_type'];
					}
					
					
								if($gndr=="Male")
										{
											
											if($fee_type !="Bus Fee(Girls)")
											{
												if($fee_type =="Bus Fee(Boys)")
												{
													if(@$arr1['bs_fc']=="Yes")
													{
														$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
														$t5=mysql_fetch_array($sel5);
														$mfc=$t5['m_f_c'];
													}
												}
												else
												{
														$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
														$t5=mysql_fetch_array($sel5);
														$mfc=$t5['m_f_c'];
												}
											}
							
										}
										if($gndr=="Female")
										{
											if($fee_type !="Bus Fee(Boys)")
											{
												if($fee_type =="Bus Fee(Girls)")
												{
													if(@$arr1['bs_fc']=="Yes")
													{
														$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
														$t5=mysql_fetch_array($sel5);
														$mfc=$t5['m_f_c'];
													}
												}
												else
												{
														$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
														$t5=mysql_fetch_array($sel5);
														$mfc=$t5['m_f_c'];
												}
											}
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
															if($mn == $i) {  $tot+=$amt;}
															else 
															{ 
																 $tot+=0;
															} 
														}
													 }
												}
												 
												
												
											}
										}
				}
		
		
		
			$amt_due=$tot;
			if($amt_due>0)
			{
				
				
		
		$month_due=$amt_due; 
		}
		
		
		
	}
	if(!empty($gen_due) || !empty($hstl_due) || !empty($month_due) || !empty($cnt_due))
	{
		$data_show='';
		if(!empty($gen_due))
		{
			$data_show.='General fee is due.';
		}
		if(!empty($hstl_due))
		{
			$data_show.='Hostel fee is due.';
		}
		if(!empty($month_due))
		{
			$data_show.='Monthly fee is due.';
		}
		if(!empty($cnt_due))
		{
			$data_show.='caution fee is due.';
		}
		
		echo "<script>
				
				alert('".$data_show."');
		</script>";
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