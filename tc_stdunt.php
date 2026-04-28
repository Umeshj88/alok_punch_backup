<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");

 @$schlr_no_id=$_GET["schlr_no_id"];

$schlr_all=mysql_query("select * from `stdnt_reg` where `id`='$schlr_no_id'");

  $dob1=$ftc_schlr['dob'];
  $date_of_birht=date("d-m-Y",strtotime($dob1));
   $date_birht=date("d",strtotime($dob1));
   $month_birht=date("M",strtotime($dob1));
   $year_birht=date("Y",strtotime($dob1));
   
			$ftc_schlr=mysql_fetch_array($schlr_all);
			$schlr_no = $ftc_schlr['schlr_no'];
				$schlr_no_id = $ftc_schlr['id'];
			$rg_dt = $ftc_schlr['rg_dt'];
			$right_date = date("d-m-Y",strtotime($rg_dt));
			$adm = $ftc_schlr['adm'];

$adm_class_id = $ftc_schlr['adm_class_id'];
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
			$category_id = $ftc_schlr['ctg'];
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
			
  //////////////////
  
  
$nationality= $ftc_schlr['nationality'];	
	

    $sle_category=mysql_query("select * from `category` where `sno`='$category_id'");
		$ftc_category=mysql_fetch_array($sle_category);
			$category= $ftc_category['ctg'];
			
$rg_dt1x= $ftc_schlr['rg_dt'];	
$rg_dt1=date('d-m-Y', strtotime($rg_dt1x));
$dob1x= $ftc_schlr['dob'];
$dob1=date('d-m-Y', strtotime($dob1x));
	
$last_class= $ftc_schlr['last_class'];	
$board= $ftc_schlr['school_board'];	
$fail= $ftc_schlr['fail'];	
$subjects= $ftc_schlr['subject'];	
$higher_promotion= $ftc_schlr['higher_promotion'];	
$higher_class= $ftc_schlr['next_cls'];	
$dues_paid= $ftc_schlr['dues_paid'];	
$concession= $ftc_schlr['concession'];	
$lst_cls_work_dy= $ftc_schlr['working_day_lst_cls'];	
$lst_cls_prese_dy= $ftc_schlr['wrkig_day_prese_last_cls'];	
$ncc= $ftc_schlr['ncc'];	
 $extra_curricular= $ftc_schlr['extr_curiclr_acti'];
	
$general_curricular= $ftc_schlr['general_conduct'];	
$date_application1x= $ftc_schlr['dat_of_app_cetif'];	
$date_application1=date('d-m-Y', strtotime($date_application1x));

$issue_date1x= $ftc_schlr['issue_dat'];	
$issue_date1=date('d-m-Y', strtotime($issue_date1x));

$reason= $ftc_schlr['reason'];	
$remarks= $ftc_schlr['remarks'];	
$achievement= $ftc_schlr['achievement'];	
$adm_first_class= $ftc_schlr['adm_class_id'];
$tc_type= $ftc_schlr['tc_type'];	
$result_status= $ftc_schlr['result_status'];

  
  ////////////////////
  
?>

<?php
?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
css();
//ajax();
?>

<script type="text/javascript">


  function game(game)
		  {

if(game=="Yes")
{
		document.getElementById("extra_curricular").readOnly=false;
		document.getElementById("extra_curricular").value="";
		
		document.getElementById("achievement").readOnly=false;
		document.getElementById("achievement").value="";
}
else if(game=="No")

{
document.getElementById("extra_curricular").readOnly=true;
	document.getElementById("extra_curricular").value="No";
	
	document.getElementById("achievement").readOnly=true;
	document.getElementById("achievement").value="";
	
	
}
		  }
	
