<?php
session_start();
require_once("function.php");
@$wrong=$_SESSION['wrong'];
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title> <?php title(); ?></title>
 <?php  css(); ?>

  <link href="assets/css/pages/login.css" rel="stylesheet" type="text/css"/>
  </head>
  
  <body class="login">
<!-- BEGIN LOGO -->
<div class="preloader">
  <div class="status">&nbsp;</div>
</div>

<div class="logo">
	<img src="img/alok-logo.png" alt="" width="80"/>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form  class="login-form"  action="login_submit.php" method="post" >
    <?php
	if(!empty($wrong))
	{
     		?>
			<span style="color:#B94A48;">User name and password is incorrect.</span>
            <?php
	}
            ?>
		<h3 class="form-title">Login to your account</h3>
		<div class="alert alert-error display-hide">
			<button class="close" data-close="alert"></button>
           
			<span>
				 Enter any username and password.
			</span>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" name="bttn_login" class="btn btn-info pull-right">Login <i class="fa fa-sign-in"></i></button>
		</div>
		
	</form>
 
    <?php footer(); ?>
	<!-- END LOGIN FORM -->
	</div>

<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->

<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="js/loading.js" type="text/javascript"></script>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js" type="text/javascript"></script>
<script src="assets/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  App.init();
  Login.init();
});
</script>
</body>
<!-- END BODY -->

<!-- Mirrored from www.keenthemes.com/preview/conquer/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 Jan 2014 12:02:38 GMT -->
</html>