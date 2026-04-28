<?php
session_start();
include("conn.php");
extract($_POST);
if(isset($_POST['sav']))
{
	$t=$_POST['t1'];
	mysql_query("insert into admsn_doc (doc) values('$t')");
	echo "<meta http-equiv='Refresh' content='0 ;URL=admsn_doc_add.php'>";
	exit;
}

?>