
<!--bofof Data entry Form--->
<?php
 if($db->get('doaction')=='add'){
$panel_title="Add New Menu";
?>
<div class="row" id="add_edit_block"  style="display:block">
<?php }elseif($edit){ 
$panel_title="Update Menu";
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
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
		 <input type="hidden" name="formSubmitted" value="1" >
		 <?php if($edit){ ?>
		 <input type="hidden" name="<?=$primaryKey?>" value="<?=$edit[$primaryKey]?>" >
		 <?php } ?>

		
<div class="panel panel-success">
	<div class="panel-heading">
	  <h3 class="panel-title">Menu Information</h3>
	</div>
	<div class="panel-body">
		<div class="form-group">
    		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Parent:<em>*</em></label>
    		<div class="col-md-9 col-sm-9 col-xs-12">
    		  <select name="parent" class="form-control" id="CategoryName" onchange="submit(this);"   >
    					     <option value="">Top Category</option> 
    					      <?=__getMenuParentOptions($edit['parent']);?>
    				  	</select>
    		</div>
		</div>
		
		
		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Name:<em>*</em></label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="menuname" required="required" value="<?=$edit['menuname']?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
			
	
        

		<div class="form-group">
		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Short:<em>*</em></label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <input type="text" name="Priority" required="required" value="<?= $edit['Priority'] ?>" class="form-control col-md-7 col-xs-12">
		</div>
		</div>
		<!--<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Image</label>
            <div class="col-md-6 col-sm-9 col-xs-12">
               	<input type="file" name="image_url"  id="image_url"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">&nbsp;</label>
            <div class="col-md-6 col-sm-9 col-xs-12" id="imgPreview">
        		 <?php 
            		$image_url=($edit['image_url'])?$edit['image_url']:'#';
        		  ?>
                  <img src="<?=$image_url?>" class="img-thumbnail" id="image_url_preview" alt="Image_here" width="250"/>
        	</div>
        </div>-->
		  
		  
	</div><!--/panel-body-->
</div><!--/panel-->	

	
		  
		  <div class="form-group submit_sec">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			    <button type="submit" name="submit" class="btn btn-success">Submit</button>
				  <button type="reset" class="btn btn-primary">Reset</button>
				  <a class="btn btn-danger" href="<?=$redirect_url?>">Cancel</a>
			</div>
		  </div>
		</form>
	  </div>
	</div>
  </div>
</div>
<script>
	function ar_readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_url_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#image_url").change(function(){
    ar_readURL(this);
});
</script>
<!--/eof Data entry Form--->



<!--Listing-->	


<?php $edit=($db->get('doaction')=='add')?true:$edit;?>        
 
<div class="row" id="add_edit_block_list" <?=($edit)?' style="display:none"':' style="display:block"';?>>

	<div class="col-xs-12 col-sm-12 col-md-12">	           
            
    <div class="x_panel">
	  <div class="x_title">
		<h2><i class="fa fa-th-list"></i> List of Menus</h2>                    
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
            		<select name="sparent" class="form-control" id="CategoryName" onchange="submit(this);"   >
					     <option value="">Filter by Parent</option> 
					      <?=__getMenuParentOptions($db->get_post('sparent'));?>
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
          	
            <th width="5%">ID</th>
          	<th>Title</th>           
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
        
        
		      //pre($value);
	        
            
        ?>
         
         
            <tr class="<?=$class;?>" >
                <td><input type="checkbox" name="action_ids[]" id="checksingle<?php echo $key; ?>" value="<?=$action_id?>" /></td>
                <td><?= $value[$primaryKey]; ?></td>
                <td><?= $value['menuname']; ?></td>
                
                
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
	function __getMenuParentOptions($parentID=false){
		global $db;
		$types=$db->select("SELECT * FROM np_menuname WHERE parent=0");
		foreach($types as $type){
			$sel = ($type['menu_id'] == $parentID)? 'selected="selected"':'';
			$option.='<option value="'.$type['menu_id'].'"'.$sel.'>'.$type['menuname'].'</option>';
		}
		return $option;
	}
?>