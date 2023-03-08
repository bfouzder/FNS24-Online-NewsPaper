<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/b2e1ep2if4q5warabathz3kfqf9ual4lv89nkfkrtfzn6pgg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>//tinymce.init({  selector: '#description' /* selector:'textarea'*/ });
tinymce.init({
selector: '#description',
height: 400,
theme: 'silver',
plugins: [
'advlist autolink lists link image charmap print preview hr anchor pagebreak',
'searchreplace wordcount visualblocks visualchars code fullscreen',
'insertdatetime media nonbreaking save table contextmenu directionality',
'emoticons template paste textcolor colorpicker textpattern imagetools','image'
],
menubar: "false" , 
toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
toolbar2: 'print preview media | forecolor backcolor emoticons',
image_advtab: true,
templates: [
{ title: 'Test template 1', content: 'Test 1' },
{ title: 'Test template 2', content: 'Test 2' }
],
content_css: [
'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
'<?=SCRIPT_URL?>includes/adminthemes/kingkong/css/custom_tinymac.min.css'
]
});
//www.tinymce.com/css/codepen.min.css
</script>

<!-- /TinyMCE -->
<?php
include(ADMIN_TEMPLATE_STORE.'/displaymessage.php');?>
<!--bofof Data entry Form--->
<?php
if($db->get('doaction')=='add'){
$panel_title="Add Book";
?>
<div class="row" id="add_edit_block"  style="display:block">
<?php }elseif($edit){ 
$panel_title="Update Book";
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
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="formSubmitted" value="1" >
            <?php if($edit){ ?>
            <input type="hidden" name="<?=$primaryKey?>" value="<?=$edit[$primaryKey]?>" >
            <?php } 
            $EDIT_CAD_ID=($edit['cat_id'])?$edit['cat_id']:'';
            ?>    	


            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Book Category: </label>
                <div class="col-md-6 col-sm-9 col-xs-12">
                    <select name="cat_id" class="form-control" id="cat_id" onchange="checkcat(this.value);" required="required" >
                        <option value="">Select Category</option> 
                        <?=__getBookCatOptions($EDIT_CAD_ID);?>
                    </select>
                </div>                    
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Book Name:<em>*</em></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" name="book_title" required="required" value="<?=$edit['book_title']?>" class="form-control col-md-7 col-xs-12">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Writer:<em>*</em></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" name="Writers" required="required" value="<?=$edit['Writers']?>" class="form-control col-md-7 col-xs-12">
                </div>
            </div> 

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Summary:<em>*</em></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                <textarea name="book_summary" required="required" class="form-control col-md-7 col-xs-12" rows="5"><?=$edit['book_summary']?></textarea> 
                </div>
            </div> 

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">PDF Book URL</label>
                <div class="col-md-8 col-sm-5 col-xs-12">
                <input type="text" name="book_pdf_url" value="<?= $edit['book_pdf_url'] ?>" placeholder="PDF URL" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Attached PDF Book</label>
                <div class="col-md-4 col-sm-5 col-xs-12">
                <input type="file" name="book_pdf"  id="book_pdf"/>
                <?php 
                $book_pdf=($edit['book_pdf'])?$edit['book_pdf']:'';
                ?>
                <a href="<?=$book_pdf?>"><i class="fa fd-pdf"></i>  <?=$book_pdf?></a>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Book Cover Image</label>
                <div class="col-md-8 col-sm-5 col-xs-12">
                    <input type="text" name="image_url_caption" value="<?= $edit['image_url_caption']?>" placeholder="Thumb Image Caption" class="form-control">
                    <input type="file" name="image_url"  id="image_url"/>
                </div>
                <div class="col-md-1 col-sm-4 col-xs-12" id="imgPreview">
                    <?php 
                    $image_url=($edit['image_url'])?$edit['image_url']:getNewsFecImageURL($edit);
                    ?>
                    <img src="<?=$image_url?>" class="img-thumbnail" id="image_url_preview" alt="" height="100"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">YouTube Video URL:<em>*</em></label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                    <input type="text" name="book_video"  value="<?=$edit['book_video']?>" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Book Content:<em>*</em></label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <textarea id="description" name="book_details" class="form-control"><?=$edit['book_details']?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Book Tags:</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" name="news_tag" value="<?= $edit['news_tag'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Meta data:</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" name="meta_keywords" value="<?= $edit['meta_keywords'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Book Serial:</label>
                <div class="col-md-4 col-sm-4 col-xs-8">
                <input type="number" name="book_serial" value="<?= $edit['book_serial'] ?>"  class="form-control col-md-2 col-xs-4">
                </div>
            </div>
            <div class="form-group submit_sec">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-primary">Reset</button>
                    <a class="btn btn-danger" href="<?=SCRIPT_URL.$redirect_url?>">Cancel</a>
                </div>
            </div>
        </form>
        </div><!--x_content-->
    </div><!--x_panel-->
    </div>
</div><!--/row-->


<!--Listing-->	
<?php 

if(!$doaction):
?>
<a href="<?=SCRIPT_URL?>siteadminpanel/manageBooks/?doaction=add" class="btn btn-success pull-right"><i class="fa fa-book"></i> Add New Book</a>
<?php endif?>
<?php $edit=($db->get('doaction')=='add')?true:$edit;?>        
<div class="row" id="add_edit_block_list" <?=($edit)?' style="display:none"':' style="display:block"';?>>
<div class="col-xs-12 col-sm-12 col-md-12">	           
<div class="x_panel">
<div class="x_title">
    <h2><i class="fa fa-th-list"></i> Books</h2>                    
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
<th>
<form action="" method="get"> 
<select name="uploaderID" class="form-control" id="uploaderID" onchange="submit(this);">
<option value="">Filter by Uploader</option> 
<?=__getBookUploaderOptions($db->get_post('uploaderID'));?>
</select>
<?php if($db->get_post('catID')){?>
<input type="hidden" name="catID" value="<?=$db->get_post('catID')?>"/>
<?php } ?>
</form> 
</th>
<th>
<form action="" method="get"> 
<select name="catID" class="form-control" id="CategoryName" onchange="submit(this);"   >
<option value="">Filter by Category</option> 
<?=__getBookCatOptions($db->get_post('catID'));?>
</select>
<?php if($db->get_post('uploaderID')){?>
<input type="hidden" name="uploaderID" value="<?=$db->get_post('uploaderID')?>"/>
<?php } ?>
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
<th width="5%">Serial</th>
<th width="25%">Title</th>           
<th width="8%">Uploader</th>           
<th width="8%">Status</th>
<th width="30%">Action</th>	
<th width="20%">Date</th> 
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
$book_info=$value;

$news_article_url= __bn_getBookURL($book_info);	
//pre($value);
$uploader_info=$db->select_single("select * from admin where admin_id = ".$book_info['uploaded_by']);
#   pre($uploader_info);  
?>


<tr class="<?=$class;?>" >
<td><input type="checkbox" name="action_ids[]" id="checksingle<?php echo $key; ?>" value="<?=$action_id?>" /></td>
<td><?= $value[$primaryKey]; ?></td>
<td><?= $value['book_serial']; ?></td>
<td><?= $value['book_title']; ?></td>
<td><?= $uploader_info['fname']; ?></td>                
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
<a href="<?=$news_article_url?>" title="View" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-book"> Book Detail </i> </a>
&nbsp;
<a href="<?=$value['book_pdf']?>" title="PDF" class="btn btn-warning btn-xs" target="_blank"><i class="fa fa-file-pdf-o"> PDF</i> </a>

&nbsp;
<a href="<?=$del_url?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> DEL</i> </a>
</td>
<td><?= date_time($value['date_added']); ?></td>
</tr>

<?php endforeach; ?>
<?php else: ?>
<tr class="col"><td colspan="8">No Result Found.</td></tr>
<?php endif; ?>

</tbody>  
<tfoot class="tfoot">
<tr>
<td align="left"><input type="checkbox" id="check_uncheck_bottom" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_bottom')" /></td>
<td align="left" colspan="2">
<div class="form-group">
<select name="action" class="form-control" id="p_action">
<option value="" selected="selected">Select Action</option>
<optgroup label="TOP 16 News"> 
<option value="add_top_16" <?php if($db->post('action')=='add_top_16'){ ?> selected="selected" <?php } ?>>Assign as Top16</option>
<option value="remove_top_16" <?php if($db->post('action')=='remove_top_16'){ ?> selected="selected" <?php } ?>>Remove from Top 16</option>
</optgroup>
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
<optgroup label="Footer News"> 
<option value="add_to_footer_news" <?php if($db->post('action')=='add_to_footer_news'){ ?> selected="selected" <?php } ?>>Add To Footer</option>
<option value="remove_from_footer_news" <?php if($db->post('action')=='remove_from_footer_news'){ ?> selected="selected" <?php } ?>>Remove From Footer</option>
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

function ar_readURL(input, preview_id='image_url_preview') {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#'+preview_id).attr('src', e.target.result);
}

reader.readAsDataURL(input.files[0]);
}
}

