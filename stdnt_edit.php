<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['edit']))
{
	$schlr_no_id=$_GET['schlr_no_id'];
	extract($_POST);
	$cbArray = $_POST['c'];
	$document=implode(',' , $cbArray);
	$rg_dt1=date('Y-m-d', strtotime($rg_dt));
	$dob1=date('Y-m-d', strtotime($dob));
	if($_POST['student_status']==1)
	{
		$continoue_discontinoue_date=date('Y-m-d');
	}
	else
	{
		$continoue_discontinoue_date='0000-00-00';
	}

	mysql_query("update  stdnt_reg set schlr_no='$schlr_no',rg_dt='$rg_dt1',adm='$adm',adm_class_id='$adm_class_id',bs_fc='$bs_fc',bus_station='$station',hstl='$hstl',roll_no='$rno',dob='$dob1',fname='$fname',f_name='$f_name',mname='$mname',m_name='$m_name',lname='$lname',gndr='$gndr',cadd='$cadd',padd='$padd',c1='$c1',c2='$c2',p1='$p1',p2='$p2',phno='$phno',mno='$mno',ctg='$ctg',cls='$cls',md='$md',strm='$strm',sec='$sec',ps_name='$ps_name',ps_city='$ps_city',l_cls='$l_cls',l_md='$l_md',s1='$s1',s2='$s2',s3='$s3',document='$document',rte='$rte',email_id='$email_id',continoue_discontinoue_status='$student_status',continoue_discontinoue_date='$continoue_discontinoue_date',stdnt_remarks='$stdnt_remarks' where `id`='".$schlr_no_id."'");
	if(isset($_GET['open']))
	{
		echo "<meta http-equiv='Refresh' content='0 ;URL=mnth_fee.php?schlr_no_id=$schlr_no_id'>";
		exit;
	}
	else
	{
		echo "<meta http-equiv='Refresh' content='0 ;URL=stdnt_edit.php?schlr_no_id=$schlr_no_id'>";
		exit;
	}
}
?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
css();
ajax();
?>
<script>
function get_data()
{
	var schlr_no=document.getElementById("scholer_no").value;
	window.location.assign("stdnt_edit.php?schlr_no="+schlr_no);	
}
</script>
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
		<div class="page-content">
			<div class="row">
	
    <form class="form-signin" method="POST"  > 
    <?php
    if(!empty($_GET['schlr_no_id']))
{
$schlr_no_id=$_GET['schlr_no_id'];
$schlr_all=mysql_query("select * from `stdnt_reg` where `id` = '$schlr_no_id' ");
			$ftc_schlr=mysql_fetch_array($schlr_all);
			$schlr_no= $ftc_schlr['schlr_no'];
			$rg_dt = $ftc_schlr['rg_dt'];
			$right_date = date("d-m-Y",strtotime($rg_dt));
			$adm_class_id = $ftc_schlr['adm_class_id'];
			$adm = $ftc_schlr['adm'];
			$bs_fc = $ftc_schlr['bs_fc'];
			$bus_station = $ftc_schlr['bus_station'];
			$hstl = $ftc_schlr['hstl'];
			$roll_no = $ftc_schlr['roll_no'];
			$dob = $ftc_schlr['dob'];
			$dob_right = date("d-m-Y",strtotime($dob));
			$fname = $ftc_schlr['fname'];
			$f_name = $ftc_schlr['f_name'];
			$mname = $ftc_schlr['mname'];
			$m_name = $ftc_schlr['m_name'];
			$lname = $ftc_schlr['lname'];
			$gndr = $ftc_schlr['gndr'];
			$cadd = $ftc_schlr['cadd'];
			$padd = $ftc_schlr['padd'];
			$c1 = $ftc_schlr['c1'];
			$c2 = $ftc_schlr['c2'];
			$p1 = $ftc_schlr['p1'];
			$p2 = $ftc_schlr['p2'];
			$phno = $ftc_schlr['phno'];
			$mno = $ftc_schlr['mno'];
			$ctg = $ftc_schlr['ctg'];
			$cls = $ftc_schlr['cls'];
			$md = $ftc_schlr['md'];
			$strm_fetch = $ftc_schlr['strm'];
			 $sec = $ftc_schlr['sec'];
			 $ps_name = $ftc_schlr['ps_name'];
			$ps_city = $ftc_schlr['ps_city'];
			$l_cls = $ftc_schlr['l_cls'];
			$l_md = $ftc_schlr['l_md'];
			$s1_no = $ftc_schlr['s1'];
			$s2 = $ftc_schlr['s2'];
			$s3 = $ftc_schlr['s3'];
			$document = $ftc_schlr['document'];
			$rte = $ftc_schlr['rte'];
			$email_id = $ftc_schlr['email_id'];
			$stdnt_remarks = $ftc_schlr['stdnt_remarks'];
			$continoue_discontinoue_status = $ftc_schlr['continoue_discontinoue_status'];
			
										
?>
  		
	<div class="portlet">
         <div class="portlet-title">
            <div class="caption">
                Student Update
               
            </div>
            <div class="tools">
                     <?php
                $sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$ftc_schlr['id']."' && `status`='1'");
                $tc=mysql_num_rows($sel_tc);
                if(!empty($tc))
                {?>
                <label style="color:red; font-size:20px; text-align:center">Tc Issued</label>
                <?php
                    
                    }
                ?>                
            </div>
        </div>
       <!-- <div class="table-responsive">
  
    <table align="center">
    <tr>
    <td><input type="text" name="scholer_no" value="<?php if(!empty($_GET['schlr_no_id'])){echo  $schlr_no;}?>" placeholder="Scholar No" class="form-control input-medium" id="scholer_no"/></td>
    <td><button  class="btn btn-success" name="go"  type="button" onClick="get_data();">Go</button></td> 
	</tr>
