<?php
require_once("conn.php");
$cls=$_GET['con'];
$sec=$_GET['sec'];
$stream=$_GET['stream'];

?>
<link href="assets/css/print_page.css" rel="stylesheet" type="text/css"/>
<?php
$grand_total=0;
if($cls=='All Classes')
{
	$a=mysql_query("select * from class");
 	while($row=mysql_fetch_array($a))
	{ 
		$cls=$row['sno'];
		$sel_strmm=mysql_query("select * from `stream`");
		while($arr_strmm=mysql_fetch_array($sel_strmm))
		{
		$sr_no=0;
		$count=0;
		$total=0;
		
		
		$i=0;
		$sel1=mysql_query("select * from stdnt_reg where cls='$cls' && strm='".$arr_strmm['sno']."' && `continoue_discontinoue_status`='0' and `rte`='No'");
		$num_stdnt=mysql_num_rows($sel1);
		
		if(!empty($num_stdnt))
		{ 
?>
     <hr style="color:#000;"/>
	<table style=" width:100%;">
    <tr><td align="center" style="font-size:16px"><b>Class :- <?php echo $row['cls']; ?> </b></td><td align="center" style="font-size:16px"><b>Stream :- <?php echo $arr_strmm['strm']; ?> </b></td></tr>
</table>
		
       
<table  class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th>SNo.</th><th>Scholar No.</th><th>Student Name</th><th>Amount Due</th>
</tr>
</thead>
<?php

while($arr1=mysql_fetch_array($sel1))
{
	$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt['id']."' && `status`='1'");
	$tc=mysql_num_rows($sel_tc);
	if(empty($tc))
	{
	$schlr_no=$arr1['schlr_no'];
	$schlr_no_id=$arr1['id'];
	$nm=$arr1['fname'];
	$mnm=$arr1['mname'];
	$lnm=$arr1['lname'];
	$f_nm=$arr1['f_name'];
	$hstl=$arr1['hstl'];
	$md=$arr1['md'];
	$strm=$arr1['strm'];
	$rg_dt=$arr1['rg_dt'];
	$adm=$arr1['adm'];
	
	$tot=0;
	$amt=0;
	$sel2=mysql_query("select gt from annl_fee where schlr_no_id='$schlr_no_id'");
	while($arr2=mysql_fetch_array($sel2))
	{
		@$amt=$arr2['gt'];
		@$amt1+=$amt;			
	}
	
	
	$sel3=mysql_query("select id from cls_fee_comp_setup1 where cls='$cls' && session='$session' && strm='$strm' && medium='$md'");
	$arr3=mysql_fetch_array($sel3);
	$id=$arr3['id'];
	$sel_ft=mysql_query("select * from `fee_type`");
	while($arr_ft=mysql_fetch_array($sel_ft))
	{
		
		if($session==$adm)
		{
			if('Admission'==$arr_ft['cat'])
			{
				$tot+=$arr_ft['amt'];
			}
		}
		$sel3=mysql_query("select * from cls_fee_comp_setup3 where setup1_id='$id'  && fee_type='".$arr_ft['sno']."'");
		while($arr3=mysql_fetch_array($sel3))
		{
			$tot+=$arr3['amt'];
		}
	}

	
	$amt_due=$tot-$amt;
	if(!empty($amt_due))
	{
		$count++;
		$total+=$amt_due;
		$grand_total+=$amt_due;
		?>
	   
		<tr>
		<td>
		<?php echo ++$i; ?>
		</td>
		<td>
		<?php echo $schlr_no; ?>
		</td>
		<td>
		<?php echo $nm." ".$mnm." ".$lnm." S/O ".$f_nm; ?>
		</td>
		<td style="text-align:right">
		<?php echo $amt_due; ?>
		</td>
		</tr>
	
		<?php
	
	}
}
}
?>
<tr>
<th colspan="3" style="text-align:right">Total Amount</th>
<td style="text-align:right"><strong><?php echo $total; ?></strong></td>
</tr>
<h4><b>Total no. of students whose General Fee is due :-  <?php echo $count; ?></b></h4>
</table>
        <?php
	}
}
}
	?>
   <table class="table table-bordered table-hover" style="width:100%;">
	<tr>
