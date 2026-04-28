<?php
include("conn.php");
include("function.php");
include("authentication.php");

	$activ=1;


if($_POST['sub1'])
{
	 $user_id=$_POST['u_id'];
	

	mysql_query("delete from `menu_privileage` where  `user_id`='$user_id'");
	 $chk=$_POST['check2'];
	if (is_array($chk))
	{
		foreach ($chk as $value)
		{
			 $value;
			mysql_query("insert into `menu_privileage` set `user_id`='$user_id',`menu_name_id`='$value'");
		}
	}
		$activ=1;
	
}

if($_POST['sub2'])
{
	
	  $user_id=$_POST['user_name_id'];
	  $main_menu_id=$_POST['main_menu_id'];
	

	mysql_query("delete from `sub_menu_privileage` where  `user_id`='$user_id' && `main_menu_id`='$main_menu_id' ");
	 $chkk=$_POST['check1'];
	if (is_array($chkk))
	{
		foreach ($chkk as $valuee)
		{
			 $value;
			mysql_query("insert into `sub_menu_privileage` set `user_id`='$user_id',`sub_menu_name_id`='$valuee' ,`main_menu_id`='$main_menu_id'");
		}
	}
	$activ=2;
}



?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>Menu | <?php title();?></title>
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
<?php menu();
?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
   
<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
							<i class="fa fa-user"></i>	<i class="fa fa-thumbs-up"></i>User Priviliage
							</div>
							<div class="tools">
								
							</div>
						</div>
						<div class="portlet-body">
							<ul class="nav nav-tabs">
								<li  class="<?php if($activ==1){ ?>active<?php } ?>">
									<a style="background:#FDF7E3"  href="#tab_1_1" data-toggle="tab">Main Memu</a>
								</li>
								<li class="<?php if($activ==2){ ?>active<?php } ?>">
									<a style="background:#E8F4DD" href="#tab_1_2" data-toggle="tab">Sub Menu</a>
								</li>
								
							</ul>
							<div class="tab-content">
								<div style="background-color:#FDF7E3;border:1px solid #CCC"  class="tab-pane fade <?php if($activ==1){ ?>active in<?php } ?> " id="tab_1_1">
									  <form name="frm2" method="post">
                                                      
    <br/>
      
   <table align="center">  
         <tr>
           <td>User Name
         </td>
         <td>
         
         <div class="form-group">
										
			
							 
         <select name="u_id" style="width:150px"  id="desg" class="form-control" onChange="designation(this.value);">
           <option value="">--Select--</option>
		 <?php $sel1=mysql_query("select * from login");
		 while($arr1=mysql_fetch_array($sel1))
		 {
			$u_id= $arr1['id'];
			  $u_name=$arr1['username'];
			 
			 ?>
			<option   value="<?php echo $u_id ;?>"><?php echo $u_name ; ?></option>
             <?php
		 } ?>
         </select>
									</div>

         
        
         </td>
         </tr>
		</table>
   
<span id="get_data2">
    </span>
   
   
     </form>
								</div>
                                
                                   
								<div style="background-color:#E8F4DD;border:1px solid #CCC" class="tab-pane fade <?php if($activ==2){ ?>active in<?php } ?>" id="tab_1_2">
									  <form name="frm_1" method="post">
                                                      
    <br/>
        
   <table align="center">  
         <tr>
           <td>User Name
         </td>
         <td>
         
         <div class="form-group">
										
			
							 
         <select name="u_id_sub_menu" style="width:150px"   class="form-control" onChange="designation_2(this.value);">
           <option value="">--Select--</option>
		 <?php $sel1=mysql_query("select * from login");
		 while($arr1=mysql_fetch_array($sel1))
		 {
			$u_id= $arr1['id'];
			  $u_name=$arr1['username'];
			 
			 ?>
			<option   value="<?php echo $u_id ;?>"><?php echo $u_name ; ?></option>
             <?php
		 } ?>
         </select>
									</div>

         
        
         </td>
         </tr>
         <tr id="get_data1">
         </tr>
		</table>
   <span id="get_data_sub_menu">
    </span>
   

   
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