</table >
</div>
-->


	
         
        <div class="table-responsive">

    <table class="table">
	  <tr>
            <td> <label>Roll No. </label></td>
            <td> <input class="form-control input-small" type="text"  name="rno" value="<?php echo $roll_no; ?>"/> </td>
            
                   
              
              <td><label >Registration Date </label></td>
             <td> <input class="form-control  input-small date-picker" type="text" name="rg_dt" id="dp1" value="<?php echo $right_date; ?>"/> </td>
             
             <td><label >Bus Facility</label> </td>
			 <td> <select class="form-control  input-small" name="bs_fc">
             <option value="">select Bus Facility</option>
      			 <?php $sql_="select * from bs_fclty";
					$sql=mysql_query($sql_);
					while($t=mysql_fetch_array($sql))
					{ 
					$status = $t['status'];
				 ?>
                 <option   <?php if($status == $bs_fc ){ ?> selected="selected" <?php } ?> value="<?php echo $status; ?>"><?php echo $status ?></option>
                <?php
					}
             	 ?>	
				 </select>
			</td>
              
                    <td><label> Scholar No. </label></td>
            <td><input class="form-control input-small" type="text" name="schlr_no" value="<?php echo $schlr_no;?>"/></td>
              
              </tr>
			<tr> 
             
               
               <td> <label>First Name </label></td>
            <td> <input class="form-control input-small" type="text" name="fname" value="<?php echo $fname ?>"/> </td>
			
            <td><label>Middle Name</label> </td>
            <td> <input class="form-control  input-small" type="text" name="mname" value="<?php echo $mname ?>"/> </td>
            
            <td><label>Last Name </label></td>
            <td> <input class="form-control input-small" type="text" name="lname" value="<?php echo $lname ?>"/> </td>
            
           <td><label>Date Of Birth</label> </td>
            <td> <input class="form-control form-control-inline input-small date-picker" type="text" id="dp2" name="dob" value="<?php echo $dob_right ?>"/> </td>
        </tr>
        <tr>
            <td><label>Gender</label> </td>
            <td> <select class="form-control  input-small" name="gndr">
            <option value="">select Gender</option>
                 <option <?php if($gndr == "Male" ){ ?> selected="selected" <?php } ?>><label>Male</label></option>
                 <option <?php if($gndr == "Female" ){ ?> selected="selected" <?php } ?>><label>Female</label></option>
                  </select>
            </td> 
           
            <td><label>Father's Name </label></td>
            <td> <input class="form-control input-small" type="text" name="f_name" value="<?php echo $f_name ?>"/> </td>
            
            <td><label>Mother's Name</label> </td>
            <td> <input class="form-control input-small" type="text" name="m_name" value="<?php echo $m_name ?>"/> </td>
                       
            <td><label>Hosteller</label> </td>
			<td> <select class="form-control input-small" name="hstl">
            <option value="">select Hosteller</option>
     			<?php $sql_="select * from hostel_fc";
							$sql=mysql_query($sql_);
				while($t=mysql_fetch_array($sql))
				{ 
					$h_status = $t['status'];
				 ?>
                 <option   <?php if($h_status == $hstl ){ ?> selected="selected" <?php } ?> value="<?php echo $h_status; ?>"><?php echo $h_status ?></option>
                <?php
					}
				?>
                </select>
            </td> 
            
        </tr>
        <tr>
            <td><label> Category </label></td>
			<td> <select class="form-control input-small" name="ctg">
            <option value="">select Category</option>
				 <?php $sql_="select * from category";
                        $sql=mysql_query($sql_);
                        while($t=mysql_fetch_array($sql))
                        { 
						$ctg1 = $t['ctg'];
						$sno1 = $t['sno'];
                        ?>
                 <option   <?php if($ctg == $sno1 ){ ?> selected="selected" <?php } ?> value="<?php echo $sno1; ?>"><?php echo $ctg1 ?></option>
                <?php
					}		
                 ?>
                 </select>
     		</td>
             <td valign="top"><label>Permanent Address</label> </td>
            <td> <textarea class="form-control input-small" name="padd" id="padd" style="resize:none;"><?php echo $padd ?></textarea> </td> 
            <td valign="top"><label> Current Address</label> <br/>
            <input type="checkbox" id="sameasdata" onClick="sameas();" >Same as Permanent Address.</td>
            <td> <textarea class="form-control input-small" name="cadd" id="cadd"  style="resize:none;"><?php echo $cadd ?></textarea> </td> 
         
           

            <td><label>City </label></td>
            <td> <select class="form-control input-small" name="c2">
            <option value="">select City</option>
                <?php $sql_="select * from city";
                        $sql=mysql_query($sql_);
                        while($t=mysql_fetch_array($sql))
                        { 
                       $city = $t['city'];
                        ?>
                 <option   <?php if($city == $c2 ){ ?> selected="selected" <?php } ?> value="<?php echo $city; ?>"><?php echo $city ?></option>
                <?php
					}			
            ?></select>
            </td>
   	   </tr>
	   <tr> 
     
        <td><label>Pincode </label></td>
        <td><input class="form-control input-small" type="text" name="p2" value="<?php echo $p2 ?>"/> </td>
        
        <td><label> Phone No.</label></td>
        <td><input class="form-control input-small" type="text" name="phno" value="<?php echo $phno ?>"/> </td>
        
        <td><label>Mobile No.</label> </td>
        <td><input class="form-control input-small" type="text" name="mno" value="<?php echo $mno ?>"/> </td>
        <td><label>Document</label> </td>
        <td><?php
        	$b=mysql_query("select * from admsn_doc");
			while($row=mysql_fetch_array($b))
			{
				$admsn_id=$row['id'];
				$doc=$row['doc'];
			
				$sel=mysql_query("select admsn_doc_id from cls_admsn_doc where class_id='$adm_class_id'");
				$arr=mysql_fetch_array($sel);	
				$ad_id=$arr['admsn_doc_id'];
				$ad_doc_id='';
				$data=explode(',' , $ad_id);
				for($i=0; $i<sizeof($data); $i++)
				{
					if($data[$i]==$admsn_id)
					{
						$data_match=explode(',' , $document);
						for($j=0; $j<sizeof($data_match); $j++)
						{
							if($data_match[$j]==$admsn_id)
							{
								$ad_doc_id=$admsn_id;
							}
						}
						?>
			<label><input type="checkbox" name="c[]" value="<?php echo $admsn_id;?>" <?php if($row['id']==$ad_doc_id) { ?> checked="checked" <?php }?>/>
			<?php echo $doc;?></label><br/>
            <?php
					}
				}
				
				
			 } ?>
			 </td> 
     </tr>
     <tr>
     <td><label>RTE</label> </td>
     <td>
             <select class="form-control  input-small" name="rte">
           
                 <option value="No" <?php if($rte=='No'){ ?> selected="selected" <?php } ?>><label>No</label></option>
                 <option value="Yes" <?php if($rte=='Yes'){ ?> selected="selected" <?php } ?>><label>Yes</label></option>
                  </select> 
            </td>
     
     
       <td><label>Student Status</label> </td>
			<td >
             <select class="form-control  input-small" name="student_status">
           
                 <option value="0"  <?php if($continoue_discontinoue_status==0){ ?> selected="selected" <?php } ?>><label>Continoue</label></option>
                 <option value="1" <?php if($continoue_discontinoue_status==1){ ?> selected="selected" <?php } ?>><label>Discontinoue</label></option>
                  </select> 
            </td>
    
  

 <td><label>Email Id</label></td><td >
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-envelope"></i>
												</span>
												<input class="form-control" placeholder="Email Address" type="email" name="email_id" value="<?php echo $email_id; ?>">
											</div>
										</td>
                                        <td><label >Bus Station</label> </td>
			 <td> <select class="form-control input-small" name="station" id="station" >
