<?php
require_once("conn.php");
$schlr_no_id=$_GET['schlr_no_id'];
$fee_type=$_GET['fee_type'];

$sel_stdnt=mysql_query("select `id` from `stdnt_reg` where `id`='$schlr_no_id'");
$arr_stdnt=mysql_fetch_array($sel_stdnt);
$schlr_no=$arr_stdnt['schlr_no'];		
if($fee_type=='old_monthly_fee')
{
	$s=mysql_query("select * from `mnth_rcpt_no`");
	$t1=mysql_fetch_array($s);
	$r=$t1['mnth_rcpt_no']+1;
		
	$sel_old=mysql_query("select `monthly_fee` from `old_fee` where `schlr_no_id`='".$schlr_no_id."'");
	$arr_old=mysql_fetch_array($sel_old);
	
	$sel_submit=mysql_query("select `amt` from `old_fee_submit` where `schlr_no_id`='".$schlr_no_id."' && `fee_type`='1'");
	while($arr_submit=mysql_fetch_array($sel_submit))
	{
		$amount+=$arr_submit['amt'];
	}
	$amt=$arr_old['monthly_fee']-$amount;
	?>
	<input class="form-control" type="text" name="amt" id="inst" value="<?php echo $amt; ?>" onkeyup="old_fee_install()"/> 
    <div id="toast-container" class="toast-top-right" >
        <div class="toast toast-info">
         <button class="toast-close-button">×</button>
            <div class="toast-message">
          <h4> Receipt No. &nbsp;&nbsp;<?php echo $r; ?></h4>
          <input type="hidden" id="old_fee_receipt" value="<?php echo $r; ?>">
            </div>
        </div>
    </div>
    <?php
}
else if($fee_type=='old_hostel_fee')
{
	$s1=mysql_query("select * from `hstl_rcpt_no`");
	$rec=mysql_fetch_array($s1);
	$r=$rec['hstl_rcpt_no']+1;
		
	$sel_old=mysql_query("select `hostel_fee` from `old_fee` where `schlr_no_id`='".$schlr_no_id."'");
	$arr_old=mysql_fetch_array($sel_old);
	
	$sel_submit=mysql_query("select `amt` from `old_fee_submit` where `schlr_no_id`='".$schlr_no_id."' && `fee_type`='2'");
	while($arr_submit=mysql_fetch_array($sel_submit))
	{
		$amount+=$arr_submit['amt'];
	}
	$amt=$arr_old['hostel_fee']-$amount;
	
	?>
	 <input class="form-control" type="text" name="amt" id="inst" value="<?php echo $amt; ?>" onkeyup="old_fee_install()"/> 
     <div id="toast-container" class="toast-top-right" >
        <div class="toast toast-info">
         <button class="toast-close-button">×</button>
            <div class="toast-message">
          <h4> Receipt No. &nbsp;&nbsp;<?php echo $r; ?></h4>
          <input type="hidden" id="old_fee_receipt" value="<?php echo $r; ?>">
            </div>
        </div>
    </div>
    <?php
}
?>