<?php
require_once("function.php");
//require_once("conn.php");
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
        <?php
		
		if($db=="db")
		{
		?>
		<div class="note note-success">
            <h4> Database Export Successfully.</h4>
            <p>
                
            </p>
		</div>
		 <?php
		}
		?>					
							
			
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