$("#image_url").change(function(){
ar_readURL(this, 'image_url_preview');
});
$("#big_image_url").change(function(){
ar_readURL(this, 'big_image_url_preview');
});
</script>
<!--/eof Data entry Form--->
<?php 

function __getBookUploaderOptions($parentID=false){
global $db;
$types=$db->select("SELECT * FROM admin WHERE admin_id!=1");
foreach($types as $type){
$sel = ($type['admin_id'] == $parentID)? 'selected="selected"':'';
$option.='<option value="'.$type['admin_id'].'"'.$sel.'>'.$type['fname'].'</option>';
}
return $option;
}

function __getBookCatOptions($parentID=false){
global $db;
$types=$db->select("SELECT * FROM bn_book_category WHERE parent =0 order by Priority");
foreach($types as $type){
$sel = ($type['CategoryID'] == $parentID)? 'selected="selected"':'';
$option.='<optgroup label="'.$type['CategoryName'].'">';

    $types=$db->select("SELECT * FROM bn_book_category WHERE parent =".$type['CategoryID']." order by Priority");
    foreach($types as $type){
    $sel = ($type['CategoryID'] == $parentID)? 'selected="selected"':'';
    $option.='<option value="'.$type['CategoryID'].'"'.$sel.'>'.$type['CategoryName'].'</option>';
    }
$option.='</optgroup>';
}
return $option;
}
?>