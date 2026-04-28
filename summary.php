<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
$total=0;

?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>

<title>Home | <?php title();?></title>
<?php
logo();
css();
?>
<style>
td
{
text-align:center !important;
	}
th
{
	text-align:center !important;
	}
</style>
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
	    
      
      
      
      <div class="portlet">
						
						<div class="portlet-body">
							<ul class="nav nav-tabs">
								<li class="active" style="width:33%">
									<a href="#tab_1_1" data-toggle="tab">School</a>
								</li>
								<li class="" style="width:33%">
									<a href="#tab_1_2" data-toggle="tab">Hostel</a>
								</li>
                                <li class="" style="width:33%">
									<a href="#tab_1_3" data-toggle="tab">Account</a>
								</li>
								
							</ul>
                            </div>
                            </div>
<div class="tab-content">
	<div class="tab-pane fade active in" id="tab_1_1">
		<div class="row">
			<div class="col-md-6">	
                  <div class="portlet">
                       <div class="portlet-title">
                       <div class="caption">Student Count</div>
                       </div>
                           <div class="portlet-body">
                                <div class="table-responsive">																
									 
<?php
$sel1=mysql_query("select * from stdnt_reg where gndr='Male' && schlr_no>'0'");
$num1=mysql_num_rows($sel1);
$sel2=mysql_query("select * from stdnt_reg where gndr='Female' && schlr_no>'0'");
$num2=mysql_num_rows($sel2);
$tot=$num1+$num2;
?>

<table class="table table-bordered">
	<tr >
		<th colspan='4'>Hindi Medium</th>
	</tr>
	<tr>
		<th>Record</th><th>Boys</th><th>Girls</th><th>Total</th>
	</tr>
	<tr>
		<td class="active">Old Student</td> 
		<?php
		   $count8=0;
		   $b11=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Male' && `continoue_discontinoue_status`='0' && `md`='2'");
		   while($row1=mysql_fetch_array($b11))
		   {
				$adm =  $row1['adm'];
				$schlr_no_id =  $row1['id'];
				$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
				$num_tc=mysql_num_rows($sel_tc);
				if(empty($num_tc))
				{
					if($adm<$session)
					{
							 $count8++;
					}
				}
			}
		   
			   ?>
			   <td class="success">
				   <?php echo $count8;?>
				   </td>
				   
		   <?php
		   $count9=0;
		   $b12=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Female' && `continoue_discontinoue_status`='0' && `md`='2'");
		   while($row1=mysql_fetch_array($b12))
		   {
				 $adm =  $row1['adm'];
				 $schlr_no_id =  $row1['id'];
				 $sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
				 $num_tc=mysql_num_rows($sel_tc);
				 if(empty($num_tc))
				 {
					if($adm<$session)
					{
							 $count9++;
					}
				 }
			}
		   
			   ?>
			   <td class="success">
				   <?php echo $count9;?>
				   </td>           
				 <?php
				$count10=$count8+$count9;
				
				?>
				<td class="danger">
				   <?php echo $count10;?>
				   </td>
				   
				</tr>
	<tr>
		<td class="active">New Student</td>
		  <?php
			   $count11=0;
			   $b13=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Male' && `continoue_discontinoue_status`='0' && `md`='2'");
			   while($row1=mysql_fetch_array($b13))
			   {
					$adm =  $row1['adm'];
					$schlr_no_id =  $row1['id'];
					$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
					$num_tc=mysql_num_rows($sel_tc);
					if(empty($num_tc))
					{
						if($adm==$session)		
						{
								 $count11++;
						}
					}
				}
			   
				   ?>
				   <td class="success">
					   <?php echo $count11;?>
					   </td>     
		 <?php
			   $count12=0;
			   $b14=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Female' && `continoue_discontinoue_status`='0' && `md`='2'");
			   while($row1=mysql_fetch_array($b14))
			   {
					$adm =  $row1['adm'];
					$schlr_no_id =  $row1['id'];
					$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
					$num_tc=mysql_num_rows($sel_tc);
					if(empty($num_tc))
					{
						if($adm==$session)		
						{
								 $count12++;
						}
					}
				}
			   
				   ?>
				   <td class="success">
					   <?php echo $count12;?>
					   </td>
					   
					 <?php
					   $count13=$count11+$count12;
					 ?>
					   <td class="danger">
					 <?php echo $count13;?>
					  </td>

		</tr>
		<tr>
			<td class="active">Total</td>
						 <?php
						   $count14=$count11+$count8;
						 ?>
						   <td class="danger">
						 <?php echo $count14;?>
						  </td>
			</td>
			  <?php
						   $count15=$count9+$count12;
						 ?>
						   <td class="danger">
						 <?php echo $count15;?>
						  </td>
			</td>

						 <?php
						   $count16=$count13+$count10;
						 ?>
						   <td class="active">
						 <?php echo $count16;?>
						  </td>
			</td>
		</tr>
