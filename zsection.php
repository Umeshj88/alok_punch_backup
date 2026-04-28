<?php
require_once("conn.php");
mysql_query("update `stdnt_reg` set `continoue_discontinoue_status`='0' where `sec`='24'");
?>