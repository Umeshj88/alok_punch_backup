<?php
require_once("functions.php");
require_once("conn.php");
@$d=$_GET['d'];
@$d1=$_GET['d1'];
@$r1=$_GET['r1'];
@$c1=$_GET['c1'];
?>

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Student Registration | <?php title();?></title>   
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
<body>
<div class="container">

<?php
header_image();
menu();?>
<b>Hostel Ledger</b><br/>
<b>Date </b><?php echo $d1; ?>&nbsp;&nbsp;&nbsp;
<b>Session : </b>2008 - 2009<br/>
<b>Total Amount : </b><?php  ?><br/>
<b>School Name : </b><?php echo $r1;?><br/>
<b>Class : </b><?php echo $c1;?><br/>
<table width="90%">
<tr><b>
<td>SNo.</td><td>Name</td><td>Total</td><b>
</tr>
<?php 

?>
</table>
</div>
</body>
</html>