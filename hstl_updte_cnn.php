<?php
require_once("conn.php");

extract($_POST);
$sql=mysql_query("select * from hstl_reg where rg_no='$rg_no'");
$r=mysql_fetch_array($sql);
$order = "UPDATE hstl_reg 
 SET rm_no='$rm_no'
 WHERE  rg_no='$rg_no'";

mysql_query($order);
header("location:srch_hstl.php");

?>