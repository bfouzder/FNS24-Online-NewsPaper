<!--Listing-->	
<?php $edit=($db->get('doaction')=='add')?true:$edit;?>        
 
<div class="row" id="add_edit_block_list" <?=($edit)?' style="display:none"':' style="display:block"';?>>

	<div class="col-xs-12 col-sm-12 col-md-12">	           
            
    <div class="x_panel">
	  <div class="x_title">
		<h2><i class="fa fa-th-list"></i> Monthly Sales List </h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
             
<!--bof topBAR-->
<div class="table-responsive">	
	<form class="form-inline" method="get">
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>  
            <!--bof search Panel-->
            <?php $sq=($q)?$q:"Search here";?>
            	<div class="form-group">
            		<div class="input-group">
            			<div class="input-group-addon">From</div>
            			<input class="datepicker form-control active" name="date_from" value="<?=$date_from ?>" type="text">

            			<div class="input-group-addon">To</div>
            			<input class="datepicker form-control active" name="date_to" value="<?= $date_to?>" type="text">

            		</div>
            	</th>
            	<th>
	        		<select name="user_id" class="form-control" id="user_id">
					     <option value="">Filter by Client Name</option> 
					      <?=__getUserId($db->get_post('user_id'));?>
				  	</select>
				  	<button type="submit" class="btn btn-primary">Go</button>
				</th>
			  	</div>
			</tr>
        </thead>
    </table>
    </form> 
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
          	
          	<th>User Id</th>
            <th>Client name</th>
          	<th>PO OTC Amount</th>           
          	<th>PO MRC Amount</th>           
          	<th>PO YRC Amount</th>  
          	<th>PO Total Amount</th>  
             </tr>
        </thead>
        <tbody class="tbody">
        <?php if($rows): ?> 
        
        <?php foreach($rows as $key => $value):
            
            $class=(($i%2)==0)?'col':'col1'; 
        ?>
         
         
            <tr class="<?=$class;?>" >
                <td><?= $value['user_id']; ?></td>
                <td><?= $value['client_name']; ?></td>
                <td><?= $value['po_otc_amount']; ?></td>
                <td><?= $value['po_mrc_amount']; ?></td>
                <td><?= $value['po_yrc_amount']; ?></td>
                <td><?= $value['po_total_amount']; ?></td>
            </tr>
            
            
            <?php endforeach; ?>
            <tr>
            	<td style="font-size: 20px;"><b>Total Amount</b></td>
            	<td></td>
            	<td style="font-size: 20px;"><b><?=$total_otc['po_otc']?></b></td>
            	<td style="font-size: 20px;"><b><?=$total_mrc['po_mrc']?></b></td>
            	<td style="font-size: 20px;"><b><?=$total_yrc['po_yrc']?></b></td>
            	<td style="font-size: 20px;"><b><?=$total_amount['po_ttl']?></b></td>
            </tr>
            <?php else: ?>
            <tr class="col"><td colspan="8">No Result Found.</td></tr>
            <?php endif; ?>
          
        </tbody>  
        <tfoot class="tfoot">
  
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
	function __getUserId($user_id){
		global $db;
		$users=$db->select("SELECT * FROM users WHERE user_role > 1");
		foreach($users as $u_info){
			$sel = ($u_info['user_id'] == $user_id)? 'selected="selected"':'';
			$option.='<option value="'.$u_info['user_id'].'"'.$sel.'>'.$u_info['link3_id'].' '.$u_info['user_fname'].' '.$u_info['user_role'].'</option>';
		}
		return $option;
	}
?>