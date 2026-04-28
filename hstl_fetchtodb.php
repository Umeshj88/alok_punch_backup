<?php
include("conn.php");
@$qt1=$_GET["qt1"];
@$qt2=$_GET["qt2"];
@$qt3=$_GET["qt3"];
@$qt4=$_GET["qt4"];
@$qt5=$_GET["qt5"];
@$qt6=$_GET["qt6"];
@$page_name=$_GET["page_name"];

if(!empty($qt2))
{
	$sel1=mysql_query("select `sno` from class where cls like '$qt2%'");
	$arr1=mysql_fetch_array($sel1);
 	$qt2=$arr1['sno'];
}
 $condition="where schlr_no like '".$qt1."%' &&  cls like '".$qt2."%' && `fname` like '".$qt3."%' && `mname` like '".$qt4."%' && `lname` like '".$qt5."%' && `f_name` like '".$qt6."%'";
 if($page_name=='hstl_fee')
 {
	$condition.=" && `hstl`='Yes'";
 }
 $query="select `id`,`schlr_no`,`cls`,`fname`,`mname`,`lname`,`f_name` from `stdnt_reg` $condition";
$sel=mysql_query($query);

?>
<tr>
<th>Scholar No.</th>
<th>Class</th>
<th>First Name</th>
<th>Middle Name</th>
<th>Last Name</th>
<th>Father's Name</th>
<th style="text-align:center">Students Details</th>
<?php
if($page_name=='tc_stdunt')
{
	?>
    <th style="text-align:center">Cancel TC</th>
    <?php
}
?>
</tr>

<?php
$arr_cnt=mysql_num_rows($sel);
if($arr_cnt>0)
{
while($arr=mysql_fetch_object($sel))
{
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
<td>'.$mname.'</td>
<td>'.$lname.'</td>
<td>'.$f_name.'</td>';
?>
<td align="center">
<a  class="btn btn-info btn-sm" href="<?php echo $page_name; ?>.php?schlr_no_id=<?php echo $schlr_no_id ; ?>">Click Here</a>
</td>
<?php
if($page_name=='tc_stdunt')
{
	?>
 <td align="center" id="<?php echo $schlr_no_id; ?>">
 <?php
 	$sel_temp_tc_stdnt=mysql_query("select * from  tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
	$cnt_temp_tc_stdnt=mysql_num_rows($sel_temp_tc_stdnt);
	if($cnt_temp_tc_stdnt>0)
	{ ?>
		<button type="button" class="btn btn-danger btn-sm" onclick="cancel_tc(<?php echo $schlr_no_id; ?>)">Cancel Tc</button>
	<?php
	} 

?>
</td>
    <?php
}
?>
</tr>

<?php
} 
}
else
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



