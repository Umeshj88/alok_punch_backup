<?php
require_once("conn.php");
$fee_type=$_GET['con'];
$schlr_no=$_GET['con1'];
if(!empty($schlr_no))
{
	$sqll=mysql_query("select amt from `adhoc_fee` where fee_type='$fee_type'");
	$num=mysql_num_rows($sqll);
	
	if($num==0)
	{
		$sql=mysql_query("select amt from `fee_type` where sno='$fee_type'");
		$row=mysql_fetch_array($sql);
	}
}
else
{
	$sql=mysql_query("select amt from `fee_type` where sno='$fee_type'");
	$row=mysql_fetch_array($sql);
}
?>
<td><input class="form-control" type="text" name="amt" id="amt" value="<?php echo $row['amt']; ?>"/> </td>

