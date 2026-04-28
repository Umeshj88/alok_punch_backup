<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$cls=$_GET['selected'];

if(isset($_POST['edit']))
{
	ob_start();
	header("location: cls_admsn_doc_edit.php?selected=$cls");
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
    window.location.href = "cls_admsn_doc.php?selected=" + p;
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
            <?php 
			$sel1=mysql_query("select sno from class where cls='$cls'");
			$arr1=mysql_fetch_array($sel1);
			@$cls_sno=$arr1['sno'];
			
			
			?>
			<div style=" width:100%;">
            <div style="float:left; width:50%;">
            <div class="col-md-6" style="margin-left:40%">
            <select id="adh" class="form-control" multiple="multiple" disabled="disabled">  
            <?php
			$sel=mysql_query("select admsn_doc_id from cls_admsn_doc where class_id='$cls_sno'"); 
			while($arr=mysql_fetch_array($sel))
			{
				$ad_id=$arr['admsn_doc_id'];
				
				$data=explode(',' , $ad_id);
				for($i=0; $i<sizeof($data); $i++)
				{
					$b=mysql_query("select * from admsn_doc where id='$data[$i]'");
					$row=mysql_fetch_array($b);
					 ?>
				 <option><?php echo $row['doc'];?></option>
				<?php
				}
				
				  } 
				 ?>
				 </select>
             </div>
             
            </div>
            <div style="float:left; width:50%;">
            <div class="col-md-6" >
            <?php 
			$b=mysql_query("select * from class");
            ?>
            <select id="sel" class="form-control"  multiple="multiple" onchange="javascript:valueselect()">  
            <?php 
			while($row=mysql_fetch_array($b))
			{ ?>
			 <option value="<?php   echo $row['cls'];?>" <?php if(@$cls==$row['cls']){
			 ?> selected="selected" <?php } ?>><?php   echo $row['cls'];?></option>
			<?php
			  } 

 ?>
             
             </select>
             </div>
            </div>
            </div>
           
            <div style="float:left; width:100%; margin-top:2%;">
 			<div class="col-md-6" style="margin-left:27%;">
            <button class="btn btn-warning" name="edit" type="submit" style="margin-top:2%;"><i class="fa fa-edit"></i> Edit</button>
            </div>
            </div>
            
            </form>

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