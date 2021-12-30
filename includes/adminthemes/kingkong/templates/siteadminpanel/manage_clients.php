
<!--bofof Data entry Form--->
<?php
//pre($edit);
 if($db->get('doaction')=='add'){
$panel_title="Add New Client";
?>
<div class="row" id="add_edit_block"  style="display:block">
<?php }elseif($edit){ 
$panel_title="Update Client";
?>
<div class="row" id="add_edit_block" <?=($edit)?' style="display:block"':' style="display:none"';?>>
<?php }else{ ?>

<div class="row" id="add_edit_block" style="display:none">
<?php } ?> 

 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
		<h2><?=$panel_title?></h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
		<br />
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" >
		 <input type="hidden" name="formSubmitted" value="1" >
		 <?php if($edit){ ?>
		 <input type="hidden" name="<?=$primaryKey?>" value="<?=$edit[$primaryKey]?>" >
		 <?php } ?>

<div class="panel panel-success">
	<div class="panel-heading">
	  <h3 class="panel-title">Client Edit Page</h3>
	</div>
	<div class="panel-body">

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Name:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_name"  value="<?=$edit['client_name']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>


		<?php if($client_options){ ?>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Type:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
	
		  <select name="client_type" class="form-control">
		  	<?=$client_options?>
		  </select>
		</div>
		</div>
		<?php } ?>



		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Server Type:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="server_type"  value="<?=$edit['server_type']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Code:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_code"  value="<?=$edit['client_code']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Contact Person:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="contact_person"  value="<?=$edit['contact_person']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Email:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_email"  value="<?=$edit['client_email']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Alternative Email:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_email_alt"  value="<?=$edit['client_email_alt']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Phone:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_phone"  value="<?=$edit['client_phone']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Alternative phone:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_phone_alt"  value="<?=$edit['client_phone_alt']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<h2 style="margin-left: 50%">Client Address</h2>

		<!-- <?php if($zone_options){ ?>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Zone:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <select name="client_zone" class="form-control" >
		  	<?=$zone_options?>
		  </select>
		</div>
		</div>
		<?php } ?>

		<?php if($area_options){ ?>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Area:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
	
		  <select name="client_area" class="form-control">
		  	<?=$area_options?>
		  </select>
		</div>
		</div>
		<?php } ?> -->

		<!-- test -->
		<!-- <?php if($zone_options){ ?>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Zone:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <select name="client_zone" class="form-control" id="zoneDropdown">
		  	<?=$zone_options?>
		  </select>
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Area:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
	
		  <select name="client_area" class="form-control" id="select_area">
		  	<option value="">Select Area</option>
		  </select>

			</div>
		</div>



		<?php } ?> -->
		<!-- end test -->


		<?php if($zone_options){ ?>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Zone:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <select name="client_zone" class="form-control col-md-7 col-xs-12" id="zone_dropdown_test">
		  	<?= $zone_options ?>
		  </select>
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Area:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
	
		  <select name="client_area" class="form-control col-md-7 col-xs-12" id="select_area_test">
		  	<option value="">Select Area</option>
		  	<?php if($area_options){ ?>
		  		<?=$area_options?>
		  	<?php } ?>
		  </select>
		</div>
		</div>

		<?php } ?>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Sector:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_sector"  value="<?=$edit['client_sector']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Block:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_block"  value="<?=$edit['client_block']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client House:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_house"  value="<?=$edit['client_house']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Address:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_address"  value="<?=$edit['client_address']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Location:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_location"  value="<?=$edit['client_location']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

