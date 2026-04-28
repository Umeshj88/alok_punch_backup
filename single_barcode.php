<?php
session_start();
require_once("conn.php");
require_once("functions.php");
if(isset($_POST['submit']))
{
	if(empty($_POST['text']))
{
	echo"<script language='javascript'>alert('Please Select Class.')</script>";
}
else
{
	$_SESSION['cl']=$_POST['text'];
	$_SESSION['name']=$_POST['name'];
	echo "<script>
		location='single_barcode.php';
		window.open('barcode/barcode/barcodes1.php','_newtab');
		</script>";	
}
}
?>
<!DOCTYPE html>   
<html lang="en">   
<head>   
<?php  logo(); ?>
<meta charset="utf-8">   
<title>Barcode | <?php title();?></title>   
<style type="text/css">
 body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #fff;
      }
.form-signin {
        max-width: 700px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
     
	  </style>
      
    <script src="barcode/assets/js/bootstrap-transition.js"></script>
    <script src="barcode/assets/js/bootstrap-alert.js"></script>
    <script src="barcode/assets/js/bootstrap-modal.js"></script>
    <script src="barcode/assets/js/bootstrap-dropdown.js"></script>
    <script src="barcode/assets/js/bootstrap-scrollspy.js"></script>
    <script src="barcode/assets/js/bootstrap-tab.js"></script>
    <script src="barcode/assets/js/bootstrap-tooltip.js"></script>
    <script src="barcode/assets/js/bootstrap-popover.js"></script>
    <script src="barcode/assets/js/bootstrap-button.js"></script>
    <script src="barcode/assets/js/bootstrap-collapse.js"></script>
    <script src="barcode/assets/js/bootstrap-carousel.js"></script>
    <script src="barcode/assets/js/bootstrap-typeahead.js"></script>
	  <?php
css(); js();  kendo(); ajax();
?>
</head>  
<body>  
<div class="container">
<?php
header_image();
menu();
?>

<form class="form-signin" method="POST"> 
<table style="margin-left:220px">
<tr><td>
  <select name="text" id="text1" onChange="clas()">
    <option value=0>-Select-</option>
<?php
$sel=mysql_query("select * from class");
while($arr=mysql_fetch_array($sel))
{
	echo '<option value="'.$arr['cls'].'">'.$arr['cls'].'</option>';
}
?>
    </select></td><td><input type="text" name="name" id="autocomplete_name" style="height:25px; margin-top:-8px;" required/></td> <td id="txt"></td></tr>
  <?php  $_SESSION['class']=@$_POST['name']; ?>
    <tr><td>
    <input type="submit" class="btn btn-info" value="Generate" name="submit"  /></td></tr></table>
    </form> 
<?php
footer(); autocomplete(); ?>
 
</div>
</body>  
 </html>