<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Form Fee Collection</title>      
<style type="text/css">
 body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #fff;
      }
.form-signin {
        max-width: 620px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
     
	  </style>
	 <script src="datepicker/js/bootstrap-datepicker.js"></script>
</head>  
<body>  
<div class="container">

<?php
require_once("menu.php");
?>

<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
<form class="form-signin"> 
<h3 style="text-align:center;"> Form Fee Collection </h3>
Date &nbsp;&nbsp; <input type="text" id="datepicker" name="dt"/>
</br></br>

<table border="1" align="center">
<tr>
<td border="0"><b> Fee Type </b></td>
<td><b> Form No.</b></td>
<td><b> To No</b> </td>
<td><b> Quantity</b> </td>
<td><b> Rate</b> </td>
<td><b> Amount</b> </td>
</tr>
<tr>
<td border="0"> <input type="checkbox"/>&nbsp;<b>Registration Fees</b></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td border="0"><input type="checkbox"/>&nbsp;<b>Form Fees(School)</b></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td border="0"><input type="checkbox"/>&nbsp;<b>Form Fees (Hostel)</b></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td border="0"><input type="checkbox"/>&nbsp;<b>Form Fees (Teacher)</b></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>

</br>
<button class="btn btn-info"  name="bttn_login" type="submit">Save</button>&nbsp;&nbsp;
<button class="btn btn-info"  name="bttn_login" type="submit">Cancel</button>
</br>
 </form> 
 </div>
</body>  
</html> 