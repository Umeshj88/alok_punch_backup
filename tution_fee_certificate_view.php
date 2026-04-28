<?php
require_once("function.php");
require_once("conn.php");
$schlr_no_id=$_GET['schlr_no_id'];
$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'");
$arr_stdnt=mysql_fetch_array($sel_stdnt);
$schlr_no=$arr_stdnt['schlr_no'];

$sel1=mysql_query("select * from class where sno='".$arr_stdnt['cls']."'");
$arr1=mysql_fetch_array($sel1);

$sel_school=mysql_query("select * from `school`");
$arr_school=mysql_fetch_array($sel_school);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
?>
</head>

<!-- BEGIN BODY -->
<body style="font-family:Tahoma, Geneva, sans-serif;">
<table width="100%"  align="center"  cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif;" >
<tr>
<td width="12%" rowspan="5" align="center" >
 <img src='img/logo.jpg' width="125" height="110" alt="logo"  class="img-responsive" />
</td>
<td  align="center" style="font-size:25px">
<b> <?php echo $arr_school['school']; ?> </b>
 </td>
</tr>

<tr>
<td align="center" >
<B><I>(<?php echo $arr_school['affiliation_no']; ?>)</I></B>

</td>

</tr>

<tr>
<td align="center"   style="font-size:20px">
<B><?php echo $arr_school['address']; ?></B>

</td>
</tr>

<tr>
<td  align="center">
<B>(<?php echo $arr_school['agis']; ?>)</B>
</td>
</tr>
<tr><td height="25"></td><td></td></tr>
<tr>
<td></td>
<th><u>TO WHOM SO EVER IT MAY CONCERN</u></th>
</tr>
<tr>
<td></td>
<td align="right"><strong>Date : </strong><?php echo date('d-M-Y'); ?></td>
</tr>
</table>
<hr/>
<label>This is to certify that <?php echo $arr_stdnt['fname'].' '.$arr_stdnt['mname'].' '.$arr_stdnt['lname'].' (Scholar No. '.$schlr_no.' ) S/O '.$arr_stdnt['f_name'].' and '.$arr_stdnt['m_name'].' of Class '.$arr1['cls']; ?> has deposited fees as per following details.</label>
<br/><br/>
<table border="1" cellspacing="0" width="100%">
<thead>
<tr>
<th><label>S.No</label></th><th><label>Fee Description</label></th><th align="right" style="padding-right:4%;">Amount</th>
</tr>
</thead>
<?php
// Convert to UNIX timestamps



$i=0;
$total=0;


/////////////////////////////////////Annul/////////////////////////////////////
$cncssn=0;
$fine=0;
$j=0;
$sel_annl_fee_1=mysql_query("select * from `annl_fee` where `schlr_no_id`='".$schlr_no_id."'");
while($arr_annl_fee_1=mysql_fetch_array($sel_annl_fee_1))
{
    $cncssn+=$arr_annl_fee_1['cncssn'];
    $fine+=$arr_annl_fee_1['fyn'];
}

$sel_ft=mysql_query("select * from fee_type where cat='Year' || cat='Admission'");
while($arr_ft=mysql_fetch_array($sel_ft))
{
    $fee_type=$arr_ft['type'];
    $fee_type_id=$arr_ft['sno'];
    $tot_fee=0;
    $sel_annl_fee_1=mysql_query("select * from `annl_fee` where `schlr_no_id`='".$schlr_no_id."'");
    while($arr_annl_fee_1=mysql_fetch_array($sel_annl_fee_1))
    {
        $annl_fee_id=$arr_annl_fee_1['id'];
        
        $sel_annl_fee2=mysql_query("select * from `annl_fee1` where `annl_fee_id`='".$annl_fee_id."' && `fee`>'0' && `fee_type`='$fee_type_id'");
        while($arr_annl_fee2=mysql_fetch_array($sel_annl_fee2))
        {
            $fee=$arr_annl_fee2['fee'];
            $tot_fee+=$fee;
            $total+=$fee;
            
        }
    }
    if(!empty($tot_fee))
    {	
        $i++;
        if($j==0)
        {
           
			$tot_fee+=($fine-$cncssn);
			$total+=($fine-$cncssn);
            $j++;
        }
        ?>
        <tr>
        <td align="center"><?php echo $i; ?> </td>
         <td><?php echo $fee_type; ?> </td>
          <td align="right" style="padding-right:4%;"><?php echo $tot_fee; ?> </td></tr>
        <?php
    }
}
/////////////////////////////////Month/////////////////////////////////////////
$cncssn=0;
$fine=0;
$j=0;
$sel_ft_di=mysql_query("select distinct ledger_component_type from `fee_type` where `cat`='Regular'");
while($arr_ft_di=mysql_fetch_array($sel_ft_di))
{
	
		$sel_ft=mysql_query("select * from `fee_type` where `ledger_component_type`='".$arr_ft_di['ledger_component_type']."'");
		while($arr_ft=mysql_fetch_array($sel_ft))
		{
			$sel1=mysql_query("select mnth_fee2.fee,mnth_fee_1.cncssn,mnth_fee_1.fyn from mnth_fee2,mnth_fee_1 where mnth_fee2.fee_type='".$arr_ft['sno']."' && mnth_fee2.left='0' && mnth_fee2.mnth_fee1_sno=mnth_fee_1.sno && mnth_fee_1.schlr_no_id='".$schlr_no_id."'");
			$num_mnth=mysql_num_rows($sel1);
			while($arr1=mysql_fetch_array($sel1))
			{ 
				$fee=$arr1['fee'];
				
				$tot_fee+=$fee;
				$total+=$fee;
			}
			if(!empty($num_mnth))
			{
				$num_mnth1=$num_mnth;

			}
			
		}
		if($j==0)
		{
			$sel1=mysql_query("select mnth_fee_1.cncssn,mnth_fee_1.fyn from mnth_fee_1 where mnth_fee_1.schlr_no_id='".$schlr_no_id."'");
			$num_mnth=mysql_num_rows($sel1);
			while($arr1=mysql_fetch_array($sel1))
			{ 
				
				$fine+=$arr1['fyn'];
				$cncssn+=$arr1['cncssn'];
			
			}
			$tot_fee+=($fine-$cncssn);
			$total+=($fine-$cncssn);
			$j++;
		}
		if(!empty($num_mnth1))
		{	
			$num_mnth1=0;
			$i++;
			?>
			<tr>
			<td align="center"><?php echo $i; ?> </td>
			 <td> <?php echo $arr_ft_di['ledger_component_type']; ?> </td>
			  <td align="right" style="padding-right:4%;"><?php echo $tot_fee; ?> </td></tr>
			<?php
		}
		 $tot_fee=0;
 } 

	$sel3=mysql_query("select * from `old_fee_submit` where `fee_type`='1' && `schlr_no_id`='".$schlr_no_id."'");
	while($arr2=mysql_fetch_array($sel3))
	{
		
		$tot_fee+=$arr2['fee_dp'];
		$total+=$arr2['fee_dp'];
	}
	if(!empty($tot_fee))
	{
		$i++;
			?>
			<tr>
			<td align="center"><?php echo $i; ?> </td>
			 <td> Term Fee (Old) </td>
			  <td align="right" style="padding-right:4%;"><?php echo $tot_fee; ?> </td></tr>
			<?php
			$tot_fee=0;
	}
