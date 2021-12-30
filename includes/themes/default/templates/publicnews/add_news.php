<?php 
	$resultDisticts=$db->select("SELECT DistrictID, DistrictName, DistrictNameBN FROM bas_district ORDER BY DistrictName"); 
 //pre($edit);
?>
<section class="section-block clearfix">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<h2 class="nav-page-title">Public News :: Add</h2>
			<div class="page-breadcrumb clearfix">
			    <ol class="breadcrumb">
        		   <li><a href="<?=SCRIPT_URL?>"><i class="fa fa-home"></i> প্রচ্ছদ</a></li>
                    <li><a href="<?=SCRIPT_URL?>publicnews">পাবলিক নিউস</a></li>
        		   <li class="active">ধাপ ২ : আপনার  সংবাদ/লেখা প্রকাশ   করুন </li>
        		 </ol>
			</div>
		<!--eof top heading-->	

     
     <div class="user_login" style="margin: auto; border: 2px solid orange;">
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
$panel_title="Add News";
?>
<div class="row" id="add_edit_block"  style="display:block">


 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_content">
		<br />
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" >
		 <input type="hidden" name="formSubmitted" value="1" >
          <input type="hidden" name="user_id" value="<?=$u_info['user_id']?>" >
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

$edit['Writers']= $u_info['user_name'];
?>    	


	
        
	<div class="row">	
       
<div class="col-md-12 col-sm-12 col-xs-12">					
<center>	
<h2><i class="fa fa-user"></i> <?=ucwords($u_info['user_name'])?>  <i class="fa fa-envelope"></i> <?=$u_info['user_email']?> &nbsp; <i class="fa fa-phone"></i> <?=$u_info['user_mobile']?></h2>		
</center>
</div>
					
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
                <a class="btn btn-danger" href="<?=SCRIPT_URL.'publicnews/manageNews'?>">Show My News</a>
			</div>
		  </div>
		</form>
	  </div>
	</div>
  </div>
</div>






      <br/>
      <br/>
      <br/>
      <br/>
    </div>			
	</div>
	</div>
</section>
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