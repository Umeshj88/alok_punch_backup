<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$id=$_GET['id'];
if(isset($_POST['add']))
{
	ob_start();
	header("location: cls_fee_comp_setup_add.php");
	ob_flush();
}
if(isset($_POST['edit']))
{
	ob_start();
	header("location: cls_fee_comp_setup_edit.php?id=$id");
	ob_flush();
}
if(isset($_POST['delete']))
{
	mysql_query("delete from cls_fee_comp_setup1 where id='$id'");
	mysql_query("delete from cls_fee_comp_setup2 where setup1_id='$id'");
	mysql_query("delete from cls_fee_comp_setup3 where setup1_id='$id'");
	ob_start();
	header("location: cls_fee_comp_setup.php");
	ob_flush();	
}
if(isset($_POST['srch']))
{
	ob_start();
	header("location: cls_fee_comp_setup_srch.php");
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
	<form method="post">
<div  style="width:100%;float:left;">
<?php
$sel2=mysql_query("select * from `cls_fee_comp_setup1` where `id`='$id'");
$arr2=mysql_fetch_array($sel2);
?>

  <div class="col-md-2">
  		<select class="form-control" name="cls" disabled>
        <?php
            $cl=mysql_query("select * from class where `sno`='".$arr2['cls']."'");
			 $arr=mysql_fetch_array($cl);
			 $class=$arr['cls'];
			 ?>
            <option value="<?php echo $arr2['cls']; ?>"><?php echo $arr['cls']; ?></option>
	
  		</select>
  </div>
  <div class="col-md-2">
   <select class="form-control" name="strm" disabled>
   <?php
    $st=mysql_query("select * from stream where `sno`='".$arr2['strm']."'");
 	$arr1=mysql_fetch_array($st);
 	$stream=$arr1['strm'];
 ?>
             <option value="<?php echo $arr2['strm']; ?>"><?php echo $arr1['strm']; ?></option>
	</select>
  </div>
  <div class="col-md-2">
  	<select class="form-control" name="medium" disabled>
    <?php
   $md=mysql_query("select * from medium where `sno`='".$arr2['medium']."'");
 $arr6=mysql_fetch_array($md);
 $med=$arr6['medium'];
 ?>
            <option value="<?php echo $arr2['medium']; ?>"><?php echo $arr6['medium']; ?></option>

 	</select>
  </div>
  
<button type="submit" class="btn btn-warning" name="srch" ><i class="fa fa-search"></i> Search</button>

</div>

<div  style="width:100%; float:left;margin-top:2%;">
<table class="table table-bordered table-hover" style=" width:100%;text-align:center !important;">
<thead>
<tr>
<th style="text-align:center" colspan="2">Monthly Fee<br/>Components</th>
<th style="text-align:center">Amount</th><th style="text-align:center" >Jul</th>
<th style="text-align:center">Aug</th><th style="text-align:center" >Sep</th><th style="text-align:center" >Oct</th>
<th style="text-align:center">Nov</th><th style="text-align:center" >Dec</th><th style="text-align:center" >Jan</th>
<th style="text-align:center">Feb</th><th style="text-align:center">Mar</th><th style="text-align:center" >Apr</th>
<th style="text-align:center" >May</th><th style="text-align:center" >Jun</th>
</tr>
</thead>
<?php
$k=0; $cou=1; $cou1=0; $cou2=12;
$cou3=$cou+$cou2; $m=0;
$sel1=mysql_query("select * from fee_type where cat='Regular'");
while($ar1=mysql_fetch_array($sel1))
{ $k++;
$typ=$ar1['sno'];
$sel7=mysql_query("select * from cls_fee_comp_setup2 where setup1_id='$id' && m_f_c='$typ'");
$arr7=mysql_fetch_array($sel7);
$typ1=$arr7['m_f_c'];
$amt=$arr7['amt'];
$month_no=$arr7['month_no'];
if(!empty($ar1['station']))
{
	$sel_bs=mysql_query("select * from `bus_station` where `id`='".$ar1['station']."'");
	$arr_bs=mysql_fetch_array($sel_bs); 
}
?>
<tr>
<td><input type="checkbox" name="c<?php echo $k;?>" id="c<?php echo $k;?>" value="<?php echo $typ;?>"  <?php if($typ==$typ1) { ?> checked="checked" <?php }?> disabled="disabled"/></td><td><?php echo $ar1['type']; if(!empty($ar1['station'])) { ?><br/><strong><?php echo $arr_bs['station']; } ?></strong></td>
<td><input class="form-control" name="amt<?php echo $k;?>" type="text" value="<?php echo $amt; ?>" disabled></td>

<?php  
$m++;
$g=0;
$gg=0;
for($co=$cou;$co<$cou3;$co++)
{
	$cou1++; $g++;
	$data=explode(",", $month_no);
	for($i=0; $i<sizeof($data); $i++)
	{
		 $t_data=$data[$i];
		 if($g==$t_data)
		 {
			 $gg=$t_data;
		 }
	}
	
?>
<td><input type="checkbox" name="cc<?php echo $m;?>[]" id="cc<?php echo $co;?>" value="<?php echo $g;?>" disabled="disabled" <?php if($g==$gg){?> checked="checked"<?php }?>/></td>
<?php } $cou+=$cou1; $cou3=$cou+$cou2; $cou1=0;?>

</tr>
<?php } ?>
</table>
</div>
<div  style="width:100%; float:left;">
<table class="table table-bordered table-hover" style=" width:50%;text-align:center !important;">
<thead>
    <tr>
        <th colspan="2">One Time / Annual Fee Components</th>
        <th>Amount</th>
    </tr>
</thead>
<?php
$k=0; $cou=1; $cou1=0; $cou2=12;
$cou3=$cou+$cou2;
$sel1=mysql_query("select * from fee_type where cat='Year'");
while($ar1=mysql_fetch_array($sel1))
{ $k++;
$tp=$ar1['sno'];
$sel6=mysql_query("select * from cls_fee_comp_setup3 where setup1_id='$id' && `fee_type`='$tp'");
$arr6=mysql_fetch_array($sel6);
$ft=$arr6['fee_type'];
$amnt=$arr6['amt'];
?>
<tr> 
<td><input type="checkbox" name="a<?php echo $k;?>" id="a<?php echo $k;?>" value="<?php echo $tp; ?>" <?php if($tp==$ft){?> checked="checked"<?php }?> disabled/></td><td><?php echo $ar1['type'] ?></td>
<td><input type="text" class="form-control" name="amtt<?php echo $k;?>" id="amtt<?php echo $k;?>" value="<?php if($tp==$ft){ echo $amnt; }?>" disabled/></td>
</tr>
<?php } ?>
</table>
</div>
<div  style="width:100%; float:left;">
<table class="table table-bordered table-hover" style=" width:50%;text-align:center !important;">
<thead>
    <tr>
        <th colspan="2">Once In A Life Time Components</th>
        <th>Amount</th>
    </tr>
</thead>
<?php
$k=0; $cou=1; $cou1=0; $cou2=12;
$cou3=$cou+$cou2;
$sel1=mysql_query("select * from fee_type where cat='Admission'");
while($ar1=mysql_fetch_array($sel1))
{ $k++;
$tp=$ar1['sno'];
$sel6=mysql_query("select * from cls_fee_comp_setup3 where setup1_id='$id' && `fee_type`='$tp'");
$arr6=mysql_fetch_array($sel6);
$ft=$arr6['fee_type'];
$amnt=$arr6['amt'];
?>
<tr> 
<td><input type="checkbox" name="a<?php echo $k;?>" id="a<?php echo $k;?>"  value="<?php echo $tp; ?>" <?php if($tp==$ft){?> checked="checked"<?php }?> disabled/></td><td><?php echo $ar1['type'] ?></td>
<td><input type="text" class="form-control" name="amtt<?php echo $k;?>" id="amtt<?php echo $k;?>" value="<?php if($tp==$ft){ echo $amnt; }?>" disabled/></td>
</tr>
<?php } ?>
</table>
</div>
<div style="float:right; width:70%;  margin-top:2%">
            <button class="btn btn-info" name="add" type="submit" style="margin-left:5%;"><i class="fa fa-plus"></i> Add</button> 
            <button class="btn btn-warning" name="edit" type="submit" ><i class="fa fa-edit"></i> Edit</button>
            <button class="btn btn-danger" name="delete" type="submit" ><i class="fa fa-trash-o "></i> Delete</button>

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