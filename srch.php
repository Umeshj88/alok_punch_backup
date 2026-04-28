<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['btn']))
{
	session_start();
	$_SESSION['form_no']=$_POST['r1'];
	ob_start();
	header("location: reg.php");
	ob_flush();
}
if(isset($_POST['cncle']))
{
	ob_start();
	header("location: reg.php");
	ob_flush();
}
?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
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
			 xmlhttp.open("GET","frm_fetch.php" +query ,true);
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
			 xmlhttp.open("GET","frm_fetch.php" +query ,true);
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
			 xmlhttp.open("GET","frm_fetch.php" +query ,true);
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
	<form class="form-signin" method="POST"> 
<div style="width:96%; margin-left:2%">
	<table width="100%">
        <tr>
       		 <td align="center"><label>Form No.</label></td>
             <td><input class="form-control" type="text" name="t1" id="t1" onKeyUp="showUsert1()"/></td>

        	 <td align="center"><label>Class</label></td>
             <td><input class="form-control" type="text" name="t1" id="t1" onKeyUp="showUsert1()"/></td>

       		 <td align="center"><label>Father Name</label></td>
             <td><input class="form-control" type="text" name="t3" id="t3" onKeyUp="showUsert3()"/></td>

        </tr>
	</table>
<div style="width:96%; margin-left:2%; margin-top:2%%">
    <table class="table table-bordered table-hover" id="txtHint" align="center" width="100%">
		<tr>
            <td align="center"><label>Select</label></td>
            <td align="center"><label>Form No.</label></td>
            <td align="center"><label>Class</label></td>
            <td align="center"><label>First Name</label></td>
            <td align="center"><label>Father's Name</label></td>
        </tr>
				<?php
				$sel=mysql_query("select * from form_issue");
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
	</table></div>
</br>
<button style="margin-left:35%; margin-top:2%; width:6%" class="btn btn-success" name="btn" type="submit">Ok</button>
<button style="margin-top:2%" class="btn btn-default button-previous" name="cncle" type="submit">Back</button>  
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