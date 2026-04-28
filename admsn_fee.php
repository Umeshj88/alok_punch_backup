<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");

?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php logo(); css(); ajax(); ?>
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
<?php menu();
$s=mysql_query("select gen_rcpt_no from `rcpt_no`");
		$t1=mysql_fetch_array($s);
		$r=$t1['gen_rcpt_no']+1;
		?>
<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
            
            <div align="center" style="width:100%; height:20%">
                <div id="toast-container" class="toast-top-right" >
                    <div class="toast toast-info">
                    <button class="toast-close-button">×</button>
                    	<div class="toast-message">
                      <h4> Receipt No. &nbsp;&nbsp;<?php echo $r; ?></h4>
                        </div>
                    </div>
            </div>
           
            <?php
			if(!empty($_GET['done']))
			{
				?>
                <div class="note note-success">
						<p>
							 Fee Submited Successfuly.
						</p>
					</div>
                <?php
			}
			else if(!empty($_GET['notdone']))
			{
				?>
                <div class="note note-success">
						<p>
							Fee is not Submited Successfuly.
						</p>
					</div>
                <?php
			}
			?>
	<form class="form-signin" name="frm1" id="frm1" method="POST" action="admsn_fee_cnn.php"> 
<?php
		
		$s1=mysql_query("select * from `scholar_no`");
		$t11=mysql_fetch_array($s1);
		$r1=$t11['schlr_no']+1;
		$d=date("d-m-Y");
?>
<div>
 <div class="portlet">
         <div class="portlet-title">
        <div class="caption">
			 Student Detail
		</div></div>
         <div class="table-responsive">
        <table width="100%" >
   
    <tr>
            <td> <label>Scholar No.</label> </td>
            <td> <input class="form-control input-medium" type="text" name="schlr_no" value="<?php echo $r1; ?>"/> </td>
            
            <td><label>  Receipt No.</label> </td>
            <td> <input class="form-control input-medium" type="text" name="rcpt_no" value="<?php echo $r;?>"/> </td> 
            
            <td><label> Admission Date</label> </td>
            <td> <input class="form-control  input-medium date-picker" type="text" name="ad_dt" value="<?php echo $d;?>"/></td>
    </tr>
    <tr>            
            <td><label> First Name</label> </td>
            <td> <input class="form-control input-medium" type="text" name="name"/> </td>
            
            <td><label> Middle Name </label></td>
            <td> <input class="form-control input-medium" type="text" name="mname"/> </td>
    
    		 <td><label> Last Name</label> </td>
            <td> <input class="form-control input-medium" type="text" name="lname"/> </td>
  

     </tr>
     <tr>   
            <td><label> Date Of Birth</label> </td>
             
            <td> <input class="form-control  input-medium date-picker" type="text" name="dob"/> </td>
                     
    		<td><label>Father Name</label> </td>
            <td> <input class="form-control input-medium" type="text" name="fname"/> </td>
            <td><label>Mother Name</label> </td>
            <td> <input class="form-control input-medium" type="text" name="m_name"/> </td>
			</tr>
            <tr>
            <td>Gender</td>
       		<td> <label><input type="radio" name="gndr" value="Male"/>Male</label>
                 <label><input type="radio" name="gndr" value="Female"/>Female</label>
        	</td>
      
	<td><label>RTE</label> </td>
			<td>
             <select class="form-control input-medium" name="rte" id="rte">
           
                 <option value="No" ><label>No</label></option>
                 <option value="Yes"><label>Yes</label></option>
                  </select> 
            </td>
			
            
            <td><label> Class</label> </td>
			<td> <select class="form-control input-medium" name="class" id="cls" onChange="getstrm()">
                    <option value="">---Select Class---</option>
                    <?php $sel1=mysql_query("select * from class");
                    while($arr1=mysql_fetch_array($sel1))
                    {
                    $cls=$arr1['cls'];
					$sno=$arr1['sno'];
                        ?>
                        <option value="<?php echo $sno; ?>"><?php echo $cls; ?></option>
                     <?php
                    }
                    ?>
				</select>
 			</td>
