<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$cls=$_GET['selected'];
$sel=mysql_query("select * from caution_fee_setup where class='$cls'");
$arr=mysql_fetch_array($sel);
$cls=$arr['class'];


if(isset($_POST['cncl']))
{
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
			<form name="frm" method="post" id="frm1" action="caution_fee_add_cnn.php">
			<div style="float:left; width:100%; height:auto;">
           
            <div style="float:left; width:50%;">
            <div class="col-md-6" style="margin-left:30%">
           <select name="sel1" class="form-control"> 
           <?php 
		   $se=mysql_query("select * from class");
			while($r=mysql_fetch_array($se))
			{ echo $r['cls'];?>
			 <option value="<?php echo $r['sno'];?>"><?php echo $r['cls'];?></option>
			<?php
			  } 
			 ?>
			</select>
            </div>
            
           
              <div class="col-md-6" style="margin-left:30%;margin-top:2%;">
             <input type="text" name="amt" class="form-control"/>
             </div>
            </div>
            
            <div style="float:left; width:50%;">
            <div class="col-md-6">
           
            <select name="sel" class="form-control"   multiple="multiple" disabled>  
            <?php 
			$b=mysql_query("select * from caution_fee_setup");
            while($row=mysql_fetch_array($b))
            { 
				$sel1=mysql_query("select * from class where sno='".$row['class']."'");
				$arr1=mysql_fetch_array($sel1);
			?>
            <option value="<?php echo $row['class'];?>"><?php   echo $arr1['cls'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php   echo $row['amt'];?></option>
<?php
  } 
             ?>
             </select>
             </div>
            </div>
            </div>
            <div style="float:left; width:23%; margin-top:2%;">
 			<div class="col-md-2" style=" float:right;">
            <button class="btn btn-success" name="sav" type="submit">Save</button> 
             </div>
            </div>
            </form>
            <form method="post" name="ff">
            <div style="float:right; width:74%; margin-top:2%;">
			<div class="col-md-2">
            <button class="btn btn-default" name="cncl" type="submit">Cancle</button>
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