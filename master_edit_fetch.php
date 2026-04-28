<?php
include("conn.php");
include("function.php");
if(!empty($_GET['user_id']))
 {
	 $user_id=$_GET['user_id'];
	
	 $logins_sel1=mysql_query("select * from login where 	`id`='$user_id'	");
		$logins_ftc=mysql_fetch_array($logins_sel1);
			  $u_name=$logins_ftc['username'];
 ?>

 <div class="row-fluid">		  
								<table  class="table table-bordered table-hover" style="width:50%;border-color:#ACDDB9;background-color:#FFF" align="center">
									<thead>
										<tr bgcolor="#ACDDB9" >
											<th>Menu for <?php echo $u_name; ?></th>
											<th  style="text-align:center;">
                                            								     <b>Status</b>	 <input style="width:17px ;height:17px;margin-left:10px" type="checkbox" id="check2" value="" onChange="cheking2(this.id)">
</th>
											
										</tr>
									</thead>
									<tbody>
                                    <?php
									
									
									/////////
									
									
									
									 $i=0;
									$sel_menu_name=mysql_query("select * from `menu_name`");
									while($ftc_menu_name=mysql_fetch_array($sel_menu_name))
									{
										$menu_name= $ftc_menu_name['menu_name'];
										$menu_name_id= $ftc_menu_name['id'];
										$i++;
											$sel_menu_privileage=mysql_query("select * from menu_privileage where user_id='$user_id' && `menu_name_id`='$menu_name_id'");
										$cnt_sel_menu_privileage=mysql_num_rows($sel_menu_privileage);
									?>
										<tr>
											<td><?php echo $menu_name; ?></td>
											<td style="text-align:center;">
                      <input type="checkbox" style="width:17px ;height:17px"   name="check2[]" value="<?php echo $menu_name_id; ?>" <?php if(!empty($cnt_sel_menu_privileage)){ ?> checked <?php  } ?>></td>
											
										</tr>
                                     <?php
									}
									 
									/////
									
									
									 ?>   
                                      <input type="hidden"  name="total_chkbx2" value="<?php echo $i; ?>">
									</tbody>
								</table>
							</div>
                            </div>
						</div>
                        </div>
   <table align="center">
   <tr>
   <td>
   
    <input type="submit" class="btn btn-success" name="sub1" value="Submit">
   
   </td>
   </tr>
   </table>  <br />
     <?php
 }
