<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
$find=$_GET['name'];
  $data=mysql_query("select * from `class` where cls='$find'");
	   $row1=mysql_fetch_array($data);
	   
		 $sno =  $row1['sno'];

?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
css();
?>
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
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
	 
    <h3 style="margin-left:30%"><b> List of Candidates For Admission</b> </h3>
<h4 style="margin-left:45%"><b> Class</b> <?php echo $class ?> </h4>

<?php
$class=0;
  $sql_=("select * from stdnt_reg where `cls`='$sno'");
			$sql=mysql_query($sql_);
		
?>
<form>
<div style="width:80%; margin-left:10%; margin-top:2%">
<table class="table table-bordered table-hover">
<tr>
<td class="success" style="text-align:center;"> <label> Candidate's Name </label> </td>
<td class="active" style="text-align:center;"> <label> Father's Name </label> </td>
<td class="danger" style="text-align:center;"> <label> Test Date</label> </td>
<td class="success" style="text-align:center;"> <label> Interview Date </label> </td>
<td class="active" style="text-align:center;"> <label>Time </label> </td>
</tr>
<?php while($r=mysql_fetch_array ($sql))
{ 
$udt=date("d-m-Y",strtotime($r['test_date'])); 
$dt=date("d-m-Y",strtotime($r['intrv_date'])); 
echo
"<tr>"."<td>". $r['fname']." ".$r['lname']. "</td>".
"<td>".$r['f_name']."</td>".
"<td>".$udt."</td> ".
"<td> " .$dt."</td>".
"<td>". $r ['time']."</td>"."</tr>";
} ?>
</table>
<button class="btn btn-info" style="margin-left:38%"  align="left" name="btn" type="submit" onClick="window.print()" ><i class="fa fa-print"></i>Print</button>
<button class="btn btn-default button-previous" style="width:8%"  name="btn" type="button" onclick="window.location.href='admsn_clist.php'" >Back</button></td>

</div>
</form>
			
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