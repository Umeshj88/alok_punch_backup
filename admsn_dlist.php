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
	<form class="form-signin" method="POST" action="dt_list.php"> 

<div style="width:70%; margin-left:5%">
<table>
<tr>
<td><label>Select Date</label> </td>
<td></td> <td></td><td></td>
<td> <input class="form-control form-control-inline input-medium date-picker" type="text"  name="test_date" id="dp1"/>  </td>
</tr>
<tr><td></td><td></td><td></td><td></td>
<td><button class="btn btn-success" style="margin-left:20%; width:30%; margin-top:4%" name="btn" type="submit" onclick="window.location.href='dt_list.php'" ><i class="fa fa-book"></i> View</button></td>
</tr>
</table>
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