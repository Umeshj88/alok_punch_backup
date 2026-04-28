<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
$a='';$b='';$c='';$d='';$e='';$f='';$g='';$h='';$m='';$j='';$k='';$l='';
if(isset($_POST['sav']))
{
	
	@$sel=$_POST['se'];
	@$cls=$_POST['cls'];
	@$inst=$_POST['inst'];
	@$r1=$_POST['r1'];
	@$r2=$_POST['r2'];
	@$cm=$_POST['cm'];
	@$status=$_POST['status'];
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
	

$curdat=date("Y");
                $curdat1=$curdat-1;
                $cdate=$curdat1 ."-". $curdat;
                $nextdat=$curdat+1;
                $ndate=$curdat ."-". $nextdat;
	if($r1=="Only For Selected Session" && $r2=="Only For Selected Class")
	{
		
	mysql_query("delete from `hstl_fee_setup` where `session`='".$sel."' && `class`='".$cls."' && `status`='".$status."' && `gender_type`='".$gender_type."'");
	mysql_query("insert into hstl_fee_setup (session,class,class_nm,status,no_installment,caution_money,total,inst_1,inst_2,inst_3,inst_4,inst_5,inst_6,inst_7,inst_8,inst_9,inst_10,inst_11,inst_12,gender_type) values('$sel','$cls','$r2','$status','$inst','$cm','$tot','$a','$b','$c','$d','$e','$f','$g','$h','$m','$j','$k','$l','$gender_type')");
		//print_r(mysql_num_rows($result));exit;
}

if($r1=="Only For Selected Session" && $r2=="Same For All Classes")
	{
	  mysql_query("delete from hstl_fee_setup where session='$sel'  && `status`='$status' && `gender_type`='".$gender_type."'");
	 $sel1=mysql_query("select * from class");
	while($arr=mysql_fetch_array($sel1))
	{
	$cls=$arr['sno'];	
	mysql_query("insert into hstl_fee_setup (session,class,class_nm,status,no_installment,caution_money,total,inst_1,inst_2,inst_3,inst_4,inst_5,inst_6,inst_7,inst_8,inst_9,inst_10,inst_11,inst_12,gender_type) values('$sel','$cls','$r1','$status','$inst','$cm','$tot','$a','$b','$c','$d','$e','$f','$g','$h','$m','$j','$k','$l','$gender_type')");
}
	}

if($r1=="Same For Current & Next Session" && $r2=="Same For All Classes")
	{
		mysql_query("delete from hstl_fee_setup where session='$cdate' && `status`='$status' && `gender_type`='".$gender_type."'");
		mysql_query("delete from hstl_fee_setup where session='$ndate' && `status`='$status' && `gender_type`='".$gender_type."'");
	
	 $sel1=mysql_query("select * from class");
while($arr=mysql_fetch_array($sel1))
{
	$cls=$arr['sno'];	
	mysql_query("insert into hstl_fee_setup (session,class,class_nm,status,no_installment,caution_money,total,inst_1,inst_2,inst_3,inst_4,inst_5,inst_6,inst_7,inst_8,inst_9,inst_10,inst_11,inst_12,gender_type) values('$cdate','$cls','$r1','$status','$inst','$cm','$tot','$a','$b','$c','$d','$e','$f','$g','$h','$m','$j','$k','$l','$gender_type')");	
}
 $sel1=mysql_query("select * from class");
while($arr=mysql_fetch_array($sel1))
{
	$cls=$arr['sno'];
mysql_query("insert into hstl_fee_setup (session,class,class_nm,status,no_installment,caution_money,total,inst_1,inst_2,inst_3,inst_4,inst_5,inst_6,inst_7,inst_8,inst_9,inst_10,inst_11,inst_12,gender_type) values('$ndate','$cls','$r1','$status','$inst','$cm','$tot','$a','$b','$c','$d','$e','$f','$g','$h','$m','$j','$k','$l','$gender_type')");
}
}

if($r1=="Same For Current & Next Session" && $r2=="Only For Selected Class")
	{
	mysql_query("delete from hstl_fee_setup where session='$cdate' && class='$cls' && `status`='$status' && `gender_type`='".$gender_type."'");
		mysql_query("delete from hstl_fee_setup where session='$ndate' && class='$cls' && `status`='$status' && `gender_type`='".$gender_type."'");
	mysql_query("insert into hstl_fee_setup (session,class,class_nm,status,no_installment,caution_money,inst_1,total,inst_2,inst_3,inst_4,inst_5,inst_6,inst_7,inst_8,inst_9,inst_10,inst_11,inst_12,gender_type) values('$cdate','$cls','$r1','$status','$inst','$cm','$tot','$a','$b','$c','$d','$e','$f','$g','$h','$m','$j','$k','$l','$gender_type')");
	mysql_query("insert into hstl_fee_setup (session,class,class_nm,status,no_installment,caution_money,inst_1,total,inst_2,inst_3,inst_4,inst_5,inst_6,inst_7,inst_8,inst_9,inst_10,inst_11,inst_12,gender_type) values('$ndate','$cls','$r1','$status','$inst','$cm','$tot','$a','$b','$c','$d','$e','$f','$g','$h','$m','$j','$k','$l','$gender_type')");

	
}
echo "<meta http-equiv='Refresh' content='0 ;URL=hstl_fee_setup_add.php'>";
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
<script type="text/javascript">
function show(id) 
{
	if(id=='content_show')
	{
	 toggleDisabled(document.getElementById("content"));
	}
	else
	{
		toggleDisabled(document.getElementById("se"));
	}
}

function toggleDisabled(el)
 {
	try {
	el.disabled =false ;
	}
	catch(E){
	}
	if (el.childNodes && el.childNodes.length > 0) {
	for (var x = 0; x < el.childNodes.length; x++) {
	toggleDisabled(el.childNodes[x]);
	}
	}
}
function hide(id) 
{
	if(id=='content_hide')
	{
	 toggleDis(document.getElementById("content"));
	}
	else
	{
		toggleDis(document.getElementById("se"));
	}
}

function toggleDis(el)
 {
	try {
	el.disabled =true ;
	}
	catch(E){
	}
	if (el.childNodes && el.childNodes.length > 0) {
	for (var x = 0; x < el.childNodes.length; x++) {
	toggleDis(el.childNodes[x]);
	}
	}
}
</script>

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
newTD.innerHTML ='Installment'+ i +' <div class="col-md-4"><input tab-index="1" type="text" class="form-control" name="name_' + SetName + '"  id="instl_'+ i +'" onKeyUp="instlt(this.id)" ></div>';
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
                $curdat1=$curdat-1;
                $cdate=$curdat1 ."-". $curdat;
                $nextdat=$curdat+1;
                $ndate=$curdat ."-". $nextdat;
                ?>
                <option value="<?php echo $cdate;?>"><?php echo $cdate;?></option>
                <option value="<?php echo $ndate;?>"><?php echo $ndate;?></option>
                </select>
                 </div>
                <div class="col-md-2">
                <select class="form-control" name="cls" id="content" onChange="getctn()" disabled>
                <?php $sel=mysql_query("select * from class");
                while($arr=mysql_fetch_array($sel))
                {
                $cls=$arr['cls'];
				$sno=$arr['sno'];
                    echo '<option value="'.$sno.'">'.$cls.'</option>';
                }
                ?>
                </select>
                </div>
				<div class="col-md-2">
                <select class="form-control"  id="gender_status" name="gender_type">
                <option value="0">---Select---</option>
                <option value="Male">Boy</option>
                <option value="Female">Girls</option>
                
                </select>
                </div> 
                </div>
                
                <div style="width:100%; margin-left:2%; margin-top:2%; float:left;">
                 <div class="col-md-4">
                    <fieldset  style="height:auto;" class="form-control ">
                    <legend>Session</legend>
                <!--<label><input type="radio" name="r1" id="se_hide" onClick="hide(this.id)" value="Same For Current & Next Session"/>Same For Current & Next Session</label><br/>-->
                <label><input type="radio" name="r1" id="se_show" onclick="show(this.id)" value="Only For Selected Session"/>Only For Selected Session</label>
                </fieldset>
                </div>
                <div class="col-md-4">
                <fieldset  style="height:auto;" class="form-control">
                    <legend>Class</legend>
                    <label><input type="radio" name="r2" id="content_hide" onClick="hide(this.id)" value="Same For All Classes"/>Same For All Classes</label><br/>
                <label><input type="radio" name="r2" id="content_show" onClick="show(this.id)" value="Only For Selected Class"/>Only For Selected Class</label>
                </fieldset>
                   </div>
                   <div class="col-md-3">
                	<fieldset  style="height:auto;" class="form-control">
                    <legend>Student Status</legend>
                    <?php
					 $sel_status=mysql_query("select * from `stdnt_status`");
                	while($arr_status=mysql_fetch_array($sel_status))
					{
					?>
                    <label><input type="radio" name="status" value="<?php echo $arr_status['id']; ?>"/><?php echo $arr_status['status']; ?></label><br/>
               		<?php
					}
					?>
                </fieldset>
                   </div>
                   
                </div>
                <?php
                $sel2=mysql_query("select amt from `caution_fee_setup` where `class`='$cls'");
                $arr2=mysql_fetch_array($sel2);
                ?>
               <div  style="width:100%; margin-left:2%; margin-top:2%;  float:left;">
                <div class="col-md-2">
                 No. Of Installment <input type="text" class="form-control" name="inst" id="inst" style="width:60%" onKeyUp="AddRow(st)">
                 </div>
                 <div class="col-md-2">
                 Caution Money <input type="text" class="form-control" name="cm" id="cm" style="width:60%">
                 </div>
                 
                </div>
               
               
                <div style="width:100%;  margin-left:2%; margin-top:2%;  float:left;">
                 <table id="st" width="100%">
                
                </table>
                <div class="col-md-2"><label>Total</label> <input type="text" class="form-control" name="tot" id="tot" style="width:60%;" readonly></div>
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