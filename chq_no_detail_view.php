<?php
require_once("conn.php");
$chqno=$_GET['chqno'];
$receipt_no=$_GET['receipt_no'];

?>
<link href="assets/css/print_page.css" rel="stylesheet" type="text/css"/>
<table style="width:100%;">
<tr>
<td align="center"><label><h3 >Cheque No. Details</h3></label></td>
</tr>
<tr>
</tr>
</table>
<table style="width:100%;" border="1">
<tr>
<td>Recept No.</td><td>Scholar No.</td><td>Student Name</td><td>Father Name</td><td>Date</td><td>Cheque No.</td><td>Cheque Date</td><td>Bank</td><td>Amount</td><td>Fee Type</td>
</tr>

<?php
if(!empty($chqno))
{
	$condition="where  `chq_no`='".$chqno."'";
	$condition1="where  `chq_no`='".$chqno."'";
}
if(!empty($receipt_no))
{
	if(!empty($chqno))
	{
		$condition.=" && `recpt_no`='".$receipt_no."'";
		$condition1.=" && `rcpt_no`='".$receipt_no."'";
	}
	else
	{
			$condition="where  `recpt_no`='".$receipt_no."'";
			$condition1="where  `rcpt_no`='".$receipt_no."'";
	}
}
$sel_annl_fee=mysql_query("select * from `annl_fee`  $condition");
$annl_num=mysql_num_rows($sel_annl_fee);
if(!empty($annl_num))
{
	while($arr_annl_fee=mysql_fetch_array($sel_annl_fee))
	{
		$schlr_no_id =$arr_annl_fee['schlr_no_id'];
		$recpt_no=$arr_annl_fee['recpt_no'];
		$chq_no=$arr_annl_fee['chq_no'];
		$bank=$arr_annl_fee['bnk'];
		$dat=$arr_annl_fee['dat'];
		
		if($arr_annl_fee['dt1']!='0000-00-00')
		{
			$chq_dat=$arr_annl_fee['dt1'];
		}
		$amnt=$arr_annl_fee['fee_dp'];
		$fee_type="Annul Fee";
		?>
        <tr>
        <td><?php echo $recpt_no;?></td><td><?php echo $schlr_no;?></td><td><?php echo $stdnt_name_f." ".$stdnt_name_m." ".$stdnt_name_l;?></td><td><?php echo $father_name;?></td><td><?php echo date('d-m-Y', strtotime($dat));?></td><td><?php echo $chq_no;?></td><td><?php if($arr_annl_fee['dt1']!='0000-00-00'){ echo date('d-m-Y', strtotime($chq_dat)); } ?></td><td><?php echo $bank;?></td><td><?php echo $amnt;?></td><td><?php echo $fee_type;?></td>
        </tr>
    <?php
	}
}

$sel_mnth_fee=mysql_query("select * from `mnth_fee_1`  $condition");
$mnth_num=mysql_num_rows($sel_mnth_fee);
if(!empty($mnth_num))
{
	while($arr_mnth_fee=mysql_fetch_array($sel_mnth_fee))
	{
		$schlr_no_id =$arr_mnth_fee['schlr_no_id'];
		$recpt_no=$arr_mnth_fee['recpt_no'];
		$chq_no=$arr_mnth_fee['chq_no'];
		$bank=$arr_mnth_fee['bnk'];
		$dat=$arr_mnth_fee['dat'];
		if($arr_mnth_fee['dt1']!='0000-00-00')
		{
			$chq_dat=$arr_mnth_fee['dt1'];
		}
		$amnt=$arr_mnth_fee['fee_dp'];
		$fee_type="Monthly Fee";
		$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='".$schlr_no_id."'");
		$arr_stdnt=mysql_fetch_array($sel_stdnt);
		$stdnt_name_f=$arr_stdnt['fname'];
		$stdnt_name_m=$arr_stdnt['mname'];
		$stdnt_name_l=$arr_stdnt['lname'];
		$father_name=$arr_stdnt['f_name'];
		$schlr_no=$arr_stdnt['schlr_no'];
	?>
	<tr>
	<td><?php echo $recpt_no;?></td><td><?php echo $schlr_no;?></td><td><?php echo $stdnt_name_f." ".$stdnt_name_m." ".$stdnt_name_l;?></td><td><?php echo $father_name;?></td><td><?php echo date('d-m-Y', strtotime($dat));?></td><td><?php echo $chq_no;?></td><td><?php if($arr_mnth_fee['dt1']!='0000-00-00') { echo date('d-m-Y', strtotime($chq_dat)); } ?></td><td><?php echo $bank;?></td><td><?php echo $amnt;?></td><td><?php echo $fee_type;?></td>
	</tr>
<?php
}
}

