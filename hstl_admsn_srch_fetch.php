<?php
require_once("conn.php");
@$qt1=$_GET["qt1"];
@$qt2=$_GET["qt2"];
@$qt3=$_GET["qt3"];
@$qt4=$_GET["qt4"];



if(!empty($qt1) and !empty($qt2) and !empty($qt3) and !empty($qt4))
{
	$sel1=mysql_query("select * from class where cls like '$qt2%'");
	$arr1=mysql_fetch_array($sel1);
 	$qt2=$arr1['sno'];
	$sel=mysql_query("select * from stdnt_reg where schlr_no like '$qt1%' and  cls='$qt2' and  fname like '$qt3%' and  lname like '$qt4%' and hstl='Yes'");
}
else if(!empty($qt1) and !empty($qt2) and !empty($qt3))
{
	$sel1=mysql_query("select * from class where cls like '$qt2%'");
	$arr1=mysql_fetch_array($sel1);
 	$qt2=$arr1['sno'];
	$sel=mysql_query("select * from stdnt_reg where schlr_no like '$qt1%' and  cls='$qt2' and  fname like '$qt3%' and hstl='Yes'");
}
else if(!empty($qt1) and !empty($qt2)  and !empty($qt4))
{
	$sel1=mysql_query("select * from class where cls like '$qt2%'");
	$arr1=mysql_fetch_array($sel1);
 	$qt2=$arr1['sno'];
	$sel=mysql_query("select * from stdnt_reg where schlr_no like '$qt1%' and  cls='$qt2' and  lname like '$qt4%' and hstl='Yes'");
}
else if(!empty($qt1) and !empty($qt3) and !empty($qt4))
{
	$sel=mysql_query("select * from stdnt_reg where schlr_no like '$qt1%' and  fname like '$qt3%' and  lname like '$qt4%' and hstl='Yes'");
}
else if(!empty($qt2) and !empty($qt3) and !empty($qt4))
{
	
	$sel1=mysql_query("select * from class where cls like '$qt2%'");
	$arr1=mysql_fetch_array($sel1);
 	$qt2=$arr1['sno'];
	$sel=mysql_query("select * from stdnt_reg where cls='$qt2' and  fname like '$qt3%' and  lname like '$qt4%' and hstl='Yes'");
}
else if(!empty($qt1) and !empty($qt2))
{
	$sel1=mysql_query("select * from class where cls like '$qt2%'");
	$arr1=mysql_fetch_array($sel1);
	$qt2=$arr1['sno'];
	$sel=mysql_query("select * from stdnt_reg where schlr_no like '$qt1%' and  `cls`='$qt2' and hstl='Yes'");
}
else if(!empty($qt1) and !empty($qt3))
{
	$sel=mysql_query("select * from stdnt_reg where schlr_no like '$qt1%' and  fname like '$qt3%' and hstl='Yes'");
}
else if(!empty($qt1) and !empty($qt4))
{
	$sel=mysql_query("select * from stdnt_reg where schlr_no like '$qt1%' and  lname like '$qt4%' and hstl='Yes'");
}
else if(!empty($qt2) and !empty($qt3))
{
	$sel1=mysql_query("select * from class where cls like '$qt2%'");
	$arr1=mysql_fetch_array($sel1);
 	$qt2=$arr1['sno'];
	$sel=mysql_query("select * from stdnt_reg where cls='$qt2' and  fname like '$qt3%' and hstl='Yes'");
}
else if(!empty($qt2) and !empty($qt4))
{
	$sel1=mysql_query("select * from class where cls like '$qt2%'");
	$arr1=mysql_fetch_array($sel1);
 	$qt2=$arr1['sno'];
	$sel=mysql_query("select * from stdnt_reg where cls='$qt2' and  lname like '$qt4%' and hstl='Yes'");
}
else if(!empty($qt3) and !empty($qt4))
{
	$sel=mysql_query("select * from stdnt_reg where fname like '$qt3%' and  lname like '$qt4%' and hstl='Yes'");
}

else if(!empty($qt1))
{
	$sel=mysql_query("select * from stdnt_reg where schlr_no like '$qt1%' and hstl='Yes'");
}
else if(!empty($qt2))
{
	$sel1=mysql_query("select * from class where cls like '$qt2%'");
	$arr1=mysql_fetch_array($sel1);
	$qt2=$arr1['sno'];
	$sel=mysql_query("select * from stdnt_reg where cls='$qt2' and hstl='Yes'");
}

else if(!empty($qt3))
{
$sel=mysql_query("select * from stdnt_reg where fname like '$qt3%' and hstl='Yes'");
}

else if(!empty($qt4))
{
	$sel=mysql_query("select * from stdnt_reg where lname like '$qt4%' and hstl='Yes'");
}
else
{
	$sel=mysql_query("select * from stdnt_reg where hstl='Yes'");
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
	$lname=$arr['lname'];
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
<td>".$lname."</td>
<td>".$f_name."</td></tr>";
}
?>
