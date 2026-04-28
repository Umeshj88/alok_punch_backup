<?php
include("conn.php");
include("authentication.php");
require_once("function.php");
 @$class=$_GET['cls'];
 $r1=$_GET['r1'];
?>
<html>
<head>
<title>Discontinoue Student List</title>
<?php print_css();
  ?>

</head>
<body >
<table class="table table-striped table-bordered table-hover" width="100%">
<thead>
<tr>
<th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Mother's Name</th><th>Class</th><th>Section</th>
<th>Date of Admission</th><th>Date of Birth</th>
</tr>
</thead>
<tbody>
<?php
$sr_no=0;
if($r1=='All Classes')
{	
	$sel_cls=mysql_query("select `sno`,`cls` from class");
	while($arr_cls=mysql_fetch_array($sel_cls))
	{
		$class=$arr_cls['sno'];
		$sel_stdnt=mysql_query("select stdnt_reg.schlr_no,fname,lname,f_name,m_name,sec,rg_dt,dob from stdnt_reg where stdnt_reg.cls='$class' && stdnt_reg.continoue_discontinoue_status='1'");
		while($arr_stdnt=mysql_fetch_array($sel_stdnt))
		{
			$sel_sec=mysql_query("select `section` from `section` where `sno`='".$arr_stdnt['sec']."'");
			$arr_sec=mysql_fetch_array($sel_sec);
		   echo '<tr>
				<td>'.++$sr_no.'</td><td>'.$arr_stdnt['schlr_no'].'</td><td>'.$arr_stdnt['fname'].' '.$arr_stdnt['lname'].'<td>'.$arr_stdnt['f_name'].'</td><td>'.$arr_stdnt['m_name'].'</td>
				 <td>'.$arr_cls['cls'].'</td><td>'.$arr_sec['section'].'</td><td>'.date('d-m-Y', strtotime($arr_stdnt['rg_dt'])).'</td><td>'.date('d-m-Y', strtotime($arr_stdnt['dob'])).'</td></tr>';
		   
			
		}
	}
}
else
{
	$sel_cls=mysql_query("select `cls` from class where `sno`='$class'");
	$arr_cls=mysql_fetch_array($sel_cls);
	$sel_stdnt=mysql_query("select stdnt_reg.schlr_no,fname,lname,f_name,m_name,sec,rg_dt,dob from stdnt_reg where stdnt_reg.cls='$class' && stdnt_reg.continoue_discontinoue_status='1'");
	while($arr_stdnt=mysql_fetch_array($sel_stdnt))
	{
		$sel_sec=mysql_query("select `section` from `section` where `sno`='".$arr_stdnt['sec']."'");
		$arr_sec=mysql_fetch_array($sel_sec);
	   echo '<tr>
			<td>'.++$sr_no.'</td><td>'.$arr_stdnt['schlr_no'].'</td><td>'.$arr_stdnt['fname'].' '.$arr_stdnt['lname'].'<td>'.$arr_stdnt['f_name'].'</td><td>'.$arr_stdnt['m_name'].'</td>
			 <td>'.$arr_cls['cls'].'</td><td>'.$arr_sec['section'].'</td><td>'.date('d-m-Y', strtotime($arr_stdnt['rg_dt'])).'</td><td>'.date('d-m-Y', strtotime($arr_stdnt['dob'])).'</td></tr>';
	   
		
	}
}
?>
</tbody>
</table>
</body>
</html>