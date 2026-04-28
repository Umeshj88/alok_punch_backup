<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$r1=$_GET['r1'];


	 @$sel=mysql_query("select * from school where sno='$r1'");
	@$s=mysql_fetch_array($sel);
	@$schl=$s['schl'];
	@$addr=$s['addr'];
	@$ph=$s['phno'];
if(isset($_POST['add']))
{	
	$schl=$_POST['schl'];
	$addr=$_POST['addr'];
	$ph=$_POST['ph'];
	if($r1 !=NULL)
	{
		
	$sql="update school set `schl`='$schl',`addr`='$addr',`phno`='$ph' where sno='$r1'";
	mysql_query($sql);
	ob_start();
	header("location: hstl_schl_setup.php");
	ob_flush();
	}
	else
	{
	$sel=mysql_query("select * from school");
	$s=mysql_num_rows($sel);
	$s1=$s+1;
	mysql_query("insert into school (`sno`,`schl`,`addr`,`phno`) values('$s1','$schl','$addr','$ph')");
	}
	
}
if(isset($_POST['dlt']))
{
	mysql_query("delete from school where sno='$r1'");
	ob_start();
	header("location: hstl_schl_setup.php");
	ob_flush();
}
if(isset($_POST['back']))
{
	mysql_query("delete from school where sno='$r1'");
	ob_start();
	header("location: hstl_schl_setup.php");
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
<script>
function data(id)
{
	var j=document.getElementById(id).value;

window.location.href = "hstl_schl_setup.php?r1=" + j;

}
</script>
</head>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
<?php
nevibar_menu(); ajax();
?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
<div class="page-content-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div style="height:40%; width:40%; float:left; text-align:center"><br/>
<form method="POST" name="frm">
<table>
    <tr> 
            <td align="left">School Name</td>
            <td><input name="schl" class="form-control" type="text" value="<?php echo @$schl; ?>"></input></td>
    </tr>
<tr> 
	<td align="left">Address</td>
    <td><input type="text" name="addr" class="form-control" value="<?php echo @$addr; ?>"/></td>
</tr>
<tr> 
	<td align="left">Phone No.</td>
    <td><input type="text" name="ph" class="form-control" value="<?php echo @$ph; ?>"/></td>
</tr>
<tr> 
	<td ></td>
    <td>
    <button class="btn btn-success" style=" margin-top:5%;" type="submit" name="add">Save</button>
			<button class="btn btn-danger" name="dlt" type="submit"  style="margin-top:5%;"><i class="fa fa-trash-o"></i> Delete </button>
            <button class="btn btn-default button-previous"  name="back" type="submit" style="margin-top:5%;">Back</button>
            
    </td>
</tr>
</table>
		


</div>

<div style="height:40%; width:55%; float:right; ">
<?php 
extract($_POST);
$a="select * from school";
$b=mysql_query($a);
?>
<br/>
<table class="table table-bordered table-hover" style="text-align:center !important;">
<thead>
	<tr>
		<th style="text-align:center">Select</th>
		<th style="text-align:center">Sr. No.</th>
        <th style="text-align:center">School</th>
        <th style="text-align:center">Address</th>
        <th style="text-align:center">Phone No.</th>
   </tr>
 </thead>
<?php 
$i=0;
while($row=mysql_fetch_array($b))
{ 
$i++;?>
   
   <tr>
   <td>
   <input type="radio" name="r1" id="<?php echo $i;?>" value="<?php   echo $row['sno'];?>" onChange="data(this.id)"/></td>
   <td>
 <?php   echo $row['sno'];?>
   </td>
    <td>
 <?php   echo $row['schl'];?>
   </td>
   <td>
 <?php   echo $row['addr'];?>
   </td>
   <td>
   <?php echo $row['phno'];?>
   </td>
   </tr>

<?php
  } 
 ?></table><br/></div></form>
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