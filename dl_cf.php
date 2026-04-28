<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
date_default_timezone_set('Asia/Calcutta');
ini_set('max_execution_time', 100000);
$session=$_SESSION['session'];
$session_date=date('Y-m-d');
$str =$session;
$expl_session=(explode("-",$str)); 
$expl_date=$expl_session[0];
$starting_date=$expl_date.'-04-01';
$expl_date=$expl_session[1];
$ending_date= $expl_date.'-03-31';



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
		toggleDisabled(document.getElementById("sec"));
		toggleDisabled(document.getElementById("stream"));
		
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
	  toggleDis(document.getElementById("sec"));
	 toggleDis(document.getElementById("stream"));
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
            <form name="frm" method="post">
            <div style="padding-left:40%">
            <label>
            <input type="radio" name="r1" id="ac" value="All Classes" onclick="hide()"/>All Classes</label>
            <label><input type="radio" name="r1"  onclick="show()"/>Class</label>
            
            <select class="form-control input-medium" name="cls" id="content" disabled>
            <option value="">---Select Class---</option>
            <?php $sel=mysql_query("select * from class");
            while($arr=mysql_fetch_array($sel))
            {
            $cls=$arr['cls'];
			$sno=$arr['sno'];
            echo '<option value="'.$sno.'">'.$cls.'</option>';
            }
            ?>
            </select>
            <br/>
             <select class="form-control input-medium" name="sec" id="sec" disabled>
            <option value="">---Select Section---</option>
            <?php $sel=mysql_query("select * from `section`");
            while($arr=mysql_fetch_array($sel))
            {
            $section=$arr['section'];
			$sno=$arr['sno'];
            echo '<option value="'.$sno.'">'.$section.'</option>';
            }
            ?>
            </select>
            <br/>
            
             <select class="form-control input-medium" name="stream" id="stream" disabled>
            <option value="">---Select Stream---</option>
            <?php $sel=mysql_query("select * from stream");
            while($arr=mysql_fetch_array($sel))
            {
            $strm=$arr['strm'];
			$sno=$arr['sno'];
            echo '<option value="'.$sno.'">'.$strm.'</option>';
            }
            ?>
            </select>
            </div>
            <div style="padding-left:40%; margin-top:2%;">
            <button class="btn btn-info" name="view" type="button"  onClick="due_ctn_fees()">View</button>
            <button class="btn btn-success" name="print" type="button" <?php if(($session_date > $ending_date) ){ ?> disabled="disabled" <?php } ?>  onClick="pop_print()"><i class="fa fa-print"></i>Print</button> 
            </div>
            <div style="float:left; width:100%;">
            <table style="width:100%;">
            <tr>
            <td><h3 align="center">Dues List (Caution Fees)</h3></td>
            </tr>
            <tr>
            <td align="center"><?php echo date("d-M-Y");?></td>
            </tr>
            </table>
            </div>
            <div id="ctn_fee" style="float:left; width:100%;">
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
<script>
function pop_print()
{
	w=window.open(null, 'Print_Page', 'scrollbars=yes');   
	w.document.write(jQuery('#ctn_fee').html());
	w.document.close();
	w.print();
} 
</script>
</body>
<!-- END BODY -->

</html>