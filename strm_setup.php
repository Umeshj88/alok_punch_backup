<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['add']))
{
	header("location:strm_setup_add.php");
}
if(isset($_POST['edit']))
{
	header("location:strm_setup_edit.php");
}
if(isset($_POST['delete']))
{
	extract($_POST); 
	$sccs="";
	$sql="delete from `stream` where `strm`='".$strm."'";
	$r=mysql_query($sql);
	if(mysql_affected_rows()==1)
	{
		header("location:strm_setup.php");
	}
	
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
			<div style="height:40%; width:40%; float:left; text-align:center"><br/>
<form method="POST">
<table style="margin-left:11%;">
<tr> 
<td><label>Stream</label></td>
            <td><input class="form-control input-medium" name="strm" placeholder="Stream" id="se" type="text" readonly></td>
</tr>
<tr>
<td></td>
<td>
            <button class="btn btn-info" name="add" type="submit" style=" margin-top:2%;"><i class="fa fa-plus"></i> Add</button>
            <button class="btn btn-warning" name="edit" type="submit" style="margin-top:2%;"><i class="fa fa-edit"></i> Edit</button>
            <button class="btn btn-danger" name="delete" type="submit" style="margin-top:2%;"><i class="fa fa-trash-o "></i> Delete</button> 
            </td></tr>
            </table>
</form>

</div>

<div style="height:40%; width:55%; float:right; ">
<?php 
extract($_POST);
$a="select * from stream";
$b=mysql_query($a);
?>
<br/>
<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Stream Setup
							</div>
							
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
						<table class="table table-bordered table-hover">
<thead>
        <tr>
        <th>Select</th>
        <th>Stream </th>
    </tr>
</thead>
<?php 
while($row=mysql_fetch_array($b))
{ ?>
   
   <tr>
   <td>
   <input id="r<?php echo $row['sno']; ?>" type="radio" value="<?php echo $row['strm']; ?>" name="r1" onClick="getstrm1(this.id)"></input>
   </td>
   <td>
   <?php echo $row['strm'];?>
   </td>
   
   </tr>

<?php
  } 
 ?></table>
 </div></div>
	
			
			</div>
            
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