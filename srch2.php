<?php
require_once("functions.php");
?>
<html>
<head>
<title>
Search | <?php title();?>
</title>
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

<form method="POST" action="stdnt_reg_srch.php">
<table align="center">
<tr>
<td>
First Name 
&nbsp; </td> <td>
<input type="text" name="fname" /> </td>
<td> Middle Name 
&nbsp; </td>
<td> <input type="text" name="mname" /> </td>
<td> Last Name 
&nbsp; </td>
<td> <input type="text" name="lname" /> </td>
</tr>
<tr> <td>
Scholar No.&nbsp;</td>
<td><input type="text" name="schlr_no" /> </td>
<td> Class 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td> <select name="cls">
<option></option>
<option>Pre-Nursery</option>
<option>Nursery</option>
<option>KG</option>
<option>Prep</option>
<option>First</option>
<option>Second</option>
<option>Third</option>
<option>Fourth</option>
<option>Fifth</option>
<option>Sixth</option>
<option>Seventh</option>
<option>Eight</option>
<option>Ninth</option>
<option>Tenth</option>
<option>Eleventh</option>
<option>Twelfth</option>
</select> 
</td></tr>
<tr> <td>
<button type="submit" class="btn btn-info">Search</button></td> </tr>
</table>
</form>
<?php
footer();?>
</div>
</body>
</html>