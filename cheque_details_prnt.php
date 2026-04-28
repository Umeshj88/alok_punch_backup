<?php
require_once("conn.php");
@$from=$_GET['from'];
@$to=$_GET['to'];
@$notdisplay=$_GET['notdisplay'];
@$ndt = date("Y-m-d", strtotime($from));
@$cdt = date("Y-m-d", strtotime($to));
?>
<link href="assets/css/print_page.css" rel="stylesheet" type="text/css"/>
 <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>


            <?php
            if($from!=NULL && $to !=NULL)
            {
            $from=date("d-M-Y", strtotime($from));
            $to=date("d-M-Y", strtotime($to));
			$table_id=0;
            ?>
            <table style="width:100%;">
            <tr>
            <td align="center"><label><h3 > Cheque Details</h3></label></td>
            </tr>
            <tr>
            <td align="center"><label><?php echo $from; ?> to <?php echo $to;?></label></td>
            </tr>
            </table>
            <?php
            // Convert to UNIX timestamps
            $currentTime = strtotime($ndt);
            $endTime = strtotime($cdt);
            
            $result = array();
            while ($currentTime <= $endTime) {
            if (date('N', $currentTime) < 8) {
            $result[] = date('Y-m-d', $currentTime);
            }
            $currentTime = strtotime('+1 day', $currentTime);
            }
            foreach($result as $value)
            {
            $i=$value;
            $j=0;
            $k=0;
            $l=0;
            $temp=0;
            $temp1=0;
            $temp2=0;
            $amt1=0;
            $dep1=0;
            $dep2=0;
            $dat1=date("d-M-Y", strtotime($i));
			$table_id++;
			?>



<table class="table table-bordered table-hover" style="width:100%; border-top:groove;" id="table<?php echo $table_id; ?>">
<thead>
<tr>
<td colspan="8" >Date Of Receipt<label style="padding-left:2%;"><?php echo @$dat1; ?></label></td>
</tr>
<tr>
<th align="center">SNo.</th><th align="center">Cheque No.</th><th align="right">Name</th><th align="center">Scholar No.</th><th align="center">Class</th><th align="right">Receipt Type & No.</th><th align="center">Receipt Date</th><th align="center" >Rec. Amount</th>
</tr>
</thead>
<?php

$sel1=mysql_query("select * from `annl_fee` where date='$i' && chq_no>'0'");
while($arr1=mysql_fetch_array($sel1))
{
	$j++;
$rn=$arr1['recpt_no'];
$store_data[]=$rn;
$chq=$arr1['chq_no'];
$schlr_no_id=$arr1['schlr_no_id'];
$amt=$arr1['fee_dp'];

$sel4=mysql_query("select * from stdnt_reg where `id`='$schlr_no_id'");
$arr4=mysql_fetch_array($sel4);
$fname=$arr4['fname'];
$mname=$arr4['mname'];
$lname=$arr4['lname'];
$cls=$arr4['cls'];
$strm=$arr4['strm'];
$md=$arr4['md'];
$schlr_no=$arr4['schlr_no'];

$a=mysql_query("select * from class where `sno`='$cls'");
 $row=mysql_fetch_array($a);
 
 $sql_="select * from stream where `sno`='$strm'";
 $sql=mysql_query($sql_);
 $t=mysql_fetch_array($sql);
 
 $sql_1="select * from medium where `sno`='$md'";
 $sql1=mysql_query($sql_1);
 $t1=mysql_fetch_array($sql1);
?>

<tr>
<td align="center"><?php echo $j; ?></td><td align="center"><?php echo $chq; ?></td><td><?php echo $fname." ".$lname; ?></td><td align="center"><?php echo $schlr_no; ?></td><td align="center"><?php echo $row['cls']."(".$t['strm'].")-".$t1['medium']; ?></td><td align="right">General Fee - <?php echo $rn; ?></td><td align="center"><?php echo $dat1; ?></td><td align="center"><?php echo $amt; ?></td>
</tr>

<?php
}
$sel2=mysql_query("select * from mnth_fee_1 where dat='$i' && chq_no>'0'");
while($arr2=mysql_fetch_array($sel2))
{
	$j++;
	$rec=$arr2['recpt_no'];
	$store_data[]=$rec;
	$dep=$arr2['fee_dp'];
	$chq=$arr2['chq_no'];
	$schlr_no_id=$arr2['schlr_no_id'];
	$sel4=mysql_query("select * from stdnt_reg where `id`='$schlr_no_id'");
	$arr4=mysql_fetch_array($sel4);
	$fname=$arr4['fname'];
	$mname=$arr4['mname'];
	$lname=$arr4['lname'];
	$cls=$arr4['cls'];
	$strm=$arr4['strm'];
	$md=$arr4['md'];
	$schlr_no=$arr4['schlr_no'];

$a=mysql_query("select * from class where `sno`='$cls'");
 $row=mysql_fetch_array($a);
 
 $sql_="select * from stream where `sno`='$strm'";
 $sql=mysql_query($sql_);
 $t=mysql_fetch_array($sql);
 
 $sql_1="select * from medium where `sno`='$md'";
 $sql1=mysql_query($sql_1);
 $t1=mysql_fetch_array($sql1);
?>
<tr>
<td align="center"><?php echo $j; ?></td><td align="center"><?php echo $chq; ?></td><td><?php echo $fname." ".$mname." ".$lname; ?></td><td align="center"><?php echo $schlr_no; ?></td><td align="center"><?php echo $row['cls']."(".$t['strm'].")-".$t1['medium']; ?></td><td align="right">Monthly Fee - <?php echo $rec; ?></td><td align="center"><?php echo $dat1; ?></td><td align="center"><?php echo $dep; ?></td>
</tr>
<?php
}

$sel3=mysql_query("select * from hstl_fee where dat='$i' && chq_no>'0'");
while($arr2=mysql_fetch_array($sel3))
{
	$j++;
$rec1=$arr2['rcpt_no'];
$store_data[]=$rec1;
$depp=$arr2['deposit'];
$chq=$arr2['chq_no'];
$schlr_no_id=$arr2['schlr_no_id'];

$sel4=mysql_query("select * from stdnt_reg where id='$schlr_no_id'");
$arr4=mysql_fetch_array($sel4);
$fname=$arr4['fname'];
$mname=$arr4['mname'];
$lname=$arr4['lname'];
$cls=$arr4['cls'];
$strm=$arr4['strm'];
$md=$arr4['md'];
$schlr_no=$arr4['schlr_no'];
 $a=mysql_query("select * from class where `sno`='$cls'");
 $row=mysql_fetch_array($a);
 
 $sql_="select * from stream where `sno`='$strm'";
 $sql=mysql_query($sql_);
 $t=mysql_fetch_array($sql);
 
 $sql_1="select * from medium where `sno`='$md'";
 $sql1=mysql_query($sql_1);
 $t1=mysql_fetch_array($sql1);
?>
<tr>
<td align="center"><?php echo $j; ?></td><td align="center"><?php echo $chq; ?></td><td><?php echo $fname." ".$mname." ".$lname; ?></td><td align="center"><?php echo $schlr_no; ?></td><td align="center"><?php echo $row['cls']."(".$t['strm'].")-".$t1['medium']; ?></td><td align="right">Hostle Fee - <?php echo $rec1; ?></td><td align="center"><?php echo $dat1; ?></td><td align="center"><?php echo $depp; ?></td>
</tr>
<?php
}
$sel3=mysql_query("select * from `old_fee_submit` where `date`='$i' && chq_no>'0'");
while($arr2=mysql_fetch_array($sel3))
{
	$j++;
$rec1=$arr2['rcpt_no'];
$store_data[]=$rec1;
$depp=$arr2['fee_dp'];
$chq=$arr2['chq_no'];
$schlr_no_id=$arr2['schlr_no_id'];
$fee_type=$arr2['fee_type'];
$sel4=mysql_query("select * from stdnt_reg where id='$schlr_no_id'");
$arr4=mysql_fetch_array($sel4);
$fname=$arr4['fname'];
$mname=$arr4['mname'];
$lname=$arr4['lname'];
$cls=$arr4['cls'];
$strm=$arr4['strm'];
$md=$arr4['md'];
$schlr_no=$arr4['schlr_no'];
 $a=mysql_query("select * from class where `sno`='$cls'");
 $row=mysql_fetch_array($a);
 
 $sql_="select * from stream where `sno`='$strm'";
 $sql=mysql_query($sql_);
 $t=mysql_fetch_array($sql);
 
 $sql_1="select * from medium where `sno`='$md'";
 $sql1=mysql_query($sql_1);
 $t1=mysql_fetch_array($sql1);
?>
<tr>
<td align="center"><?php echo $j; ?></td><td align="center"><?php echo $chq; ?></td><td><?php echo $fname." ".$mname." ".$lname; ?></td><td align="center"><?php echo $schlr_no; ?></td><td align="center"><?php echo $row['cls']."(".$t['strm'].")-".$t1['medium']; ?></td><td align="right"><?php if($fee_type==1){ echo 'Monthly Fee'; } else if($fee_type==2){ echo 'Hostle Fee'; }?>  - <?php echo $rec1; ?></td><td align="center"><?php echo $dat1; ?></td><td align="center"><?php echo $depp; ?></td>
</tr>
<?php
}
$sel3=mysql_query("select * from `adhoc` where date='$i' && chq_no>'0'");
while($arr2=mysql_fetch_array($sel3))
{
	$j++;
$rec1=$arr2['rcpt_no'];
$store_data[]=$rec1;
$depp=$arr2['amt'];
$chq=$arr2['chq_no'];
$schlr_no_id=$arr2['schlr_no_id'];

$sel4=mysql_query("select * from stdnt_reg where id='$schlr_no_id'");
$arr4=mysql_fetch_array($sel4);
$fname=$arr4['fname'];
$mname=$arr4['mname'];
$lname=$arr4['lname'];
$cls=$arr4['cls'];
$strm=$arr4['strm'];
$md=$arr4['md'];
$schlr_no=$arr4['schlr_no'];
 $a=mysql_query("select * from class where `sno`='$cls'");
 $row=mysql_fetch_array($a);
 
 $sql_="select * from stream where `sno`='$strm'";
 $sql=mysql_query($sql_);
 $t=mysql_fetch_array($sql);
 
 $sql_1="select * from medium where `sno`='$md'";
 $sql1=mysql_query($sql_1);
 $t1=mysql_fetch_array($sql1);
?>
<tr>
<td align="center"><?php echo $j; ?></td><td align="center"><?php echo $chq; ?></td><td><?php echo $fname." ".$mname." ".$lname; ?></td><td align="center"><?php echo $schlr_no; ?></td><td align="center"><?php echo $row['cls']."(".$t['strm'].")-".$t1['medium']; ?></td><td align="right">Hostle Fee - <?php echo $rec1; ?></td><td align="center"><?php echo $dat1; ?></td><td align="center"><?php echo $depp; ?></td>
</tr>
<?php
}
$sel3=mysql_query("select * from `nonscholler_fee` where date='$i' && chq_no>'0'");
while($arr2=mysql_fetch_array($sel3))
{
	$j++;
$rec1=$arr2['rcpt_no'];
$store_data[]=$rec1;
$depp=$arr2['amt'];
$chq=$arr2['chq_no'];
$schlr_no_id=$arr2['schlr_no_id'];
$detail=$arr2['detail'];

?>
<tr>
<td align="center"><?php echo $j; ?></td><td align="center"><?php echo $chq; ?></td><td><?php echo $detail; ?></td><td align="center"></td><td align="center"></td><td align="right">Adhoc Nonschollar Fee - <?php echo $rec1; ?></td><td align="center"><?php echo $dat1; ?></td><td align="center"><?php echo $depp; ?></td>
</tr>
<?php
}
?>
</table>
<?php
if(!is_array($store_data))
{
	?>
        <script type="text/javascript">
        $( document ).ready(function() {
			$("#table<?php echo $table_id; ?>").remove();
		});
		</script>
        <?php
		
}
unset($store_data);
}
}
?>

            