<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['cancle']))
{
	ob_start();
	header("location: cls_fee_comp_setup.php");
	ob_flush();
}
if(isset($_POST['ok']))
{
	$id=$_POST['r1'];
	ob_start();
	header("location: cls_fee_comp_setup.php?id=$id");
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
	<form method="POST">
 <div  style="width:100%;  float:left;">
    <table class="table table-bordered table-hover" style=" width:50%;text-align:center !important;" align="center">
               
<?php
$sel5=mysql_query("select * from cls_fee_comp_setup1");
while($arr5=mysql_fetch_array($sel5))
{
$id=$arr5['id'];

 $cl=mysql_query("select * from class where `sno`='".$arr5['cls']."'");
 $arr=mysql_fetch_array($cl);
 $class=$arr['cls'];
 
 $st=mysql_query("select * from stream where `sno`='".$arr5['strm']."'");
 $arr1=mysql_fetch_array($st);
 $stream=$arr1['strm'];
 
 $md=mysql_query("select * from medium where `sno`='".$arr5['medium']."'");
 $arr2=mysql_fetch_array($md);
 $med=$arr2['medium'];
?>
<tr>
<td>
<input type="radio" name="r1" value="<?php echo $id;?>"/></td>
<td><?php echo $class;?></td>
<td><?php echo $stream;?></td>
<td><?php echo $med;?></td>
</tr>
<?php }?>
</table>
</div>
<div style="float:left; width:100%; margin-top:2%;" align="center">
<button class="btn btn-success" name="ok" type="submit">Ok</button>
<button class="btn btn-default" name="cancle" type="submit">Cancle</button>
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