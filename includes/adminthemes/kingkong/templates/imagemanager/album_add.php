<?php
$bklist = ar_unserialize($breakdown_list_info['bklist']);
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
$preview_image= ADMIN_GET_TEMPLATE_DIRECTORY_URI.'/images/user.png';
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Photo Album</h3>
			</div>
			<div class="panel-body">
			
<!---bof Submit form-->	
<?php include(TEMPLATE_STORE.'displaymessage.php'); 

$album_name=($db->post('article_title'))?$db->post('article_title'): date('F j, Y'); 
?>	
				
<form name="" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="doSubmit" value="true" />

	
<div class="form-group">
	<div class="col-sm-12">
		<label for="inputEmail3" class="control-label">Category:<em>*</em></label>
		<select name="album_cats" class="form-control" id="my-select" required>
		      <option value="">Select Category</option>
        	<?=get_ImageCat_items()?>
		</select>
	</div>
</div>
<div class="clearfix"></div>

  <div class="form-group">
	<div class="col-sm-12">
		<label for="inputalbum_title" class="control-label">Album Name:<em>*</em></label>
		<input name="album_title" type="text" class="form-control" value="<?=$album_name?>" required/>
	</div>
	<div class="col-sm-12">
		<label for="inputdescription" class="control-label">Description:</label>
		<textarea name="description"  class="form-control"><?=$db->post('description')?></textarea>
	</div>
	  <div class="col-sm-12">
		<label for="inputprepared_by" class="control-label">Photographer:</label>
		<input name="reporter" type="text" class="form-control" value="<?=$db->post('article_title')?>" />
	  </div>
 </div>
  <div class="form-group">
	<div class="col-sm-10">
	  <button type="submit" class="btn btn-info">Next Add Photos</button>
	</div>
  </div>
</form>


					

<!---bof Submit form-->	              
		</div><!--panel-body-->
	  </div>
	</div>
</div><!--row-->

<!--bof multiselect-->
<!--
<script src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/js/multiselect/js/jquery.multi-select.js" type="text/javascript"></script>
-->
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
		jQuery('#ar_price_quote_table').append('<tr><td><input type="file" name="albumimages[image_name]['+rowCount+']" onchange="ar_show_img(this,'+rowCount+')" value="" required><img id="imgpreview_'+rowCount+'" src="<?=$preview_image?>" alt="" width="150" /></td><td><textarea name="albumimages[image_caption]['+rowCount+']"  class="form-control" rows="2"></textarea></td><td><input type="radio" name="albumimages[cover_image]"  value="'+rowCount+'"> Make Album Cover</td><td><input type="checkbox" name="albumimages[slider_image]['+rowCount+']" value="1"> Home Gallery</td><td><button class=" btn btn-danger btn-xs" onclick="ar_removeRow(this)"  type="button"><i class="fa fa-remove"></i> DEL</button></td></tr>');
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