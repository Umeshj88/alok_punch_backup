<?php
include("conn.php");
$c1=$_GET['con1'];
$c2=$_GET['con2'];
$form=$_GET['form'];
$to=$_GET['to'];
$d1=date("d-M-Y", strtotime($form));
$d2=date("d-M-Y", strtotime($to));
$ndt=date("Y-m-d", strtotime($form));
$cdt=date("Y-m-d", strtotime($to));
?>
<link href="assets/css/print_page.css" rel="stylesheet" type="text/css"/>
<table class="table table-striped table-bordered table-hover" width="100%">
<thead>
<tr>
<th style="text-align:center;"> Name</th>
<th style="text-align:center;"> Class</th>
<th style="text-align:center;"> Stream</th>
<th style="text-align:center;"> Medium</th>
<?php
$sel_month_code=mysql_query("select `mnth_name` from `mnth_code`");
while($arr_month_code=mysql_fetch_array($sel_month_code))
{
	echo '<th style="text-align:center;">'.ucfirst($arr_month_code['mnth_name']).'</th>';
}
?>
</tr>
</thead>
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
$x=0;$j=0;$k=0;$l=0;$m7=0;$m8=0;$m9=0;$m10=0;$m11=0;$m12=0;$m1=0;$m2=0;$m3=0;$m4=0;$m5=0;$m6=0;	 

//first

