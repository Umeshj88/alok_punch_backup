<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
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
nevibar_menu()
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
	<form name="frm" method="post" id="frm1" action="gen_fee_comp_add_cnn.php">
  <div style="float:left; width:100%;">
  <div style="float:left; width:50%;">
<label style="margin-left:27%;">Component Description </label>
<input class="form-control input-medium" style="margin-left:27%;" name="cd" id="cd" type="text">
<label style="margin-left:27%;">Ledger Component Description </label>
<input class="form-control input-medium" style="margin-left:27%;" name="lcd" id="lcd" type="text">
</div>
<div style="float:right; width:50%;">
<?php 
extract($_POST);
$a="select * from fee_type";
$b=mysql_query($a);
?>
<div class="col-md-6">
<select name="sel" style="margin-top:30px;"  class="form-control" multiple="multiple"  disabled="disabled">  
<?php 
$i=0;
while($row=mysql_fetch_array($b))
{ 
$i++;?>
 <option value="<?php   echo $row['type'];?>"><?php   echo $row['type'];?></option>
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
<label><input type="radio" name="r2" id="lt" value="LT" onclick="show()"/>&nbsp;&nbsp;Once In A Life Time</label><br/>
<label><input type="radio" name="r2" id="adm" value="Admission" onclick="show()"/>&nbsp;&nbsp;Admission Fee</label><br/>
<label><input type="radio" name="r2" id="yr" value="Year" onclick="show()"/>&nbsp;&nbsp;Annual</label><br/>
<label><input type="radio" name="r2" id="rl" value="Regular" onclick="show()"/>&nbsp;&nbsp;Monthly</label><br/>
<label><input type="radio" name="r2" id="ah" value="Adhoc" onclick="show()"/>&nbsp;&nbsp;Adhoc</label><br/>
</fieldset>
</section>
</div>
<div id="amt" style="float:right; width:50%;">
<h3>Amount</h3>
<input id="amt" class="form-control input-medium" type="text" name="amt"></input>
</div>

<div id="opt" style="float:right; width:50%; visibility:hidden">
 <section>
   <fieldset style="margin-left:5px;">
    <legend>Optional</legend>
<input type="radio" name="r3" value="Yes"/><label>yes</label><br/>
<input type="radio" name="r3" value="No"/><label>No</label><br/>
</fieldset>
</section>
</div>
</div>
<div id="month" style="float:left; width:100%; visibility:hidden;">
<div class="col-md-4" style="margin-left:13%">
<h5>No. of months for which this fee is taken</h5>
<input class="form-control" type="text" name="mnth" id="mnth"  style="width:30%" ></input>
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