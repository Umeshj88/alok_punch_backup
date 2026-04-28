<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['srch']))
{
	header("location: mnth_mapping_srch.php");
}
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
		$cls=$arr['cls'];
		$strm=$arr['strm'];
		
	$sel_mpp=mysql_query("select * from mnth_mapping where class='$cls' && stream='$strm'");
	$mp_num=mysql_num_rows($sel_mpp);
	if(empty($mp_num))
	{
		mysql_query("insert  mnth_mapping set opt='$r1',class='$cls',stream='$strm'");
		$sel_mp=mysql_query("select * from mnth_mapping where class='$cls' && stream='$strm' && opt='$r1'");
		$arr_mp=mysql_fetch_array($sel_mp);
		$id=$arr_mp['sno'];

		for($i=1; $i <= 12; $i++)
		{
			$cb=$_POST['c'.$i];
			if($cb)
			{
				$sel_month_code1=mysql_query("select `mnth_name` from `mnth_code` where `id`='".$i."'");
				$arr_month_code1=mysql_fetch_array($sel_month_code1);
				$mnth_name=$arr_month_code1['mnth_name'];
				 mysql_query("update mnth_mapping set $mnth_name='".$cb[0]."' where class='$cls' && sno='$id'");
			}
    	}
}
}


	
	
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
            <table  style="margin-left:18%;">
            <tr>
            <td>
            <input type="radio" name="r1" id="cl" value="Same for all the classes" checked="checked" onclick="hide()"/></td><td><b>Same for all the classes</b></td>
            <td>
            <input type="radio" name="r1" id="st" value="Same for all the streams of specified class" onclick="show()"/></td><td><b>Same for all the streams of specified class</b></td>
            <td>
            <input type="radio" name="r1" id="cs" value="Only for the class,stream combination" onclick="show1()"/></td><td><b>Only for the class,stream combination</b></td>
            </tr>
            </table>
            </div>
            <div  style="width:100%; float:left; margin-top:1%; " >
			<div class="col-md-2"  style="margin-left:30%;">
			<select  class="form-control input-small" name="cls" id="content" disabled>
             <option value="">--select Class---</option>
            <?php $sel1=mysql_query("select * from class");
            while($arr1=mysql_fetch_array($sel1))
            {
            $cls=$arr1['cls'];
			$sno=$arr1['sno'];
                ?>
                <option value="<?php echo $sno; ?>" <?php if(@$cls==@$clss){
             ?> selected="selected" <?php } ?>><?php echo $cls; ?></option>';
             <?php
            }
            ?>
            </select>
            </div>
            <div class="col-md-2">
			<select  class="form-control input-small" name="strm" id="strm" disabled>
            <?php $sel1=mysql_query("select * from stream");
            while($arr1=mysql_fetch_array($sel1))
            {
            $strm=$arr1['strm'];
			$sno=$arr1['sno'];
                ?>
                <option value="<?php echo $sno; ?>" <?php if(@$strm==@$clss){
             ?> selected="selected" <?php } ?>><?php echo $strm; ?></option>';
             <?php
            }
            ?>
            </select>
            </div>
            </div>
            <div  style="width:100%; float:left; margin-top:1%; " >
			<table class="table table-bordered table-hover" style="width:80% !important;margin-left:10%;">
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
		<input type="checkbox" name="c<?php echo $column; ?>[]" id="<?php echo $column; ?>,<?php echo $row; ?>" value="<?php echo $month_id; ?>" onclick="month_mapping(<?php echo $column; ?>,<?php echo $row; ?>)"/>
		</th>
        <?php 
		
	}
	echo '</tr>';
}
?>
</table>
            </div>
            <div style="float:left; width:100%; margin-top:1%">
             <button class="btn btn-success" name="sav" type="submit" style=" margin-top:2%; margin-left:45%;"> Save</button> 
             <button class="btn btn-default button-previous" name="cncl" type="submit" style="margin-left:0%; margin-top:2%;"> Back</button> 
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