</tr>
<tr id="txtstrm">
		<td><label>Medium</label> </td>
        	<td> 
            <?php
			$m=1;
            $md=mysql_query("select * from medium");
			 while($arr2=mysql_fetch_array($md))
			 {
			 $med=$arr2['medium'];
			  $sno=$arr2['sno'];
			  
			 ?>
            <label><input type="radio" name="medium" id="med<?php echo $m++;?>" value="<?php echo $sno;?>"/><?php echo $med;?></label>                 
             <?php } ?>
       		</td>

	
	
			<td> <label>Stream</label> </td>
			<td> <select class="form-control input-medium" name="strm" id="strm" onChange="getvalue()" disabled>
             <option value="">---Select Stream---</option>
					<?php $sel1=mysql_query("select * from cls_strm");
                    while($arr1=mysql_fetch_array($sel1))
                    {
                    $strm=$arr1['strm'];
                    $cls=$arr1['cls'];
                        ?>
                        <option value="<?php echo $strm; ?>"><?php echo $strm; ?></option>
                     <?php
                    }
                    ?>
				</select>
    		</td>
            
            <td><label>Section</label> </td>
 			<td id="txthint">
			<select class="form-control input-medium" name="section" id="section">
			 <option value="">---Select Section---</option>
				<!--	<?php $sel1=mysql_query("select * from sec_cls where cls='$cls'");
                    while($arr1=mysql_fetch_array($sel1))
                    {
                    	$sec=$arr1['sec'];
                        ?>
                        <option selected="selected" value="<?php echo $sec; ?>"><?php echo $sec; ?></option>
                     <?php
                    }
                    ?>-->
			</select>
			</td>
	
    			
            
      
			 
      </tr>
      <tr>
      <td> <label>Category</label> </td>
			 <td> <select class="form-control input-medium" name="category" >
				  <option value="">---Select Category---</option>
				  <?php $sel11=mysql_query("select * from category");
                     while($arr11=mysql_fetch_array($sel11))
                     {
                     $ctg=$arr11['ctg'];
					 $sno=$arr11['sno'];
                   ?>
                        <option value="<?php echo $sno; ?>"><?php echo $ctg; ?></option>
                    <?php
                      }
                    ?>
                    </select>
      </td>
<td><label>Bus Facility </label></td>
<td><label> <input type="checkbox" name="bs_fclty" value="Yes"/>Yes
    </label>
      <select class="form-control input-medium" name="station" id="station" >
<?php $sel=mysql_query("select * from bus_station");
while($arr=mysql_fetch_array($sel))
{?>
<?php echo '<option value="'.$arr['id'].'">'.$arr['station'].'</option>';
} ?>
</select></td>
<td><label>Hosteller </label></td>
            <td> <label><input type="checkbox" name="hstl" value="Yes"/>Yes</label></td>
</tr>
<tr>
 <td><label>Document</label> </td>
        <td><button type="button" class="btn btn-primary" id="get_document" >Get Document</button> </td> 
        <td id="get_document_data"></td>
        
</tr>
</table>
</div>
</div>
<div id="fee">


</div>


 <div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div class="caption">
			 Cheque Details
		</div></div>
        <div class="table-responsive">
<table class="table table-bordered table-hover" align="center">
<thead>
<tr>
<th><b> Chq. No.</b> <input class="form-control input-medium" type="text" name="chq_no"/></th>

<th><b>Chq. Date</b> <input class="form-control input-medium date-picker" type="text" name="dt1"/></th>

<th> <b>Bank</b> <input class="form-control input-medium" type="text" name="bnk"/></th>

<th><b>Remarks</b> <input class="form-control input-medium" type="text" name="rmks"/></th>
</tr>
</thead>
</table>
</div>
</div>
<center>
<button class="btn btn-success" name="save_print" type="submit">Save and Print</button>
</center>
</form>
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