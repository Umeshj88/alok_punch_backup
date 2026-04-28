0<?php
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
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
	<form method="POST" action="hstl_reg.php">
 <div style="width:80%; margin-left:5%">
     <table width="80%">
         <tr> 
                <td width="20%"><label>New Registration</label></td>
                <td width="30%"><input class="form-control" type="text" name="schlr_no" placeholder="Enter Scholar No."/></td>
                <td><button type="submit" class="btn btn-info" name="btn">Search</button></td>
        </tr>
        </br>
        </br>
        <tr>
                <td  width="20%"><label>Already Registered??</label></td>
                <td  width="30%"><input class="form-control" type="text" name="s_no" placeholder="Enter Scholar No."/></td>
                <td><button type="submit" name="btnn" class="btn btn-info">Search</button></td>
                
        </tr>
    </table>
 </div>

</form>
			
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

</body>
<!-- END BODY -->

</html>