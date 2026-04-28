<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['add']))
{
	extract($_POST);
	mysql_query("insert into `bus_station` (`station`) values('".$station."')");
}
if(isset($_POST['edit']))
{
	extract($_POST);
	
	mysql_query("update `bus_station` set `station`='".$station."' where `station`='".$r1."'");
}
if(isset($_POST['delete']))
{
	extract($_POST); 
	$sql="delete from `bus_station` where `id`='".$r1."'";
	$r=mysql_query($sql);
}
?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Bus Fee Setup | <?php title();?></title>
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
								<i class="fa fa-reorder"></i>Bus Fee Setup
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
                                        <td><label>Station</label></td>
                                        <td><input class="form-control input-medium" type="text" name="station" placeholder="Station"></td>
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
                                   
                                        <table class="table table-bordered table-hover" style="margin-left:1%; width:40%;">
                                        <thead>
                                                <tr>
                                                <th>Select</th>
                                                <th>Station</th>
                                            </tr>
                                        </thead>
                                         <?php
									$sel=mysql_query("select * from `bus_station`");
                                    while($arr=mysql_fetch_array($sel))
									{
											?>
										 <tr>
                                           <td>
                                           <input id="r<?php echo $arr['id']; ?>" type="radio" value="<?php echo $arr['station']; ?>" name="r1" onClick="get_station(this.id)"></input>
                                           </td>
                                           
                                           <td>
                                           <?php  echo $arr['station'];?>
                                           </td>
                                            
                                           </tr>
                                           <?php
									}
									?>
                                         </table>
                                     <table style="margin-left:1%;">
                                   
                                    <tr> 
                                    <td><label>Station</label></td>
                                        <td><input class="form-control input-medium" type="text" name="station" id="station" placeholder="Station">
                                      
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                    <td></td>
                                    <td>
                                               
                                                <button class="btn btn-warning" name="edit" type="submit" style=" margin-top:2%;"><i class="fa fa-edit"></i> Submit</button>
                                              
                                                </td></tr>
                                                </table>
                                   
                                	
                                          </form>
								</div>
								<div class="tab-pane fade" id="tab_1_3">
									<form method="POST" name="3">
                                   
                                        <table class="table table-bordered table-hover" style="margin-left:1%; width:40%;">
                                        <thead>
                                                <tr>
                                                <th>Station</th>
                                            </tr>
                                        </thead>
                                         <?php
									$sel=mysql_query("select * from `bus_station`");
                                    while($arr=mysql_fetch_array($sel))
									{
											?>
										 <tr>
                                           <td>
                                           <input id="r<?php echo $arr['id']; ?>" type="radio" value="<?php echo $arr['id']; ?>" name="r1"></input>
                                           </td>
                                           
                                           <td>
                                           <?php  echo $arr['station'];?>
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