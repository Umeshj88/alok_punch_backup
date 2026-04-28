<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
$d=date("d-m-y");
@$rd=$_GET['schlr_no_id'];
if(isset($_POST['srh']))
{
	ob_start();
	header("location: hstl_fee_admin_srch.php");
	ob_flush();
}
if(isset($_POST['btn1']))
{
	ob_start();
	header("location: srch_hstl_fee.php");
	ob_flush();
}

?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
css();
?>
</head>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
<?php
nevibar_menu();
?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
<div class="page-content-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
	<form class="form-signin" id="frm1" method="POST" action="hstl_fee_adm_cnn.php"> 
<?php
		$s=mysql_query("select * from `hstl_admsn`");
		$r=mysql_num_rows($s);
		$r=($r+1);
		$d=date("d-m-Y");
		if($rd !=NULL)
		{
			
			$sel=mysql_query("select * from stdnt_reg where `id`='$rd'");
			$arr=mysql_fetch_array($sel);
			$cls=$arr['cls'];
			$scholr_no=$arr['schlr_no'];
			$fname=$arr['fname'];
			$mname=$arr['mname'];
			$f_name=$arr['f_name'];
			$gndr=$arr['gndr'];
			$c2=$arr['c2'];
			$p2=$arr['p2'];
			$padd=$arr['padd'];
			$pho=$arr['mno'];
			$m_name=$arr['m_name'];
			
			$sel1=mysql_query("select * from class where sno='$cls'");
			$arr1=mysql_fetch_array($sel1);
			$class=$arr1['cls'];
		}
		 ?>
<div style="width:96%; margin-left:2%">		 
<table width="98%">
<tr>
<td><label> Registration No.</label> </td>
<td> <input class="form-control" type="text" name="reg_no" value="<?php echo $r; ?>"/> </td>
<td><label>Registration Date</label></td>
<td> <input class="form-control date-picker" type="text" name="reg_date" value="<?php echo $d; ?>"/> </td> 
</tr>
<tr>
<td><label> Category</label> </td>
<td><select class="form-control" name="category">
		<option value="other">Other</option>
        <option value="school">Scholar</option>
    </select>
</td>
<td><label> Scholar No. </label></td>
<td> <input class="form-control" type="text" name="schlr_no" value="<?php echo @$scholr_no; ?>"/></td>
<td align="right" style="width:!8%"><input type="button"  class="btn btn-info" name="srh" value="Search" onClick="window.location='hstl_fee_admin_srch.php'"/></td>
</tr>
<tr>
<td><label> Class</label> </td>
<td> <input class="form-control" type="text" name="class" value="<?php echo @$class; ?>"></td>
<td> <label> Room No.</label> </td>
<td> <input class="form-control" type="text" name="room_no"/> </td>
</tr>
<tr>
<td><label> School Name </label></td>
<td><input class="form-control" type="text" name="schl_nm" value="<?php echo @$schl; ?>"></td>
<td><label>Admitted for the next session</label></td><td><label><input type="checkbox" name="admsn_next_session" value="Yes">Yes</label></td>
</tr>
<tr>
<td><label> First Name</label></td>
<td> <input class="form-control" type="text" name="name" value="<?php echo @$fname ?>"/> </td>
<td><label> Middle Name</label> </td>
<td> <input class="form-control" type="text" name="mname" value="<?php echo @$mname; ?>"/> </td>
</tr>
<tr>
<td><label> Sex</label></td>
<td><label><input type="radio" name="sex" value="Male" <?php if(@$gndr=="Male") {?> checked  <?php }?>/>Male</label>

	<label><input type="radio" name="sex" value="Female" <?php if(@$gndr=="Female") {?> checked  <?php }?>/>Female</label>
</td>
<td> <label>Father's Name</label> </td>
<td> <input class="form-control" type="text" name="f_name"  value="<?php echo @$f_name; ?>"/> </td>
</tr>
<tr>
<td> Mother's Name </td>
<td> <input class="form-control" type="text" name="m_name"  value="<?php echo @$m_name; ?>"/> </td>
<td><label>Permanent Address</label></td>
<td><textarea class="form-control" cols="17" rows="1" name="p_add"/><?php echo @$padd; ?></textarea></td>
</tr>

<tr>
		<td><label>city</label></td>
		<td><input class="form-control" type="text" name="city"  value="<?php echo @$c2; ?>"/></td>
		<td><label>State</label></td>
		<td><input class="form-control" type="text" name="state"/></td>
</tr>
<tr>
        <td><label>Pin Code</label></td>
        <td><input class="form-control" type="text" name="pincode"  value="<?php echo @$p2; ?>"/></td>
        <td><label>Phone No.</label></td>
        <td><input class="form-control" type="text" name="phn_no"  value="<?php echo @$pho; ?>"/></td>
</tr>
</table>
</div>
<hr> </hr>
<button class="btn btn-success" name="save" type="submit" style="margin-left:35%">Save</button>  
<button class="btn btn-default button-previous" name="back" type="submit">Back</button>  
</form> 
			
			</div>
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>