</table>
<table class="table table-bordered">
	<tr >
		<th colspan='4'>English Medium</th>
	</tr>
	<tr>
		<th>Record</th><th>Boys</th><th>Girls</th><th>Total</th>
	</tr>
	<tr>
		<td class="active">Old Student</td> 
		<?php
		   $count8=0;
		   $b11=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Male' && `continoue_discontinoue_status`='0' && `md`='1'");
		   while($row1=mysql_fetch_array($b11))
		   {
				$adm =  $row1['adm'];
				$schlr_no_id =  $row1['id'];
				$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
				$num_tc=mysql_num_rows($sel_tc);
				if(empty($num_tc))
				{
					if($adm<$session)
					{
							 $count8++;
					}
				}
			}
		   
			   ?>
			   <td class="success">
				   <?php echo $count8;?>
				   </td>
				   
		   <?php
		   $count9=0;
		   $b12=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Female' && `continoue_discontinoue_status`='0' && `md`='1'");
		   while($row1=mysql_fetch_array($b12))
		   {
				 $adm =  $row1['adm'];
				 $schlr_no_id =  $row1['id'];
				 $sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
				 $num_tc=mysql_num_rows($sel_tc);
				 if(empty($num_tc))
				 {
					if($adm<$session)
					{
							 $count9++;
					}
				 }
			}
		   
			   ?>
			   <td class="success">
				   <?php echo $count9;?>
				   </td>           
				 <?php
				$count10=$count8+$count9;
				
				?>
				<td class="danger">
				   <?php echo $count10;?>
				   </td>
				   
				</tr>
	<tr>
		<td class="active">New Student</td>
		  <?php
			   $count11=0;
			   $b13=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Male' && `continoue_discontinoue_status`='0' && `md`='1'");
			   while($row1=mysql_fetch_array($b13))
			   {
					$adm =  $row1['adm'];
					$schlr_no_id =  $row1['id'];
					$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
					$num_tc=mysql_num_rows($sel_tc);
					if(empty($num_tc))
					{
						if($adm==$session)		
						{
								 $count11++;
						}
					}
				}
			   
				   ?>
				   <td class="success">
					   <?php echo $count11;?>
					   </td>     
		 <?php
			   $count12=0;
			   $b14=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Female' && `continoue_discontinoue_status`='0' && `md`='1'");
			   while($row1=mysql_fetch_array($b14))
			   {
					$adm =  $row1['adm'];
					$schlr_no_id =  $row1['id'];
					$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
					$num_tc=mysql_num_rows($sel_tc);
					if(empty($num_tc))
					{
						if($adm==$session)		
						{
								 $count12++;
						}
					}
				}
			   
				   ?>
				   <td class="success">
					   <?php echo $count12;?>
					   </td>
					   
					 <?php
					   $count13=$count11+$count12;
					 ?>
					   <td class="danger">
					 <?php echo $count13;?>
					  </td>

		</tr>
		<tr>
			<td class="active">Total</td>
						 <?php
						   $count14=$count11+$count8;
						 ?>
						   <td class="danger">
						 <?php echo $count14;?>
						  </td>
			</td>
			  <?php
						   $count15=$count9+$count12;
						 ?>
						   <td class="danger">
						 <?php echo $count15;?>
						  </td>
			</td>

						 <?php
						   $count16=$count13+$count10;
						 ?>
						   <td class="active">
						 <?php echo $count16;?>
						  </td>
			</td>
		</tr>
</table>


</div>
</div>
</div>
</div>
<div class="col-md-6">
<?php
$tcfee ="Tc Fee";
/*$tc1=mysql_query("select * from adhoc_fee where fee_type='$tcfee'");
while($data=mysql_fetch_array($tc1))
{
$rcpt_no = $data['rcpt_no'];
}
	*/
