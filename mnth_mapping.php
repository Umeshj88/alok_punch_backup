<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$cls=$_GET['class'];
@$strm=$_GET['stream'];
if(isset($_POST['add']))
{
	ob_start();
	header("location: mnth_mapping_add.php");
	ob_flush();
}
if(isset($_POST['edit']))
{
	ob_start();
	header("location: mnth_mapping_edit.php?class=$cls&stream=$strm");
	ob_flush();
}
if(isset($_POST['srch']))
{
	ob_start();
	header("location: mnth_mapping_srch.php");
	ob_flush();
}
if(isset($_POST['delete']))
{
	mysql_query("delete from `mnth_mapping` where class='$cls' && `stream`='$strm'");
	ob_start();
	header("location: mnth_mapping.php");
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
<div  style="width:100%; float:left; ">
<?php
if(@$cls !==NULL)
{
$sel_mnth_mapping=mysql_query("select * from mnth_mapping where class='$cls' && `stream`='$strm'");
$arr_mnth_mapping=mysql_fetch_array($sel_mnth_mapping);
@$opt=$arr_mnth_mapping['opt'];

}
?>

<table  style="margin-left:18%;">
<tr>
<td>
<input type="radio" name="r1" value="Same for all the classes" <?php if(@$opt=="Same for all the classes") {?> checked="checked" <?php } ?> disabled="disabled"/></td><td><b>Same for all the classes</b></td>
<td>
<input type="radio" name="r1"  value="Same for all the streams of specified class" <?php if(@$opt=="Same for all the streams of specified class") {?>  checked="checked" <?php } ?>  disabled="disabled"/></td><td><b>Same for all the streams of specified class</b></td>
<td>
<input type="radio" name="r1" value="Only for the class,stream combination" <?php if(@$opt=="Only for the class,stream combination") {?> checked="checked" <?php } ?>  disabled="disabled"/></td><td><b>Only for the class,stream combination</b></td>
</tr>
</table>
</div>
<div  style="width:100%; float:left; margin-top:1%;" >
<div class="col-md-2" style="margin-left:30%">
<select  class="form-control input-small" name="cls" id="content" disabled="disabled">
<?php
$sel1=mysql_query("select * from class where sno='$cls'");
	$arr1=mysql_fetch_array($sel1);
	$class=$arr1['cls'];
	$sno=$arr1['sno'];
	?>
    <option <?php if(@$sno==@$clss){
 ?> selected="selected" <?php } ?>><?php echo @$class; ?></option>';
</select>
</div>
<div class="col-md-2">
<select  class="form-control input-small" name="strm" id="strm" disabled="disabled">
<?php
$sel1=mysql_query("select * from stream where sno='$strm'");
    $arr1=mysql_fetch_array($sel1);
    $stream=$arr1['strm'];
	$sno=$arr1['sno'];
	?>
    <option <?php if(@$strm==@$sno){ ?> selected="selected" <?php } ?>><?php echo @$stream; ?></option>';
</select>
</div>
<div class="col-md-2">
 <button class="btn btn-warning" name="srch" type="submit"><i class="fa fa-search"></i> Search</button> 
 </div>
</div>
<br/>
<div  style="width:100%; float:left; margin-top:1%;" >
<fieldset disabled="disabled">
<table class="table table-bordered table-hover" style="width:80% !important; margin-left:10%;">
<tr>
<th>Fee Deposition Months</th>
<?php
$sel_month_code=mysql_query("select `mnth_name` from `mnth_code`");
while($arr_month_code=mysql_fetch_array($sel_month_code))
{
	echo '<th>'.ucfirst($arr_month_code['mnth_name']).'</th>';
}
?>
</tr>

<?php

$row=0;
$last=0;
$sel_month_code=mysql_query("select `month_full_name` from `mnth_code`");
$num_rows=mysql_num_rows($sel_month_code);
while($arr_month_code=mysql_fetch_array($sel_month_code))
{
	
	$row++;
	$last++;
	$column=0;
	echo '<tr><th>'.$arr_month_code['month_full_name'].'</th>';
	$month_id_full=(int) date('m', strtotime('01-'.$arr_month_code['month_full_name'].'-1991'));
	$sel_month_code1=mysql_query("select `mnth_name` from `mnth_code`");
	while($arr_month_code1=mysql_fetch_array($sel_month_code1))
	{
		$column++;
		$month_id_short=(int) date('m', strtotime('01-'.$arr_month_code1['mnth_name'].'-1991'));
		$month_id=$month_id_full.",".$month_id_short;
		?>
        <th>
		<input type="checkbox" name="c<?php echo $column; ?>[]" id="<?php echo $column; ?>,<?php echo $row; ?>" value="<?php echo $month_id; ?>" <?php if($arr_mnth_mapping[$arr_month_code1['mnth_name']]==$month_id) { ?> checked="checked" <?php } ?> />
		</th>
        <?php 
		
	}
	echo '</tr>';
}
?>

</table>

</fieldset>
</div>
<div style="float:left; width:100%; margin-top:1%">
 <button class="btn btn-info" name="add" type="submit" style="margin-left:40%; margin-top:2%;"><i class="fa fa-plus"></i> Add</button> 
            <button class="btn btn-warning" name="edit" type="submit" style="margin-top:2%;"><i class="fa fa-edit"></i> Edit</button> 
            <button class="btn btn-danger" name="delete" type="submit" style="margin-top:2%;"><i class="fa fa-trash-o "></i> Delete</button> 

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