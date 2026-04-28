<?php
require_once("conn.php");
$cls=$_GET['con'];

?>
<td><label>Medium</label> </td>
        	<td> 
            <?php
			$m=1;
            $md=mysql_query("select * from medium");
			 while($arr2=mysql_fetch_array($md))
			 {
			 $med=$arr2['medium'];
			  $sno=$arr2['sno'];
			  
			 ?>
            <label><input type="radio" name="medium" id="med<?php echo $m++;?>" value="<?php echo $sno;?>"/><?php echo $med;?></label>                 
             <?php } ?>
       		</td>
<td> <label>Stream</label> </td>
<td> <select class="form-control input-medium" name="strm" id="strm" onChange="getvalue()">
<option value="">---Select Stream---</option>
<?php $sel1=mysql_query("select distinct strm from sec_cls where cls='$cls'");
while($arr1=mysql_fetch_array($sel1))
{
$strm=$arr1['strm'];
$se=mysql_query("select * from stream where sno='$strm'");
 $r=mysql_fetch_array($se);
	?>
    <option value="<?php echo $strm; ?>"><?php echo $r['strm']; ?></option>';
 <?php
}
?>
</select>
   </td>
<td> <label>Section</label> </td>
<td id="txthint">
 <select class="form-control input-medium" name="section" id="section">
<option value="">---Select Section---</option>
<?php $sel1=mysql_query("select distinct sec from sec_cls where cls='$cls'");
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
