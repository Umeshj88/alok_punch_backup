<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['btn']))
{
extract($_POST); 
$sccs="";
$sql="insert into stream (strm) values ('".$strm."')";
$r=mysql_query($sql);
if(mysql_affected_rows()==1)
{
	
	 header("location:strm_setup_add.php");
	}
else
{ 
      $sccs=1; 
	$msg ="<span class='error'><i class='icon-remove-sign'></i>Registration failed. Please retry.</span>";
	header("location:index.php");}
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
		<div style="height:40%; width:40%; float:left; text-align:center"></br>
<form method="POST">
<table style="margin:15px;">
<tr> <td>
Stream Description</td>
<td><input class="form-control input-medium" name="strm" placeholder="Stream" id="se" type="text"></td>
</tr>
</table>

            <button class="btn btn-success" name="btn" type="submit" style="margin-left:10%; margin-top:2%;">Save</button> 
            <button class="btn btn-default button-previous" name="cancle" type="submit" style="margin-top:2%;">Back</button>
</form>

</div>

<div style="margin-right:20%; width:20%; float:right;">
<?php 
extract($_POST);
$a="select * from stream";
$b=mysql_query($a);
?>

<table class="table table-bordered table-hover" style="text-align:center !important;">
<thead>
        <tr>
        <th style="text-align:center">Stream </th>
    </tr>
</thead>
<?php 
while($row=mysql_fetch_array($b))
{ ?>
   
   <tr>

   <td>
   <?php echo $row['strm'];?>
   </td>
   
   </tr>

<?php
  } 
 ?></table></div></div>	
	
			
			
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