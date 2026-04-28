<?php
require_once("functions.php");
require_once("conn.php");
if(isset($_POST['view']))
{
	$d=$_POST['d'];
	$d1=$_POST['d1'];
	$r1=$_POST['r1'];
	if($r1=="school")
	{
		$r1=$_POST['sch'];
	}
	$r1=$r1;
	$c1=$_POST['c1'];
	if($c1=="class")
	{
		$c1=$_POST['cls'];
	}
	if($c1 !=NULL)
	{
		$c1=$c1;
	}
	ob_start();
	header("location:h_l1.php?d=$d & d1=$d1 & r1=$r1 & c1=$c1");
	ob_flush();
}
?>

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Student Registration | <?php title();?></title>   
<style type="text/css">
 body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #fff;
      }
.form-signin {
        max-width: 700px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
     
	  </style>
	  <script src="datepicker/js/bootstrap-datepicker.js"></script>
    
<script type="text/javascript">
function show() {
	
			  toggleDisabled(document.getElementById("content"));
}

function toggleDisabled(el) {
try {
el.disabled =false ;
}
catch(E){
}
if (el.childNodes && el.childNodes.length > 0) {
for (var x = 0; x < el.childNodes.length; x++) {
toggleDisabled(el.childNodes[x]);
}
}
	}
</script>
<script type="text/javascript">
function hide() {
	
     toggleDis(document.getElementById("content"));
}

function toggleDis(e) {
try {
e.disabled =true;
}
catch(E){
}
if (e.childNodes && e.childNodes.length > 0) {
for (var x = 0; x < e.childNodes.length; x++) {
toggleDis(e.childNodes[x]);
}
}
}
</script>
<script type="text/javascript">
function endis() {
Disabled(document.getElementById("chk"));
}
function Disabled(d) {
try {
d.disabled = d.disabled ? false : true;
}
catch(E){
}
if (d.childNodes && d.childNodes.length > 0) {
for (var x = 0; x < d.childNodes.length; x++) {
Disabled(d.childNodes[x]);
}
}
}
</script>
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
	  <?php
css(); js();
?>
	  
</head>  
<body>  
<div class="container">

<?php
header_image();
menu();?>
<form name="frm" method="post">

From <input type="date" name="d" id="datepicker"/>
To <input type="date" name="d1" id="datepicker1"/>
<br/><br/>

<input type="radio" name="r1" value="all" onclick="hide()"/>All Hostlers<br/>

<input type="radio" name="r1" value="school" onclick="show()"/>All Hostelers of Schools
  <div id="content">
<select name="sch" disabled>
<?php $sel=mysql_query("select schl from school");
while($arr=mysql_fetch_array($sel))
{
$schl=$arr['schl'];
	echo '<option value="'.$schl.'">'.$schl.'</option>';
}
?>    </select>
</div>
<br/>
 <input type="checkbox" name="c1" value="class" onclick="endis()" />Class
 <!--<div id="chk"> -->
<select name="cls">
	<?php $sel=mysql_query("select cls from class");
while($arr=mysql_fetch_array($sel))
{
$cls=$arr['cls'];
	echo '<option value='.$cls.'>'.$cls.'</option>';
}
?>
    </select>
    
 <!--</div> -->
<br/><br/>

<button class="btn btn-info" name="view"  type="submit">View</button> 
<button class="btn btn-info" name="close"  type="submit">Close</button> 
<button class="btn btn-info" name="print"  type="submit">Print</button>
</form>
</br>
<?php
footer();?>
</div>
</body>  
 </html>  
            
