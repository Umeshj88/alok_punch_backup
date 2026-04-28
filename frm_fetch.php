<?php
require_once("conn.php");
@$qt1=$_GET["qt1"];
@$qt2=$_GET["qt2"];
@$qt3=$_GET["qt3"];

if($qt1 !=NULL)
{
$sel=mysql_query("select * from form_issue where form_no like '$qt1%'");
}
else if($qt2 !=NULL)
{
$sel=mysql_query("select * from form_issue where class like '$qt2%' AND form_no like '$t1%'");
}

else if($qt3 !=NULL)
{
$sel=mysql_query("select * from form_issue where name like '$qt3%'");
}

else
{
	$sel=mysql_query("select * from form_issue");
}
?>
<tr>
<td><strong>Select</strong></td>
<td><strong>Form No.</strong></td>
<td><strong>Class</strong></td>
<td><strong>First Name</strong></td>
<td><strong>Father's Name</strong></td>
</tr>
<?php
while($arr=mysql_fetch_array($sel))
{
    $form_no=$arr['form_no'];
	$cls=$arr['class'];
	$name=$arr['name'];
	$fname=$arr['fname'];	
echo "<tr>
<td>
<input type='radio' name='r1' value='".$form_no."'/></td>
<td>".$form_no."</td>
<td>".$cls."</td>
<td>".$name."</td>
<td>".$fname."</td>
</tr>";
}
?>
</table>

