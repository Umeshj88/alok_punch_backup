<?php
require_once("conn.php");
include("authentication.php");
require_once("function.php");
if(isset($_POST['view']))
{
	$cls=$_POST['cls'];
	$stream=$_POST['stream'];
	$sec=$_POST['sec'];
	$r1=$_POST['r1'];
	echo "<script>
	window.open('pending_doc_report_view.php?cls=$cls&r1=$r1&stream=$stream&sec=$sec','_blank');
	</script>";
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
            <label><input type="radio" name="r1" value="Not All Classes"  onclick="show()"/>Class</label>
            
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
    <option value="">---select Section---</option>
         <?php $sql_="select * from section";
                $sql=mysql_query($sql_);
                while($t=mysql_fetch_array($sql))
                { 
                   $section = $t['section'];
				   $sno = $t['sno'];
                        ?>
                 <option value="<?php echo $sno; ?>"><?php echo $section ?></option>
                <?php
					}	
    ?></select>
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
            <button class="btn btn-info" name="view" type="submit" >View</button>
            </div>
           
            <div id="mnth_fee" style="float:left; width:100%;">
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