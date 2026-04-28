<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['btn']))
{
	$schlr_no=$_POST['r1'];
	echo "<meta http-equiv='Refresh' content='0 ;URL=adhc.php?schlr_no=$schlr_no'>";
	exit;
}
if(isset($_POST['ns']))
{
	echo "<meta http-equiv='Refresh' content='0 ;URL=adhc_nonscholar.php'>";
	exit;
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
			if(!empty($_GET['done']))
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
	<form method="POST"> 
    <?php if($amt>0) { ?>
					<div class="note note-success">
						<p>
							 Fees Alerady Submited.
						</p>
					</div>
                    <?php } ?>
<div style="width:100%;">
<table class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th>Scholar No.</th>
<th>Class</th>
<th>First Name</th>
<th>Middle Name</th>
<th>Last Name</th>
<th>Father's Name</th>
</tr>
</thead>
<tr>
<td><input class="form-control timer" type="text" name="t1" id="t1" page_name="adhc" open_page="hstl_fetchtodb"/></td>
<td><input class="form-control timer" type="text" name="t2" id="t2" page_name="adhc" open_page="hstl_fetchtodb"/></td>
<td><input class="form-control timer" type="text" name="t3" id="t3" page_name="adhc" open_page="hstl_fetchtodb"/></td>
<td><input class="form-control timer" type="text" name="t4" id="t4" page_name="adhc" open_page="hstl_fetchtodb"/></td>
<td><input class="form-control timer" type="text" name="t5" id="t5" page_name="adhc" open_page="hstl_fetchtodb"/></td>
<td><input class="form-control timer" type="text" name="t6" id="t6" page_name="adhc" open_page="hstl_fetchtodb"/></td>

<td><button class="btn btn-info"  align="left" name="ns" type="submit" >Non Scholar</button></td>

</tr>

</table>
</div>

<div style="width:100%;">
<table class="table table-bordered table-hover" id="txtHint">
<thead>
<tr>
<th>Scholar No.</th>
<th>Class</th>
<th>First Name</th>
<th>Sur Name</th>
<th>Father's Name</th>
<th>Students Details</th>
</tr>
</thead>
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