<?php
require_once("conn.php");
$dp1=$_GET['dp1'];
$dp2=$_GET['dp2'];
$d1=date("d-M-Y", strtotime($dp1));
$d2=date("d-M-Y", strtotime($dp2));
$ndt=date("Y-m-d", strtotime($dp1));
$cdt=date("Y-m-d", strtotime($dp2));

$currentTime = strtotime($ndt);
$endTime = strtotime($cdt);

$result = array();
while ($currentTime <= $endTime) {
if (date('N', $currentTime) < 8) {
$result[] = date('Y-m-d', $currentTime);
}
$currentTime = strtotime('+1 day', $currentTime);
}
$total_amount=0;
$grand_total=0;;
?>
</br>
<div class="note note-success">
						<p>
							 <?php echo $d1 ." To ". $d2;?>
						</p>
					</div>


<?php
$i=0;

foreach($result as $value)
{
 $date=$value;

$b=mysql_query("select * from `annl_fee` where `dat`='$date' ORDER BY `recpt_no` ASC");
while($row=mysql_fetch_array($b))
{
	$rn=$row['recpt_no'];
	$schlr_no_id=$row['schlr_no_id'];
	$fee_dp=$row['fee_dp'];
	$total_amount+=$fee_dp;
	$grand_total+=$fee_dp;
	if($i==0)
	{
	?>
    
    <div style="width:96%; margin-top:2%">
<h4><strong>General Fee</strong></h4>
<table  class="table table-bordered" style="width:100%;">
<thead>
    <tr>
        <th class="active">S. No.</th>
        <th class="success" >Recept No.</th>
        <th class="danger">Scholar no.</th>
        <th class="active">Name</th>
        <th class="warning">Class</th>
        <th class="success">Amount Received</th>
        
    </tr>
</thead>
	<?php
	}
?>
   <tr>
       <td class="active">
       <?php
	 echo  ++$i;
	   ?>
       </td>
	   
       <td class="success"><?php echo $rn; ?></td>
       

           
           <?php
                 $sel_st_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id' ");
                 $row_scho=mysql_fetch_array($sel_st_reg);
                    
                 $fname=$row_scho['fname'];
				 $mname=$row_scho['mname'];
				 $lname=$row_scho['lname'];
				  $f_name=$row_scho['f_name'];
				 $class=$row_scho['cls'];
				 $schlr_no=$row_scho['schlr_no'];
            ?>
             <td class="danger"><?php echo $schlr_no; ?></td>
            <td class="active">
            <?php echo $fname." ".$mname." ".$lname." S/O ".$f_name; ?>
            </td>
          
           <?php
		   	$sel_class=mysql_query("select * from `class` where sno='$class' ");	
			$row_class=mysql_fetch_array($sel_class);				            

		   ?>
            <td class="warning"><?php echo $row_class['cls'];?>	</td>
       
         <td class="success"><?php echo $fee_dp ?></td>     
           

             </tr>                  
			
           <?php
			  }
}
		  
	if($i>0)
	{
	 ?>		 
   <tr>
        <th class="danger" colspan="5">Total Amount</th>
        <th class="danger" colspan=""><?php echo $total_amount; ?></th>
        </tr>       
</table>
</div>
<?php
	}
