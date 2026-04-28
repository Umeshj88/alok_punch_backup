<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['add']))
{
	extract($_POST);
	 $sec=mysql_query("select * from `medium` where `medium`='".$medium."'");
	 $row=mysql_num_rows($sec);
	 if(empty($row))
	 {
		mysql_query("insert into `medium` set `medium`='".$medium."'");
	 }
}
if(isset($_POST['edit']))
{
	 extract($_POST);
	 $sec=mysql_query("select * from `medium` where `medium`='".$medium."'");
	 $row=mysql_num_rows($sec);
	 if(empty($row))
	 {
		mysql_query("update `medium` set `medium`='".$medium."' where `medium`='".$r1."'");
	 }
}
if(isset($_POST['delete']))
{
	extract($_POST); 
	$sql="delete from `medium` where `medium`='".$r1."'";
	$r=mysql_query($sql);
	
	
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
nevibar_menu(); ajax();
?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php menu();?>
	<div class="page-content-wrapper">
		<div class="page-content">
       	<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Medium Setup
							</div>
							
						</div>
						<div class="portlet-body">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">Add</a>
								</li>
								<li class="">
									<a href="#tab_1_2" data-toggle="tab">Edit</a>
								</li>
								<li class="">
									<a href="#tab_1_3" data-toggle="tab">Delete</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab_1_1">
									<form method="POST" name="1">
                                    <table style="margin-left:1%;">
                                    <tr> 
                                    <td><label>Medium</label></td>
                                                <td><input class="form-control input-medium" name="medium" placeholder="Medium" type="text" ></td>
                                    </tr>
                                    <tr>
                                    <td></td>
                                    <td>
                                                <button class="btn btn-info" name="add" type="submit" style=" margin-top:2%;"><i class="fa fa-plus"></i> Submit</button>
                                              
                                                </td></tr>
                                                </table>
                                    </form>
								</div>
								<div class="tab-pane fade" id="tab_1_2">
									<form method="POST" name="2">
                                    <table style="margin-left:1%;">
                                    <tr> 
                                    <td><label>Medium</label></td>
                                                <td><input class="form-control input-medium" name="medium" placeholder="Medium" id="se" type="text"></td>
                                    </tr>
                                    <tr>
                                    <td></td>
                                    <td>
                                                <button class="btn btn-warning" name="edit" type="submit" style=" margin-top:2%;"><i class="fa fa-edit"></i> Submit</button>
                                              
                                                </td></tr>
                                                </table>
                                   
                                        <table class="table table-bordered table-hover" style="margin-left:1%; width:40%;">
                                        <thead>
                                                <tr>
                                                <th>Select</th>
                                                <th>Medium </th>
                                            </tr>
                                        </thead>
                                        <?php 
										 $a="select * from `medium`";
                                        $b=mysql_query($a);
                                        while($row=mysql_fetch_array($b))
                                        { ?>
                                           
                                           <tr>
                                           <td>
                                           <input id="r<?php echo $row['sno']; ?>" type="radio" value="<?php echo $row['medium']; ?>" name="r1" onClick="getstrm1(this.id)"></input>
                                           </td>
                                           <td>
                                           <?php echo $row['medium'];?>
                                           </td>
                                           
                                           </tr>
                                        
                                        <?php
                                          } 
                                         ?></table>
                                	
                                          </form>
								</div>
								<div class="tab-pane fade" id="tab_1_3">
									<form method="POST" name="3">
                                   
                                        <table class="table table-bordered table-hover" style="margin-left:1%; width:40%;">
                                        <thead>
                                                <tr>
                                                <th>Select</th>
                                                <th>Medium </th>
                                            </tr>
                                        </thead>
                                        <?php 
										 $a="select * from `medium`";
                                        $b=mysql_query($a);
                                        while($row=mysql_fetch_array($b))
                                        { ?>
                                           
                                           <tr>
                                           <td>
                                           <input id="r<?php echo $row['sno']; ?>" type="radio" value="<?php echo $row['medium']; ?>" name="r1"></input>
                                           </td>
                                           <td>
                                           <?php echo $row['medium'];?>
                                           </td>
                                           
                                           </tr>
                                        
                                        <?php
                                          } 
                                         ?></table>
                                          <button class="btn btn-danger" name="delete" type="submit" style="margin-top:2%;"><i class="fa fa-trash-o "></i> Delete</button>
                                         </form>
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