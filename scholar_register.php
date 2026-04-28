<?php
require_once("function.php");
//require_once("conn.php");
include("authentication.php");
//$db=$_GET['db'];
if(isset($_POST['scholarrange']))
{
	extract($_POST);
	echo "<script>
		window.open('scholar_register_view.php?from=$from&to=$to&view=scholar','_blank');
		</script>";
		echo "<meta http-equiv='Refresh' content='0 ;URL=scholar_register.php'>";
	exit;
}
if(isset($_POST['daterange']))
{
	extract($_POST);
	echo "<script>
		window.open('scholar_register_view.php?from=$from&to=$to&view=date','_blank');
		</script>";
		echo "<meta http-equiv='Refresh' content='0 ;URL=scholar_register.php'>";
	exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>Scholar Register | <?php title();?></title>
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
	<div class="page-content">
		<div class="row">
        
		 <div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Scholar Register
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
							</div>
						</div>
						<div class="portlet-body">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">Student Wise</a>
								</li>
								<li class="">
									<a href="#tab_1_2" data-toggle="tab">Scholar Range</a>
								</li>
                                <li class="">
									<a href="#tab_1_3" data-toggle="tab">Date Range</a>
								</li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab_1_1">
                                  
                                <form class="form-signin" method="POST"> 
                                <div style="width:96%; margin-left:2%">
                                <table class="table table-bordered table-hover">
                                <tr>
                               <th>Scholar No.</th>
                                <th>Class</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Father's Name</th>
                                </tr>
                                <tr>
                                <td><input class="form-control timer" type="text" name="t1" id="t1" page_name="scholar_register_view" open_page="hstl_fetchtodb"/></td>
                                <td><input class="form-control timer" type="text" name="t2" id="t2" page_name="scholar_register_view" open_page="hstl_fetchtodb"/></td>
                                <td><input class="form-control timer" type="text" name="t3" id="t3" page_name="scholar_register_view" open_page="hstl_fetchtodb"/></td>
                                <td><input class="form-control timer" type="text" name="t4" id="t4" page_name="scholar_register_view" open_page="hstl_fetchtodb"/></td>
                                <td><input class="form-control timer" type="text" name="t5" id="t5" page_name="scholar_register_view" open_page="hstl_fetchtodb"/></td>
                                <td><input class="form-control timer" type="text" name="t6" id="t6" page_name="scholar_register_view" open_page="hstl_fetchtodb"/></td>
                                </tr>
                                
                                </table>
                                </div>
                                
                                <div style="width:96%; margin-left:2%">
                                <table class="table table-bordered table-hover" id="txtHint">
                               
                                </table>
                                </div>
                                </br>
                                
                                </form> 
			
								</div>
								<div class="tab-pane fade" id="tab_1_2">
                                 <form class="form-signin" method="POST"> 
                                <div class="form-group">
										<label class="control-label col-md-3">Scholar Range</label>
										<div class="col-md-4">
											<div class="input-group input-large ">
												<input class="form-control" name="from" type="text">
												<span class="input-group-addon">
													 to
												</span>
												<input class="form-control" name="to" type="text">
											</div>
											<!-- /input-group -->
											<span class="help-block">
												 Enter scholar range
											</span>
										</div>
                                        </div>
									<button type="submit" name="scholarrange" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                                    <br/><br/><br/><br/>
                                    </form>
								</div>
								<div class="tab-pane fade" id="tab_1_3">
                                 <form class="form-signin" method="POST"> 
									<div class="form-group">
										<label class="control-label col-md-3">Date Range</label>
										<div class="col-md-4">
											<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="dd-mm-yyyy">
												<input class="form-control" name="from" type="text">
												<span class="input-group-addon">
													 to
												</span>
												<input class="form-control" name="to" type="text">
											</div>
											<!-- /input-group -->
											<span class="help-block">
												 Select date range
											</span>
										</div>
									</div>
                                    <button type="submit" name="daterange" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                                    <br/><br/><br/><br/>
                                    </form>
								</div>
							</div>
						</div>
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