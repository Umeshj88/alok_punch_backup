<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
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
	<form name="frm" id="frm1" class="form-signin" method="POST" action="frm_iss_cnn.php"> 
		<?php
                $s=mysql_query("select no from `form_no` where id='1'");
                $rr=mysql_fetch_array($s);
                $r=$rr['no'];
                $no=$r+1;
                $dat=date("d-m-Y");
        ?>
<div style="width:96%; margin-left:2%; margin-top:2%">
    <table align="center" width="75%">
        <tr>
            <td><label>Form No.</label></td>
            <td> <input class="form-control input-medium" type="text" name="form_no" value="<?php echo $no;?>"/></td>
            
            <td><label>Issue Date</label></td>
            <td> <input class="form-control form-control-inline input-medium date-picker" type="text" id="dp1" name="i_date" value="<?php echo $dat;?>"/>  </td> 
        </tr>
   
   		<tr>
    		<td><label>Class</label></td>
   			<td><select class="form-control input-medium" name="class">
   				<?php $sql_="select * from class";
                 $sql=mysql_query($sql_);
                 while($t=mysql_fetch_array($sql))
                  { 
                  echo "<option =\"".$t['cls']."\">".$t['cls']."</option>";
                  }
    			?>
    			</select>
            </td>
            
            <td><label>Stream </label></td>
            <td> <select class="form-control input-medium" name="strm">
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
   
   	   <tr>
             <td><label>Medium </label></td>
             <td> <select class="form-control input-medium" name="medium">
                   <?php $sql_="select * from medium";
                   $sql=mysql_query($sql_);
                   while($t=mysql_fetch_array($sql))
                   { 
                    echo "<option =\"".$t['medium']."\">".$t['medium']."</option>";
                   }		
                   ?>
                 </select>
                </td>
                
                <td><label>Fees</label> </td>
                <?php
                $sel=mysql_query("select amt from  fee_type where type='Form Fee'");
                $arr=mysql_fetch_array($sel);
                ?>
                <td><input class="form-control input-medium" type="text" name="fee" value="<?php echo $arr['amt']; ?>" readonly/></td>
        </tr>
   		<tr>
   				<td><label>Issued To</label> </td>
   				<td><input class="form-control input-medium" type="text" name="name"/> </td>
   				
                <td><label>Sex</label></td>
    			<td><select class="form-control input-medium" name="gndr">
   					 <?php $sql_="select * from gender";
						$sql=mysql_query($sql_);
						while($t=mysql_fetch_array($sql))
						{ 
                 		 echo "<option =\"".$t['gndr']."\">".$t['gndr']."</option>";
										}	
					 ?>
					</select>
   				</td>
        </tr>
    	<tr>
     			<td><label>Father Name</label> </td>
                <td> <input class="form-control input-medium" type="text" name="fname"/>  </td>
                
                <td><label>Phone No.</label></td>
     			<td> <input class="form-control input-medium" type="text" name="phno"/></td>
    	</tr> 
    </table> 
<button class="btn btn-success" style="margin-left:40%; margin-top:2%" id="b1"  name="b1" type="submit">Save</button>
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