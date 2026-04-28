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
         <a  href="promote_database.php?promote=true" class="btn green" ><i class="icon-download"></i> Click here for promote database.</a>
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
			mysql_query("insert into `fee_session`.`session` set `session`='".$newdb."'");
			$link = mysql_connect($host,$user,$pass);
			mysql_select_db($name,$link);
			
			$sql="CREATE DATABASE `$newdb`";
	
			if (mysql_query($sql,$link)) 
			{
				echo "<h4><strong>Student promoted  successfully to next year.</strong></h4><br/>";
				
				mysql_select_db($name,$link); // old db
				$fill_table = array("admsn_doc", "bs_fclty", "bus_station", "category", "caution_fee_setup", "city", "class", "cls_admsn_doc", "cls_fee_comp_setup1", "cls_fee_comp_setup2", "cls_fee_comp_setup3", "cls_strm", "designation", "fee_type", "gender", "hostel_fc", "hstl_fee_setup", "login", "medium", "menu_name", "menu_privileage", "mnth_code", "mnth_mapping", "scholar_no", "school", "section", "sec_cls", "session", "stdnt_reg", "stdnt_status", "stream", "sub_menu_name", "sub_menu_privileage", "tc_serial_no");
				//get all of the tables
				if($tables == '*')
				{
					$tables = array();
					$result = mysql_query('SHOW TABLES');
					while($row = mysql_fetch_row($result))
					{
						$tables[] = $row[0];
					}
				}
				else
				{
					$tables = is_array($tables) ? $tables : explode(',',$tables);
				}
				
				//cycle through
				foreach($tables as $table)
				{
					$result = mysql_query('SELECT * FROM '.$table);
					 $num_fields = mysql_num_fields($result);
					//$return.= 'DROP TABLE '.$table.';';
					$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
					
					
					$return= "\n\n".$row2[1].";";
				
					mysql_select_db($newdb,$link);
					mysql_query($return,$link);
					
					if (in_array($table, $fill_table)) 
					{
						
					}
					else
					{
						mysql_query("truncate table `$table`");
					}
					mysql_select_db($name,$link);
					if (in_array($table, $fill_table)) 
					{
						for ($i = 0; $i < $num_fields; $i++) 
						{
							while($row = mysql_fetch_row($result))
							{
								$return1= 'INSERT INTO '.$table.' VALUES(';
								for($j=0; $j<$num_fields; $j++) 
								{
									$row[$j] = addslashes($row[$j]);
									$row[$j] = ereg_replace("\n","\\n",$row[$j]);
									if (isset($row[$j])) { $return1.= '"'.$row[$j].'"' ; } else { $return1.= '""'; }
									if ($j<($num_fields-1)) { $return1.= ','; }
								}
								$return1.= ");\n";
								
								
								mysql_select_db($newdb,$link);
								mysql_query($return1,$link);
								mysql_select_db($name,$link);
							}
						}
						
					}
				}	
			
			}
			mysql_select_db($name,$link);
			$sel_stdnt_result=mysql_query("select * from `stdnt_result`");
			while($arr_stnt_result=mysql_fetch_array($sel_stdnt_result))
			{
				$next_class=$arr_stnt_result['next_class_id'];
				$class_id=$arr_stnt_result['class_id'];
				$schlr_no=$arr_stnt_result['schlr_no'];
				$schlr_no_id=$arr_stnt_result['schlr_no_id'];
				mysql_select_db($newdb,$link);
				
				$sel_stdnt_reg=mysql_query("select `id`,`continoue_discontinoue_status` from `stdnt_reg` where `id`='".$schlr_no_id."'");
				$arr_stdnt_reg=mysql_fetch_array($sel_stdnt_reg);
				
				$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt_reg['id']."' && `status`='1'");
				$num_tc=mysql_num_rows($sel_tc);
				
				if(!empty($num_tc))
				{
					mysql_query("delete from `stdnt_reg` where  `id`='".$arr_stdnt_reg['id']."'");
				}
				else if($arr_stdnt_reg['continoue_discontinoue_status']==0)
				{
					/*if(($class_id==16 && $next_class!=0))
					{
						
					}
					else*/
					if($next_class!=0)
					{
						mysql_query("update `stdnt_reg` set `cls`='".$next_class."' where `id`='".$schlr_no_id."'");
					}
					else
					{
						mysql_query("update `stdnt_reg` set `cls`='".$class_id."' where `id`='".$schlr_no_id."'");
					}
				}
				
				mysql_select_db($name,$link);
			}
			
				mysql_select_db($newdb,$link);
				
				$sel_stdnt_reg=mysql_query("select `cls`,`id`,`continoue_discontinoue_status` from `stdnt_reg`");
				while($arr_stdnt_reg=mysql_fetch_array($sel_stdnt_reg))
				{
				
					$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt_reg['id']."' && `status`='1'");
					$num_tc=mysql_num_rows($sel_tc);
					
					if(!empty($num_tc))
					{
						mysql_query("delete from `stdnt_reg` where  `id`='".$arr_stdnt_reg['id']."'");
					}
					else
					{
						$class_id = $arr_stdnt_reg['cls']+1;
						if($arr_stdnt_reg['cls'] != 16)
						{
							mysql_query("update `stdnt_reg` set `cls`='".$class_id."' where `id`='".$arr_stdnt_reg['id']."'");
						}
					}
				
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