<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$typ=$_GET['selected'];
$sel=mysql_query("select * from fee_type where sno='$typ'");
$arr=mysql_fetch_array($sel);
$cat=$arr['cat'];
$type=$arr['type'];
$amt=$arr['amt'];
$opt=$arr['opt'];
$mnth=$arr['mnth'];
$ledger_component_type=$arr['ledger_component_type'];
if(isset($_POST['btn']))
{
	ob_start();
	header("location: gen_fee_comp_save.php");
	ob_flush();
}
if(isset($_POST['edit']))
{
	ob_start();
	header("location: gen_fee_comp_edit.php?selected=$typ");
	ob_flush();
}
if(isset($_POST['delete']))
{
	mysql_query("delete from fee_type where sno='$typ'");
	ob_start();
	header("location: gen_fee_comp.php");
	ob_flush();
}
?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>

<script type="text/javascript">
function valueselect()
{
    var i = document.getElementById('sel');
    var p = i.options[i.selectedIndex].value;
    window.location.href = "gen_fee_comp.php?selected=" + p;
}
</script>
<?php
logo();
css();
ajax();
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
	<form name="frm" method="post">
    <div style="float:left; width:100%;">
<div style="float:left; width:50%;">
<label style="margin-left:27%;">Component Description </label>
<input class="form-control input-medium" style="margin-left:27%;" name="cd" id="cd" value="<?php echo @$type;?>" type="text" disabled>
<label style="margin-left:27%;">Ledger Component Description </label>
<input class="form-control input-medium" style="margin-left:27%;" name="lcd" id="lcd" value="<?php echo @$ledger_component_type;?>" type="text" disabled>
</div>
<div style="float:right; width:50%;">
<?php 
extract($_POST);
$a="select * from `fee_type` where `status` != '1'";
$b=mysql_query($a);
?>
<div class="col-md-6">
<select id="sel"  onchange="javascript:valueselect()" class="form-control" multiple="multiple" >  
<?php 
$i=0;
while($row=mysql_fetch_array($b))
{ 
$i++;?>
 <option value="<?php   echo $row['sno'];?>" <?php if(@$typ==$row['sno']){
 ?> selected="selected" <?php } ?>><?php   echo $row['type'];?></option>
<?php
  } 
 ?>
 </select>
 </div>
</div>
</div>
 <div style="float:left; width:100%;">
<div style="float:left; width:50%;">
 <section>
   <fieldset style="margin-left:27%; width:30%; height:auto;" class="form-control input-medium" disabled="disabled"> 
    <legend>Category</legend>
<input type="radio" name="r2" id="lt" <?php if($cat=="LT") {?> checked="checked" <?php } ?> value="LT"/>&nbsp;&nbsp;Once In A Life Time<br/>
<input type="radio" name="r2" id="adm" <?php if($cat=="Admission") {?> checked="checked" <?php } ?> value="Admission" onclick="show()"/>&nbsp;&nbsp;Admission Fee<br/>
<input type="radio" name="r2" id="yr" <?php if($cat=="Year") {?> checked="checked" <?php } ?> value="Year" onclick="show()"/>&nbsp;&nbsp;Annual<br/>
<input type="radio" name="r2" id="rl" <?php if($cat=="Regular") {?> checked="checked" <?php } ?> value="Regular" onclick="show()"/>&nbsp;&nbsp;Monthly<br/>
<input type="radio" name="r2" id="ah" <?php if($cat=="Adhoc") {?> checked="checked" <?php } ?> value="Adhoc" onclick="show()"/>&nbsp;&nbsp;Adhoc<br/>
</fieldset>
</section>
</div>
<div id="opt" style="float:right; width:50%;">
<h4><label>Amount</label></h4><input id="amt" class="form-control input-medium" type="text" value="<?php echo @$amt;?>" name="amt" disabled></input>
 <section>
   <fieldset style="margin-left:1%; width:30%; height:auto;" class="form-control input-medium" disabled="disabled">
    <legend>Optional</legend>
<input type="radio" name="r3" <?php if($opt=="Yes") {?> checked="checked" <?php } ?>  value="Yes"/>&nbsp;&nbsp;yes<br/>
<input type="radio" name="r3" <?php if($opt=="No") {?> checked="checked" <?php } ?>  value="No"/>&nbsp;&nbsp;No<br/>
</fieldset>
</section>
</div>
</div>

<div id="month" style="float:left; width:100%;">
<div class="col-md-4" style="margin-left:13%">
<h5>No. of months for which this fee is taken</h5>
<input id="mnth" class="form-control" type="text" name="mnth" style="width:30%" disabled></input>
</div>
</div>
<div style="float:left; width:50%;margin-left:30%;">
            <button class="btn btn-info" name="btn" type="submit" style="margin-left:5%; margin-top:2%;"><i class="fa fa-plus"></i> Add</button> 
            <button class="btn btn-warning" name="edit" type="submit" style="margin-top:2%;"><i class="fa fa-edit"></i> Edit</button>
            <button class="btn btn-danger" name="delete" type="submit" style="margin-top:2%;"><i class="fa fa-trash-o "></i> Delete</button>
</div>
</form>

			</div>
        </div>
    </div>
</div>
</div>


<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>