$i=0;
$total_amount=0;
foreach($result as $value)
{
 $date=$value;
$b=mysql_query("select * from `mnth_fee_1` where `dat`='$date' ORDER BY `recpt_no` ASC");
while($row=mysql_fetch_array($b))
{
	$rn=$row['recpt_no'];
	$schlr_no_id=$row['schlr_no_id'];
	$fee_dp=$row['fee_dp'];
	$total_amount+=$fee_dp;
	$grand_total+=$fee_dp;
	
	if($i==0)
	{
		?>
        <div style="width:96%; margin-top:2%">
<h4><strong>Monthly Fee</strong></h4>
<table  class="table table-bordered" style="width:100%;">
<thead>
    <tr>
        <th class="active">S. No.</th>
        <th class="success" >Recept No.</th>
        <th class="danger">Scholar no.</th>
        <th class="active">Name</th>
        <th class="warning">Class</th>
        <th class="success">Amount Received</th>
        
    </tr>
</thead>
	 <?php
	}
?>
   <tr>
       <td class="active">
       <?php
	 echo  ++$i;
	   ?>
       </td>
	   
       <td class="success"><?php echo $rn; ?></td>
       

           
           <?php
                 $sel_st_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id' ");
                 $row_scho=mysql_fetch_array($sel_st_reg);
                    
                 $fname=$row_scho['fname'];
				 $mname=$row_scho['mname'];
				 $lname=$row_scho['lname'];
				  $f_name=$row_scho['f_name'];
				 $class=$row_scho['cls'];
				 $schlr_no=$row_scho['schlr_no'];
            ?>
             <td class="danger"><?php echo $schlr_no; ?></td>
            <td class="active">
            <?php echo $fname." ".$mname." ".$lname." S/O ".$f_name; ?>
            </td>
          
           <?php
		   	$sel_class=mysql_query("select * from `class` where sno='$class' ");	
			$row_class=mysql_fetch_array($sel_class);				            

		   ?>
            <td class="warning"><?php echo $row_class['cls'];?>	</td>
       
         <td class="success"><?php echo $fee_dp ?></td>     
           

                
      </tr>                  
			
           <?php
			  }
}
$b=mysql_query("select * from `old_fee_submit` where `date`='$date' && `fee_type`='1' ORDER BY `rcpt_no` ASC");
while($row=mysql_fetch_array($b))
{
	$rn=$row['rcpt_no'];
	$schlr_no_id=$row['schlr_no_id'];
	$fee_dp=$row['fee_dp'];
	$total_amount+=$fee_dp;
	$grand_total+=$fee_dp;
	
	if($i==0)
	{
		?>
        <div style="width:96%; margin-top:2%">
<h4><strong>Monthly Fee</strong></h4>
<table  class="table table-bordered" style="width:100%;">
<thead>
    <tr>
        <th class="active">S. No.</th>
        <th class="success" >Recept No.</th>
        <th class="danger">Scholar no.</th>
        <th class="active">Name</th>
        <th class="warning">Class</th>
        <th class="success">Amount Received</th>
        
    </tr>
</thead>
	 <?php
	}
?>
   <tr>
       <td class="active">
       <?php
	 echo  ++$i;
	   ?>
       </td>
	   
       <td class="success"><?php echo $rn; ?></td>
       

           
           <?php
                 $sel_st_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id' ");
                 $row_scho=mysql_fetch_array($sel_st_reg);
                    
                 $fname=$row_scho['fname'];
				 $mname=$row_scho['mname'];
				 $lname=$row_scho['lname'];
				  $f_name=$row_scho['f_name'];
				 $class=$row_scho['cls'];
				 $schlr_no=$row_scho['schlr_no'];
            ?>
             <td class="danger"><?php echo $schlr_no; ?></td>
            <td class="active">
            <?php echo $fname." ".$mname." ".$lname." S/O ".$f_name; ?>
            </td>
          
           <?php
		   	$sel_class=mysql_query("select * from `class` where sno='$class' ");	
			$row_class=mysql_fetch_array($sel_class);				            

		   ?>
            <td class="warning"><?php echo $row_class['cls'];?>	</td>
       
         <td class="success"><?php echo $fee_dp ?></td>     
           

                
      </tr>                  
			
           <?php
			  }

	if($i>0)
	{	
		 ?>	
    <tr>
        <th class="danger" colspan="5">Total Amount</th>
        <th class="danger" colspan=""><?php echo $total_amount; ?></th>
        </tr>  
</table>
</div>
<?php
	}

