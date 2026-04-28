<?php
require_once("functions.php");
require_once("conn.php");
?>

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Form Issue | <?php title();?></title>   
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
        
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
     
	  </style>
	   
<?php
css(); js(); datepicker();
?>		 
</head> 

 
<body>  


<div class="container">
<?php
header_image();
menu();?>
<form class="form-signin" method="POST" action="frm_iss_cnn.php"> 
<?php
		$s=mysql_query("select no from `form_no` where id='1'");
		$rr=mysql_fetch_array($s);
		$r=$rr['no'];
		$no=$r+1;
		 ?>

</br>
<table align="center">
<tr>
<td> Form No. </td>
<td> <input type="text" name="form_no" value="<?php echo $no;?>"/></td>

<td>  &nbsp;&nbsp;Issue Date  </td>
<td> <input type="text" id="dp1" name="i_date"/>  </td> 
</tr>
<tr>
<td>
Class </td>
<td>  <select name="class">
<?php $sql_="select * from class";
			$sql=mysql_query($sql_);
			while($t=mysql_fetch_array($sql))
			{ 
			  echo "<option =\"".$t['cls']."\">".$t['cls']."</option>";
			}
?>
</select>
</td>
<td> &nbsp;&nbsp;&nbsp;Stream </td>
<td> <select name="strm">
<?php $sql_="select * from stream";
			$sql=mysql_query($sql_);
			while($t=mysql_fetch_array($sql))
			{ 
			  echo "<option =\"".$t['strm']."\">".$t['strm']."</option>";
			}
		
?>
</select>
</td>
</tr>
<tr> <td>
Medium </td>
<td> <select name="medium">
<?php $sql_="select * from medium";
			$sql=mysql_query($sql_);
			while($t=mysql_fetch_array($sql))
			{ 
			  echo "<option =\"".$t['medium']."\">".$t['medium']."</option>";
			}
			
?>
</select>
</td>
<td> &nbsp;&nbsp;&nbsp;Fees </td>
<td> <input type="text" value="50" readonly/> </td>
</tr>
<tr>
<td> Issued To </td>
<td> <input type="text" name="name"/> </td>
<td>  &nbsp;&nbsp;&nbsp; Sex </td>
<td> <select name="gndr">
<?php $sql_="select * from gender";
			$sql=mysql_query($sql_);
			while($t=mysql_fetch_array($sql))
			{ 
			  echo "<option =\"".$t['gndr']."\">".$t['gndr']."</option>";
			}
		
?>
</select>
</td> </tr>
<tr> <td> 
Father Name </td>
<td> <input type="text" name="fname"/>  </td>
<td>  &nbsp;&nbsp;&nbsp; Phone No. </td>
 <td> <input type="text" name="phno"/></td>
 </tr> </table>  </br>
<button class="btn btn-info"  name="b1" type="submit">Save</button> &nbsp;&nbsp;&nbsp;&nbsp;
<button class="btn btn-info"  name="cncle" type="submit">Cancle</button> &nbsp;&nbsp;&nbsp;&nbsp;
</form> 


</br>
<?php
footer();?>
</div>
</body>  
 </html>  
            