////////////////////////  Hostel Fee ////////////////////////


    $tot_fee=0;
    $sel_hstl_fee=mysql_query("select * from `hstl_fee` where `schlr_no_id`='".$schlr_no_id."'");
    while($arr_hstl_fee=mysql_fetch_array($sel_hstl_fee))
    {
    
        $fee=$arr_hstl_fee['deposit'];
        $tot_fee+=$fee;
        $total+=$fee;
        
    }
    if(!empty($tot_fee))
    {	
        $i++;
        ?>
        <tr>
        <td align="center"><?php echo $i; ?> </td>
         <td>Hostel Fees </td>
          <td align="right" style="padding-right:4%;"><?php echo $tot_fee; ?> </td></tr>
        <?php
		 $tot_fee=0;
    }
	$sel3=mysql_query("select * from `old_fee_submit` where `fee_type`='2' && `schlr_no_id`='".$schlr_no_id."'");
	while($arr2=mysql_fetch_array($sel3))
	{
		
		$tot_fee+=$arr2['fee_dp'];
		$total+=$arr2['fee_dp'];
	}
	if(!empty($tot_fee))
	{
		$i++;
			?>
			<tr>
			<td align="center"><?php echo $i; ?> </td>
			 <td> Hostel Fee (Old) </td>
			  <td align="right" style="padding-right:4%;"><?php echo $tot_fee; ?> </td></tr>
			<?php
			$tot_fee=0;
	}
////////////// Adhoc fee //////////////////////////////////////

$sel_ft=mysql_query("select * from fee_type where cat='Adhoc'");
while($arr_ft=mysql_fetch_array($sel_ft))
{
    $fee_type=$arr_ft['type'];
    $fee_type_id=$arr_ft['sno'];
    $tot_fee=0;
    $sel_adhoc_fee=mysql_query("select * from `adhoc_fee` where `schlr_no_id`='".$schlr_no_id."' && `fee_type`='$fee_type_id'");
    while($arr_adhoc_fee=mysql_fetch_array($sel_adhoc_fee))
    {
            $fee=$arr_adhoc_fee['amt'];
            $tot_fee+=$fee;
            $total+=$fee;
    }
    if(!empty($tot_fee))
    {	
        $i++;
        ?>
        <tr>
        <td align="center"><?php echo $i; ?> </td>
         <td><?php echo $fee_type; ?> </td>
          <td align="right" style="padding-right:4%;"><?php echo $tot_fee; ?> </td></tr>
        <?php
    }
}

////////////// Caution fee //////////////////////////////////////

$sel_ft=mysql_query("select * from fee_type where cat='LT'");
while($arr_ft=mysql_fetch_array($sel_ft))
{
    $fee_type=$arr_ft['type'];
    $fee_type_id=$arr_ft['sno'];
    $tot_fee=0;
    $sel_cautn_fee=mysql_query("select * from `cautn_fee` where `schlr_no_id`='".$schlr_no_id."'");
    while($arr_cautn_fee=mysql_fetch_array($sel_cautn_fee))
    {
            $fee=$arr_cautn_fee['amt'];
            $tot_fee+=$fee;
            $total+=$fee;
    }
    if(!empty($tot_fee))
    {	
        $i++;
        ?>
        <tr>
        <td align="center"><?php echo $i; ?> </td>
         <td><?php echo $fee_type; ?> </td>
          <td align="right" style="padding-right:4%;"><?php echo $tot_fee; ?> </td></tr>
        <?php
    }
}
?>
<tr>
        <td></td>
         <th align="left">Total </th>
          <th align="right" style="padding-right:4%;"><?php echo $total; ?> </th></tr>
</table>
<div style="margin-top:10%; text-align:right;">
<label>Authorized Signature</label>
</div>
</body>
</html>