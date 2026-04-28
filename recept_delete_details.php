<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");

?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
<title>Home | <?php title();?></title>
<?php
logo();
css();
ajax();
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
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
        <form class="form-signin" name="frm2" method="POST" action="view_delete_recpt.php" target="_blank"> 
        
        
        <div  class="portlet ">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> Recept Delete Details
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body form">
							                   
<div class="form-group">
<div class="row-fluid">		  
							
<table  align="center">
<tr>
<td style="border-bottom:1px solid #CCC" align="center">
<label style="cursor:pointer"> <b>Cheak/Uncheak All</b>	 <input style="width:17px ;height:17px;margin-left:10px" type="checkbox" id="check2" value="" onChange="cheking2(this.id)"></label>
										
</td>
</tr>
<tr>
<td style="border-bottom:1px solid #CCC ;height:35px">
										
                                        <div class="checkbox-list">
											<label class="checkbox-inline">
											 <input type="checkbox" class="asd"  style="width:17px ;height:17px;"  name="check2[]" value="1" > Annual Fee 
                                             </label>
                                             
											<label class="checkbox-inline">
											 <input type="checkbox" style="width:17px ;height:17px;"  name="check2[]" value="2" >Monthly Fee 
                                             </label>
                                            
                                            <label class="checkbox-inline">
											 <input type="checkbox" style="width:17px ;height:17px;"  name="check2[]" value="3" >Hostel Fee 
                                             </label>
                                             
                                            <label class="checkbox-inline">
											 <input type="checkbox" style="width:17px ;height:17px;"  name="check2[]" value="4">Caution
                                             </label>
                                            
                                              <label class="checkbox-inline">
											 <input type="checkbox" style="width:17px ;height:17px;"  name="check2[]" value="5" >Adhoc Fee
                                             </label>
										</div>
                                        </td>
                                        </tr>
                                       
                                        </table>
                                        <br/>
                                        <div class="form-group">
										<label class="control-label col-md-4"></label>
										<div class="col-md-4">
											<div class="input-group input-large date-picker input-daterange">
												<input required placeholder="Date From" type="text" class="form-control" name="from">
												<label class="input-group-addon">
													 to
												</label>
												<input required placeholder="Date " type="text"  class="form-control" name="to">
											</div>
											<!-- /input-group -->
											
										</div>
									</div>
<br/>
<br/>
<table  align="center">

 <tr>
                                        <td align="center">
                                          <button type="submit" name="view" class="btn btn-primary" value="Submit">View</button>
                                        </td>
                                        </tr>
                                        </table>
									</div>
						</div>
		</div>
 
    </div>
        </form>
                
                </div>
            </div>
        </div>
    <!-- END CONTENT -->
    </div>
</div>

<!-- END CONTAINER -->

<?php
footer();
js();?>

</body>
<!-- END BODY -->

</html>