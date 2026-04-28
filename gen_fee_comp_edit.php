<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$typ=$_GET['selected'];

$sel=mysql_query("select * from fee_type where sno='$typ'");
$arr=mysql_fetch_array($sel);
$cat=$arr['cat'];
$amt=$arr['amt'];
$opt=$arr['opt'];
$mnth=$arr['mnth'];
$type=$arr['type'];
$ledger_component_type=$arr['ledger_component_type'];
?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
css();
?>
<script language="JavaScript">
  function show()
  {
    if (document.frm.lt.checked)
    {
      document.getElementById("opt").style.visibility = "visible";
	   document.getElementById("month").style.visibility = "hidden";
    }  
	if (document.frm.adm.checked)
    {
      document.getElementById("opt").style.visibility = "hidden";
	  document.getElementById("month").style.visibility = "hidden";
    }  
	if (document.frm.yr.checked)
    {
      document.getElementById("opt").style.visibility = "visible";
	   document.getElementById("month").style.visibility = "hidden";
    }  
	if (document.frm.rl.checked)
    {
      document.getElementById("opt").style.visibility = "visible";
	   document.getElementById("month").style.visibility = "visible";
    }  
	if (document.frm.ah.checked)
    {
      document.getElementById("opt").style.visibility = "hidden";
	   document.getElementById("month").style.visibility = "hidden";
    }   
  }
</script>
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
	<form name="frm" method="post" id="frm1" action="gen_fee_comp_edit_cnn.php">
    <input type="hidden" name="lcd_sno" value="<?php echo $typ; ?>">
   <div style="float:left; width:100%;">
<div style="float:left; width:50%;">
<label style="margin-left:27%;">Component Description </label>
<input class="form-control input-medium" style="margin-left:27%;" name="cd" id="cd" value="<?php echo @$type;?>" type="text">
<label style="margin-left:27%;">Ledger Component Description </label>
<input class="form-control input-medium" style="margin-left:27%;" name="lcd" id="lcd" value="<?php echo @$ledger_component_type;?>" type="text">
</div>
<div style="float:right; width:50%;">
<?php 
extract($_POST);
$a="select * from fee_type";
$b=mysql_query($a);
?>
<div class="col-md-6">
<select id="sel"  onchange="javascript:valueselect()" class="form-control" multiple="multiple" disabled>   
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
    <fieldset style="margin-left:27%; width:30%; height:auto;" class="form-control input-medium">
    <legend>Category</legend>
<label><input type="radio" name="r2" id="lt" <?php if($cat=="LT") {?> checked="checked" <?php } ?> value="LT" onclick="show()"/>&nbsp;&nbsp;Once In A Life Time</label><br/>
<label><input type="radio" name="r2" id="adm" <?php if($cat=="Admission") {?> checked="checked" <?php } ?> value="Admission" onclick="show()"/>&nbsp;&nbsp;Admission Fee</label><br/>
<label><input type="radio" name="r2" id="yr" <?php if($cat=="Year") {?> checked="checked" <?php } ?> value="Year" onclick="show()"/>&nbsp;&nbsp;Annual</label><br/>
<label><input type="radio" name="r2" id="rl" <?php if($cat=="Regular") {?> checked="checked" <?php } ?> value="Regular" onclick="show()"/>&nbsp;&nbsp;Monthly</label><br/>
<label><input type="radio" name="r2" id="ah" <?php if($cat=="Adhoc") {?> checked="checked" <?php } ?> value="Adhoc" onclick="show()"/>&nbsp;&nbsp;Adhoc</label>
</fieldset>
</section>
</div>


<div id="amt" style="float:right; width:50%;">
<h3>Amount</h3>
<input id="amt" class="form-control input-medium" type="text" name="amt" value="<?php echo @$amt;?>"></input>
</div>

<div id="opt" style="float:right; width:50%; visibility:hidden">
 <section>
    <fieldset style="width:30%; height:auto;" class="form-control input-medium">
    <legend>Optional</legend>
<input type="radio" name="r3" <?php if($opt=="Yes") {?> checked="checked" <?php } ?>   value="Yes"/><label>yes</label><br/>
<input type="radio" name="r3" <?php if($opt=="No") {?> checked="checked" <?php } ?>   value="No"/><label>No</label><br/>
</fieldset>
</section>
</div>
</div>
<div id="month" style="float:left; width:100%; visibility:hidden;">
<div class="col-md-4" style="margin-left:13%">
<h5>No. of months for which this fee is taken</h5>
<input class="form-control" type="text" name="mnth" id="mnth"  style="width:30%"   value="<?php echo @$mnth;?>"></input>
</div>
</div>



<div style="float:left; width:50%;margin-left:20%;">
<button class="btn btn-success" style="margin-left:20%; margin-top:2%;" type="submit" name="sv">save</button>
<button class="btn btn-default button-previous" style="margin-top:2%;" type="submit" name="cncl">back</button>
</div>
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