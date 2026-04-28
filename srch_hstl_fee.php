<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
$done=$_GET['done'];
if(isset($_POST['btn1']))
{
	ob_start();
	header("location: hstl_fee_adm.php");
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
             <?php
			if(!empty($done))
			{
				?>
                <div class="note note-success">
						<p>
							 Fees Submited Successfuly.
						</p>
					</div>
                <?php
			}
			?>
	<form class="form-signin" method="POST"> 
<table class="table table-bordered table-hover" >
<thead>
<tr>
<th>Scholar No.</th>
<th>Class</th>
<th>First Name</th>
<th>Middle Name</th>
<th>Last Name</th>
<th>Father's Name</th>
<th rowspan="2" style="vertical-align:middle"><button type="submit" class="btn btn-info" name="btn1">New Admission</button></th>
</tr>

</tr>
</thead>

<tr>
<td><input class="form-control timer" type="text" name="t1" id="t1" page_name="hstl_fee" open_page="hstl_fetchtodb"/></td>
<td><input class="form-control timer" type="text" name="t2" id="t2" page_name="hstl_fee" open_page="hstl_fetchtodb"/></td>
<td><input class="form-control timer" type="text" name="t3" id="t3" page_name="hstl_fee" open_page="hstl_fetchtodb"/></td>
<td><input class="form-control timer" type="text" name="t4" id="t4" page_name="hstl_fee" open_page="hstl_fetchtodb"/></td>
<td><input class="form-control timer" type="text" name="t5" id="t5" page_name="hstl_fee" open_page="hstl_fetchtodb"/></td>
<td><input class="form-control timer" type="text" name="t6" id="t6" page_name="hstl_fee" open_page="hstl_fetchtodb"/></td>
<td></td>
</tr>

</table>
<table class="table table-bordered table-hover" id="txtHint" align="center" style width="95%">

<?php
?>
</table>

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