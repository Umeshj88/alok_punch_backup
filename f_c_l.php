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
<script>
function show()
{
	document.getElementById('content').disabled=false;
}
function hide()
{
	document.getElementById('content').disabled=true;
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
            <form name="fcl" method="post">
            <div style="padding-left:30%; float:left; width:100%;">
             <label>
            <input type="radio" name="r1" id='allclass'  value="All Classes" onclick="hide()"/>All Classes</label>
            <label><input type="radio" name="r1" id="class" value="Class"  onclick="show()"/>Class</label>
            
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
            <div class="input-group input-large date-picker input-daterange">
            <input class="form-control" type="text" name="from" id="form" value="<?php echo $from; ?>"></input>
            <span class="input-group-addon">To</span>
            <input class="form-control" type="text" name="to" id="to" value="<?php echo $to; ?>"></input>
            </div>
            <label><input type="checkbox" name="summ" id="summ" value="summary" checked onClick="summary()" style="opacity:0.5;"/>Summary</label>
           <label><input type="checkbox" name="det" id="det" value="detail" checked onClick="detail()" style="opacity:0.5;"/>Details</label>
              <select  class="form-control input-medium" id="s_fee" name="s_fee">
              <option value="">--- Select Fee ---</option>
            <option value="General Fees" selected>General Fees</option>
            <option value="Monthly Fees">Monthly Fees</option>
            <option value="Hostel Fees">Hostel Fees</option>
            </select>
            <div style="padding-left:10%; padding-top:2%; float:left; width:100%;">
            <button class="btn btn-info" name="sub" type="button" onClick="getcwc()">View</button>
            <button class="btn btn-success" name="prnt" type="button"  onClick="pop_print()"><i class="fa fa-print"></i>Print</button> 
           
           </div>
            </div>
         </form>
            <div id="txt" style="float:left; width:100%;">
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
	w.document.write(jQuery('#txt').html());
	w.document.close();
	w.print();
} 
</script>
</body>
<!-- END BODY -->

</html>