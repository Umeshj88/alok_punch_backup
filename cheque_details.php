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
 <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>

</head>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
<?php
nevibar_menu();
?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
<div class="page-content-wrapper white-color-display">
	<div class="page-content">
		<div class="row">
            <form name="frm" method="post" class="displaynone">
            <div style="padding-left:40%; float:left; width:100%;">
            <div class="input-group input-large date-picker input-daterange">
            <input class="form-control" type="text" name="from" id="from" value="<?php echo $from; ?>"></input>
            <span class="input-group-addon">To</span>
            <input class="form-control" type="text" name="to" id="to" value="<?php echo $to; ?>"></input>
            </div>
            <div style="padding-left:10%; padding-top:2%; float:left; width:100%;">
            <button class="btn btn-info" name="view" type="button" onClick="cheque_details_view()">View</button>
            <button class="btn btn-success" name="prnt" type="button"  onClick="pop_print()"><i class="fa fa-print"></i>Print</button> 
           </div>
            </div>
            </form>
            <div style="float:left; width:100%;" id="view">
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
	w.document.write(jQuery('#view').html());
	w.document.close();
	w.print();
} 
</script>
</body>
<!-- END BODY -->

</html>