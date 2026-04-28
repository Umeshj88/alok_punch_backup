<?php
require_once("conn.php");
include("authentication.php");
require_once("function.php");

$r1=$_GET['r1'];

?>
<html>
<head>
<title>Old Due Fee | <?php title();?></title>
<?php
logo();
print_css();
  ?>
</head>
<body >
<center><font size="+2">Old Due Fee</font></center>
<table class="table table-bordered" width="100%">
<thead>
<tr>
    <th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father Name</th><th>Mother Name</th><th>Class</th><th>Section</th>
    <th>Monthly Due</th><th>Hostel Due</th>
</tr>
</thead>
<tbody>
<?php

	
	
    $sel_stdnt=mysql_query("select * from `stdnt_reg` order by `cls` ASC");
    while($arr_stdnt=mysql_fetch_array($sel_stdnt))
    {
		$sel_old=mysql_query("select * from `old_fee` where `schlr_no`='".$arr_stdnt['schlr_no']."'");
		$num_old=mysql_num_rows($sel_old);
		$arr_old=mysql_fetch_array($sel_old);
		if(!empty($num_old))
		{
		
            $sel_cls=mysql_query("select * from `class` where `sno`='".$arr_stdnt['cls']."'");
            $arr_cls=mysql_fetch_array($sel_cls);
            
            $sel_strm=mysql_query("select * from stream where sno='".$arr_stdnt['strm']."'");
            $row_strm=mysql_fetch_array($sel_strm);
            
            $sel_sec=mysql_query("select * from section where sno='".$arr_stdnt['sec']."'");
            $row_sec=mysql_fetch_array($sel_sec);
			
			$monthly_fee_submit=0;
			$hostel_fee_submit=0;
			$sel_cautn_fee=mysql_query("select * from `old_fee_submit` where `schlr_no_id`='".$arr_stdnt['id']."' && `fee_type`='1'");
			while($ftc_cautn_fee=mysql_fetch_array($sel_cautn_fee))
			{
				$monthly_fee_submit+=$ftc_cautn_fee['amt'];
			}
			
			$sel_cautn_fee=mysql_query("select * from `old_fee_submit` where `schlr_no_id`='".$arr_stdnt['id']."' && `fee_type`='2'");
			while($ftc_cautn_fee=mysql_fetch_array($sel_cautn_fee))
			{
				$hostel_fee_submit+=$ftc_cautn_fee['amt'];
			}
					$monthly_fee+=$arr_old['monthly_fee']-$monthly_fee_submit;
					$hostel_fee+=$arr_old['hostel_fee']-$hostel_fee_submit;
            ?>
            <tr>
                <td><?php echo ++$i; ?></td><td><?php echo $arr_stdnt['schlr_no']; ?></td>
                <td><?php echo $arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']; ?></td><td><?php echo $arr_stdnt['f_name']; ?></td><td><?php echo $arr_stdnt['m_name']; ?></td>
                <td><?php echo $arr_cls['cls']; ?></td><td><?php echo $row_sec['section']; ?></td>
                <td align="right"><?php echo $arr_old['monthly_fee']-$monthly_fee_submit; ?></td><td align="right"><?php echo $arr_old['hostel_fee']-$hostel_fee_submit; ?></td>
            </tr>
             <?php
			}
    }
    
?>
<tr>
<td colspan="7" align="right"><strong>Total</strong></td>
<td align="right"><strong><?php echo $monthly_fee; ?></strong></td>
<td align="right"><strong><?php echo $hostel_fee; ?></strong></td>
</tr>
<tr>
<td colspan="7" align="right"><strong>Grand Total</strong></td>
<td colspan="2" align="right"><strong><?php echo $monthly_fee+$hostel_fee; ?></strong></td>
</tr>
</tbody>
</table>
</body>		
<!-- END FOOTER -->
</html>