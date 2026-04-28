<?php
require_once("conn.php");
require_once("functions.php");
extract($_POST);

if((!empty($schlr_no)) AND (empty($fname)) AND (empty($mname)) AND (empty($lname)) AND (empty($cls)))
{
	$sql_="select * from stdnt_reg where schlr_no='$schlr_no'";
			$sql=mysql_query($sql_);
			$t=mysql_fetch_array($sql);
}
else if((!empty($schlr_no)) AND (!empty($fname))AND (!empty($mname))AND (!empty($fname)) AND (!empty($cls)))
		{
			$sql_="select * from stdnt_reg where schlr_no='$schlr_no' AND fname='$fname' AND mname='$mname' AND lname='$lname' AND cls='$cls'";
			$sql=mysql_query($sql_);
			$t=mysql_fetch_array($sql);
			

		}
else if((empty($form_no)) AND (!empty($fname))AND (!empty($mname))AND (!empty($lname)) AND (!empty($cls)))
{ 
    $sql_="select * from stdnt_reg where fname LIKE '%$fname%' AND mname LIKE '%$mname%' AND lname LIKE '%$lname%' AND cls LIKE '%$cls%'";
	$sql=mysql_query($sql_); 
	$t=mysql_fetch_array($sql);
}

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
menu();
?>

<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
<form class="form-signin" method="POST" action="update.php"> 

<h3 style="text-align:center;"> Student Registration </h3>
<h5 style="color:green;">
<?php
 
if($t['adm'] == 'on') 
{
    echo "<b>"."Admitted To Next Session"."</b>";
}
else
{
    echo "Not Admitted to next Session.";
}    
 
?></style></h5>
</br>
<table align="center">
<tr>
<td> Scholar No. </td>
<td> <input type="text" name="schlr_no" value="<?php echo $t['schlr_no'];?>"/> </td>

<?php $q=date("d-m-Y",strtotime($t['rg_dt'])); ?>

<td> &nbsp; &nbsp; &nbsp;  Registration Date </td>
<td> <input type="text" name="rg_dt" value="<?php echo $q;?>"/> </td> 
</tr>
<tr>
<td> Bus Facility </td>
<td> <select name="bs_fc">
    <option> <?php echo $t['bs_fc'];?></option>
	 <?php $ll="select * from bs_fclty";
			$aa=mysql_query($ll);
			while($nn=mysql_fetch_array($aa))
			{ 
			  echo "<option =\"".$nn['status']."\">".$nn['status']."</option>";
			}
			echo "</select>" ;
?>
      </td>

<td> &nbsp; &nbsp; &nbsp; Hosteller </td>
<td> 
   <select name="hstl">
    <option><?php echo $t['hstl'];?></option>
    <?php $ll="select * from hostel_fc";
			$aa=mysql_query($ll);
			while($nn=mysql_fetch_array($aa))
			{ 
			  echo "<option =\"".$nn['status']."\">".$nn['status']."</option>";
			}
			echo "</select>" ;
?>
     </td>
</tr>
<td> Roll No. </td>
<td> <input type="text"  name="rno" value="<?php echo $t['rno'];?>"/> </td>

<?php $udt=date("d-m-Y",strtotime($t['dob'])); ?>

<td> &nbsp; &nbsp; &nbsp;  Date Of Birth </td>
<td> <input type="text" name="dob" id="datepicker" value="<?php echo $udt;?>"/> </td>
</tr>
<tr>
<td> First Name </td>
<td> <input type="text" name="fname" value="<?php echo $t['fname'];?>"/> </td>

<td> &nbsp; &nbsp; &nbsp;Father's Name </td>
<td> <input type="text" name="f_name" value="<?php echo $t['f_name'];?>"/> </td>
</tr>
<tr>
<td> Middle Name </td>
<td> <input type="text" name="mname" value="<?php echo $t['mname'];?>"/> </td>

<td> &nbsp; &nbsp; &nbsp;Mother's Name </td>
<td> <input type="text" name="m_name"value="<?php echo $t['m_name'];?>"/> </td>
</tr>
<tr>
<td> Last Name </td>
<td> <input type="text" name="lname" value="<?php echo $t['lname'];?>"/> </td>
<td> &nbsp; &nbsp; &nbsp;  Sex </td>
<td> <input type="text" name="gndr" value="<?php echo $t['gndr'];?>"/>
     </td>
</tr>
<tr>
<td> Current Address </td>
<td> <input type="text" name="cadd" value="<?php echo $t['cadd'];?>"/>
</td> 
<td> &nbsp; &nbsp;Permanent Address </td>
<td> <input type="text" name="padd" value="<?php echo $t['padd'];?>"/>
 </td> 
</tr>
<tr> 
<td>City </td>
<td> <select  name="c1" >
<option><?php echo $t['c1'];?></option>
    <?php $ll="select * from city";
			$aa=mysql_query($ll);
			while($nn=mysql_fetch_array($aa))
			{ 
			  echo "<option =\"".$nn['city']."\">".$nn['city']."</option>";
			}
			echo "</select>" ;
