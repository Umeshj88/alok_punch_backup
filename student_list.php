<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['view']))
{
	$r2=$_POST['r2'];
	$r1=$_POST['r1'];
	$class=$_POST['class'];
	$stream=$_POST['stream'];
	$sec=$_POST['sec'];
	echo "<script>
	window.open('student_list_view.php?class=$class&r2=$r2&r1=$r1&stream=$stream&sec=$sec','_blank');
	</script>";
	echo "<meta http-equiv='Refresh' content='0 ;URL=student_list.php'>";
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
function show() {
	
		toggleDisabled(document.getElementById("class"));
		toggleDisabled(document.getElementById("section"));
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
	
     toggleDis(document.getElementById("class"));
	  toggleDis(document.getElementById("section"));
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
             <form name="sl" method="post" class="form">
             <div style="padding-left:5%; float:left; width:100%;">
             <span style="background-color:#FCF8E3;">Select any one
              <label><input type="radio" name="r2" value="rte"/>RTE Students</label>
            <label><input type="radio" name="r2" value="continoue_discontinoue_status"/>Discontinoue Students</label>
            <label><input type="radio" name="r2" value="tc_issued"/>TC Issued Students</label>
           
            <label><input type="radio" name="r2" value="New Admission List"/>New Admission List</label>
            <label><input type="radio" name="r2" value="New and Old Students List"/>New and Old Students List</label>
            <label><input type="radio" name="r2" value="New Hostel List"/>New Hostel List</label>
            <label><input type="radio" name="r2" value="New and Old Hostel List"/>New and Old Hostel List</label>
             </span>
            <br/>
             <span style="background-color:#FCF8E3;">Select any one
            <label><input type="radio" name="r1" value="1"  onclick="show()"/>Class Wise</label>
            <label><input type="radio" name="r1" value="2"  onclick="hide()"/>All Class Wise</label>
            </span>
            <div id="content">
            <select class="form-control input-medium" name="class" id="class" disabled>
            <option value="0">---Select Class----</option>
            <?php $sel=mysql_query("select * from class");
            while($arr=mysql_fetch_array($sel))
            {
            	$cls=$arr['cls'];
				$sno=$arr['sno'];
                echo '<option value="'.$sno.'">'.$cls.'</option>';
            }
            ?>    </select>   <br/>   
            <select class="form-control input-medium" name="sec" id="section" disabled>
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
              
            <br/>
             <button class="btn btn-success" name="view"  type="submit"><i class="fa fa-book"></i> View</button>
            </div>
            </form>
                        
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>

<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>