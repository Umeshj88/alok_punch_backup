<?php
include("conn.php");
require_once("function.php");
$find=$_GET['con'];
$schlr_all=mysql_query("select * from `stdnt_reg` where `schlr_no` = '$find' ");
			$ftc_schlr=mysql_fetch_array($schlr_all);
			$schlr_no = $ftc_schlr['schlr_no'];
			$rg_dt = $ftc_schlr['rg_dt'];
			$right_date = date("d-m-Y",strtotime($rg_dt));
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
			$strm = $ftc_schlr['strm'];
			 $sec = $ftc_schlr['sec'];
			 $ps_name = $ftc_schlr['ps_name'];
			$ps_city = $ftc_schlr['ps_city'];
			$l_cls = $ftc_schlr['l_cls'];
			$l_md = $ftc_schlr['l_md'];
			$s1_no = $ftc_schlr['s1'];
			$s2 = $ftc_schlr['s2'];
			$s3 = $ftc_schlr['s3'];
										
?>
  		<?php
		
		$s1=mysql_query("select * from `scholar_no`");
		$t11=mysql_fetch_array($s1);
		$r1=$t11['schlr_no']+1;
	
		 ?>


	<div class="portlet">
         <div class="portlet-title">
        <div class="caption">
			Student Information<!-- <label><input class="form-control input-small" type="checkbox" name="adm"/>Admitted To Next Session</label> -->
		</div></div>
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
            <td><input class="form-control input-small" type="text" name="schlr_no" value="<?php echo $schlr_no;?>"/></td><!--<td><button class="btn btn-info" name="btn"  	 			  type="submit" onclick="window.location='srch2.php'" >Search</button></td>-->
                <td>
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
            <td valign="top"><label> Current Address</label> </td>
            <td> <textarea class="form-control input-small" name="cadd"  style="resize:none;"><?php echo $cadd ?></textarea> </td> 
         
            <td valign="top"><label>Permanent Address</label> </td>
            <td> <textarea class="form-control input-small" name="padd" style="resize:none;"><?php echo $padd ?></textarea> </td> 

            <td><label>City </label></td>
            <td> <select class="form-control input-small" name="c2">
            <option value="">select City</option>
                <?php $sql_="select * from city";
                        $sql=mysql_query($sql_);
                        while($t=mysql_fetch_array($sql))
                        { 
                       $city = $t['city'];
                        ?>
                 <option   <?php if($city == $ps_city ){ ?> selected="selected" <?php } ?> value="<?php echo $city; ?>"><?php echo $city ?></option>
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
     </tr>



</table ></div>
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
                 <option   <?php if($md == $sno ){ ?> selected="selected" <?php } ?> value="<?php echo $sno; ?>"><?php echo $strm ?></option>
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
        <td> <select class="form-control input-small" name="ps_city"> 
        <option value="">select City</option>
             	 <?php $sql_="select * from city";
                    $sql=mysql_query($sql_);
                    while($t=mysql_fetch_array($sql))
                    { 
                       $city = $t['city'];
                        ?>
                 <option   <?php if($city == $ps_city ){ ?> selected="selected" <?php } ?> value="<?php echo $city; ?>"><?php echo $city ?></option>
                <?php
					}		
       			 ?>
               </select>
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
                 <option   <?php if($cls == $sno1 ){ ?> selected="selected" <?php } ?> value="<?php echo $sno1; ?>"><?php echo $cls1 ?></option>
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
		</div></div>
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
<button style="margin-left:35%; margin-top:2%" class="btn btn-success" name="edit" type="submit"><i class="fa fa-edit"></i> Edit</button> 
