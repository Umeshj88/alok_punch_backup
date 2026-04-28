<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['print']))
{
	$r1=$_POST['r1'];
	$cls=$_POST['cls'];
	echo "<script>
	window.open('report_tc_students_view.php?cls=$cls&r1=$r1','_blank');
	</script>";
	echo "<meta http-equiv='Refresh' content='0 ;URL=report_tc_students.php'>";
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
ajax();
?>
<script type="text/javascript">
function show() {
	
			  toggleDisabled(document.getElementById("content"));
}

function toggleDisabled(el) {
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
</script>
<script type="text/javascript">
function hide() {
	
     toggleDis(document.getElementById("content"));
}

function toggleDis(e) {
try {
e.disabled =true;
}
catch(E){
}
if (e.childNodes && e.childNodes.length > 0) {
for (var x = 0; x < e.childNodes.length; x++) {
toggleDis(e.childNodes[x]);
}
}
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
            <form name="frm"  method="post">
          <div style="padding-left:25%; float:left; width:80%;">
          <div style="float:left; width:100%;">
            <label><input type="radio" name="r1" value="All Classes" onclick="hide()"/>All Classes</label><br/>
            <label><input type="radio" name="r1" value="Class" onclick="show()"/>Class</label>
            
            <select class="form-control input-small" name="cls" id="content" disabled>
            <?php 
			$sel=mysql_query("select * from `class`");
            while($arr=mysql_fetch_array($sel))
            {
            	$cls=$arr['cls'];
				$sno=$arr['sno'];
                echo '<option value="'.$sno.'">'.$cls.'</option>';
            }
            ?>
                </select>
            </div>
 			<div style="float:left; width:50%; margin-top:2%; text-align:center">
            
            <button class="btn btn-info" name="print"  type="submit">Print</button> 
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