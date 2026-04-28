<?php
require_once("conn.php");
include("authentication.php");
require_once("function.php");

$r1=$_GET['r1'];

?>
<html>
<head>
<title>Student List | <?php title();?></title>
<?php
logo();
print_css();
?>
</head>
<body >
<table style="width:100%;">
<tr><th style="font-size:16px"> <?php if($r1==1){ echo 'Class Wise Student List';} else { echo 'All Student List'; } ?> </th></tr>
</table>

<!-- END HEAD -->
<!-- BEGIN BODY -->

		

					
<div id="sample_2_column_toggler" class="displaynone">
<br/>
    <label><input type="checkbox" checked data-column="0">Sr. No.</label>
    <label><input type="checkbox" checked data-column="1">Scholar No.</label>
    <label><input type="checkbox" checked data-column="2">Name</label>
    <label><input type="checkbox" checked data-column="3">Father's Name</label>
    <label><input type="checkbox" checked data-column="4">Mother's Name</label>
    <label><input type="checkbox" checked data-column="5">class</label>
    <label><input type="checkbox" checked data-column="6">Section</label>
    <label><input type="checkbox" checked data-column="7">Date of Admission</label>
    <label><input type="checkbox" checked data-column="8">Date of Birth</label>
    <label><input type="checkbox" checked data-column="9">Permanent Address</label>
    <label><input type="checkbox" checked data-column="10">Current Address</label>
    <label><input type="checkbox" checked data-column="11">Phone No.</label>
    <label><input type="checkbox" checked data-column="12">Mobile No.</label>
    <label><input type="checkbox" checked data-column="13">Gender</label>
    <label><input type="checkbox" checked data-column="14">Category</label>
    <label><input type="checkbox" checked data-column="15">Medium</label>
    <label><input type="checkbox" checked data-column="16">Stream</label>
    <label><input type="checkbox" checked data-column="17">Hostler</label>
    <label><input type="checkbox" checked data-column="18">Bus</label>
    <label><input type="checkbox" checked data-column="19">Email Id</label>

    <br/><br/>
</div>
    

<table class="table table-bordered" id="sample_2" width="100%">
<thead>
<tr>
    <th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father Name</th><th>Mother Name</th><th>Class</th><th>Section</th>
    <th>Date of Admission</th><th>Date of Birth</th><th>Permanent Address</th><th>Current Address</th><th>Phone No.</th><th>Mobile No.</th><th>Gender</th><th>Category</th>
    <th>Medium</th><th>Stream</th><th>Hostler</th><th>Bus</th><th>Email Id</th>
