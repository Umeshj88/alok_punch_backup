<?php
date_default_timezone_set('asia/kolkata');
/////////////////////////////////////////////////////////////////////////////////////////////
function title()//function to show title
{	
	echo "Fee Management System";
}

/////////////////////////////////////////////////////////////////////////////////////////////
function logo()//function to show title
{
//echo "<link rel='shortcut icon' href='img/alok-logo.png'/>";
}
/////////////////////////////////////////////////////////////////////////////////////////////
function header_image()//function to show header logo
{	
	//echo "<img src='img/alok-logo.png' style='padding-left:10px; padding-bottom:10px;' />";
}
/////////////////////////////////////////////////////////////////////////////////////////////

function footer()//function to show footer
{?>
    <div class="footer displaynone white-color-print">
        <div class="footer-inner">
            <!-- <a href="http://php.net/"><img src="img/logo_php.png"></a> 
             <a href="http://nmcorp.co.in/"><img src="img/nmcorp_power.png"></a>-->
        </div>
    </div>
<?php
}
/////////////////////////////////////////////////////////////////////////////////////////////
function print_css()//function to call all the css files
{?>
<style media="print">

.displaynone
{
	display:none;
}
.white-color-print
{
	background-color:#FFF !important;
}
</style>

<style>
.table thead tr th {
    font-size: 14px;
    font-weight: 600;
}
.table tbody tr td {
    font-size: 15px;
    
}
.table thead > tr > th {
    border-bottom: 0px none;
}
.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
    border: 1px solid #DDD;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 4px;
    line-height: 1;
}
table {
    border-collapse: collapse;
    border-spacing: 0px;
}

body {
    color: #000;
    font-family: "Open Sans",sans-serif;
    font-size: 13px;
    direction:ltr;
	margin-left:8%;
	
}

</style>
<?php
}
/////////////////////////////////////////////////////////////////////////////////////////////
function css()//function to call all the css files
{?>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-toastr/toastr.min.css"/>

<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_conquer.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-conquer.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<style>
input[type="radio"] {
    margin-left: 0px !important;
}
.white-color-display
{
	background-color:#FFF !important;
}
</style>
<style media="print">
.displaynone
{
	display:none;
}
.white-color-print
{
	background-color:#FFF !important;
}
</style>
<?php
}

/////////////////////////////////////////////////******  js   ***********////////////////////////////////////////////

function js()//function to call all the css files
{?>
<!--[if lt IE 9]>

<![endif]-->
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<?php jquery(); ?>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="js/loading.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>


<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/plugins/jquery.peity.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-knob/js/jquery.knob.js" type="text/javascript"></script>
<script src="assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>

<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->


<script src="assets/scripts/app.js" type="text/javascript"></script>
<script src="assets/scripts/index.js" type="text/javascript"></script>
<script src="assets/scripts/tasks.js" type="text/javascript"></script>

<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="assets/scripts/form-components.js"></script>

<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   App.init();
  
   FormComponents.init(); 
});
</script>
<script type="text/javascript">
var RecaptchaOptions = {
   theme : 'custom',
   custom_theme_widget: 'recaptcha_widget'
};
</script>
<!-- END GOOGLE RECAPTCHA -->

<script>
jQuery(document).ready(function() {    
   App.init();
});
</script>
<!-- END JAVASCRIPTS -->
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   App.init(); // initlayout and core plugins
   Index.init();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Index.initPeityElements();
   Index.initKnowElements();
   Index.initDashboardDaterange();
   Tasks.initDashboardWidget();
});
</script>

