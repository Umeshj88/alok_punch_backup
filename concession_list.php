<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['view']))
{
	extract($_POST);
	@$r2=$_POST['r2'];
	@$fee_type=$_POST['fee_type'];
	if($r2==1)
	{
		echo "<script>
		window.open('concession_list_view.php?fee_type=$fee_type&r2=$r2&from=$from&to=$to','_blank');
		</script>";
	//	exit;
	}
	else if($r2==2)
	{
		@$class=$_POST['class'];
		
		echo "<script>
		window.open('concession_list_view.php?fee_type=$fee_type&class=$class&r2=$r2&from=$from&to=$to','_blank');
		</script>";
		//exit;
	}
	echo "<meta http-equiv='Refresh' content='0 ;URL=concession_list.php'>";
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
<!--///////////////////////       show()        //////////////////////////-->

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
<!--///////////////////////       hide()        //////////////////////////-->


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
             <form name="sl" method="post" class="form">
             <input type="hidden" value="<?php echo @$schlr_no; ?>" id="schlr_no" name="schlr_no">
             <div style="padding-left:30%; float:left; width:100%;">
           <select  class="form-control input-medium" name="fee_type">
              <option value="">--- Select Fee ---</option>
            <option value="1">General Fees</option>
            <option value="2">Monthly Fees</option>
            <option value="3">Hostal Fees</option>
            </select>
            <br/>
            <label>Display Payment Details</label><br/>
          
            <label><input type="radio" name="r2" value="1" onClick="hide();"/>All Students</label>
            <label><input type="radio" name="r2" value="2" onClick="show();"/>All Students Of Class</label>
            <div id="content">
            <select class="form-control input-medium" name="class" disabled>
            <option value="0">---Select Class----</option>
            <?php $sel=mysql_query("select * from class");
            while($arr=mysql_fetch_array($sel))
            {
            	$cls=$arr['cls'];
				$sno=$arr['sno'];
                echo '<option value="'.$sno.'">'.$cls.'</option>';
            }
            ?>    </select>
            <br/>
            </div>
            <div class="form-group">
										
									
											<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="dd-mm-yyyy">
												<input class="form-control" name="from" type="text">
												<span class="input-group-addon">
													 to
												</span>
												<input class="form-control" name="to" type="text">
											</div>
											<!-- /input-group -->
											<span class="help-block">
												 Select date range
											</span>
										</div>
								
                                    
             <button class="btn btn-success" name="view"  type="submit"><i class="fa fa-book"></i> View</button>
            
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