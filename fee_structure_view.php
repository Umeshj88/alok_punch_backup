<?php
require_once("conn.php");
include("authentication.php");
require_once("function.php");
@$schlr_no_id=$_GET['schlr_no_id'];
@$cls_id=$_GET['cls_id'];
?>
<html>
<head>
<title>Fee Structure</title>
<style media="print">

.displaynone
{
	display:none;
}
.white-color-print
{
	background-color:#FFF !important;
}
</style>

<style>
.table thead tr th {
    font-size: 14px;
    font-weight: 600;
}
.table tbody tr td {
    font-size: 15px;
    
}
.table thead > tr > th {
    border-bottom: 0px none;
}
.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
    border: 1px solid #DDD;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 4px;
    line-height: 1;
}
table {
    border-collapse: collapse;
    border-spacing: 0px;
}

body {
    color: #000;
    font-family: "Open Sans",sans-serif;
    font-size: 13px;
    direction:ltr;
	
	
}

</style>
<style type="text/css" media="print">
.print{
	page-break-after:always;
}
</style>
</head>
<body s class="white-color-display">
<?php 
if(!empty($cls_id))
{
	$i=0;	
 
	$sel=mysql_query("select `id`,`schlr_no`,`cls`,`fname`,`mname`,`lname`,`f_name`,`strm`,`md`,`gndr`,`bs_fc`,`bus_station`,`sec`,`strm` from `stdnt_reg` where `cls`='".$cls_id."' && `continoue_discontinoue_status`='0'");
	while($arr=mysql_fetch_array($sel))
	{
		$sel_temp_tc_stdnt=mysql_query("select * from  tc_serial_no where schlr_no_id='".$arr['id']."' && `status`='1'");
 		$cnt_temp_tc_stdnt=mysql_num_rows($sel_temp_tc_stdnt);
		if($cnt_temp_tc_stdnt==0)
 		{
			$i++;
			$schlr_no=$arr['schlr_no'];
			$station=$arr['bus_station'];
			$sel1=mysql_query("select `cls` from class where sno='".$arr['cls']."'");
			$arr1=mysql_fetch_array($sel1);
			
			 $sel_sec=mysql_query("select * from `section` where `sno`='".$arr['sec']."'");
             $arr_sec=mysql_fetch_array($sel_sec);
			 
			 $sel_strm=mysql_query("select * from stream where `sno`='".$arr['strm']."'");
             $arr_strm=mysql_fetch_array($sel_strm);
		?>
       
		<table style="width:50%;" align="center"  >
<tr><th style="font-size:18px"> <u>Fee Structure</u> </th></tr>
</table>
<br/> 
<div style="width:100%;  float:left;"  class="print">
    <div style="float:left; width:28%;"> 
<!--    <img align="right" src='img/alok.png' width="100"/>-->
   
    </div>
    <div style="float:right; width:68%;">
    <table style="margin-left:10%">
    <tr><th align="left"> Scholar No. : </th><td>&nbsp;<?php echo $schlr_no; ?></td></tr>
   <tr><th align="left"> Name : </th><td>&nbsp;<?php echo $arr['fname']." ".$arr['mname']." ".$arr['lname']; ?></td></tr>
    <tr><th align="left"> Father's Name : </th><td>&nbsp;<?php echo $arr['f_name']; ?></td></tr>
    <tr><th align="left"> Class : </th><td>&nbsp;<?php echo $arr1['cls']; ?></td></tr>
     <tr><th align="left"> Stream : </th><td>&nbsp;<?php echo $arr_strm['strm']; ?></td></tr>
      <tr><th align="left"> Section : </th><td>&nbsp;<?php echo $arr_sec['section']; ?></td></tr>
    </table>
    <br/>
<table style="width:70%;">
<tr><th style="font-size:18px"> <u>Year <?php echo $session; ?></u> </th></tr>
</table><br/>
<table style="width:70%;" align="left" border="1">
<?php

$s1=mysql_query("select id from `cls_fee_comp_setup1` where cls='".$arr['cls']."' && strm='".$arr['strm']."' && medium='".$arr['md']."'");
@$t3=mysql_fetch_array($s1);

$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='".$t3['id']."'");
while($t5=mysql_fetch_array($sel5))
{
	$mfc=$t5['m_f_c'];
	$amt=$t5['amt'];
	$sel_ft=mysql_query("select * from fee_type where sno='$mfc'");
	$arr_ft=mysql_fetch_array($sel_ft);
	$fee_type=$arr_ft['type'];
	if($arr_ft['station'] ==$station && $fee_type =="Bus Fee(Boys)" && $arr['gndr']=='Male')
	{
		if(@$arr['bs_fc']=="Yes")
		{
			$total+=$amt;
			?>
            <tr><th style=" border-right:none;" align="right" width="60%"><?php echo $fee_type; ?>&nbsp;&nbsp;</th><th style="border-left:none;"><?php echo $amt; ?></th></tr>
            <?php
		}
	}
	else if($arr_ft['station'] ==$station && $fee_type =="Bus Fee(Girls)" && $arr['gndr']=='Female')
	{
		if(@$arr['bs_fc']=="Yes")
		{
			$total+=$amt;
			?>
    		<tr><th style=" border-right:none;" align="right"><?php echo $fee_type; ?>&nbsp;&nbsp;</th><th style="border-left:none;"><?php echo $amt; ?></th></tr>
   			 <?php
		}
	}
	else if($fee_type  !="Bus Fee(Boys)" && $fee_type  !="Bus Fee(Girls)")
	{
		 $total+=$amt;
		$sel_edit_invoice=mysql_query("select * from `edit_invoice` where `schlr_no_id`='".$arr['id']."' && `fee_type`='$mfc'  && `fee`!='0' ORDER BY id DESC LIMIT 1");
		 $num_edit_invoice=mysql_num_rows($sel_edit_invoice);
		$arr_edit_invoice=mysql_fetch_array($sel_edit_invoice);
		if(!empty($num_edit_invoice))
		{
			?>
		<tr><th style=" border-right:none;" align="right"><?php echo $fee_type; ?>&nbsp;&nbsp;</th><th style="border-left:none;"><?php echo $arr_edit_invoice['fee']; ?></th></tr>
		<?php
		}
		else
		{
		?>
		<tr><th style=" border-right:none;" align="right"><?php echo $fee_type; ?>&nbsp;&nbsp;</th><th style="border-left:none;"><?php echo $amt; ?></th></tr>
		<?php
		}
	}
}
		
?>


<!--<tr><th style=" border-right:none;" align="right">Total &nbsp;&nbsp;</th><th style="border-left:none;"><?php echo $total; ?></th></tr>-->
</table>
        </div>
        </div>
       
            <?php
		}
       }
           
}
else if(!empty($schlr_no_id))
{ 
	$sel=mysql_query("select `id`,`cls`,`fname`,`mname`,`lname`,`f_name`,`strm`,`md`,`gndr`,`bs_fc`,`bus_station`,`sec`,`strm`,`schlr_no` from `stdnt_reg` where `id`='".$schlr_no_id."' && `continoue_discontinoue_status`='0'");
	while($arr=mysql_fetch_array($sel))
	{
		$schlr_no=$arr['schlr_no'];
		$sel_temp_tc_stdnt=mysql_query("select * from  tc_serial_no where schlr_no_id='".$arr['id']."' && `status`='1'");
		$cnt_temp_tc_stdnt=mysql_num_rows($sel_temp_tc_stdnt);
		if($cnt_temp_tc_stdnt==0)
		{
			$sel1=mysql_query("select `cls` from class where sno='".$arr['cls']."'");
			$arr1=mysql_fetch_array($sel1);
			
			 $sel_sec=mysql_query("select * from `section` where `sno`='".$arr['sec']."'");
             $arr_sec=mysql_fetch_array($sel_sec);
			 
			 $sel_strm=mysql_query("select * from stream where `sno`='".$arr['strm']."'");
             $arr_strm=mysql_fetch_array($sel_strm);
$station=$arr['bus_station'];
?>
	<table style="width:50%;" align="center">
<tr><th style="font-size:18px"> <u>Fee Structure</u> </th></tr>
</table>
<br/>
<div style="width:100%;  float:left;">
    <div style="float:left; width:28%;"> 
<!--    <img align="right" src='img/alok.png' width="100"/>-->
   
    </div>
    <div style="float:right; width:68%;">
    <table style="margin-left:10%">
    <tr><th align="left"> Scholar No. : </th><td>&nbsp;<?php echo $schlr_no; ?></td></tr>
    <tr><th align="left"> Name : </th><td>&nbsp;<?php echo $arr['fname']." ".$arr['mname']." ".$arr['lname']; ?></td></tr>
    <tr><th align="left"> Father's Name : </th><td>&nbsp;<?php echo $arr['f_name']; ?></td></tr>
    <tr><th align="left"> Class : </th><td>&nbsp;<?php echo $arr1['cls']; ?></td></tr>
    <tr><th align="left"> Stream : </th><td>&nbsp;<?php echo $arr_strm['strm']; ?></td></tr>
      <tr><th align="left"> Section : </th><td>&nbsp;<?php echo $arr_sec['section']; ?></td></tr>
    </table>
    <br/>
<table style="width:70%;">
<tr><th style="font-size:18px"> <u>Year <?php echo $session; ?></u> </th></tr>
</table><br/>
<table style="width:70%;" align="left" border="1">
<?php
$s1=mysql_query("select id from `cls_fee_comp_setup1` where cls='".$arr['cls']."' && strm='".$arr['strm']."' && medium='".$arr['md']."'");
@$t3=mysql_fetch_array($s1);
$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='".$t3['id']."'");
while($t5=mysql_fetch_array($sel5))
{
	$mfc=$t5['m_f_c'];
	$amt=$t5['amt'];
	$sel_ft=mysql_query("select * from fee_type where sno='$mfc'");
	$arr_ft=mysql_fetch_array($sel_ft);
	$fee_type=$arr_ft['type'];
	if($arr_ft['station'] ==$station && $fee_type =="Bus Fee(Boys)" && $arr['gndr']=='Male')
	{
		if(@$arr['bs_fc']=="Yes")
		{
			$total+=$amt;
			
			?>
            <tr><th style=" border-right:none;" align="right" width="60%"><?php echo $fee_type; ?>&nbsp;&nbsp;</th><th style="border-left:none;"><?php echo $amt; ?></th></tr>
            <?php

		}
	}
	else if($arr_ft['station'] ==$station && $fee_type =="Bus Fee(Girls)" && $arr['gndr']=='Female')
	{
		if(@$arr['bs_fc']=="Yes")
		{
			$total+=$amt;
			?>
    		<tr><th style=" border-right:none;" align="right"><?php echo $fee_type; ?>&nbsp;&nbsp;</th><th style="border-left:none;"><?php echo $amt; ?></th></tr>
   			 <?php
		}
	}
	else if($fee_type  !="Bus Fee(Boys)" && $fee_type  !="Bus Fee(Girls)")
	{
		 $total+=$amt;
		$sel_edit_invoice=mysql_query("select * from `edit_invoice` where `schlr_no_id`='".$arr['id']."' && `fee_type`='$mfc'  && `fee`!='0' ORDER BY id DESC LIMIT 1");
		 $num_edit_invoice=mysql_num_rows($sel_edit_invoice);
		$arr_edit_invoice=mysql_fetch_array($sel_edit_invoice);
		if(!empty($num_edit_invoice))
		{
			?>
		<tr><th style=" border-right:none;" align="right"><?php echo $fee_type; ?>&nbsp;&nbsp;</th><th style="border-left:none;"><?php echo $arr_edit_invoice['fee']; ?></th></tr>
		<?php
		}
		else
		{
		?>
		<tr><th style=" border-right:none;" align="right"><?php echo $fee_type; ?>&nbsp;&nbsp;</th><th style="border-left:none;"><?php echo $amt; ?></th></tr>
		<?php
		}
	}
}
		
?>


<!--<tr><th style=" border-right:none;" align="right">Total &nbsp;&nbsp;</th><th style="border-left:none;"><?php echo $total; ?></th></tr>-->
</table>
</div>
</div>
<?php
	}
}
}
?>
</body>
</html>

