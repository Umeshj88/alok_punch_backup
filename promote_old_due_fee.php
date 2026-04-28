<?php
include("function.php");
include("conn.php");
include("authentication.php");
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
css();
?>
</head>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
<?php
nevibar_menu();
?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
         <a  href="promote_old_due_fee.php?promote=true" class="btn green" ><i class="icon-download"></i> Click here for promote database.</a>
		<br/>
         <?php
		if($_GET['promote']=='true')
		{
			backup_tables($dbHost,$dbUser,$dbPass,$dbName);
		}
		function backup_tables($host,$user,$pass,$name,$tables = '*')
		{
			// Create database
			
			$newdb =date('Y').'-'.(date('Y')+1);
			$link = mysql_connect($host,$user,$pass);
			mysql_select_db($name,$link);
			$sel_stdnt_result=mysql_query("select * from `stdnt_result` where `class_id`='15'");
			while($arr_stnt_result=mysql_fetch_array($sel_stdnt_result))
			{
				$next_class=$arr_stnt_result['next_class_id'];
				$class_id=$arr_stnt_result['class_id'];
				$schlr_no=$arr_stnt_result['schlr_no'];
				mysql_select_db($newdb,$link);
				
				$sel_stdnt_reg=mysql_query("select `id`,`continoue_discontinoue_status` from `stdnt_reg` where `schlr_no`='".$schlr_no."'");
				$arr_stdnt_reg=mysql_fetch_array($sel_stdnt_reg);
				
				$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt_reg['id']."' && `status`='1'");
				$num_tc=mysql_num_rows($sel_tc);
				
				if(!empty($num_tc))
				{
					mysql_query("delete from `stdnt_reg` where  `id`='".$arr_stdnt_reg['id']."'");
				}
				else if($arr_stdnt_reg['continoue_discontinoue_status']==0)
				{
					if($next_class!=0)
					{
						mysql_query("update `stdnt_reg` set `cls`='".$next_class."' where `schlr_no`='".$schlr_no."'");
					}
					else
					{
						mysql_query("update `stdnt_reg` set `cls`='".$class_id."' where `schlr_no`='".$schlr_no."'");
					}
				}
				
				mysql_select_db($name,$link);
			}
			include("promote_oldfee.php");
			
		}		
				?>			
			
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
footer();
js();?>

</body>
<!-- END BODY -->
</html>