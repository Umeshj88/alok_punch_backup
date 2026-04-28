<?php
require_once("conn.php");
$cls=$_GET['x'];
$strm=$_GET['y'];
$med=$_GET['q'];
$rte=$_GET['rte'];
$sel2=mysql_query("select `id` from `cls_fee_comp_setup1` where `cls`='$cls' && `strm`='$strm' && `medium`='$med'");
$arr2=mysql_fetch_array($sel2);
$id=$arr2['id'];
$m=0;

?>
<div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div class="caption">
			Fee Component
		</div></div>
        <div class="table-responsive">
<div id="fee">
<table class="table table-bordered table-hover" align="center">
<tr>
<?php
$sel3=mysql_query("select * from cls_fee_comp_setup3 where setup1_id='$id'");
while($arr3=mysql_fetch_array($sel3))
{
	$ft=$arr3['fee_type'];
	$amt=$arr3['amt'];

$m++;
$sel=mysql_query("select * from fee_type where sno='$ft'");
$arr=mysql_fetch_array($sel);

?>

<th><label><input type="checkbox" name="c[]" id="<?php echo $m;?>" value="<?php echo $ft;?>" onclick="c(this.id)" checked /><?php echo $arr['type'];  ?></label>

<?php
if($rte=='Yes')
{ ?>
<input class="form-control input-small" type="text" name="a<?php echo $m;?>" id="a<?php echo $m;?>" value="0" readonly="readonly" /></th>

<?php
$gt+=0;
}
else
{?>
<input class="form-control input-small" type="text" name="a<?php echo $m;?>" id="a<?php echo $m;?>" value="<?php echo $amt;?>" readonly="readonly"/></th>


<?php
$gt+=$amt;
}
 }?>
</tr>
<tr>
<th><label>Gross Total</label><input class="form-control  input-small" name="gt" id="inst" type="text" value="<?php echo $gt; ?>" readonly="readonly"/></th>

<th><label>Concession</label><input class="form-control input-small" type="text" name="cncssn" id="cncsn" onKeyUp="concession();"/></th>

<th><label>Remarks</label>
 <input class="form-control  input-medium" type="text" name="cn_rm" id="cn_rm"/></th>

<th><label>Fine</label><input class="form-control input-small" type="text" name="fyn" id="fine" onKeyUp="fin();"/></th>

<th><label>Fee to be deposited</label><input class="form-control input-small" type="text" name="fee_dp" id="dep" value="<?php echo $gt; ?>" readonly/></th>
</tr>
</table>
</div>
</div>
</div>
