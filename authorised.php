<?php
error_reporting(0);
@ini_set('display_errors', 0);
session_start();
require_once("function.php");
$cur=date('Y');
$back=$cur-1;
$session=$back."-".$cur;
ini_set('max_execution_time', 10000);
$dbHost='127.0.0.1';
$dbUser='alok_panch';
$dbPass='x2026P#p%uOP';
$dbName=$session;
$s=mysql_connect($dbHost,$dbUser,$dbPass) or die('Error connecting to MySQL server: ' . mysql_error());
if(mysql_select_db($dbName,$s))
{
	$_SESSION['session']=$session;
	
}
else
{
	$cur=date('Y');
	$back=$cur+1;
	$session=$cur."-".$back;
	$dbName=$session;
	mysql_select_db($dbName,$s);
	$_SESSION['session']=$session;
}

if(isset($_POST['bttn_next']))
{
	$_SESSION['session']=$_POST['session'];
	echo "<script>location='index.php'</script>";
}
	
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>Authorised | <?php title();?></title>
<?php
logo();
css();
?>
</head>
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed white-color-display" style="background-color: rgb(250, 250, 250) !important;">
<!-- BEGIN HEADER -->
<?php
nevibar_menu();


?>
<div class="clearfix">
</div>
<div class="page-content">
<!-- BEGIN CONTAINER -->
		<div class="row" style="padding-top:2% !important;">
       
        <form method="post">
        <div class="form-group" style="text-align:center">
										<label class="control-label col-md-1">Session</label>
										<div class="col-md-2">
                                            <select name="session" class="form-control">
												<?php
												mysql_select_db('fee_session',$s);
												$i=0;
												$sel_session=mysql_query("select * from `session`");
												$num=mysql_num_rows($sel_session);
												while($arr_session=mysql_fetch_array($sel_session))
												{ $i++;
												?>
                                                    <option value="<?php echo $arr_session['session']; ?>" <?php if($num==$i) { ?> selected <?php } ?>><?php echo $arr_session['session']; ?></option>
                                                <?php
												}
												?>
											</select>
										</div>
                                        <button type="submit" name="bttn_next" class="btn btn-info pull-left">Continue <i class="fa fa-sign-in"></i></button>
									</div>				
							</form>
			
		</div>
</div>
<!-- END CONTAINER -->

<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>
