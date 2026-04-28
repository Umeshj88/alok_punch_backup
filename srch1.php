<?php
require_once("conn.php");
require_once("functions.php");
if(isset($_POST['btn']))
{
	session_start();
	$_SESSION['form_no']=$_POST['r1'];
	ob_start();
	header("location: frm_rtrn.php");
	ob_flush();
}
if(isset($_POST['cncle']))
{
	ob_start();
	header("location: frm_rtrn.php");
	ob_flush();
}
?>

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Hostel Fee Deposition | <?php title();?></title>   
<style type="text/css">
 body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #fff;
      }
.form-signin {
        max-width: 700px;
        padding: 19px 70px 29px;
        margin: 0 30px 20px;
        background-color: #fff;
        
      }
	  </style>
	  <script type="text/javascript">


if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
function showUsert1()
{
		    if(xmlhttp)
			 {
			 var query="?qt1="+document.getElementById("t1").value;
			 xmlhttp.open("GET","frm_rtrn_fetch.php" +query ,true);
xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	

    }

  }


xmlhttp.send();

}
}
function showUsert2()
{
		    if(xmlhttp)
			 {
			 var query="?qt2="+document.getElementById("t2").value;
			 xmlhttp.open("GET","frm_rtrn_fetch.php" +query ,true);
xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	

    }

  }


xmlhttp.send();

}
}

function showUsert3()
{
		    if(xmlhttp)
			 {
			 var query="?qt3="+document.getElementById("t3").value;
			 xmlhttp.open("GET","frm_rtrn_fetch.php" +query ,true);
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.send();
}
}
</script>
<?php
css(); js();
?>
</head>  
<body>  
<div class="container">
<?php header_image(); menu(); ?>
<form class="form-signin" method="POST"> 
<table align="center" border="1px" width="70%">
<tr>
<td><strong>Form No.</strong></td>
<td><strong>Class</strong></td>
<td><strong>Father Name</strong></td>
</tr>
<tr>
<td><input type="text" name="t1" id="t1" onKeyUp="showUsert1()"/></td>
<td><input type="text" name="t2" id="t2" onKeyUp="showUsert2()"/></td>
<td><input type="text" name="t3" id="t3" onKeyUp="showUsert3()"/></td>
</tr>

</table>
<table id="txtHint" align="center" border="1px" width="100%">

<tr>
<td><strong>Select</strong></td>
<td><strong>Form No.</strong></td>
<td><strong>Class</strong></td>
<td><strong>First Name</strong></td>
<td><strong>Father's Name</strong></td>
</tr>
<?php

	$sel=mysql_query("SELECT * FROM `form_issue` WHERE `return` = ''");
while($arr=mysql_fetch_array($sel))
{
	$form_no=$arr['form_no'];
	$cls=$arr['class'];
	$name=$arr['name'];
	$fname=$arr['fname'];
echo "<tr>
<td>
<input type='radio' name='r1' value='".$form_no."'/></td>
<td>".$form_no."</td>
<td>".$cls."</td>
<td>".$name."</td>
<td>".$fname."</td>
</tr>";
}
?>
</table>
</br>
<button class="btn btn-info" name="btn" type="submit">Ok</button> &nbsp;&nbsp;&nbsp; 
<button class="btn btn-info" name="cncle" type="submit">Cancle</button>  
</form> 
<?php
footer();?>
</div>
   <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
</body>  
 </html>  
            
