<?php
session_start();
require_once("function.php");

$dbHost=getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost';
$dbUser=getenv('DB_USER') ? getenv('DB_USER') : 'root';
$dbPass=getenv('DB_PASS') ? getenv('DB_PASS') : '';
$s=mysql_connect($dbHost,$dbUser,$dbPass) or die('Error connecting to MySQL server: ' . mysql_error());

if(empty($_SESSION['session']))
{
	mysql_select_db('fee_session',$s) or die('Error selecting MySQL database: ' . mysql_error());
	$sel_session=mysql_query("select * from `user_session`");
	$arr_session=mysql_fetch_array($sel_session);
	$_SESSION['session']=$arr_session['session'];
}

$session=$_SESSION['session'];
mysql_select_db($session,$s) or die('Error selecting MySQL database: ' . mysql_error());

$type = isset($_GET['type']) ? mysql_real_escape_string($_GET['type']) : '';
$rcpt_no = isset($_GET['recpt_no']) ? mysql_real_escape_string($_GET['recpt_no']) : '';
$schlr_no_id = isset($_GET['schlr_no_id']) ? mysql_real_escape_string($_GET['schlr_no_id']) : '';

if(empty($type) || empty($rcpt_no) || empty($schlr_no_id))
{
	die('Receipt details missing.');
}

function receipt_student($schlr_no_id)
{
	$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='".$schlr_no_id."'");
	$arr_stdnt=mysql_fetch_array($sel_stdnt);
	if(empty($arr_stdnt))
	{
		return false;
	}
	$sel_cls=mysql_query("select * from `class` where `sno`='".$arr_stdnt['cls']."'");
	$arr_cls=mysql_fetch_array($sel_cls);
	$sel_md=mysql_query("select * from medium where sno='".$arr_stdnt['md']."'");
	$arr_md=mysql_fetch_array($sel_md);
	$sel_strm=mysql_query("select * from `stream` where sno='".$arr_stdnt['strm']."'");
	$arr_strm=mysql_fetch_array($sel_strm);
	$sel_sec=mysql_query("select * from `section` where sno='".$arr_stdnt['sec']."'");
	$arr_sec=mysql_fetch_array($sel_sec);
	$arr_stdnt['_class']=$arr_cls['cls'];
	$arr_stdnt['_medium']=$arr_md['medium'];
	$arr_stdnt['_stream']=$arr_strm['strm'];
	$arr_stdnt['_section']=$arr_sec['section'];
	return $arr_stdnt;
}

function receipt_header($rcpt_no, $session, $date, $stdnt)
{
	$data="";
	$data.="\n";
	$data.="              ".$rcpt_no."           ".$session."\n";
	$data.="     ".date('d-M-Y', strtotime($date))."               ".$stdnt['schlr_no']."\n";
	$data.="           ".$stdnt['fname']." ".$stdnt['mname']." ".$stdnt['lname']."\n";
	$data.="           ".$stdnt['f_name']."\n";
	$data.="       ".$stdnt['_class']." ".$stdnt['_medium']." ".$stdnt['_stream']." (".$stdnt['_section'].")\n";
	$data.="\n\n";
	return $data;
}

function receipt_line($i, $label, $fee)
{
	$data="   ".$i." ".$label;
	$len=strlen($label);
	for($j=$len; $j<=28; $j++)
	{
		$data.=" ";
	}
	$data.=$fee."\n";
	return $data;
}

function receipt_concession($remark, $amount)
{
	if(empty($amount))
	{
		return "";
	}
	if(!empty($remark))
	{
		$space="";
		$len=strlen($remark);
		for($j=$len; $j<=19; $j++)
		{
			$space.=" ";
		}
		return "     Concession (".$remark.")".$space.$amount."\n";
	}
	return "     Concession                   ".$amount."\n";
}

function receipt_fine($remark, $amount)
{
	if(empty($amount))
	{
		return "";
	}
	if(!empty($remark))
	{
		$space="";
		$len=strlen($remark);
		for($j=$len; $j<=25; $j++)
		{
			$space.=" ";
		}
		return "     Fine (".$remark.")".$space.$amount."\n";
	}
	return "     Fine                         ".$amount."\n";
}

