<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['class_submit']))
{
	extract($_POST);
	echo "<script>
		window.open('fee_structure_view.php?cls_id=$cls','_blank');
		</script>";
	echo "<meta http-equiv='Refresh' content='0 ;URL=fee_structure.php'>";
	exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>Fee Structure | <?php title();?></title>
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
								<i class="fa fa-reorder"></i>Fee Card
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
							</div>
						</div>
						<div class="portlet-body">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">Class Wise</a>
								</li>
								<li class="">
									<a href="#tab_1_2" data-toggle="tab">Student Wise</a>
								</li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab_1_1">
                                <form method="post">
									<select class="form-control input-medium" name="cls">
                                    <option value="">select Class</option>
                                          <?php $sql_="select * from class";
                                                $sql=mysql_query($sql_);
                                                while($t=mysql_fetch_array($sql))
                                                { 
                                                  echo "<option value=\"".$t['sno']."\">".$t['cls']."</option>";
                                                }		
                                    ?></select><br/>
                                    <button type="submit" class="btn btn-success" name="class_submit">Next <i class="fa fa-arrow-right"></i></button>
                                    </form>
								</div>
								<div class="tab-pane fade" id="tab_1_2">
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
                                    <td><input class="form-control timer" type="text" name="t1" id="t1" page_name="fee_structure_view" open_page="hstl_fetchtodb"/></td>
                                    <td><input class="form-control timer" type="text" name="t2" id="t2" page_name="fee_structure_view" open_page="hstl_fetchtodb"/></td>
                                    <td><input class="form-control timer" type="text" name="t3" id="t3" page_name="fee_structure_view" open_page="hstl_fetchtodb"/></td>
                                    <td><input class="form-control timer" type="text" name="t4" id="t4" page_name="fee_structure_view" open_page="hstl_fetchtodb"/></td>
                                    <td><input class="form-control timer" type="text" name="t5" id="t5" page_name="fee_structure_view" open_page="hstl_fetchtodb"/></td>
                                    <td><input class="form-control timer" type="text" name="t6" id="t6" page_name="fee_structure_view" open_page="hstl_fetchtodb"/></td>
                                    </tr>
                                    
                                    </table>
                                    <table class="table table-bordered table-hover" id="txtHint">
                                   
                                    </table>
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