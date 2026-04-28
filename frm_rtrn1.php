<?php
require_once("menu.php");
require_once("conn.php");
?>

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Registration Form Return</title>   
<style type="text/css">
 body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #fff;
      }
.form-signin {
        max-width: 650px;
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
</head>  
<body>  
<div class="container">
 <button class="btn btn-info" style="float:left;" name="btn" type="submit" onclick="window.location.href='srch1.php'" >Search</button>
<form class="form-signin" method="POST" action="frm_rtrn_cnn.php"> 
<h3 style="text-align:center;"> Registration Form Return </h3>
<table align="center">
<tr>
<td> Form No. </td>
<td> <input type="text" /> </td>
<td></td><td></td>
<td> Issue Date </td>
<td> <input type="text" /> </td> 
</tr>
<tr>
<td> Issued for Class  </td>
<td>
<input type="text" /> </td>   
</td>
<td></td><td></td>
<td>
Fees </td>
<td>
<input type="text" />
</td>
</tr>
<tr>
<td> Issued To </td>
<td> <input type="text" /> </td>
<td></td><td></td>
<td> Sex </td>
<td> <input type="text" /> </td>
</td>
</tr>
<tr>
<td> Father's Name </td>
<td> <input type="text" /> </td>
<td></td><td></td>
<td> Phone No. </td>
<td> <input type="text" /> </td>
</tr>
</table>

 </br> </br> </br>
 <h4> Additional Information </h4>
 <?php
		$s=mysql_query("select * from `frm_rtrn`");
		$r=mysql_num_rows($s);
		$r=($r+1);
		 ?>
<table align="center">
<tr>
<td> Receipt No. </td>
<td> <input type="text"  value="<?php echo $r;?>"/> </td>
<td></td><td></td>
<td> Receipt Date </td>
<td> <input type="text"/> </td> 
</tr>
<tr>
<td> Date of Entrance Test  </td>
<td>
<input type="text"/>
</td>
<td></td><td></td>
<td>
Time of Entrance Test </td>
<td>
<input type="text"/>
</td>
</tr>
<tr>
<td> Date of Interview </td>
<td> <input type="text"/> </td>
<td></td><td></td>
<td> Test Fee </td>
<td> <input type="text"/> </td>
</tr>
</table></br>
<button class="btn btn-info" name="btn" type="submit">Save</button>
</form>
<table align="center">
<tr>
<td> <button class="btn btn-info"  align="center" name="btn" type="submit" onClick="window.print()" >Print</button>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><button class="btn btn-info"  name="btn" type="submit" onclick="window.location.href='index.php'" >Cancel</button></td>
</tr> </table>
</br>
</div>
</body>  
 </html>  
            