if($c1=="All Classes" && $c2=="All Students")
{
	$sel=mysql_query("select stdnt_reg.fname,stdnt_reg.lname,stdnt_reg.id,stdnt_reg.schlr_no,class.cls,stream.strm,medium.medium from class,stdnt_reg,stream,medium where class.sno=stdnt_reg.cls && stream.sno=stdnt_reg.strm && medium.sno=stdnt_reg.md order by class.sno ASC"); 
 		while($arr=mysql_fetch_array($sel))
 		{
	 		$fnm=$arr['fname'];
	 		$lnm=$arr['lname'];
			$schlr_no_id=$arr['id'];
			$class=$arr['cls'];
			$stream=$arr['strm'];
			$medium=$arr['medium'];
	 		$schlr_no=$arr['schlr_no'];
	 		
			$x=0;$j=0;$k=0;$l=0;$m7=0;$m8=0;$m9=0;$m10=0;$m11=0;$m12=0;$m1=0;$m2=0;$m3=0;$m4=0;$m5=0;$m6=0;	 $amt1=0;$amt2=0;	$tot=0;$amnt2=0;	
			foreach($result as $value)
			{
				$i=$value;
 				$month=date("n", strtotime($i));
 				$dat=date("d", strtotime($i));				
				$dat1=date("d-m-Y", strtotime($i));
				
				if($dat==01 && $j>0 )
				{
					if($month == "7" ){$m6=$amt1;} 	
					if($month == "8" ){$m7=$amt1;} 
					if($month == "9" ){$m8=$amt1;}
					if($month == "10" ){$m9=$amt1;}
					if($month == "11" ){$m10=$amt1;}
					if($month == "12" ){$m11=$amt1;}
   					if($month == "1" ){$m12=$amt1;} 
    				if($month == "2" ){$m1=$amt1;} 
					if($month == "3" ){$m2=$amt1;} 
					if($month == "4" ){$m3=$amt1;}
					if($month == "5" ){$m4=$amt1;} 
					if($month == "6" ){$m5=@$amt1;}
					$amt1=0; $dep1=0;$dep2=0;$tot=0;
				}
				$j++;
				
				
				$sel_an=mysql_query("select annl_fee.fee_dp from annl_fee where annl_fee.dat='$i' && annl_fee.schlr_no_id='".$schlr_no_id."'");
				while($arr_an=mysql_fetch_array($sel_an))
				{
					$amt=$arr_an['fee_dp'];
					@$amt2=$amt2+$amt;
				}
				
				 
				$sel_mn=mysql_query("select mnth_fee_1.fee_dp from mnth_fee_1 where mnth_fee_1.dat='$i' && mnth_fee_1.schlr_no_id='".$schlr_no_id."'");
				while($arr_mn=mysql_fetch_array($sel_mn))
				{
					$dep=$arr_mn['fee_dp'];
					@$dep1=$dep1+$dep;	
				}
				
			  
				$sel3=mysql_query("select * from hstl_fee where dat='$i' && schlr_no_id='$schlr_no_id'");
				while($arr3=mysql_fetch_array($sel3))
				{
					$depp=$arr3['deposit'];
					@$dep2=$dep2+$depp;
				}
				$sel4=mysql_query("select * from adhoc_fee where date='$i' && schlr_no_id='$schlr_no'");
				while($arr4=mysql_fetch_array($sel4))
				{
					$amnt2=$arr4['amt'];
					$tot+=$amnt2;
				}
				$amt1=@$amt2+@$dep1+@$dep2+@$tot;
 			}
	
						if($month == "7" ){$m7=$amt1;} 	
						if($month == "8" ){$m8=$amt1;} 
						if($month == "9" ){$m9=$amt1;}
						if($month == "10" ){$m10=$amt1;}
						if($month == "11" ){$m11=$amt1;}
						if($month == "12" ){$m12=$amt1;}
   						if($month == "1" ){$m1=$amt1;} 
   						if($month == "2" ){$m2=$amt1;} 
						if($month == "3" ){$m3=$amt1;} 
						if($month == "4" ){$m4=$amt1;}
						if($month == "5" ){$m5=$amt1;} 
						if($month == "6" ){$m6=$amt1;}
							
								 echo '<tr><td>'.$fnm." ".$lnm.'</td><td>'.$class.'</td><td>'.$stream.'</td><td>'.$medium.'</td>';
								echo '<td>'.$m7.'</td><td>'.$m8.'</td><td>'.$m9.'</td><td>'.$m10.'</td><td>'.$m11.'</td><td>'.$m12.'</td><td>'.$m1.'</td><td>'.$m2.'</td><td>'.$m3.'</td><td>'.$m4.'</td><td>'.$m5.'</td><td>'.$m6.'</td>';
								echo '</tr>';
									$m7=0;$m8=0;$m9=0;$m10=0;$m11=0;$m12=0;$m1=0;$m2=0;$m3=0;$m4=0;$m5=0;$m6=0;	 
									$amt1=0; $dep1=0;$dep2=0;$x=0;$tot=0;$amnt2=0; $amt2=0;
				

		 }
	
}
/////////////////////////////////////////////// second  ////////////////////////////////////////
if($c1 !="All Classes" && $c2=="All Students")
{
	
		$sel=mysql_query("select stdnt_reg.fname,stdnt_reg.lname,stdnt_reg.id,stdnt_reg.schlr_no,class.cls,stream.strm,medium.medium from stdnt_reg,class,stream,medium where stdnt_reg.cls='$c1' && class.sno=stdnt_reg.cls && stream.sno=stdnt_reg.strm && medium.sno=stdnt_reg.md");
 		while($arr=mysql_fetch_array($sel))
 		{
	 		$fnm=$arr['fname'];
	 		$lnm=$arr['lname'];
			$schlr_no_id=$arr['id'];
			$class=$arr['cls'];
			$stream=$arr['strm'];
			$medium=$arr['medium'];
	 		$schlr_no=$arr['schlr_no'];
		
			$x=0;$j=0;$k=0;$l=0;$m7=0;$m8=0;$m9=0;$m10=0;$m11=0;$m12=0;$m1=0;$m2=0;$m3=0;$m4=0;$m5=0;$m6=0;	 $amt1=0;$amt2=0;	$tot=0;$amnt2=0;	
			foreach($result as $value)
			{
				$i=$value;
 				$month=date("n", strtotime($i));
 				$dat=date("d", strtotime($i));				
				$dat1=date("d-m-Y", strtotime($i));
				
				if($dat==01 && $j>0 )
				{
					if($month == "7" ){$m6=$amt1;} 	
					if($month == "8" ){$m7=$amt1;} 
					if($month == "9" ){$m8=$amt1;}
					if($month == "10" ){$m9=$amt1;}
					if($month == "11" ){$m10=$amt1;}
					if($month == "12" ){$m11=$amt1;}
   					if($month == "1" ){$m12=$amt1;} 
    				if($month == "2" ){$m1=$amt1;} 
					if($month == "3" ){$m2=$amt1;} 
					if($month == "4" ){$m3=$amt1;}
					if($month == "5" ){$m4=$amt1;} 
					if($month == "6" ){$m5=@$amt1;}
					$amt1=0; $dep1=0;$dep2=0;$tot=0;
				}
				$j++;				
				$sel_an=mysql_query("select annl_fee.fee_dp from annl_fee where annl_fee.dat='$i' && annl_fee.schlr_no_id='".$schlr_no_id."'");
				while($arr_an=mysql_fetch_array($sel_an))
				{
					$amt=$arr_an['fee_dp'];
					@$amt2=$amt2+$amt;
				}
		
				$sel_mn=mysql_query("select mnth_fee_1.fee_dp from mnth_fee_1 where mnth_fee_1.dat='$i' && mnth_fee_1.schlr_no_id='".$schlr_no_id."'");
				while($arr_mn=mysql_fetch_array($sel_mn))
				{
					$dep=$arr_mn['fee_dp'];
					@$dep1=$dep1+$dep;	
				}
				
			  
				$sel3=mysql_query("select * from hstl_fee where dat='$i' && schlr_no_id='$schlr_no_id'");
				while($arr3=mysql_fetch_array($sel3))
				{
					$depp=$arr3['deposit'];
					@$dep2=$dep2+$depp;
				}
				$sel4=mysql_query("select * from adhoc_fee where date='$i' && schlr_no_id='$schlr_no_id'");
				while($arr4=mysql_fetch_array($sel4))
				{
					$amnt2=$arr4['amt'];
					$tot+=$amnt2;
				}
				$amt1=@$amt2+@$dep1+@$dep2+@$tot;
 			}
	
						if($month == "7" ){$m7=$amt1;} 	
						if($month == "8" ){$m8=$amt1;} 
						if($month == "9" ){$m9=$amt1;}
						if($month == "10" ){$m10=$amt1;}
						if($month == "11" ){$m11=$amt1;}
						if($month == "12" ){$m12=$amt1;}
   						if($month == "1" ){$m1=$amt1;} 
   						if($month == "2" ){$m2=$amt1;} 
						if($month == "3" ){$m3=$amt1;} 
						if($month == "4" ){$m4=$amt1;}
						if($month == "5" ){$m5=$amt1;} 
						if($month == "6" ){$m6=$amt1;}
							
								 echo '<tr><td>'.$fnm." ".$lnm.'</td><td>'.$class.'</td><td>'.$stream.'</td><td>'.$medium.'</td>';
								echo '<td>'.$m7.'</td><td>'.$m8.'</td><td>'.$m9.'</td><td>'.$m10.'</td><td>'.$m11.'</td><td>'.$m12.'</td><td>'.$m1.'</td><td>'.$m2.'</td><td>'.$m3.'</td><td>'.$m4.'</td><td>'.$m5.'</td><td>'.$m6.'</td>';
								echo '</tr>';
									$m7=0;$m8=0;$m9=0;$m10=0;$m11=0;$m12=0;$m1=0;$m2=0;$m3=0;$m4=0;$m5=0;$m6=0;	 
									$amt1=0; $dep1=0;$dep2=0;$x=0;$tot=0;$amnt2=0; $amt2=0;
				

		 }
	}


