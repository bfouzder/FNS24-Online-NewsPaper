
<!--bofof Data entry Form--->
<?php
//pre($edit);
 if($db->get('doaction')=='add'){
$panel_title="Add New Client History";
?>
<div class="row" id="add_edit_block"  style="display:block">
<?php }elseif($edit){ 
$panel_title="Update Client History";
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
	  <h3 class="panel-title">Client History Information</h3>
	</div>
	<div class="panel-body">
		
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">History Type:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="history_type"  value="<?=$edit['history_type']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Visitors:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="with_visit"  value="<?=$edit['with_visit']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">User ID</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="user_id"  value="<?=$edit['user_id']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client ID:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_id"  value="<?= $edit['client_id'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Zone:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_zone"  value="<?= $edit['client_zone'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Name:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_name"  value="<?= $edit['client_name'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<h2 style="margin-left: 45%">Client Services</h2>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Communication Media:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="communication_media"  value="<?= $edit['communication_media'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Services:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="services"  value="<?= $edit['services'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Customer Interest:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="customer_interest"  value="<?= $edit['customer_interest'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">No of Interest Type:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="no_interest_type"  value="<?= $edit['no_interest_type'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">No of Interest Cause:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="no_interest_coz"  value="<?= $edit['no_interest_coz'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Dependency:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="dependency"  value="<?= $edit['dependency'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Client Feedback:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="client_feedback"  value="<?= $edit['client_feedback'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Next Action:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="next_action"  value="<?= $edit['next_action'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Offer Date:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="offer_date"  value="<?= $edit['offer_date'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">E Date:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="e_date"  value="<?= $edit['e_date'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">E Time:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="e_time"  value="<?= $edit['e_time'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">E Time Followup Dete Format:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="e_time_ffollowup_dateormat"  value="<?= $edit['e_time_ffollowup_dateormat'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Transport By:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="transport_by"  value="<?= $edit['transport_by'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Transport Cost:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="transport_cost"  value="<?= $edit['transport_cost'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Transport Location:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="transpost_location"  value="<?= $edit['transpost_location'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<h2 style="margin-left: 45%">PO/SignUp Information</h2>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">PO Format:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="po_format"  value="<?= $edit['po_format'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Po Type:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="po_type"  value="<?= $edit['po_type'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Package Name:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="package_name"  value="<?= $edit['package_name'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Billing Cycle:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="billing_cycle"  value="<?= $edit['billing_cycle'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">PO/Signup OTC Amount:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="po_otc_amount"  value="<?= $edit['po_otc_amount'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">PO/Signup MRC Amount:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="po_mrc_amount"  value="<?= $edit['po_mrc_amount'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">PO/Signup YRC Amount:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="po_yrc_amount"  value="<?= $edit['po_yrc_amount'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">PO/Signup Total Amount:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="po_total_amount"  value="<?= $edit['po_total_amount'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Total Branch:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="total_branch"  value="<?= $edit['total_branch'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Note:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="note"  value="<?= $edit['note'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Required Indentity:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="req_indentity"  value="<?= $edit['req_indentity'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Req Indentity Amount:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="req_indentity_amount"  value="<?= $edit['req_indentity_amount'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">MQ ID:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="mq_id"  value="<?= $edit['mq_id'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">MIS ID:</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="mis_id"  value="<?= $edit['mis_id'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		  
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
		<h2><i class="fa fa-th-list"></i> List of Client History</h2>                    
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
            <th><form action="" method="get"> 
            	  <select name="type" class="form-control" 	id="type" onchange="submit(this);"   >
				     <option value="">Filter by History Type</option> 
				      <?=__getHistoryTypeOptions($db->get_post('type'));?>
					 
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
          	          
            <th>User Id</th>
            <th>Client Id</th>
            <th>Client Name</th>
            <th>Client Zone</th>
            <?php
            $type = $db->get_post('type');
            if($type){
            ?> 
	            <th>PO OTC Amount</th>
	            <th>PO MRC Amount</th>
	            <th>PO YRC Amount</th> 
        	<?php } ?>
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
                
                <td><?= $value['user_id']; ?></td>
                <td><?= $value['client_id']; ?></td>
                <td><?= $value['client_name']; ?></td>
                <td><?= $value['client_zone']; ?></td>
	            <?php
		            $type = $db->get_post('type');
		            if($type){
		        ?> 
                <td><?= $value['po_otc_amount']; ?></td>
                <td><?= $value['po_mrc_amount']; ?></td>
                <td><?= $value['po_yrc_amount']; ?></td>
            	<?php } ?>
                
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
function __getHistoryTypeOptions($history_type){
	global $db;

	$history_types=get_history_types();
	foreach($history_types as $history_type_name=>$history_type_title){
		$sel=($history_type==$history_type_name)? ' selected="selected"':'';
		$drop.='<option value="'.$history_type_name.'" '.$sel.'>'.$history_type_title.'</option>';
	}
	return $drop;
} 
?>