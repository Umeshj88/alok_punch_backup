<?php
require_once("conn.php");
require_once("function.php");
$cls=$_GET['con'];
$sec=$_GET['sec'];
$stream=$_GET['stream'];
?>
<link href="assets/css/print_page.css" rel="stylesheet" type="text/css"/>
<?php
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
$i=0;
while($arr1=mysql_fetch_array($sel1))
{
	$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt['id']."' && `status`='1'");
	$tc=mysql_num_rows($sel_tc);
	if(empty($tc))
	{
	$amt=0;
	$schlr_no=$arr1['schlr_no'];
	$schlr_no_id=$arr1['id'];
	$nm=$arr1['fname'];
	$mnm=$arr1['mname'];
	$lnm=$arr1['lname'];
	$f_nm=$arr1['f_name'];
	$hstl=$arr1['hstl'];
	$md=$arr1['md'];
	$strm=$arr1['strm'];
	$sel2=mysql_query("select amt from cautn_fee where schlr_no_id='$schlr_no_id'");
	$arr2=mysql_fetch_array($sel2);
	
	@$amt=$arr2['amt'];

	$sel4=mysql_query("select amt from caution_fee_setup where class='$cls'");
	$arr4=mysql_fetch_array($sel4);
	$ctn_amt=$arr4['amt'];
	$amt_due=@$ctn_amt-@$amt;
	if($amt_due>0)
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
<h4><b>Total no. of students whose Caution Fee is due :-  <?php echo $count; ?></b></h4>

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
	$amt=0;
	$schlr_no=$arr1['schlr_no'];
	$schlr_no_id=$arr1['id'];
	$nm=$arr1['fname'];
	$mnm=$arr1['mname'];
	$lnm=$arr1['lname'];
	$f_nm=$arr1['f_name'];
	$hstl=$arr1['hstl'];
	$md=$arr1['md'];
	$strm=$arr1['strm'];
	$sel2=mysql_query("select amt from cautn_fee where schlr_no_id='$schlr_no_id'");
	$arr2=mysql_fetch_array($sel2);
	
	@$amt=$arr2['amt'];

	$sel4=mysql_query("select amt from caution_fee_setup where class='$cls'");
	$arr4=mysql_fetch_array($sel4);
	$ctn_amt=$arr4['amt'];
	$amt_due=@$ctn_amt-@$amt;
	if($amt_due>0)
	{
		$count++;
		$total+=$amt_due;
	?>
   
    <tr>
    <td>
    <?php echo $i; ?>
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
<h4><b>Total no. of students whose Caution Fee is due :-  <?php echo $count; ?></b></h4>
</table>
<?php
}
?>
