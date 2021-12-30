
<!--Listing-->	
<div class="row" id="add_edit_block_list">

	<div class="col-xs-12 col-sm-12 col-md-12">	           
            
    <div class="x_panel">
	  <div class="x_title">
		<h2><i class="fa fa-th-list"></i><?=$u_info['user_fname']?> <?=$u_info['user_lname']?>Todo Lists</h2>                    
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
             
<!--bof topBAR-->
<div class="table-responsive">	
    <table class="table table-bordered">
        <thead>
            <tr>
            
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
          	<th width="5%"><input type="checkbox" id="check_uncheck_top" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_top')"/></th>      	
            <th>User ID</th>
          	<th>E Date</th>           
          	<th>Date Added</th> 
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
                <td><?= $value['e_date']; ?></td>
                <td><?= $value['date_added']; ?></td>
            </tr>
            
            <?php endforeach; ?>
            <?php else: ?>
            <tr class="col"><td colspan="8">No Result Found.</td></tr>
            <?php endif; ?>
          
        </tbody>  
       
      </table>
</div><!--table Responsive-->
</form>
    
<?php include(TEMPLATE_STORE.'pagination_raw.php');?>
<!--/eof Listing---------------------------->
			</div><!--/end panel-body-->
	  </div>
	</div>
</div><!--/end row-->

<!-- <?php 
	function __getEmployee($employee){
		global $db;
		$employees=$db->select("SELECT * FROM users");
		foreach($employees as $emp){
			$sel = ($emp['user_id'] == $employee)? 'selected="selected"':'';
			$option.='<option value="'.$emp['user_id'].'"'.$sel.'>'.$emp['user_fname'].''.$emp['user_lname'].'</option>';
		}
		return $option;
	}
?> -->