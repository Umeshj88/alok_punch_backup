<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['add']))
{
	ob_start();
	header("location: frm_issue_add.php");
	ob_flush();
}
if(isset($_POST['edit']))
{
	ob_start();
	header("location: frm_issue_edit.php");
	ob_flush();
}
if(isset($_POST['delete']))
{
    $form_no=$_SESSION['form_no'];
	$sql="delete from form_issue where form_no='$form_no'";
	mysql_query($sql);
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
	<form class="form-signin" method="POST" action="srch.php"> 
<div id="content">
        <div style="width:96%; margin-left:2%; margin-top:2%">
            <table align="center" width="80%">
            <tr>
            
            		            
                     <td><label>Issue Date</label></td>
                     <td> <input class="form-control" type="text" id="dp1" name="i_date" value="<?php echo $arr['i_date'];?>" disabled/>  </td> 
                    
                     <td><label style="margin-left:10%"> Form No.</label> </td>
                     <td style="width:30%"> <input class="form-control" type="text" name="form_no"  value="<?php echo $arr['form_no'];?>"readonly/></td>
                     <td><button class="btn btn-info"  align="center" name="btn1" type="submit">Search</button></td>

            </tr>
            <tr>
                    <td><label>Class</label> </td>
                    <td><select class="form-control" name="class" disabled>
                        <option><?php echo $arr['class'];?></option>
                        </select>
                    </td>
                    
                    <td><label style="margin-left:10%">Stream</label> </td>
                    <td><select class="form-control" name="strm" disabled>
                        <option> <?php echo $arr['strm'];?></option>
                        </select>
                    </td>
            </tr>
            
            <tr> 
                  <td><label>Medium </label></td>
                  <td><select class="form-control" name="medium" disabled>
                      <option><?php echo $arr['medium'];?></option>
                      </select>
                  </td>
               
                  <td><label style="margin-left:10%">Fees </label></td>
                  <td> <input class="form-control" type="text" value="<?php echo $arr['fee'];?>" disabled/> </td>
            </tr>
            
            <tr>
             	  <td><label>Issued To</label> </td>
            	  <td> <input class="form-control" type="text" name="name" value="<?php echo $arr['name'];?>" disabled/> </td>
            	  <td><label style="margin-left:10%">Sex </label></td>
            	  <td> <select class="form-control" name="gndr" disabled>
            	       <option> <?php echo $arr['gndr'];?></option>
           			   </select>
           		  </td>
            </tr>
            
            <tr> 
            		<td><label>Father Name</label></td>
          		    <td> <input class="form-control" type="text" name="fname" value="<?php echo $arr['fname'];?>" disabled/>  </td>
           
           			<td><label style="margin-left:10%">Phone No.</label> </td>
         		    <td> <input class="form-control" type="text" name="phno" value="<?php echo $arr['phno'];?>" disabled/></td>
            </tr> 
       </table> 
     </div>
  </div>

 </form> 

 <form method="post">
 	<button style="margin-left:35%; margin-top:2%" class="btn btn-info"  name="add" type="submit"><i class="fa fa-plus"></i> Add</button>
	<button class="btn btn-warning" style="margin-top:2%"  name="edit" type="submit"><i class="fa fa-edit"></i> Edit</button>
	<button class="btn btn-danger" style="margin-top:2%"  name="delete" type="submit"><i class="fa fa-trash-o "></i> Delete</button>
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