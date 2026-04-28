<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
$cd=date("d-m-Y");
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
	
			<form class="form-signin" method="POST"> 
<div id="content">
<div style="width:96%; margin-left:4%">
    <table align="center" width="100%">
        <tr>
            <td><label>Form No.</label></td>
            <td> <input class="form-control input-medium" type="text" name="formno"  value="<?php echo $arr['form_no'];?>" readonly/></td>
            <td><label>Issue Date</label></td>
            <td> <input class="form-control form-control-inline input-medium date-picker" type="text" name="i_date" value="<?php echo date("d-m-Y",strtotime(		 					$arr['i_date']));?>" disabled />	
            </td> 
      
            <td><label>Class</label></td>
            <td><input class="form-control input-medium" type="text" name="class" value="<?php echo $arr['class']; ?>" readonly/></td>
           
        </tr>
       
        <tr> 
            
            <td><label>Stream</label></td>
            <td> <select class="form-control input-medium" name="strm" disabled>
           			 <?php $sql_="select * from stream";
                     	   $sql=mysql_query($sql_);
                       	   while($t=mysql_fetch_array($sql))
                        {
					 ?>
           		 	 <option value="<?php echo $t['strm'];?>" <?php if($arr['strm']==$t['strm']) { ?>  selected="<?php $arr['strm']; }?>" >
					 <?php echo$t['strm'];		 			 ?>
            	 	 </option>
           		 	 <?php
				  		} 
				 	 ?>
             		</select>
            	</td>
                
                <td><label>Medium</label></td>
                <td> <select class="form-control input-medium" name="medium"  disabled>
               			 <?php $sql_="select * from medium";
                               $sql=mysql_query($sql_);
                               while($t=mysql_fetch_array($sql))
                            {
						 ?>
                		<option value="<?php echo $t['medium'];?>" <?php if($arr['medium']==$t['medium']) { ?>  selected="<?php $arr['medium']; }?>" >
							<?php echo  $t['medium']; ?>
                        </option>
               			<?php
							 }
						?>
                	</select>
                </td>
                <td><label>Fees</label></td>
                <td> <input class="form-control input-medium" type="text" name="fee" value="<?php echo $arr['fee'];?>"  disabled/> </td>
        </tr>
        <tr>
                <td><label> Issued To</label> </td>
                <td> <input class="form-control input-medium" type="text" name="name" value="<?php echo $arr['name'];?>" readonly /> </td>
                
                <td><label>Sex</label> </td>
                <td> <select class="form-control input-medium" name="gndr"  disabled>
               			 <?php $sql_="select * from gender";
                               $sql=mysql_query($sql_);
                               while($t=mysql_fetch_array($sql))
                            {
						 ?>
                            <option value="<?php echo $t['gndr'];?>" <?php if($arr['gndr']==$t['gndr']) { ?>  selected="<?php $arr['gndr']; }?>" >
                            <?php echo  $t['gndr']; ?>
                            </option>
               			 <?php
						 	}
						 ?>
               		 </select>
        		</td>
       
                 <td><label>Father Name</label> </td>
                 <td> <input class="form-control input-medium" type="text" name="fname" value="<?php echo $arr['fname'];?>"  readonly/>  </td>
                 
        </tr>
    	<tr>     
                 
                 <td><label>Phone No.</label></td>
                 <td> <input class="form-control input-medium" type="text" name="phno" value="<?php echo $arr['phno'];?>"  disabled/></td>
   		</tr>
	</table> 
 </div></div>
</form>

<form class="form-signin" method="POST" action="frm_rtrn_cnn.php">    
</br> <h4> Additional Information </h4>
 <?php
		$s=mysql_query("select * from `frm_rtrn`");
		$r=mysql_num_rows($s);
		$r=($r+1);
		 ?>
 
 <div style="width:96%; margin-left:4%; margin-top:2%">
    <table align="center" width="100%">
    	<tr>
                <td><label> Receipt No.</label> </td>
                <td> <input class="form-control input-medium" type="text" value="<?php echo $r;?>"/> </td>
               
                <td><label> Receipt Date</label> </td>
                <td> <input class="form-control form-control-inline input-medium date-picker" type="text" name="r_date"id="dp3" value="<?php echo $cd; ?>" /> 	 				</td> 
   			   
                <td><label>Date of </br>Entrance Test</label></td>
                <td>
                <input class="form-control form-control-inline input-medium date-picker" type="text"/ name="test_date" id="dp2" value="<?php echo $cd; ?>"  />
                </td>
				
         </tr>
		<tr>
       
              	<td><label>Time of </br>Entrance Test</label> </td>
				<td>
				<div class="example-container">
                    <input class="form-control input-medium" type="text" name="slider_example_1" id="slider_example_1" value="" />
                      <!--
                    <pre>	
                                $(function(){
                                    $('#tabs').tabs();
                            
                                    $('.example-container > pre').each(function(i){
                                        eval($(this).text());
                                    });
                                });
                                </pre>-->
        		</td>
              
                <td><label>Date of</br> Interview</label> </td>
                <td> <input class="form-control input-medium" type="text" name="intrv_date" id="dp1" value="<?php echo $cd; ?>" /> </td>
        
                <td><label>Test Fee</label></td>
                <td> <input class="form-control input-medium" type="text" name="fee"/> </td>
        </tr>
	</table>
</div>
<button style="margin-left:35%; margin-top:2%; width:6%" class="btn btn-success"  name="btn" type="submit" >Save</button> 
<button style="margin-top:2%" class="btn btn-info"  name="btn" type="submit" onClick="window.print()"><i class="fa fa-print"></i>Print</button>
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