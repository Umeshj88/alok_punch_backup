<?php
require_once("conn.php");
$val=$_GET['con'];
$sel2=mysql_query("select amt from caution_fee_setup where class='$val'");
$arr2=mysql_fetch_array($sel2);
?>
<td>Caution Money <input type="text" name="cm" style="width:60px" value="<?php echo $arr2['amt']; ?>"/> </td>
