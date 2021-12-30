<?php
$bklist = ar_unserialize($breakdown_list_info['bklist']);
function get_ImageCat_items($sel_items=array()){
	global $db;
	$test_check_box_items=array();
	$all_tests= $db->select("SELECT * FROM image_categories WHERE active =1 AND parent =0 ORDER BY menu_order ASC");
	
	if($all_tests){
		foreach ($all_tests as $k=>$test_info){
			$parent=$test_info['cat_id'];
			$test_name= $test_info['seo_title'];
			$test_title= $test_info['menu_text'];	
			$test_parent_name= $test_info['seo_title'];
			if (in_array($test_name, $sel_items)) {
				$test_check_box_items[]='<option value="'.$test_name.'" selected>'.$test_title.'</option>';
			}else{
				$test_check_box_items[]='<option value="'.$test_name.'">'.$test_title.'</option>';	
			}
			
			#bof optgroup
			//$test_check_box_items[]='<optgroup label="'.$test_title.'">';
			
				$all_sub_tests= $db->select("SELECT * FROM image_categories WHERE active =1 AND parent =$parent ORDER BY menu_order ASC");
				if($all_sub_tests){
					foreach ($all_sub_tests as $k=>$test_info){
						$test_title= $test_info['menu_text'];	
						$test_name= $test_info['seo_title'];	
						if (in_array($test_name, $sel_items)) {
							$test_check_box_items[]='<option value="'.$test_name.'" selected>|_'.$test_title.'</option>';
						}else{
							$test_check_box_items[]='<option value="'.$test_name.'">|_'.$test_title.'</option>';	
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
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Add Album</h3>
			</div>
			<div class="panel-body">
			
<!---bof Submit form-->	
<?php include(TEMPLATE_STORE.'displaymessage.php'); ?>	
				
<form name="" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="doSubmit" value="true" />
	
<div class="form-group">
	<div class="col-sm-12">
		<label for="inputEmail3" class="control-label">Category:</label>
		<select name="album_cats[]" class="optgroup form-control" id="my-select" multiple="multiple" required>
			<?=get_ImageCat_items()?>
		</select>
	</div>
	<div class="col-sm-12">
		<label for="inputalbum_title" class="control-label">Album Name:</label>
		<input name="album_title" type="text" class="form-control" value="<?=$db->post('article_title')?>" required/>
	</div>
	<div class="col-sm-12">
		<label for="inputdescription" class="control-label">Description:</label>
		<textarea name="description"  class="form-control" required><?=$db->post('description')?></textarea>
	</div>

	  <div class="col-sm-12">
		<label for="inputprepared_by" class="control-label">Photographer:</label>
		<input name="reporter" type="text" class="form-control" value="<?=$db->post('article_title')?>" required/>
	  </div>
</div>
<div class="clearfix"></div>

<!--bof testitem breakdown-->
<div class="table-responsive">
<table id="ar_price_quote_table" class="table table-bordered">
<thead> 
	<tr>
		<th colspan="2">Image</th>
		<th>Caption</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
</thead>
<tbody> 
<?php 
for($key=0;$key<1;$key++){
?> 
	<tr> 
		<td><img id="imgpreview_<?=$key?>" src="#" alt="" width="150" /></td>
		<td><input type="file" id="img_<?=$key?>" onchange="ar_show_img(this,<?=$key?>)" name="albumimages[image_name][<?=$key?>]" value="<?=$bklist['image_name'][$key]?>" required></td>
		<td><textarea name="albumimages[image_caption][<?=$key?>]"  class="form-control" required><?=$bklist['image_caption'][$key]?></textarea></td>
		<td><input type="radio" name="albumimages[cover_image]" checked="checked" value="<?=$key?>"> Make Album Cover</td>
		<td>&nbsp;</td>
	</tr>
<?php 
}
?>
 </tbody>
 <tfoot>
	 <tr>
		 <td></td>
		 <td colspan="4">
			<span class="glyphicon glyphicon-plus btn btn-warning btn-xs" onclick="ar_addRow(); return false" title="Add new row"> AddRow</span>
		 </td>
	 </tr>
 </tfoot>
</table>
</div>
<!--eof testitem breakdown-->

  
  <div class="form-group">
	<div class="col-sm-offset-1 col-sm-10">
	  <button type="submit" class="btn btn-info">Submit</button>
	</div>
  </div>
</form>


					

<!---bof Submit form-->	              
		</div><!--panel-body-->
	  </div>
	</div>
</div><!--row-->

<!--bof multiselect-->
<script src="<?php echo GET_TEMPLATE_DIRECTORY_URI; ?>/js/multiselect/js/jquery.multi-select.js" type="text/javascript"></script>
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
$('#my-select').multiSelect();
 


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