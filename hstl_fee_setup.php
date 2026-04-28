<?php 
require_once("function.php");
require_once("conn.php");
include("authentication.php"); 

@$cls=$_GET['selected'];
@$session=$_GET['session'];
@$status=$_GET['status'];
@$gender_status=$_GET['gen_type'];

$sel=mysql_query("select * from hstl_fee_setup where class='".$cls."' && session='".$session."' && `status`='".$status."' && `gender_type`='".$gender_status."'");
$arr=mysql_fetch_array($sel);
$clss=$arr['class'];
$session=$arr['session'];
$cls_nm=$arr['class_nm'];
$status=$arr['status'];
$session_nm=$arr['session_nm'];
$caution=$arr['caution_money'];
$no_inst=$arr['no_installment'];



if(isset($_POST['add']))
{
	echo "<meta http-equiv='Refresh' content='0 ;URL=hstl_fee_setup_add.php'>";
	exit;
}
if(isset($_POST['edit']))
{
	echo "<meta http-equiv='Refresh' content='0 ;URL=hstl_fee_setup_edit.php?selected=$cls&session=$session&status=$status&gender_status=$gender_status'>";
	exit;
}

if(isset($_POST['delete']))
{
	mysql_query("delete from hstl_fee_setup where class='$cls' && session='$session' && `status`='$status'");
	echo "<meta http-equiv='Refresh' content='0 ;URL=hstl_fee_setup.php'>";
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
<script type="text/javascript">
function valueselect()
{
	var j = document.getElementById('se').value;
    var i = document.getElementById('content');
    var gender_status = document.getElementById('gender_status');
    var p = i.options[i.selectedIndex].value;
    var gender_status_value = gender_status.options[gender_status.selectedIndex].value;
	
	 var k = document.getElementById('status');
    var l = i.options[k.selectedIndex].value;
	
    window.location.href = "hstl_fee_setup.php?selected="+ p + "&session="+ j + "&status="+ l
							+ "&gen_type=" + gender_status_value;
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
                  <form method="post">
			<div style="width:100%; margin-left:2%; float:left">
                <div class="col-md-2">
                <select class="form-control" name="se" id="se">
                <?php
                
$curdat=date("Y");
                $curdat1=$curdat-1;
                $cdate=$curdat1 ."-". $curdat;
                $nextdat=$curdat+1;
                $ndate=$curdat ."-". $nextdat;
                ?>
                <option value="<?php echo $cdate;?>" <?php if(@$cdnat==$session){ ?> selected="selected" <?php } ?>><?php echo $cdate;?></option>
                <option value="<?php echo $ndate;?>" <?php if(@$ndate==$session){
                 ?> selected="selected" <?php } ?>><?php echo $ndate;?></option>
                </select>
                </div>
                <div class="col-md-2">
                <select class="form-control" name="cls" id="content">
                <option value="">---Select---</option>
                <?php $sel1=mysql_query("select * from class");
                while($arr1=mysql_fetch_array($sel1))
                {
				$clss=$arr1['cls'];
                $sno=$arr1['sno'];
                    ?>
                    <option value="<?php  echo $sno; ?>" <?php if(@$sno==$cls){
                 ?> selected="selected" <?php } ?>><?php echo $clss; ?></option>
                 <?php
                }
                ?>
                </select>
                </div>
				<div class="col-md-2">
                <select class="form-control"  id="gender_status" name="gender_type">
                <option value="0">---Select---</option>
                <option value="Male" <?php if($gender_status=='Male'){ echo 'selected'; } ?>>Boy</option>
                <option value="Female" <?php if($gender_status=='Female'){ echo 'selected'; } ?>>Girls</option>
                
                </select>
                </div> 
                <div class="col-md-2">
                <select class="form-control"  id="status" onchange="javascript:valueselect()">
                <option value="">---Select---</option>
                <?php
				 	$sel_status=mysql_query("select * from `stdnt_status`");
                	while($arr_status=mysql_fetch_array($sel_status))
					{
					?>
                    <option value="<?php  echo $arr_status['id']; ?>" <?php if(@$arr_status['id']==$status){
                 ?> selected="selected" <?php } ?>><?php echo $arr_status['status']; ?></option>
                 <?php
                }
                ?>
                </select>
                </div>
                 
                    
               		
                </div>
                <div style="width:100%; margin-left:2%; margin-top:2%; float:left;">
                 	<div class="col-md-4">
                    <section>
                <fieldset style="height:auto;" class="form-control " disabled>
                    <legend>Session</legend>
                   <!-- <input type="radio" name="r1" onclick="hide1()" <?php if($session_nm=="Same For Current & Next Session") {?> checked="checked" <?php } ?>
                 value="Same For Current & Next Session"/>Same For Current & Next Session<br/>-->
                <input type="radio" name="r1" onclick="show1()"  <?php if($session_nm=="Only For Selected Session") {?> checked="checked" <?php } ?> value="Only For Selected Session"/>Only For Selected Session
                </fieldset>
                   </section>
                    </div>
                		<div class="col-md-4">
                   <section>
                   <fieldset style="height:auto;" class="form-control "  disabled> 
                    <legend>Classes</legend>
                <input type="radio" name="r2"   onclick="hide()"  <?php if($cls_nm=="Same For All Classes") {?> checked="checked" <?php } ?> value="Same For All Classes"/>Same For All Classes<br/>
                <input type="radio" name="r2"onclick="show()"  <?php if($cls_nm=="Only For Selected Class") {?> checked="checked" <?php } ?> value="Only For Selected Class"/>Only For Selected Class
                </fieldset>
                </section>
                </div>
                 <div class="col-md-3">
                	<fieldset  style="height:auto;" class="form-control" disabled>
                    <legend>Student Status</legend>
                    <?php
					 $sel_status=mysql_query("select * from `stdnt_status`");
                	while($arr_status=mysql_fetch_array($sel_status))
					{
					?>
                    <label><input type="radio" name="status" value="<?php echo $arr_status['id']; ?>" <?php if($status==$arr_status['id']){ ?> checked <?php } ?>/><?php echo $arr_status['status']; ?></label><br/>
               		<?php
					}
					?>
                </fieldset>
                   </div>
                </div>
                <?php if($cls_nm=="LT") {?> checked="checked" <?php } ?>
                <div  style="width:100%; margin-left:2%; margin-top:2%;  float:left;">
                	<div class="col-md-2">
                 No. Of Installment <input type="text" class="form-control" name="inst" id="inst" onkeyup="AddRow(st)" value="<?php echo $no_inst;?>" disabled>
                 </div>
                 <div class="col-md-2">
                 Caution Money <input type="text" class="form-control"  value="<?php echo $caution;?>"    disabled>
                 </div>
                </div>
               <div style="width:100%;  margin-left:2%; margin-top:2%;  float:left;">
                 <table id="st" width="100%">
                 <?php
                 
                 for($i=1; $i<=$no_inst; $i++)
                 {
                     if($i==1 || $i==5 || $i==9)
                     {
                         echo '<tr>';
                     }
					  echo '<td>Installment'.$i.'<div class="col-md-4"><input  type="text" class="form-control" id="instl_"'.$i.'"" value="'.$arr['inst_'.$i].'" onKeyUp="instlt(this.id)" readonly></div></td>';
                     if($i==4 || $i==8 || $i==12)
                     {
                         echo '</tr>';
                     }
                 }
                 ?>
                  
                </table>
                <div class="col-md-2" style="float:right"><label>Total</label> <input type="text" class="form-control" name="tot" id="tot" value="<?php echo $arr['total']; ?>" style="width:60%;" readonly></div>
                </div>
               
                   
                <div style="float:left; width:100%; text-align:center">
                <button class="btn btn-info" name="add"  
 type="submit"><i class="fa fa-plus"></i> Add</button> 
                <button class="btn btn-warning" name="edit" 
 type="submit"><i class="fa fa-edit"></i> Edit</button> 
                <button class="btn btn-danger" name="delete"  
 type="submit"><i class="fa fa-trash-o "></i> Delete</button>
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