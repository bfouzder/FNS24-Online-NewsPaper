<?php

$album_id= $album_info['album_id'];
$album_title= $album_info['album_title'];
$album_categories= explode(",",$album_info['cat_id']);

$bklist = ar_unserialize($album_list_info['bklist']);
function get_ImageCat_items($sel_items=array()){
	global $db;
	$test_check_box_items=array();
	$all_tests= $db->select("SELECT * FROM image_categories WHERE active =1 AND parent =0 ORDER BY menu_order ASC");
	
	if($all_tests){
		foreach ($all_tests as $k=>$test_info){
			$cat_id=$test_info['cat_id'];
			$parent=$test_info['cat_id'];
			$test_name= $test_info['seo_title'];
			$test_title= $test_info['menu_text'];	
			$test_parent_name= $test_info['seo_title'];
			if (in_array($cat_id, $sel_items)) {
				$test_check_box_items[]='<option value="'.$cat_id.'" selected>'.$test_title.'</option>';
			}else{
				$test_check_box_items[]='<option value="'.$cat_id.'">'.$test_title.'</option>';	
			}
			
			#bof optgroup
			//$test_check_box_items[]='<optgroup label="'.$test_title.'">';
			
				$all_sub_tests= $db->select("SELECT * FROM image_categories WHERE active =1 AND parent =$parent ORDER BY menu_order ASC");
				if($all_sub_tests){
					foreach ($all_sub_tests as $k=>$test_info){
					   	$cat_id=$test_info['cat_id'];
						$test_title= $test_info['menu_text'];	
						$test_name= $test_info['seo_title'];	
						if (in_array($cat_id, $sel_items)) {
							$test_check_box_items[]='<option value="'.$cat_id.'" selected>|_'.$test_title.'</option>';
						}else{
							$test_check_box_items[]='<option value="'.$cat_id.'">|_'.$test_title.'</option>';	
						}
					}
				}
				
			//$test_check_box_items[]='</optgroup>';	
			#eof optgroup
		}	
	}
	
	$test_check_box_html=implode("",$test_check_box_items);
	return $test_check_box_html;
}
$test_check_box_html2=get_ImageCat_items();
//pre($album_info);
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Edit Album::<?=$album_title?> </h3>
			</div>
			<div class="panel-body">
			
<!---bof Submit form-->	
<?php include(TEMPLATE_STORE.'displaymessage.php'); ?>	
				
<form name="" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="doSubmit" value="true" />
<input type="hidden" name="album_id" value="<?=$album_info['album_id']?>" />
	
<div class="form-group">
	<div class="col-sm-12">
		<label for="inputEmail3" class="control-label">Category:</label>
		<select name="album_cats" class="form-control" id="my-select" required>
            <option value="">Select Category</option>
			<?=get_ImageCat_items($album_categories)?>
		</select>
	</div>
	<div class="col-sm-12">
		<label for="inputalbum_title" class="control-label">Album Name:</label>
		<input name="album_title" type="text" class="form-control" value="<?=$album_info['album_title']?>" required/>
	</div>
	<div class="col-sm-12">
		<label for="inputdescription" class="control-label">Description:</label>
		<textarea name="description"  class="form-control"><?=$album_info['description']?></textarea>
	</div>

	  <div class="col-sm-12">
		<label for="inputprepared_by" class="control-label">Photographer:</label>
		<input name="reporter" type="text" class="form-control" value="<?=$album_info['reporter']?>"/>
	  </div>
	  
	   <div class="col-sm-8">
		<label for="inputprepared_by" class="control-label">Album Cover:</label>
		<input type="file"  name="fec_image" class="form-control2"  placeholder="Cover Image"/>
	  </div>
	  <div class="col-sm-3">
		<img src="<?=$album_info['fec_image']?>" alt=""  width="200">
	  </div>
</div>
<div class="clearfix"></div>
  
  <div class="form-group">
	<div class="col-sm-10">
	  <button type="submit" class="btn btn-info">Update</button>
	 <?php 
	
	 $manage_images_link = SCRIPT_URL."siteadminpanel/popup_imagemanager/?type=image_albums&type_id=$album_id";
	?>
	 <a href="<?=$manage_images_link?>" class="fancybox fancybox.iframe" target="_blank"><button type="button" class="btn btn-warning">Manage Photos</button>
	</div>
  </div>
</form>


					

<!---bof Submit form-->	              
		</div><!--panel-body-->
	  </div>
	</div>
</div><!--row-->

<!--bof multiselect-->
<script>
function loadMultiSelect(){
	jQuery('.optgroup').multiSelect({ selectableOptgroup: false });
}
function ar_removeRow(childElem){
		if(confirm('Are you sure you want to delete?')){ var row = $(childElem).closest("tr"); row.remove().fadeOut(1600, "linear");}
}
function ar_addRow(){
		var rowCount = jQuery('#ar_price_quote_table tbody tr').length;	
		var rowCount = rowCount;	
		jQuery('#ar_price_quote_table').append('<tr><td><img id="imgpreview_'+rowCount+'" src="#" alt="" width="150" /></td><td><input type="file" name="albumimages[image_name]['+rowCount+']" onchange="ar_show_img(this,'+rowCount+')" value="" required></td><td><textarea name="albumimages[image_caption]['+rowCount+']"  class="form-control" required></textarea></td><td><input type="radio" name="albumimages[cover_image]"  value="'+rowCount+'"> Make Album Cover</td><td><span class="glyphicon glyphicon-remove btn btn-danger btn-xs" onclick="ar_removeRow(this)" > DelRow</span></td></tr>');
}
//$('#my-select').multiSelect();
 


function ar_show_img(input,indexval){
	if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imgpreview_'+indexval).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }	
}
</script>
<!--eof multiselect-->