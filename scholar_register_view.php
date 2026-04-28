<?php
require_once("conn.php");
include("authentication.php");
include("function.php");
?>
<html>
<head>
<style>
table
{
border-collapse:collapse;
}
</style>
<style media="print">
.prnt
{
	page-break-after:always;
}
</style>

<title>Scholar Register | <?php title();?></title>
<?php
print_css();
logo();
?>
</head>

<body>

<?php
if($_GET['view']=='scholar')
{
	$schlr_from=$_GET['from'];
	$schlr_to=$_GET['to'];
	$sel=mysql_query("select `id`,`schlr_no`,`cls`,`fname`,`mname`,`lname`,`f_name`,`rg_dt`,`dob`,`m_name`,`padd`,`c2`,`p2`,`ps_name`,`l_cls` from `stdnt_reg` where `schlr_no`>='$schlr_from' && `schlr_no`<='$schlr_to' ");
	
}
else if($_GET['view']=='date')
{
	$date_from=date('Y-m-d', strtotime($_GET['from']));
	$date_to=date('Y-m-d', strtotime($_GET['to']));
	$sel=mysql_query("select `id`,`schlr_no`,`cls`,`fname`,`mname`,`lname`,`f_name`,`rg_dt`,`dob`,`m_name`,`padd`,`c2`,`p2`,`ps_name`,`l_cls` from `stdnt_reg` where `rg_dt`>='$date_from' && `rg_dt`<='$date_to' ");
}
else
{
	$schlr_no_id=$_GET['schlr_no_id'];
	$sel=mysql_query("select `id`,`schlr_no`,`cls`,`fname`,`mname`,`lname`,`f_name`,`rg_dt`,`dob`,`m_name`,`padd`,`c2`,`p2`,`ps_name`,`l_cls` from `stdnt_reg` where `id`='$schlr_no_id'");
}

