<?php
require_once("function.php");
require_once("conn.php");


 if(!empty($_GET['menu_id']))
 {
	  $menu_id=$_GET['menu_id'];
	   $user_id=$_GET['user_name_id'];
	   
	   $logins_sel1=mysql_query("select * from login where 	`id`='$user_id'	");
		$logins_ftc=mysql_fetch_array($logins_sel1);
			  $u_name=$logins_ftc['username'];
?>
 <div class="row-fluid">
 
 
 
					  
								<table class="table table-bordered table-hover" style="width:50%;border-color:#ACDDB9;background-color:#FFF" align="center">
									<thead>
										<tr bgcolor="#ACDDB9" >
											<th> Sub Menu for <?php echo $u_name; ?></th>
											<th  style="text-align:center;">
                                            								     <b>Status</b>	 <input style="width:17px ;height:17px;margin-left:10px" type="checkbox" id="check1" value="" onChange="cheking11(this.id)">
</th>
											
										</tr>
									</thead>
									<tbody>
                                    <?php
									
									
									/////////
									
									
									
									 $i=0;
									$sel_menu_name=mysql_query("select * from `sub_menu_name` where `main_menu_id`=$menu_id");
									while($ftc_menu_name=mysql_fetch_array($sel_menu_name))
									{
										$sub_menu_name= $ftc_menu_name['sub_menu_name'];
										$sub_menu_name_id= $ftc_menu_name['id'];
										$i++;
	                   	$sle_sub_menu_privileage=mysql_query("select * from sub_menu_privileage where user_id='$user_id' && `sub_menu_name_id`='$sub_menu_name_id'");
										$cnt_sub_menu_privileage=mysql_num_rows($sle_sub_menu_privileage);
									?>
										<tr>
											<td><?php echo $sub_menu_name; ?></td>
											<td style="text-align:center;">
                      <input type="checkbox" style="width:17px ;height:17px"   name="check1[]" value="<?php echo $sub_menu_name_id; ?>" <?php if(!empty($cnt_sub_menu_privileage)){ ?> checked <?php  } ?>></td>
											
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
   
    <input type="submit" class="btn btn-success" name="sub2" value="Submit">
   
   </td>
   </tr>
   </table>  <br />
   
   <?php
 }
 ?>