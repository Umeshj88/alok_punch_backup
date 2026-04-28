<?php
require_once("function.php");
include("conn.php");
include("authentication.php");

 if(isset($_POST['submit']))
{
extract($_POST);

$rg_dt1=date('Y-m-d', strtotime($rg_dt));
$dob1=date('Y-m-d', strtotime($dob));

 $current_date=date("Y-m-d");

$date_application1=date('Y-m-d', strtotime($date_application));
$issue_date1=date('Y-m-d', strtotime($issue_date));


mysql_query("update `stdnt_reg` set nationality='$nationality',ctg='$category',last_class='$last_class',school_board='$board'
,fail='$fail',subject='$subjects',higher_promotion='$higher_promotion',next_cls='$higher_class',dues_paid='$dues_paid',concession='$concession',working_day_lst_cls='$lst_cls_work_dy' ,wrkig_day_prese_last_cls='$lst_cls_prese_dy',ncc='$ncc',extr_curiclr_acti='$extra_curricular'
,general_conduct='$general_curricular',dat_of_app_cetif='$date_application1',issue_dat='$issue_date1' ,achievement='$achievement',reason='$reason',remarks='$remarks',adm_class_id='$adm_first_class' ,tc_type='$type_of_tc',`result_status`='$result_status'  where id='$schlr_no_id'");

	$sel_temp_tc_stdnt=mysql_query("select * from  tc_serial_no where schlr_no_id='$schlr_no_id' && `status`='1'");
	$cnt_temp_tc_stdnt=mysql_num_rows($sel_temp_tc_stdnt);
	if($cnt_temp_tc_stdnt==0)
	{
		$dbName1='alok_session';
		mysql_select_db($dbName1,$s) or die('Error selecting MySQL database: ' . mysql_error());
		
		$sel_tc_serial_nolast=mysql_query("select `tc_serial_numbers` from  `tc_serial_number` where `id`='1'");
		$ftc_tc_serial_nolast=mysql_fetch_array($sel_tc_serial_nolast);
		 $tc_serial_no= $ftc_tc_serial_nolast['tc_serial_numbers'];	
		 $tc_serial_no_inc=$tc_serial_no+1;
		mysql_query("update `tc_serial_number` set `tc_serial_numbers`='".$tc_serial_no_inc."'");
		include("conn.php");
		mysql_query("insert into  tc_serial_no set `schlr_no_id`='$schlr_no_id' ,`tc_serial_no`='$tc_serial_no_inc', `book_no`='$book_no',`status`='1'");
	}
}
  
?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>TC | <?php title();?></title>
<?php
logo();
//css();
?>
<style media="print">
	.hide_print
	{
		display:none;
	}
	
	
	.tr_bg
	{
		background-color:#999;
	
	}
	</style>
<style>
tr
{
	height:30px;
	text-align:center;
}
.td_padd_first
{
padding-left:10px;
text-align:left;
 
 
	}
	.td_padd
{
padding-left:10px;
text-align:left;
font-weight: bold;
 
	}
.btn
{webkit-box-shadow: none !important;
-moz-box-shadow: none !important;
box-shadow: none !important;
-webkit-text-shadow: none;
-moz-text-shadow: none;
text-shadow: none;
outline: none !important;

color: #fff;
background-color: #5cb85c;
border-color: #4cae4c;
border-radius:8px;
height:30px;
color:#FFF;
}
.btn_print
{webkit-box-shadow: none !important;
-moz-box-shadow: none !important;
box-shadow: none !important;
-webkit-text-shadow: none;
-moz-text-shadow: none;
text-shadow: none;
outline: none !important;

color: #fff;
background-color: #09F;
border-color: #06F;
border-radius:8px;
height:30px;
color:#FFF;
}
</style>

</head>

<!-- BEGIN BODY -->
<body  style="background-color:#FFF !important;" >
			
		<form  method="post">

<?php

$sel_stdnt=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'");
$arr_stdnt=mysql_fetch_array($sel_stdnt);

$dob1=$arr_stdnt['dob'];
$date_of_birht=date("d-m-Y",strtotime($dob1));
$date_birht=date("d",strtotime($dob1));
$month_birht=date("M",strtotime($dob1));
$year_birht=date("Y",strtotime($dob1));
 

//////////////////////////////	
$fname = $arr_stdnt['fname'];
$f_name = $arr_stdnt['f_name'];
$mname = $arr_stdnt['mname'];
$m_name = $arr_stdnt['m_name'];
$lname = $arr_stdnt['lname'];
	

$name=$fname.' '.$mname.' '.$lname;	

$nationality= $arr_stdnt['nationality'];	
$category_id= $arr_stdnt['ctg'];	

    $sle_category=mysql_query("select * from `category` where `sno`='$category_id'");
		$ftc_category=mysql_fetch_array($sle_category);
			$category= $ftc_category['ctg'];
			
$rg_dt1x= $arr_stdnt['rg_dt'];	
$rg_dt1=date('d-m-Y', strtotime($rg_dt1x));
$dob1x= $arr_stdnt['dob'];
$dob1=date('d-m-Y', strtotime($dob1x));
	
$last_class= $arr_stdnt['last_class'];	
$board= $arr_stdnt['school_board'];	
$fail= $arr_stdnt['fail'];	
$subjects= $arr_stdnt['subject'];	
$higher_promotion= $arr_stdnt['higher_promotion'];	
$higher_class= $arr_stdnt['next_cls'];	
$dues_paid= $arr_stdnt['dues_paid'];	
$concession= $arr_stdnt['concession'];	
$lst_cls_work_dy= $arr_stdnt['working_day_lst_cls'];	
$lst_cls_prese_dy= $arr_stdnt['wrkig_day_prese_last_cls'];	
$ncc= $arr_stdnt['ncc'];	
$extra_curricular= $arr_stdnt['extr_curiclr_acti'];	
$general_curricular= $arr_stdnt['general_conduct'];	
$date_application1x= $arr_stdnt['dat_of_app_cetif'];	
$date_application1=date('d-m-Y', strtotime($date_application1x));

$issue_date1x= $arr_stdnt['issue_dat'];	
$issue_date1=date('d-m-Y', strtotime($issue_date1x));

$reason= $arr_stdnt['reason'];	
$remarks= $arr_stdnt['remarks'];	
$achievement= $arr_stdnt['achievement'];	
$adm_first_class= $arr_stdnt['adm_class_id'];
$tc_type= $arr_stdnt['tc_type'];	
$result_status= $arr_stdnt['result_status'];

	
	
	
	$sle_tc_serial_no=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='$schlr_no_id'");

  
			$ftc_tc_serial_no=mysql_fetch_array($sle_tc_serial_no);
			 $tc_serial_no= $ftc_tc_serial_no['tc_serial_no'];
/////////////////////////////////////////
?>


<span class="hide_print"  style="margin-left:30%; margin-top:2%;padding:20px" >
 
 <button class="btn_print"  onclick="window.print() " type="button"> Print</button> 
<br/>
</span>

<input  type="hidden" name="schlr_no_id" value="<?php echo $schlr_no_id ?>"/> 

<div  align="center" style="width:1000px; height:1300px;float:left;margin-top:10px;">
<!-- BEGIN HEADER -->
<!-- BEGIN CONTAINER -->
<br/>
<?php
$sel_school=mysql_query("select * from `school`");
$arr_school=mysql_fetch_array($sel_school);
?>
<table width="90%"   align="center"  cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; " >
<tr>
<td width="15%" rowspan="3" align="center" >
 <img src='img/alok.png' width="100" height="110" alt="logo"  class="img-responsive" />
</td>
<td style="font-family: 'Dancing Script', cursive;font-size:30px"  align="center" >
<b> <?php echo $arr_school['school']; ?> </b>
 </td>
<td width="20%">
</td>



</tr>

<tr>
<td  colspan="2"  align="left" style="padding-left:70px" >
<B><I>(<?php echo $arr_school['address']; ?>)</I><?php if(!empty($tc_type)) { ?> <span  style=" background-color:#999;padding-right:10px;padding-left:10px; margin-left:10px;border:1px solid black;font-size:19px;" class="tr_bg" ><?php echo $tc_type; ?> </span> <?php } ?> </B></td>
<td>
</td>

</tr>

<tr>
<td align="center"   style="font-size:20px">
<B><?php echo $arr_school['affiliation_no']; ?></B>

</td>
<td>
</td>
</tr>

<tr>
<td>
</td>
<td height="25" align="center">
<B>(<?php echo $arr_school['agis']; ?>)</B>
</td>
<td>
</td>
</tr>
</table>
<table width="90%"  align="center"  cellpadding="0" cellspacing="0" style="font-family: 'Abel', sans-serif;" >
<tr  class="tr_bg">
<td bgcolor="#999"   colspan="2" style="text-align:center; background-color:#999;color:black;border:2px solid black;font-family: 'Pacifico', cursive; " height="25" > <b>SCHOOL LEAVING CERTIFICATE </b>
</td>
</tr>
</table>


<table width="80%"  align="center"  style="border-collapse:collapse;margin-top:7px;margin-bottom:12px">
<tr>
<td align="left" width="13%"><b>Serial No. :</b></td>
<td align="left" width="20%">
<?php


serial_no($tc_serial_no);

	?>
</td>

<td align="left" width="15%" ><b>Admission No. :</b></td>
<td align="left" ><?php

$sle_stdnt_reg=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'");

  
			$ftc_stdnt_reg=mysql_fetch_array($sle_stdnt_reg);
			$schlr_no= $ftc_stdnt_reg['schlr_no'];
 echo $schlr_no ; ?></td>

<td align="left"  width="15%"><b>School Code :</b></td>
<td align="left" width="15%"><?php echo $arr_school['school_code']; ?></td>
</tr>
 
</table>
<table width="90%"  align="center" style="border-collapse:collapse;font-family:Arial, Helvetica, sans-serif;font-size:18px"">
  <tr>
    <td  width="3%">1.</td><td  class="td_padd_first" width="65%"><span>Name of Pupil</span></td>
    <td class="td_padd" width="20%"><?php echo $name ; ?>
	</td>
    </tr>
    <tr>
     <td>2.</td><td class="td_padd_first"><span>Father's/Guardian's Name</span></td>
    <td class="td_padd" > <?php echo $f_name ; ?></td>
    </tr>
     <tr>
    <td>3.</td><td class="td_padd_first"><span>Mother's Name</span></td>
     <td class="td_padd" ><?php echo $m_name ; ?></td>
     </tr>
    <tr>
    <td>4.</td><td class="td_padd_first"><span>Nationality</span></td>
     <td class="td_padd" ><?php echo $nationality ; ?></td>
     </tr>
     <tr>
    <td>5.</td><td class="td_padd_first"><span>Whether the Candidate belongs to Scheduled Caste or Scheduled Tribe</span></td>
    <td class="td_padd" ><?php echo $category ; ?></td>
    </tr>
    <tr>
    <td>6.</td><td style="padding-left:10px;text-align:left;"  ><span>Date of First Admission in the school Date <b> <?php echo $rg_dt1 ; ?></b></td> 
<?php







$sel_class=mysql_query("select * from  class   where sno='$adm_first_class'");
		$ftc_class=mysql_fetch_array($sel_class);
		
			
//////////////////////////////	

	
$adm_first_class_nm= $ftc_class['cls'];	
	




?>

<td class="td_padd"><b> Class :</b><?php echo $adm_first_class_nm ; ?> </td>
   
    </tr><tr>
    <td>7.</td><td class="td_padd_first"><span>Date of Birth ( in Christain Era ) according to Admission Register( In Figures ) :</span></td>
    <td class="td_padd" ><?php echo $dob1; ?></td>
    </tr>
     <tr>
    <td></td><td class="td_padd_first" colspan="2" ><span> (In Words ) :</span><b> <?php $date_birht=(int)$date_birht;  echo convert_number_to_words($date_birht);   ?> <?php echo $month_birht ?> <?php echo  convert_number_to_words($year_birht);  ?></b></td>
    </tr> 
    <tr>
    <td>8.</td>
    <?php 
	  $sql_="select * from class where `sno`='$last_class'";
                        $sql=mysql_query($sql_);
                       $t=mysql_fetch_array($sql);
                      
                      
					    $last_class_no= $t['cls_no'];
	
	 $last_class_fig=$last_class_no ; ?>
    <td class="td_padd_first"><span>Class in which pupil last <?php echo $result_status; ?> ( In Figures ):</span></td><td class="td_padd" ><?php  echo $last_class_fig ; ?></td>
    </tr>
     <tr>
    <td></td><td class="td_padd_first"><?php
   $sql_="select * from class where `sno`='$last_class'";
                        $sql=mysql_query($sql_);
                       $t=mysql_fetch_array($sql);
                      
                      
					    $last_class_nm= $t['cls'];?>
                        <span>(In Words ) :</span></td><td class="td_padd" ><?php echo $last_class_nm ; echo '&nbsp;('.$arr_stdnt['result_status'].')'; ?></td>
    </tr>
    <tr>
    <td>9.</td><td class="td_padd_first"><span>School / Board Annual Examination last taken with result :</span></td><td class="td_padd" ><?php echo $board ; ?></td>
    </tr>
      <tr>
    <td>10.</td><td class="td_padd_first"><span>Whether Failed , If so Once / Twice in the same class:</span></td><td class="td_padd" ><?php echo $fail ; ?></td>
    </tr>
     <tr>
    <td>11.</td><td style="padding-left:10px;text-align:left;" colspan="2"><span>Subjects Studied :</span> &nbsp;&nbsp;&nbsp; <b><?php echo $subjects ; ?></b>
    </td>
   
  </tr>
    <tr>
    <td>12.</td><td class="td_padd_first"><span>Whether qualified for promotion to the higher class</span></td><td class="td_padd" ><?php echo $higher_promotion ; ?></td>
  </tr>
  
   <tr>
   <?php  $higher_class ; 
   $sql_="select * from class where `sno`='$higher_class'";
                        $sql=mysql_query($sql_);
                       $t=mysql_fetch_array($sql);
                      
                      
					    $higher_class_nm= $t['cls'];?>
    <td></td><td class="td_padd_first"><span> if so, to which class the studying (in figures) <?php ?> (In Words ) :</span></td><td class="td_padd" ><?php echo $higher_class_nm ;  ?></td>
    </tr>
    
  <tr>
    <td>13.</td><td class="td_padd_first"><span>Month upto which the (pupil has paid) School dues / paid</span></td><td class="td_padd" ><?php echo $dues_paid ; ?></td>
  </tr>
  <tr>
    <td>14.</td><td class="td_padd_first"><span>Any Fee concession availed of : if so, the nature of such concession:</span></td><td class="td_padd" ><?php echo $concession ; ?></td>
  </tr>
   <tr>
    <td>15.</td><td class="td_padd_first"><span>Total No. of working days Last Class:</span></td><td class="td_padd" ><?php echo $lst_cls_work_dy ; ?></td>
  </tr>
   <tr>
    <td>16.</td><td class="td_padd_first"><span>Total No. of working days present Last Class :</span></td><td class="td_padd" ><?php echo $lst_cls_prese_dy ; ?></td>
  </tr>
    <tr>
    <td>17.</td><td class="td_padd_first"><span>Whether NCC Cadet / Boys Scout / Girl Guide (detail may given )</span></td><td class="td_padd" ><?php echo $ncc ; ?></td>
  </tr>
  
   
  <tr>
    <td>18.</td><td class="td_padd_first"><span> Games played or extra curricular activities in which the pupil usually took part</span>    </td><td class="td_padd" ><?php echo $extra_curricular ; ?></td>
  </tr>
 
  <tr>
    <td></td><td class="td_padd_first" ><span>(Mention achievement level therin) :</span></td><td class="td_padd" ><?php echo $achievement ; ?></td>
    </tr>
    <tr>
    <td>19.</td><td class="td_padd_first"><span> General Conduct</span></td><td class="td_padd" ><?php echo $general_curricular ; ?></td>
  </tr>
   <tr>
    <td>20.</td><td class="td_padd_first"><span> Date of application for Certificate </span></td><td class="td_padd" ><?php echo $date_application1 ; ?></td>
  </tr>
   <tr>
    <td>21.</td><td class="td_padd_first"><span> Date of issue of Certificate</span></td>
    <td class="td_padd" ><?php echo  $issue_date1;?></td>
  </tr>
   <tr>
    <td>22.</td><td class="td_padd_first"><span> Reason for leaving the school</span></td><td class="td_padd" ><?php echo $reason ; ?></td>
  </tr>
    <tr>
    <td>23.</td><td class="td_padd_first"><span> Any Other remarks</span></td><td class="td_padd" ><?php echo $remarks ; ?></td>
  </tr>
  
</table>
<table width="90%"  align="center" style="border-collapse:collapse;margin-top:160px;border-collapse:collapse;font-family:Arial, Helvetica, sans-serif;font-size:18px">
<tr>
<td width="30%" style="padding-left:8%;"><b>Signature</b></td>
<td width="30%"  style="padding-left:8%"><b>Checked by</b></td>
<td width="30%"  style="padding-left:8%"><b>Principal</b></td>
</tr>
<tr>
<td width="30%"  style="padding-left:6%;"><b>ClassTeacher / Incharge</b></td>
<td width="30%"  style="padding-left:8%">&nbsp;</td>
<td width="30%"  style="padding-left:9%"><b>Seal</b></td>
</tr>
<tr>
<td colspan="4">&nbsp;</td>
</tr>
</table>
<!-- END CONTENT -->

<!-- END CONTAINER -->

</div>

</form>
</body>
<!-- END BODY -->

</html>