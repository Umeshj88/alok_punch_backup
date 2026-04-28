<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['view']))
{
	@$fee_type=$_POST['fee_type'];
	@$r2=$_POST['r2'];
	if($r2==1)
	{
		echo "<meta http-equiv='Refresh' content='0;URL=swp_view.php?fee_type=$fee_type&r2=$r2'>";
		exit;
	}
	else if($r2==2)
	{
		@$class=$_POST['class'];
		@$stream=$_POST['stream'];
		echo "<meta http-equiv='Refresh' content='0;URL=swp_view.php?fee_type=$fee_type&class=$class&stream=$stream&r2=$r2'>";
		exit;
	}
	else if($r2==3)
	{
		@$schlr_no=$_POST['schlr_no'];
		echo "<meta http-equiv='Refresh' content='0;URL=swp_view.php?schlr_no=$schlr_no&fee_type=$fee_type&r2=$r2'>";
		exit;
	}
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


<!--///////////////////////       show()        //////////////////////////-->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".btn-sm").live('click',function(e)
	{
		var fee_type =  $('#fee_type').val();
		 var old_query_string = $(this).attr('href');
		new_query_string = old_query_string + "&fee_type=" + fee_type;
		$(this).attr('href',new_query_string);
	});
});

function show() {
			  toggleDisabled(document.getElementById("content"));
			  hide2();
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
<!--///////////////////////       hide()        //////////////////////////-->

<script type="text/javascript">

			
function hide2() {
     toggleDis2(document.getElementById("btt"));
}

function toggleDis2(e2) {
try {
e2.disabled =fase;
}
catch(E){
}
if (e2.childNodes && e2.childNodes.length > 0) {
for (var x = 0; x < e2.childNodes.length; x++) {
toggleDis2(e2.childNodes[x]);
}
}
}
</script>

<script type="text/javascript">
function hide() {
     toggleDis(document.getElementById("content"));
	 hide2();
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
hide2();
}
</script>

<!--///////////////////////       bt()        //////////////////////////-->
<script type="text/javascript">
function bt() {
	
     Dis(document.getElementById("btt"));
	 hide();
}

function Dis(e1) {
try {
e1.disabled =false;
}
catch(E){
}
if (e1.childNodes && e1.childNodes.length > 0) {
for (var x = 0; x < e1.childNodes.length; x++) {
Dis(e1.childNodes[x]);
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
             <input type="hidden" value="<?php echo @$schlr_no; ?>" id="schlr_no" name="schlr_no">
             <div style="padding-left:30%; float:left; width:100%;">
           <select  class="form-control input-medium" name="fee_type" id="fee_type">
              <option value="">--- Select Fee ---</option>
            <option value="1">General Fees</option>
            <option value="2">Monthly Fees</option>
            <option value="3">Hostal Fees</option>
            <option value="4">Adhoc Fees</option>
            </select>
            <br/>
            <label>Display Payment Details</label><br/>
          
            <label><input type="radio" name="r2" value="1" onClick="hide();"/>All Students</label>
            <label><input type="radio" name="r2" value="2" onClick="show();"/>All Students Of Class</label>
            <label><input type="radio" name="r2" value="3" onClick="hide();"/>Non Scholar</label>
            <div id="content">
            <select class="form-control input-medium" name="class" disabled>
            <option value="">---Select Class----</option>
            <?php $sel=mysql_query("select * from class");
            while($arr=mysql_fetch_array($sel))
            {
            	$cls=$arr['cls'];
				$sno=$arr['sno'];
                echo '<option value="'.$sno.'">'.$cls.'</option>';
            }
            ?>    </select>
            <br/>
                <select class="form-control input-medium" name="stream" disabled>
                <option value="">---Select Stream----</option>
				<?php
                $st=mysql_query("select * from stream");
                while($arr1=mysql_fetch_array($st))
                {
                $stream=$arr1['strm'];
               ?>
                         <option value="<?php echo $arr1['sno']; ?>"><?php echo $stream; ?></option>
                         <?php
                }
                ?>
    </select>
             </div>
                <br/>
              
            <label><input type="radio" name="r2" id="r2" value="3" onClick="bt();"/>Specified Students</label>
              
            <div id="btt">
               <button class="btn btn-info" name="Search Student" data-target="#wide" data-toggle="modal" type="button" disabled><i class="fa fa-search"></i> Search Student</button>
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
<!-- END CONTAINER -->
    <div style="display: none;" class="modal fade" id="wide" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Search Student</h4>
                    <table class="table table-bordered table hover" align="center" border="1%" width="70%" >
                    <thead>
                    <tr>
                    <th><strong>Scholar No.</strong></th>
                    <th><strong>Class</strong></th>
                    <th><strong>First Name</strong></th>
                    <th><strong>Sur Name</strong></th>
                    </tr>
                    </thead>
                    <tr>
                    <td><input class="form-control timer" type="text" name="t1" id="t1" page_name="swp_view" open_page="hstl_fetchtodb"/></td>
                    <td><input class="form-control timer" type="text" name="t2" id="t2" page_name="swp_view" open_page="hstl_fetchtodb"/></td>
                    <td><input class="form-control timer" type="text" name="t3" id="t3" page_name="swp_view" open_page="hstl_fetchtodb"/></td>
                    <td><input class="form-control timer" type="text" name="t4" id="t4" page_name="swp_view" open_page="hstl_fetchtodb"/></td>
                    </tr>
                    </table>
                    <table class="table table-bordered table hover" id="txtHint" align="center" border="1px" width="100%">
                   
                    </table>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                <div class="modal-body">
                </div>
            </div>
         </div>
     </div>
<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>