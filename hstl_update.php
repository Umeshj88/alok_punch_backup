<?php
require_once("conn.php");
require_once("function.php");
extract($_POST);

   $sql_="select * from hstl_reg where schlr_no='$s_no'";
			$sql=mysql_query($sql_);
			$t=mysql_fetch_array($sql);

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
        max-width: 700px;
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


<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
<?php
css(); menu();
?>
<form class="form-signin" method="POST" action="hstl_updte_cnn.php"> 

<h3 style="text-align:center;"> Hosteller Management </h3>
</br>
<div style="width:96%">
<table align="center" width="100%">
<tr>
<td><label> Registration No.</label></td>
<td> <input class="form-control input medium" type="text" name="rg_no" value="<?php echo $t['rg_no'];?>"/> </td>
<?php $udt = date("Y-m-d");
$d = date("d/m/Y", strtotime($udt)); ?>
<td><label style="margin-left:%">Registration Date</label> </td>
<td> <input class="form-control form-control-inline input-medium date-picker" type="text" name="rg_dt" value="<?php echo $t['rg_dt'] ?>"/> </td> 
</tr>
<tr>
<td><label>Scholar No.</label></td>
<td> <input class="form-control input medium" type="text" name="schlr_no" value="<?php echo $t['schlr_no'];?>" /> </td>
<td><label style="margin-left:15%">Category</label></td>
<td> <input class="form-control input medium" type="text" name="ctg" value="<?php echo $t['ctg']; ?>">
       </td>
</tr>

<tr>
<td><label>Name</label> </td>
<td> <input class="form-control input medium" type="text" name="name" value="<?php echo $t['name'];?>"/> </td>

<td><label style="margin-left:15%">Father's Name</label> </td>
<td> <input class="form-control input medium" type="text" name="f_name" value="<?php echo $t['f_name']?>"/> </td>
</tr>
<tr>
<td><label>Class</label></td>
<td> <input class="form-control input medium" type="text" name="cls" value="<?php echo $t['cls']?>"/>
      </td>
<td><label style="margin-left:15%">Mother's Name</label> </td>
<td> <input class="form-control input medium" type="text" name="m_name" value="<?php echo $t['m_name']?>"/> </td>
</tr>
<td><label>Sex</label> </td>
<td> <input class="form-control input medium" type="text" name="gndr" value="<?php echo $t['gndr']?>">
     </td>
<td><label style="margin-left:15%">Room No.</label> </td>
<td> <input class="form-control input medium" type="text" name="rm_no" value="<?php echo $t['rm_no']?>"/> </td>
</tr>
<tr>

<td><label>Permanent Address</label></td>
<td> <textarea class="form-control input medium" style="resize:none" name="padd" rows="5" cols="7">
<?php echo $t['padd']?>
</textarea> </td> 
 <td><label style="margin-left:15%">Pincode</label></td>
 <td> <input class="form-control input-medium" type="text" name="p1" value="<?php echo $t['p1']?>"/> </td>
 </tr>

<tr> <td><label>Phone No.</label></td>
<td> <input  class="form-control input-medium"  type="text" name="phno" value="<?php echo $t['phno']?>"/> </td>
<td><label style="margin-left:15%">Mobile No.</label> </td>
<td> <input  class="form-control input medium"  type="text" name="mno" value="<?php echo $t['mno']?>"/> </td>
</tr>
</table>
</br>
<button style="margin-left:40%" class="btn btn-info" name="btn" type="submit">Update</button> 
<button class="btn btn-success" style="width:13%" align="left" name="prnt" type="submit" onClick="window.print()" ><i class="fa fa-print">Print</i></button>
</br>
</form> 


</div>
</body>  
 </html>  
            
