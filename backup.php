<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
$db=$_GET['db'];
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>Backup Database | <?php title();?></title>
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
	
				
{
	?>
<div id="txt1"></div>


<a class="btn btn-success" id="filename" ><i class="icon-download"></i> Generate database</a>
<br/><br/>
<div id="txt"></div>
<?php
}
?>

<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() 
{
	var typingTimer;                //timer identifier
var doneTypingInterval = 2000;  //time in ms, 5 second for example
	$('#filename').click(function()
	{
		$("#txt").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('backup_db.php');
	});
	$('#downloadfile').live('click',function(e)
	{
		 clearTimeout(typingTimer);
		 typingTimer = setTimeout(function(){
		   var file_name=$("#downloadfile").attr("href");
			 query="?file_name="+file_name;
		   $('#txt1').load('unlink_backup_file.php'+query);
		   }, doneTypingInterval);
	   
	});

});



</script>				
			
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