?>
 <div class="portlet">
                       <div class="portlet-title">
                       <div class="caption">Transfer Certificate</div>
                       </div>
                           <div class="portlet-body">
                                <div class="table-responsive">	
<table class="table table-bordered">
	<tr>
		<th colspan='3'>Hindi Medium</th>
	</tr>
<tr>
<th>Record</th><th>Fee Deposited</th><th>TC Issued</th>
</tr>
<tr>
<td>TC Fee Applicable</td>
<td>
<?php
$total_amount=0;
$sel_tc_serial_nolast=mysql_query("select `schlr_no_id` from  `tc_serial_no` where `status`='1' && `md`='2'");
while($ftc_tc_serial_nolast=mysql_fetch_array($sel_tc_serial_nolast))
{
	$tc_schlr_no_id= $ftc_tc_serial_nolast['schlr_no_id'];
	$sel_adhoc_tc=mysql_query("SELECT `amt` FROM `adhoc_fee` WHERE `schlr_no_id`='".$tc_schlr_no_id."' && `fee_type`='11'");
	while($arr_adhoc_tc=mysql_fetch_array($sel_adhoc_tc))
	{
		$total_amount+=$arr_adhoc_tc['amt'];
	}
}
echo $total_amount;
?>
</td>
<td>
<?php
echo $num_tc=mysql_num_rows($sel_tc_serial_nolast);
?>
</td>
</tr>
</table>
<table class="table table-bordered">
	<tr>
		<th colspan='3'>English Medium</th>
	</tr>
<tr>
<th>Record</th><th>Fee Deposited</th><th>TC Issued</th>
</tr>
<tr>
<td>TC Fee Applicable</td>
<td>
<?php
$total_amount=0;
$sel_tc_serial_nolast=mysql_query("select `schlr_no_id` from  `tc_serial_no` where `status`='1' && `md`='1'");
while($ftc_tc_serial_nolast=mysql_fetch_array($sel_tc_serial_nolast))
{
	$tc_schlr_no_id= $ftc_tc_serial_nolast['schlr_no_id'];
	$sel_adhoc_tc=mysql_query("SELECT `amt` FROM `adhoc_fee` WHERE `schlr_no_id`='".$tc_schlr_no_id."' && `fee_type`='11'");
	while($arr_adhoc_tc=mysql_fetch_array($sel_adhoc_tc))
	{
		$total_amount+=$arr_adhoc_tc['amt'];
	}
}
echo $total_amount;
?>
</td>
<td>
<?php
echo $num_tc=mysql_num_rows($sel_tc_serial_nolast);
?>
</td>
</tr>
</table>
</div>
</div></div></div></div>
<div class="row">
	<div class="col-md-6">
     <div class="portlet">
                       <div class="portlet-title">
                       <div class="caption">Class Summary</div>
                       </div>
                           <div class="portlet-body">
                                <div class="table-responsive">
<table class="table table-bordered">
<tr>
		<th colspan='8'>Hindi Medium</th>
	</tr>
