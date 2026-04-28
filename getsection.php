<?php
require_once("conn.php");

$cls=$_GET['con'];
$strm=$_GET['con1'];
$med=$_GET['med'];
?>
<td id="txthint">
 <select class="form-control input-medium" name="section" id="section"  onchange="getfee()">
<option value="">---Select Section---</option>
<?php $sel1=mysql_query("select * from sec_cls where cls='$cls' && strm='$strm' && medium='$med'");
while($arr1=mysql_fetch_array($sel1))
{
$sec=$arr1['sec'];
$se=mysql_query("select * from section where sno='$sec'");
 $r=mysql_fetch_array($se);
	?>
    <option value="<?php echo $sec; ?>"><?php echo $r['section']; ?></option>';
 <?php
}
?>
</select>
</td>
