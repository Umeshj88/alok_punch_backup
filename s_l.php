<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");

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
          <div style="float:left; width:50%;">
            <label><input type="radio" name="r1" id="ac" value="All Classes" onclick="hide()"/>All Classes</label><br/>
            <label><input type="radio" name="r1" id="cls" value="Class" onclick="show()"/>Class</label>
            
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
            <div style="float:right; width:50%;">
            <label> <input type="radio" name="r2" id="as" value="All Students"/>All Students</label><br/>
            <label><input type="radio" name="r2" id="pf" value="paid fees"/>Only those who have paid fees</label>
            </div>
            <div style="float:left; width:80%;">
            <div class="input-group input-large date-picker input-daterange">
            <input class="form-control" type="text" name="from" id="form" value="<?php echo $from; ?>"></input>
            <span class="input-group-addon">To</span>
            <input class="form-control" type="text" name="to" id="to" value="<?php echo $to; ?>"></input>
            </div>
            </div>
            <div style="float:left; width:50%; margin-top:2%; text-align:center">
            <button class="btn btn-info" name="view"  type="button" onClick="getstdnt_ldgr()">View</button> 
            <button class="btn btn-info" name="print"  type="button"  onClick="pop_print()">Print</button> 
            </div>
           </div>
            </form>
            <div id="sl" style="float:left; width:100%;">
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
<script>
function pop_print()
{
	w=window.open(null, 'Print_Page', 'scrollbars=yes');   
	w.document.write(jQuery('#sl').html());
	w.document.close();
	w.print();
} 
</script>
</body>
<!-- END BODY -->

</html>