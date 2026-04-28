<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$cls=$_GET['class'];
@$strm=$_GET['stream'];
if(isset($_POST['sav']))
{
	@$strm=$_POST['strm'];
	@$cls=$_POST['cls'];
@$r1=$_POST['r1'];	




if($r1=="Only for the class,stream combination")
{	
	$sel=mysql_query("select * from sec_cls where cls='$cls' && strm='$strm'");
}
if($r1=="Same for all the streams of specified class")
{	
	$sel=mysql_query("select * from sec_cls where cls='$cls'");
}
if($r1=="Same for all the classes")
{	
	$sel=mysql_query("select * from sec_cls");
}


while($arr=mysql_fetch_array($sel))
{
	$clss=$arr['cls'];
	$strmm=$arr['strm'];
		
	
	mysql_query("update `mnth_mapping` set `opt`='$r1' where `class`='$clss' && `stream`='$strmm'");


 	for($i=1; $i <= 12; $i++)
	{
		$cb=$_POST['c'.$i];
		
			$sel_month_code1=mysql_query("select `mnth_name` from `mnth_code` where `id`='".$i."'");
			$arr_month_code1=mysql_fetch_array($sel_month_code1);
			$mnth_name=$arr_month_code1['mnth_name'];
			 mysql_query("update mnth_mapping set `$mnth_name`='".$cb[0]."' where `class`='$clss' && `stream`='$strmm'");
		
    }
}	
	ob_start();
	header("location: mnth_mapping_edit.php?class=$cls&stream=$strm");
	ob_flush();
}
	
if(isset($_POST['cncl']))
{
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
<script src="js/mnth_mapping.js"></script>

</head>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
<?php
nevibar_menu()
?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
<div class="page-content-wrapper">

		<div class="page-content">
			<div class="row">
	<form method="post">
<div  style="width:100%; float:left;">
<?php
$sel_mnth_mapping=mysql_query("select * from mnth_mapping where class='$cls' && `stream`='$strm'");
$arr_mnth_mapping=mysql_fetch_array($sel_mnth_mapping);
@$opt=$arr_mnth_mapping['opt'];



?>
<table style="margin-left:18%;">
<tr>
<td>
<input type="radio" name="r1" id="cl" value="Same for all the classes"   onclick="hide()"/></td><td><b>Same for all the classes</b></td>
<td>
<input type="radio" name="r1" id="st"  value="Same for all the streams of specified class"  onclick="show()"/></td><td><b>Same for all the streams of specified class</b></td>
<td>
<input type="radio" name="r1" id="cs" value="Only for the class,stream combination"  checked="checked"  onclick="show1()"/></td><td><b>Only for the class,stream combination</b></td>
</tr>
</table>
</div>
<div  style="width:100%; float:left; margin-top:1%; " >

<div class="col-md-2" style="margin-left:30%">
<select  class="form-control input-small" name="cls" id="content">

<option value="">--select Class---</option>
            <?php $sel1=mysql_query("select * from class where `sno`='$cls'");
            while($arr1=mysql_fetch_array($sel1))
            {
            $clss=$arr1['cls'];
			$snoo=$arr1['sno'];
?>
    <option  value="<?php echo $snoo; ?>" <?php if(@$snoo==@$cls){
 ?> selected="selected" <?php } ?>><?php echo @$clss; ?></option>
<?php } ?>
</select>

</div>
<div class="col-md-2">
<select  class="form-control input-small" name="strm" id="strm">
<?php $sel1=mysql_query("select * from stream where `sno`='$strm'");
            while($arr1=mysql_fetch_array($sel1))
            {
            $strmm=$arr1['strm'];
			$snoo=$arr1['sno'];
                ?>
    <option  value="<?php echo $snoo; ?>" <?php if(@$strmm==@$sno){
 ?> selected="selected" <?php } ?>><?php echo $strmm; ?></option>
 <?php
}
?>
</select>
</div>
</div>
<div  style="width:100%; float:left; margin-top:1%;" >
<table class="table table-bordered table-hover" style="width:80% !important; margin-left:10%">
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
		<input type="checkbox" name="c<?php echo $column; ?>[]" id="<?php echo $column; ?>,<?php echo $row; ?>" value="<?php echo $month_id; ?>" <?php if($arr_mnth_mapping[$arr_month_code1['mnth_name']]==$month_id) { ?> checked="checked" <?php } ?> onclick="month_mapping(<?php echo $column; ?>,<?php echo $row; ?>)"/>
		</th>
        <?php 
		if($last==$num_rows)
		{ ?>
        <script type="text/javascript">
		     month_mapping_noevent(<?php echo $column; ?>,<?php echo $row; ?>);
		</script>
		<?php
		
		}
	}
	echo '</tr>';
}
?>

</table>
</div>

<div style="float:left; width:100%;  margin-top:1%">
 <button class="btn btn-success" name="sav" type="submit" style=" margin-top:2%; margin-left:45%;"> Save</button> 
 <button class="btn btn-default button-previous" name="cncl" type="submit" style="margin-left:0%; margin-top:2%;"> Back</button> 
</div>
</form>
			
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