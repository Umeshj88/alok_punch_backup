<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['cncle']))
{
	ob_start();
	header("location: reg.php");
	ob_flush();
}
$form_no=$_SESSION['form_no'];
$sel=mysql_query("select * from form_issue where form_no='$form_no'");
$arr=mysql_fetch_array($sel);

?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
css();
?>
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
	<form class="form-signin" method="POST" action="frm_issue_edit_cnn.php" id="frm1"> 
<div id="content">
<div style="width:96%; margin-left:2%; margin-top:2%">
    <table align="center" width="75%">
        <tr>
            <td><label> Form No.</label> </td>
            <td> <input class="form-control input-medium" type="text" name="formno"  value="<?php echo $arr['form_no'];?>" readonly/></td>
            <td><label>Issue Date</label></td>
            <td> <input class="form-control form-control-inline input-medium date-picker" type="text" id="dp1" name="i_date" value="<?php echo date("d-m-Y",   	  					strtotime($arr['i_date']));?>" />  </td> 
        </tr>
		<tr>
    		<td><label>Class</label></td>
			<td> <select class="form-control input-medium" name="class" >
					<?php $sql_="select * from class";
                    $sql=mysql_query($sql_);
                    while($t=mysql_fetch_array($sql))
                    { 
                    ?>
                     <option value="<?php echo $t['cls']; ?>"<?php if($arr['class']==$t['cls']) { ?>  selected="<?php $arr['class']; }?>" ><?php echo  $t['cls'		 						]; ?>
                     </option>
                    <?php
                    }
                    ?> 
                   </select>
			</td>
            
            <td><label>Stream </label></td>
			<td> <select class="form-control input-medium" name="strm" >
					<?php $sql_="select * from stream";
						  $sql=mysql_query($sql_);
						  while($t=mysql_fetch_array($sql))
						  {
					 ?>
 					<option value="<?php echo $t['strm'];?>" <?php if($arr['strm']==$t['strm']) { ?>  selected="<?php $arr['strm']; }?>" ><?php echo  $t['strm' 					]; ?>
                    </option>
 					<?php 
						  } 
					?>
 				</select>
			</td>
		</tr>
		
        <tr>
             <td><label>Medium </label></td>
			 <td> <select class="form-control input-medium" name="medium" >
					<?php $sql_="select * from medium";
						  $sql=mysql_query($sql_);
						  while($t=mysql_fetch_array($sql))
						{
					?>
					<option value="<?php echo $t['medium'];?>" <?php if($arr['medium']==$t['medium']) { ?>  selected="<?php $arr['medium']; }?>" ><?php echo  		 					$t['medium']; ?>
                    </option>
					<?php
						 }
					?>
				</select>
			 </td>
             <td><label>Fees</label> </td>
			 <td> <input class="form-control input-medium" type="text" name="fee" value="<?php echo $arr['fee'];?>" /> </td>
		</tr>
		<tr>
   				<td><label>Issued To</label> </td>
				<td> <input class="form-control input-medium" type="text" name="name" value="<?php echo $arr['name'];?>" /> </td>
                <td><label>Sex</label></td>
				<td> <select class="form-control input-medium" name="gndr" >
					 <?php $sql_="select * from gender";
						   $sql=mysql_query($sql_);
			 			   while($t=mysql_fetch_array($sql))
						{
					 ?>
           			 <option value="<?php echo $t['gndr'];?>" <?php if($arr['gndr']==$t['gndr']) { ?>  selected="<?php $arr['gndr']; }?>" ><?php echo  $t['gndr		 						']; ?></option>
					<?php 
						}
					?>
					</select>
				</td>
          </tr>
		  <tr>
          		 <td><label>Father Name</label> </td>
				 <td> <input class="form-control input-medium" type="text" name="fname" value="<?php echo $arr['fname'];?>" />  </td>
				 <td><label>Phone No.</label> </td>
 				 <td> <input class="form-control input-medium" type="text" name="phno" value="<?php echo $arr['phno'];?>" /></td>
		  </tr>
     </table> 
 </div></div>
<button class="btn btn-success" style="margin-left:40%; margin-top:2%" name="save" type="submit">Save</button>
<button class="btn btn-default button-previous" style="margin-top:2%"  name="cncle" type="submit">Back</button>
</form> 
			
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