function validate(nForm){
	

		var isInteger1 = nForm["lst_cls_work_dy"].value;
		var isInteger2 = nForm["lst_cls_prese_dy"].value;
		if(isInteger1== null)
		{
		}
		else if (!/^\d+$/.test(isInteger1))
			{
			 alert('Invalid input for Important Number');
			 nForm["lst_cls_work_dy"].value = "";
			 nForm["lst_cls_work_dy"].focus();
			 return false;
			}
			
			if(isInteger2== null)
		{
		}
		else if (!/^\d+$/.test(isInteger2))
			{
			 alert('Invalid input for Important Number');
			 nForm["lst_cls_prese_dy"].value = "";
			 nForm["lst_cls_prese_dy"].focus();
			 return false;
			}
	
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

			<Form name='Form1' method='post'  onsubmit="return validate(this)" action="tc_stdunt_print.php" target="_blank">

		
         <input class="form-control input-large" type="hidden" name="schlr_no" value="<?php echo $schlr_no ?>"/> 
          <input class="form-control input-large" type="hidden" name="schlr_no_id" value="<?php echo $schlr_no_id ?>"/> 
         
<br/>
<?php
$sel_school=mysql_query("select * from `school`");
$arr_school=mysql_fetch_array($sel_school);
?>
<table width="80%"  align="center"  cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif;" >
<tr>
<td width="20%" rowspan="3" align="center" >
 <img src='img/alok.png' width="100" height="110" alt="logo"  class="img-responsive" />
</td>
<td  align="center" style="font-size:30px">
<b> <?php echo $arr_school['school']; ?>  </b>
 </td>
</tr>

<tr>
<td align="center" >
<B><I>(<?php echo $arr_school['address']; ?>)</I></B>

</td>

</tr>

<tr>
<td align="center"   style="font-size:20px">
<B><?php echo $arr_school['affiliation_no']; ?></B>

</td>
</tr>

<tr>
<td>
</td>
<td height="25" align="center">
<B>(<?php echo $arr_school['agis']; ?>)</B>
</td>
</tr>
</table>
<table width="90%"  align="center"  cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif" >
<tr >
<td bgcolor="#999" colspan="2" style="text-align:center; background-color:#999;color:#FFF;border:2px solid black " height="25" > <b>SCHOOL LEAVING CERTIFICATE </b>
</td>
</tr>
</table>


<table width="80%"  align="center"  style="border-collapse:collapse;margin-top:7px;margin-bottom:12px">
<tr>
<td align="left" width="15%"><b>School Code</b></td>
<td align="left" width="25%"><?php echo $arr_school['school_code']; ?>
</td>
<?php

	$sle_tc_serial_no=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='$schlr_no_id'");

  
			$ftc_tc_serial_no=mysql_fetch_array($sle_tc_serial_no);
		$tc_serial_no= $ftc_tc_serial_no['tc_serial_no'];


if(!empty($tc_serial_no))
{	
?>
<td align="left"  width="15%"><b>Serial No.</b></td>
<td align="left" width="15%"><?php

serial_no($tc_serial_no); ?></td>
<?php
}
?>
<td align="left"  width="15%"><b>Admission No.</b></td>
<td align="left" width="15%"><?php echo $schlr_no ; ?></td>
</tr>

 
</table>
<table  width="90%" border="1" align="center" style="border-collapse:collapse;background-color:#DFDFDF;font-family:font-family: 'Noto Serif', serif;">

<tr>
    <td  width="3%"></td><td class="td_padd" width="35%"><span>Book No.</span></td>
    <td class="td_padd" width="20%">
	<input class="form-control input-large" type="text" name="book_no" /> 
	</td>
    </tr>
<tr>
    <td  width="3%"></td><td class="td_padd" width="35%"><span>Type of TC</span></td>
    <td class="td_padd" width="20%">
	 <select class="form-control input-large" name="type_of_tc">
                <option value="">Orignal</option>
                 <option value="Duplicate TC">Duplicate</option>
     </select>
	</td>
    </tr>


  <tr>
    <td  width="3%">1.</td><td class="td_padd" width="35%"><span>Name of Pupil</span></td>
    <td class="td_padd" width="20%">
	<input class="form-control input-large" readonly type="text" name="name" value="<?php echo $ftc_schlr['fname']; ?> <?php echo $ftc_schlr['mname']; ?> <?php echo $ftc_schlr['lname']; ?>"/>
	</td>
    </tr>
    <tr>
     <td>2.</td><td class="td_padd"><span>Father's/Guardian's Name</span></td>
    <td class="td_padd" > <input class="form-control input-large"  readonly type="text" name="f_name" value="<?php echo $f_name ?>"/> </td>
    </tr>
     <tr>
    <td>3.</td><td class="td_padd"><span>Mother's Name</span></td>
     <td class="td_padd" ><input class="form-control input-large" readonly type="text" name="m_name" value="<?php echo $m_name ?>"/></td>
     </tr>
    <tr>
    <td>4.</td><td class="td_padd"><span>Nationality</span></td>
     <td class="td_padd" ><input class="form-control input-large" type="text" name="nationality" value="<?php if(empty($nationality)){ ?>Indian <?php } else { echo $nationality; } ?> " /></td>
     </tr>
     <tr>
    <td>5.</td><td class="td_padd"><span>Whether the Candidate belongs to Scheduled Caste or Scheduled Tribe</span></td>
    <td class="td_padd" >
  
                             <select class="form-control input-large" name="category">
                             <?php
            $sle_category=mysql_query("select * from `category`");

  
			while($ftc_category=mysql_fetch_array($sle_category))
			{
			$ctg= $ftc_category['ctg'];
			$ctg_id= $ftc_category['sno'];
			
			?>	
                 <option <?php if($category_id==$ctg_id){?> selected  <?php } ?> value="<?php echo $ctg_id; ?>"><?php echo $ctg; ?></option>
                 <?php
			}
			?>
                
               </select>
    </td>
    </tr>
    <tr>
    <td>6.</td><td class="td_padd"><span>Date of First Admission in the school Class and Date : </span></td>
    <td class="td_padd" >
    <input class="form-control   input-large "  type="text"  readonly  name="rg_dt"  value="<?php echo $right_date; ?>"/>
      <select class="form-control input-large" name="adm_first_class">
            <option value="">select Class</option>
                <?php $sql_="select * from class";
                        $sql=mysql_query($sql_);
                        while($t=mysql_fetch_array($sql))
                        { 
                       $adm_first_class_idd = $t['sno'];
					    $adm_first_class= $t['cls'];
                        ?>
                 <option   <?php if($adm_class_id==$adm_first_class_idd) { ?> selected<?php  } ?> value="<?php echo $adm_first_class_idd; ?>"><?php echo $adm_first_class ?></option>
                <?php
					}			
            ?></select>
    </td>
    </tr>
    <tr>
    <td>7.</td><td class="td_padd"><span>Date of Birth ( in Christain Era ) according to Admission Register( In Figures ) :</span></td>
    <td class="td_padd" >
    
 <input readonly class="form-control form-control-inline input-large " type="text" name="dob" value="<?php echo $dob_right ?>"/>
   
    </td>
    </tr>
     
    <tr>
    <td>8.</td><td class="td_padd"><span>Class in which pupil last studied ( Passed / Compartment / Failed ) ( In Figures ):</span></td>
    <td class="td_padd" >


 <select class="form-control input-large"  name="result_status"  >
        
    <option <?php if($result_status=='Passed' ) { ?>  selected <?php } ?> value="Passed">Passed</option>
    <option  <?php if($result_status=='Failed' ) { ?>  selected <?php } ?> value="Failed">Failed</option>
    <option  <?php if($result_status=='Compartment' ) { ?>  selected <?php } ?> value="Compartment">Compartment</option>
    <option <?php if($result_status=='Studying' ) { ?>  selected <?php } ?> value="Studying">Studying</option>
    <option <?php if($result_status=='Absent' ) { ?>  selected <?php } ?> value="Absent">Absent</option>
    <option <?php if($result_status=='Left' ) { ?>  selected <?php } ?> value="Left">Left</option>
             
 </select>



 <select class="form-control input-large" name="last_class">
            <option value="">select Class</option>
                <?php $sql_="select * from class";
                        $sql=mysql_query($sql_);
                        while($t=mysql_fetch_array($sql))
                        { 
                       $last_class_idd = $t['sno'];
					    $last_class_nm= $t['cls'];
                        ?>
                 <option   <?php if($last_class==$last_class_idd ) { ?>  selected <?php } ?>  value="<?php echo $last_class_idd; ?>"><?php echo $last_class_nm ?></option>
                <?php
					}			
            ?></select></td>
    </tr>
   
    <tr>
    <td>9.</td><td class="td_padd"><span>School / Board Annual Examination last taken with result :</span></td>
    <td class="td_padd" >
    
      <select  class="form-control input-large" name="board">
                 <option <?php if($board=='CBSE' ) { ?>  selected <?php } ?> value="CBSE">CBSE</option>
                  <option <?php if($board=='School' ) { ?>  selected <?php } ?> value="School">School</option>
               </select>
                
    </tr>
      <tr>
    <td>10.</td><td class="td_padd"><span>Whether Failed , If so Once / Twice in the same class:</span></td>
    <td class="td_padd" >
     <select class="form-control input-large" name="fail">
<option  <?php if($fail=='No' ) { ?>  selected <?php } ?> value="No">No</option>
                <option  <?php if($fail=='Once' ) { ?>  selected <?php } ?> value="Once">Once</option>
                 <option  <?php if($fail=='Twice' ) { ?>  selected <?php } ?> value="Twice">Twice</option>
                 
               </select>
    </tr>
     <tr>
    <td>11.</td><td class="td_padd" ><span>Subjects Studied</span></td>
    <td><input class="form-control input-large" value="<?php echo $subjects; ?>" placeholder="Enter Subjects" type="text" name="subjects" /></td>
   
  </tr>
    <tr>
    <td>12.</td><td class="td_padd"><span>Whether qualified for promotion to the higher class</span></td>
    <td class="td_padd" >
      <select class="form-control input-large" name="higher_promotion">
                 <option  <?php if($higher_promotion=='Yes' ) { ?>  selected <?php } ?> value="Yes">Yes</option>
                  <option  <?php if($higher_promotion=='No' ) { ?>  selected <?php } ?> value="No">No</option>
               </select>
    
  </tr>
  
   <tr>
    <td></td><td class="td_padd"><span> if so, to which class the studying (in figures) <?php ?> (In Words ) :</span></td>
    <td class="td_padd" >
     <select class="form-control input-large" name="higher_class">
           <option value="">select Class</option>
                <?php $sql_="select * from class";
                        $sql=mysql_query($sql_);
                        while($t=mysql_fetch_array($sql))
                        { 
                       $class_idd = $t['sno'];
					    $class= $t['cls'];
                        ?>
                 <option  <?php if($higher_class==$class_idd ) { ?>  selected <?php } ?>   value="<?php echo $class_idd; ?>"><?php echo $class ?></option>
                <?php
					}			
            ?></select>
              
    
    
    </tr>
    
  <tr>
    <td>13.</td><td class="td_padd"><span>Month upto which the (pupil has paid) School dues / paid</span></td>
    <td class="td_padd" >
             <select class="form-control input-large" name="dues_paid">
            
                 <option <?php if($dues_paid=='Yes' ) { ?>  selected <?php } ?> value="Yes">Yes</option>
                  <option  <?php if($dues_paid=='No' ) { ?>  selected <?php } ?> value="No">No</option>
               </select>
  </tr>
  <tr>
    <td>14.</td><td class="td_padd"><span>Any Fee concession availed of : if so, the nature of such concession:</span></td>
    <td class="td_padd" >
     <select class="form-control input-large" name="concession">
                <option <?php if($concession=='No' ) { ?>  selected <?php } ?>  value="No">No</option>
                 <option <?php if($concession=='Yes' ) { ?>  selected <?php } ?> value="Yes">Yes</option>
              
               </select>
  </tr>
   <tr>
    <td>15.</td><td class="td_padd"><span>Total No. of working days <strong>Last Class</strong>:</span></td>
    <td class="td_padd" ><input class="form-control input-large" placeholder="Enter working days " value="<?php echo $lst_cls_work_dy; ?>"  type="text" name="lst_cls_work_dy"   id="lst_cls_work_dy" /></td>
  </tr>
   <tr>
    <td>16.</td><td class="td_padd"><span>Total No. of working days present <strong>Last Class</strong>:</span></td>
    <td class="td_padd" ><input class="form-control input-large" placeholder="Enter Number Present" value="<?php echo $lst_cls_prese_dy; ?>"  type="text" name="lst_cls_prese_dy"  id="lst_cls_prese_dy" /></td>
  </tr>
    <tr>
    <td>17.</td><td class="td_padd"><span>Whether NCC Cadet / Boys Scout / Girl Guide (detail may given )</span></td>
    <td class="td_padd" >
    
       <select class="form-control input-large" name="ncc">
               <option <?php if($ncc=='No' ) { ?>  selected <?php } ?>  value="No">No</option>
                 <option <?php if($ncc=='Yes' ) { ?>  selected <?php } ?> value="Yes">Yes</option>
              
               </select>
  </tr>
  
   
  <tr>
    <td rowspan="2">18.</td><td class="td_padd"><span> Games played or extra curricular activities in which the pupil usually took part</span>    </td>
    <td class="td_padd" >
      <select class="form-control input-large" onChange="game(this.value)" >
         <option <?php if($extra_curricular=='No' ) { ?>  selected <?php } ?>  value="No">No</option>
                 <option <?php if($extra_curricular!='No' ) { ?>  selected <?php } ?> value="Yes">Yes</option>
              
               </select>
               
    <input  class="form-control input-large"  placeholder="Enter Game" <?php  if($extra_curricular=='No' ){ ?>readonly  value="No" <?php } else  if($extra_curricular!='No' ){ ?> value="<?php echo $extra_curricular ; ?>" <?php } ?> type="text"  id="extra_curricular" name="extra_curricular" /> 
    </td>
    </tr>
    <tr>
    <td>
    If yes mention achievement level therin
    </td>
    
    <td>
    <input  class="form-control input-large"   placeholder="Enter Achievement"  <?php  if($extra_curricular=='No' ){ ?>readonly <?php } ?> type="text" value="<?php echo $achievement ; ?>"  id="achievement" name="achievement" /></td>
  </tr>
 
 
    <tr>
    <td>19.</td><td class="td_padd"><span> General Conduct</span></td>
    <td class="td_padd" >
    
       <select class="form-control input-large" name="general_curricular">
                <option <?php if($general_curricular=='Good' ) { ?>  selected <?php } ?>  value="Good">Good</option>
                 <option <?php if($general_curricular=='Very Good' ) { ?>  selected <?php } ?> value="Very Good">Very Good</option>
                 <option <?php if($general_curricular=='Excellent' ) { ?>  selected <?php } ?> value="Excellent">Excellent</option>
               </select>
    
  </tr>
   <tr> 
    <td>20.</td><td class="td_padd"><span> Date of application for Certificate </span></td>
    <td class="td_padd" ><input class="form-control form-control-inline input-large date-picker" value="<?php if($date_application1x=='0000-00-00') {  echo    $current_date=date("d-m-Y"); } else { echo $date_application1;} ?>" placeholder="Click For Calander" type="text" name="date_application" /></td>
  </tr>
   <tr>
    <td>21.</td><td class="td_padd"><span> Date of issue of Certificate</span></td>
    <td class="td_padd" >
	<input class="form-control form-control-inline input-large date-picker" placeholder="Click For Calander" type="text"   value="<?php if($issue_date1x=='0000-00-00') { echo $current_date=date("d-m-Y");  } else {   echo $issue_date1;} ?>"name="issue_date" />
	</td>
  </tr>
   <tr>
    <td>22.</td><td class="td_padd"><span> Reason for leaving the school</span></td>
    <td class="td_padd" ><input class="form-control input-large"  placeholder="Enter Reason" value="<?php echo $reason; ?>" type="text" name="reason" /></td>
  </tr>
    <tr>
    <td>23.</td><td class="td_padd"><span> Any Other remarks</span></td>
    <td class="td_padd" ><input class="form-control input-large"  placeholder="Enter Remarks"  value="<?php echo $remarks; ?>" type="text" name="remarks" /></td>
  </tr>
   
</table>


<button style="margin-left:35%; margin-top:2%" class="btn btn-success" name="submit" type="submit"><i class="fa fa-edit"></i> Submit</button> 
</form> 
			
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
$sel_mnthcode=mysql_query("select * from `mnth_code` where `sno_deu_list`<='12'");
 while($arr_mnthcode=mysql_fetch_array($sel_mnthcode))
 {
 	 $last_mnth_id[]=$arr_mnthcode['id'];
 }
$sel1=mysql_query("select * from stdnt_reg where  `rte`='No' && `id`='".$schlr_no_id."'");
while($arr1=mysql_fetch_array($sel1))
{ 
	//$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr1['id']."' && `status`='1'");
	///$tc=mysql_num_rows($sel_tc);
	//if(empty($tc))
	{
	$amt1=0;
	$schlr_no=$arr1['schlr_no'];
	$schlr_no_id=$arr1['id'];
	$nm=$arr1['fname'];
	$mnm=$arr1['mname'];
	$lnm=$arr1['lname'];
	$f_nm=$arr1['f_name'];
	$hstl=$arr1['hstl'];
	$gndr=$arr1['gndr'];
	$bs_fc=$arr1['bs_fc'];
	$md=$arr1['md'];
	$strm=$arr1['strm'];
	$bus_station=$arr1['bus_station'];
	$adm=$arr1['adm'];
	$document=$arr1['document'];
	$mnth_name='';
	$mmm='';
	$diff_mnth_name='';
	$mnth='';
	$tot=0;
	$mnth_id='';
	$mnth_count='';
	$sel2=mysql_query("select * from mnth_fee_1 where schlr_no_id='$schlr_no_id'");
	while($arr2=mysql_fetch_array($sel2))
	{
		@$tot_submit=$arr2['fee_dp'];
		$sno=$arr2['sno'];
	
		$sel4=mysql_query("select distinct mnth from mnth_fee2 where `mnth_fee1_sno`='$sno'");
		while($arr4=mysql_fetch_array($sel4))
		{
			 @$mnth[]=$arr4['mnth'];				
		}
		
	}
	
	
		$tot=0;
		
		$s1=mysql_query("select id from `cls_fee_comp_setup1` where cls='$cls' && strm='$strm' && medium='$md' && `session`='$session'");
		@$t3=mysql_fetch_array($s1);
		$id=$t3['id'];			
		$xx=0;
		$k=0;
		
		$sel_invoice_edit=mysql_query("select * from `edit_invoice_fee_comp` where `schlr_no_id`='$schlr_no_id'");
		$num_edit_invoice_fee_comp=mysql_num_rows($sel_invoice_edit);
		
		$sel=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id'");
		while($t4=mysql_fetch_array($sel))
		{
			$ft=$t4['m_f_c'];
			$amt=$t4['amt'];
			$freq=$t4['freq'];
			$month_no=$t4['month_no'];
			$data=explode(",", $month_no);
			

			$sel_type=mysql_query("select * from `fee_type` where sno='$ft'");
			$arr_type=mysql_fetch_array($sel_type);
			$fee_type=$arr_type['type'];
			$station=$arr_type['station'];
			if(!empty($num_edit_invoice_fee_comp))
			{
				$sel_invoice=mysql_query("select * from `edit_invoice_fee_comp` where `fee_type`='$ft' && `schlr_no_id`='$schlr_no_id'");
				$arr_invoice=mysql_fetch_array($sel_invoice);
				$fee_type_editinvoice=$arr_invoice['fee_type'];
			}
			
			
		if($gndr=="Male" && $fee_type =="Bus Fee(Boys)" && $station==$bus_station && @$arr1['bs_fc']=="Yes")
		{
			$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
			$t5=mysql_fetch_array($sel5);
			$mfc=$t5['m_f_c'];
		}
		else if($gndr=="Female" && $fee_type =="Bus Fee(Girls)" && $station==$bus_station && @$arr1['bs_fc']=="Yes")
		{
			$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
			$t5=mysql_fetch_array($sel5);
			$mfc=$t5['m_f_c'];
		}
		else if($fee_type != "Bus Fee(Girls)" && $fee_type != "Bus Fee(Boys)")
		{
			$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
			$t5=mysql_fetch_array($sel5);
			$mfc=$t5['m_f_c'];
		}
		if($ft==$mfc)
		{
			$k++;
				
			for($i=1;$i<=12;$i++)
			{
				if($i==1){$mnn="jul";}
				else if($i==2){$mnn="aug";}
				else if($i==3){$mnn="sep";}
				else if($i==4){$mnn="oct";}
				else if($i==5){$mnn="nov";}
				else if($i==6){$mnn="dec";}
				else if($i==7){$mnn="jan";}
				else if($i==8){$mnn="feb";}
				else if($i==9){$mnn="mar";}
				else if($i==10){$mnn="apr";}
				else if($i==11){$mnn="may";}
				else if($i==12){$mnn="jun";}
				$g=$y."".$i; 
				$mn=0;
				$xx++;
				
				for($j=0; $j<sizeof($data); $j++)
				{
					 $t_data=$data[$j];
					 
					 if($i==$t_data)
					 {
						 $mn=$t_data;
						 $kk=0;
						
						 $mnth_data=explode(',', $mnth_count);
						
						 for($m=0; $m<=sizeof($mnth_data); $m++)
							{
								
								if($mn==$mnth_data[$m])
								{
									$kk++;
								}
							}
							if($kk==0)
							{
								 $mmm[]=$mn;
								$mnth_count=implode(',', $mmm);
								
							}
						 
					 }
				}
			}
		}
		}
		
								 
		///// Submit  Month in db //////////

for($mn=0; $mn<sizeof($mnth); $mn++)
{
	 $sel_mnthcode=mysql_query("select * from `mnth_code` where `mnth_name`='".$mnth[$mn]."'");
	 $arr_mnthcode=mysql_fetch_array($sel_mnthcode);
	 $mnth_id[]=$arr_mnthcode['id']; 
}

/////////////////////////////////////////////


//////////////// common data between select month and get month/////	 
$mnth_data=explode(',', $mnth_count);
$diff_month= array_intersect($mnth_data, $last_mnth_id);

foreach ($diff_month as $valid)
{
	$sel_mnthcode=mysql_query("select * from `mnth_code` where `id`='".$valid."'");
	$arr_mnthcode=mysql_fetch_array($sel_mnthcode);
	if(is_array($mnth_id))
	{
		 $diff_mnth_name[]=$arr_mnthcode['mnth_name'];
	}
	else
	{
		 $mnth_name[]=date('M' ,strtotime('2000-'.$arr_mnthcode['month_full_name']).'-01');
	}
	
}

if(is_array($mnth_id))
{
	$nonattendees = array_diff($diff_month, $mnth_id);
	foreach ($nonattendees as $valid)
	{
	
		$sel_mnthcode=mysql_query("select * from `mnth_code` where `id`='".$valid."'");
		 $arr_mnthcode=mysql_fetch_array($sel_mnthcode);
		$mnth_name[]=date('M' ,strtotime('2000-'.$arr_mnthcode['month_full_name']).'-01');
		
	}
}
		/////////////// Due Amount /////////
		$sel=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id'");
		while($t4=mysql_fetch_array($sel))
		{
			$ft=$t4['m_f_c'];
			$amt=$t4['amt'];
			$freq=$t4['freq'];
			$month_no=$t4['month_no'];
			$data=explode(",", $month_no);
			
			$sel_type=mysql_query("select * from fee_type where sno='$ft'");
			$arr_type=mysql_fetch_array($sel_type);
			$fee_type=$arr_type['type'];
			 $station=$arr_type['station'];
			if(!empty($num_edit_invoice_fee_comp))
			{
				$sel_invoice=mysql_query("select * from `edit_invoice_fee_comp` where `fee_type`='$ft' && `schlr_no_id`='$schlr_no_id'");
				$arr_invoice=mysql_fetch_array($sel_invoice);
				$fee_type_editinvoice=$arr_invoice['fee_type'];
			}
			
			if($gndr=="Male" && $fee_type =="Bus Fee(Boys)" && $station==$bus_station && @$arr1['bs_fc']=="Yes")
			{
				$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
				$t5=mysql_fetch_array($sel5);
				$mfc=$t5['m_f_c'];
			}
			else if($gndr=="Female" && $fee_type =="Bus Fee(Girls)" && $station==$bus_station && @$arr1['bs_fc']=="Yes")
			{
				
				$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
				$t5=mysql_fetch_array($sel5);
				$mfc=$t5['m_f_c'];
			}
			else if($fee_type != "Bus Fee(Girls)" && $fee_type != "Bus Fee(Boys)")
			{
				$sel5=mysql_query("select * from `cls_fee_comp_setup2` where setup1_id='$id' && `m_f_c`='$ft'");
				$t5=mysql_fetch_array($sel5);
				$mfc=$t5['m_f_c'];
			}
		
			if($ft==$mfc)
			{
				$k++;
				for($i=1;$i<=12;$i++)
				{
					if($i==1){$mnn="Jul";}
					else if($i==2){$mnn="Aug";}
					else if($i==3){$mnn="Sep";}
					else if($i==4){$mnn="Oct";}
					else if($i==5){$mnn="Nov";}
					else if($i==6){$mnn="Dec";}
					else if($i==7){$mnn="Jan";}
					else if($i==8){$mnn="Feb";}
					else if($i==9){$mnn="Mar";}
					else if($i==10){$mnn="Apr";}
					else if($i==11){$mnn="May";}
					else if($i==12){$mnn="Jun";}
					$g=$y."".$i; 
					$mn=0;
					$xx++;
					for($j=0; $j<sizeof($data); $j++)
					{
						 $t_data1=$data[$j];
						 if($i==$t_data1)
						 {
							 $mn=$t_data1;
						 }
					}
					
					for($j=0; $j<sizeof($mnth_name); $j++)
					{
						 $t_data=$mnth_name[$j];
						 if($mnn==$t_data)
						 {
							$sel_edit_invoice=mysql_query("select * from `edit_invoice` where `schlr_no_id`='$schlr_no_id' && `fee_type`='$ft' && `mnth`='$mnn' ORDER BY id DESC LIMIT 1");
							$num_edit_invoice=mysql_num_rows($sel_edit_invoice);
							$arr_edit_invoice=mysql_fetch_array($sel_edit_invoice);
							if(!empty($num_edit_invoice))
							{
								if($mn == $i) {  $tot+=$arr_edit_invoice['fee'];}
								else 
								{ 
									 $tot+=0; 
									 
								} 
								
							}
							else
							{ 
							
								if($mn == $i) {  $tot+=$amt;}
								else 
								{ 
									 $tot+=0; 
									 
								} 
							}
						 }
					}
					 
					
					
				}
			}
		}



		 $amt_due=$tot;
		
	}
}


$sel1=mysql_query("select * from stdnt_reg where `id`='$schlr_no_id' and `hstl`='Yes'  and `rte`='No'");
while($arr1=mysql_fetch_array($sel1))
{
	$sel_tc=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='".$arr_stdnt['id']."' && `status`='1'");
	$tc=mysql_num_rows($sel_tc);
	if(empty($tc))
	{
	$schlr_no=$arr1['schlr_no'];
	$schlr_no_id=$arr1['id'];
	$nm=$arr1['fname'];
	$mnm=$arr1['mname'];
	$lnm=$arr1['lname'];
	$f_nm=$arr1['f_name'];
	$hstl=$arr1['hstl'];
	$md=$arr1['md'];
	$strm=$arr1['strm'];
	$rg_dt=$arr1['rg_dt'];
	$adm=$arr1['adm'];
	$document=$arr1['document'];
	$sel2=mysql_query("select amount from hstl_fee where schlr_no_id='$schlr_no_id'");
	@$amt1=0;
	while($arr2=mysql_fetch_array($sel2))
	{
	@$amt=$arr2['amount'];
	@$amt1+=@$amt;
	}
	$rg_dt_year_c=date("Y", strtotime($rg_dt));
	$rg_dt_year_n=$rg_dt_year_c+1;
	$rg_dt_year=$rg_dt_year_c."-".$rg_dt_year_n;
		if($rg_dt_year==$session)
		{
			 $status=1;
		}
		else 
		{
			$status=2;
		}
		
	$sel4=mysql_query("select total from hstl_fee_setup where session='$session' && class='$cls' && `status`='$status'");
	$arr4=mysql_fetch_array($sel4);
	$hstl_amt=$arr4['total'];
	$amt_due1=@$hstl_amt-@$amt1;
	
	}
	
}




	$sel=mysql_query("select admsn_doc_id from cls_admsn_doc where class_id='$cls'");
	$arr=mysql_fetch_array($sel);	
	$ad_id=$arr['admsn_doc_id'];
	$data=explode(',' , $ad_id);
	$data_match=explode(',' , $document);
	
	$pending=array_diff($data,$data_match);
	
	
		foreach($pending as $pending_data)
		{
		$b=mysql_query("select * from admsn_doc where `id`='".$pending_data."'");
		while($row=mysql_fetch_array($b))
		{
			$admsn_id=$row['id'];
			$doc=$row['doc'];
			$doc_pending[]=$doc;
		}
	}
				
	if(is_array($doc_pending))
	{	
		$i=0;
		$docs.="Pending Document\\n";
		for($j=0; $j<sizeof($doc_pending); $j++)
		{
			$i++;
			 $docs.=$i." ".$doc_pending[$j]."\\n";
		} 
	
	
	

		
	}


if(!empty($amt_due))
{
	$docs.="\\nMonthly Fee is due - ".$amt_due;
}
if(!empty($amt_due1))
{
	$docs.="\\n\\nHostel Fee is due - ".$amt_due1;
}
if(!empty($amt_due) || !empty($amt_due) || !empty($docs))
{
echo "<script>
		
		if (confirm('Do you want to issue Tc.\\n\\n".$docs."') == false) {
		
		window.open('tc_certificate.php','_self');
				}
				
	</script>";
}
	
footer();
js();?>

</body>
<!-- END BODY -->

</html>