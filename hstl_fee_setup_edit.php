<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$cls=$_GET['selected'];
@$session=$_GET['session'];
@$status=$_GET['status'];
@$gender_status=$_GET['gender_status'];
$sel=mysql_query("select * from hstl_fee_setup where class='$cls' && session='$session' && `status`='$status' && `gender_type`='".$gender_status."'");
$arr=mysql_fetch_array($sel);
$clss=$arr['class'];
$session=$arr['session'];
$cls_nm=$arr['class_nm'];
$status=$arr['status'];
$session_nm=$arr['session_nm'];
$caution=$arr['caution_money'];
$no_inst=$arr['no_installment'];



$a=0;$b=0;$c=0;$d=0;$e=0;$f=0;$g=0;$h=0;$m=0;$j=0;$k=0;$l=0;
if(isset($_POST['sav']))
{
	@$sel=$_POST['se'];
	@$clss=$_POST['cls'];
	@$inst=$_POST['inst'];
	@$r1=$_POST['r1'];
	@$r2=$_POST['r2'];
	@$cm=$_POST['cm'];
	@$tot=$_POST['tot'];
	@$gender_type=$_POST['gender_type'];
	
	for($i=1; $i<=$inst; $i++)
	{
		
		
	if($i==1){ @$a=$_POST['name_inst'.$i];}
	if($i==2){ @$b=$_POST['name_inst'.$i]; }
	if($i==3){ @$c=$_POST['name_inst'.$i]; }
	if($i==4){ @$d=$_POST['name_inst'.$i]; }
	if($i==5){ @$e=$_POST['name_inst'.$i]; }
	if($i==6){ @$f=$_POST['name_inst'.$i]; }
	if($i==7){ @$g=$_POST['name_inst'.$i]; }
	if($i==8){ @$h=$_POST['name_inst'.$i]; }
	if($i==9){ @$m=$_POST['name_inst'.$i]; }
	if($i==10){ @$j=$_POST['name_inst'.$i]; }
	if($i==11){ @$k=$_POST['name_inst'.$i]; }
	if($i==12){ @$l=$_POST['name_inst'.$i]; }

	}
	
	
	$my="UPDATE hstl_fee_setup SET `no_installment` = '$inst', `caution_money` = '$cm', `total`='$tot', `inst_1` = '$a', `inst_2` = '$b', `inst_3` = '$c', `inst_4` = '$d', `inst_5` = '$e', `inst_6` = '$f', `inst_7` = '$g', `inst_8` = '$h', `inst_9` = '$m', `inst_10` = '$j', `inst_11` = '$k', `inst_12` = '$l', `gender_type` = '$gender_type' WHERE class='$cls' && session='$session' && `status`='$status'";
	
	mysql_query($my);
	
	echo "<meta http-equiv='Refresh' content='0 ;URL=hstl_fee_setup.php'>";
	exit;
}
if(isset($_POST['cncl']))
{
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
css(); ajax();
?>


<script language="javascript">
window.onload = InitTable;
<!--
var st1 = "";
var TRI = -1;//Number of rows
var num = 0;
function AddRow(ob)
{
	var j=ob.rows.length;
for(var i=1; i<=j; j--)               //Delete a Row
{
		ob.deleteRow(TRI - 1); 
		TRI = st1.rows.length;

}
var inst = eval(document.getElementById('inst').value);
var num = 0;
if(inst>12)
{
	alert("No. of installment can be greater then 12.");
}
else {
for(var i=1; i<=inst ;i++)
{
num++;
var SetName = "inst" + num;
if(i==1 || i==5 || i==9)
{
	var newTR = ob.insertRow(TRI);

}
var newTD = document.createElement("td");
newTD.innerHTML ='Installment'+ i +' <div class="col-md-4"><input  type="text" class="form-control" name="name_' + SetName + '"  id="instl_'+ i +'" onKeyUp="instlt(this.id)" ></div>';
newTR.appendChild(newTD);
}
}
}
//------------------------------------…
function InitTable()
{
st1 = document.getElementById("st");
TRI = st1.rows.length;//Number of rows
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
                <select class="form-control" name="se" id="se" disabled>
					<?php
                    $curdat=date("Y");
                    $curdat1=$curdat+1;
                    $cdate=$curdat ."-". $curdat1;
                    $nextdat=$curdat1 +1;
                    $ndate=$curdat1 ."-". $nextdat;
                    ?>
                    <option value="<?php echo $cdate;?>" <?php if(@$cdnat==$session){ ?> selected="selected" <?php } ?>><?php echo $cdate;?></option>
                    <option value="<?php echo $ndate;?>" <?php if(@$ndate==$session){
                     ?> selected="selected" <?php } ?>><?php echo $ndate;?></option>
                    </select>
                    </div>
                <div class="col-md-2">
                <select class="form-control" name="cls" id="content" disabled>
                    <?php $sel1=mysql_query("select * from class");
                    while($arr1=mysql_fetch_array($sel1))
                    {
                    $cls=$arr1['cls'];
					$sno=$arr1['sno'];
                        ?>
                       <option value="<?php  echo $sno; ?>" <?php if(@$sno==$clss){
                 ?> selected="selected" <?php } ?>><?php echo $cls; ?></option>
                     <?php
                    }
                    ?>
                    </select>
                    </div>
                     <div class="col-md-2">
                <select class="form-control"  id="status"  disabled>
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
				<div class="col-md-2">
                <select class="form-control"  id="gender_status" name="gender_type">
                <option value="0">---Select---</option>
               <option value="Male" <?php if($gender_status=='Male'){ echo 'selected'; } ?>>Boy</option>
                <option value="Female" <?php if($gender_status=='Female'){ echo 'selected'; } ?>>Girls</option>
                
                </select>
                </div>
                    </div>
                   <div style="width:100%; margin-left:2%; margin-top:2%; float:left;">
                 	<div class="col-md-4">
                    <section>
                    <fieldset style="height:auto;" class="form-control">
                        <legend>Session</legend>
                        <!--<input type="radio" name="r1" id="se_hide" onClick="hide(this.id)" <?php if($session_nm=="Same For Current & Next Session") {?> checked="checked" <?php } ?>
                     value="Same For Current & Next Session" disabled/>Same For Current & Next Session<br/>-->
                    <input type="radio" name="r1" id="se_show" onclick="show(this.id)"  <?php if($session_nm=="Only For Selected Session") {?> checked="checked" <?php } ?> value="Only For Selected Session" disabled/>Only For Selected Session
                    </fieldset>
                       </section>
                       </div>
                       
                		<div class="col-md-4">
                        
                       <section>
                       <fieldset style="height:auto;" class="form-control">
                        <legend>Classes</legend>
                    <input type="radio" name="r2"  id="content_hide" onClick="hide(this.id)"  <?php if($cls_nm=="Same For All Classes") {?> checked="checked" <?php } ?> value="Same For All Classes" disabled/>Same For All Classes<br/>
                    <input type="radio" name="r2" id="content_show" onClick="show(this.id)"  <?php if($cls_nm=="Only For Selected Class") {?> checked="checked" <?php } ?> value="Only For Selected Class" disabled/>Only For Selected Class
                    </fieldset>
                    </section>
                    </div>
                    <div class="col-md-3">
                	<fieldset  style="height:auto;" class="form-control">
                    <legend>Student Status</legend>
                    <?php
					 $sel_status=mysql_query("select * from `stdnt_status`");
                	while($arr_status=mysql_fetch_array($sel_status))
					{
					?>
                    <label><input type="radio" name="status" value="<?php echo $arr_status['id']; ?>" <?php if($status==$arr_status['id']){ ?> checked <?php } ?> disabled/><?php echo $arr_status['status']; ?></label><br/>
               		<?php
					}
					?>
                </fieldset>
                   </div>
                   
                	</div>
                    <?php if($cls_nm=="LT") {?> checked="checked" <?php } ?>
                   <div  style="width:100%; margin-left:2%; margin-top:2%;  float:left;">
                	<div class="col-md-2">
                     No. Of Installment <input type="text" class="form-control" name="inst" id="inst" onkeyup="AddRow(st)" value="<?php echo $no_inst;?>"  style="width:60%">
                     </div>
                 <div class="col-md-2">
                     Caution Money <input type="text" class="form-control" name="cm" size="30" value="<?php echo $caution;?>"  style="width:60%">
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
						 ?>
                         <td>Installment <?php echo $i; ?><div class="col-md-4"><input  type="text" class="form-control" id="instl_<?php echo $i;?>" value="<?php echo $arr['inst_'.$i]; ?>" name="name_inst<?php echo $i;?>" onKeyUp="instlt(this.id)"></div></td>
                         <?php
                         if($i==4 || $i==8 || $i==12)
                         {
                             echo '</tr>';
                         }
                     }
                     ?>
                    </table>
                    <div class="col-md-2"><label>Total</label> <input type="text" class="form-control" name="tot" id="tot" style="width:60%;" value="<?php echo $arr['total']; ?>" readonly></div>
                    </div>
                   
                   <div style="float:left;  margin-left:2%; margin-top:2%;  width:100%;">
                <button class="btn btn-success" name="sav" type="submit" style="margin-left:10%; margin-top:2%;">Save</button> 
            	<button class="btn btn-default button-previous" name="cncl" type="submit" style="margin-top:2%;">Back</button> 
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