<th  style="text-align:right">Grand Total</th>
<td style="text-align:right"><strong><?php echo $grand_total; ?></strong></td>
</tr>
</table>
<?php
}
else
{
$a=mysql_query("select * from `class` where `sno`='$cls'");
 	$row=mysql_fetch_array($a);
	
	
	$total=0;
	
$condition='';
	?>
    <hr style="color:#000;"/>
	<table style=" width:100%;">

<tr><td align="center" style="font-size:16px"><b>Class :- <?php echo $row['cls']; 
if(!empty($sec))
{
	$sel_sec=mysql_query("select * from `section` where `sno`='$sec'");
 	$row_sec=mysql_fetch_array($sel_sec);
	
	$condition.=" and sec='".$sec."'";
	?> &nbsp; Section :- <?php echo $row_sec['section']; 
}
if(!empty($stream))
{
	$sel=mysql_query("select * from `stream` where `sno`='$stream'");
	$arr=mysql_fetch_array($sel);
	
	$condition.=" and strm='".$stream."'";
	?>&nbsp; Stream :- <?php echo $arr['strm']; 
}
?> </b></td></tr>
</table>
<table  class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th>SNo.</th><th>Scholar No.</th><th>Student Name</th><th>Amount Due</th>
</tr>
</thead>
<?php
$i=0;
$count=0;
$sel1=mysql_query("select * from stdnt_reg where cls='$cls'  and `continoue_discontinoue_status`='0' and `rte`='No' $condition");
while($arr1=mysql_fetch_array($sel1))
{
	$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt['id']."' && `status`='1'");
	$tc=mysql_num_rows($sel_tc);
	if(empty($tc))
	{
	$schlr_no=$arr1['schlr_no'];
	$schlr_no_id=$arr1['id'];
	$nm=$arr1['fname'];
	$mnm=$arr1['mname'];
	$lnm=$arr1['lname'];
	$f_nm=$arr1['f_name'];
	$hstl=$arr1['hstl'];
	$md=$arr1['md'];
	$strm=$arr1['strm'];
	$rg_dt=$arr1['rg_dt'];
	$adm=$arr1['adm'];
	
	$tot=0;
	$amt=0;
	$sel2=mysql_query("select gt from annl_fee where schlr_no_id='$schlr_no_id'");
	while($arr2=mysql_fetch_array($sel2))
	{
		@$amt=$arr2['gt'];
		@$amt1+=$amt;			
	}
	
	
	$sel3=mysql_query("select id from cls_fee_comp_setup1 where cls='$cls' && session='$session' && strm='$strm' && medium='$md'");
	$arr3=mysql_fetch_array($sel3);
	$id=$arr3['id'];
	$sel_ft=mysql_query("select * from `fee_type`");
	while($arr_ft=mysql_fetch_array($sel_ft))
	{
		
		if($session==$adm)
		{
			if('Admission'==$arr_ft['cat'])
			{
				$tot+=$arr_ft['amt'];
			}
		}
		$sel3=mysql_query("select * from cls_fee_comp_setup3 where setup1_id='$id'  && fee_type='".$arr_ft['sno']."'");
		while($arr3=mysql_fetch_array($sel3))
		{
			$tot+=$arr3['amt'];
		}
	}
	$amt_due=$tot-$amt;
	if(!empty($amt_due))
	{
		$count++;
		$total+=$amt_due;
		?>
	   
		<tr>
		<td>
		<?php echo ++$i; ?>
		</td>
		<td>
		<?php echo $schlr_no; ?>
		</td>
		<td>
		<?php echo $nm." ".$mnm." ".$lnm." S/O ".$f_nm; ?>
		</td>
		<td>
		<?php echo $amt_due; ?>
		</td>
		</tr>
	
		<?php
	
	}
}
}
?>
<tr>
<th colspan="3" style="text-align:right">Total Amount</th>
<td><strong><?php echo $total; ?></strong></td>
</tr>
<h4><b>Total no. of students whose General Fee is due :-  <?php echo $count; ?></b></h4>
</table>
<?php
}
?>