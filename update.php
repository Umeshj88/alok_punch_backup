<?php
require_once("conn.php");

extract($_POST);
$sql=mysql_query("select * from stdnt_reg where schlr_no='$schlr_no'");
$r=mysql_fetch_array($sql);
$order = "UPDATE stdnt_reg 
 SET bs_fc='$bs_fc', 
hstl='$hstl',
rno='$rno',
dob='$dob',
fname='$fname',
mname='$mname',
lname='$lnmae',
f_name='$f_name',
m_name='$m_name',
cadd='$cadd',
padd='$padd',
c1='$c1',
c2='$c2',
p1='$p1',
p2='$p2',
phno='$phno',
mno='$mno',
ctg='$ctg',
cls='$cls',
md='$md',
strm='$strm',
sec='$sec'
 WHERE  schlr_no='$schlr_no'";

mysql_query($order);
header("location:stdnt_reg.php");

?>