/// third  //
if($c1=="All Classes" && $c2=="paid fees")
{
	$sel=mysql_query("select stdnt_reg.fname,stdnt_reg.lname,stdnt_reg.id,stdnt_reg.schlr_no,class.cls,stream.strm,medium.medium from class,stdnt_reg,stream,medium where class.sno=stdnt_reg.cls && stream.sno=stdnt_reg.strm && medium.sno=stdnt_reg.md order by class.sno ASC"); 
 		while($arr=mysql_fetch_array($sel))
 		{
	 		$fnm=$arr['fname'];
	 		$lnm=$arr['lname'];
			$schlr_no_id=$arr['id'];
			$class=$arr['cls'];
			$stream=$arr['strm'];
			$medium=$arr['medium'];
	 		$schlr_no=$arr['schlr_no'];
			
			$x=0;$j=0;$k=0;$l=0;$m7=0;$m8=0;$m9=0;$m10=0;$m11=0;$m12=0;$m1=0;$m2=0;$m3=0;$m4=0;$m5=0;$m6=0;	 $amt1=0;$amt2=0;$tot=0;$amnt2=0;		
			foreach($result as $value)
			{
				$i=$value;
 				$month=date("n", strtotime($i));
 				$dat=date("d", strtotime($i));
				
				
				$dat1=date("d-m-Y", strtotime($i));
				
				if($dat==01 && $j>0 )
				{
					if($month == "7" ){$m6=$amt1;} 	
					if($month == "8" ){$m7=$amt1;} 
					if($month == "9" ){$m8=$amt1;}
					if($month == "10" ){$m9=$amt1;}
					if($month == "11" ){$m10=$amt1;}
					if($month == "12" ){$m11=$amt1;}
   					if($month == "1" ){$m12=$amt1;} 
    				if($month == "2" ){$m1=$amt1;} 
					if($month == "3" ){$m2=$amt1;} 
					if($month == "4" ){$m3=$amt1;}
					if($month == "5" ){$m4=$amt1;} 
					if($month == "6" ){$m5=@$amt1;}
					$amt1=0; $dep1=0;$dep2=0;$tot=0;
				}
				$j++;
				
				
				 $sel_an=mysql_query("select annl_fee.fee_dp from annl_fee where annl_fee.dat='$i' && annl_fee.schlr_no_id='".$schlr_no_id."'");
				while($arr_an=mysql_fetch_array($sel_an))
				{
					$amt=$arr_an['fee_dp'];
					@$amt2=$amt2+$amt;
				}
		
				$sel_mn=mysql_query("select mnth_fee_1.fee_dp from mnth_fee_1 where mnth_fee_1.dat='$i' && mnth_fee_1.schlr_no_id='".$schlr_no_id."'");
				while($arr_mn=mysql_fetch_array($sel_mn))
				{
					$dep=$arr_mn['fee_dp'];
					@$dep1=$dep1+$dep;	
				}
						  
				$sel3=mysql_query("select * from hstl_fee where dat='$i' && schlr_no_id='$schlr_no_id'");
				while($arr3=mysql_fetch_array($sel3))
				{
					$depp=$arr3['deposit'];
					@$dep2=$dep2+$depp;
				}
				$sel4=mysql_query("select * from adhoc_fee where date='$i' && schlr_no_id='$schlr_no_id'");
				while($arr4=mysql_fetch_array($sel4))
				{
					$amnt2=$arr4['amt'];
					$tot+=$amnt2;
				}
				$amt1=@$amt2+@$dep1+@$dep2+@$tot;
 			}
	
						if($month == "7" ){$m7=$amt1;} 	
						if($month == "8" ){$m8=$amt1;} 
						if($month == "9" ){$m9=$amt1;}
						if($month == "10" ){$m10=$amt1;}
						if($month == "11" ){$m11=$amt1;}
						if($month == "12" ){$m12=$amt1;}
   						if($month == "1" ){$m1=$amt1;} 
   						if($month == "2" ){$m2=$amt1;} 
						if($month == "3" ){$m3=$amt1;} 
						if($month == "4" ){$m4=$amt1;}
						if($month == "5" ){$m5=$amt1;} 
						if($month == "6" ){$m6=$amt1;}
							if($m7 >0 || $m8 >0 || $m9 >0 || $m10 >0 || $m11 >0 || $m12 >0 || $m1 >0 || $m2 >0 || $m3 >0 || $m4 >0 || $m5 >0 || $m6 >0)
		{
								echo '<tr><td>'.$fnm." ".$lnm.'</td><td>'.$class.'</td><td>'.$stream.'</td><td>'.$medium.'</td>';
								echo '<td>'.$m7.'</td><td>'.$m8.'</td><td>'.$m9.'</td><td>'.$m10.'</td><td>'.$m11.'</td><td>'.$m12.'</td><td>'.$m1.'</td><td>'.$m2.'</td><td>'.$m3.'</td><td>'.$m4.'</td><td>'.$m5.'</td><td>'.$m6.'</td>';
								echo '</tr>';
		}
									$m7=0;$m8=0;$m9=0;$m10=0;$m11=0;$m12=0;$m1=0;$m2=0;$m3=0;$m4=0;$m5=0;$m6=0;	 
									$amt1=0; $dep1=0;$dep2=0;$x=0;$tot=0;$amnt2=0;

		 }
}


