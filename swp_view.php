<?php
require_once("conn.php");
include("authentication.php");
require_once("function.php");
$r2=$_GET['r2'];
$fee_type=$_GET['fee_type'];
?>
<html>
<head>
<title>Student Wise Payment</title>
<?php print_css(); ?>
</head>
<body class="white-color-display">
<table style="width:100%;">
<tr><th style="font-size:16px"> Student Wise Payment </th></tr>
</table>
<?php
if($r2==1)
{
	$sel_class=mysql_query("select `sno` from `class`");
	while($arr_class=mysql_fetch_array($sel_class))
	{
		$class=$arr_class['sno'];
		$sel_stream=mysql_query("select `sno` from `stream`");
		while($arr_stream=mysql_fetch_array($sel_stream))
		{
			$stream=$arr_stream['sno'];
			$sel_stdnt=mysql_query("select * from stdnt_reg where cls='$class' && strm='$stream'");
			while($arr_stdnt=mysql_fetch_array($sel_stdnt))
			{
				$k=0;
				$schlr_no=$arr_stdnt['schlr_no'];
				$schlr_no_id=$arr_stdnt['id'];
				$nm=$arr_stdnt['fname'];
				$lnm=$arr_stdnt['lname'];
				$f_nm=$arr_stdnt['f_name'];
				$class=$arr_stdnt['cls'];
				$stream=$arr_stdnt['strm'];
				$sec=$arr_stdnt['sec'];
				
				$sel_cls=mysql_query("select * from `class` where `sno`='$class'");
				$arr_cls=mysql_fetch_array($sel_cls);
				$class=$arr_cls['cls'];
				
				$sel_strm=mysql_query("select * from stream where sno='$stream'");
				$row_strm=mysql_fetch_array($sel_strm);
				$strm=$row_strm['strm'];
				
				$sel_sec=mysql_query("select * from section where sno='$sec'");
				$row_sec=mysql_fetch_array($sel_sec);
				$section=$row_sec['section'];
				$j=0;
				$total=0;
			
				if($fee_type==1)
		{
			$sel_mnth_fee_1=mysql_query("select * from `annl_fee` where `schlr_no_id`='".$arr_stdnt['id']."'");
			while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
			{
				 $sno=$arr_mnth_fee_1['sno'];
				 $total+=$arr_mnth_fee_1['fee_dp'];
				
				
				if($k==0)
				{ $k++; ?>
					
					 <table  class="table" style="width:100%;">
					<tr>
					<th align="left">Scholar No.</th><td><?php echo $schlr_no; ?></td><th align="left">Name</th><td><?php echo $nm." ".$lnm; ?></td><th align="left">Father's Name</th><td><?php echo $f_nm; ?></td></tr>
					<tr><th align="left">Class</th><td><?php echo $class; ?></td><th align="left">Stream</th><td><?php echo $strm; ?></td><th align="left">section</th><td><?php echo $section; ?></td>
					</tr>
					</table>
					<table  class="table table-bordered" style="width:100%;">
					<thead>
					<tr>
					<th>Receipt No.</th><th>Date of Payment</th><th>Concession</th><th>Fine</th><th>Amount Paid</th>
					</tr>
					</thead>
					<tbody>
					<?php
				}
				
					?>
					 <tr>
					<td align="center"><?php echo $arr_mnth_fee_1['recpt_no']; ?></td>
					<td align="center"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['dat'])); ?></td>
					
					<td align="right"><?php echo $arr_mnth_fee_1['cncssn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fyn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fee_dp']; ?></td>
					</tr>
					<?php
					$colspan=4;
			}
		}
		else if($fee_type==2)
		{
			$sel_mnth_fee_1=mysql_query("select * from `mnth_fee_1` where `schlr_no_id`='".$arr_stdnt['id']."'");
			while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
			{
				 $sno=$arr_mnth_fee_1['sno'];
				 $total+=$arr_mnth_fee_1['fee_dp'];
				$mnth='';
				$data1='';
				$sel_mnth_fee_2=mysql_query("select distinct mnth from `mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0' && `fee`>'0'");
				while($arr_mnth_fee_2=mysql_fetch_array($sel_mnth_fee_2))
				{
					$mnth[]=$arr_mnth_fee_2['mnth'];	
				}
				$data1=implode(',' , $mnth);
				if($k==0)
				{ $k++; ?>
					
					 <table  class="table" style="width:100%;">
					<tr>
					<th align="left">Scholar No.</th><td><?php echo $schlr_no; ?></td><th align="left">Name</th><td><?php echo $nm." ".$lnm; ?></td><th align="left">Father's Name</th><td><?php echo $f_nm; ?></td></tr>
					<tr><th align="left">Class</th><td><?php echo $class; ?></td><th align="left">Stream</th><td><?php echo $strm; ?></td><th align="left">section</th><td><?php echo $section; ?></td>
					</tr>
					</table>
					<table  class="table table-bordered" style="width:100%;">
					<thead>
					<tr>
					<th>Receipt No.</th><th>Date of Payment</th><th>For Months</th><th>Concession</th><th>Fine</th><th>Amount Paid</th>
					</tr>
					</thead>
					<tbody>
					<?php
				}
				
					?>
					 <tr>
					<td align="center"><?php echo $arr_mnth_fee_1['recpt_no']; ?></td>
					<td align="center"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['dat'])); ?></td>
					<td><?php echo mb_strtoupper($data1); ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['cncssn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fyn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fee_dp']; ?></td>
					</tr>
					<?php
					$colspan=5;
			}
		}
		else if($fee_type==3)
		{
			$sel_mnth_fee_1=mysql_query("select * from `hstl_fee` where `schlr_no_id`='".$arr_stdnt['id']."'");
			while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
			{
				 $sno=$arr_mnth_fee_1['sno'];
				 $total+=$arr_mnth_fee_1['deposit'];
				
				
				if($k==0)
				{ $k++; ?>
					
					 <table  class="table" style="width:100%;">
					<tr>
					<th align="left">Scholar No.</th><td><?php echo $schlr_no; ?></td><th align="left">Name</th><td><?php echo $nm." ".$lnm; ?></td><th align="left">Father's Name</th><td><?php echo $f_nm; ?></td></tr>
					<tr><th align="left">Class</th><td><?php echo $class; ?></td><th align="left">Stream</th><td><?php echo $strm; ?></td><th align="left">section</th><td><?php echo $section; ?></td>
					</tr>
					</table>
					<table  class="table table-bordered" style="width:100%;">
					<thead>
					<tr>
					<th>Receipt No.</th><th>Date of Payment</th><th>Concession</th><th>Fine</th><th>Amount Paid</th>
					</tr>
					</thead>
					<tbody>
					<?php
				}
				
					?>
					 <tr>
					<td align="center"><?php echo $arr_mnth_fee_1['rcpt_no']; ?></td>
					<td align="center"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['dat'])); ?></td>
					
					<td align="right"><?php echo $arr_mnth_fee_1['cncsn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fine']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['deposit']; ?></td>
					</tr>
					<?php
					$colspan=4;
			}
		}
		else if($fee_type==4)
		{
			$sel_mnth_fee_1=mysql_query("select * from `adhoc_fee` where `schlr_no_id`='".$arr_stdnt['id']."'");
			while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
			{
				 $sno=$arr_mnth_fee_1['sno'];
				 $total+=$arr_mnth_fee_1['amt'];
				
				
				if($k==0)
				{ $k++; ?>
					
					 <table  class="table" style="width:100%;">
					<tr>
					<th align="left">Scholar No.</th><td><?php echo $schlr_no; ?></td><th align="left">Name</th><td><?php echo $nm." ".$lnm; ?></td><th align="left">Father's Name</th><td><?php echo $f_nm; ?></td></tr>
					<tr><th align="left">Class</th><td><?php echo $class; ?></td><th align="left">Stream</th><td><?php echo $strm; ?></td><th align="left">section</th><td><?php echo $section; ?></td>
					</tr>
					</table>
					<table  class="table table-bordered" style="width:100%;">
					<thead>
					<tr>
					<th>Receipt No.</th><th>Date of Payment</th><th>Amount Paid</th>
					</tr>
					</thead>
					<tbody>
					<?php
				}
				
					?>
					 <tr>
					<td align="center"><?php echo $arr_mnth_fee_1['rcpt_no']; ?></td>
					<td align="center"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['date'])); ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['amt']; ?></td>
					</tr>
					<?php
					$colspan=2;
			}
		}
		if($k==1)
		{
			?>
			<tr><th colspan="<?php echo $colspan; ?>" align="right"> Total Amount &nbsp;&nbsp;</td><td align="right"><?php echo $total; ?></td></tr>
		
					</tbody>
					</table>
					<br/><hr style="color:#000;" /><br/>
					<?php
				}
			}
		}
	}
			
}
else if($r2==2)
{
	$class=$_GET['class'];
	$stream=$_GET['stream'];
	
	$sel_stdnt=mysql_query("select * from stdnt_reg where cls='$class' && strm='$stream'");
	while($arr_stdnt=mysql_fetch_array($sel_stdnt))
	{
		$k=0;
		$schlr_no=$arr_stdnt['schlr_no'];
		$schlr_no_id=$arr_stdnt['id'];
		$nm=$arr_stdnt['fname'];
		$lnm=$arr_stdnt['lname'];
		$f_nm=$arr_stdnt['f_name'];
		$class=$arr_stdnt['cls'];
		$stream=$arr_stdnt['strm'];
		$sec=$arr_stdnt['sec'];
		
		$sel_cls=mysql_query("select * from `class` where `sno`='$class'");
		$arr_cls=mysql_fetch_array($sel_cls);
		$class=$arr_cls['cls'];
		
		$sel_strm=mysql_query("select * from stream where sno='$stream'");
		$row_strm=mysql_fetch_array($sel_strm);
		$strm=$row_strm['strm'];
		
		$sel_sec=mysql_query("select * from section where sno='$sec'");
		$row_sec=mysql_fetch_array($sel_sec);
		$section=$row_sec['section'];
		$j=0;
		$total=0;
		if($fee_type==1)
		{
			$sel_mnth_fee_1=mysql_query("select * from `annl_fee` where `schlr_no_id`='".$arr_stdnt['id']."'");
			while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
			{
				 $sno=$arr_mnth_fee_1['sno'];
				 $total+=$arr_mnth_fee_1['fee_dp'];
				
				
				if($k==0)
				{ $k++; ?>
					
					 <table  class="table" style="width:100%;">
					<tr>
					<th align="left">Scholar No.</th><td><?php echo $schlr_no; ?></td><th align="left">Name</th><td><?php echo $nm." ".$lnm; ?></td><th align="left">Father's Name</th><td><?php echo $f_nm; ?></td></tr>
					<tr><th align="left">Class</th><td><?php echo $class; ?></td><th align="left">Stream</th><td><?php echo $strm; ?></td><th align="left">section</th><td><?php echo $section; ?></td>
					</tr>
					</table>
					<table  class="table table-bordered" style="width:100%;">
					<thead>
					<tr>
					<th>Receipt No.</th><th>Date of Payment</th><th>Concession</th><th>Fine</th><th>Amount Paid</th>
					</tr>
					</thead>
					<tbody>
					<?php
				}
				
					?>
					 <tr>
					<td align="center"><?php echo $arr_mnth_fee_1['recpt_no']; ?></td>
					<td align="center"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['dat'])); ?></td>
					
					<td align="right"><?php echo $arr_mnth_fee_1['cncssn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fyn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fee_dp']; ?></td>
					</tr>
					<?php
					$colspan=4;
			}
		}
		else if($fee_type==2)
		{
			$sel_mnth_fee_1=mysql_query("select * from `mnth_fee_1` where `schlr_no_id`='".$arr_stdnt['id']."'");
			while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
			{
				 $sno=$arr_mnth_fee_1['sno'];
				 $total+=$arr_mnth_fee_1['fee_dp'];
				$mnth='';
				$data1='';
				$sel_mnth_fee_2=mysql_query("select distinct mnth from `mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0' && `fee`>'0'");
				while($arr_mnth_fee_2=mysql_fetch_array($sel_mnth_fee_2))
				{
					$mnth[]=$arr_mnth_fee_2['mnth'];	
				}
				$data1=implode(',' , $mnth);
				if($k==0)
				{ $k++; ?>
					
					 <table  class="table" style="width:100%;">
					<tr>
					<th align="left">Scholar No.</th><td><?php echo $schlr_no; ?></td><th align="left">Name</th><td><?php echo $nm." ".$lnm; ?></td><th align="left">Father's Name</th><td><?php echo $f_nm; ?></td></tr>
					<tr><th align="left">Class</th><td><?php echo $class; ?></td><th align="left">Stream</th><td><?php echo $strm; ?></td><th align="left">section</th><td><?php echo $section; ?></td>
					</tr>
					</table>
					<table  class="table table-bordered" style="width:100%;">
					<thead>
					<tr>
					<th>Receipt No.</th><th>Date of Payment</th><th>For Months</th><th>Concession</th><th>Fine</th><th>Amount Paid</th>
					</tr>
					</thead>
					<tbody>
					<?php
				}
				
					?>
					 <tr>
					<td align="center"><?php echo $arr_mnth_fee_1['recpt_no']; ?></td>
					<td align="center"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['dat'])); ?></td>
					<td><?php echo mb_strtoupper($data1); ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['cncssn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fyn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fee_dp']; ?></td>
					</tr>
					<?php
					$colspan=5;
			}
		}
		else if($fee_type==3)
		{
			$sel_mnth_fee_1=mysql_query("select * from `hstl_fee` where `schlr_no_id`='".$arr_stdnt['id']."'");
			while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
			{
				 $sno=$arr_mnth_fee_1['sno'];
				 $total+=$arr_mnth_fee_1['deposit'];
				
				
				if($k==0)
				{ $k++; ?>
					
					 <table  class="table" style="width:100%;">
					<tr>
					<th align="left">Scholar No.</th><td><?php echo $schlr_no; ?></td><th align="left">Name</th><td><?php echo $nm." ".$lnm; ?></td><th align="left">Father's Name</th><td><?php echo $f_nm; ?></td></tr>
					<tr><th align="left">Class</th><td><?php echo $class; ?></td><th align="left">Stream</th><td><?php echo $strm; ?></td><th align="left">section</th><td><?php echo $section; ?></td>
					</tr>
					</table>
					<table  class="table table-bordered" style="width:100%;">
					<thead>
					<tr>
					<th>Receipt No.</th><th>Date of Payment</th><th>Concession</th><th>Fine</th><th>Amount Paid</th>
					</tr>
					</thead>
					<tbody>
					<?php
				}
				
					?>
					 <tr>
					<td align="center"><?php echo $arr_mnth_fee_1['rcpt_no']; ?></td>
					<td align="center"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['dat'])); ?></td>
					
					<td align="right"><?php echo $arr_mnth_fee_1['cncsn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fine']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['deposit']; ?></td>
					</tr>
					<?php
					$colspan=4;
			}
		}
		else if($fee_type==4)
		{
			$sel_mnth_fee_1=mysql_query("select * from `adhoc_fee` where `schlr_no_id`='".$arr_stdnt['id']."'");
			while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
			{
				 $sno=$arr_mnth_fee_1['sno'];
				 $total+=$arr_mnth_fee_1['amt'];
				
				
				if($k==0)
				{ $k++; ?>
					
					 <table  class="table" style="width:100%;">
					<tr>
					<th align="left">Scholar No.</th><td><?php echo $schlr_no; ?></td><th align="left">Name</th><td><?php echo $nm." ".$lnm; ?></td><th align="left">Father's Name</th><td><?php echo $f_nm; ?></td></tr>
					<tr><th align="left">Class</th><td><?php echo $class; ?></td><th align="left">Stream</th><td><?php echo $strm; ?></td><th align="left">section</th><td><?php echo $section; ?></td>
					</tr>
					</table>
					<table  class="table table-bordered" style="width:100%;">
					<thead>
					<tr>
					<th>Receipt No.</th><th>Date of Payment</th><th>Amount Paid</th>
					</tr>
					</thead>
					<tbody>
					<?php
				}
				
					?>
					 <tr>
					<td align="center"><?php echo $arr_mnth_fee_1['rcpt_no']; ?></td>
					<td align="center"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['date'])); ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['amt']; ?></td>
					</tr>
					<?php
					$colspan=2;
			}
		}
		if($k==1)
		{
			?>
			<tr><th colspan="<?php echo $colspan; ?>" align="right"> Total Amount &nbsp;&nbsp;</td><td align="right"><?php echo $total; ?></td></tr>
			</tbody>
			</table>
            <br/><hr style="color:#000;" /><br/>
			<?php
		}
	}
	
			
}
else if($r2==3)
{
	
		$j=0;
		$total=0;
		if($fee_type==4)
		{
			$sel_mnth_fee_1=mysql_query("select * from `nonscholler_fee`");
			while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
			{
				 $detail=$arr_mnth_fee_1['detail'];
				 $total+=$arr_mnth_fee_1['amt'];
				
				 ?>
					
					 <table  class="table" style="width:100%;">
					<tr>
					
					<tr><th align="left">Detail</th><td><?php echo $detail; ?></td>
					</tr>
					</table>
			
					 
					<table  class="table table-bordered" style="width:100%;">
					<thead>
					<tr>
					<th>Receipt No.</th><th>Date of Payment</th><th>Amount Paid</th>
					</tr>
					</thead>
					<tbody>
                     <tr>
					<td align="center"><?php echo $arr_mnth_fee_1['rcpt_no']; ?></td>
					<td align="center"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['date'])); ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['amt']; ?></td>
					</tr>
                    <tr><th colspan="2" align="right"> Total Amount &nbsp;&nbsp;</td><td align="right"><?php echo $total; ?></td></tr>
			</tbody>
			</table>
            <br/><hr style="color:#000;" /><br/>
					<?php
				}
				
					
			
		}
		
	
	
			
}
else if(isset($_GET['schlr_no']))
{
	 $schlr_no=$_GET['schlr_no'];
	
	$sel_stdnt=mysql_query("select * from stdnt_reg where schlr_no='$schlr_no'");
	while($arr_stdnt=mysql_fetch_array($sel_stdnt))
	{
		$k=0;
		$schlr_no=$arr_stdnt['schlr_no'];
		$schlr_no_id=$arr_stdnt['id'];
		$nm=$arr_stdnt['fname'];
		$lnm=$arr_stdnt['lname'];
		$f_nm=$arr_stdnt['f_name'];
		$class=$arr_stdnt['cls'];
		$stream=$arr_stdnt['strm'];
		$sec=$arr_stdnt['sec'];
		
		$sel_cls=mysql_query("select * from `class` where `sno`='$class'");
		$arr_cls=mysql_fetch_array($sel_cls);
		$class=$arr_cls['cls'];
		
		$sel_strm=mysql_query("select * from stream where sno='$stream'");
		$row_strm=mysql_fetch_array($sel_strm);
		$strm=$row_strm['strm'];
		
		$sel_sec=mysql_query("select * from section where sno='$sec'");
		$row_sec=mysql_fetch_array($sel_sec);
		$section=$row_sec['section'];
		$j=0;
		$total=0;
		if($fee_type==2)
		{
			$sel_mnth_fee_1=mysql_query("select * from `mnth_fee_1` where `schlr_no_id`='".$arr_stdnt['id']."'");
			while($arr_mnth_fee_1=mysql_fetch_array($sel_mnth_fee_1))
			{
				 $sno=$arr_mnth_fee_1['sno'];
				 $total+=$arr_mnth_fee_1['fee_dp'];
				$mnth='';
				$data1='';
				$sel_mnth_fee_2=mysql_query("select distinct mnth from `mnth_fee2` where `mnth_fee1_sno`='".$sno."' && `left`='0' && `fee`>'0'");
				while($arr_mnth_fee_2=mysql_fetch_array($sel_mnth_fee_2))
				{
					$mnth[]=$arr_mnth_fee_2['mnth'];	
				}
				$data1=implode(',' , $mnth);
				if($k==0)
				{ $k++; ?>
					
					 <table  class="table" style="width:100%;">
					<tr>
					<th align="left">Scholar No.</th><td><?php echo $schlr_no; ?></td><th align="left">Name</th><td><?php echo $nm." ".$lnm; ?></td><th align="left">Father's Name</th><td><?php echo $f_nm; ?></td></tr>
					<tr><th align="left">Class</th><td><?php echo $class; ?></td><th align="left">Stream</th><td><?php echo $strm; ?></td><th align="left">section</th><td><?php echo $section; ?></td>
					</tr>
					</table>
					<table  class="table table-bordered" style="width:100%;">
					<thead>
					<tr>
					<th>Receipt No.</th><th>Date of Payment</th><th>For Months</th><th>Concession</th><th>Fine</th><th>Amount Paid</th>
					</tr>
					</thead>
					<tbody>
					<?php
				}
				
					?>
					 <tr>
					<td align="center"><?php echo $arr_mnth_fee_1['recpt_no']; ?></td>
					<td align="center"><?php echo date('d-m-Y', strtotime($arr_mnth_fee_1['dat'])); ?></td>
					<td><?php echo mb_strtoupper($data1); ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['cncssn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fyn']; ?></td>
					<td align="right"><?php echo $arr_mnth_fee_1['fee_dp']; ?></td>
					</tr>
					<?php
			}
		}
		if($k==1)
		{
			?>
			<tr><th colspan="5" align="right"> Total Amount &nbsp;&nbsp;</td><td align="right"><?php echo $total; ?></td></tr>
			</tbody>
			</table>
			<?php
		}
	}
			
}
		?>
	


</body>
</html>