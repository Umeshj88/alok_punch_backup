<?php
include("conn.php");
$schlr_no_id=$_GET['schlr_no_id'];
mysql_query("update `tc_serial_no` set `status`='2' where `schlr_no_id`='".$schlr_no_id."'");
?>
<td></td>