</tr>
</thead>
<tbody>
<?php
if($r1==1)
{
    $i=0;
	$condition='';
	$r2=$_GET['r2'];
	$class=$_GET['class'];
	$stream=$_GET['stream'];
	$sec=$_GET['sec'];
	if($r2=='rte')
	{
		$condition.=" and `rte`='Yes'";
	}
	else if($r2=='continoue_discontinoue_status')
	{
		echo $condition.=" and `continoue_discontinoue_status`='1'";
	}
	else if($r2=='tc_issued')
	{
		//$condition.=" and `tc_issued`='1'";
	}
	else if($r2=='New Admission List')
	{
		$condition.=" and `adm`='".$session."' and `continoue_discontinoue_status`='0'";
	}
	else if($r2=='New and Old Students List')
	{
		$condition.=" and `continoue_discontinoue_status`='0'";
		$all='tc_issued';
	}
	else if($r2=='New and Old Hostel List')
	{
		$condition.=" and `hstl`='Yes' and `continoue_discontinoue_status`='0'";
		$all='tc_issued';
	}
	else if($r2=='New Hostel List')
	{
		$condition.=" and `hstl`='Yes' and `continoue_discontinoue_status`='0'";
		$all='tc_issued';
	}
	$tc=1;
	if(!empty($sec))
	{
		$condition.=" and `sec`='".$sec."'";
	}
	if(!empty($stream))
	{
		$condition.=" and `strm`='".$stream."'";
	}
	
    $sel_stdnt=mysql_query("select * from `stdnt_reg` where `cls`='$class' $condition order by `schlr_no` ASC");
    while($arr_stdnt=mysql_fetch_array($sel_stdnt))
    {
        if($r2=='tc_issued' || $all=='tc_issued')
			{
				$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt['id']."' && `status`='1'");
				$tc=mysql_num_rows($sel_tc);
				if($all=='tc_issued')
				{
					if($tc==1)
					{
						$tc=0;
					}
					else
					{
						$tc=1;
					}
				}
			}
			if(!empty($tc))
			{
		
            $sel_cls=mysql_query("select * from `class` where `sno`='".$arr_stdnt['cls']."'");
            $arr_cls=mysql_fetch_array($sel_cls);
            
            $sel_strm=mysql_query("select * from stream where sno='".$arr_stdnt['strm']."'");
            $row_strm=mysql_fetch_array($sel_strm);
            
            $sel_sec=mysql_query("select * from section where sno='".$arr_stdnt['sec']."'");
            $row_sec=mysql_fetch_array($sel_sec);
            
            $sel_ctg=mysql_query("select * from category where sno='".$arr_stdnt['ctg']."'");
            $row_ctg=mysql_fetch_array($sel_ctg);
            
            $sel_md=mysql_query("select * from medium where sno='".$arr_stdnt['md']."'");
            $row_md=mysql_fetch_array($sel_md);
            ?>
            
           
            <tr>
                <td><?php echo ++$i; ?></td><td><?php echo $arr_stdnt['schlr_no']; ?></td>
                <td><?php echo $arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']; ?></td><td><?php echo $arr_stdnt['f_name']; ?></td><td><?php echo $arr_stdnt['m_name']; ?></td>
                <td><?php echo $arr_cls['cls']; ?></td><td><?php echo $row_sec['section']; ?></td>
                <td><?php echo date('d-m-Y' , strtotime($arr_stdnt['rg_dt'])); ?></td><td><?php echo date('d-m-Y' , strtotime($arr_stdnt['dob'])); ?></td><td><?php echo $arr_stdnt['padd']?> </td><td><?php echo $arr_stdnt['cadd']?> </td><td><?php echo $arr_stdnt['phno']; ?></td><td><?php echo $arr_stdnt['mno']; ?></td>
                <td><?php echo $arr_stdnt['gndr']; ?></td><td><?php echo $row_ctg['ctg']; ?></td><td><?php echo $row_md['medium']; ?></td><td><?php echo $row_strm['strm']; ?></td>
                <td><?php echo $arr_stdnt['hstl']; ?></td><td><?php echo $arr_stdnt['bs_fc']; ?></td><td><?php echo $arr_stdnt['email_id']; ?></td>
            </tr>
             <?php
			}
    }
    
} 
else if($r1==2)
{
    $i=0;
	$condition='';
	$r2=$_GET['r2'];
	if($r2=='rte')
	{
		$condition.=" and `rte`='Yes'";
	}
	else if($r2=='continoue_discontinoue_status')
	{
		echo $condition.=" and `continoue_discontinoue_status`='1'";
	}
	else if($r2=='tc_issued')
	{
		//$condition.=" and `tc_issued`='1'";
	}
	else if($r2=='New Admission List')
	{
		$condition.=" and `adm`='".$session."' and `continoue_discontinoue_status`='0'";
	}
	else if($r2=='New and Old Students List')
	{
		$condition.=" and `continoue_discontinoue_status`='0'";
		$all='tc_issued';
	}
	else if($r2=='New and Old Hostel List')
	{
		$condition.=" and `hstl`='Yes' and `continoue_discontinoue_status`='0'";
		$all='tc_issued';
	}
	$tc=1;
	$sel_class=mysql_query("select * from `class`");					            
	while($row_class=mysql_fetch_array($sel_class))
	{ 
		$sel_stdnt=mysql_query("select * from `stdnt_reg` where `cls`='".$row_class['sno']."' $condition order by `schlr_no` ASC");
		while($arr_stdnt=mysql_fetch_array($sel_stdnt))
		{
			if($r2=='tc_issued' || $all=='tc_issued')
			{
				$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt['id']."' && `status`='1'");
				$tc=mysql_num_rows($sel_tc);
				if($all=='tc_issued')
				{
					if($tc==1)
					{
						$tc=0;
					}
					else
					{
						$tc=1;
					}
				}
			}
			if(!empty($tc))
			{
				$sel_cls=mysql_query("select * from `class` where `sno`='".$arr_stdnt['cls']."'");
				$arr_cls=mysql_fetch_array($sel_cls);
				
				$sel_strm=mysql_query("select * from stream where sno='".$arr_stdnt['strm']."'");
				$row_strm=mysql_fetch_array($sel_strm);
				
				$sel_sec=mysql_query("select * from section where sno='".$arr_stdnt['sec']."'");
				$row_sec=mysql_fetch_array($sel_sec);
				
				$sel_ctg=mysql_query("select * from category where sno='".$arr_stdnt['ctg']."'");
				$row_ctg=mysql_fetch_array($sel_ctg);
				
				$sel_md=mysql_query("select * from medium where sno='".$arr_stdnt['md']."'");
				$row_md=mysql_fetch_array($sel_md);
				$schlr_no=strval($arr_stdnt['schlr_no']);
				 ++$i;
				?>
				<tr>
					<td><?php echo $i; ?></td><td><?php echo  $schlr_no; ?></td>
					<td><?php echo $arr_stdnt['fname']." ".$arr_stdnt['mname']." ".$arr_stdnt['lname']; ?></td><td><?php echo $arr_stdnt['f_name']; ?></td><td><?php echo $arr_stdnt['m_name']; ?></td>
					<td><?php echo $arr_cls['cls']; ?></td><td><?php echo $row_sec['section']; ?></td>
					<td><?php echo date('d-m-Y' , strtotime($arr_stdnt['rg_dt'])); ?></td><td><?php echo date('d-m-Y' , strtotime($arr_stdnt['dob'])); ?></td><td><?php echo $arr_stdnt['padd']?> </td><td><?php echo $arr_stdnt['cadd']?> </td><td><?php echo $arr_stdnt['phno']; ?></td><td><?php echo $arr_stdnt['mno']; ?></td>
					<td><?php echo $arr_stdnt['gndr']; ?></td><td><?php echo $row_ctg['ctg']; ?></td><td><?php echo $row_md['medium']; ?></td><td><?php echo $row_strm['strm']; ?></td>
					<td><?php echo $arr_stdnt['hstl']; ?></td><td><?php echo $arr_stdnt['bs_fc']; ?></td><td><?php echo $arr_stdnt['email_id']; ?></td
				></tr>
				 <?php
			}
			
		}
	}
    
} ?>
</tbody>
</table>

</body>
					
		
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<?php
//js();
?>
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>

<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/table-advanced.js"></script>
<script>
jQuery(document).ready(function() {       
   App.init();
   TableAdvanced.init();
  
});
</script>
<!-- END BODY -->

</html>