<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['add']))
{
	extract($_POST); 
	if(!empty($_POST['cls']))
	{
		$sql="insert into `class` (`cls`,`strm_av`,`cls_no`,`cls_code`,`cls_roman`) values ('".$cls."','".$strm_av."','".$cls_no."','".$cls_code."','".$cls_roman."')";
		$r=mysql_query($sql);
	}
}
if(isset($_POST['edit']))
{
	extract($_POST); 
	if(!empty($_POST['class_s']))
	{
	$sql="update `class` set `cls`='".$cls."',`strm_av`='".$strm_av."',`cls_no`='".$cls_no."',`cls_code`='".$cls_code."',`cls_roman`='".$cls_roman."' where `sno`='".$class_s."'";
	$r=mysql_query($sql);
	}
}
if(isset($_POST['delete']))
{
	extract($_POST); 
	if(!empty($_POST['class_delete']))
	{
	$sql="delete from `class` where `sno`='".$class_delete."'";
	$r=mysql_query($sql);
	}
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
<body class="page-header-fixed page-sidebar-fixed"  style="height:auto !important;">
<!-- BEGIN HEADER -->
<?php
nevibar_menu()
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
            <div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Class Setup
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
									<div style="height:40%; width:40%; float:left;">
                                        <form method="POST" name="form1">
                                            <table style="margin:15px;">
                                            
                                            <tr> <td>
                                            Class </td>
                                            <td><input class="form-control input-medium" name="cls" placeholder="Class" type="text" ></td>  
                                            </tr>
                                            <tr>
                                            <td>
                                            Stream </td>
                                            <td>
                                            <select  name="strm_av" class="form-control input-medium">
                                            <option value="">---Select---</option>
                                            <option>Yes</option> 
                                            <option>No</option>
                                            </select>
                                            </td>
                                            </tr>
                                            
                                            <tr></tr>
                                            <tr>
                                            <td>Class No.</td>
                                            <td><input class="form-control input-medium" name="cls_no" placeholder="Class No." type="text" ></td>  
                                            </tr>
                                            <tr>
                                            <td>Class Code</td>
                                            <td><input class="form-control input-medium" name="cls_code" placeholder="Class Code" type="text" ></td>  
                                            </tr>
                                            <tr>
                                            <td>Class Roman</td>
                                            <td><input class="form-control input-medium" name="cls_roman" placeholder="Class Roman" type="text" ></td>  
                                            </tr>
                                            </table>
                                            
                                        <button class="btn btn-success" name="add" type="submit" style="margin-left:22%; margin-top:1%;"><i class="fa fa-plus"></i> Save</button> 
                                        </form>
                                    </div>
                                   
                                    <?php 
                                  
                                    $a="select * from class";
                                    $b=mysql_query($a);
                                    ?>
                                  
                                                    
                                                <table class="table table-bordered table-hover" style="width:60%">
                                                <thead>
                                                <tr>
                                                <th>Class Name</th>
                                                <th>Stream Available</th>
                                                <th>Class No</th>
                                                <th>Class Code</th>
                                                <th>Class Roman</th></tr>
                                                </thead>
                                                <tbody>
                                                
                                    <?php 
                                    while($row=mysql_fetch_array($b))
                                    { ?>
                                       
                                       <tr>
                                       <td class="active">
                                     <?php   echo $row['cls'];?>
                                       </td>
                                       <td class="success">
                                       <?php echo $row['strm_av'];?>
                                       </td>
                                       <td class="warning">
                                     <?php echo $row['cls_no'];?>
                                       </td>
                                       <td class="danger">
                                     <?php echo $row['cls_code'];?>
                                       </td>
                                       <td class="success">
                                     <?php echo $row['cls_roman'];?>
                                       </td>
                                       </tr>
                                    
                                    <?php
                                      } 
                                     ?>
                                     </tbody>
                                    </table>
                                                        
                                                
								</div>
					
								<div class="tab-pane fade" id="tab_1_2">
									<form method="POST" name="form2">
                                       
                                        <table>
                                        <tr> <td>
                                        Select City </td>
                                        <td>
                                        <select  class="form-control input-medium" name="class_s" id="class_s">
                                         <option value="">--- Select Class ---</option>
                                      	<?php
										 $a="select * from class";
                                    	$b=mysql_query($a);
										while($row=mysql_fetch_array($b))
                                    	{
											?>
											<option value="<?php echo $row['sno']; ?>" clasname="<?php echo $row['cls']; ?>" classcode="<?php echo $row['cls_code']; ?>" classroman="<?php echo $row['cls_roman']; ?>" streamdata="<?php echo $row['strm_av']; ?>" classno="<?php echo $row['cls_no']; ?>"><?php echo $row['cls']; ?></option>
                                            <?php
										}
										?>
                                        </select>
                                        </td>
                            
                                        <tr> <td>
                                            Class </td>
                                            <td><input class="form-control input-medium" name="cls" id="cls" placeholder="Class" type="text" ></td>  
                                            </tr>
                                            <tr>
                                            <td>
                                            Stream </td>
                                            <td>
                                            <select  name="strm_av" id="strm_av" class="form-control input-medium">
                                            <option value="">---Select---</option>
                                            <option>Yes</option> 
                                            <option>No</option>
                                            </select>
                                            </td>
                                            </tr>
                                            
                                            <tr></tr>
                                            <tr>
                                            <td>Class No.</td>
                                            <td><input class="form-control input-medium" name="cls_no" id="cls_no" placeholder="Class No." type="text" ></td>  
                                            </tr>
                                            <tr>
                                            <td>Class Code</td>
                                            <td><input class="form-control input-medium" name="cls_code" id="cls_code" placeholder="Class Code" type="text" ></td>  
                                            </tr>
                                            <tr>
                                            <td>Class Roman</td>
                                            <td><input class="form-control input-medium" name="cls_roman" id="cls_roman" placeholder="Class Roman" type="text" ></td>  
                                            </tr>
                                        </table>
                                        <button class="btn btn-warning" name="edit" type="submit" style="margin-left:10%; margin-top:2%;"><i class="fa fa-edit"></i> Edit</button> 
                                        </form>
								</div>
                                <div class="tab-pane fade" id="tab_1_3">
									<form method="POST" name="form3">
                                       
                                        <table>
                                        <tr> <td>
                                        Select Class </td>
                                        <td>
                                        <select  class="form-control input-medium" name="class_delete">
                                         <option value="">--- Select Class ---</option>
                                      	<?php
										 $a="select * from class";
                                    	$b=mysql_query($a);
										while($row=mysql_fetch_array($b))
                                    	{
											?>
											<option value="<?php echo $row['sno']; ?>"><?php echo $row['cls']; ?></option>
                                            <?php
										}
										?>
                                        </select>
                                        </td>
                                        </table>
                                        <button class="btn btn-danger" name="delete" type="submit" style="margin-left:10%; margin-top:2%;"><i class="fa fa-trash-o "></i> Delete</button>  
                                        </form>
								</div>
								
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
</div>
<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>