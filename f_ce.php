<?php
require_once("functions.php");
require_once("conn.php");
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
      
<!--///////////////////////       show()        //////////////////////////-->

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
<!--///////////////////////       hide()        //////////////////////////-->

<script type="text/javascript">
function hide2() {
	
     toggleDis2(document.getElementById("btt"));
}

function toggleDis2(e2) {
try {
e2.disabled =true;
}
catch(E){
}
if (e2.childNodes && e2.childNodes.length > 0) {
for (var x = 0; x < e2.childNodes.length; x++) {
toggleDis2(e2.childNodes[x]);
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

<!--///////////////////////       bt()        //////////////////////////-->
<script type="text/javascript">
function bt() {
	
     Dis(document.getElementById("btt"));
}

function Dis(e1) {
try {
e1.disabled =false;
}
catch(E){
}
if (e1.childNodes && e1.childNodes.length > 0) {
for (var x = 0; x < e1.childNodes.length; x++) {
Dis(e1.childNodes[x]);
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
<form name="sl" method="post">

<input type="radio" name="r2" onClick="hide(),hide2()"/>All Students<br/>
<input type="radio" name="r2" onClick="show(),hide2()"/>All Students Of Class
<div id="content">
<select name="cls" disabled>
<?php $sel=mysql_query("select cls from class");
while($arr=mysql_fetch_array($sel))
{
$cls=$arr['cls'];
	echo '<option>'.$cls.'</option>';
}
?>    </select>
    <select name="cat" disabled>
	<option>General</option>
    </select>
    </div>
    <br/>
<input type="radio" name="r2" onClick="bt(),hide()"/>Specified Students
<div id="btt">
<input type="text" name="t1" disabled/>
<button class="btn btn-info" name="Search Student"  type="submit" disabled>Search Student</button> 
</div>
<br/><br/>

From <input type="date" name="d" id="datepicker"/>
To <input type="date" name="d1" id="datepicker1"/>
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
            
