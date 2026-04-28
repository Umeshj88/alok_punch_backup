<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['view']))
{
	$class=$_POST['class'];
	header("location:cls_list.php?name=$class");
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
	
			<form class="form-signin" method="POST" > 

<div style="width:90%; margin-left:10%; margin-top:2%">
			<table width="50%">
<tr>
<td><label>Class</label> </td>
<td> <select class="form-control input-medium" name="class" id="class">
<?php $sel1=mysql_query("select cls from class");
while($arr1=mysql_fetch_array($sel1))
{
$cls=$arr1['cls'];
	?>
    <option value="<?php echo $cls; ?>"><?php echo $cls; ?></option>';
 <?php
}
?>
</select> </td>
</tr>

<tr>
<td colspan="2"><button class="btn btn-success" style="margin-left:20%; width:15%; margin-top:4%;" name="view" type="submit" ><i class="fa fa-book"></i> View</button></td>
</tr>
</table></div>
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