<!--/address-->

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Business Type:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="business_type"  value="<?=$edit['business_type']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

	
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Branch Name:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="branch_name"  value="<?=$edit['branch_name']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Contact Person Designation:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="contact_person_designation"  value="<?=$edit['contact_person_designation']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Contact Person Department:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="contact_person_department"  value="<?=$edit['contact_person_department']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>



		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Services:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_services"  value="<?=$edit['client_services']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Extra Contact:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="extra_contact"  value="<?=$edit['extra_contact']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Added Date:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="date_added"  value="<?=$edit['date_added']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Status:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="status"  value="<?=$edit['status']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Link3 Subscriber ID:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="link3_subscriber_id"  value="<?=$edit['link3_subscriber_id']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<?php if($user_options){ ?>
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Account Manager:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
	
		  <select name="user_id" class="form-control">
		  	<?=$user_options?>
		  </select>
		</div>
		</div>
		<?php } ?>


		<input type="hidden" id="areas" name="areas" value="<?= json_encode($areas) ?>">
		  
	</div><!--/panel-body-->
</div><!--/panel-->	
		  <div class="form-group submit_sec">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			    <button type="submit" name="submit" class="btn btn-success">Submit</button>
				  <button type="button" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=$redirect_url?>">Cancel</a>
			</div>
		  </div>
		</form>
	  </div>
	</div>
  </div>
</div>

<!--/eof Data entry Form--->



<!--Listing-->	


<?php $edit=($db->get('doaction')=='add')?true:$edit;?>        
 
<div class="row" id="add_edit_block_list" <?=($edit)?' style="display:none"':' style="display:block"';?>>

	<div class="col-xs-12 col-sm-12 col-md-12">	           
            
    <div class="x_panel">
	  <div class="x_title">
		<h2><i class="fa fa-th-list"></i> List of Clients</h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
             
<!--bof topBAR-->
<div class="table-responsive">	
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>  
            <!--bof search Panel-->
            <?php $sq=($q)?$q:"Search here";?>
            <form class="form-inline" method="get" onsubmit="return checkSearch(this)">
            	<div class="form-group">
            		<label class="sr-only" for="exampleInputAmount">Search</label>
            		<div class="input-group">
            			<!--<div class="input-group-addon">Search</div>-->
            			<input type="text" class="form-control" name="q" value="<?=$q?>"   placeholder="<?=$sq?>">
            		</div>
            	</div>
            	<button type="submit" class="btn btn-primary">GO</button>
            </form>
            <!--eof search Panel-->	 
            </th>
            <th><form action="" method="get"> <select name="client_type" class="form-control" id="type" onchange="submit(this);"   >
				     <option value="">Filter by Client Type</option> 
				      <?=__getClientType($db->get_post('client_type'));?>
					 
				  </select>
				</form> 
			</th>
            </tr>
        </thead>
    </table>
</div><!--table Responsive-->
<div class="clear"></div>
<!--eof topBAR-->     
      
