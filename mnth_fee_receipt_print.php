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

$recpt_no = isset($_GET['recpt_no']) ? mysql_real_escape_string($_GET['recpt_no']) : '';
$schlr_no_id = isset($_GET['schlr_no_id']) ? mysql_real_escape_string($_GET['schlr_no_id']) : '';

if(empty($recpt_no) || empty($schlr_no_id))
{
	die('Receipt details missing.');
}

$sel_mnth_fee_1=mysql_query("select * from `mnth_fee_1` where `recpt_no`='".$recpt_no."' && `schlr_no_id`='".$schlr_no_id."' order by `sno` desc limit 1");
$arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1);

if(empty($arr_mnth_fee_1))
{
	die('Receipt not found.');
}

$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='".$schlr_no_id."'");
$arr_stdnt=mysql_fetch_array($sel_stdnt);
$rte=$arr_stdnt['rte'];
$cls_id=$arr_stdnt['cls'];

$sel_cls=mysql_query("select * from `class` where `sno`='$cls_id'");
$arr_cls=mysql_fetch_array($sel_cls);
$class=$arr_cls['cls'];

$sel_md=mysql_query("select * from medium where sno='".$arr_stdnt['md']."'");
$arr_md=mysql_fetch_array($sel_md);
$medium=$arr_md['medium'];

$sel_strm=mysql_query("select * from `stream` where sno='".$arr_stdnt['strm']."'");
$arr_strm=mysql_fetch_array($sel_strm);
$strm=$arr_strm['strm'];

$sel_sec=mysql_query("select * from `section` where sno='".$arr_stdnt['sec']."'");
$arr_sec=mysql_fetch_array($sel_sec);
$section=$arr_sec['section'];

$sno=$arr_mnth_fee_1['sno'];
$receipt_date=$arr_mnth_fee_1['dat'];
$cncssn=$arr_mnth_fee_1['cncssn'];
$cn_rm=$arr_mnth_fee_1['cnrm'];
$fyn=$arr_mnth_fee_1['fyn'];
$chq_no=$arr_mnth_fee_1['chq_no'];
$bnk=$arr_mnth_fee_1['bnk'];

$total=0;
$num_row=0;
$data="";
$data.="\n";
$data.="              ".$recpt_no."           ".$session."\n";
$data.="     ".date('d-M-Y', strtotime($receipt_date))."               ".$arr_stdnt['schlr_no']."\n";
$data.="           ".$arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']."\n";
$data.="           ".$arr_stdnt['f_name']."\n";
$data.="       ".$class." ".$medium." ".$strm." (".$section.")\n";
$data.="\n\n";

$i=0;
if($rte=='Yes')
{
	$sel_mnth_fee2=mysql_query("select distinct fee_type from `mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0'");
}
else
{
	$sel_mnth_fee2=mysql_query("select distinct fee_type from `mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0' && `fee`>'0'");
}
while($arr_mnth_fee2=mysql_fetch_array($sel_mnth_fee2))
{
	$fee_type_id=$arr_mnth_fee2['fee_type'];
	$i++;
	$tot_fee=0;
	$mnth_id=NULL;
	if($rte=='Yes')
	{
		$sel_mnth_fee_2=mysql_query("select * from `mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0' && `fee_type`='$fee_type_id'");
	}
	else
	{
		$sel_mnth_fee_2=mysql_query("select * from `mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0' && `fee`>'0' && `fee_type`='$fee_type_id'");
	}
	while($arr_mnth_fee_2=mysql_fetch_array($sel_mnth_fee_2))
	{
		$fee=$arr_mnth_fee_2['fee'];
		$tot_fee+=$fee;
		$total+=$fee;
		$mnth_id[]=$arr_mnth_fee_2['mnth'];
	}
	$sel_ft=mysql_query("select * from fee_type where sno='".$arr_mnth_fee2['fee_type']."'");
	$arr_ft=mysql_fetch_array($sel_ft);
	$fee_type=$arr_ft['type'];
	$len=strlen($fee_type);
	$data.="   ".$i." ".$fee_type;
	for($j=$len; $j<=28; $j++)
	{
		$data.=" ";
	}
	$data.=$tot_fee."\n";
	$num_row++;
	$data.="      (".implode(",", $mnth_id).")\n";
	$num_row++;
}
if(!empty($cncssn))
{
	if(!empty($cn_rm))
	{
		$data1="";
		$len1=strlen($cn_rm);
		for($j=$len1; $j<=19; $j++)
		{
			$data1.=" ";
		}
		$data.="     Concession (".$cn_rm.")".$data1.$cncssn."\n";
	}
	else
	{
		$data.="     Concession                   ".$cncssn."\n";
	}
	$num_row++;
	$total=$total-$cncssn;
}
if(!empty($fyn))
{
	if(!empty($cn_rm))
	{
		$data1="";
		$len1=strlen($cn_rm);
		for($j=$len1; $j<=25; $j++)
		{
			$data1.=" ";
		}
		$data.="     Fine (".$cn_rm.")".$data1.$fyn."\n";
	}
	else
	{
		$data.="     Fine                         ".$fyn."\n";
	}
	$num_row++;
	$total=$total+$fyn;
}
for($k=$num_row; $k<7; $k++)
{
	$data.="\n";
}

$data.="                                  ".$total."\n\n       ".convert_number_to_words($total)." Only";
if(!empty($chq_no))
{
	$data.="\n Cheque NO.- ".$chq_no.", Bank Name- ".$bnk;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Monthly Fee Receipt</title>
	<style>
		body {
			background: #f1f1f1;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 20px;
		}
		.toolbar {
			margin: 0 auto 12px auto;
			max-width: 560px;
		}
		button {
			background: #31708f;
			border: 0;
			color: #fff;
			cursor: pointer;
			font-size: 14px;
			padding: 8px 14px;
		}
		.receipt {
			background: #fff;
			border: 1px solid #ccc;
			box-sizing: border-box;
			margin: 0 auto;
			min-height: 520px;
			padding: 20px;
			width: 560px;
		}
		pre {
			font-family: "Courier New", monospace;
			font-size: 14px;
			line-height: 1.25;
			margin: 0;
			white-space: pre-wrap;
		}
		@media print {
			body {
				background: #fff;
				padding: 0;
			}
			.toolbar {
				display: none;
			}
			.receipt {
				border: 0;
				margin: 0;
				padding: 0;
				width: auto;
			}
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
