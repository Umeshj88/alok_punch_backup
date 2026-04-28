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
<div class="page-content-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
	<form method="post">
    <center>
    <table border="1">
    	<tr>
        	<div class="input-group input-large date-picker input-daterange">
            <input class="form-control" type="text" name="from" id="from">
            <span class="input-group-addon">To</span>
            <input class="form-control" type="text" name="to" id="to">
            </div>
    </tr>
    </table>
    <button class="btn btn-info" style="margin-top:2%" name="view"  type="button" onClick="getrecdetail()" ><i class="fa fa-book"></i> View</button> 
</center>
    
</form>
<div id="txt" style="float:left; width:100%;">
            </div>
			
			
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
</div>
<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>