<!--bof Listing---------------------------->	
<form action="" method="post"  class="form-inline"  onsubmit="return check_action()">
 <input type="hidden" value="true" name="formSubmittedROWS"/>	 
  
 <div class="table-responsive">
 <table class="table table-bordered">
	<thead>
        <thead class="thead">
          <tr>
          	<th width="5%"><input type="checkbox" id="check_uncheck_top" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_top')" /></th>

            <th>Link3 Subscriber ID</th>
          	<th>Client Name</th>           
          	<th>Contact Person</th>           
          	<th>Client Email</th>           
            <th>Status</th>
            <th>Action</th>
             </tr>
        </thead>
        <tbody class="tbody">
        <?php if($rows): ?> 
        
        <?php foreach($rows as $key => $value):
            
            $class=(($i%2)==0)?'col':'col1';
            #set action_urls
                $action_id=$value[$primaryKey];
                $active_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=disapprove';
                $inactive_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=approve';
                $edit_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=edit';
                $del_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=delete';
        
        
		     // pre($value);
	        
            
        ?>
         
         
            <tr class="<?=$class;?>" >
                <td><input type="checkbox" name="action_ids[]" id="checksingle<?php echo $key; ?>" value="<?=$action_id?>" /></td>
                
                <td><?= $value['link3_subscriber_id']; ?></td>
                <td><?= $value['client_name']; ?></td>
                <td><?= $value['contact_person']; ?></td>
                <td><?= $value['client_email']; ?></td>
                
                <td class="action_active_inactive">
                    <?php if( $value['status'] == 1){ ?>
                        <a href="<?=$active_url?>" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
                    <?php }else{ ?>
                    <a href="<?=$inactive_url?>"   class="label label-warning"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>	
                    <?php } ?> 
                </td>      
                <td  class="action_edit_delete">
                    <a href="<?=$edit_url?>" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"> EDIT</i></a>
                    &nbsp;
                    <a href="<?=$del_url?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> DEL</i> </a>
                </td>
            </tr>
            
            <?php endforeach; ?>
            <?php else: ?>
            <tr class="col"><td colspan="8">No Result Found.</td></tr>
            <?php endif; ?>
          
        </tbody>  
        <tfoot class="tfoot">
          <tr>
		     <td align="left"><input type="checkbox" id="check_uncheck_bottom" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_bottom')" /></td>
         	 <td align="left">
					<div class="form-group">
						<select name="action" class="form-control" id="p_action">
							<option value="" selected="selected">Select Action</option>
							<option value="approve" <?php if($db->post('action')=='approve'){ ?> selected="selected" <?php } ?>>Approve</option>
							<option value="disapprove" <?php if($db->post('action')=='disapprove'){ ?> selected="selected" <?php } ?>>disapprove</option>
							<option value="delete" <?php if($db->post('action')=='delete'){ ?> selected="selected" <?php } ?>>Delete</option>
						</select>
					</div>
              </td>
              <td align="left">      
					<input type="submit" value="Submit" name="" class="btn btn-success"  style="margin-top:2px;"/>
				
             </td>
          </tr>
         </tfoot>  
      </table>
</div><!--table Responsive-->
</form>
    
<?php include(TEMPLATE_STORE.'pagination_raw.php');?>
<!--/eof Listing---------------------------->

			</div><!--/end panel-body-->
	  </div>
	</div>
</div><!--/end row-->

<?php 
	function __getClientType($client_type){
		global $db;
		$type_array = array('HOME', 'SOHO', 'CORPORATION');
		foreach ($type_array as $value) {
			$sel = ($client_type == $value)? 'selected="selected"':'';
			$drop.='<option value="'.$value.'"'.$sel.'>'.$value.'</option>';
		}
		return $drop;
	}
 ?>

<?php
__Sldwn($areas);

function __Sldwn($areas){

	$area_data=array();
	if($areas):
		foreach($areas as $k=> $a_info){	
		   $area_data[$a_info['ZoneID']][]=$a_info;	
		}
	endif;

	$option_g='<div style="display:none">';

	if($area_data){
		foreach($area_data as $g_id=> $g_val_array){
			$option_g .='<div id="gid'.$g_id.'">'."\n";
				foreach($g_val_array as $k=> $val){
				$option_g .='<option value="'.$val['ID'].'">'.$val['AreaName'].'</option>';
				}//foreach
			$option_g .='</div>'."\n";
		}//foreach
	}
	$option_g .='</div>'."\n";


?>
<script type="text/javascript">
	$("#zoneDropdown").change(function(){
		var zoneId = $("#zoneDropdown option:selected").val();
	var gid='gid'+parseInt(zoneId);
	$('#select_area').html($('#'+gid).html());
	});
</script>
<?php 
	echo  $option_g; 
}
?>

<script type="text/javascript">
	$("#zone_dropdown_test").change(function(){
		var zoneName = $("#zone_dropdown_test").val();
		var url ='<?=SCRIPT_URL.'ajax/ajax_action.php'?>';
		$.post(url,{action:"getZone",zoneName:zoneName},function(data){
			$("#select_area_test").html(data);
    	});
	});

</script>

