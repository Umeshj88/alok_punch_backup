<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$doc=$_GET['selected'];
$_SESSION['doc']=@$doc;
$sel=mysql_query("select * from admsn_doc where doc='$doc'");
$arr=mysql_fetch_array($sel);
$doc=$arr['doc'];


if(isset($_POST['cncl']))
{
	echo "<meta http-equiv='Refresh' content='0 ;URL=admsn_doc.php'>";
	exit;
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
			<form name="frm" method="post" id="frm1" action="admsn_doc_edit_cnn.php">
			<div style="float:left; width:100%; height:auto;">
           
            <div style="float:left; width:50%;">
            <div class="col-md-6" style="margin-left:30%">
            <input type="text" name="t1" class="form-control" value="<?php echo @$doc;?>">
            </div>
            </div>
            
            <div style="float:left; width:50%;">
            <div class="col-md-6">
            <?php
            $b=mysql_query("select * from admsn_doc");
			?>
			<select id="sel" class="form-control" multiple="multiple" onchange="javascript:valueselect()" disabled="disabled">  
			<?php 
			while($row=mysql_fetch_array($b))
			{ ?>
			 <option value="<?php   echo $row['doc'];?>" <?php if(@$doc==$row['doc']){
			 ?> selected="selected" <?php } ?>><?php   echo $row['doc'];?></option>
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
            <button class="btn btn-default" name="cncl" type="submit">Back</button>
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