<option value="0">---Select Station---</option>
<?php $sel=mysql_query("select * from bus_station");
while($arr=mysql_fetch_array($sel))
{?>
  <option   <?php if($arr['id'] == $bus_station ){ ?> selected="selected" <?php } ?> value="<?php echo $arr['id']; ?>"><?php echo $arr['station']; ?></option>
  <?php
} ?>
</select>
			</td></tr>

</table >
</div>
<div class="portlet">
         <div class="portlet-title">
        <div class="caption">
			 Current Class
		</div></div>
        <div class="table-responsive">
    <table width="100%">
    <tr>
    <th><label>Class</label></th>
    <th> <select class="form-control input-small" name="cls">
    <option value="">select Class</option>
          <?php $sql_="select * from class";
                $sql=mysql_query($sql_);
                while($t=mysql_fetch_array($sql))
                { 
                   $cls1 = $t['cls'];
				   $sno1 = $t['sno'];
                        ?>
                 <option   <?php if($cls == $sno1 ){ ?> selected="selected" <?php } ?> value="<?php echo $sno1; ?>"><?php echo $cls1 ?></option>
                <?php
					}		
                 ?>	
    ?></select></th>
    <th align="center"><label> Medium</label> </th>       
    <td> <select class="form-control input-small" name="md">
    <option value="">select Medium</option>
         <?php $sql_="select * from medium";
                $sql=mysql_query($sql_);
                while($t=mysql_fetch_array($sql))
                { 
                   $medium = $t['medium'];
				   $sno = $t['sno'];
                        ?>
                 <option   <?php if($md == $sno ){ ?> selected="selected" <?php } ?> value="<?php echo $sno; ?>"><?php echo $medium ?></option>
                <?php
					}		
                 ?>	
    ?></select></td>
    <th><label> Stream</label> </th>
    <th> <select class="form-control input-small" name="strm">
    <option value="">select Stream</option>
        <?php $sql_="select * from stream";
                $sql=mysql_query($sql_);
                while($t=mysql_fetch_array($sql))
                { 
                  $strm = $t['strm'];
				   $sno = $t['sno'];
                        ?>
                 <option   <?php if($strm_fetch == $sno ){ ?> selected="selected" <?php } ?> value="<?php echo $sno; ?>"><?php echo $strm ?></option>
                <?php
					}	
    ?></select></th>
         
    <th><label>Section</label> </th>
    <th> <select class="form-control input-small" name="sec">
    <option value="">select Section</option>
         <?php $sql_="select * from section";
                $sql=mysql_query($sql_);
                while($t=mysql_fetch_array($sql))
                { 
                   $section = $t['section'];
				   $sno = $t['sno'];
                        ?>
                 <option   <?php if($sec == $sno ){ ?> selected="selected" <?php } ?> value="<?php echo $sno; ?>"><?php echo $section ?></option>
                <?php
					}	
    ?></select></th>
    </tr>
    </table></div>
