<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$nm=$_GET['selected'];
$sel=mysql_query("select * from conduct_detail where name='$nm'");
$arr=mysql_fetch_array($sel);
$nm=$arr['name'];


if(isset($_POST['cncl']))
{
	ob_start();
	header("location: conduct.php");
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
            <form name="frm" method="post" id="frm1" action="conduct_add_cnn.php">
        
            <div style="float:left; width:100%; height:auto;">
           
            <div style="float:left; width:50%;">
            <div class="col-md-6" style="margin-left:30%">
            <textarea  class="form-control" name="t1" cols="5" rows="4"  ></textarea>
            </div>
            </div>
            
            <div style="float:left; width:50%;">
            <div class="col-md-6">
            <?php 
            $b=mysql_query("select * from conduct_detail");
            ?>
            <select id="sel" class="form-control"   multiple="multiple" disabled>  
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
            <div style="float:left; width:22%; margin-top:2%;">
 			<div class="col-md-2" style=" float:right;">
            <button class="btn btn-success" name="sav" type="submit">Save</button> 
             </div>
            </div>
            </form>
            <form method="post" name="ff">
            <div style="float:right; width:75%; margin-top:2%;">
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