<tr><th rowspan="2" style="text-align:center">Class</th><th colspan="3" style="text-align:center">Old</th><th colspan="3" style="text-align:center">New</th><th rowspan="2">Total</th></tr>
<tr>
<td><label>Boys</label></td><td><label>Girls</label></td><td><label>Total</label></td><td><label>Boys</label></td><td><label>Girls</label></td><td><label>Total</label></td>
</tr>
    <?php
	$old_boys=0;
	$old_girls=0;
	$old_total=0;
	$new_boys=0;
	$new_girls=0;
	$new_total=0;
	$new_and_old=0;
	
	$b=mysql_query("SELECT DISTINCT(`stream`.`strm`) ,`class`.`cls`,`class`.`sno`,`stream`.`sno` as strm_id
FROM
    `2017-2018`.`class` 
    INNER JOIN `2017-2018`.`sec_cls` 
        ON (`class`.`sno` = `sec_cls`.`cls`)
    INNER JOIN `2017-2018`.`stream` 
        ON (`stream`.`sno` = `sec_cls`.`strm`)
        order by class.sno asc");					            
	while($row=mysql_fetch_array($b))
	{ ?>
	   
	   <tr>
	   <td class="active">
	 <?php  echo $row['cls'];?>(<?php  echo $row['strm'];?>)	
	   </td>
       <?php
	   $count=0;
	   $b1=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Male' && `continoue_discontinoue_status`='0' && `strm`='".$row['strm_id']."' && `cls`='".$row['sno']."' && `md`='2'");
	   while($row1=mysql_fetch_array($b1))
	   {
			$adm =  $row1['adm'];
			$schlr_no_id =  $row1['id'];
			$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
			$num_tc=mysql_num_rows($sel_tc);
			if(empty($num_tc))
			{
				if($adm<$session)
				{
					$count++;
				}
			}
	   }
	   $old_boys+=$count;
	   ?>
	   <td class="success">
	   <?php echo $count;?>
       </td>
	  
		<?php
        $count2=0;
        $b2=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Female' && `continoue_discontinoue_status`='0' && `strm`='".$row['strm_id']."' &&  `cls`='".$row['sno']."' && `md`='2'");
        while($row1=mysql_fetch_array($b2))
        
        {
			$adm = $row1['adm'];
			$schlr_no_id =  $row1['id'];
			$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
			$num_tc=mysql_num_rows($sel_tc);
			if(empty($num_tc))
			{
				if($adm<$session)
				{
					 $count2++;
				}
			}
		}
        $old_girls+=$count2;
		   ?>
           
           <td class="success">
               <?php echo $count2;?>
               </td>
               
            <?php
			$count3=$count+$count2;
			$old_total+=$count3;
			?>
			<td class="danger">
               <?php echo $count3;?>
               </td>
             <?php
			 
			 $count4=0;
			 $b4=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Male' && `continoue_discontinoue_status`='0' && `strm`='".$row['strm_id']."' && `cls`='".$row['sno']."' && `md`='2'");
			 while($row1=mysql_fetch_array($b4))
			 {
				$adm =  $row1['adm'];
				$schlr_no_id =  $row1['id'];
				$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='$schlr_no_id' && `status`='1'");
				$num_tc=mysql_num_rows($sel_tc);
				if(empty($num_tc))
				{
					if($adm==$session)
					{
						$count4++;
					}
				}
			 }
			$new_boys+=$count4;
			?>
			<td class="success">
			   <?php echo $count4;?>
			   </td>
			
			  <?php
			 $count5=0;
			 
			 $b3=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Female' && `continoue_discontinoue_status`='0' && `strm`='".$row['strm_id']."' && `cls`='".$row['sno']."' && `md`='2'");
			while($row1=mysql_fetch_array($b3))
			{
				$adm =  $row1['adm'];
				$schlr_no_id =  $row1['id'];
				$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
				$num_tc=mysql_num_rows($sel_tc);
				if(empty($num_tc))
				{
					if($adm==$session)
					{
						$count5++;
					}
				}
			}
	  		 $new_girls+=$count5;
		   ?>
           <td class="success">
               <?php echo $count5;?>
               </td>
               
              <?php
			   $Count6=$count5;
			   ?>
             <td class="danger">
               <?php echo $count4+$count5;?>
               <?php $new_total+=$count4+$count5; ?>
               </td>    
                            
              <?php
			   $Count7=$count5+$count4+$count3;
			   ?>
             <td class="danger">
               <?php echo $Count7;?>
               <?php  $new_and_old+=$Count7; ?>
               </td>   
           
               </tr>
            
            <?php
              } 
			  
             ?>
             <tr>
			<td class="danger">
            Total
			</td>
            <td class="danger">
            <?php echo $old_boys; ?>
			</td>
             <td class="danger">
            <?php echo $old_girls; ?>
			</td>
             <td class="danger">
            <?php echo $old_total; ?>
			</td>
             <td class="danger">
            <?php echo $new_boys ?>
			</td>
             <td class="danger">
            <?php echo $new_girls ?>
			</td>
             <td class="danger">
            <?php echo $new_total ?>
			</td>
             <td class="active">
            <?php  echo $new_and_old; ?>
			</td>
			</tr>
            </tbody>
								</table><table class="table table-bordered">
<tr>
		<th colspan='8'>English Medium</th>
	</tr>
<tr><th rowspan="2" style="text-align:center">Class</th><th colspan="3" style="text-align:center">Old</th><th colspan="3" style="text-align:center">New</th><th rowspan="2">Total</th></tr>
<tr>
<td><label>Boys</label></td><td><label>Girls</label></td><td><label>Total</label></td><td><label>Boys</label></td><td><label>Girls</label></td><td><label>Total</label></td>
</tr>
    <?php
	$old_boys=0;
	$old_girls=0;
	$old_total=0;
	$new_boys=0;
	$new_girls=0;
	$new_total=0;
	$new_and_old=0;
	
	$b=mysql_query("SELECT DISTINCT(`stream`.`strm`) ,`class`.`cls`,`class`.`sno`,`stream`.`sno` as strm_id
FROM
    `2017-2018`.`class` 
    INNER JOIN `2017-2018`.`sec_cls` 
        ON (`class`.`sno` = `sec_cls`.`cls`)
    INNER JOIN `2017-2018`.`stream` 
        ON (`stream`.`sno` = `sec_cls`.`strm`) order by class.sno asc");					            
	while($row=mysql_fetch_array($b))
	{ ?>
	   
	   <tr>
	   <td class="active">
	 <?php  echo $row['cls'];?>(<?php  echo $row['strm'];?>)	
	   </td>
       <?php
	   $count=0;
	   $b1=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Male' && `continoue_discontinoue_status`='0' && `strm`='".$row['strm_id']."' &&  `cls`='".$row['sno']."' && `md`='1'");
	   while($row1=mysql_fetch_array($b1))
	   {
			$adm =  $row1['adm'];
			$schlr_no_id =  $row1['id'];
			$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
			$num_tc=mysql_num_rows($sel_tc);
			if(empty($num_tc))
			{
				if($adm<$session)
				{
					$count++;
				}
			}
	   }
	   $old_boys+=$count;
	   ?>
	   <td class="success">
	   <?php echo $count;?>
       </td>
	  
		<?php
        $count2=0;
        $b2=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Female' && `continoue_discontinoue_status`='0' && `strm`='".$row['strm_id']."' && `cls`='".$row['sno']."' && `md`='1'");
        while($row1=mysql_fetch_array($b2))
        
        {
			$adm = $row1['adm'];
			$schlr_no_id =  $row1['id'];
			$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
			$num_tc=mysql_num_rows($sel_tc);
			if(empty($num_tc))
			{
				if($adm<$session)
				{
					 $count2++;
				}
			}
		}
        $old_girls+=$count2;
		   ?>
           
           <td class="success">
               <?php echo $count2;?>
               </td>
               
            <?php
			$count3=$count+$count2;
			$old_total+=$count3;
			?>
			<td class="danger">
               <?php echo $count3;?>
               </td>
             <?php
			 
			 $count4=0;
			 $b4=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Male' && `continoue_discontinoue_status`='0' && `strm`='".$row['strm_id']."' && `cls`='".$row['sno']."' && `md`='1'");
			 while($row1=mysql_fetch_array($b4))
			 {
				$adm =  $row1['adm'];
				$schlr_no_id =  $row1['id'];
				$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='$schlr_no_id' && `status`='1'");
				$num_tc=mysql_num_rows($sel_tc);
				if(empty($num_tc))
				{
					if($adm==$session)
					{
						$count4++;
					}
				}
			 }
			$new_boys+=$count4;
			?>
			<td class="success">
			   <?php echo $count4;?>
			   </td>
			
			  <?php
			 $count5=0;
			 
			 $b3=mysql_query("select `id`,`adm` from `stdnt_reg` where `gndr`='Female' && `continoue_discontinoue_status`='0' && `strm`='".$row['strm_id']."' && `cls`='".$row['sno']."' && `md`='1'");
			while($row1=mysql_fetch_array($b3))
			{
				$adm =  $row1['adm'];
				$schlr_no_id =  $row1['id'];
				$sel_tc=mysql_query("select * from tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
				$num_tc=mysql_num_rows($sel_tc);
				if(empty($num_tc))
				{
					if($adm==$session)
					{
						$count5++;
					}
				}
			}
	  		 $new_girls+=$count5;
		   ?>
           <td class="success">
               <?php echo $count5;?>
               </td>
               
              <?php
			   $Count6=$count5;
			   ?>
             <td class="danger">
               <?php echo $count4+$count5;?>
               <?php $new_total+=$count4+$count5; ?>
               </td>    
                            
              <?php
			   $Count7=$count5+$count4+$count3;
			   ?>
             <td class="danger">
               <?php echo $Count7;?>
               <?php  $new_and_old+=$Count7; ?>
               </td>   
           
               </tr>
            
            <?php
              } 
			  
             ?>
             <tr>
			<td class="danger">
            Total
			</td>
            <td class="danger">
            <?php echo $old_boys; ?>
			</td>
             <td class="danger">
            <?php echo $old_girls; ?>
			</td>
             <td class="danger">
            <?php echo $old_total; ?>
			</td>
             <td class="danger">
            <?php echo $new_boys ?>
			</td>
             <td class="danger">
            <?php echo $new_girls ?>
			</td>
             <td class="danger">
            <?php echo $new_total ?>
			</td>
             <td class="active">
            <?php  echo $new_and_old; ?>
			</td>
			</tr>
            </tbody>
								</table>                               													
</div>
</div></div></div>
<div class="col-md-6">
 <div class="portlet">
   <div class="portlet-title">
  	 <div class="caption">Discontinued Students Status</div>
   </div>
       <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered">
				<tr>
					<th colspan='4'>Hindi Medium</th>
				</tr>
                <tr><th>Class</th><th>Temp.</th><th>Perm.</th><th>Total</th></tr>
                <?php
                $b=mysql_query("SELECT DISTINCT(`stream`.`strm`) ,`class`.`cls`,`class`.`sno`,`stream`.`sno` as strm_id
FROM
    `2017-2018`.`class` 
    INNER JOIN `2017-2018`.`sec_cls` 
        ON (`class`.`sno` = `sec_cls`.`cls`)
    INNER JOIN `2017-2018`.`stream` 
        ON (`stream`.`sno` = `sec_cls`.`strm`) order by class.sno asc");					            
				while($row=mysql_fetch_array($b))
				{ 
                $sel1=mysql_query("select `continoue_discontinoue_date` from stdnt_reg where `continoue_discontinoue_status`='1' && `strm`='".$row['strm_id']."' && `cls`='".$row['sno']."' && `md`='2'");
                $num1=mysql_num_rows($sel1);
				$perm+=$num1;
                ?>
                  <tr>
				   <td class="active">
				  <?php  echo $row['cls'];?>(<?php  echo $row['strm'];?>)	
				   </td><td  class="success"></td><td  class="success"> <?php   echo $num1;?></td><td class="danger"> <?php   echo $num1;?></td>
                   </tr>
                   <?php
				}
				  ?>
                <tr>
                <td class="danger">Total</td><td class="danger"></td><td class="danger"><?php   echo $perm;?></td><td class="active"><?php   echo $perm;?></td></tr>
                </table>
				<table class="table table-bordered">
				<tr>
					<th colspan='4'>English Medium</th>
				</tr>
                <tr><th>Class</th><th>Temp.</th><th>Perm.</th><th>Total</th></tr>
                <?php
                $b=mysql_query("SELECT DISTINCT(`stream`.`strm`) ,`class`.`cls`,`class`.`sno`,`stream`.`sno` as strm_id
FROM
    `2017-2018`.`class` 
    INNER JOIN `2017-2018`.`sec_cls` 
        ON (`class`.`sno` = `sec_cls`.`cls`)
    INNER JOIN `2017-2018`.`stream` 
        ON (`stream`.`sno` = `sec_cls`.`strm`) order by class.sno asc");					            
				while($row=mysql_fetch_array($b))
				{ 
                $sel1=mysql_query("select `continoue_discontinoue_date` from stdnt_reg where `continoue_discontinoue_status`='1' && `strm`='".$row['strm_id']."' && `cls`='".$row['sno']."' && `md`='1'");
                $num1=mysql_num_rows($sel1);
				$perm+=$num1;
                ?>
                  <tr>
				   <td class="active">
				 <?php  echo $row['cls'];?>(<?php  echo $row['strm'];?>)
				   </td><td  class="success"></td><td  class="success"> <?php   echo $num1;?></td><td class="danger"> <?php   echo $num1;?></td>
                   </tr>
                   <?php
				}
				  ?>
                <tr>
                <td class="danger">Total</td><td class="danger"></td><td class="danger"><?php   echo $perm;?></td><td class="active"><?php   echo $perm;?></td></tr>
                </table>
                </div>
               </div>
            </div>
         </div>
     </div>
<div class="row">
   <div class="col-md-6">
    <div class="portlet">
                       <div class="portlet-title">
                       <div class="caption">Bus</div>
                       </div>
                           <div class="portlet-body">
                                <div class="table-responsive">	
<table class="table table-bordered">
<tr>
	<th colspan='2'>Hindi Medium</th>
</tr>
<tr><th>Class</th><th>Count</th></tr>
  <?php
  $s=0;
 
	$b20=mysql_query("SELECT DISTINCT(`stream`.`strm`) ,`class`.`cls`,`class`.`sno`,`stream`.`sno` as strm_id
FROM
    `2017-2018`.`class` 
    INNER JOIN `2017-2018`.`sec_cls` 
        ON (`class`.`sno` = `sec_cls`.`cls`)
    INNER JOIN `2017-2018`.`stream` 
        ON (`stream`.`sno` = `sec_cls`.`strm`) order by class.sno asc");					            
            while($row=mysql_fetch_array($b20))
            { ?>
               
               <tr>
               <td class="active">
             <?php  echo $row['cls'];?>(<?php  echo $row['strm'];?>)	
               </td>
              
             <?php
		   $count=0;
		   $num_rows=0;
					
		   $b2=mysql_query("select `id`,`bs_fc` from `stdnt_reg` where bs_fc='yes'  && `cls`='".$row['sno']."' && `strm`='".$row['strm_id']."' && `continoue_discontinoue_status`='0' && `md`='2'");
		//	$num_rows=mysql_num_rows($b2);
			while($row1=mysql_fetch_array($b2))
			 {
			    $schlr_no_id =  $row1['id'];
				$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='$schlr_no_id' && `status`='1'");
				$num_tc=mysql_num_rows($sel_tc);
				if(empty($num_tc))
				{
					$num_rows++;
				}
			 }
		   ?>
           
           <td class="success">
           <?php
		     $s = $num_rows+$s;
		   ?>
               <?php echo $num_rows; ?>
        </td></tr>
            <?php   
			} 
			?>
			<tr>
			<td class="danger">
            Total
			</td>
            <td class="active">
            <?php echo $s; ?>
			</td>
			</tr>
               
             
               
              
            </table>
			
</div>
</div>
</div>		
</div>
<div class="col-md-6">
    <div class="portlet">
                       <div class="portlet-title">
                       <div class="caption">Bus</div>
                       </div>
                           <div class="portlet-body">
                                <div class="table-responsive">	
<table class="table table-bordered">
<tr>
	<th colspan='2'>English Medium</th>
</tr>
<tr><th>Class</th><th>Count</th></tr>
  <?php
  $s=0;
 
	$b20=mysql_query("SELECT DISTINCT(`stream`.`strm`) ,`class`.`cls`,`class`.`sno`,`stream`.`sno` as strm_id
FROM
    `2017-2018`.`class` 
    INNER JOIN `2017-2018`.`sec_cls` 
        ON (`class`.`sno` = `sec_cls`.`cls`)
    INNER JOIN `2017-2018`.`stream` 
        ON (`stream`.`sno` = `sec_cls`.`strm`) order by class.sno asc");					            
            while($row=mysql_fetch_array($b20))
            { ?>
               
               <tr>
               <td class="active">
             <?php  echo $row['cls'];?>(<?php  echo $row['strm'];?>)	
               </td>
              
             <?php
		   $count=0;
		   $num_rows=0;
					
		   $b2=mysql_query("select `id`,`bs_fc` from `stdnt_reg` where bs_fc='yes'  && `cls`='".$row['sno']."' && `continoue_discontinoue_status`='0' && `strm`='".$row['strm_id']."' && `md`='1'");
		//	$num_rows=mysql_num_rows($b2);
			while($row1=mysql_fetch_array($b2))
			 {
			    $schlr_no_id =  $row1['id'];
				$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='$schlr_no_id' && `status`='1'");
				$num_tc=mysql_num_rows($sel_tc);
				if(empty($num_tc))
				{
					$num_rows++;
				}
			 }
		   ?>
           
           <td class="success">
           <?php
		     $s = $num_rows+$s;
		   ?>
               <?php echo $num_rows; ?>
        </td></tr>
            <?php   
			} 
			?>
			<tr>
			<td class="danger">
            Total
			</td>
            <td class="active">
            <?php echo $s; ?>
			</td>
			</tr>
               
             
               
              
            </table>
			
</div>
</div>
</div>		
</div>




</div></div>

<div class="tab-pane fade" id="tab_1_2">																		
	<div class="row">
		<div class="col-md-12">		
        <div class="portlet">
                       <div class="portlet-title">
                       <div class="caption">Hostel</div>
                       </div>
                           <div class="portlet-body">
                                <div class='row'>
									<div class='col-md-6'>
										<div class="table-responsive">			
                                    <table class="table table-bordered"  border="1px" width="60%">
									<tr>
										<th colspan='2'>Hindi Medium</th>
									</tr>
                                    <tr><th>Class</th><th>Count</th></tr>
                                    <tr>
                                     <?php
                                        $b=mysql_query("SELECT DISTINCT(`stream`.`strm`) ,`class`.`cls`,`class`.`sno`,`stream`.`sno` as strm_id
FROM
    `2017-2018`.`class` 
    INNER JOIN `2017-2018`.`sec_cls` 
        ON (`class`.`sno` = `sec_cls`.`cls`)
    INNER JOIN `2017-2018`.`stream` 
        ON (`stream`.`sno` = `sec_cls`.`strm`) order by class.sno asc");					            
                                                while($row=mysql_fetch_array($b))
                                                { ?>
                                                   
                                                   <tr>
                                                   <td class="active">
                                                <?php  echo $row['cls'];?>(<?php  echo $row['strm'];?>)	
                                                   </td>
                                              <?php
                                               $count=0;
                                               $b2=mysql_query("select `hstl` from `stdnt_reg` where `hstl`='yes'  && `cls`='".$row['sno']."' && `strm`='".$row['strm_id']."' && `md`='2'");
                                                $num_rows=mysql_num_rows($b2);
                                                 ?>
                                               
                                               <td class="success">
                                                   <?php echo $num_rows;
                                                    
                                                    $total=$total+$num_rows;
                                                    ?>
                                                
                                                   </td></tr>
                                                 <?php
                                                }
                                                ?>
                                                   
                                                
                                                
                                    <tr>
                                    <td  class="danger">Total</td>
                                    <td  class="danger">
                                    <?php
                                    
                                    echo $total;
                                    ?>
                                    </td></tr>
                                    </table>	
								</div>
									
									</div>
									<div class='col-md-6'>
									
										<div class="table-responsive">			
                                    <table class="table table-bordered"  border="1px" width="60%">
									<tr>
										<th colspan='2'>English Medium</th>
									</tr>
                                    <tr><th>Class</th><th>Count</th></tr>
                                    <tr>
                                     <?php
                                        $b=mysql_query("SELECT DISTINCT(`stream`.`strm`) ,`class`.`cls`,`class`.`sno`,`stream`.`sno` as strm_id
FROM
    `2017-2018`.`class` 
    INNER JOIN `2017-2018`.`sec_cls` 
        ON (`class`.`sno` = `sec_cls`.`cls`)
    INNER JOIN `2017-2018`.`stream` 
        ON (`stream`.`sno` = `sec_cls`.`strm`) order by class.sno asc");					            
                                                while($row=mysql_fetch_array($b))
                                                { ?>
                                                   
                                                   <tr>
                                                   <td class="active">
                                                  <?php  echo $row['cls'];?>(<?php  echo $row['strm'];?>)		
                                                   </td>
                                              <?php
                                               $count=0;
                                               $b2=mysql_query("select `hstl` from `stdnt_reg` where `hstl`='yes'  && `cls`='".$row['sno']."' && `strm`='".$row['strm_id']."' && `md`='1'");
                                                $num_rows=mysql_num_rows($b2);
                                                 ?>
                                               
                                               <td class="success">
                                                   <?php echo $num_rows;
                                                    
                                                    $total=$total+$num_rows;
                                                    ?>
                                                
                                                   </td></tr>
                                                 <?php
                                                }
                                                ?>
                                                   
                                                
                                                
                                    <tr>
                                    <td  class="danger">Total</td>
                                    <td  class="danger">
                                    <?php
                                    
                                    echo $total;
                                    ?>
                                    </td></tr>
                                    </table>	
								</div>
									
									</div>
								</div>
								
								
 						</div>																				
				</div>
			</div>
		</div>
</div>
     

<div class="tab-pane fade" id="tab_1_3">
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
 <script>
$(document).ready(function() {
$(window).bind("load", function() {
  $('#tab_1_3').html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('account.php');
         });
 });
</script>
</div>
                        
                        
                        
			
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