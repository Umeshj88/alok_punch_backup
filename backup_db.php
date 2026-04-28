<?php
require_once("conn.php");
backup_tables($dbHost,$dbUser,$dbPass,$dbName);
 /*backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{

	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
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
		$num_rows = mysql_num_rows($result);
		//$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		if(!empty($num_fields))
		{
			if(!empty($num_rows))
			{
				$return.= 'INSERT INTO '.$table.' VALUES';
			}
			$i=0;
			while($row = mysql_fetch_row($result))
			{
				$i++;
				$return.= '(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$type=mysql_field_type($result,$j);
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if($type=='int' || $type=='number' || $type=='real')
					{
						if (isset($row[$j])) { $return.= $row[$j]; } else { $return.= ''; }
					}
					else
					{
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"'; } else { $return.= '""'; }
					}
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				if($num_rows!=$i)
				{
					 $return.= "),";
				}
			}
			if(!empty($num_rows))
			{
				$return.=");\n";
			}
		}
		
	}	
	$file_name='alok-db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql';
	//save file
	$handle = fopen($file_name,'w+');
	
	fwrite($handle,$return);
	
	fclose($handle);
?>
<a id="downloadfile" href="<?php echo $file_name; ?>"  class="btn btn-success"  download="<?php echo $name; ?>.sql" ><i class="icon-download"></i> Export database <span class="glyphicon glyphicon-export"></span></a>
<?php
										
}
?>