</div>
<div class="portlet">
         <div class="portlet-title">
        <div class="caption">
			 Admission Class
		</div></div>
        <div class="table-responsive">
    <table width="100%">
    <tr>
    <th><label>Class</label></th>
    <th> <select class="form-control input-medium" name="adm_class_id">
    <option value="">select Class</option>
          <?php $sql_="select * from class";
                $sql=mysql_query($sql_);
                while($t=mysql_fetch_array($sql))
                { 
                   $cls1 = $t['cls'];
				   $sno1 = $t['sno'];
                        ?>
                 <option   <?php if($adm_class_id == $sno1 ){ ?> selected="selected" <?php } ?> value="<?php echo $sno1; ?>"><?php echo $cls1 ?></option>
                <?php
					}		
                 ?>	
    ?></select></th>
    <td><label> Admission Session </label></td>
             <td> <input class="form-control  input-small" type="text" value="<?php echo $adm; ?>" name="adm">Ex.<?php echo $session; ?></td>
 <td><label> Admission Date </label></td>
             <td> <input class="form-control  input-small date-picker" type="text" value="<?php echo $right_date; ?>" disabled></td>
    </tr>
    </table></div>
</div>
<div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div class="caption">
			 Additional Information (Information Regarding Previous Schoool)
		</div></div>
        <div class="table-responsive">
