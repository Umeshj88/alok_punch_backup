<?php
require_once("conn.php");
include("authentication.php");
require_once("function.php");
  $r1=$_GET['r1'];
?>
<html>
<head>
<title>Pending Document Report | <?php title();?></title>
<?php logo(); print_css(); ?>
</head>
<body class="white-color-display">
<?php
$k=0;
$i=0;
if($r1=='All Classes')
{
	$sel_cls=mysql_query("select * from class");
 	while($arr_cls=mysql_fetch_array($sel_cls))
	{ 
		 $cls=$arr_cls['sno'];
		 $sel=mysql_query("select * from `stream`");
		 while($arr=mysql_fetch_array($sel))
		 {
		
			$sr_no=0;
			$k=0;
		$sel_stdnt=mysql_query("select * from stdnt_reg where cls='$cls' && strm='".$arr['sno']."' && `continoue_discontinoue_status`='0'");
		while($arr_stdnt=mysql_fetch_array($sel_stdnt))
		{
			 $schlr_no_id=$arr_stdnt['id'];
			 $sel_temp_tc_stdnt=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='$schlr_no_id' && `status`='1'");
			 $cnt_temp_tc_stdnt=mysql_num_rows($sel_temp_tc_stdnt);
			
			if(empty($cnt_temp_tc_stdnt))
			{  
			$schlr_no=$arr_stdnt['schlr_no'];
			
			$nm=$arr_stdnt['fname'];
			$lnm=$arr_stdnt['lname'];
			$f_nm=$arr_stdnt['f_name'];
			$hstl=$arr_stdnt['hstl'];
			$gndr=$arr_stdnt['gndr'];
			$bs_fc=$arr_stdnt['bs_fc'];
			$md=$arr_stdnt['md'];
			
			$session=$arr_stdnt['adm'];
			$adm_class_id=$arr_stdnt['adm_class_id'];
			$document=$arr_stdnt['document'];
			
			$sel_cls_admsn_doc=mysql_query("select admsn_doc_id from cls_admsn_doc where class_id='$adm_class_id'");
			$arr_cls_admsn_doc=mysql_fetch_array($sel_cls_admsn_doc);	
			$ad_id=$arr_cls_admsn_doc['admsn_doc_id'];
			if(!empty($ad_id))
			{
				$data=explode(',' , $ad_id);
				$data_match=explode(',' , $document);
				$pending_doc = array_diff($data, $data_match);
				$j=0;
				
				foreach ($pending_doc as $valid)
				{
					$sel_doc=mysql_query("select * from admsn_doc where `id`='$valid'");
					$arr_doc=mysql_fetch_array($sel_doc);
					if($k==0)
					{ $k++;  $i++; ?>
						<table style="width:100%;">
						<tr><td align="left" style="font-size:16px"><b>Class : </b><?php echo $arr_cls['cls']; ?></td>
						<td align="left" style="font-size:16px"><b>Stream : </b><?php echo $arr['strm']; ?></td>
						<td align="right" style="font-size:16px"><b>Date : </b><?php echo date('d-M-Y'); ?></td></tr>
						</table>
						<table  class="table table-bordered" style="width:100%;">
						<thead>
						<tr>
						<th>SNo.</th><th>Scholar No.</th><th>Student Name</th><th>Session of Adm.</th><th>Class of Adm.</th><th>Pending Document</th>
						</tr>
						</thead>
						<tbody>
						<?php
					}
					if($j==0)
					{ 
						 $cl_adm=mysql_query("select * from class where `sno`='".$adm_class_id."'");
						 $arr_adm=mysql_fetch_array($cl_adm);
						 $class=$arr_adm['cls'];
						?>
						
						 <tr>
						<td><?php echo ++$sr_no; ?></td>
						<td><?php echo $schlr_no; ?></td>
						<td><?php echo $nm." ".$lnm." S/O ".$f_nm; ?></td>
						<td><?php echo $session; ?></td>
						<td><?php echo $class; ?></td>
						<td width="30%">
						<?php
					}
					$admsn_id=$arr_doc['id'];
					$doc=$arr_doc['doc'];
					echo ++$j.". ".$doc.'<br/>';
				}
				if($j==0)
				{
					?>
					</td>
					</tr>
					<?php
				}
			}
		}
		}
		
 if($i==1)
		 {
			 ?>
             </tbody>
            </table>
            <br/>
            <table style="width:100%; border-top:dashed; color:#000;">
            <tr>
            <td></td>
            </tr>
            </table>
			
             <br/>
			 <?php
			 $i=0;
		 }
		 }
			
	
		 
	}
	
}
else
{
	$cls=$_GET['cls'];
	$stream=$_GET['stream'];
	$sec=$_GET['sec'];
	$condition='';
	if(!empty($sec))
	{
		$sel_sec=mysql_query("select * from `section` where `sno`='$sec'");
		$row_sec=mysql_fetch_array($sel_sec);
		
		$condition.=" and sec='".$sec."'";
		?> &nbsp; Section :- <?php echo $row_sec['section']; 
	}
	if(!empty($stream))
	{
		$sel=mysql_query("select * from `stream` where `sno`='$stream'");
		$arr=mysql_fetch_array($sel);
		
		$condition.=" and strm='".$stream."'";
	}
	$sel_cls=mysql_query("select * from class where sno='$cls'");
 	while($arr_cls=mysql_fetch_array($sel_cls))
	{ 
		 $cls=$arr_cls['sno'];
		
		?>
		<table style="width:100%;">
		<tr><td align="left" style="font-size:16px"><b>Class : </b><?php echo $arr_cls['cls']; ?></td>
        <td align="left" style="font-size:16px"><b>Stream : </b><?php echo $arr['strm']; ?></td>
        <td align="right" style="font-size:16px"><b>Date : </b><?php echo date('d-M-Y'); ?></td></tr>
		</table>
		<table  class="table table-bordered" style="width:100%;">
		<thead>
		<tr>
		<th>SNo.</th><th>Scholar No.</th><th>Student Name</th><th>Session of Adm.</th><th>Class of Adm.</th><th>Pending Document</th>
		</tr>
		</thead>
        <tbody>
		<?php
		$sr_no=0;
		
		$sel_stdnt=mysql_query("select * from stdnt_reg where cls='$cls' && `continoue_discontinoue_status`='0' $condition");
		while($arr_stdnt=mysql_fetch_array($sel_stdnt))
		{
			$schlr_no=$arr_stdnt['schlr_no'];
			$schlr_no_id=$arr_stdnt['id'];
			$sel_temp_tc_stdnt=mysql_query("select * from `tc_serial_no` where `schlr_no_id`='$schlr_no_id' && `status`='1'");
			$cnt_temp_tc_stdnt=mysql_num_rows($sel_temp_tc_stdnt);
			
			if(empty($cnt_temp_tc_stdnt))
			{  
			$nm=$arr_stdnt['fname'];
			$lnm=$arr_stdnt['lname'];
			$f_nm=$arr_stdnt['f_name'];
			$hstl=$arr_stdnt['hstl'];
			$gndr=$arr_stdnt['gndr'];
			$bs_fc=$arr_stdnt['bs_fc'];
			$md=$arr_stdnt['md'];
			$strm=$arr_stdnt['strm'];
			$session=$arr_stdnt['adm'];
			$document=$arr_stdnt['document'];
			$adm_class_id=$arr_stdnt['adm_class_id'];
			$sel_cls_admsn_doc=mysql_query("select admsn_doc_id from cls_admsn_doc where class_id='$adm_class_id'");
			$arr_cls_admsn_doc=mysql_fetch_array($sel_cls_admsn_doc);	
			$ad_id=$arr_cls_admsn_doc['admsn_doc_id'];
			if(!empty($ad_id))
			{
				$data=explode(',' , $ad_id);
				$data_match=explode(',' , $document);
				$pending_doc = array_diff($data, $data_match);
				
				$j=0;
				foreach ($pending_doc as $valid)
				{
					$sel_doc=mysql_query("select * from admsn_doc where `id`='$valid'");
					$arr_doc=mysql_fetch_array($sel_doc);
					if($j==0)
					{ 
						 $cl_adm=mysql_query("select * from class where `sno`='".$adm_class_id."'");
						 $arr_adm=mysql_fetch_array($cl_adm);
						 $class=$arr_adm['cls'];
						 ?>
						 <tr>
						<td><?php echo ++$sr_no; ?></td>
						<td><?php echo $schlr_no; ?></td>
						<td><?php echo $nm." ".$lnm." S/O ".$f_nm; ?></td>
						<td><?php echo $session; ?></td>
						<td><?php echo $class; ?></td>
						<td width="30%">
						<?php
					}
					$admsn_id=$arr_doc['id'];
					$doc=$arr_doc['doc'];
					echo ++$j.". ".$doc.'<br/>';
				}
				if($j==0)
				{
					?>
					</td>
					</tr>
					<?php
				}
			}
		}
		}
		?>
	</tbody>
	</table>
<?php
	}
}

?>
</tbody>
</table>
</body>
</html>