function receipt_footer($data, $num_row, $total, $chq_no, $bank)
{
	for($k=$num_row; $k<7; $k++)
	{
		$data.="\n";
	}
	$data.="                                  ".$total."\n\n       ".convert_number_to_words($total)." Only";
	if(!empty($chq_no))
	{
		$data.="\n Cheque NO.- ".$chq_no.", Bank Name- ".$bank;
	}
	return $data;
}

function build_monthly_receipt($rcpt_no, $schlr_no_id, $session)
{
	$stdnt=receipt_student($schlr_no_id);
	$sel=mysql_query("select * from `mnth_fee_1` where `recpt_no`='".$rcpt_no."' && `schlr_no_id`='".$schlr_no_id."' order by `sno` desc limit 1");
	$row=mysql_fetch_array($sel);
	if(empty($stdnt) || empty($row)) { return false; }
	$data=receipt_header($rcpt_no, $session, $row['dat'], $stdnt);
	$total=0; $num_row=0; $i=0;
	$condition = ($stdnt['rte']=='Yes') ? "" : " && `fee`>'0'";
	$sel_fee=mysql_query("select distinct fee_type from `mnth_fee2` where `mnth_fee1_sno`='".$row['sno']."' && `left`='0'".$condition);
	while($fee_row=mysql_fetch_array($sel_fee))
	{
		$i++;
		$tot_fee=0;
		$mnth_id=array();
		$sel_detail=mysql_query("select * from `mnth_fee2` where `mnth_fee1_sno`='".$row['sno']."' && `left`='0' && `fee_type`='".$fee_row['fee_type']."'".$condition);
		while($detail=mysql_fetch_array($sel_detail))
		{
			$tot_fee+=$detail['fee'];
			$total+=$detail['fee'];
			$mnth_id[]=$detail['mnth'];
		}
		$sel_ft=mysql_query("select * from fee_type where sno='".$fee_row['fee_type']."'");
		$arr_ft=mysql_fetch_array($sel_ft);
		$data.=receipt_line($i, $arr_ft['type'], $tot_fee);
		$num_row++;
		$data.="      (".implode(",", $mnth_id).")\n";
		$num_row++;
	}
	$data.=receipt_concession($row['cnrm'], $row['cncssn']); if(!empty($row['cncssn'])) { $num_row++; $total-=$row['cncssn']; }
	$data.=receipt_fine($row['cnrm'], $row['fyn']); if(!empty($row['fyn'])) { $num_row++; $total+=$row['fyn']; }
	return receipt_footer($data, $num_row, $total, $row['chq_no'], $row['bnk']);
}

function build_annual_receipt($rcpt_no, $schlr_no_id, $session)
{
	$stdnt=receipt_student($schlr_no_id);
	$sel=mysql_query("select * from `annl_fee` where `recpt_no`='".$rcpt_no."' && `schlr_no_id`='".$schlr_no_id."' order by `id` desc limit 1");
	$row=mysql_fetch_array($sel);
	if(empty($stdnt) || empty($row)) { return false; }
	$data=receipt_header($rcpt_no, $session, $row['dat'], $stdnt);
	$total=0; $num_row=0; $i=0;
	$sel_fee=mysql_query("select * from `annl_fee1` where `annl_fee_id`='".$row['id']."' && `fee`>'0'");
	while($fee_row=mysql_fetch_array($sel_fee))
	{
		$i++;
		$total+=$fee_row['fee'];
		$sel_ft=mysql_query("select * from fee_type where sno='".$fee_row['fee_type']."'");
		$arr_ft=mysql_fetch_array($sel_ft);
		$data.=receipt_line($i, $arr_ft['type'], $fee_row['fee']);
		$num_row++;
	}
	$data.=receipt_concession($row['cnrm'], $row['cncssn']); if(!empty($row['cncssn'])) { $num_row++; $total-=$row['cncssn']; }
	$data.=receipt_fine($row['cnrm'], $row['fyn']); if(!empty($row['fyn'])) { $num_row++; $total+=$row['fyn']; }
	return receipt_footer($data, $num_row, $total, $row['chq_no'], $row['bnk']);
}

