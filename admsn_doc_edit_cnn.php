<?php
session_start();
include("conn.php");
extract($_POST);
$doc=$_SESSION['doc'];
if(isset($_POST['sav']))
{
	$t=$_POST['t1'];
	mysql_query("update admsn_doc set doc='$t' where doc='$doc'");
	echo "<meta http-equiv='Refresh' content='0 ;URL=admsn_doc.php'>";
	exit;
}
?>