///fourth///
if($c1 !="All Classes" && $c2=="paid fees")
{
	
		$sel=mysql_query("select stdnt_reg.fname,stdnt_reg.lname,stdnt_reg.id,stdnt_reg.schlr_no,class.cls,stream.strm,medium.medium from stdnt_reg,class,stream,medium where stdnt_reg.cls='$c1' && class.sno=stdnt_reg.cls && stream.sno=stdnt_reg.strm && medium.sno=stdnt_reg.md");
 		while($arr=mysql_fetch_array($sel))
 		{
	 		$fnm=$arr['fname'];
	 		$lnm=$arr['lname'];
			$schlr_no_id=$arr['id'];
			$class=$arr['cls'];
			$stream=$arr['strm'];
			$medium=$arr['medium'];
	 		$schlr_no=$arr['schlr_no'];
		
			
			$x=0;$j=0;$k=0;$l=0;$m7=0;$m8=0;$m9=0;$m10=0;$m11=0;$m12=0;$m1=0;$m2=0;$m3=0;$m4=0;$m5=0;$m6=0;	 $amt1=0;$amt2=0;	$tot=0;$amnt2=0;	
			foreach($result as $value)
			{
				$i=$value;
 				$month=date("n", strtotime($i));
 				$dat=date("d", strtotime($i));
				
				
				$dat1=date("d-m-Y", strtotime($i));
				
				if($dat==01 && $j>0 )
				{
					if($month == "7" ){$m6=$amt1;} 	
					if($month == "8" ){$m7=$amt1;} 
					if($month == "9" ){$m8=$amt1;}
					if($month == "10" ){$m9=$amt1;}
					if($month == "11" ){$m10=$amt1;}
					if($month == "12" ){$m11=$amt1;}
   					if($month == "1" ){$m12=$amt1;} 
    				if($month == "2" ){$m1=$amt1;} 
					if($month == "3" ){$m2=$amt1;} 
					if($month == "4" ){$m3=$amt1;}
					if($month == "5" ){$m4=$amt1;} 
					if($month == "6" ){$m5=@$amt1;}
					$amt1=0; $dep1=0;$dep2=0;$tot=0;
				}
				$j++;
				
				
				 
				
			  $sel_an=mysql_query("select annl_fee.fee_dp from annl_fee where annl_fee.dat='$i' && annl_fee.schlr_no_id='".$schlr_no_id."'");
				while($arr_an=mysql_fetch_array($sel_an))
				{
					$amt=$arr_an['fee_dp'];
					@$amt2=$amt2+$amt;
				}
		
				$sel_mn=mysql_query("select mnth_fee_1.fee_dp from mnth_fee_1 where mnth_fee_1.dat='$i' && mnth_fee_1.schlr_no_id='".$schlr_no_id."'");
				while($arr_mn=mysql_fetch_array($sel_mn))
				{
					$dep=$arr_mn['fee_dp'];
					@$dep1=$dep1+$dep;	
				}
				$sel3=mysql_query("select * from hstl_fee where dat='$i' && schlr_no_id='$schlr_no_id'");
				while($arr3=mysql_fetch_array($sel3))
				{
					$depp=$arr3['deposit'];
					@$dep2=$dep2+$depp;
				}
				$sel4=mysql_query("select * from adhoc_fee where date='$i' && schlr_no_id='$schlr_no_id'");
				while($arr4=mysql_fetch_array($sel4))
				{
					$amnt2=$arr4['amt'];
					$tot+=$amnt2;
				}
				$amt1=@$amt2+@$dep1+@$dep2+@$tot;
 			}
	
						if($month == "7" ){$m7=$amt1;} 	
						if($month == "8" ){$m8=$amt1;} 
						if($month == "9" ){$m9=$amt1;}
						if($month == "10" ){$m10=$amt1;}
						if($month == "11" ){$m11=$amt1;}
						if($month == "12" ){$m12=$amt1;}
   						if($month == "1" ){$m1=$amt1;} 
   						if($month == "2" ){$m2=$amt1;} 
						if($month == "3" ){$m3=$amt1;} 
						if($month == "4" ){$m4=$amt1;}
						if($month == "5" ){$m5=$amt1;} 
						if($month == "6" ){$m6=$amt1;}
							if($m7 >0 || $m8 >0 || $m9 >0 || $m10 >0 || $m11 >0 || $m12 >0 || $m1 >0 || $m2 >0 || $m3 >0 || $m4 >0 || $m5 >0 || $m6 >0)
							{
								 echo '<tr><td>'.$fnm." ".$lnm.'</td><td>'.$class.'</td><td>'.$stream.'</td><td>'.$medium.'</td>';
								echo '<td>'.$m7.'</td><td>'.$m8.'</td><td>'.$m9.'</td><td>'.$m10.'</td><td>'.$m11.'</td><td>'.$m12.'</td><td>'.$m1.'</td><td>'.$m2.'</td><td>'.$m3.'</td><td>'.$m4.'</td><td>'.$m5.'</td><td>'.$m6.'</td>';
								echo '</tr>';
		}
									$m7=0;$m8=0;$m9=0;$m10=0;$m11=0;$m12=0;$m1=0;$m2=0;$m3=0;$m4=0;$m5=0;$m6=0;	 
									$amt1=0; $dep1=0;$dep2=0;$x=0;$tot=0;$amnt2=0;

		 }
	}



?>
</table>