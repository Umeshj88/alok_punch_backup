<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
extract($_POST);
$schlr_no_id=$_GET['schlr_no_id'];
if(isset($_POST['save']))
{
	$num=$_POST['num_row'];
	
		mysql_query("update `stdnt_reg` set `bs_fc`='' where `id`='".$schlr_no_id."'");
		for($j=1; $j<=$num; $j++)
		{
			 $ft=$_POST['check'.$j];
			 $fee_type=$_POST['fee_type'.$j];
			$sel1=mysql_query("select * from fee_type where sno='$fee_type'");
			$ar1=mysql_fetch_array($sel1);
			 $type=$ar1['type'];
			
			 mysql_query("delete from `edit_invoice_fee_comp` where `schlr_no_id`='".$schlr_no_id."' && `fee_type`='".$fee_type."'");
			if(!empty($ft))
			{
				if($type=='Bus Fee(Boys)' || $type=='Bus Fee(Girls)')
				{
					mysql_query("update `stdnt_reg` set  `bs_fc`='Yes' where `id`='".$schlr_no_id."'");
				}
			 	mysql_query("insert into `edit_invoice_fee_comp` set `schlr_no_id`='".$schlr_no_id."',`fee_type`='".$ft."'");
			}
		}
		
		for($i=1;$i<=12;$i++)
		{
			$paid=$_POST['paid'.$i];
			
			if(!empty($paid))
			{
				$k=$i;
				
				for($j=1; $j<=$num; $j++)
				{
					 $ft=$_POST['check'.$j];
					$fee_type=$_POST['fee_type'.$j];
					
					 $fee=$_POST['b_'.$k];
					 $submit_data=0;
					 $sel_mnth_fee_11=mysql_query("select * from `mnth_fee_1` where `schlr_no_id`='".$schlr_no_id."'");
					while($arr_mnth_fee_11=mysql_fetch_array($sel_mnth_fee_11))
					{
						$mnth_fee1_sno=$arr_mnth_fee_11['sno'];
						
						 $sel_mnth_fee_22=mysql_query("select `mnth`,`fee` from `mnth_fee2` where `mnth_fee1_sno`='".$mnth_fee1_sno."' && `fee_type`='".$ft."' && `mnth`='".$paid."'");
						 while($arr_mnth_fee_22=mysql_fetch_array($sel_mnth_fee_22))
						{
							$submit_data=mysql_num_rows($sel_mnth_fee_22);
							$mnth_fee_22=$arr_mnth_fee_22['fee'];
						}
					}
					mysql_query("delete from `edit_invoice` where `schlr_no_id`='".$schlr_no_id."' && `mnth`='".$paid."' && `fee_type`='".$ft."'");
					if(!empty($ft))
					{
						$fee=$_POST['b_'.$k];
						if(!empty($submit_data))
						{
							mysql_query("insert into edit_invoice (`schlr_no_id`,`mnth`,`fee_type`,`fee`,`left`,`remarks`) values('".$schlr_no_id."','".$paid."','".$ft."','".$mnth_fee_22."','0','".$remarks."')");

						}
						else
						{
							mysql_query("insert into edit_invoice (`schlr_no_id`,`mnth`,`fee_type`,`fee`,`left`,`remarks`) values('".$schlr_no_id."','".$paid."','".$ft."','".$fee."','0','".$remarks."')");
						}
					}
					
						
					$k+=12;
				}
			}
		}
		echo "<meta http-equiv='Refresh' content='0 ;URL=mnth_fee.php?schlr_no_id=$schlr_no_id'>";
		exit;
}

if(isset($_POST['back']))
{
	echo "<meta http-equiv='Refresh' content='0 ;URL=mnth_fee.php?schlr_no_id=$schlr_no_id'>";
	exit;
}


