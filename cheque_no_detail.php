<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");

?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php logo(); css(); ajax(); ?>
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
            <form name="frm" method="post">
            <div style="float:left; width:100%; text-align:center">
           <table width="40%" align="center">
           <tr>
            <td><label>Cheque No.</label></td><td><input class="form-control input-medium" type="text" name="chq_no" id="chq_no"></td>
            </tr>
            <tr>
            <td><label>Receipt No.</label></td><td><input class="form-control input-medium" type="text" name="receipt_no" id="receipt_no"></td>
           </tr>
           	<tr> 
            <td colspan="2">
            <button class="btn btn-info" name="view" type="button" onClick="chq_num();">View</button>
            <button type="button" class="btn btn-success" name="print"  onClick="pop_print()"><i class="fa fa-print"></i> Print</button>
            </td>
            </tr>
            </table>
            </div>
          </form>
          <div id="view">
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