$sel_hstl_fee=mysql_query("select * from `hstl_fee` $condition1");
$hstl_num=mysql_num_rows($sel_hstl_fee);
if(!empty($hstl_num))
{
	while($arr_hstl_fee=mysql_fetch_array($sel_hstl_fee))
	{
		$schlr_no_id =$arr_hstl_fee['schlr_no_id'];
		$recpt_no=$arr_hstl_fee['rcpt_no'];
		$chq_no=$arr_hstl_fee['chq_no'];
		$bank=$arr_hstl_fee['bank'];
		$dat=$arr_hstl_fee['dat'];
		if($arr_hstl_fee['c_date']!='0000-00-00')
		{
			$chq_dat=$arr_hstl_fee['c_date'];
		}
		$amnt=$arr_hstl_fee['deposit'];
		$fee_type="Hostel Fee";
		$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='".$schlr_no_id."'");
		$arr_stdnt=mysql_fetch_array($sel_stdnt);
		$stdnt_name_f=$arr_stdnt['fname'];
		$stdnt_name_m=$arr_stdnt['mname'];
		$stdnt_name_l=$arr_stdnt['lname'];
		$father_name=$arr_stdnt['f_name'];
		$schlr_no=$arr_stdnt['schlr_no'];
		?>
		<tr>
		<td><?php echo $recpt_no;?></td><td><?php echo $schlr_no;?></td><td><?php echo $stdnt_name_f." ".$stdnt_name_m." ".$stdnt_name_l;?></td><td><?php echo $father_name;?></td><td><?php echo date('d-m-Y', strtotime($dat));?></td><td><?php if(!empty($chq_no)){ echo $chq_no; } ?></td><td><?php if($arr_hstl_fee['c_date']!='0000-00-00'){ echo date('d-m-Y', strtotime($chq_dat)); } ?></td><td><?php echo $bank;?></td><td><?php echo $amnt;?></td><td><?php echo $fee_type;?></td>
		</tr>
<?php
	}
}

$sel_cautn_fee=mysql_query("select * from `cautn_fee`  $condition1");
$cautn_num=mysql_num_rows($sel_cautn_fee);
if(!empty($cautn_num))
{
	while($arr_cautn_fee=mysql_fetch_array($sel_cautn_fee))
	{
		$schlr_no_id =$arr_cautn_fee['schlr_no_id'];
		$recpt_no=$arr_cautn_fee['rcpt_no'];
		$chq_no=$arr_cautn_fee['chq_no'];
		$bank=$arr_cautn_fee['bank'];
		$dat=$arr_cautn_fee['date'];
		if($arr_cautn_fee['chq_dt']!='0000-00-00')
		{
			$chq_dat=$arr_cautn_fee['chq_dt'];
		}
		$amnt=$arr_cautn_fee['amt'];
		$fee_type="Caution Fee";
		$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='".$schlr_no_id."'");
		$arr_stdnt=mysql_fetch_array($sel_stdnt);
		$stdnt_name_f=$arr_stdnt['fname'];
		$stdnt_name_m=$arr_stdnt['mname'];
		$stdnt_name_l=$arr_stdnt['lname'];
		$father_name=$arr_stdnt['f_name'];
		$schlr_no=$arr_stdnt['schlr_no'];
		?>
		<tr>
		<td><?php echo $recpt_no;?></td><td><?php echo $schlr_no;?></td><td><?php echo $stdnt_name_f." ".$stdnt_name_m." ".$stdnt_name_l;?></td><td><?php echo $father_name;?></td><td><?php echo date('d-m-Y', strtotime($dat));?></td><td><?php echo $chq_no;?></td><td><?php if($arr_cautn_fee['chq_dt']!='0000-00-00'){ echo date('d-m-Y', strtotime($chq_dat)); } ?></td><td><?php echo $bank;?></td><td><?php echo $amnt;?></td><td><?php echo $fee_type;?></td>
		
		
		</tr>
	<?php
	}
}