<?php
}
/////////////////////////////////////////////////////////////////////////////////////////////

 
function nevibar_menu()
{
	require_once("conn.php");
	
	$login_id=$_SESSION['login_id'];
	$sql1="SELECT * FROM `login` WHERE `login_id`='$login_id'";
	$result=mysql_query($sql1);
	$arr_result=mysql_fetch_array($result);
	?>
<!-- BEGIN HEADER -->

<div class="preloader">
  <div class="status">&nbsp;</div>
</div>
<div id="loader">
	    <div class="loader-icon"></div>
	</div>
<div class="header navbar navbar-inverse navbar-fixed-top displaynone white-color-print">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
	
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN NOTIFICATION DROPDOWN -->
			<!-- END TODO DROPDOWN -->
           
			<li class="devider">
				 &nbsp;
			</li>
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<!--<img alt="IMG" src="img/alok-logo.png"  width="30"/>-->
				<span class="username">
					 <?php echo $arr_result['username']; ?>
				</span>
				<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					
				
				<li>
					<a href="logout.php"><i class="fa fa-key"></i> Log Out</a>
				</li>
			</ul>
		</li>
        <a class="navbar-toggle" href="javascript:;" data-toggle="collapse" data-target=".navbar-collapse">
		<img alt="" src="assets/img/menu-toggler.png">
		</a>
		<!-- END USER LOGIN DROPDOWN -->
	</ul>
	<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<?php
}
/////////////////////////////////////////////////////////////////////////////////////////////
function menu()//function to call all the css files
{
	 $login_id=$_SESSION['login_id'];
		
			$sle_login=mysql_query("SELECT * FROM `login` WHERE `login_id`='$login_id' ");
			
			$ftc_login=mysql_fetch_array($sle_login);
			$user_id=$ftc_login['id'];
			
			$menu_clr="background:#093 !important";	
	?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper displaynone">
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
         
			<ul class="page-sidebar-menu" style="overflow: hidden; width: auto; height: 405px;">
				<li  class="start active ">
               
					<a  style="<?php echo $menu_clr ?>" href="index.php"><i class="fa fa-home"></i>
					<span  class="title">Dashboard</span>
					</a> 
				</li>
				
                <?php
				
			/*	$sel_menu_privileage=mysql_query("select * from menu_privileage where user_id='$user_id'
					 && `menu_name_id`='1'");
					$cnt_sel_menu_privileage1=mysql_num_rows($sel_menu_privileage);
				
				if($cnt_sel_menu_privileage1>0)
				{
				//$_SESSION['menu_color']=1;
				?>
                
                <li>
					<a  href="javascript:;"><i class="fa fa-file-text"></i>
					<span class="title">Registration</span>
					<span class="arrow"></span>
                    </a>
					<ul class="sub-menu">
                    <?php
                $sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='1'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
					?>
                         <li><a href="ffc.php">Form Fee Collection</a></li>
                   <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='2'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                         
                         <li><a href="reg.php">Form Issue</a></li>
                            <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='4'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                         <li><a href="srch1.php">Form Return</a></li>
                            <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='5'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                         <li><a href="admsn_clist.php">Admission List (Class-Wise)</a></li>
                       
                          <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='6'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>  <li><a href="admsn_dlist.php">Admission List (Date-Wise)</a></li>
					<?php
				}
				?>
                    </ul>
				</li>
                	<?php
				}*/
				$sel_menu_privileage=mysql_query("select * from menu_privileage where user_id='$user_id' && `menu_name_id`='2'");
				$cnt_sel_menu_privileage1=mysql_num_rows($sel_menu_privileage);
				if($cnt_sel_menu_privileage1>0)
				{
				?>
                <li>
					<a href="javascript:;"><i class="fa fa-rupee"></i>
					<span class="title">Fee Deposition</span>
					<span class="arrow"></span>
                    </a>
					<ul class="sub-menu">
                       <?php
				
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='7'"); 
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                          <li><a href="admsn_fee.php">New Admission Fee</a></li>
                       
                          <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='8'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?> <li><a href="srch_ann_fee.php">Annual Fee</a></li>
                        <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='9'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="srch_mnth_fee.php">Monthly Fee</a></li>
                    
                       <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='10'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);				
				if($cnt_sub_menu_privileage>0)
				{
				?>     <li><a href="srch_hstl_fee.php">Hostel Fee</a></li>
                     
                        <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='11'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="srch_ctn.php">Caution Deposit</a></li>
                       <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='12'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                         <li><a href="srch_adhc.php">Adhoc Payment</a></li>
					<?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='60'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                         <li><a href="srch_old_payment.php">Old Due Payment</a></li>
					<?php
				}
				?>
                    </ul>
				</li>
                	<?php
				}
				$sel_menu_privileage=mysql_query("select * from menu_privileage where user_id='$user_id' && `menu_name_id`='3'");
				$cnt_sel_menu_privileage1=mysql_num_rows($sel_menu_privileage);				
				if($cnt_sel_menu_privileage1>0)
				{
				?>
                 <li>
					<a href="javascript:;"><i class="fa fa-briefcase"></i>
					<span class="title">Record Maintenance</span>
					<span class="arrow"></span>
                    </a>
					<ul class="sub-menu">
                    <?php
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='13'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                            <li class="">
							<a href="javascript:;">
							<i class="fa fa-list-alt"></i>Student info
							<span class="arrow"></span>
							</a>
							<ul style="display: none;" class="sub-menu">
                                 <li><a href="stdnt_reg.php">New Registration</a></li>
                                 <li><a href="edit_stdunt_dtl.php">Edit Student</a></li>
							</ul>
						</li>
                      <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='14'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);				
				if($cnt_sub_menu_privileage>0)
				{
				?>       <!--  <li><a href="stdnt_invoice_prepared.php">Student Invoice</a></li> -->
                            <li><a href="srch_hstl.php">Vivekanand Hostel</a></li>
					
                    <?php
				}
				?></ul>
				</li>  
                	<?php
				}
				$sel_menu_privileage=mysql_query("select * from menu_privileage where user_id='$user_id' && `menu_name_id`='4'");
				$cnt_sel_menu_privileage1=mysql_num_rows($sel_menu_privileage);
				if($cnt_sel_menu_privileage1>0)
				{
				?>     
                <li class="">

					<a href="javascript:;">
					<i class="fa fa-folder-open"></i>
					<span class="title">Reports</span>
					<span class="arrow"></span>
					</a>
					<ul style="display: none;" class="sub-menu">
						
                           <?php
			
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='15'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li class="">
							<a href="javascript:;">
							<i class="fa fa-money"></i> Collection
							<span class="arrow"></span>
							</a>
							<ul style="display: none;" class="sub-menu">
                                 <li><a href="daily_coll.php">Daily Collections</a></li>
                                  <li><a href="cheque_details.php">Cheque Details</a></li>
                               <!--  <li><a href="">Reciept Details</a></li>
                                 <li><a href="">Cashier Wise Collection</a></li>
                                 <li><a href="">Classwise/Computer Fee Collections</a></li>-->
                                
                                 
							</ul>
						</li>
					
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='16'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
						<li class="">
							<a href="javascript:;">
							<i class="fa fa-list-alt"></i> Due List
							<span class="arrow"></span>
							</a>
							<ul style="display: none;" class="sub-menu">
                                 <li><a href="dl_mf.php">Due List - Monthly Fee</a></li>
                                 <li><a href="dl_gf.php">Due List - General Fee</a></li>
                                 <li><a href="dl_cf.php">Due List - Caution Fee</a></li>
                                 <li><a href="dl_hf.php">Due List - Hostel Fee</a></li>
							</ul>
						</li>
                           <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='17'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                         <li><a href="f_c_l.php">Fee Component Ledger</a></li>
					 
                        <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='18'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?><li><a href="s_l.php">Student Ledger</a></li>
                 
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='19'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="swp.php">Student Wise Payment</a></li>
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='20'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="cheque_no_detail.php">Cheque No. Detail</a></li>
                    <?php
				}
				
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='49'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>   <li><a href="pending_doc_report.php">Pending Document</a></li>
					
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='50'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="recept_delete_details.php">Recept Delete details </a></li>
					
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='51'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="non_scholar_register.php">Non Scholars Register </a></li>
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='52'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="concession_list.php">Concession List </a></li>
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='53'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="student_list.php">Student's List </a></li>
                	
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='54'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="bus_list.php">Bus List </a></li>
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='57'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="report_tc_students.php">Tc Issued Student </a></li>
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='58'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="discontinoue_student_list.php">Discontinoue Students List </a></li>
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='59'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="rte_student_list.php">Rte Students List </a></li>
                    <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='61'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="old_due_report.php" target="_blank">Old Due Report </a></li>
                    <?php
				}
				?>
                
                    </ul>
				</li>
                	<?php
				}
				
				
			   $sel_menu_privileage=mysql_query("select * from menu_privileage where user_id='$user_id'
											 && `menu_name_id`='5'");
										$cnt_sel_menu_privileage1=mysql_num_rows($sel_menu_privileage);
				
				if($cnt_sel_menu_privileage1>0)
				{
			   ?> 
                  <li class="">
					<a href="javascript:;">
					<i class="fa fa-calendar "></i>
					<span class="title">Yearly Activity</span>
					<span class="arrow"></span>
					</a>
					<ul style="display: none;" class="sub-menu">
					   <?php
				
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='21'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                    	<!--<li class="">
							<a href="javascript:;">
							<i class="fa fa-thumbs-o-up"></i> Student Promotion
							<span class="arrow"></span>
							</a>
							<ul style="display: none;" class="sub-menu">
                                 <li><a href="">Current Students</a></li>
							</ul>
						</li>-->
					   <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='22'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                         <li><a href="promote_database.php">Year Run</a></li>
                     <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='23'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                       <!-- <li><a href="">Finish Student Promotion</a></li>-->
                 <?php
				}
				?>
                    </ul>
                   </li>
                 	<?php
				}
				$sel_menu_privileage=mysql_query("select * from menu_privileage where user_id='$user_id'
											 && `menu_name_id`='6'");
										$cnt_sel_menu_privileage1=mysql_num_rows($sel_menu_privileage);
				
				if($cnt_sel_menu_privileage1>0)
				{
				?>   
                   
                    <li class="">
					<a href="javascript:;">
					<i class="fa fa-desktop"></i>
					<span class="title">System</span>
					<span class="arrow"></span>
					</a>
					<ul style="display: none;" class="sub-menu">
                         <?php
			
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='24'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                         <li><a href="summary.php">Summary</a></li>
                         <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='25'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li><a href="recpt_detail.php">Report</a></li>
                      <!--  <li><a href="">School Information</a></li>
                        <li><a href="">Hostel Information</a></li>
                        <li><a href="">User Permission</a></li> -->
					   <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='26'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                    	<li class="">
							<a href="javascript:;">
							<i class="fa fa-cloud-upload"></i> Database
							<span class="arrow"></span>
							</a>
							<ul style="display: none;" class="sub-menu">
                                <li><a href="backup.php">Back Up</a></li>
                               <!-- <li><a href="">Compact And Exit</a></li>
                                 <li><a href="">Set Back Up Directory</a></li>-->
							</ul>
						</li>
                           <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='27'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li class="">
							<a href="javascript:;">
							<i class="fa fa-barcode"></i> Barcode
							<span class="arrow"></span>
							</a>
							<ul style="display: none;" class="sub-menu">
                                <li><a href="single_barcode.php">Single Barcode</a></li>
                    			<li><a href="multiple_barcode.php">Multiple Barcode</a></li>
							</ul>
						</li>
                      <?php
				}
			/*	$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='28'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li><a href="">TC Recovery</a></li>
					
                       <?php
				}*/
				/*$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='29'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>	<li><a href="">Change Password</a></li>
				     <?php
				}*/
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='30'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>  	<li><a href="logout.php">Logout</a></li>
                  
                  <?php
				}
				?>
                    </ul>
                   </li>
                	<?php
				}
				$sel_menu_privileage=mysql_query("select * from menu_privileage where user_id='$user_id'
											 && `menu_name_id`='7'");
										$cnt_sel_menu_privileage1=mysql_num_rows($sel_menu_privileage);
				
				
				if($cnt_sel_menu_privileage1>0)
				{
				?> 
              		<li class="">
					<a href="javascript:;">
					<i class="fa fa-gears"></i>
					<span class="title">Setup</span>
					<span class="arrow"></span>
					</a>
					<ul style="display: none;" class="sub-menu">
                          <?php
			
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='31'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li><a href="city_setup.php">City/State </a></li>
   <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='32'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
 <li><a href="master_edit.php">Privilege</a></li>
						   <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='62'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li><a href="edit_current_session.php">Edit User Session </a></li>
   <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='33'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li class="">
							<a href="javascript:;">
							<i class="fa fa-desktop"></i> Class
							<span class="arrow"></span>
							</a>
							<ul style="display: none;" class="sub-menu">
                                <li><a href="cls_setup.php">Class Setup</a></li>
                                <li><a href="strm_setup.php">Stream Setup</a></li>
                                  <li><a href="section_setup.php">Section Setup</a></li>
                                   <li><a href="medium_setup.php">Medium Setup</a></li>
                                    <li><a href="category_setup.php">Category Setup</a></li>
                                     
                                 <li><a href="sec_cls_setup.php">Class Section Mapping</a></li>
							</ul>
						</li>
                        <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='34'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li class="">
							<a href="javascript:;">
							<i class="fa fa-building"></i> Hostel
							<span class="arrow"></span>
							</a>
							<ul style="display: none;" class="sub-menu">
                                 <li><a href="hstl_schl_setup.php">Hosteller's School</a></li>
					  			 <li><a href="hstl_fee_setup.php">Fee Setup</a></li>
							</ul>
						</li>
                         <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='35'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                         <li class="">
							<a href="javascript:;">
							<i class="fa fa-inr"></i> Fees
							<span class="arrow"></span>
							</a>
							<ul style="display: none;" class="sub-menu">
                            <li><a href="bus_station_setup.php">Bus Station Setup</a></li>
                             <li><a href="b_s_f.php">Bus Fee Setup</a></li>
                                 <li><a href="gen_fee_comp.php">General Fee Component</a></li>
                                <li><a href="cls_fee_comp_setup.php">Class Fee Component</a></li>
                                
                                 
							</ul>
						</li>
                        <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='36'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li><a href="mnth_mapping.php">Month Mapping</a></li>
                    	   <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='37'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        	<!--<li><a href="conduct.php">Conduct</a></li>-->
						
                           <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='38'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>	 <!--<li><a href="remarks.php">Remarks</a></li>-->
                    
                       <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='39'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>         <li><a href="caution_fee.php">Caution Money Setup</a></li>
                    	
                           <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='40'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>	<li><a href="admsn_doc.php">Admission /document Setup</a></li>
					
                       <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='41'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>		 <li><a href="cls_admsn_doc.php" > Class Admission /document Setup</a></li>
                 <?php
				}
				?>
                    </ul>
                   </li>
                    	<?php
				}
				$sel_menu_privileage=mysql_query("select * from menu_privileage where user_id='$user_id'
											 && `menu_name_id`='8'");
										$cnt_sel_menu_privileage1=mysql_num_rows($sel_menu_privileage);
				
				if($cnt_sel_menu_privileage1>0)
				{
				?> 
                    <li>
					<a href="javascript:;"><i class="fa fa-star"></i>
					<span class="title">Occasional</span>
					<span class="arrow"></span>
                    </a>
					<ul class="sub-menu">
                      
                         <?php
				
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='42'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                         <!--<li><a href="">Admission Document Entry</a></li>-->
                    
                       <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='43'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>    <li><a href="tc_certificate.php">Transfer Certificate</a></li>
                        <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='44'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                      <!--  <li><a href="">Fee Refund</a></li>-->
				
                <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='48'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li><a href="tution_fee_certificate.php">Tution Fee Certificate</a></li>
				
                <?php
				}
               
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='55'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li><a href="fee_structure.php">Fee Structure</a></li>
				
                <?php
				}
				
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='56'");
				$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <li><a href="scholar_register.php">Scholar Register</a></li>
				
                <?php
				}
				?>
                
                	</ul>
				</li>
                	<?php
				}
				$sel_menu_privileage=mysql_query("select * from menu_privileage where user_id='$user_id'
											 && `menu_name_id`='45'");
										$cnt_sel_menu_privileage1=mysql_num_rows($sel_menu_privileage);
				
				if($cnt_sel_menu_privileage1>0)
				{
				?> 
                <li>
					<a href="javascript:;"><i class="fa fa-wrench"></i>
					<span class="title">Tools</span>
					<span class="arrow"></span>
                    </a>
					<ul class="sub-menu">
                          <?php
				
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='2'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <!-- <li><a href="">Search Receipts</a></li>-->
                        <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='46'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                       <!-- <li><a href="">Arrears</a></li>-->
                          <?php
				}
				$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id'
											 && `sub_menu_name_id`='47'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
				
				if($cnt_sub_menu_privileage>0)
				{
				?>
                        <!--<li><a href="">Customize</a></li>-->
					<?php
				}
				?>
					</ul>
				</li>
                   <?php
				}
				?> 
                </ul>
                </div>
                </div>
                </div>
                
