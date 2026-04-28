<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$cls=$_GET['selected'];
$sel=mysql_query("select * from caution_fee_setup where class='$cls'");
$arr=mysql_fetch_array($sel);
$cls=$arr['class'];
$amt=$arr['amt'];

if(isset($_POST['add']))
{
	ob_start();
	header("location: caution_fee_add.php");
	ob_flush();
}
if(isset($_POST['edit']))
{
	$cls=$arr['class'];
$amt=$arr['amt'];
	ob_start();
	header("location: caution_fee_edit.php?selected=$cls");
	ob_flush();
}
if(isset($_POST['delete']))
{
	mysql_query("delete from caution_fee_setup where class='$cls'");
	ob_start();
	header("location: caution_fee.php");
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
    window.location.href = "caution_fee.php?selected=" + p;
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
		<div class="page-content">
			<div class="row">
			<form name="frm" method="post">
			<div style=" width:100%;">
            <div style="float:left; width:50%;">
            <div class="col-md-6" style="margin-left:40%">
            <select id="sel1" name="class" class="form-control" disabled="disabled"> 
            <option value=""></option> 
            <?php 
			$se=mysql_query("select * from class");
           while($r=mysql_fetch_array($se))
			{ echo $r['cls'];?>
			 <option value="<?php   echo $r['sno'];?>" <?php if(@$cls==$r['sno']){
			 ?> selected="selected" <?php } ?>><?php   echo $r['cls'];?></option>
			<?php
			  } 
             ?>
             </select>
             </div>
             <br/><br/>
              <div class="col-md-6" style="margin-left:40%">
 <input type="text" name="amt" class="form-control" value="<?php echo @$amt;?>" readonly="readonly"/>
 </div>
            
            </div>
            <div style="float:left; width:50%;">
            <div class="col-md-6" >
            <select id="sel" class="form-control"  multiple="multiple" onchange="javascript:valueselect()">  
            <?php 
			$b=mysql_query("select * from caution_fee_setup");
           while($row=mysql_fetch_array($b))
		   {
			   $sel1=mysql_query("select * from class where sno='".$row['class']."'");
				$arr1=mysql_fetch_array($sel1); 
			?>
			 <option value="<?php   echo $row['class'];?>" <?php if(@$cls==$row['class']){?> selected="selected" <?php } ?>>
			 <?php echo $arr1['cls'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php   echo $row['amt'];?></option>
			<?php
			  } 
			 ?>
             ?>
             </select>
             </div>
            </div>
            </div>
           
            <div style="float:left; width:100%; margin-top:2%;">
 			<div class="col-md-6" style="margin-left:18%;">
             <button class="btn btn-info" name="add" type="submit" style="margin-left:5%; margin-top:2%;"><i class="fa fa-plus"></i> Add</button> 
            <button class="btn btn-warning" name="edit" type="submit" style="margin-top:2%;"><i class="fa fa-edit"></i> Edit</button>
            <button class="btn btn-danger" name="delete" type="submit" style="margin-top:2%;"><i class="fa fa-trash-o "></i> Delete</button>
            </div>
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