if(!empty($schlr_no_id))
{
	$sql_="select * from stdnt_reg where id='$schlr_no_id'";
			$sql=mysql_query($sql_);
			$t=mysql_fetch_array($sql);
			$schlr_no=$t['schlr_no'];
			$cls=@$t['cls'];
			$schlr_no_id=@$t['id'];
			$strm=@$t['strm'];
			$md=@$t['md'];
			$gndr=@$t['gndr'];
			@$bus_station=$t['bus_station'];
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

<script>
 function en_dis(val)
{
	if(document.getElementById("check"+val).checked==true)
	{
		
			var k=((12*val))
			var j=((k-12)+1);
			var n=j;
		
		var m=0;
		for(var i=j;i<=k;i++)
		{
			m++;
			//if(document.getElementById(m).checked==true)
			//{
				document.getElementById("b_"+ i).readOnly=false;
			//}
		}
		
		
	}
	else
	{
		var k=((12*val))
		var j=((k-12)+1);
		var n=j;
		for(var i=j;i<=k;i++)
		{
			document.getElementById("b_"+ i).readOnly=true;
		}
	}
	
	

}
function showfee(){
	var a = $( "#fee_value" ).val();
	alert(a);
}
</script>

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
<?php menu();?>
<div class="page-content-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
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
			?>
	<form class="form-signin" method="POST" name="frm" id="frm1" > 
<?php
		$s=mysql_query("select mnth_rcpt_no from `mnth_rcpt_no`");
		$t1=mysql_fetch_array($s);
		$r1=$t1['mnth_rcpt_no'];
		$r=$r1+1;
		$dat=date("d-m-Y");
?>
         <div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div class="caption">
			 Fee Deposition Details
		</div></div>
        <div class="portlet-body">
<table class="table table-bordered table-hover" >
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

$sel_month_code=mysql_query("select `mnth_name` from `mnth_code`");
while($arr_month_code=mysql_fetch_array($sel_month_code))
{
	$l++;
	$mnth_name=$arr_month_code['mnth_name'];
	$sel2=mysql_query("select * from mnth_mapping where `class`='$cls' && `stream`='$strm'");
	$arr2=mysql_fetch_array($sel2);
	$mnth_name_digit=$arr2[$arr_month_code['mnth_name']];
	?>
	<td style="text-align:center;">
	<input type="checkbox" name="paid<?php echo $l; ?>" id="<?php echo $l; ?>" value="<?php echo $mnth_name; ?>" style="opacity:1;"/>
    <?php
    if($mnth_name==$mnth)  
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
$sel2=mysql_query("select * from `bus_station` where `id`='$bus_station'");
		$arr2=mysql_fetch_array($sel2);
		$station_name=$arr2['station'];
		
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
										<tr class='main_tr<?php echo $k; ?>' row_no='main_tr<?php echo $k; ?>'>
									<td><label>
                                    
                                    <input type="checkbox" id="check<?php echo $k; ?>" name="check<?php echo $k; ?>" value="<?php echo $ft; ?>" onClick="en_dis('<?php echo $k; ?>')" <?php if($ft==$fee_type_editinvoice){ ?>checked <?php } ?> ><?php  echo $fee_type;?></label>
									<br/>
									<input class="form-control showfee" type="text" 
									id="fee_value" name="fee_type<?php echo $k; ?>"
									rowid="<?php echo $k; ?>">
									</td>
                                    <input type="hidden" name="fee_type<?php echo $k; ?>" value="<?php echo $ft; ?>">
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
									<td><input class="form-control chk" type="text" id="b_<?php echo $xx; ?>" name="b_<?php echo $xx; ?>" value="<?php  echo $arr_edit_invoice['fee']; ?>" <?php if(!empty($submit_data)) { ?> disabled <?php }  ?> /></td>
									<?php
									}
									else
									{
										?>
									<td><input class="form-control chk" type="text" id="b_<?php echo $xx; ?>" name="b_<?php echo $xx; ?>" value="<?php if($mn == $i) { echo $amt;} else { echo 0; } ?>"  <?php if(!empty($submit_data)) { ?> disabled <?php } ?>/></td>
                                      
								<?php }
									}
										
												
									?>
									</tr>
							<?php }
							}?>  
                                        <input type="hidden" value="<?php echo $k;?>" name="num_row" id="num_row">
                                       <input type="hidden"  name="schlr_no" value="<?php echo $schlr_no;?>" >

</table>

</div>
<label>Remark</label>
<input type="text" name="remarks" class="input-medium form-control" />
<div style="width:100%; text-align:center">
<button class="btn btn-default " name="back" type="submit"><i class="fa fa-arrow-circle-left"></i> Back</button> 
<button class="btn btn-success" name="save" type="submit"><i class="fa fa-print"></i> Save</button>
</div>
	</form>		
    
   
			</div>
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->


<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/scripts/app.js" type="text/javascript"></script>
<script>

$(document).ready(function(){  
	$('.showfee').on('keyup',function(){
	var t=$(this).val();
	var rowid=$(this).attr('rowid');
	
	//var values =$('.main_tr'+rowid+'').find('input[name=fee_value'+rowid+']').val();
	$(this).closest('tr.main_tr'+rowid+'').find('.chk').val(t);
	
	});	
		
});
</script>
<?php
footer();
js();?>
</body>
<!-- END BODY -->

</html>