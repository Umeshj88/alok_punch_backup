<?php 
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['edit_session']))
{
	extract($_POST);
	
	$newdb ='alok_session';
	mysql_select_db($newdb,$s)or die('Error selecting MySQL database: ' . mysql_error());
	
	mysql_query("Update `user_session` set `session`='".$session1."'");
	
}
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
include("conn.php");
nevibar_menu();
?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
     <?php
	
      
		 $newdb ='alok_session';
		mysql_select_db($newdb,$s);
		$sel_loginsession=mysql_query("select * from `user_session`");
		$arr_loginsession=mysql_fetch_array($sel_loginsession);
        ?>
        <form method="post">
        <table align="center">
        <tr>
        <td>
            <select name="session1" class="form-control input-small">
            <?php
            $sel_session=mysql_query("select * from `session`");
            while($arr_session=mysql_fetch_array($sel_session))
            { 
            ?>
                <option value="<?php echo $arr_session['session']; ?>"  <?php if($arr_loginsession['session']==$arr_session['session']) { ?> selected <?php } ?>><?php echo $arr_session['session']; ?></option>
            <?php
            }
            ?>
             </select>
             </td>
             </tr>
             <tr>
             <td>
           
            <button  class="btn btn-success" type="submit" name="edit_session" style="text-align:center">Continue <i class="m-icon-swapright m-icon-white"></i></button>
            </td>
            </tr>
            </table>
        </form>
         	
         </div>
    </div>
  </div>
  </div>
   <!-- BEGIN FOOTER -->
   
  
<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>