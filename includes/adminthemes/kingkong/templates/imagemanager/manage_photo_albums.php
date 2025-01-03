
<!--Listing-->	

<div class="row" id="add_edit_block_list">

	<div class="col-xs-12 col-sm-12 col-md-12">	           
      <a href="<?=ADMIN_URL?>addAlbumList" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Create New Photo Album</a>
            
    <div class="x_panel">
	  <div class="x_title">
		<h2><i class="fa fa-th-list"></i> Photo Albums</h2>                    
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
            		<select name="catID" class="form-control" id="CategoryName" onchange="submit(this);"   >
					     <option value="">Filter by Category</option> 
					      <?=__getPhotoCatOptions($db->get_post('catID'));?>
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

        <thead class="thead">
        <tr>
          	<th width="5%"><input type="checkbox" id="check_uncheck_top" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_top')" /></th>
          	<th>Album</th>           
          	<th>Cover</th>           
            <th>Category</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
        </thead>
        <tbody class="tbody">
        <?php if($rows): ?> 
        
        <?php foreach($rows as $key => $value):
            $album_info=$value;
           // pre($album_info);
            $class=(($i%2)==0)?'col':'col1';
            #set action_urls
                $action_id=$value[$primaryKey];
                $active_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=disapprove';
                $inactive_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=approve';
                $edit_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=edit';
                $del_url=SCRIPT_URL.$redirect_url.'?action_id='.$action_id.'&action=delete';
              
                $cat_id=$value['cat_id'];
		        $cat_name=getImageCategoryMenuText($cat_id);
                $album_url=ADMIN_URL.'viewAlbum/'.$action_id.'/'.$value['album_title'];	
		       //pre($value);
	        
            
        ?>
         
         
            <tr class="<?=$class;?>" >
                <td><input type="checkbox" name="action_ids[]" id="checksingle<?php echo $key; ?>" value="<?=$action_id?>" /></td>
           
                <td title="<?= $value[$primaryKey]; ?>"><?= $value['album_title']; ?> 
                
                </td>
                <td>
                <img src="<?=$value['fec_image']?>" width="100" alt="album-<?= $value[$primaryKey]; ?>">
                </td>
                <td title="<?= $cat_id; ?>"><?= $cat_name; ?> </td>
                
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
					<a href="<?=$album_url?>" title="View" class="btn btn-info btn-xs fancybox fancybox.iframe" target="_blank"><i class="fa fa-eye"> View</i> </a>
                    &nbsp;
                    <a href="<?=$del_url?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> DEL</i> </a>
                
                <div class="clearfix"></div>
 <!--<a href="<?=ADMIN_URL?>popup_imagemanager/?type=image_albums&type_id=<?= $value['album_id']; ?>" class="fancybox fancybox.iframe" target="_blank"><button type="button" class="btn btn-primary">Manage Photos</button></a>-->
 <a href="<?=ADMIN_URL?>manageAlbumPhotos/?type=image_albums&type_id=<?= $value['album_id']; ?>" class="btn btn-primary">Manage Photos</button></a>
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
                                <optgroup label="TOP 4 News"> 
                                    <option value="add_top_4" <?php if($db->post('action')=='add_top_4'){ ?> selected="selected" <?php } ?>>Assign as Top4</option>
                                    <option value="remove_top_4" <?php if($db->post('action')=='remove_top_4'){ ?> selected="selected" <?php } ?>>Remove from Top 4</option>
                                </optgroup>
                                <optgroup label="TOP 3 News"> 
                                    <option value="add_top_3" <?php if($db->post('action')=='add_top_3'){ ?> selected="selected" <?php } ?>>Assign as Top3</option>
                                    <option value="remove_top_3" <?php if($db->post('action')=='remove_top_3'){ ?> selected="selected" <?php } ?>>Remove from Top 3</option>
                                </optgroup>
                                <optgroup label="TOP 2 News">  
                                    <option value="add_top_2" <?php if($db->post('action')=='add_top_2'){ ?> selected="selected" <?php } ?>>Assign as Top3</option>
                                    <option value="remove_top_2" <?php if($db->post('action')=='remove_top_2'){ ?> selected="selected" <?php } ?>>Remove from Top 2</option>
                                </optgroup>
                                <optgroup label="Slider News"> 
                                    <option value="add_to_slider" <?php if($db->post('action')=='add_to_slider'){ ?> selected="selected" <?php } ?>>Add To Slder</option>
                                    <option value="remove_from_slider" <?php if($db->post('action')=='remove_from_slider'){ ?> selected="selected" <?php } ?>>Remove From Slider</option>
                                </optgroup>
                                <optgroup label="Breaking News">     
                                    <option value="add_to_breaking" <?php if($db->post('action')=='add_to_breaking'){ ?> selected="selected" <?php } ?>>Assign as Breaking News</option>
                                    <option value="remove_from_breaking" <?php if($db->post('action')=='remove_from_breaking'){ ?> selected="selected" <?php } ?>>Remove From Breaking</option>
                                </optgroup>
                                <optgroup label="Spotlight News">    
                                    <option value="add_to_spot_light" <?php if($db->post('action')=='add_to_spot_light'){ ?> selected="selected" <?php } ?>>Assign as Spotlight</option>
                                    <option value="remove_from_spot_light" <?php if($db->post('action')=='remove_from_spot_light'){ ?> selected="selected" <?php } ?>>Remove From Spotlight</option>
                                </optgroup>
                                <optgroup label="Published">  
                                    <option value="approve" <?php if($db->post('action')=='approve'){ ?> selected="selected" <?php } ?>>Approve</option>
                                    <option value="disapprove" <?php if($db->post('action')=='disapprove'){ ?> selected="selected" <?php } ?>>Disapprove</option>
                                </optgroup>
                            
                                <optgroup label="Delete">  
                                    <option value="delete" <?php if($db->post('action')=='delete'){ ?> selected="selected" <?php } ?>>Delete from Database</option>
                                </optgroup> 
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
<script>
function checkcat(catID){
    	return false;
    if(catID ==14){
        $('#section_DistrictID').show();
        $('#DistrictID').attr('required', 'required');
    }else{
        $('#section_DistrictID').hide();
      $('#DistrictID').removeAttr('required');   
    }
	return false;
}
</script>
<?php 
	function __getPhotoCatOptions($parentID=false){
		global $db;
		$types=$db->select("SELECT * FROM image_categories WHERE active=1");
		foreach($types as $type){
			$sel = ($type['cat_id'] == $parentID)? 'selected="selected"':'';
			$option.='<option value="'.$type['cat_id'].'"'.$sel.'>'.$type['menu_text'].'</option>';
		}
		return $option;
	}
?>