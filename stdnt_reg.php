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
ajax();
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
		<div class="page-content">
			<div class="row">
	
    <form class="form-signin" method="POST" id="frm1" action="stdnt_reg_cnn.php"> 
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
        
       
  
    <table>
	  <tr>
            <td> <label>Roll No. </label></td>
            <td> <input class="form-control input-small" type="text"  name="rno"/> </td>
            
                   
              
              <td><label >Registration Date </label></td>
             <td> <input class="form-control  input-small date-picker" type="text" name="rg_dt" id="dp1" value="<?php echo $d; ?>"/> </td>
             
             <td><label > Bus Facility</label> </td>
			 <td> <select class="form-control  input-small" name="bs_fc">
             <option value="">select Bus Facility</option>
      			 <?php $sql_="select * from bs_fclty";
					$sql=mysql_query($sql_);
					while($t=mysql_fetch_array($sql))
					{ 
			 			 echo "<option value=\"".$t['status']."\">".$t['status']."</option>";
					}	
				 ?>
				 </select>
			</td>
              
                    <td><label> Scholar No. </label></td>
            <td><input class="form-control input-small" type="text" name="schlr_no" value="<?php echo $r1;?>"/></td><!--<td><button class="btn btn-info" name="btn"  	 			  type="submit" onclick="window.location='srch2.php'" >Search</button></td>-->
        		<?php $udt = date("Y-m-d");
                $d = date("d-m-Y", strtotime($udt)); 
       		 	?>
                <td><button type="submit" name="search" class="btn btn-success"><i class="fa fa-edit"></i> Search</button>
              </tr>
			<tr> 
             
               
               <td> <label>First Name </label></td>
            <td> <input class="form-control input-small" type="text" name="fname"/> </td>
			
            <td><label>Middle Name</label> </td>
            <td> <input class="form-control  input-small" type="text" name="mname"/> </td>
            
            <td><label>Last Name </label></td>
            <td> <input class="form-control input-small" type="text" name="lname"/> </td>
            
           <td><label>Date Of Birth</label> </td>
            <td> <input class="form-control form-control-inline input-small date-picker" type="text" id="dp2" name="dob"/> </td>
        </tr>
        <tr>
            <td><label>Gender</label> </td>
            <td> <select class="form-control  input-small" name="gndr">
            <option value="">select Gender</option>
                 <option><label>Male</label></option>
                 <option><label>Female</label></option>
                  </select>
            </td> 
           
            <td><label>Father's Name </label></td>
            <td> <input class="form-control input-small" type="text" name="f_name"/> </td>
            
            <td><label>Mother's Name</label> </td>
            <td> <input class="form-control input-small" type="text" name="m_name"/> </td>
                       
            <td><label>Hosteller</label> </td>
			<td> <select class="form-control input-small" name="hstl">
            <option value="">select Hosteller</option>
     			<?php $sql_="select * from hostel_fc";
							$sql=mysql_query($sql_);
				while($t=mysql_fetch_array($sql))
				{ 
				  echo "<option value=\"".$t['status']."\">".$t['status']."</option>";
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
                          echo "<option value=\"".$t['sno']."\">".$t['ctg']."</option>";
                        }		
                 ?>
                 </select>
     		</td>
             <td valign="top"><label>Permanent Address</label> </td>
            <td> <textarea class="form-control input-small" name="padd" style="resize:none;" id="padd"></textarea> </td> 
            <td valign="top"><label> Current Address</label> <br/>
            <input type="checkbox" id="sameasdata" onClick="sameas();" >Same as Permanent Address.</td>
         	
            <td> <textarea class="form-control input-small" name="cadd"  style="resize:none;" id="cadd"></textarea> </td> 
            
   	   
	    
    	 <td><label>City </label></td>
            <td> <select class="form-control input-small" name="c2">
            <option value="">select GendCityer</option>
                <?php $sql_="select * from city";
                        $sql=mysql_query($sql_);
                        while($t=mysql_fetch_array($sql))
                        { 
                         echo "<option value=\"".$t['city']."\">".$t['city']."</option>";
                        }	
            ?></select>
            </td>
            
            <tr>
            <td><label>Pincode </label></td>
            <td> <input class="form-control input-small" type="text" name="p2"/> </td>
    
            <td><label> Phone No. </label></td>
            <td> <input class="form-control input-small" type="text" name="phno"/> </td>
            
            <td><label>Mobile No.</label> </td>
			<td> <input class="form-control input-small" type="text" name="mno"/> </td>
            
           
     </tr>
     
 <tr> <td><label>RTE</label> </td>
			<td>
             <select class="form-control  input-small" name="rte">
           
                 <option value="No" ><label>No</label></option>
                 <option value="Yes"><label>Yes</label></option>
                  </select> 
            </td>
            <td><label >Bus Station</label> </td>
			 <td> <select class="form-control input-small" name="station" id="station" >
<?php $sel=mysql_query("select * from bus_station");
while($arr=mysql_fetch_array($sel))
{?>
  <option   value="<?php echo $arr['id']; ?>"><?php echo $arr['station']; ?></option>
  <?php
} ?>
</select>
			</td>
            <td><label>Email Id</label></td><td colspan="3">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-envelope"></i>
												</span>
												<input class="form-control" placeholder="Email Address" type="email" name="email_id">
											</div>
										</td></tr>


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
                  echo "<option value=\"".$t['sno']."\">".$t['cls']."</option>";
                }		
    ?></select></th>
    <th align="center"><label> Medium</label> </th>       
    <td> <select class="form-control input-small" name="md">
    <option value="">select Medium</option>
         <?php $sql_="select * from medium";
                $sql=mysql_query($sql_);
                while($t=mysql_fetch_array($sql))
                { 
                  echo "<option value=\"".$t['sno']."\">".$t['medium']."</option>";
                }
    ?></select></td>
    <th><label> Stream</label> </th>
    <th> <select class="form-control input-small" name="strm">
    <option value="">select Stream</option>
        <?php $sql_="select * from stream";
                $sql=mysql_query($sql_);
                while($t=mysql_fetch_array($sql))
                { 
                  echo "<option value=\"".$t['sno']."\">".$t['strm']."</option>";
                }
    ?></select></th>
         
    <th><label>Section</label> </th>
    <th> <select class="form-control input-small" name="sec">
    <option value="">select Section</option>
         <?php $sql_="select * from section";
                $sql=mysql_query($sql_);
                while($t=mysql_fetch_array($sql))
                { 
                  echo "<option value=\"".$t['sno']."\">".$t['section']."</option>";
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
        <td> <input class="form-control input-small" type="text" name="ps_name"/></td>
        
        <td><label>City</label> </td>
        <td> <select class="form-control input-small" name="ps_city"> 
        <option value="">select City</option>
             	 <?php $sql_="select * from city";
                    $sql=mysql_query($sql_);
                    while($t=mysql_fetch_array($sql))
                    { 
                      echo "<option value=\"".$t['city']."\">".$t['city']."</option>";
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
                      echo "<option value=\"".$t['sno']."\">".$t['cls']."</option>";
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
                          echo "<option value=\"".$t['sno']."\">".$t['medium']."</option>";
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
        <td> <input class="form-control input-small" type="text" name="s1"/> </td>
        
        <td> <label>Scholar No. 2</label></td>
        <td> <input class="form-control input-small" type="text" name="s2"/> </td>
        
        <td><label> Scholar No. 3</label></td>
        <td> <input class="form-control input-small" type="text" name="s3"/> </td>
	</tr>
</table>
</div>
</div>
<button style="margin-left:35%; margin-top:2%" class="btn btn-success" name="save" type="submit">Save</button> 
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