<?php  
$u_info=$db->getRowArray('users',state('AR_user_id')); 

# $resultCategory=$db->select("SELECT * FROM bn_bas_category WHERE Deletable=1 ORDER BY Priority");
#	$resultSpecCat=$db->select("SELECT Specialcat_id, SpecialCategoryName FROM bn_bas_specialcategory ORDER BY Specialcat_id");
	$resultDisticts=$db->select("SELECT DistrictID, DistrictName, DistrictNameBN FROM bas_district ORDER BY DistrictName"); 
 //pre($edit);
?>
<section class="section-block clearfix">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<h2 class="nav-page-title">Public News :: আমার  সংবাদ/লেখা </h2>
			<div class="page-breadcrumb clearfix">
			    <ol class="breadcrumb">
        		   <li><a href="<?=SCRIPT_URL?>"><i class="fa fa-home"></i> প্রচ্ছদ</a></li>
                   <li><a href="<?=SCRIPT_URL?>publicnews">পাবলিক নিউস</a></li>
        		   <li class="active">আমার  সংবাদ/লেখা </li>
        		 </ol>
			</div>
		<!--eof top heading-->	
            
     <div style="border: 2px solid orange;"> 
     <div class="user_login" style="padding:10px;"> 
	 
<!-- TinyMCE -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>//tinymce.init({  selector: '#description' /* selector:'textarea'*/ });
tinymce.init({
  selector: 'textarea',
  height: 400,
  theme: 'modern',
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
 if($db->get('doaction')=='add'){
$panel_title="Add News";
?>
<div class="row" id="add_edit_block"  style="display:block">
<?php }elseif($edit){ 
$panel_title="Update News";
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
<?php 

if(!$doaction):
?>
<a href="<?=SCRIPT_URL?>/publicnews/add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add News</a>
<?php endif?>


<?php $edit=($db->get('doaction')=='add')?true:$edit;?>        
 
<div class="row" id="add_edit_block_list" <?=($edit)?' style="display:none"':' style="display:block"';?>>

	<div class="col-xs-12 col-sm-12 col-md-12">	           
            
    <div class="x_panel">
	  <div class="x_title">
		<h2><i class="fa fa-th-list"></i> আমার সংবাদ/লেখা </h2>                    
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
        $news_article_info=$value;
		$active_url='#';
         if( $value['status'] == 0){
			  $news_article_url= '#';	
		 }else{
			 $news_article_info['news_id']=$value['status'];
			 $news_article_url= __bn_getArticleURL($news_article_info);	 
		 }
              
		      //pre($value);
	        
            
        ?>
         
         
            <tr class="<?=$class;?>" >
                <td><input type="checkbox" name="action_ids[]" id="checksingle<?php echo $key; ?>" value="<?=$action_id?>" /></td>
                <td><?= $value[$primaryKey]; ?></td>
                <td><?= $value['news_title']; ?></td>
                
                
                <td class="action_active_inactive">
                    <?php if( $value['status'] != 0){ ?>
                        <a href="<?=$active_url?>" class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
                    <?php }else{ ?>
                    <a href="#" class="label label-warning"><i class="fa fa-circle" aria-hidden="true"></i> Pending</a>	
                    <?php } ?> 
                </td>      
                <td  class="action_edit_delete">
                    <?php if( $value['status'] == 0){ ?>
                    <a href="<?=$edit_url?>" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"> EDIT</i></a>
                    <?php }else{ ?> 
					 <a href="<?=$news_article_url?>" title="View" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-eye-square-o"> View</i></a>
                    <?php } ?> 
                   </td>
            </tr>
            
            <?php endforeach; ?>
            <?php else: ?>
            <tr class="col"><td colspan="8">No Result Found.</td></tr>
            <?php endif; ?>
          
        </tbody>  
        <!--<tfoot class="tfoot">
          <tr>
		     <td align="left"><input type="checkbox" id="check_uncheck_bottom" value="all" onclick="__checkAll(<?= $rows?count($rows): 0 ?>,'check_uncheck_bottom')" /></td>
         	 <td align="left">
					<div class="form-group">
                            <select name="action" class="form-control" id="p_action">
                                <option value="" selected="selected">Select Action</option>
                                                          
                          
                            </select>
					</div>
              </td>
              <td align="left">      
					<input type="submit" value="Submit" name="" class="btn btn-success"  style="margin-top:2px;"/>
				
             </td>
          </tr>
         </tfoot> --> 
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




 <br/>
 <br/>
 <br/>
      <br/>
    </div>			
    </div>			
	</div>
	</div>
	</div>
</section>

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