function build_simple_receipt($rcpt_no, $schlr_no_id, $session, $type)
{
	$stdnt=receipt_student($schlr_no_id);
	if(empty($stdnt)) { return false; }
	$table=''; $date_field=''; $label=''; $amount_field=''; $chq_field='chq_no'; $bank_field='bank';
	if($type=='hostel') { $table='hstl_fee'; $date_field='dat'; $label='Hostel Fee'; $amount_field='gt'; $bank_field='bank'; }
	if($type=='caution') { $table='cautn_fee'; $date_field='date'; $label='Caution Fee'; $amount_field='amt'; }
	if($type=='adhoc') { $table='adhoc_fee'; $date_field='date'; $amount_field='amt'; }
	if($type=='old') { $table='old_fee_submit'; $date_field='date'; $amount_field='amt'; }
	if(empty($table)) { return false; }
	$receipt_col = ($type=='hostel' || $type=='caution' || $type=='adhoc' || $type=='old') ? 'rcpt_no' : 'recpt_no';
	$sel=mysql_query("select * from `".$table."` where `schlr_no_id`='".$schlr_no_id."' && `".$receipt_col."`='".$rcpt_no."' order by 1 desc limit 1");
	$row=mysql_fetch_array($sel);
	if(empty($row)) { return false; }
	if($type=='adhoc')
	{
		$sel_ft=mysql_query("select * from fee_type where sno='".$row['fee_type']."'");
		$arr_ft=mysql_fetch_array($sel_ft);
		$label=$arr_ft['type'];
	}
	if($type=='old')
	{
		$label=($row['fee_type']==1) ? 'Old Monthly fee' : 'Old Hostel fee';
	}
	$data=receipt_header($rcpt_no, $session, $row[$date_field], $stdnt);
	$total=$row[$amount_field];
	$data.=receipt_line(1, $label, $row[$amount_field]);
	$num_row=1;
	if($type=='hostel')
	{
		$data.=receipt_concession($row['cnrm'], $row['cncsn']); if(!empty($row['cncsn'])) { $num_row++; $total-=$row['cncsn']; }
		$data.=receipt_fine($row['cnrm'], $row['fine']); if(!empty($row['fine'])) { $num_row++; $total+=$row['fine']; }
		$chq_no=$row['chq_no']; $bank=$row['bank'];
	}
	else if($type=='old')
	{
		$data.=receipt_concession($row['remark'], $row['cncssn']); if(!empty($row['cncssn'])) { $num_row++; $total-=$row['cncssn']; }
		$chq_no=$row['chq_no']; $bank=$row['bank'];
	}
	else
	{
		if($type=='adhoc')
		{
			for($k=$num_row; $k<6; $k++) { $data.="\n"; }
			$num_row=6;
			$data.=!empty($row['remark']) ? "     (".$row['remark'].")\n" : "\n";
		}
		$chq_no=$row[$chq_field]; $bank=$row[$bank_field];
	}
	return receipt_footer($data, $num_row, $total, $chq_no, $bank);
}

if($type=='monthly') { $data=build_monthly_receipt($rcpt_no, $schlr_no_id, $session); }
else if($type=='annual' || $type=='admission') { $data=build_annual_receipt($rcpt_no, $schlr_no_id, $session); }
else { $data=build_simple_receipt($rcpt_no, $schlr_no_id, $session, $type); }

if(empty($data))
{
	die('Receipt not found.');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fee Receipt</title>
	<style>
		body { background: #f1f1f1; font-family: Arial, sans-serif; margin: 0; padding: 20px; }
		.toolbar { margin: 0 auto 12px auto; max-width: 560px; }
		button { background: #31708f; border: 0; color: #fff; cursor: pointer; font-size: 14px; padding: 8px 14px; }
		.receipt { background: #fff; border: 1px solid #ccc; box-sizing: border-box; margin: 0 auto; min-height: 520px; padding: 20px; width: 560px; }
		pre { font-family: "Courier New", monospace; font-size: 14px; line-height: 1.25; margin: 0; white-space: pre-wrap; }
		@media print {
			body { background: #fff; padding: 0; }
			.toolbar { display: none; }
			.receipt { border: 0; margin: 0; padding: 0; width: auto; }
		}
	</style>
</head>
<body>
	<div class="toolbar">
		<button type="button" onclick="window.print()">Print</button>
	</div>
	<div class="receipt">
		<pre><?php echo htmlspecialchars($data); ?></pre>
	</div>
</body>
</html>
