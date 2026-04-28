<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['btn']))
{
	extract($_POST); 
	mysql_query("insert into `sec_cls` set `cls`='$cls',`sec`='$sec',`strm`='$strm',`medium`='$medium'");

	//header("location :sec_cls_setup.php");
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
			<div style="height:60%; width:40%; float:left; text-align:center"></br>
<form method="POST">
<table>
<tr> 
		<td align="left">Class </td>
<td>
<select class="form-control input-medium" name="cls">
<option value="">---Select---</option>

      <?php $sql_="select * from class";
			$sql=mysql_query($sql_);
			while($t=mysql_fetch_array($sql))
			{ 
			  echo "<option value=\"".$t['sno']."\">".$t['cls']."</option>"; 
			}
		
?>
</select>
</td>
<td>
<button type="submit" class="btn btn-info" name="btnn">View Section</button>
</td>
</tr>
<tr>
<td align="left">
Section</td>
<td>
<select class="form-control input-medium" name="sec">
<option value="">---Select---</option>
      <?php $sql_="select * from section";
			$sql=mysql_query($sql_);
			while($t=mysql_fetch_array($sql))
			{ 
			  echo "<option value=\"".$t['sno']."\">".$t['section']."</option>";
			}
			
?>
</select>
</td>
</tr>
<tr></tr>
<tr>
	<td align="left">Stream</td>
	<td>
<select class="form-control input-medium" name="strm">
<option value="">---Select---</option>
      <?php $sql_="select * from stream";
			$sql=mysql_query($sql_);
			while($t=mysql_fetch_array($sql))
			{ 
			  echo "<option value=\"".$t['sno']."\">".$t['strm']."</option>";
			}
			
?>
</select>
</td></tr>
<tr>
 	<td align="left">Medium</td>
	<td>
<select class="form-control input-medium" name="medium">
<option value="">---Select---</option>

      <?php $sql_="select * from medium";
			$sql=mysql_query($sql_);
			while($t=mysql_fetch_array($sql))
			{ 
			  echo "<option value=\"".$t['sno']."\">".$t['medium']."</option>";
			}
			
?>
</select>
</td>
</tr>
</table>
            <button class="btn btn-success" name="btn" type="submit" style="margin-top:2%;">Save</button> 

</form>
</div>

<div style="height:60%; width:55%; float:right; ">
<?php 
extract($_POST);
if(isset ($_POST['btnn']))
{
	if(empty($cls))
	{
		$a="select * from `sec_cls`";
	}
	else
	{
		$a="select * from `sec_cls` where `sno`='$sno'";
	}
	$b=mysql_query($a);
?>

<table class="table table-bordered table-hover" style="text-align:center !important;">
<thead>
<tr>
    <th style="text-align:center">Class Name</b></th>
    <th style="text-align:center">Section</th>
    <th style="text-align:center">Stream</th>
    <th style="text-align:center">Medium</th>
</tr>
</thead>
<?php 
while($row=mysql_fetch_array($b))
{ ?>
   
   <tr>
   <td>
 <?php  
 $sql_="select * from class where `sno`='".$row['cls']."'";
$sql=mysql_query($sql_);
$t=mysql_fetch_array($sql);
  echo $t['cls'];
  
  ?>
   </td>
   <td>
   <?php 
   $sql_="select * from section where `sno`='".$row['sec']."'";
$sql=mysql_query($sql_);
$t=mysql_fetch_array($sql);
echo $t['section'];
?>
   </td>
   <td>
 <?php
 $sql_="select * from stream where `sno`='".$row['strm']."'";
$sql=mysql_query($sql_);
$t=mysql_fetch_array($sql);
 echo $t['strm'];
 ?>
   </td>
   <td>
 <?php 
 $sql_="select * from medium where `sno`='".$row['medium']."'";
$sql=mysql_query($sql_);
$t=mysql_fetch_array($sql);
echo $t['medium'];
?>
   </td>
   
   </tr>

<?php
  } 
 ?></table><?php }?></br></div></div>
	
			
			
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