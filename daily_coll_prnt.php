<?php
require_once("conn.php");
@$from=$_GET['from'];
@$to=$_GET['to'];
@$ndt = date("Y-m-d", strtotime($from));
@$cdt = date("Y-m-d", strtotime($to));

?>
<link href="assets/css/print_page.css">

            <?php
			$receipt_no_gen1=0;$receipt_no_gen2=0;$gen_no=0;
			$receipt_no_mnth1=0;$receipt_no_mnth1=0;$mnth_no=0;
			$receipt_no_hstl1=0;$receipt_no_hstl2=0;$hstl_no=0;
			$receipt_no_cautn1=0;$receipt_no_cautn2=0;$cautn_no=0;
            if($from!=NULL && $to !=NULL)
            {
            $from=date("d-M-Y", strtotime($from));
            $to=date("d-M-Y", strtotime($to));
            ?>
            <table class="table">
            <tr>
            <td style="border-top:none" align="center"><label><h3 > Daily Collection</h3></label></td>
            </tr>
            <tr>
            <td align="center"><label><?php echo $from; ?> to <?php echo $to;?></label></td>
            </tr>
            </table>
            <?php
            // Convert to UNIX timestamps
            $currentTime = strtotime($ndt);
            $endTime = strtotime($cdt);
            
            $result = array();
            while ($currentTime <= $endTime) {
            if (date('N', $currentTime) < 8) {
            $result[] = date('Y-m-d', $currentTime);
            }
            $currentTime = strtotime('+1 day', $currentTime);
            }
            foreach($result as $value)
            {
            $i=$value;
            $j=0;
            $k=0;
            $l=0;
			$m=0;
			$n=0;$p=0;
            $temp=0;
            $temp1=0; 
			$temp6=0;
            $temp2=0;
			 $temp3=0;
			 $temp4=0;
			 $temp5=0;
            $amt1=0;
            $dep1=0;
            $dep2=0;
			$dep_ad=0;
			$r_non=0;
			$r_ad=0;
			$r_ad1=0;
			$r_non1=0;
			$r222=0;
			$r22=0;
            $dat1=date("d-M-Y", strtotime($i));
			$recpt = array();
            $sel1=mysql_query("select * from annl_fee where dat='$i' order by `recpt_no` DESC");
			
            while($arr1=mysql_fetch_array($sel1))
            { //print_r($arr1);
            $j++;
        	 $rn=$arr1['recpt_no'];
			 
            if($rn !=0)
            {
             $r3=$rn;
            }
            if($rn !=0 && $temp2==0)
            {
            $temp2++;
             $r33=$rn;
            }
            $amt=$arr1['fee_dp'];
            @$amt1=$amt1+$amt;
            }
			
		
			
            $sel2=mysql_query("select * from mnth_fee_1 where dat='$i'");
            while($arr2=mysql_fetch_array($sel2))
            { 
		
				$k++;
				$rec=$arr2['recpt_no'];
				$cncssn=$arr2['cncssn'];
				$fyn=$arr2['fyn'];
				if($rec !=0)
				{
					$r2=$rec;
				}
				if($rec !=0 && $temp1==0)
				{
					$temp1++;
					$r22=$rec;
				}
				$dep=0;
				
				$sel_m2=mysql_query("select * from `mnth_fee2` where `mnth_fee1_sno`='".$arr2['sno']."' && `left`='0'");
				while($arr_m2=mysql_fetch_array($sel_m2))
				{ 
					$dep+=$arr_m2['fee'];
				}
				
				$tot=($dep+$fyn)-$cncssn;
				@$dep1=$dep1+$tot;
            }
			
				$sel2=mysql_query("select * from `old_fee_submit` where `date`='$i' && `fee_type`='1'");
            while($arr2=mysql_fetch_array($sel2))
            {  
				$k++;
				
				$rec=$arr2['rcpt_no'];
				
				//$recpt[]=$rec;
				
				if($rec !=0)
				{
					$r23=$rec;
				}
				if($rec !=0 && $temp6==0)
				{
					$temp6++;
					$r222=$rec;
				}
				$dep=0;
				
				
					$dep+=$arr2['fee_dp'];
				
				
				$tot=$dep;
				@$dep1=$dep1+$tot;
				@$dep21=$dep1+$tot;
            } 
			
            $sel3=mysql_query("select * from hstl_fee where dat='$i'");
            while($arr2=mysql_fetch_array($sel3))
            {
            $l++;
            $rec1=$arr2['rcpt_no'];
            if($rec1 !=0)
            {
            $r=$rec1;
            }
            if($rec1 !=0 && $temp==0)
            {
            $temp++;
            $r1=$rec1;
            }
            $depp=$arr2['deposit'];
            @$dep2=$dep2+$depp;
            }
			
			$sel3=mysql_query("select * from `old_fee_submit` where `date`='$i' && `fee_type`='2'");
            while($arr2=mysql_fetch_array($sel3))
            {
            $l++;
            $rec1=$arr2['rcpt_no'];
            if($rec1 !=0)
            {
            $r=$rec1;
            }
            if($rec1 !=0 && $temp==0)
            {
            $temp++;
            $r1=$rec1;
            }
            $depp=$arr2['fee_dp'];
            @$dep2=$dep2+$depp;
            }
			$sel3=mysql_query("select * from adhoc_fee where date='$i'");
            while($arr2=mysql_fetch_array($sel3))
            {
            $m++;
            $rec_ad=$arr2['rcpt_no'];
            if($rec_ad !=0)
            {
            $r_ad=$rec_ad;
            }
            if($rec_ad !=0 && $temp3==0)
            {
            $temp3++;
           	$r_ad1=$rec_ad;
            }
            $depp_ad=$arr2['amt'];
            @$dep_ad=$dep_ad+$depp_ad;
            }
			$sel3=mysql_query("select * from `nonscholler_fee` where date='$i'");
            while($arr2=mysql_fetch_array($sel3))
            {
            $p++;
            $rec_non=$arr2['rcpt_no'];
            if($rec_non !=0)
            {
            $r_non=$rec_non;
            }
            if($rec_non !=0 && $temp5==0)
            {
            $temp5++;
           	$r_non1=$rec_non;
            }
            $depp_ad=$arr2['amt'];
            @$dep_ad=$dep_ad+$depp_ad;
            }
			 $sel3=mysql_query("select * from cautn_fee where date='$i'");
            while($arr2=mysql_fetch_array($sel3))
            {
            $n++;
            $rec_ct=$arr2['rcpt_no'];
            if($rec_ct !=0)
            {
            $r_ct=$rec_ct;
            }
            if($rec_ad !=0 && $temp4==0)
            {
            $temp4++;
           	$r_ct1=$rec_ct;
            }
            $depp_ct=$arr2['amt'];
            @$dep_ct=$dep_ct+$depp_ct;
            }
            ?>
            <?php
            if($dep1 !=NULL || $dep2 !=NULL || $dep_ad !=NULL || $dep_ct !=NULL ||  $amt1 !=NULL)
            {
            ?>
            <table class="table" style="border-top:groove;">
            <tr>
            <th>Date Of Receipt<label style="padding-left:2%;"><?php echo $dat1; ?></label></th>
            </tr>
            </table>
            <table  class="table table-bordered table-hover">
            <thead align="center">
            <tr>
            <th align="center">Receipt No.</th><th align="center">Fee Type</th><th align="center">Amount</th>
            </tr>
            </thead>
            <?php
            if($j>0)
            {
            $gen_fee+=$amt1;
			if($gen_no==0)
			{
				$receipt_no_gen1=$r33;
				$receipt_no_gen2=$r33;
				$gen_no++;
			}
			else
			{
				$receipt_no_gen2=$r3;
			}
            ?>
            
            <tr>
            <td  align="center"><?php echo $r3 ."&nbsp;&nbsp;-&nbsp;&nbsp;". $r33; ?></td><td align="center">General Fees</td><td align="right"><?php echo $amt1; ?></td>
            </tr>
            <?php
            }
            if($k>0 || $m>0 || $p>0)
            {  //echo $r_ad1; echo"</br>";
		//echo $r_non1;  echo"</br>";
		//echo $r22;  echo"</br>";
		//echo $r222;  echo"</br>";
				
		
				if(!empty($r_ad1) && !empty($r_non1) && !empty($r22) && !empty($r222))
				{
            		 $minimum_value=min($r_ad1,$r_non1,$r22,$r222);
				}
				if(!empty($r_ad1) && !empty($r22) && !empty($r222))
				{
            		 $minimum_value=min($r_ad1,$r22,$r222);
				}
				else if(!empty($r_ad1) && !empty($r_non1))
				{
            		  $minimum_value=min($r_ad1,$r_non1);
				}
				else if(!empty($r_ad1) && !empty($r22))
				{
            		 $minimum_value=min($r_ad1,$r22);
				}
				else if(!empty($r_ad1) && !empty($r222))
				{
            		 $minimum_value=min($r_ad1,$r222);
				}
				else if(!empty($r_non1) && !empty($r22))
				{
            		$minimum_value=min($r_non1,$r22);
				}
				else if(!empty($r_non1) && !empty($r222))
				{
            		$minimum_value=min($r_non1,$r222);
				}
				else if(!empty($r22) && !empty($r222))
				{
            		 $minimum_value=min($r22,$r222);
				}
				else if(!empty($r22))
				{
					 $minimum_value=$r22; 
				}
				else if(!empty($r_ad1))
				{
					$minimum_value=$r_ad1;
				}
				else if(!empty($r_non1))
				{
					$minimum_value=$r_non1;
				}
				else if(!empty($r222))
				{
					$minimum_value=$r222;
				}
				//echo $minimum_value;
				
				 $maximum_value=max($r_ad,$r_non,$r2,$r23); 
             $mon_fee+=($dep1+$dep_ad);
			 if($mnth_no==0)
			{
				$receipt_no_mnth1=$minimum_value;
				$receipt_no_mnth2=$minimum_value;
				$mnth_no++;
			}
			if(!empty($maximum_value))
			{
				$receipt_no_mnth2=$maximum_value;
			}
			
            ?>
            <tr>
             <td align="center"><?php echo $minimum_value ."&nbsp;&nbsp;-&nbsp;&nbsp;". $maximum_value; ?></td><td align="center" >Monthly Fees</td><td align="right"><?php echo ($dep1+$dep_ad); ?></td>
            </tr>
            <?php	
            }
            if($l>0)
            {
            $hstl_fee+=$dep2;
			 if($hstl_no==0)
			{
				$receipt_no_hstl1=$r1;
				$receipt_no_hstl2=$r;
				$hstl_no++;
			}
			else
			{
				$receipt_no_hstl2=$r;
			}
            ?>
            <tr>
            <td align="center"><?php echo $r1 ."&nbsp;&nbsp;-&nbsp;&nbsp;". $r; ?></td><td align="center" >Hostel Fees</td><td align="right"><?php echo $dep2; ?></td>
            </tr>
            
            <?php	
            }
			 if($n>0)
            {
             $cautn_fee+=$dep_ct;
			 if($cautn_no==0)
			{
				$receipt_no_cautn1=$r_ct1;
				$receipt_no_cautn2=$r_ct1;
				$cautn_no++;
			}
			else
			{
				$receipt_no_cautn2=$r_ct;
			}
            ?>
            <tr>
            <td align="center"><?php echo $r_ct1 ."&nbsp;&nbsp;-&nbsp;&nbsp;". $r_ct; ?></td><td align="center" >Caution Fees</td><td align="right"><?php echo $dep_ct; ?></td>
            </tr>
            
            <?php	
            }
            ?>
            <tr>
            <td colspan="3" align="right"><b><?php echo $amt1+$dep1+$dep2+$dep_ad+$dep_ct; ?></b></td>
            </tr>
            <?php
            }
            ?>
            </table>
            <?php
            }
            }
			if(empty($receipt_no_mnth2))
			{
				$receipt_no_mnth2=0;
			}
            ?>
              <table class="table" style="border-top:groove;">
            <tr>
            <th style="text-align:center"><h3><strong>Grand Total Amount</strong></h3></th>
            </tr>
            </table>
            <table  class="table table-bordered table-hover">
            <thead align="center">
            <tr>
            <th align="center">Receipt No.</th><th align="center">Fee Type</th><th align="center">Amount</th>
            </tr>
            </thead>
            <tr>
            <td  align="center"><?php echo $receipt_no_gen1 ."&nbsp;&nbsp;-&nbsp;&nbsp;". $receipt_no_gen2; ?></td><td align="center">General Fees</td><td align="right"><?php echo $gen_fee; ?></td>
            </tr>
            <tr>
             <td align="center"><?php echo $receipt_no_mnth1 ."&nbsp;&nbsp;-&nbsp;&nbsp;". $receipt_no_mnth2; ?></td><td align="center" >Monthly Fees</td><td align="right"><?php echo $mon_fee; ?></td>
            </tr>
             <tr>
            <td align="center"><?php echo $receipt_no_hstl1 ."&nbsp;&nbsp;-&nbsp;&nbsp;". $receipt_no_hstl2; ?></td><td align="center" >Hostel Fees</td><td align="right"><?php echo $hstl_fee; ?></td>
            </tr>
             <tr>
            <td align="center"><?php echo $receipt_no_cautn1 ."&nbsp;&nbsp;-&nbsp;&nbsp;". $receipt_no_cautn2; ?></td><td align="center" >Caution Fees</td><td align="right"><?php echo $cautn_fee; ?></td>
            </tr>
            <tr>
            <td colspan="3" align="right"><b><?php echo $gen_fee+$mon_fee+$hstl_fee+$cautn_fee; ?></b></td>
            </tr>
            </table>
           
           
           
            