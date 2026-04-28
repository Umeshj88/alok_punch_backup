<?php
/*include("conn.php");
$sel_stdnt=mysql_query("select `id`,`cls`,`rg_dt` from `stdnt_reg`");
while($arr_stdnt=mysql_fetch_array($sel_stdnt))
{
	$c_d=date('Y',strtotime($arr_stdnt['rg_dt']));
	$n_d=$c_d+1;
	$adm=$c_d.'-'.$n_d;
	$cls=$arr_stdnt['cls']+1;
	mysql_query("Update `stdnt_reg` set `adm`='".$adm."', `cls`='".$cls."' where `id`='".$arr_stdnt['id']."'");
	if($cls==17)
	{
		$cls=16;
		mysql_query("Update `stdnt_reg` set `continoue_discontinoue_status`='1', `cls`='".$cls."' where `id`='".$arr_stdnt['id']."'");
	}
}*/
?>