<?php
require_once("functions.php");
require_once("conn.php");
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
	  <script src="datepicker/js/bootstrap-datepicker.js"></script>
      
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
	  <?php
css(); js();
?>
	  
</head>  
<body>  
<div class="container">

<?php
header_image();
menu();?>
<form name="sl" method="post">
<input type="radio" name="r2"/>Fee<br/>
<input type="radio" name="r2"/>Hostel
<br/><br/>
From <input type="date" name="d" id="datepicker"/>
To <input type="date" name="d1" id="datepicker1"/>
<br/><br/>
<button class="btn btn-info" name="view"  type="submit">View</button> 
<button class="btn btn-info" name="close"  type="submit">Close</button> 
<button class="btn btn-info" name="print"  type="submit">Print</button> 
</form>
</br>
<?php
footer();?>
</div>
</body>  
 </html>  
            
