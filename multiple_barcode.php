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
	$_SESSION['cls']=$_POST['text'];
	echo "<script>
		location='multiple_barcode.php';
		window.open(' barcode/barcode/barcodes.php','_newtab');
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
	  <?php
css(); js();
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
  <select name="text">
    <option value=0>-Select-</option>
<?php
$sel=mysql_query("select * from class");
while($arr=mysql_fetch_array($sel))
{
	echo '<option value="'.$arr['cls'].'">'.$arr['cls'].'</option>';
}
?>
    </select></td></tr>
    <tr><td>
    <input type="submit" class="btn btn-info" value="Generate" name="submit" /></td></tr></table>
    </form> 
<?php
footer();?>
</div>
</body>  
 </html>