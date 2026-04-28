<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
extract($_POST);

if((!empty($schlr_no)) AND (empty($s_no)))
{
	$sql_="select * from stdnt_reg where schlr_no='$schlr_no'";
			$sql=mysql_query($sql_);
			$t=mysql_fetch_array($sql);
			
	$s_="select * from hstl_reg where schlr_no='$schlr_no'";
			$s=mysql_query($s_);
			$tt=mysql_fetch_array($s);
						
}

else if((empty($schlr_no)) AND (!empty($s_no)))
{
	require_once("hstl_update.php");
	exit();
						
}


else if((empty($schlr_no)) AND (empty($s_no)))
{ 
    require_once("srch_hstl.php");
	echo "Please enter Scholar No.";
	exit();
}

?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>

<title>Home | <?php title();?></title>
<?php
logo();
css();
?>
 <script src="datepicker/js/bootstrap-datepicker.js"></script>
</head>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
<?php
nevibar_menu();
?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
<div class="page-content-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
	<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
<form class="form-signin" method="POST" action="hstl_reg_cnn.php"> 
<?php
		$s=mysql_query("select * from `hstl_reg`");
		$r=mysql_num_rows($s);
		$r=($r+1);
		
		 ?>


</br>
<div style="width:96%; margin-left:2%">
    <table width="100%" align="center">
        <tr>
            <td><label style="margin-left:10%"> Registration No.</label></td>
            <td> <input class="form-control input-medium" type="text" name="rg_no" value="<?php echo $r;?>"/> </td>
            
           		 <?php $udt = date("Y-m-d");
            	 $d = date("d-m-Y", strtotime($udt)); ?>
            <td> <label style="margin-left:10%"> Registration Date</label></td>
            <td> <input class="form-control form-control-inline input-medium date-picker" type="text" name="rg_dt" value="<?php echo $d ?>"/> </td> 
            
            <td><label style="margin-left:10%"> Scholar No.</label> </td>
            <td> <input class="form-control input-medium" type="text" name="schlr_no" value="<?php echo $t['schlr_no'];?>" /> </td>
        
        </tr>
       
       
        <tr>
           
            
            <td><label style="margin-left:10%"> Name</label> </td>
            <td> <input class="form-control input-medium" type="text" name="name" value="<?php echo $t['fname']; echo "&nbsp;"; echo $t['mname']; echo "&nbsp;" 				; echo$t['lname'];?>"/> </td>
    
            <td><label style="margin-left:10%">Father's Name</label> </td>
            <td> <input class="form-control input-medium" type="text" name="f_name" value="<?php echo $t['f_name']?>"/> </td>
   	 	 
            <td><label style="margin-left:10%">Mother's Name</label> </td>
   		    <td> <input class="form-control input-medium" type="text" name="m_name" value="<?php echo $t['m_name']?>"/> </td>
       </tr>
         
	 <tr>
           
            <td><label style="margin-left:10%">Category </label></td>
            <td> <input class="form-control input-medium" type="text" name="ctg" value="<?php echo $t['ctg']; ?>">
            </td>
            
             <td><label style="margin-left:10%"> Sex</label> </td>
   			 <td> <input class="form-control input-medium" type="text" name="gndr" value="<?php echo $t['gndr']?>">
             </td>
            
             <td><label style="margin-left:10%"> Class</label> </td>
   			 <td> <input class="form-control input-medium"  type="text" name="cls" value="<?php echo $t['cls']?>"/>
             </td>
    </tr>
    <tr>
       
              <td><label style="margin-left:10%">Room No.</label> </td>
              <td> <input class="form-control input-medium" type="text" name="rm_no" value="<?php echo $tt['rm_no']?>"/> </td>
               
              <td valign="top"><label style="margin-left:10%">Permanent Address</label> </td>
              <td> <textarea class="form-control input-medium" name="padd" rows="5" cols="7" style="resize:none;">
                    <?php echo $t['padd']?>
                    </textarea> </td> 
              <td><label style="margin-left:10%">Pincode </label></td>
              <td> <input class="form-control input-medium" type="text" name="p1" value="<?php echo $t['p2']?>"/> </td>
     </tr>
    
      <tr> 
                <td><label style="margin-left:10%"> Phone No.</label> </td>
                <td> <input class="form-control input-medium"  type="text" name="phno" value="<?php echo $t['phno']?>"/> </td>
                
                <td><label style="margin-left:10%"> Mobile No.</label> </td>
                <td> <input class="form-control input-medium"  type="text" name="mno" value="<?php echo $t['mno']?>"/> </td>
       </tr>
    </table>
  </div>
<button style="margin-left:40%; margin-top:5%" class="btn btn-success" name="btn" type="submit">Save</button> 
<button class="btn btn-info" style="margin-top:5%"  align="left" name="prnt" type="submit" onClick="window.print()" ><i class="fa fa-print">Print</i></button>
<input class="btn btn-default button-previous" value="Back" name="clos" type="submit" style="margin-top:5%"></form> 
			
			</div>
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>