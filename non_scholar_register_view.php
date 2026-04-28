<?php
require_once("conn.php");
include("authentication.php");
require_once("function.php");
  $cls=$_GET['con'];
?>
<html>
<head>
<title>Non Scholars Register</title>
<?php print_css(); ?>
</head>
<body class="white-color-display">
<table  class="table " style="width:100%;">
<tr>
<th align="center">Non Scholars Register</th>
</tr>
<tr><td align="center"><?php echo $session; ?></td></tr>
</table>
<table  class="table table-bordered" style="width:100%;">
<thead>
<tr>
<th width="10%">Receipt Date</th><th width="30%">Name</th><th width="10%">Receipt No.</th><th width="15%">Fee Component</th><th width="25%">Remarks</th><th width="10%">Amount</th>
</tr>
</thead>
<tbody>
<?php
$fromm=$_POST['from'];
$too=$_POST['to'];
$from=date("Y-m-d", strtotime($fromm));
$to=date("Y-m-d", strtotime($too));
$sel_nonscholar=mysql_query("select * from `nonscholler_fee` where `date`>='".$from."' && `date`<='".$to."'");
while($arr_nonscholar=mysql_fetch_array($sel_nonscholar))
{
	?>
    <tr>
    <td><?php echo date('d-M-Y' , strtotime($arr_nonscholar['date'])); ?></td>
    <td><?php echo $arr_nonscholar['detail']; ?></td>
    <td align="right"><?php echo $arr_nonscholar['rcpt_no']; ?></td>
    <td>
	<?php 
	$sel_ft=mysql_query("select * from fee_type where sno='".$arr_nonscholar['fee_type']."'");
	$arr_ft=mysql_fetch_array($sel_ft);
	echo $fee_type=$arr_ft['type'];
	
	 ?>
    </td>
    
    <td><?php echo $arr_nonscholar['remark']; ?></td>
    <td align="right"><?php echo $arr_nonscholar['amt']; ?></td>
    </tr>
    <?php
	$grand_total+=$arr_nonscholar['amt'];
}

?> <tr>
    <th style="text-align:center; font-size:18px;" colspan="5"><strong>Grand Total</strong></th><th style="text-align:right; font-size:18px;"><strong><?php echo $grand_total; ?></strong></th>
    </tr>

</tbody>
</table>
</body>
</html>