<?php
require_once("function.php");
include("authentication.php");
require_once("conn.php");
if(isset($_POST['add']))
{
	extract($_POST); 
	if(!empty($_POST['city']))
	{
	$sql="insert into city (city,pincode) values ('".$city."','".$pincode."')";
	$r=mysql_query($sql);
	}
}
if(isset($_POST['edit']))
{
	extract($_POST); 
	if(!empty($_POST['city']))
	{
	$sql="update `city` set `city`='".$city."',`pincode`='".$pincode."' where `sno`='".$city_s."'";
	$r=mysql_query($sql);
	}
}
if(isset($_POST['delete']))
{
	extract($_POST); 
	if(!empty($_POST['city_delete']))
	{
	$sql="delete from `city` where `sno`='".$city_delete."'";
	$r=mysql_query($sql);
	}
}
?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Search | <?php title();?></title>
<?php
logo();
css();
?>
</head>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-fixed">
<!-- BEGIN HEADER -->
<?php
nevibar_menu()
?>

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
								<i class="fa fa-reorder"></i>City Setup
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
									<form method="POST" name="form1">
                                       
                                        <table>
                                        <tr> <td>
                                        City </td>
                                        <td><input class="form-control input-medium" name="city" placeholder="Enter City Name" type="text" ></td>
                            
                                        <tr>
                                        <td>
                                        Pincode</td>
                                        <td><input class="form-control input-medium" name="pincode" placeholder="Enter Pincode" type="text" maxlength="6" ></td>
                                        </tr>
                                        <tr>
                                       
                                        </tr>
                                        </table>
                                        <button class="btn btn-success" name="add" type="submit" style="margin-left:6%; margin-top:2%;"><i class="fa fa-plus"></i> Save</button> 
                                        </form>
								</div>
								<div class="tab-pane fade" id="tab_1_2">
									<form method="POST" name="form2">
                                       
                                        <table>
                                        <tr> <td>
                                        Select City </td>
                                        <td>
                                        <select  class="form-control input-medium" name="city_s" id="city_s">
                                         <option value="">--- Select Fee ---</option>
                                      	<?php
										$sel_city=mysql_query("select * from `city`");
										while($arr_city=mysql_fetch_array($sel_city))
										{
											?>
											<option value="<?php echo $arr_city['sno']; ?>" cityname="<?php echo $arr_city['city']; ?>" pincodename="<?php echo $arr_city['pincode']; ?>"><?php echo $arr_city['city']; ?></option>
                                            <?php
										}
										?>
                                        </select>
                                        </td>
                            
                                        <tr>
                                        <tr> <td>
                                        City </td>
                                        <td><input class="form-control input-medium" name="city" id="city" placeholder="Enter City Name" type="text" ></td>
                            
                                        <tr>
                                        <td>
                                        Pincode</td>
                                        <td><input class="form-control input-medium" name="pincode" id="pincode" placeholder="Enter Pincode" type="text" maxlength="6" ></td>
                                        </tr>
                                        <tr>
                                       
                                        </tr>
                                        </table>
                                        <button class="btn btn-warning" name="edit" type="submit" style="margin-left:6%; margin-top:2%;"><i class="fa fa-edit"></i> Edit</button> 
                                        </form>
								</div>
                                <div class="tab-pane fade" id="tab_1_3">
									<form method="POST" name="form3">
                                       
                                        <table>
                                        <tr> <td>
                                        Select City </td>
                                        <td>
                                        <select  class="form-control input-medium" name="city_delete">
                                         <option value="">--- Select Fee ---</option>
                                      	<?php
										$sel_city=mysql_query("select * from `city`");
										while($arr_city=mysql_fetch_array($sel_city))
										{
											?>
											<option value="<?php echo $arr_city['sno']; ?>"><?php echo $arr_city['city']; ?></option>
                                            <?php
										}
										?>
                                        </select>
                                        </td>
                                        </table>
                                        <button class="btn btn-danger" name="delete" type="submit" style="margin-left:6%; margin-top:2%;"><i class="fa fa-trash-o "></i> Delete</button>  
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

<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>