$i=0;
$total_amount=0;
foreach($result as $value)
{
 $date=$value;
$b=mysql_query("select * from `hstl_fee` where `dat`='$date' ORDER BY `rcpt_no` ASC");
while($row=mysql_fetch_array($b))
{
	$rn=$row['rcpt_no'];
	$schlr_no_id=$row['schlr_no_id'];
	$fee_dp=$row['deposit'];
	$total_amount+=$fee_dp;
	$grand_total+=$fee_dp;
	if($i==0)
	{
		?>
        <div style="width:96%; margin-top:2%">
<h4><strong>Hostle Fee</strong></h4>
<table  class="table table-bordered" style="width:100%;">
<thead>
    <tr>
        <th class="active">S. No.</th>
        <th class="success" >Recept No.</th>
        <th class="danger">Scholar no.</th>
        <th class="active">Name</th>
        <th class="warning">Class</th>
        <th class="success">Amount Received</th>
        
    </tr>
</thead>
        <?php
	}
?>
   <tr>
       <td class="active">
       <?php
	 echo  ++$i;
	   ?>
       </td>
	   
       <td class="success"><?php echo $rn; ?></td>
       

           
           <?php
                 $sel_st_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id' ");
                 $row_scho=mysql_fetch_array($sel_st_reg);
                    
                 $fname=$row_scho['fname'];
				 $mname=$row_scho['mname'];
				 $lname=$row_scho['lname'];
				  $f_name=$row_scho['f_name'];
				 $class=$row_scho['cls'];
				 $schlr_no=$row_scho['schlr_no'];
            ?>
             <td class="danger"><?php echo $schlr_no; ?></td>
            <td class="active">
            <?php echo $fname." ".$mname." ".$lname." S/O ".$f_name; ?>
            </td>
          
           <?php
		   	$sel_class=mysql_query("select * from `class` where sno='$class' ");	
			$row_class=mysql_fetch_array($sel_class);				            

		   ?>
            <td class="warning"><?php echo $row_class['cls'];?>	</td>
       
         <td class="success"><?php echo $fee_dp ?></td>     
           

             </tr>                  
			
           <?php
}
$b=mysql_query("select * from `old_fee_submit` where `date`='$date' && `fee_type`='2' ORDER BY `rcpt_no` ASC");
while($row=mysql_fetch_array($b))
{
	$rn=$row['rcpt_no'];
	$schlr_no_id=$row['schlr_no_id'];
	$fee_dp=$row['fee_dp'];
	$total_amount+=$fee_dp;
	$grand_total+=$fee_dp;
	if($i==0)
	{
		?>
        <div style="width:96%; margin-top:2%">
<h4><strong>Hostle Fee</strong></h4>
<table  class="table table-bordered" style="width:100%;">
<thead>
    <tr>
        <th class="active">S. No.</th>
        <th class="success" >Recept No.</th>
        <th class="danger">Scholar no.</th>
        <th class="active">Name</th>
        <th class="warning">Class</th>
        <th class="success">Amount Received</th>
        
    </tr>
</thead>
        <?php
	}
?>
   <tr>
       <td class="active">
       <?php
	 echo  ++$i;
	   ?>
       </td>
	   
       <td class="success"><?php echo $rn; ?></td>
       

           
           <?php
                 $sel_st_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id' ");
                 $row_scho=mysql_fetch_array($sel_st_reg);
                    
                 $fname=$row_scho['fname'];
				 $mname=$row_scho['mname'];
				 $lname=$row_scho['lname'];
				  $f_name=$row_scho['f_name'];
				 $class=$row_scho['cls'];
				 $schlr_no=$row_scho['schlr_no'];
            ?>
             <td class="danger"><?php echo $schlr_no; ?></td>
            <td class="active">
            <?php echo $fname." ".$mname." ".$lname." S/O ".$f_name; ?>
            </td>
          
           <?php
		   	$sel_class=mysql_query("select * from `class` where sno='$class' ");	
			$row_class=mysql_fetch_array($sel_class);				            

		   ?>
            <td class="warning"><?php echo $row_class['cls'];?>	</td>
       
         <td class="success"><?php echo $fee_dp ?></td>     
           

             </tr>                  
			
           <?php
}
	}
	if($i>0)
	{
	?>	
   <tr>
        <th class="danger" colspan="5">Total Amount</th>
        <th class="danger" colspan=""><?php echo $total_amount; ?></th>
        </tr>  
</table>
</div>
<?php
	}
	
$i=0;
$total_amount=0;
foreach($result as $value)
{
 $date=$value;
$b=mysql_query("select * from `cautn_fee` where `date`='$date' ORDER BY `rcpt_no` ASC");
while($row=mysql_fetch_array($b))
{
	$rn=$row['rcpt_no'];
	$schlr_no_id=$row['schlr_no_id'];
	$fee_dp=$row['amt'];
	$total_amount+=$fee_dp;
	$grand_total+=$fee_dp;
	if($i==0)
	{
		?>
        <div style="width:96%; margin-top:2%">
<h4><strong>Caution Fee</strong></h4>
<table  class="table table-bordered" style="width:100%;">
<thead>
    <tr>
        <th class="active">S. No.</th>
        <th class="success" >Recept No.</th>
        <th class="danger">Scholar no.</th>
        <th class="active">Name</th>
        <th class="warning">Class</th>
        <th class="success">Amount Received</th>
        
    </tr>
</thead>
        <?php
	}
?>
   <tr>
       <td class="active">
       <?php
	 echo  ++$i;
	   ?>
       </td>
	   
       <td class="success"><?php echo $rn; ?></td>
       

           
           <?php
                 $sel_st_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id' ");
                 $row_scho=mysql_fetch_array($sel_st_reg);
                    
                 $fname=$row_scho['fname'];
				 $mname=$row_scho['mname'];
				 $lname=$row_scho['lname'];
				  $f_name=$row_scho['f_name'];
				 $class=$row_scho['cls'];
				 $schlr_no=$row_scho['schlr_no'];
            ?>
             <td class="danger"><?php echo $schlr_no; ?></td>
            <td class="active">
            <?php echo $fname." ".$mname." ".$lname." S/O ".$f_name; ?>
            </td>
          
           <?php
		   	$sel_class=mysql_query("select * from `class` where sno='$class' ");	
			$row_class=mysql_fetch_array($sel_class);				            

		   ?>
            <td class="warning"><?php echo $row_class['cls'];?>	</td>
       
         <td class="success"><?php echo $fee_dp ?></td>     
           

             </tr>                  
			
           <?php
}
			  }
	if($i>0)
	{
		   ?>	
   <tr>
        <th class="danger" colspan="5">Total Amount</th>
        <th class="danger" colspan=""><?php echo $total_amount; ?></th>
        </tr>  
</table>
</div>
<?php
	}