while($arr=mysql_fetch_array($sel))
{
$cls=$arr['cls'];
$schlr_no=$arr['schlr_no'];

$sel1=mysql_query("select `cls` from class where sno='".$arr['cls']."'");
$arr1=mysql_fetch_array($sel1);
$class=$arr1['cls'];

$sel1=mysql_query("select `cls` from class where sno='".$arr['l_cls']."'");
$arr1=mysql_fetch_array($sel1);
$previous_class=$arr1['cls'];

$sel_school=mysql_query("select * from `school`");
$arr_school=mysql_fetch_array($sel_school);
?>
<div class="prnt" style="margin-right:1%;">
<table width="100%" align="center"><tr><td align="center"><h3><?php echo $arr_school['school']."<br/>".$arr_school['address']; ?></h3> </td></tr></table>
<table width="100%" align="center">
			<tr>
            	<th width="27%" align="center">Record(A)</th>
                <th width="36%" align="center">Scholar's Register</th>
                <th width="37%" align="center">Scholar No. : <?php echo $schlr_no; ?></th>
            </tr>
</table>
<table   width="100%" align="center" border="1" >
        	<tr>
            	<td align="center">Date of Admission</td>
                <td align="center">Date of Removal/leaving</td>
                <td align="center">Cause of removal/leaving</td>
                
            </tr>
            <tr>
            	<th><?php echo date("d-M-Y", strtotime($arr['rg_dt'])); ?></th>
                <td></td>
                <td></td>
            </tr>
           
  </table>
<table width="100%" align="center">
			<tr>
            	<th style="text-align:left" width="21%">Record(B)</th>
                <td width="22%"></td>
                <td width="8%"></td>
                <td></td>
            </tr>
            <tr>    
                <td >Name of scholar</td>
              <th style="text-align:left"><?php echo $arr['fname']." ".$arr['mname']." ".$arr['lname']; ?></th>
                <td></td>
                <td></td>
            </tr>
            <tr>    
                <td>Date of birth(in figure)</td>
               	<th  style="text-align:left"><?php echo date("d-m-Y", strtotime($arr['dob'])); ?></th>
                <td>In words</td>
                <th  width="30%" style="text-align:left"><?php    echo convert_number_to_words((int) date("d", strtotime($arr['dob'])))." ".date("M", strtotime($arr['dob']))." ".convert_number_to_words(date("Y", strtotime($arr['dob']))); ?></th>
            </tr>
         </table>
         		<table border="1" width="100%" align="center">
           				 <tr>
            					<td rowspan="2" width="30%">
                					<table border="0" width="100%" height="100%">
                                        <tr>
                                            <td>Name of Father</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:left"><?php echo $arr['f_name']; ?></th>
                                        </tr>
                                        <tr>
                                        <td >Name of Mother</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:left"><?php echo $arr['m_name']; ?></th>
                                        </tr>
                                        <tr>
                                            <td >Name of Guardian</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:left"><?php echo $arr['g_name']; ?></th>
                                        </tr>
                   				  </table>
                				</td>
                                <td width="30%" height="35%" align="center"> Occupation & Address </td>
                                <td align="center">The last school, attended <br/>before this school</td>
                                <td align="center">The highest class passed <br/> at the previous school at the joining</td>
           				 </tr>
               	  <tr>
                              	<th  style="text-align:left"><?php echo $arr['padd']." ".$arr['c2']." ".$arr['p2']; ?></th>
                              	<th style="text-align:left"><?php echo $arr['ps_name']; ?></th>
                             	 <th style="text-align:left"><?php echo $previous_class; ?></th>
               	  </tr>       
   		 </table>
         
  <table width="100%" align="center">
         				<tr>
                    			<th style="text-align:left;">Record(C)</th><th style="text-align:right;">Record(D)</th>
                        </tr>
         </table>
 			
         <table width="100%" border="1" align="center">
         				<tr>
                        		<td colspan="2" align="center">Addmission of  promotion</td>
                                <td rowspan="2" align="center">Date of passing  standard or class  from this school</td>
                         		<td colspan="2" align="center">Attendance</td>
                                <td colspan="2" align="center">Rank in class</td>
                                <td rowspan="2" align="center">Remarks</td>
                                <td rowspan="2" align="center">(Sign.)Entries Made by</td>
                                <td rowspan="2" align="center">Conduct & work  during school Year</td>
                                
                         </tr>
         				<tr>
         				  <td align="center">Class</td>
         				  <td align="center">Date</td>
         				  <td align="center">Total number  of School meeting</td>
         				  <td align="center">Number of meeting  on which present</td>
         				  <td align="center">Number of scholar  in class</td>
         				  <td align="center">Place as shown by  final examination in class</td>
                      </tr>
                      <?php
					  $sel_class=mysql_query("select `sno`,`cls_roman` from `class`");
					  while($arr_class=mysql_fetch_array($sel_class))
					  {
						  $sel_stdnt_result=mysql_query("select `results`,`over_all_grade` from `stdnt_result` where `schlr_no`='".$schlr_no."' && `next_class_id`='".$arr_class['sno']."'");
						  $arr_stdnt_result=mysql_fetch_array($sel_stdnt_result);
					  	  
							  ?>
							  <tr>
								<td align="center"><?php echo $arr_class['cls_roman']; ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td align="center"><?php echo $arr_stdnt_result['over_all_grade']; ?></td>
								<td align="center"><?php echo $arr_stdnt_result['results']; ?></td>
								<td></td>
								<td></td>
							</tr>
							<?php
						  
					  }
					  ?>
         </table>
         <table width="100%" align="center">
         <tr>
         <td colspan="2">1. Certified that the above Scholar's Register has been posted up to date on Scholar's leaving as required by the Rule. </td></tr>
         <tr><td colspan="2"> 2. Certified that noSchool feeis due Copy given to/Copy sent by post.</td>
         </tr>
         <tr>
          <td style="text-align:left;">Date: </td><td style="text-align:right;">PRINCIPAL</td>
          </tr>
         </table>
         </div>
         <?php
}
?>

</body>
</html>