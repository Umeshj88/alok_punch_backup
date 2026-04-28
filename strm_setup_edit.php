<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['btn']))
{
	extract($_POST); 
	$sccs="";
	$sql="update `stream` set `strm`='".$strm."' where `strm`='".$temp."'";
	$r=mysql_query($sql);
	if(mysql_affected_rows()==1)
	{
		 header("location:strm_setup_edit.php");
	}
	else
	{ 
		  $sccs=1; 
		$msg ="<span class='error'><i class='icon-remove-sign'></i>Registration failed. Please retry.</span>";
		//header("location:strm_setup.php");
	}
}
if(isset($_POST['cancle']))
{
	 header("location:strm_setup.php");
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
        <div class="row">
		<div style="height:40%; width:40%; float:left; text-align:center"></br>
<form method="POST">
<table style="margin:15px;">
<tr> <td>
Stream Description</td>
<td>
<td><input class="form-control input-medium" name="strm" placeholder="Stream Description" id="se" type="text"></td>

</tr>
</table>
<input class="form-control input-medium" name="temp" id="temp" type="hidden">
 <button class="btn btn-success" name="btn" type="submit" style="margin-left:10%; margin-top:2%;">Save</button> 
            <button class="btn btn-default button-previous" name="cancle" type="submit" style="margin-top:2%;">Back</button>
</form>

</div>

<div style="height:40%; width:55%; float:right; ">
<?php 
extract($_POST);
$a="select * from stream";
$b=mysql_query($a);
?>
</br>
<table class="table table-bordered table-hover" style="text-align:center !important;">
<thead>
        <tr>
        <th style="text-align:center">S. No.</th>
        <th style="text-align:center">Stream </th>
    </tr>
</thead>
<?php 
while($row=mysql_fetch_array($b))
{ ?>
   
   <tr>
   <td>   <input id="r<?php echo $row['sno']; ?>" type="radio" value="<?php echo $row['strm']; ?>" name="r1" onClick="getstrm1(this.id)"></input>
  </td>
   <td>
   <?php echo $row['strm'];?>
   </td>
   
   </tr>

<?php
  } 
 ?></table></br></div></div>	
	
			
			
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