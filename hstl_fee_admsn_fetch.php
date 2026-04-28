<?php
require_once("conn.php");
@$qt1=$_GET["qt1"];
@$qt2=$_GET["qt2"];
@$qt3=$_GET["qt3"];
@$qt4=$_GET["qt4"];
if($qt1 !=NULL)
{
$sel=mysql_query("select * from stdnt_reg where hstl='Yes' && schlr_no like '$qt1%'");
}
else if($qt2 !=NULL)
{
	$sel1=mysql_query("select * from class where cls like '$qt2%'");
    $arr1=mysql_fetch_array($sel1);
	$qt2=$arr1['sno'];
	
$sel=mysql_query("select * from stdnt_reg where hstl='Yes' && cls like '$qt2%'");
}

else if($qt3 !=NULL)
{
$sel=mysql_query("select * from stdnt_reg where hstl='Yes' && fname like '$qt3%'");
}

else if($qt4 !=NULL)
{
$sel=mysql_query("select * from stdnt_reg where hstl='Yes' && mname like '%qt4%'");
}
else
{
	$sel=mysql_query("select * from stdnt_reg where hstl='Yes' ");

}

?>
<tr>
<td><strong>Select</strong></td>
<td><strong>Scholar No.</strong></td>
<td><strong>Class</strong></td>
<td><strong>First Name</strong></td>
<td><strong>Sur Name</strong></td>
<td><strong>Father's Name</strong></td>
</tr>
<?php
while($arr=mysql_fetch_array($sel))
{
	$schlr_no=$arr['schlr_no'];
	$cls=$arr['cls'];
	$fname=$arr['fname'];
	$mname=$arr['mname'];
	$f_name=$arr['f_name'];
	
	$sel1=mysql_query("select * from class where sno='$cls'");
    $arr1=mysql_fetch_array($sel1);
	$class=$arr1['cls'];
	
echo "<tr>
<td>
<input type='radio' name='r1' value='".$schlr_no."'/></td>
<td>".$schlr_no."</td>
<td>".$class."</td>
<td>".$fname."</td>
<td>".$mname."</td>
<td>".$f_name."</td></tr>";
}
?>