$i=0;
$total_amount=0;
foreach($result as $value)
{
 $date=$value;
$b=mysql_query("select * from `adhoc_fee` where `date`='$date' ORDER BY `rcpt_no` ASC");
while($row=mysql_fetch_array($b))
{
	$rn=$row['rcpt_no'];
	$schlr_no_id=$row['schlr_no_id'];
	$fee_dp=$row['amt'];
	$total_amount+=$fee_dp;
	$grand_total+=$fee_dp;
	if($i==0)
	{
		?>
        <div style="width:96%; margin-top:2%">
        <h4><strong>Adhoc Fee</strong></h4>
        <table  class="table table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th class="active">S. No.</th>
                <th class="success" >Recept No.</th>
                <th class="danger">Scholar no.</th>
                <th class="active">Name</th>
                <th class="warning">Class</th>
                <th class="success">Amount Received</th>
                
            </tr>
        </thead>
        <?php
	}
?>
   <tr>
       <td class="active">
       <?php
	 echo  ++$i;
	   ?>
       </td>
	   
       <td class="success"><?php echo $rn; ?></td>
       

           
           <?php
                 $sel_st_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id' ");
                 $row_scho=mysql_fetch_array($sel_st_reg);
                    
                 $fname=$row_scho['fname'];
				 $mname=$row_scho['mname'];
				 $lname=$row_scho['lname'];
				  $f_name=$row_scho['f_name'];
				 $class=$row_scho['cls'];
				 $schlr_no=$row_scho['schlr_no'];
            ?>
             <td class="danger"><?php echo $schlr_no; ?></td>
            <td class="active">
            <?php echo $fname." ".$mname." ".$lname." S/O ".$f_name; ?>
            </td>
          
           <?php
		   	$sel_class=mysql_query("select * from `class` where sno='$class' ");	
			$row_class=mysql_fetch_array($sel_class);				            

		   ?>
            <td class="warning"><?php echo $row_class['cls'];?>	</td>
       
         <td class="success"><?php echo $fee_dp ?></td>     
           

             </tr>                  
			
           <?php
}
			  }
	if($i>0)
	{
		   ?>	
   <tr>
        <th class="danger" colspan="5">Total Amount</th>
        <th class="danger" colspan=""><?php echo $total_amount; ?></th>
        </tr>  
</table>
</div>
<?php
	}
$i=0;
$total_amount=0;
foreach($result as $value)
{
 $date=$value;
$b=mysql_query("select * from `nonscholler_fee` where `date`='$date' ORDER BY `rcpt_no` ASC");
while($row=mysql_fetch_array($b))
{
	$rn=$row['rcpt_no'];
	$detail=$row['detail'];
	$fee_dp=$row['amt'];
	$total_amount+=$fee_dp;
	$grand_total+=$fee_dp;
	if($i==0)
	{
?>
    <div style="width:96%; margin-top:2%">
    <h4><strong>Nonscholar Fee</strong></h4>
    <table  class="table table-bordered" style="width:100%;">
    <thead>
        <tr>
            <th class="active">S. No.</th>
            <th class="success" >Recept No.</th>
            <th class="danger">Detail</th>
           
            <th class="success">Amount Received</th>
            
        </tr>
    </thead>
    <?php
	}
	?>
   <tr>
       <td class="active">
       <?php
	 echo  ++$i;
	   ?>
       </td>
	   
       <td class="success"><?php echo $rn; ?></td>
       

           
           <?php
              
            ?>
             <td class="danger"><?php echo $detail; ?></td>
           
          
          
       
         <td class="success"><?php echo $fee_dp ?></td>     
           

             </tr>                  
			
           <?php
}
			  }
	if($i>0)
	{
		   ?>		
   <tr>
        <th class="danger" colspan="3">Total Amount</th>
        <th class="danger" colspan=""><?php echo $total_amount; ?></th>
        </tr>  
</table>
</div>
<?php
	}
	?>
<div style="width:96%; margin-top:2%">
<h4><strong>Grand Total</strong></h4>
<table  class="table table-bordered" style="width:100%;">
<thead>
    <tr>
        <th class="danger" style="width:80%">Grand Total</th><th class="danger"> <?php echo $grand_total; ?></th>
        </tr>
        </thead>
        </table>
</div>