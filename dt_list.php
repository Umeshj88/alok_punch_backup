<?php
require_once("conn.php");
require_once("functions.php");
extract($_POST); 
?>

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Admission List | <?php title();?></title>   
<?php
css(); js();
?> 	  	
</head> 

<body>
<div class="container">
<?php
header_image();
menu();
?>
</br></br>
<h3 style="text-align:center"> List of Candidates For Admission </h3>
<hr> </hr>

<?php $u=date("d-m-Y",strtotime($test_date)); ?>

<h5 style="text-align:center"> Test Date <?php echo $u ?> </h5>
</br>

&nbsp;&nbsp;&nbsp;&nbsp;
<button class="btn btn-info"  align="left" name="btn" type="submit" onClick="window.print()" >Print</button> &nbsp;&nbsp;&nbsp;&nbsp;
<button class="btn btn-info"  name="btn" type="submit" onclick="window.location.href='admsn_dlist.php'" >Back</button></td>

<?php
  $sql_="select * from frm_rtrn where test_date='$test_date'";
			$sql=mysql_query($sql_);
			
		
?>
<form>
<table width="700px" align="center" border="1">
<tr>
<td style="text-align:center;"> <b> Candidate's Name </b> </td>
<td style="text-align:center;"> <b> Father's Name </b> </td>
<td style="text-align:center;"> <b> Class</b> </td>
<td style="text-align:center;"> <b> Test Time</b> </td>
<td style="text-align:center;"> <b> Interview Date </b> </td>
</tr>
<?php while($r=mysql_fetch_array ($sql))
{
$dt=date("d-m-Y",strtotime($r['intrv_date'])); 
echo
"<tr >"."<td>". $r['name']. "</t<d>".
"<td>".$r['fname']."</td>".
"<td>".$r['class']."</td> ".
"<td>".$r['time']."</td> ".
"<td> " .$dt."</td>";
} ?>
</table>
</form>
<?php
footer();?>
</div>
</body>
</html>
