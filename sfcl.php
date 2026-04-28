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
            <script type="text/javascript" src="jquery.min.js"></script>
      <SCRIPT language="javascript">
$(function(){
 
    // add multiple select / deselect functionality
    $("#selectall").click(function () {
          $('.case').attr('checked', this.checked);
    });
 
    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $(".case").click(function(){
 
        if($(".case").length == $(".case:checked").length) {
            $("#selectall").attr("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }
 
    });
});
</SCRIPT>
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

$('#all').on('change', function() {
    if (!$(this).is(':checked')) {
        $('.fees').attr('checked', false);   
    } else {
        $('.fees').attr('checked', true);
    }
});
</script>
      <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
	  <?php
css();
?>
	  
</head>  
<body>  
<div class="container">

<?php
header_image();
menu();?>
<form name="sl" method="post">
<input type="radio" name="r1" onClick="hide()"/>All Classes<br/>
<input type="radio" name="r1" onClick="show()"/>Class
<div id="content">
<select name="cls" disabled>
<?php $sel=mysql_query("select cls from class");
while($arr=mysql_fetch_array($sel))
{
$cls=$arr['cls'];
	echo '<option>'.$cls.'</option>';
}
?>    </select>
</div>
<br/>
From <input type="date" name="d" id="datepicker"/>
To <input type="date" name="d1" id="datepicker1"/>
<br/><br/>
<input type="checkbox" id="selectall"/>Cheack All
<br/><br/>
<input type="checkbox" name="case" class="case"/>General Fees
<br/>
<input type="checkbox" name="case" class="case"/>Monthly Fees
<br/>
<input type="checkbox" name="case" class="case"/>Hostle Fees
<br/>
<input type="checkbox" name="case" class="case"/>Caution Fees
<br/>
<input type="checkbox" name="case" class="case"/>Form Fees
<br/>
<input type="checkbox" name="case" class="case"/>Registration Fees
<br/>
<input type="checkbox" name="case" class="case"/>Adhoc Fees
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
            
