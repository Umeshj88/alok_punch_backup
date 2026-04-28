<?php
require_once("conn.php");

extract($_POST);

if((!empty($form_no)) AND (empty($name)) AND (empty($class)))
{
	$sql_="select * from form_issue where form_no='$form_no'";
			$sql=mysql_query($sql_);
			$t=mysql_fetch_array($sql);
}
else if((!empty($form_no)) AND (!empty($name)) AND (!empty($class)))
		{
			$sql_="select * from form_issue where form_no='$form_no' AND name='$name' AND class='$class'";
			$sql=mysql_query($sql_);
			$t=mysql_fetch_array($sql);
			

		}
else if((empty($form_no)) AND (!empty($name)) AND (!empty($class)))
{ 
    $sql_="select * from form_issue where name LIKE '%$name%' AND class LIKE '%$class%'";
	$sql=mysql_query($sql_); 
	$t=mysql_fetch_array($sql);
}

?>



<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title></title>   
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
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
<div class="container">
<?php require_once("menu.php"); ?>
<form class="form-signin" method="POST" action="frm_iss_cnn.php"> 

<?php $udt=date("d-m-Y",strtotime($t['i_date'])); ?>

<h3 style="text-align:center;"> Form Issue </h3>
<table width="600px" height="50px" align="center">
<tr>
<td> Form No. </td>
<td> <input type="text" value="<?php echo $t['form_no'];?>"/></td>
<td> </td><td> </td>
<td> Issue Date </td>
<td> <input type="text" id="datepicker" name="i_date"value="<?php echo $udt ;?>"/> </td>
</tr>
<tr>
<td> Class  </td>
<td> <input type="text" name="class" value="<?php echo $t['class'];?>"/> </td>
<td> </td><td> </td>
<td> Stream </td>
<td> <input type="text" name="strm"value="<?php echo $t['strm'];?>"/> </td>
</tr>
<td> Medium </td>
<td> <input type="text"  name="medium" value="<?php echo $t['medium'];?>"/></td>
<td> </td><td> </td>
<td> Fees </td>
<td><input type="text" value="50"/> </td>
</tr>
<tr>
<td>Issued To </td>
<td> <input type="text" name="name" value="<?php echo $t['name'];?>"/></td>
<td> </td><td> </td>
<td> Sex </td>
<td><input type="text" name="gndr" value="<?php echo $t['gndr'];?>"/> </td>
</tr>
<tr>
<td>Father Name </td>
<td> <input type="text" name="fname" value="<?php echo $t['fname'];?>" /></td>
<td> </td><td> </td>
<td> Phone No. </td>
<td> <input type="text" name="phno" value="<?php echo $t['phno'];?>"/> </td>
</tr>
</table></br>
<button class="btn btn-info"  name="b1" type="submit">Save</button> &nbsp;&nbsp;&nbsp;&nbsp;
</form> 
<table align="center">
<tr>
<td> <button class="btn btn-info"  align="center" name="btn" type="submit" onclick="window.location.href='srch.php'" >Search</button>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><button class="btn btn-info"  name="btn" type="submit" onclick="window.location.href='index.php'" >Cancel</button></td>
</tr> </table>
</br>

</div>
</body>  
 </html>  
            