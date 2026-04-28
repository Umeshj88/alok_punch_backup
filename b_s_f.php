<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
if(isset($_POST['add']))
{
	extract($_POST);
	mysql_query("insert into `fee_type` (`type`,`station`,`ledger_component_type`,`cat`,`status`) values('".$type."','".$station."','Bus Fee','Regular','1')");
}
if(isset($_POST['edit']))
{
	extract($_POST);
	$data=explode(',', $r1);
	mysql_query("update `fee_type` set `station`='".$station."', `type`='".$type."', `amt`='".$amt."' where `type`='".$data[0]."' && `station`='".$data[1]."'");
}
if(isset($_POST['delete']))
{
	extract($_POST); 
	$sql="delete from `fee_type` where `sno`='".$r1."'";
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
                                        <td><label>Bus Fee</label></td>
                                        <td><select class="form-control input-medium" name="type">
                                                <option value="0">Select</option>
                                                    <option value="Bus Fee(Boys)">Boys</option>
                                                    <option value="Bus Fee(Girls)">Girls</option>
                                                    </select></td>
                                        </tr>
                                        <tr> 
                                        <td><label>Station</label></td>
                                        <td><select class="form-control input-medium" name="station">
                                            <option value="0">Select Station</option>
                                            <?php $sel=mysql_query("select * from `bus_station`");
                                            while($arr=mysql_fetch_array($sel))
                                            {?>
                                            <?php echo '<option value="'.$arr['id'].'">'.$arr['station'].'</option>';} ?>
                                            </select></td>
                                        </tr>
                                       
                                        
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
                                                <th>Bus Fee</th>
                                                <th>Station</th>
                                            </tr>
                                        </thead>
                                        <?php 
										 $a="select * from `fee_type` where `ledger_component_type`='Bus Fee'";
                                        $b=mysql_query($a);
                                        while($row=mysql_fetch_array($b))
                                        { ?>
                                           
                                           <tr>
                                           <td>
                                           <input id="r<?php echo $row['sno']; ?>" type="radio" value="<?php echo $row['type'].','.$row['station'].','.$row['amt']; ?>" name="r1" onClick="get_busfee(this.id)"></input>
                                           </td>
                                            <td>
                                           <?php echo $row['type'];?>
                                           </td>
                                           <td>
                                           <?php $sel=mysql_query("select * from `bus_station` where `id`='".$row['station']."'");
                                            $arr=mysql_fetch_array($sel); echo $arr['station'];?>
                                           </td>
                                           
                                           </tr>
                                        
                                        <?php
                                          } 
                                         ?></table>
                                     <table style="margin-left:1%;">
                                    <tr> 
                                    <td><label>Bus Fee</label></td>
                                    <td><select class="form-control input-medium" name="type" id="type">
                                            <option value="0">Select</option>
                                                <option value="Bus Fee(Boys)">Boys</option>
                                                <option value="Bus Fee(Girls)">Girls</option>
                                                </select></td>
                                    </tr>
                                    <tr> 
                                    <td><label>Station</label></td>
                                        <td><select class="form-control input-medium" name="station"  id="station">
                                            <option value="0">Select Station</option>
                                            <?php $sel=mysql_query("select * from `bus_station`");
                                            while($arr=mysql_fetch_array($sel))
                                            {?>
                                            <?php echo '<option value="'.$arr['id'].'">'.$arr['station'].'</option>';} ?>
                                            </select>
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
                                                <th>Select</th>
                                               <th>Bus Fee</th>
                                                <th>Station</th>
                                            </tr>
                                        </thead>
                                        <?php 
										 $a="select * from `fee_type` where `ledger_component_type`='Bus Fee'";
                                        $b=mysql_query($a);
                                        while($row=mysql_fetch_array($b))
                                        { ?>
                                           
                                           <tr>
                                           <td>
                                           <input type="radio" name="r1" value="<?php echo $row['sno'];?>"></input>
                                           </td>
                                            <td>
                                           <?php echo $row['type'];?>
                                           </td>
                                           <td>
                                           <?php $sel=mysql_query("select * from `bus_station` where `id`='".$row['station']."'");
                                            $arr=mysql_fetch_array($sel); echo $arr['station'];?>
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