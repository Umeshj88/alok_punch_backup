<?php
require_once("conn.php");
include("authentication.php");
require_once("function.php");
$class=$_GET['class'];
$r2=$_GET['r2'];
$list=$_GET['list'];
?>
<html>
<head>
<title>Bus List and Hostel List</title>
<?php print_css();
  ?>

</head>
<body>
<table style="width:100%;">
<tr>
 <?php
if($list==1)
	{
		?>
		<th style="font-size:16px"> Bus List </th>
		<?php
	}
	if($list==2)
	{
		?>
		<th style="font-size:16px"> Hostel List </th>
		<?php
	}
?>
</tr>

</table>


<table class="table table-bordered" id="sample_2" width="100%">
<thead>
<tr>
    <th>Sr. No.</th><th>Scholar No.</th><th>Name</th><th>Father's Name</th><th>Mother's Name</th><th>Gender</th><th>Class</th><th>Section</th>
    
    <th>Medium</th><th>Stream</th>
    <?php
	if($list==1)
		{
			?>
            <th>Bus</th>
            <?php
		}
		if($list==2)
		{
			?>
            <th>Hostel</th>
            <?php
		}
    ?>
	
   
</tr>
</thead>
<tbody>
<?php
if($r2==1)
{
    $i=0;
	$sel_class=mysql_query("select `sno` from `class`");
	while($arr_class=mysql_fetch_array($sel_class))
	{
		$class=$arr_class['sno'];
		if($list==1)
		{
			$sel_stdnt=mysql_query("select * from stdnt_reg where cls='$class' && `bs_fc`='Yes' && `continoue_discontinoue_status`='0'");
		}
		if($list==2)
		{
			$sel_stdnt=mysql_query("select * from stdnt_reg where cls='$class' && `hstl`='Yes' && `continoue_discontinoue_status`='0'");
		}
		while($arr_stdnt=mysql_fetch_array($sel_stdnt))
		{
			
				$sel_cls=mysql_query("select * from `class` where `sno`='".$arr_stdnt['cls']."'");
				$arr_cls=mysql_fetch_array($sel_cls);
				
				$sel_strm=mysql_query("select * from stream where sno='".$arr_stdnt['strm']."'");
				$row_strm=mysql_fetch_array($sel_strm);
				
				$sel_sec=mysql_query("select * from section where sno='".$arr_stdnt['sec']."'");
				$row_sec=mysql_fetch_array($sel_sec);
				
				
				$sel_md=mysql_query("select * from medium where sno='".$arr_stdnt['md']."'");
				$row_md=mysql_fetch_array($sel_md);
				?>
				
			   
				<tr>
					<td><?php echo ++$i; ?></td><td><?php echo $arr_stdnt['schlr_no']; ?></td>
					<td><?php echo $arr_stdnt['fname']." ".$arr_stdnt['lname']; ?></td><td><?php echo $arr_stdnt['f_name']; ?></td><td><?php echo $arr_stdnt['m_name']; ?></td>
                    <td><?php echo $arr_stdnt['gndr']; ?></td><td><?php echo $arr_cls['cls']; ?></td><td><?php echo $row_sec['section']; ?></td>
					
					<td><?php echo $row_md['medium']; ?></td><td><?php echo $row_strm['strm']; ?></td>
                     <?php
					if($list==1)
						{
							?>
							<td><?php echo $arr_stdnt['bs_fc']; ?></td>
							<?php
						}
						if($list==2)
						{
							?>
							<td><?php echo $arr_stdnt['hstl']; ?></td>
							<?php
						}
					?>
					
				</tr>
				 <?php
			
		}
	}
    
} 
else if($r2==2)
{
    $i=0;
	$condition='';
	$stream=$_GET['stream'];
	$sec=$_GET['sec'];
	if(!empty($sec))
	{
		$condition.=" and `sec`='".$sec."'";
	}
	if(!empty($sec))
	{
		$condition.=" and `strm`='".$stream."'";
	}
	if($list==1)
	{
		$sel_stdnt=mysql_query("select * from stdnt_reg where cls='$class' && `bs_fc`='Yes' && `continoue_discontinoue_status`='0' $condition");
	}
	if($list==2)
	{
		$sel_stdnt=mysql_query("select * from stdnt_reg where cls='$class' && `hstl`='Yes' && `continoue_discontinoue_status`='0'");
	}
    while($arr_stdnt=mysql_fetch_array($sel_stdnt))
    {
        
            $sel_cls=mysql_query("select * from `class` where `sno`='".$arr_stdnt['cls']."'");
            $arr_cls=mysql_fetch_array($sel_cls);
            
            $sel_strm=mysql_query("select * from stream where sno='".$arr_stdnt['strm']."'");
            $row_strm=mysql_fetch_array($sel_strm);
            
            $sel_sec=mysql_query("select * from section where sno='".$arr_stdnt['sec']."'");
            $row_sec=mysql_fetch_array($sel_sec);
            
           
            
            $sel_md=mysql_query("select * from medium where sno='".$arr_stdnt['md']."'");
            $row_md=mysql_fetch_array($sel_md);
            ?>
            <tr>
					<td><?php echo ++$i; ?></td><td><?php echo $arr_stdnt['schlr_no']; ?></td>
					<td><?php echo $arr_stdnt['fname']." ".$arr_stdnt['lname']; ?></td><td><?php echo $arr_stdnt['f_name']; ?></td><td><?php echo $arr_stdnt['m_name']; ?></td>
                    <td><?php echo $arr_stdnt['gndr']; ?></td><td><?php echo $arr_cls['cls']; ?></td><td><?php echo $row_sec['section']; ?></td>
					
					<td><?php echo $row_md['medium']; ?></td><td><?php echo $row_strm['strm']; ?></td>
					 <?php
					if($list==1)
						{
							?>
							<td><?php echo $arr_stdnt['bs_fc']; ?></td>
							<?php
						}
						if($list==2)
						{
							?>
							<td><?php echo $arr_stdnt['hstl']; ?></td>
							<?php
						}
					?>
				</tr>
             <?php
        
    }
    
} ?>
</tbody>
</table>

</body>
					
		

</html>