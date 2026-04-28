<?php
require_once("conn.php");


 if(!empty($_GET['user_id']))
 {
	 $user_id=$_GET['user_id'];
	
	 $logins_sel1=mysql_query("select * from login where 	`id`='$user_id'	");
		$logins_ftc=mysql_fetch_array($logins_sel1);
			  $u_name=$logins_ftc['username'];
 ?>

<tr>
<td>
Select Menu
</td><td style="padding-left:5px">
  <div class="form-group">
										
			
			<input id="user_name_id" name="user_name_id" type="hidden" value="<?php echo $user_id ; ?>">				 
         <select name="main_menu_id" style="width:150px"  class="form-control" onChange="sub_menu_sle(this.value);">
           <option value="">--Select--</option>
		 <?php $sel_menu_privileage=mysql_query("select * from menu_privileage where user_id='$user_id' ");
		 while($ftc_menu_privileage=mysql_fetch_array($sel_menu_privileage))
		 {
			
			  $menu_name_id=$ftc_menu_privileage['menu_name_id'];
			 
			 
			 	$sel_menu_name=mysql_query("select * from `menu_name` where `id`='$menu_name_id'");
				$ftc_menu_name=mysql_fetch_array($sel_menu_name);
			
				$menu_name= $ftc_menu_name['menu_name'];
			 ?>
			<option   value="<?php echo $menu_name_id ;?>"><?php echo $menu_name ; ?></option>
             <?php
			 
		 } ?>
         </select>
									</div>
</td>
</tr>
     <?php
 }
