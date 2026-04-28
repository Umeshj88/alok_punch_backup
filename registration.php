<?php
require_once("conn.php");
include("authentication.php");
require_once("function.php");

$sel_stdnt=mysql_query("select `id`,`rg_dt` from `stdnt_reg`");
while($arr_stdnt=mysql_fetch_array($sel_stdnt))
{
	$reg_dt=date('Y', strtotime($arr_stdnt['rg_dt']));
	
	$adm=$reg_dt."-".($reg_dt+1);
	mysql_query("update `stdnt_reg` set `adm`='".$adm."' where `id`='".$arr_stdnt['id']."'");
}
?>