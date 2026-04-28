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
<input type="radio" name="r1"/>All Classes<br/>
<input type="radio" name="r1"/>Class
<select name="cls">
<?php $sel=mysql_query("select cls from class");
while($arr=mysql_fetch_array($sel))
{
$cls=$arr['cls'];
	echo '<option>'.$cls.'</option>';
}
?>    </select>
<br/>
Catagory<select name="cat">
	<option>All</option>
    <?php $sel=mysql_query("select type from fee_type");
while($arr=mysql_fetch_array($sel))
{
$type=$arr['type'];
	echo '<option>'.$type.'</option>';
}
?>
    </select>
    <br/>
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
            
