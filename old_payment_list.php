<?php
include("conn.php");
@$qt1=$_GET["qt1"];
@$qt2=$_GET["qt2"];
@$qt3=$_GET["qt3"];
@$qt4=$_GET["qt4"];
@$page_name=$_GET["page_name"];
$condition='';
if(!empty($qt1))
{
	$condition="where schlr_no like '".$qt1."%'";
}
if(!empty($qt2))
{
	$sel1=mysql_query("select `sno` from class where cls like '$qt2%'");
	$arr1=mysql_fetch_array($sel1);
 	$qt2=$arr1['sno'];
	if(empty($qt1))
	{
		$condition="where `cls` like '".$qt2."%'";
	}
	else
	{
		$condition.=" and `cls` like '".$qt2."%'";
	}
}
if(!empty($qt3))
{
	if(empty($qt1) && empty($qt2))
	{
		$condition="where `fname` like '".$qt3."%'";
	}
	else
	{
		 $condition.=" and `fname` like '".$qt3."%'";
	}
}
if(!empty($qt4))
{
	if(empty($qt1) && empty($qt2) && empty($qt3))
	{
		$condition="where `lname` like '".$qt4."%'";
	}
	else
	{
		$condition.=" and `lname` like '".$qt4."%'";
	}
}
$query="select `id`,`schlr_no`,`cls`,`fname`,`lname`,`f_name` from `stdnt_reg` $condition";
$sel=mysql_query($query);


?>
<tr>
<th>Scholar No.</th>
<th>Class</th>
<th>First Name</th>
<th>Sur Name</th>
<th>Father's Name</th>
<th style="text-align:center">Students Details</th>

</tr>

<?php
$count=0;
$arr_cnt=mysql_num_rows($sel);
if($arr_cnt>0)
{
while($arr=mysql_fetch_object($sel))
{
	$sel_old=mysql_query("select * from `old_fee` where `schlr_no`='".$arr->schlr_no."'");
	$num_old=mysql_num_rows($sel_old);
	if(!empty($num_old))
	{
		$count++;
	$schlr_no="$arr->schlr_no";
	$schlr_no_id="$arr->id";
	$cls="$arr->cls";
	$fname="$arr->fname";
	$lname="$arr->lname";
	$f_name="$arr->f_name";
	
	$sel1=mysql_query("select `cls` from class where sno='$cls'");
    $arr1=mysql_fetch_object($sel1);
	$class="$arr1->cls";
	?>
	<tr>
<?php
echo '<td>'.$schlr_no.'</td>
<td>'.$class.'</td>
<td>'.$fname.'</td>
<td>'.$lname.'</td>
<td>'.$f_name.'</td>';
?>
<td align="center">
<a  class="btn btn-info btn-sm" href="<?php echo $page_name; ?>.php?schlr_no_id=<?php echo $schlr_no_id ; ?>">Click Here</a>
</td>
</tr>

<?php
	}
} 
}
if(empty($count))
{
?>
<tr>
<td align="center" style="color:red" colspan="6">
<h4> No data found.</h4>
</td>
</tr>
<?PHP
}
?>