$sel_adhoc_fee=mysql_query("select * from `adhoc_fee`  $condition1");
$adhoc_num=mysql_num_rows($sel_adhoc_fee);
if(!empty($adhoc_num))
{
	while($arr_adhoc_fee=mysql_fetch_array($sel_adhoc_fee))
	{
		$schlr_no_id =$arr_adhoc_fee['schlr_no_id'];
		$recpt_no=$arr_adhoc_fee['rcpt_no'];
		$chq_no=$arr_adhoc_fee['chq_no'];
		$bank=$arr_adhoc_fee['bank'];
		$dat=$arr_adhoc_fee['date'];
		if($arr_adhoc_fee['chq_dt']!='0000-00-00')
		{
			$chq_dat=$arr_adhoc_fee['chq_dt'];
		}
		$amnt=$arr_adhoc_fee['amt'];
		$fee_type="Adhoc Fee";
		$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='".$schlr_no_id."'");
		$arr_stdnt=mysql_fetch_array($sel_stdnt);
		$stdnt_name_f=$arr_stdnt['fname'];
		$stdnt_name_m=$arr_stdnt['mname'];
		$stdnt_name_l=$arr_stdnt['lname'];
		$father_name=$arr_stdnt['f_name'];
		$schlr_no=$arr_stdnt['schlr_no'];
		?>
		<tr>
		<td><?php echo $recpt_no;?></td><td><?php echo $schlr_no;?></td><td><?php echo $stdnt_name_f." ".$stdnt_name_m." ".$stdnt_name_l;?></td><td><?php echo $father_name;?></td><td><?php echo date('d-m-Y', strtotime($dat));?></td><td><?php echo $chq_no;?></td><td><?php if($arr_adhoc_fee['chq_dt']!='0000-00-00') { echo date('d-m-Y', strtotime($chq_dat)); } ?></td><td><?php echo $bank;?></td><td><?php echo $amnt;?></td><td><?php echo $fee_type;?></td>
		
		
		</tr>
	<?php
	}
}
$sel_adhoc_fee=mysql_query("select * from `old_fee_submit`  $condition1");
$adhoc_num=mysql_num_rows($sel_adhoc_fee);
if(!empty($adhoc_num))
{
	while($arr_adhoc_fee=mysql_fetch_array($sel_adhoc_fee))
	{
		$schlr_no_id =$arr_adhoc_fee['schlr_no_id'];
		$recpt_no=$arr_adhoc_fee['rcpt_no'];
		$chq_no=$arr_adhoc_fee['chq_no'];
		$bank=$arr_adhoc_fee['bank'];
		$dat=$arr_adhoc_fee['date'];
		if($arr_adhoc_fee['chq_dt']!='0000-00-00')
		{
			$chq_dat=$arr_adhoc_fee['chq_dt'];
		}
		$amnt=$arr_adhoc_fee['fee_dp'];
		$fee_type="Old Fee";
		$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='".$schlr_no_id."'");
		$arr_stdnt=mysql_fetch_array($sel_stdnt);
		$stdnt_name_f=$arr_stdnt['fname'];
		$stdnt_name_m=$arr_stdnt['mname'];
		$stdnt_name_l=$arr_stdnt['lname'];
		$father_name=$arr_stdnt['f_name'];
		$schlr_no=$arr_stdnt['schlr_no'];
		?>
		<tr>
		<td><?php echo $recpt_no;?></td><td><?php echo $schlr_no;?></td><td><?php echo $stdnt_name_f." ".$stdnt_name_m." ".$stdnt_name_l;?></td><td><?php echo $father_name;?></td><td><?php echo date('d-m-Y', strtotime($dat));?></td><td><?php echo $chq_no;?></td><td><?php if($arr_adhoc_fee['chq_dt']!='0000-00-00') { echo date('d-m-Y', strtotime($chq_dat)); } ?></td><td><?php echo $bank;?></td><td><?php echo $amnt;?></td><td><?php echo $fee_type;?></td>
		
		
		</tr>
	<?php
	}
}
$sel_adhoc_fee=mysql_query("select * from `nonscholler_fee`  $condition1");
$adhoc_num=mysql_num_rows($sel_adhoc_fee);
if(!empty($adhoc_num))
{
	while($arr_adhoc_fee=mysql_fetch_array($sel_adhoc_fee))
	{
		$schlr_no_id =$arr_adhoc_fee['schlr_no_id'];
		$recpt_no=$arr_adhoc_fee['rcpt_no'];
		$chq_no=$arr_adhoc_fee['chq_no'];
		$bank=$arr_adhoc_fee['bank'];
		$dat=$arr_adhoc_fee['date'];
		$detail=$arr_adhoc_fee['detail'];
		if($arr_adhoc_fee['chq_dt']!='0000-00-00')
		{
			$chq_dat=$arr_adhoc_fee['chq_dt'];
		}
		$amnt=$arr_adhoc_fee['amt'];
		$fee_type="Adhoc Nonschollar Fee";
		
		?>
		<tr>
		<td><?php echo $recpt_no;?></td><td></td><td><?php echo $detail;?></td><td></td><td><?php echo date('d-m-Y', strtotime($dat));?></td><td><?php echo $chq_no;?></td><td><?php if($arr_adhoc_fee['chq_dt']!='0000-00-00') { echo date('d-m-Y', strtotime($chq_dat)); } ?></td><td><?php echo $bank;?></td><td><?php echo $amnt;?></td><td><?php echo $fee_type;?></td>
		
		
		</tr>
	<?php
	}
}


?>
</table>