<?php
}

/////////////////////////////////////////////////////////////////////////////////////////////
function jquery()
{
	?>

 <script>
$(document).ready(function() {
var typingTimer;                //timer identifier
var doneTypingInterval = 1000;  //time in ms, 1 second for example

//on keyup, start the countdown
$('.timer').keyup(function(){
    clearTimeout(typingTimer);
    if ($('.timer').val) {
        typingTimer = setTimeout(function(){
            //do stuff here e.g ajax call etc....
           var query="?qt1="+$("#t1").val();
		   query+="&qt2="+$("#t2").val();
		   query+="&qt3="+$("#t3").val();
		   query+="&qt4="+$("#t4").val();
		   query+="&qt5="+$("#t5").val();
		   query+="&qt6="+$("#t6").val();
		   
		   var page_name=$(".timer").attr("page_name");
		   var open_page=$(".timer").attr("open_page");
		     query+="&page_name="+page_name;
		   $("#txtHint").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load(open_page+'.php'+query);
		   		   
        }, doneTypingInterval);
    }
});
$('.toast-close-button').click(function()
{
     $('#toast-container').remove();
});

$('#city_s').on('change',function(e){
	var br_name=$('#branch').val();
	 $("#city").val($('option:selected', this).attr("cityname"));
		   $("#pincode").val($('option:selected', this).attr("pincodename"));
	});
	$('#class_s').on('change',function(e){
	
	 $("#cls").val($('option:selected', this).attr("clasname"));
	 $("#cls_code").val($('option:selected', this).attr("classcode"));
	 $("#cls_roman").val($('option:selected', this).attr("classroman"));
	 $("#strm_av").val($('option:selected', this).attr("streamdata"));
	 $("#cls_no").val($('option:selected', this).attr("classno"));

	});

$('#old_monthly_fee').bind('click', function () 
{
	var schlr_no_id=$("#old_monthly_fee").attr('schlr_no_id');
	var query="?schlr_no_id=" + encodeURIComponent(schlr_no_id) + "&fee_type=old_monthly_fee";
	
	$("#amnt").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('get_old_fee.php'+query, function(){
		$("#dep").val($("#inst").val());
            var old_fee_receipt=$("#old_fee_receipt").val();
		$("#rcpt_no").val(old_fee_receipt);
        });
		
		
});

$('#old_hostel_fee').bind('click', function () 
{
	var schlr_no_id=$("#old_hostel_fee").attr('schlr_no_id');
	var query="?schlr_no_id=" + encodeURIComponent(schlr_no_id) + "&fee_type=old_hostel_fee";
	
	$("#amnt").html('<center><h4>Loading...</h4><image src="img/windows.gif"></center>').load('get_old_fee.php'+query, function(){
		$("#dep").val($("#inst").val());
            var old_fee_receipt=$("#old_fee_receipt").val();
		$("#rcpt_no").val(old_fee_receipt);
        });	
});

$('#get_document').bind('click', function () 
{
	
	
	 var cls=$("#cls").val();
	 
var query="?cls=" + encodeURIComponent(cls);
	
	$("#get_document_data").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('get_document.php'+query);	
});

});
</script>
<?php
}
function ajax()
{
	?>
    

<script type="text/javascript">

function v_check(id) 
{
	if($('#'+id).is(":checked"))
	{
		$('input[type=checkbox]['+id+'=""]').prop('checked', true);
		$.uniform.update($('input[type=checkbox]['+id+'=""]'));
	}
	else 
	{
		$('input[type=checkbox]['+id+'=""]').prop('checked', false);
		$.uniform.update($('input[type=checkbox]['+id+'=""]'));
	}
}
function old_fee_install()
{
	var inst=$('#inst').val();
	var cncsn=$('#cncsn').val();
	$('#dep').val(inst-cncsn);
}
function get_busfee(id)
{		
		var myString=$('#'+id).val();
		var myArray = myString.split(',');
		$("#type").val(myArray[0]);
		$("#station").val(myArray[1]);
}
function get_station(id)
{		
		$("#station").val($("#"+id).val());
}

function getcwc()
{		
	var cls='';
	var s_fee=$("#s_fee").val();
	if($('#allclass').is(":checked"))
	{
		var r1=$("#allclass").val();
	}
	else
	{
		var r1=$("#class").val();
		var cls=$("#content").val();
	}
	if($('#det').is(":checked"))
	{
		 var det=$("#det").val();
	}
	if($('#summ').is(":checked"))
	{
		 var summ=$("#summ").val();
	}
	var dp1=$("#form").val();
	var dp2=$("#to").val();
	
	var query="?s_fee=" + encodeURIComponent(s_fee) + "&dp1=" + dp1 + "&dp2=" + dp2 + "&det=" + det + "&summ=" + summ + "&r1=" + encodeURIComponent(r1) + "&cls=" + cls;
	
	$("#txt").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('getcomponent.php'+query);	
}	
function getstdnt_ldgr()
{
	if($('#ac').is(":checked"))
	{
		 var c1=$("#ac").val();
	}
	else
	{
		 var c1=$("#content").val();
	}
	if($('#as').is(":checked"))
	{
		 var c2=$("#as").val();
	}
	else
	{
		 var c2=$("#pf").val();
	}
	var form=$("#form").val();
	var to=$("#to").val();
	
	var query="?con1=" + encodeURIComponent(c1) + "&con2=" + encodeURIComponent(c2) + "&form=" + form + "&to=" + to;
	$("#sl").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('get_stdnt_ldgr.php'+query);
}	   
function getrecdetail()
{
	var dp1=$("#from").val();
	var dp2=$("#to").val();
	var query="?dp1=" + dp1 + "&dp2=" + dp2;
	$("#txt").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('recpt_view.php'+query);
}
function chq_num()
{
	var chqno=$("#chq_no").val();
	var receipt_no=$("#receipt_no").val();
	 var query="?chqno=" + chqno + "&receipt_no=" + receipt_no + "&notprint=notprint";
	 $("#view").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('chq_no_detail_view.php'+query);
}	  
function daily_coolection()
{
	var query="?from="+$("#from").val();
	query+="&to="+$("#to").val();
	query+="&notdisplay=data";
	$("#gen_fee").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('daily_coll_prnt.php'+query);
}
function cheque_details_view()
{
	var query="?from="+$("#from").val();
	query+="&to="+$("#to").val();
	query+="&notdisplay=data";
	$("#view").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('cheque_details_prnt.php'+query);
}	
function due_mnth_fees()
{
	var c2=$("#content_month").val();
	if($('#ac').is(":checked"))
	{
		 var c1=$("#ac").val();
		var query="?con=" + encodeURIComponent(c1) + "&con1=" + c2;
	}
	else
	{
		 var c1=$("#content").val();
		  var sec=$("#sec").val();
		 var stream=$("#stream").val();
		 var query="?con=" + c1 + "&con1=" + c2 + "&sec=" + sec + "&stream=" + stream;	
	}
	 
	$("#mnth_fee").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('due_mnth_fees.php'+query);
}	
function due_gen_fees()
{
  if($('#ac').is(":checked"))
	{
		 var cls=$("#ac").val();
		 var query="?con=" + encodeURIComponent(cls);
	}
	else
	{
		 var cls=$("#content").val();
		 var sec=$("#sec").val();
		 var stream=$("#stream").val();
		 var query="?con=" + cls + "&sec=" + sec + "&stream=" + stream;	
	}
	$("#gen_fee").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('due_gen_fees.php'+query);
}	   
function due_ctn_fees()
{
	if($('#ac').is(":checked"))
	{
		 var cls=$("#ac").val();
		 var query="?con=" + encodeURIComponent(cls);
	}
	else
	{
		 var cls=$("#content").val();
		 var sec=$("#sec").val();
		 var stream=$("#stream").val();
		 var query="?con=" + cls + "&sec=" + sec + "&stream=" + stream;	
	}
	$("#ctn_fee").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('due_ctn_fee.php'+query);
}	 
function due_hstl_fees()
{
  var c2=$("#content_month").val();
	if($('#ac').is(":checked"))
	{
		 var c1=$("#ac").val();
		var query="?con=" + encodeURIComponent(c1) + "&con1=" + c2;
	}
	else
	{
		 var c1=$("#content").val();
		  var sec=$("#sec").val();
		 var stream=$("#stream").val();
		 var query="?con=" + c1 + "&con1=" + c2 + "&sec=" + sec + "&stream=" + stream;	
	}
	$("#hstl_fee").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('due_hstl_fee.php'+query);
}	 

function p(id)
{
	var b=$("#"+id).val();
	var num_row=eval($("#num_row").val());
	var kk=eval(id);
	var k=0;
	  for(var i=1; i<=num_row; i++)
	  { 
		  if(document.getElementById("b_"+kk).disabled==false)
		  {
			
			 var b1=eval($("#b_"+kk).val());
			  
			 if(b1==undefined){b1=0;}
				k+=b1;
		  }
		   kk+=12;
	  }
	$("#tm"+id).val(k);
	  
	   var dep=eval($("#dep").val());
	   
	  var inst=eval($("#inst").val());
	   var tm=eval($("#tm"+id).val());
	  
	    if(dep==undefined){  dep=0;  }	    
	   if(inst==undefined) { inst=0;  }
		   if(tm==undefined)  {  tm=0; }
		 if($('#'+id).is(":checked"))
		 {   	 
			var c=tm+dep;
			var e=tm+inst;
			 $("#dep").val(c);
			$("#inst").val(e);			   
	   }
	   else  
	   {
			c=dep-tm;
			e=inst-tm;
			 $("#dep").val(c);
			$("#inst").val(e);		
			var emptydata='';						
			$("#tm"+id).val(emptydata);  
	   } 
}
function concession()
{
	var b=eval($("#cncsn").val());
	var inst=eval($("#inst").val());
	var fine=eval($("#fine").val());
	
	if(b==undefined)
	{
	   b=0;
	}
	
	if(fine==undefined)
	{
	   fine=0;
	}
	c=inst+fine-b;
	$("#dep").val(c);	 
}	  
 function fin()
{

	var b=eval($("#fine").val());
	var inst=eval($("#inst").val());
	 var cncsn=eval($("#cncsn").val());
  
   if(b==undefined)
	   {
		   b=0;
	   }
	   
   if(cncsn==undefined)
	   {
		   cncsn=0;
	   }
   c=inst-cncsn+b;
   $("#dep").val(c)
}	  	  
function chkall_mnth_fee()
{
		   var tot=0;
		 
			for(var id=1; id<=12; id++)
			{		
				if(document.getElementById(id).disabled==false)
				{
					if($('#chkall').is(":checked"))
					{
						$('#'+id).attr('checked', true);
					}
					else
					{
						$('#'+id).attr('checked', false);
					}
					$.uniform.update($('#'+id));
				var b=$("#"+id).val();
				var num_row=eval($("#num_row").val());  
			  			
				var kk=eval(id);
				var k=0;
			  for(var i=1; i<=num_row; i++)
			  {
				  if(document.getElementById("b_"+kk).disabled==false)
				  {
					  var b1=eval($("#b_"+kk).val());
					 if(b1==undefined){b1=0;}
						k+=b1;
				  }
				   kk+=12;

			  }
			  if($('#'+id).is(":checked"))
				 {   	 
			  	 		
					  $("#tm"+id).val(k);
			   		tot+=k;		   
			   }
			 else  {
														
						 var emptydata='';						
						$("#tm"+id).val(emptydata); 
			   		} 
			  
			  	 } 
					
				}
		var cncsn=eval($("#cncsn").val());
	  
	   var fine=eval($("#fine").val());
	 
	   if(cncsn==undefined)
		   {
			   cncsn=0;
		   }
		   
	   if(fine==undefined)
		   {
			   fine=0;
		   }
		  
		   $("#inst").val(tot);
		    var inst=eval($("#inst").val());
			 if(inst==undefined)
		   {
			   inst=0;
		   }
	   c=inst+fine-cncsn;
	   $("#dep").val(c)
			
}	 
function install()
{
	var b=eval($("#inst").val());  
	var cncsn=eval($("#cncsn").val());
	var fine=eval($("#fine").val());
	if(fine==undefined)
	{
	   fine=0;
	}
	if(cncsn==undefined)
	{
	   cncsn=0;
	}
	   
 	var c=(b+fine-cncsn);
   	if(b==undefined)
    {
	   b=0;
    }
	$("#gt").val(b);
	$("#dep").val(c);
}
function sameas()
{
	if($('#sameasdata').is(":checked"))
	 {
		 $("#cadd").val($("#padd").val());
	 }
	 else
	 {
		 var emptydata='';
		   $("#cadd").val(emptydata);
	 }
	
}

 var xobj;
   //modern browers
   if(window.XMLHttpRequest)
    {
	  xobj=new XMLHttpRequest();
	  }
	  //for ie
	  else if(window.ActiveXObject)
	   {
	    xobj=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else
		{
		  alert("Your broweser doesnot support ajax");
		  }
		  	
		
		 
		  function getstrm1(id)
		  {
		    if(xobj)
			 {
				 if(document.getElementById(id).checked==true)
				 {
					 var query=document.getElementById(id).value; 
				 }
			 xobj.open("GET" ," ",true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {   	   
			   document.getElementById("se").value=query;
			   document.getElementById("temp").value=query;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		   function instlt(id)
		  {
		    if(xobj)
			 {				 
			 
			  var t=eval(document.getElementById("inst").value);
			  var c=0;
				for(var i=1;i<=t;i++)
				 {
					 var t2=eval(document.getElementById("instl_"+i).value);
						 if( t2==undefined){t2=0;}
						 c+=t2;
				 }
				 
			   document.getElementById("tot").value=c;
			  
			 }
			 xobj.send(null);
		  }	
		 
		  
		  function getstrm()
		  {
			 
			 var cl=$("#cls").val();
			 var query="?con=" + encodeURIComponent(cl);
			 $("#txtstrm").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('getstrm.php'+query);
		  }	
		  
		  function getvalue()
		  {
				var cl=$("#cls").val();
				var st=$("#strm").val();
				var med=$("#med1").val();
				var query="?con=" + encodeURIComponent(cl)  + "&con1=" + encodeURIComponent(st) + "&med=" + encodeURIComponent(med);
				$("#txthint").html('<center><h4>Loading...</h4><image src="img/windows.gif" ></center>').load('getsection.php'+query);
		  }	  	
		  function getfee()
		  {
		    if(xobj)
			 {
				 var cl=document.getElementById("cls").value;
				 var st=document.getElementById("strm").value;
				  var rte=document.getElementById("rte").value;
				if(document.getElementById("med1").checked==true)
				{
					 var med=document.getElementById("med1").value;
				}
				else if(document.getElementById("med2").checked==true)
				{
					 var med=document.getElementById("med2").value;
				}
				else
				{
					alert("Please select mediim.");
				}
			
			 var z="?x=" + cl + "&y=" + st + "&q=" + med + "&rte=" + rte;
			 xobj.open("GET","getfee.php" +z,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("fee").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
     		function c(id)
		  	{
				
		    if(xobj)
			 {				
			 var query=document.getElementById("a"+id).value;
			 xobj.open("GET"," ",true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   { 
				   var b=eval(query);  
				if(document.getElementById(id).checked==false)
				{
					var t1=eval(document.getElementById("inst").value);
					var t2=eval(document.getElementById("dep").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1-b;
					var d=t2-b;	  
					
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
				if(document.getElementById(id).checked==true)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1+b;
					var d=t2+b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	   
		   </script>
          <script>  
		  
		   
		  
   		 
		  
	


		   function getamnt()
		  {
			  
		    if(xobj)
			 {
				 var c1=document.getElementById("feetype").value;
				 var c2=document.getElementById("schlr_no").value;
				
			 var query="?con=" + c1 +"&con1=" + c2;
			 xobj.open("GET","getamount.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   	document.getElementById("amnt").innerHTML=xobj.responseText;;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		   
		  
		   
		   function summary()
	  {
		  if(document.getElementById("summ").checked==false)
		  {
			  document.getElementById("det").checked=true;
		  }
	  }
	  function detail()
	  {
		  if(document.getElementById("det").checked==false)
		  {
			  document.getElementById("summ").checked=true;
		  }
	  }
	  
	  function designation(value)
	 {
		  if(xobj)
			 {				
			 var query="?user_id=" + value;
			
			 xobj.open("GET","master_edit_fetch.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			  
			   document.getElementById("get_data2").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		  
		  		    
		   function designation_2(value)
	 {
		  if(xobj)
			 {				
			 var query="?user_id=" + value;
			
			 xobj.open("GET","master_sub_menu_fetch.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			  
			   document.getElementById("get_data1").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		  
		  
	function sub_menu_sle(value)
	 {
			if(xobj)
			{	
				var user_name_id=document.getElementById("user_name_id").value;	
				var query="?menu_id=" + value + "&user_name_id=" + user_name_id;;
				xobj.open("GET","master_sub_menu_chk.php" +query,true);
				xobj.onreadystatechange=function()
				{
					if(xobj.readyState==4 && xobj.status==200)
					{	   
						document.getElementById("get_data_sub_menu").innerHTML=xobj.responseText;
					}
				}
			
			}
			xobj.send(null);
	}




 function cheking2(id) 
	{ 
		if(xobj)
			 {	
			 if(document.getElementById(id).checked==true)
			 {
				var group=document.frm2.elements[id + "[]"];
        		for (var i=0; i<group.length; i++) 
				{
					//document.frm1.elements[id + "[]"][i].checked = true;
					group[i].checked = true;
					$("span").attr( "class", "checked" ); 
           		 }
			 }
			 else
			 {
				 var group=document.frm2.elements[id + "[]"];
        		for (var i=0; i<group.length; i++) 
				{
					//document.frm1.elements[id + "[]"][i].checked = true;
					group[i].checked = false;
					$("span").attr( "class", "" ); 
           		 }
			 }
			 }
			 xobj.send(null);
	}
	
	
	
	  function cheking11(id) 
	{ 
		if(xobj)
			 {	
			 if(document.getElementById(id).checked==true)
			 {
				var group=document.frm_1.elements[id + "[]"];
        		for (var i=0; i<group.length; i++) 
				{
				//document.frm1.elements[id + "[]"][i].checked = true;
				group[i].checked = true;
           		 }
			 }
			 else
			 {
				 var group=document.frm_1.elements[id + "[]"];
        		for (var i=0; i<group.length; i++) 
				{
				//document.frm1.elements[id + "[]"][i].checked = true;
				group[i].checked = false;
           		 }
			 }
			 }
			 xobj.send(null);
	}


	function cancel_tc(schlr_no_id)
	{
	  if(xobj)
		 {	
		 alert();
		  xobj.open("GET","tc_canceld.php?schlr_no_id="+schlr_no_id,true);
		  xobj.onreadystatechange=function()
		  {
		   if(xobj.readyState==4 && xobj.status==200)
		   {	 
		    document.getElementById(schlr_no_id).innerHTML=xobj.responseText;
		   }
		  }
		 }
		 xobj.send(null);
	  }
		  		  
		 
  </script>
  <?php
}

function convert_number_to_words($number) {
   
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(


 		01                   => 'One',
        02                   => 'Two',
        03                   => 'Three',
        04                   => 'Four',
        05                   => 'Five',
        06                   => 'Six',
        07                   => 'Seven',
        08                   => 'Eight',
        09                   => 'Nine',



        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}

function serial_no($number)
 {

 $str_lenth=strlen($number);
if($str_lenth==1)
{
$number='000'.$number;
}
else if($str_lenth==2)
{
$number='00'.$number;
}

else if($str_lenth==3)
{
$number='0'.$number;
}
echo $number;


}
?>
