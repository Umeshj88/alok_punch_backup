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
	
			<form class="form-signin"> 
<h3 style="text-align:center;"></h3>
<div style="width:30%">
<table >
<tr><td width="25%" align="center">
<label>Date</label></td><td><input class="form-control input-medium" type="text" id="dp1" name="dt"/></td></tr></table></div>	
</br></br>
<div style="width:60%; margin-left:7%">
<table class="table table-bordered table-hover" border="1" width="60%">
<tr>
<td><b> Fee Type </b></td>
<td style="text-align:center;"><b>Form No.</b></td>
<td style="text-align:center;"><b>To No</b></td>
<td style="text-align:center;"><b>Quantity</b></td>
<td style="text-align:center;"><b>Rate</b> </td>
<td style="text-align:center;"><b>Amount</b></td>
</tr>
<tr>
<td> <input class="form-control" type="checkbox"/><label>Registration Fees</label></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td><input class="form-control" type="checkbox"/><label>Form Fees(School)</label></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td><input type="checkbox"/><label>Form Fees (Hostel)</label></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td><input type="checkbox"/><label>Form Fees (Teacher)</label></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>
</div>
<button style="margin-left:30%; margin-top:2%" class="btn btn-info"  name="bttn_login" type="submit"><i class="fa fa-plus"></i> Add</button>
<button class="btn btn-warning" style="margin-top:2%"  name="bttn_login" type="submit"><i class="fa fa-edit"></i> Edit</button>
<button class="btn btn-danger" style="margin-top:2%"  name="bttn_login" type="submit"><i class="fa fa-trash-o "></i> Delete</button>
</br>
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