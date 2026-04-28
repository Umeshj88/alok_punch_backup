<?php
include("authentication.php");
require_once("conn.php");

backup_tables($dbHost,$dbUser,$dbPass,$dbName,$session);
backup_import($session,$s);
/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$session,$tables = '*')
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
		
		//$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
		
	}	
	//save file
	$handle = fopen($session.'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
	
/*	ob_start();
	header("location: index.php?db=db");
	ob_flush(); */
}



function backup_import($session,$s)
{
	ini_set('max_execution_time', 10000);
//	$sql="CREATE DATABASE `$session`";
//	mysql_query($sql,$s);
	// Name of the file
	$filename = $session.'.sql';
	
	// Database name
	$mysql_database = $session;
	$dbHost='localhost';
$dbUser='root';
$dbPass='hello';
//$dbName='alok';
$s=mysql_connect($dbHost,$dbUser,$dbPass) or die('Error connecting to MySQL server: ' . mysql_error());
	// Connect to MySQL server
	//mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
	// Select database
	mysql_select_db($mysql_database,$s) or die('Error selecting MySQL database: ' . mysql_error());
	
	// Temporary variable, used to store current query
	$templine = '';
	// Read in entire file
	$lines = file($filename);
	// Loop through each line
	foreach ($lines as $line)
	{
	// Skip it if it's a comment
	if (substr($line, 0, 2) == '--' || $line == '')
		continue;
	
	// Add this line to the current segment
	$templine .= $line;
	// If it has a semicolon at the end, it's the end of the query
	if (substr(trim($line), -1, 1) == ';')
	{
		// Perform the query
		mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
		// Reset temp variable to empty
		$templine = '';
	}
	}
	 echo "Tables imported successfully";
}
?>