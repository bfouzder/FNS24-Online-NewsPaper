<?php 
# $resultCategory=$db->select("SELECT * FROM bn_bas_category WHERE Deletable=1 ORDER BY Priority");
#	$resultSpecCat=$db->select("SELECT Specialcat_id, SpecialCategoryName FROM bn_bas_specialcategory ORDER BY Specialcat_id");
	$resultDisticts=$db->select("SELECT DistrictID, DistrictName, DistrictNameBN FROM bas_district ORDER BY DistrictName"); 
 //pre($edit);
?>

<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/b2e1ep2if4q5warabathz3kfqf9ual4lv89nkfkrtfzn6pgg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>//tinymce.init({  selector: '#description' /* selector:'textarea'*/ });
tinymce.init({
  selector: 'textarea',
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
<style>
 .mce-content-body {
    font-family: Lato !important;
    font-size: 18px;
    color: #626262;
    line-height: 25px;
    color: #000;
}
    
</style>
<!-- /TinyMCE -->
<?php
include(ADMIN_TEMPLATE_STORE.'/displaymessage.php');?>
<!--bofof Data entry Form--->
<?php
//pre($edit);
if($edit){ 
$panel_title="Update News";
//pre($edit);
  $u_info = getUserInfo($edit['user_id']);
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
            <div class="row">    
            <div class="col-md-12 col-sm-12 col-xs-12">					
            <center>	
            <h2><?=$u_info['user_name']?></h2>
            <h2><i class="fa fa-envelope"></i> <?=$u_info['user_email']?> &nbsp; <i class="fa fa-phone"></i> <?=$u_info['user_mobile']?></h2>		
            </center>
            </div>
            </div>

		<br />
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" >
		 <input type="hidden" name="formSubmitted" value="1" >
		 <?php if($edit){ ?>
		 <input type="hidden" name="<?=$primaryKey?>" value="<?=$edit[$primaryKey]?>" >
		 <?php } ?>

	
<?php 
$top_news=array(
'4'=> 'Top 4 News', 
'3'=> 'Top 3 News(Under Slider)',
'2'=> 'Top 2 News(Beside slider)',
);

$EDIT_CAD_ID=($edit['cat_id'])?$edit['cat_id']:14;
?>    	


	
        
	<div class="row">	
       
    
    	<div class="col-md-12 col-sm-4 col-xs-12">
           <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Attributes: </label>
            		<div class="col-md-3 col-sm-9 col-xs-12">
            		  <select name="cat_id" class="form-control" id="cat_id" onchange="checkcat(this.value);" required="required" >
            					     <option value="">Select Category</option> 
            					      <?=__getNewsCatOptions($EDIT_CAD_ID);?>
            				  	</select>
            		</div>
                    <div class="col-md-3 col-sm-9 col-xs-12">
        				<select name="top_news" class="form-control">
        					<option value="" selected="selected">Display Position</option>
        					<?php foreach ($top_news as $i=>$p_title){  
        					$sel=($edit['top_news']==$i)?' selected="selected"':'';
        					echo '<option value="'.$i.'"'.$sel.'>'.$p_title.'</option>'."\n";
        					}
        					?>
        				</select>
            		</div>
                    <div class="col-md-3 col-sm-9 col-xs-12">
            			<select name="DistrictID" id="DistrictID" class="form-control">
            			<option value="">--Select District--</option>
            			<?php foreach($resultDisticts as  $rsDistict){
            
            				$sel=($edit['DistrictID']==$rsDistict["DistrictID"])?' selected="selected"':'';
            			?>
            				<option value="<?php echo $rsDistict["DistrictID"]; ?>"<?=$sel?>><?php echo  $rsDistict["DistrictName"].'('.$rsDistict['DistrictNameBN'].')'; ?></option>
            			<?php } ?>
            			</select>
            			</div>
                    
        		</div>
       </div>
        
        
          <div class="col-md-12 col-sm-4 col-xs-12">
          	     <div class="form-group">
            		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Sub Title:</label>
            		<div class="col-md-9 col-sm-9 col-xs-12">
            		  <input type="text" name="news_subheading"  value="<?=$edit['news_subheading']?>" class="form-control col-md-7 col-xs-12">
            		</div>
        		</div>
                
         	  <div class="form-group">
        		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Title:<em>*</em></label>
        		<div class="col-md-9 col-sm-9 col-xs-12">
        		  <input type="text" name="news_title" required="required" value="<?=$edit['news_title']?>" class="form-control col-md-7 col-xs-12">
        		</div>
        		</div>
        	
                
               	<div class="form-group">
            		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Writer:<em>*</em></label>
            		<div class="col-md-9 col-sm-9 col-xs-12">
            		  <input type="text" name="Writers" required="required" value="<?=$edit['Writers']?>" class="form-control col-md-7 col-xs-12">
            		</div>
            	</div> 
                
         </div>
         
        
        
        <div class="col-md-12 col-sm-4 col-xs-12">
            <div class="form-group">
                   <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">&nbsp; </label>
            		<div class="col-md-9 col-sm-9 col-xs-12">
                    	<div class="row">
                        	<div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                  <label>Slide</label>
                                  <input type="radio" name="slider_news" value="1"<?= ($edit['slider_news']==1)?' checked="checked"':'';?>/>&nbsp;Yes&nbsp;&nbsp;
                                  <input type="radio" name="slider_news" value="2"<?= ($edit['slider_news']==2)?' checked="checked"':'';?>/> &nbsp;Big
                                  <input type="radio" name="slider_news" value="0"<?= ($edit['slider_news']==0)?' checked="checked"':'';?>/> &nbsp;No
                                </div> 
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                  <label>Breaking</label>
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  <input type="radio" name="breaking" value="1"<?= ($edit['breaking']==1)?' checked="checked"':'';?>>&nbsp;Yes&nbsp;&nbsp;
                                  <input type="radio" name="breaking" value="0"<?= ($edit['breaking']==0)?' checked="checked"':'';?>>&nbsp;No
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                  <label>Sotlight</label>
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  <input type="radio" name="spot_light" value="1" <?= ($edit['spot_light']==1)?' checked="checked"':'';?>>&nbsp;Yes&nbsp;&nbsp;
                                  <input type="radio" name="spot_light" value="0" <?= ($edit['spot_light']==0)?' checked="checked"':'';?>>&nbsp;No
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                  <label>Footer</label>
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  <input type="radio" name="footer_news" value="1"<?= ($edit['footer_news']==1)?' checked="checked"':'';?>/>&nbsp;Yes&nbsp;&nbsp;
                                  <input type="radio" name="footer_news" value="0"<?= ($edit['footer_news']==0)?' checked="checked"':'';?>/> &nbsp;No
                                </div> 
                            </div>
            		      </div>                         
            		</div>                    
                    
        		</div>
       </div>
       
        
        
        

        
         <div class="col-md-12 col-sm-9 col-xs-12">
             <div class="form-group">
        		<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Content:<em>*</em></label>
        		<div class="col-md-9 col-sm-9 col-xs-12">
        		  <textarea name="news_details" class="form-control"><?=$edit['news_details']?></textarea>
        		</div>
    		</div>
         	
	     </div>
                  
	</div>
	
<div class="row">
    
    <div class="col-md-12 col-sm-9 col-xs-12">
          <div class="panel panel-default" style="border: none;">
      
        	<div class="panel-body">
        	
        	   <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Thumbnail</label>
                    <div class="col-md-4 col-sm-5 col-xs-12">
                       <input type="text" name="image_url_caption" value="<?= $edit['image_url_caption']?>" placeholder="Thumb Image Caption" class="form-control">
        	        </div>
                    <div class="col-md-3 col-sm-9 col-xs-12">
                       	<input type="file" name="image_url"  id="image_url"/>
                    </div>
                    <div class="col-md-3 col-sm-9 col-xs-12" id="imgPreview">
                		 <?php 
                    		$image_url=($edit['image_url'])?$edit['image_url']:getNewsFecImageURL($edit);
                		  ?>
                          <img src="<?=$image_url?>" class="img-thumbnail" id="image_url_preview" alt="" width="250"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Large</label>
                   
                    <div class="col-md-4 col-sm-5 col-xs-12">
                       <input type="text" name="big_image_url_caption" value="<?= $edit['big_image_url_caption'] ?>" placeholder="Big Image Caption" class="form-control">
        	        </div>
                    <div class="col-md-3 col-sm-9 col-xs-12">
                       	<input type="file" name="big_image_url"  id="big_image_url"/>
                    </div>
                     <div class="col-md-3 col-sm-5 col-xs-12" id="imgBigPreview">
                		 <?php 
                    		$image_url=($edit['big_image_url'])?$edit['big_image_url']:getNewsFecImageURL($edit, 'big');
                		  ?>
                          <img src="<?=$image_url?>" class="img-thumbnail" id="big_image_url_preview" alt="" width="250"/>
                
                     </div>
                </div>
                 
        		
        	</div><!--/panel-body-->
        </div><!--/panel-->	  
    </div>

    
    <div class="col-md-12 col-sm-9 col-xs-12">
        <div class="panel panel-default" style="border: none;">
        	<div class="panel-heading2">
        		<h3 class="panel-title" style="text-align: center;padding:10px;display:none;" >Meta Info</h3>
        	</div>
        	<div class="panel-body">
        	
        		<div class="form-group">
        			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">News Tags:</label>
        			<div class="col-md-9 col-sm-9 col-xs-12">
        			  <input type="text" name="news_tag" value="<?= $edit['news_tag'] ?>" class="form-control col-md-7 col-xs-12">
        			 
        			</div>
        		</div>
        		<div class="form-group">
        			<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Meta data:</label>
        			<div class="col-md-9 col-sm-9 col-xs-12">
        			  <input type="text" name="meta_keywords" value="<?= $edit['meta_keywords'] ?>"  class="form-control col-md-7 col-xs-12">
        			</div>
        		</div>
        		
        	</div><!--/panel-body-->
        </div><!--/panel-->	
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
	  </div>
	</div>
  </div>
</div>
<script>
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



<!--Listing-->	


<?php $edit=($db->get('doaction')=='add')?true:$edit;?>        
 
<div class="row" id="add_edit_block_list" <?=($edit)?' style="display:none"':' style="display:block"';?>>

	<div class="col-xs-12 col-sm-12 col-md-12">	           
            
    <div class="x_panel">
	  <div class="x_title">
		<h2><i class="fa fa-th-list"></i> Public News</h2>                    
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
					      <?=__getNewsCatOptions($db->get_post('catID'));?>
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
 <table class="table table-bordered" width="100%">
	<thead>
        <thead class="thead">
          <tr>
          	<th width="5%"><input type="checkbox" id="check_uncheck_top" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_top')" /></th>
          	
            <th width="8%">ID</th>
          	<th width="15%">Title</th>           
          	<th width="15%">Writer Info</th> 
          	<th width="10%">Image</th>    
            <th width="15%">Migrate</th>
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
        $news_article_info=$value;
		
               
                $news_article_ID= $news_article_info['news_id_temp'];	
                $news_article_title= $news_article_info['news_title'];
                $news_article_title= $news_article_info['news_title'];
                $EncryptedValue= $news_article_info['EncryptedValue'];
               
               $news_article_url= SCRIPT_URL.'temparticle/'.$news_article_ID.'/'.$news_article_title.'/'.$EncryptedValue;
		    //  pre($value);
            $news_article_info_ori=$news_article_info;
            $news_article_info_ori['news_id']=$news_article_info['status'];
            
            if($news_article_info['status']){
             $news_article_url_ori= __bn_getArticleURL($news_article_info_ori);    
             $news_article_url= $news_article_url_ori;    
            }else{
             $news_article_url_ori='';       
            }
            
           $u_info =getUserInfo($news_article_info['user_id']);
	        
          $download_url = SCRIPT_URL.'api/html_to_doc_download.php?id='.$action_id.'&action=publicnews';  
        ?>
         
         
            <tr class="<?=$class;?>" >
                <td><input type="checkbox" name="action_ids[]" id="checksingle<?php echo $key; ?>" value="<?=$action_id?>" /></td>
                <td><?= $value[$primaryKey]; ?></td>
                <td><?= $value['news_title']; ?>
                
                
                </td>
                <td>
				<b><?=$u_info['user_name']?></b><br/>
				<?=$u_info['user_mobile']?>, 
				<?=$u_info['user_email']?>,
				<!--User Id: <?=$u_info['user_id']?>-->
				
				</td>
                
                <td align="center">
			             <?php 
                    		$big_image_url=($value['big_image_url'])?$value['big_image_url']:'';
                    		if($big_image_url){
                		  ?>
                          <img src="<?=$big_image_url?>" class="img-thumbnail" id="big_image_url_preview" alt="" width="150"/>
                          <a href="<?=$big_image_url?>" target="_blank"  class="btn btn-default btn-xs">Raw Download</a>
                          <?php } ?>
				
				</td>
                <td class="action_active_inactive">
                    <?php if( $value['status'] != 0){ ?>
                        <a href="<?=$news_article_url_ori?>" class="label label-success" target="_blank"><i class="fa fa-check" aria-hidden="true"></i> Migrated</a>
                    <?php }else{ ?>
                    <a href="<?=$inactive_url?>"   class="label label-warning"><i class="fa fa-circle" aria-hidden="true"></i> Do Migrate</a>	
                    <?php } ?> 
                </td>      
                <td  class="action_edit_delete">
                    <a href="<?=$edit_url?>" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"> EDIT</i></a>
                    &nbsp;
					      <a href="<?=$news_article_url?>" title="View" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-eye"> View</i> </a>
                    &nbsp;
                    <a href="<?=$del_url?>" title="Delete" onclick="return confirm('Are You Sure You want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> DEL</i> </a>
                    <div class="clearfix"></div>
                    <a href="<?=$download_url?>" target="_blank"  class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Download News as MS-Word</a>
                    
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
         	 <td align="left" colspan="2">
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
                                    <option value="approve" <?php if($db->post('action')=='approve'){ ?> selected="selected" <?php } ?>>Do Migrate</option>
                                </optgroup>
                            
                                <optgroup label="Delete">  
                                    <option value="delete" <?php if($db->post('action')=='delete'){ ?> selected="selected" <?php } ?>>Delete from Database</option>
                                </optgroup> 
                            </select>
					</div>
              </td>
              <td align="left" colspan="4">      
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
	function __getNewsCatOptions($parentID=false){
		global $db;
		$types=$db->select("SELECT * FROM bn_bas_category WHERE parent=0");
		foreach($types as $type){
			$sel = ($type['CategoryID'] == $parentID)? 'selected="selected"':'';
			$option.='<option value="'.$type['CategoryID'].'"'.$sel.'>'.$type['CategoryName'].'</option>';
		}
		return $option;
	}
?>