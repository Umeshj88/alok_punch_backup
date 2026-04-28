<?php   
session_start();
require_once("conn.php");
extract($_POST); 
$sccs="";
$dob=date('Y-m-d', strtotime($dob));
$udt=date("Y-m-d",strtotime($rg_dt));
if(isset($_POST['save']))
{
	$sql2="UPDATE `scholar_no` SET `schlr_no`='".$schlr_no."' where id='1'";
	
	mysql_query($sql2);
	$max_reg_no=mysql_query("select max(reg_no) from `stdnt_reg`");
	$arr_reg_no=mysql_fetch_array($max_reg_no);
	$reg_no=$arr_reg_no['max(reg_no)']+1;
	 $sql="insert into `stdnt_reg`  (reg_no,schlr_no,adm_class_id,adm,rg_dt,bs_fc,bus_station,hstl,roll_no,dob,fname,f_name,mname,m_name,lname,gndr,cadd,padd,c1,c2,p1,p2,phno,mno,ctg,cls,md,strm,sec,ps_name,ps_city,l_cls,l_md,s1,s2,s3,rte,email_id) values ('$reg_no','$schlr_no','$cls','$session','$udt','$bs_fc','$station','$hstl','$rno','$dob','$fname','$f_name','$mname','$m_name','$lname','$gndr','$cadd','$padd','$c1','$c2','$p1','$p2','$phno','$mno','$ctg','$cls','$md','$strm','$sec','$ps_name','$ps_city','$l_cls','$l_md','$s1','$s2','$s3','$rte','$email_id')";
	$r=mysql_query($sql);
	
	if(mysql_affected_rows()==1)
	{
		echo "<meta http-equiv='refresh' content='0;url=stdnt_reg.php'>";
		exit;
		 
	}
	else
	{ 
		  $sccs=1; 
		echo $msg ="<span class='error'><i class='icon-remove-sign'></i>Registration failed. Please retry.</span>";
		echo "<meta http-equiv='refresh' content='0;url=stdnt_reg.php'>";
		exit;
	}
}
else if(isset($_POST['search']))
{
	
		echo "<meta http-equiv='refresh' content='0;url=edit_stdunt_dtl.php'>";
		exit;

}
?>