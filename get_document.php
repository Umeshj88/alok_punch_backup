<?php
require_once("conn.php");
$cls=$_GET['cls'];

?>
        <td><?php
        	$b=mysql_query("select * from admsn_doc");
			while($row=mysql_fetch_array($b))
			{
				$admsn_id=$row['id'];
				$doc=$row['doc'];
			
				$sel=mysql_query("select admsn_doc_id from cls_admsn_doc where class_id='$cls'");
				$arr=mysql_fetch_array($sel);	
				$ad_id=$arr['admsn_doc_id'];
				$ad_doc_id='';
				$data=explode(',' , $ad_id);
				for($i=0; $i<sizeof($data); $i++)
				{
					if($data[$i]==$admsn_id)
					{
						$data_match=explode(',' , $document);
						for($j=0; $j<sizeof($data_match); $j++)
						{
							if($data_match[$j]==$admsn_id)
							{
								$ad_doc_id=$admsn_id;
							}
						}
						?>
			<label><input type="checkbox" name="document[]" value="<?php echo $admsn_id;?>" <?php if($row['id']==$ad_doc_id) { ?> checked="checked" <?php }?>/>
			<?php echo $doc;?></label><br/>
            <?php
					}
				}
				
				
			 } ?>
			 </td> 