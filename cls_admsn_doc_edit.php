<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$cls=$_GET['selected'];
$sel1=mysql_query("select sno from class where cls='$cls'");
$arr1=mysql_fetch_array($sel1);
@$cls_sno=$arr1['sno'];
$_SESSION['cls_sno']=@$cls_sno;
if(isset($_POST['cncl']))
{
	ob_start();
	header("location: cls_admsn_doc.php");
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
			<form name="frm" method="post" id="frm1" action="cls_admsn_doc_edit_cnn.php">
            
			
			<div style=" width:100%;">
            <div style="float:left; width:50%;">
            <div class="col-md-6" style="margin-left:40%">
           <table>
            <?php 
			$b=mysql_query("select * from admsn_doc");
			while($row=mysql_fetch_array($b))
			{
				$admsn_id=$row['id'];
				$doc=$row['doc'];
			
				$sel=mysql_query("select admsn_doc_id from cls_admsn_doc where class_id='$cls_sno'");
				$arr=mysql_fetch_array($sel);	
				$ad_id=$arr['admsn_doc_id'];
				$ad_doc_id='';
				$data=explode(',' , $ad_id);
				for($i=0; $i<sizeof($data); $i++)
				{
					if($data[$i]==$admsn_id)
					{
						$ad_doc_id=$admsn_id;
					}
				}
				$sel1=mysql_query("select sno from class where cls='$cls'");
				$arr1=mysql_fetch_array($sel1);
				@$cls_sno=$arr1['sno'];
				
			?>
			<tr>
            <td><label><input type="checkbox" name="c[]" value="<?php echo $admsn_id;?>" <?php if($row['id']==$ad_doc_id) { ?> checked="checked" <?php }?>/>
			
			<?php echo $doc;?></label></td>
			
			</tr>
			<?php } ?>
			</table>
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
             ?>
             </select>
             </div>
            </div>
            </div>
           
            <div style="float:left; width:26%; margin-top:2%;">
 			<div class="col-md-2" style=" float:right;">
            <button class="btn btn-success" name="sav" type="submit">Save</button> 
             </div>
            </div>
            </form>
            <form method="post" name="ff">
            <div style="float:right; width:70%; margin-top:2%;">
			<div class="col-md-2">
            <button class="btn btn-default" name="cncl" type="submit">Back</button>
            </div>
            </div>
            </form>
            
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