?>
</td>

<td>&nbsp; &nbsp; &nbsp;City </td>
<td> <select name="c2" >
<option> <?php echo $t['c2'];?></option>
<?php $ll="select * from city";
			$aa=mysql_query($ll);
			while($nn=mysql_fetch_array($aa))
			{ 
			  echo "<option =\"".$nn['city']."\">".$nn['city']."</option>";
			}
			echo "</select>" ;
?>
    
</td>
</tr>
<tr> <td> Pincode </td>
<td> <input type="text" name="p1" value="<?php echo $t['p1'];?>"/> </td>
<td> &nbsp; &nbsp; &nbsp;Pincode </td>
<td> <input type="text" name="p2" value="<?php echo $t['p2'];?>"/> </td>
</tr>
<tr> <td> Phone No. </td>
<td> <input type="text" name="phno" value="<?php echo $t['phno'];?>"/> </td>
<td> &nbsp; &nbsp; &nbsp;Mobile No. </td>
<td> <input type="text" name="mno" value="<?php echo $t['mno'];?>"/> </td>
</tr>
<tr> <td> Category </td>
<td> <select name="ctg">
      <option><?php echo $t['ctg'];?></option> 
     <?php $ll="select * from category";
			$aa=mysql_query($ll);
			while($nn=mysql_fetch_array($aa))
			{ 
			  echo "<option =\"".$nn['ctg']."\">".$nn['ctg']."</option>";
			}
			echo "</select>" ;
?>
  </td>
	</tr>
</table>
<hr> </hr>
<h4> Current Class </h4>
<table align="center">
<tr>
<td> Class </td>
<td> 
   <select name="cls">
      <option><?php echo $t['cls'];?> </option>
      <?php $ll="select * from class";
			$aa=mysql_query($ll);
			while($nn=mysql_fetch_array($aa))
			{ 
			  echo "<option =\"".$nn['cls']."\">".$nn['cls']."</option>";
			}
			echo "</select>" ;
?>

      </td>

<td> &nbsp; &nbsp; &nbsp;  Medium </td>       
<td> <select name="md" >
     <option><?php echo $t['md'];?></option>
     <?php $ll="select * from medium";
			$aa=mysql_query($ll);
			while($nn=mysql_fetch_array($aa))
			{ 
			  echo "<option =\"".$nn['medium']."\">".$nn['medium']."</option>";
			}
			echo "</select>" ;
?>
      </td>
</tr>
<tr>
<td> Stream </td>
<td> <select name="strm">
     <option><?php echo $t['strm'];?></option>
	 <?php $ll="select * from stream";
			$aa=mysql_query($ll);
			while($nn=mysql_fetch_array($aa))
			{ 
			  echo "<option =\"".$nn['stream']."\">".$nn['stream']."</option>";
			}
			echo "</select>" ;
?>
     </td>
	 
<td> &nbsp; &nbsp; &nbsp;  Section </td>
<td> <select name="sec">
    <option> <?php echo $t['sec'];?></option>
	<?php $ll="select * from section";
			$aa=mysql_query($ll);
			while($nn=mysql_fetch_array($aa))
			{ 
			  echo "<option =\"".$nn['section']."\">".$nn['section']."</option>";
			}
			echo "</select>" ;
?>
     </td>
</tr>
</table>
<hr> </hr>
<h4> Additional Information </h4>
<h5> Information Regarding Previous Schoool </h5>
<table align="center">
<tr> <td> Name </td>
<td> <input type="text" name="ps_name" value="<?php echo $t['ps_name'];?>"/> </td>
<td> &nbsp; &nbsp; &nbsp; City </td>
<td> <input type="text" name="ps_city" value="<?php echo $t['ps_city'];?>"/> 
     
	 </td>
</tr>
<tr> <td> Last Class Attended</td>
<td> <input type="text" name="l_cls" value="<?php echo $t['l_cls'];?>"/> </td>
<td> &nbsp; &nbsp; &nbsp;Medium </td>
<td> <select name="l_md" value="<?php echo $t['l_md'];?>"/> 
     </td>
</tr>
</table>
<h5> Information Regarding Brother/Sister Already Studying in this school (Only Scholar No.) </h5>
</br><table align="center">
<tr> 
<td> Scholar No. 1 &nbsp; &nbsp; &nbsp;</td>
<td> <input type="text" name="s1" value="<?php echo $t['s1'];?>"/> </td>
<td> &nbsp; &nbsp; &nbsp;Scholar No. 2</td>
<td> <input type="text" name="s2" value="<?php echo $t['s2'];?>"/> </td>
</tr>
<tr> <td> Scholar No. 3</td>
<td> <input type="text" name="s3" value="<?php echo $t['s3'];?>"/> </td>
</tr>
</table>
</br>
<button class="btn btn-info" name="btn" type="submit">Update</button> 
</br>
</form> 
<?php
footer();?>
</div>
</body>  
</html>  
            
