<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
$db=$_GET['db'];
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
css();
?>
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
					
				<form class="form-signin" name="frm2" method="POST" action="non_scholar_register_view.php">			
				<div class="form-group">
                    <label class="control-label col-md-4"></label>
                    <div class="col-md-4">
                        <div class="input-group input-large date-picker input-daterange" >
                            <input required placeholder="Date From" type="text" class="form-control" name="from" >
                            <span class="input-group-addon">
                                 to
                            </span>
                            <input required placeholder="Date " type="text"  class="form-control" name="to">
                        </div>
                        <br/>
                         <table  align="center">
 						<tr>
                        <td align="center">
                          <button type="submit" name="view" class="btn btn-primary" value="Submit">View</button>
                        </td>
                        </tr>
                        </table>
                        <!-- /input-group -->
                        
                    </div>
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