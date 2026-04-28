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
	<form method="post">
<div  style="width:100%; float:left; margin-left:20%;">
<table class="table table-bordered table-hover" style="width:40% !important;">
<?php
$sel=mysql_query("select * from mnth_mapping");
while($arr=mysql_fetch_array($sel))
{
	$sno=$arr['sno'];
	$class=$arr['class'];
	$stream=$arr['stream'];
	
	$sel1=mysql_query("select * from class where sno='$class'");
	$arr1=mysql_fetch_array($sel1);
	$class_cls=$arr1['cls'];
	$sno_cls=$arr1['sno'];
	$sel1=mysql_query("select * from stream where sno='$stream'");
    $arr1=mysql_fetch_array($sel1);
    $stream_strm=$arr1['strm'];
	if($class !=NULL)
	{
?>
<tr>
<td><input type="radio" name="r1" value="<?php echo $sno_cls;?>" onclick="window.location.href='mnth_mapping.php?class=<?php echo $sno_cls; ?>&stream=<?php echo $stream; ?>'"/></td><td><?php echo $class_cls; ?></td><td><?php echo $stream_strm; ?></td>
</tr>
<?php
	}
}?>
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