<table width="100%">
    <tr> 
        <td><label> Name</label></td>
        <td> <input class="form-control input-small" type="text" name="ps_name" value="<?php echo $ps_name; ?>"/></td>
        
        <td><label>City</label> </td>
        <td> 
<input class="form-control input-small" type="text" name="ps_city" value="<?php echo $ps_city; ?>"/>

          </td>
             
          <td><label>Last Class Attended</label></td>
          <td> <select class="form-control input-small" name="l_cls"/> 
          <option value="">select Class</option>
              <?php $sql_="select * from class";
                    $sql=mysql_query($sql_);
                    while($t=mysql_fetch_array($sql))
                    { 
                     $cls1 = $t['cls'];
				   $sno1 = $t['sno'];
                        ?>
                 <option   <?php if($l_cls == $sno1 ){ ?> selected="selected" <?php } ?> value="<?php echo $sno1; ?>"><?php echo $cls1 ?></option>
                <?php
					}	
        		?>
           </td>
           
            <td><label>Medium </label></td>
            <td> <select class="form-control input-small" name="l_md"> 
            <option value="">select Medium</option>
                 	 <?php $sql_="select * from medium";
                        $sql=mysql_query($sql_);
                        while($t=mysql_fetch_array($sql))
                        { 
                         $medium = $t['medium'];
				   $sno = $t['sno'];
                        ?>
                 <option   <?php if($md == $sno ){ ?> selected="selected" <?php } ?> value="<?php echo $sno; ?>"><?php echo $medium ?></option>
                <?php
					}	
           			 ?>
                   </select>
             </td>
        </tr>
    </table></div>
    </div>
    <div class="portlet" style="margin-top:1%">
         <div class="portlet-title">
        <div class="caption">
			Information Regarding Brother/Sister Already Studying in this school (Only Scholar No.)
		</div>
        </div>
        <div class="table-responsive">
 <table width="100%">
     <tr> 
        <td><label> Scholar No. 1 </label></td>
        <td> <input class="form-control input-small" type="text" name="s1" value="<?php echo $s1_no; ?>"/> </td>
        
        <td> <label>Scholar No. 2</label></td>
        <td> <input class="form-control input-small" type="text" name="s2" value="<?php echo $s2; ?>"/> </td>
        
        <td><label> Scholar No. 3</label></td>
        <td> <input class="form-control input-small" type="text" name="s3" value="<?php echo $s3; ?>"/> </td>
	</tr>
</table>
</div>
</div>
<label> Remarks </label><textarea class="form-control input-large" name="stdnt_remarks"  style="resize:none;"><?php echo $stdnt_remarks ?></textarea>
<button style="margin-left:35%; margin-top:2%" class="btn btn-success" name="edit" type="submit"><i class="fa fa-edit"></i> Update</button> 
<?php
}
?>



</form> 
		</div>	
		</div>
	</div>
</div>

<!-- END CONTENT -->
</div>

<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>