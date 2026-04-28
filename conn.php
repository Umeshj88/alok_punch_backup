<?php
error_reporting(0);
@ini_set('display_errors', 0);
session_start();
date_default_timezone_set('asia/kolkata');
$session=$_SESSION['session'];
ini_set('max_execution_time', 10000);
$dbHost='127.0.0.1';
$dbUser='alok_panch';
$dbPass='x2026P#p%uOP';
$dbName=$session;
$s=mysql_connect($dbHost,$dbUser,$dbPass) or die('Error connecting to MySQL server: ' . mysql_error());
mysql_select_db($dbName,$s) or die('Error selecting MySQL database: ' . mysql_error());

?>
