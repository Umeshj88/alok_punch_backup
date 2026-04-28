<?php
require_once("function.php");
require_once("conn.php");
include("authentication.php");
@$id=$_GET['id'];
$_SESSION['id']=@$id;

if(isset($_POST['cancle']))
{
	ob_start();
	header("location: cls_fee_comp_setup.php");
	ob_flush();
}
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
<script src="js/cls_fee_setup.js"></script>

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
              <form method="post" id="frm1" action="cls_fee_comp_setup_edit_cnn.php">
                <?php
                $sel2=mysql_query("select * from cls_fee_comp_setup1 where id='$id'");
                $arr2=mysql_fetch_array($sel2);
                ?>
                <div  style="width:100%;float:left;">
               
                  <div class="col-md-2">
  				<select class="form-control" name="cls" disabled="disabled">
                <?php
            $cl=mysql_query("select * from class where `sno`='".$arr2['cls']."'");
			 $arr=mysql_fetch_array($cl);
			 $class=$arr['cls'];
			 ?>
                            <option value="<?php echo $arr2['cls']; ?>"><?php echo $arr['cls']; ?></option>
                </select>
                </div>
                 <div class="col-md-2">
                 <select class="form-control" name="strm"  disabled="disabled">
                 <?php
				   $st=mysql_query("select * from stream where `sno`='".$arr2['strm']."'");
				 $arr1=mysql_fetch_array($st);
				 $stream=$arr1['strm'];
				 ?>
                            <option value="<?php echo $arr2['strm']; ?>"><?php echo $arr1['strm']; ?></option>
                </select>
                </div>
                <div class="col-md-2">
                  <select class="form-control" name="medium" disabled="disabled">
                  <?php
				   $md=mysql_query("select * from medium where `sno`='".$arr2['medium']."'");
				 $arr6=mysql_fetch_array($md);
				 $med=$arr6['medium'];
				 ?>
                            <option value="<?php echo $arr2['medium']; ?>"><?php echo $arr6['medium']; ?></option>
                
                </select>
               </div>
				</div>
                
                <div  style="width:100%; float:left;margin-top:2%;">
				<table class="table table-bordered table-hover" style="text-align:center !important;">
                <thead>
                    <tr>
                    <th style="text-align:center" colspan="2">Monthly Fee<br/>Components</th>
                    <th style="text-align:center">Amount</th>
					<th style="text-align:center" >Jul<input type="checkbox"  id="month1"  onclick="v_check('month1')"/></th>
					<th style="text-align:center">Aug<input type="checkbox"  id="month2"  onclick="v_check('month2')"/></th>
					<th style="text-align:center" >Sep<input type="checkbox"  id="month3"  onclick="v_check('month3')"/></th>
					<th style="text-align:center" >Oct<input type="checkbox"  id="month4"  onclick="v_check('month4')"/></th>
					<th style="text-align:center">Nov<input type="checkbox"  id="month5"  onclick="v_check('month5')"/></th>
					<th style="text-align:center" >Dec<input type="checkbox"  id="month6"  onclick="v_check('month6')"/></th>
					<th style="text-align:center" >Jan<input type="checkbox"  id="month7"  onclick="v_check('month7')"/></th>
					<th style="text-align:center">Feb<input type="checkbox"  id="month8"  onclick="v_check('month8')"/></th>
					<th style="text-align:center">Mar<input type="checkbox"  id="month9"  onclick="v_check('month9')"/></th>
					<th style="text-align:center" >Apr<input type="checkbox"  id="month10"  onclick="v_check('month10')"/></th>
					<th style="text-align:center" >May<input type="checkbox"  id="month11"  onclick="v_check('month11')"/></th>
					<th style="text-align:center" >Jun<input type="checkbox"  id="month12"  onclick="v_check('month12')"/></th>
                    </tr>
                    </thead>
                <?php
                $k=0; $cou=1; $cou1=0; $cou2=12;
                $cou3=$cou+$cou2; $m=0;
                $sel1=mysql_query("select * from fee_type where cat='Regular'");
                while($ar1=mysql_fetch_array($sel1))
                { $k++;
                $typ=$ar1['sno'];
                $sel7=mysql_query("select * from cls_fee_comp_setup2 where setup1_id='$id' && m_f_c='$typ'");
                $arr7=mysql_fetch_array($sel7);
                $typ1=$arr7['m_f_c'];
                $amt=$arr7['amt'];
                $month_no=$arr7['month_no'];
				
				if(!empty($ar1['station']))
				{
					$sel_bs=mysql_query("select * from `bus_station` where `id`='".$ar1['station']."'");
					$arr_bs=mysql_fetch_array($sel_bs); 
				}
				if($typ==$typ1) 
				{
					$disabled='';
				}
				else
				{
					$disabled='disabled';
				}
                ?>
                <tr>
                <td><input type="checkbox" name="c<?php echo $k;?>" id="<?php echo $k;?>" value="<?php echo $typ;?>" onclick="ck(this.id);" <?php if($typ==$typ1) { ?> checked="checked" <?php }?>/></td><td><?php echo $ar1['type']; if(!empty($ar1['station'])) { ?><br/><strong><?php echo $arr_bs['station']; } ?></strong></td>
                <td><input type="text" class="form-control" name="amt<?php echo $k;?>" id="amt<?php echo $k;?>" value="<?php echo $amt; ?>"  <?php echo $disabled; ?>/></td>
                
                <?php  
                $m++;
                $g=0;
				$gg=0;
                for($co=$cou;$co<$cou3;$co++)
                {
                    $cou1++; $g++;
                     $data=explode(",", $month_no);
                        for($i=0; $i<sizeof($data); $i++)
                        {
                             $t_data=$data[$i];
                             if($g==$t_data)
                             {
                                 $gg=$t_data;
                             }
                        }
                    
                ?>
                <td><input type="checkbox" name="cc<?php echo $m;?>[]" id="cc<?php echo $co;?>" value="<?php echo $g;?>" month<?php echo $g;?>  <?php if($g==$gg){?> checked="checked"<?php }?> style="opacity:0.7; width: 16px; height: 16px;outline: medium none !important;border: medium none !important;"  <?php echo $disabled; ?>/></td>
                <?php } $cou+=$cou1; $cou3=$cou+$cou2; $cou1=0;?>
                </tr>
                <?php } ?>
                </table>
                </div>
                
                
                <div  style="width:100%;  float:left;">
					<table class="table table-bordered table-hover" style=" width:50%;text-align:center !important;">
					<thead>
					<tr>
					<th colspan="2">One Time / Annual Fee Components</th>
					<th style="text-align:center">Amount</th></tr>
					</thead>
					<?php
					$k=0; $cou=1; $cou1=0; $cou2=12;
					$cou3=$cou+$cou2;
					$sel1=mysql_query("select * from fee_type where cat='Year'");
					while($ar1=mysql_fetch_array($sel1))
					{ $k++;
					$tp=$ar1['sno'];
					$sel6=mysql_query("select * from cls_fee_comp_setup3 where setup1_id='$id' && `fee_type`='$tp'");
					$arr6=mysql_fetch_array($sel6);
					$ft=$arr6['fee_type'];
					$amnt=$arr6['amt'];
					?>
					<tr>
					<td><input type="checkbox" name="a<?php echo $k;?>" id="a<?php echo $k;?>" onclick="ckk(this.id)" value="<?php echo $tp; ?>" <?php if($tp==$ft){?> checked="checked"<?php }?>/></td><td><?php echo $ar1['type'] ?></td>
					<td><input type="text" class="form-control" name="amtt<?php echo $k;?>" id="amtt<?php echo $k;?>" value="<?php if($tp==$ft){ echo $amnt; }?>"/></td>
					</tr>
					<?php } ?>
					</table>
                </div>
				 <div  style="width:100%;  float:left;">
					<table class="table table-bordered table-hover" style=" width:50%;text-align:center !important;">
					<thead>
					<tr>
					<th colspan="2">Once In A Life Time Components</th>
					<th style="text-align:center">Amount</th></tr>
					</thead>
					<?php
					$k=0; $cou=1; $cou1=0; $cou2=12;
					$cou3=$cou+$cou2;
					$sel1=mysql_query("select * from fee_type where cat='Admission'");
					while($ar1=mysql_fetch_array($sel1))
					{ $k++;
						$tp=$ar1['sno'];
						$sel6=mysql_query("select * from cls_fee_comp_setup3 where setup1_id='$id' && `fee_type`='$tp'");
						$arr6=mysql_fetch_array($sel6);
						$ft=$arr6['fee_type'];
						$amnt=$arr6['amt'];
						?>
						<tr>
						<td><input type="checkbox" name="once<?php echo $k;?>" id="once<?php echo $k;?>" onclick="ckk_once('<?php echo $k;?>')" value="<?php echo $tp; ?>" <?php if($tp==$ft){?> checked="checked"<?php }?>/></td><td><?php echo $ar1['type'] ?></td>
						<td><input type="text" class="form-control" name="once_amtt<?php echo $k;?>" id="once_amtt<?php echo $k;?>" value="<?php if($tp==$ft){ echo $amnt; }?>"/></td>
						</tr>
					<?php } ?>
					</table>
                </div>
				
                 <div style="float:left; width:40%; margin-top:2%;">
                <div class="col-md-2" style=" float:right;">
                <button class="btn btn-success" name="save" type="submit">Save</button> 
                 </div>
                </div>
                </form>
                <form method="post" name="ff">
                <div style="float:right; width:59%; margin-top:2%;">
                <div class="col-md-2">
                <button class="btn btn-default" name="cancle" type="submit">Cancle</button>
                </div>
                </div>
                </form>
			
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