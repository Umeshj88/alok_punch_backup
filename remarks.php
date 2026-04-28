<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$nm=$_GET['selected'];
$sel=mysql_query("select * from remarks where name='$nm'");
$arr=mysql_fetch_array($sel);
$nm=$arr['name'];

if(isset($_POST['add']))
{
	ob_start();
	header("location: remarks_add.php");
	ob_flush();
}
if(isset($_POST['edit']))
{
	ob_start();
	header("location: remarks_edit.php?selected=$nm");
	ob_flush();
}
if(isset($_POST['delete']))
{
	mysql_query("delete from remarks where name='$nm'");
	ob_start();
	header("location: remarks.php");
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
<script type="text/javascript">
function valueselect()
{
    var i = document.getElementById('sel');
    var p = i.options[i.selectedIndex].value;
    window.location.href = "remarks.php?selected=" + p;
}
</script>
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
			<form name="frm" method="post">
			<div style=" width:100%;">
            <div style="float:left; width:50%;">
            <div class="col-md-6" style="margin-left:30%">
            <textarea  class="form-control" name="t" cols="5" rows="4" readonly="readonly"  ><?php   echo $nm;?></textarea>
            </div>
            </div>
            <div style="float:left; width:50%;">
            <div class="col-md-6">
            <?php 
            $b=mysql_query("select * from remarks");
            ?>
            <select id="sel" class="form-control"   multiple="multiple" onchange="javascript:valueselect()">  
            <?php 
            while($row=mysql_fetch_array($b))
            { ?>
            <option value="<?php   echo $row['name'];?>" <?php if(@$nm==$row['name']){
 			?> selected="selected" <?php } ?>><?php   echo $row['name'];?></option>
            <?php
              } 
             ?>
             </select>
             </div>
            </div>
            </div>
            <div style="float:left; width:100%; margin-top:2%;">
 			<div class="col-md-6" style="margin-left:14%;">
             <button class="btn btn-info" name="add" type="submit" style="margin-left:5%; margin-top:2%;"><i class="fa fa-plus"></i> Add</button> 
            <button class="btn btn-warning" name="edit" type="submit" style="margin-top:2%;"><i class="fa fa-edit"></i> Edit</button>
            <button class="btn btn-danger" name="delete" type="submit" style="margin-top:2%;"><i class="fa fa-trash-o "></i> Delete</button>
            </div>
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